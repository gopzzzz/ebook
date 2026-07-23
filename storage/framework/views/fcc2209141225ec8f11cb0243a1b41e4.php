
  <script>
    <?php
      $jsProducts = $gamingItems->map(function($p) {
        $save = ($p->mrp > 0 && $p->mrp > $p->sr) ? round((($p->mrp - $p->sr) / $p->mrp) * 100) : 0;
        return [
          'id' => $p->id,
          'name' => $p->name,
          'brand' => !empty($p->author_name) ? $p->author_name : 'Brandson',
          'category' => 'all', // Map properly if possible, default to 'all'
          'price' => (float)$p->sr,
          'original' => (float)$p->mrp,
          'image' => asset('public/assets/img/items/'.$p->image),
          'rating' => 4.5,
          'reviews' => rand(100, 3000),
          'badge' => $save > 20 ? 'hot' : ($save > 0 ? 'discount' : 'new'),
          'slug' => $p->slug
        ];
      });
    ?>
    const PRODUCTS = <?php echo json_encode($jsProducts); ?>;

    let gCart = JSON.parse(localStorage.getItem('pg_cart') || '[]');
    let gWishlist = JSON.parse(localStorage.getItem('pg_wishlist') || '[]');
    const fmt = n => '₹' + n.toLocaleString('en-IN');
    const disc = (p,o) => Math.round(((o-p)/o)*100);
    const stars = r => { let s=''; for(let i=0;i<5;i++) s+=i<Math.floor(r)?'★':(i===Math.floor(r)&&r%1>=0.5)?'½':'☆'; return s; };

    function gSaveCart() {
      localStorage.setItem('pg_cart', JSON.stringify(gCart));
      document.getElementById('gCartCount').textContent = gCart.reduce((a,i)=>a+i.qty,0);
    }
    function gSaveWishlist() {
      localStorage.setItem('pg_wishlist', JSON.stringify(gWishlist));
      document.getElementById('gWishlistCount').textContent = gWishlist.length;
    }
    function gShowToast(msg) {
      const t = document.getElementById('gToast');
      document.getElementById('gToastMsg').textContent = msg;
      t.classList.add('show');
      setTimeout(()=>t.classList.remove('show'),2500);
    }
    function gAddCart(id) {
      const ex = gCart.find(i=>i.id===id);
      if(ex) ex.qty++; else gCart.push({id,qty:1});
      gSaveCart();
      gShowToast('// ITEM ADDED TO CART');
    }
    function gToggleWishlist(id,btn) {
      const idx = gWishlist.indexOf(id);
      if(idx===-1){
        gWishlist.push(id);
        btn.classList.add('active');
        btn.innerHTML='<i class="ri-heart-fill"></i>';
        gShowToast('// ADDED TO WISHLIST');
      } else {
        gWishlist.splice(idx,1);
        btn.classList.remove('active');
        btn.innerHTML='<i class="ri-heart-line"></i>';
        gShowToast('// REMOVED FROM WISHLIST');
      }
      gSaveWishlist();
    }

    function createGCard(p) {
      const isWished = gWishlist.includes(p.id);
      const save = disc(p.price, p.original);
      const badgeHTML = {
        discount: `<span class="g-badge-pill g-badge-discount">-${save}%</span>`,
        new:      `<span class="g-badge-pill g-badge-new">// NEW</span>`,
        hot:      `<span class="g-badge-pill g-badge-hot">🔥 HOT</span>`,
        bestseller:`<span class="g-badge-pill g-badge-best">★ BEST</span>`,
      }[p.badge] || '';

      return `
        <article class="g-product-card" data-id="${p.id}">
          <div class="g-card-line"></div>
          <div class="g-card-img-wrap">
            <div class="g-card-badges">${badgeHTML}</div>
            <button class="g-wishlist-btn ${isWished?'active':''}" data-id="${p.id}">
              <i class="${isWished?'ri-heart-fill':'ri-heart-line'}"></i>
            </button>
            <img src="${p.image}" alt="${p.name}" class="g-card-img" loading="lazy" />
            <div class="g-card-overlay">
              <button class="g-overlay-cart" data-id="${p.id}"><i class="ri-shopping-cart-line"></i> ADD TO CART</button>
              <button class="g-overlay-view" data-id="${p.id}"><i class="ri-eye-line"></i></button>
            </div>
          </div>
          <div class="g-card-info">
            <div class="g-card-brand">${p.brand}</div>
            <div class="g-card-name">${p.name}</div>
            <div class="g-card-rating">
              <span class="g-stars">${stars(p.rating)}</span>
              <span class="g-rating-count">${p.rating} (${p.reviews.toLocaleString()})</span>
            </div>
            <div class="g-card-price-row">
              <div>
                <span class="g-price-main">${fmt(p.price)}</span>
                <span class="g-price-original">${fmt(p.original)}</span>
              </div>
              <span class="g-price-save">-${save}%</span>
            </div>
          </div>
        </article>`;
    }

    function renderGrid(list) {
      const grid = document.getElementById('gProductGrid');
      grid.innerHTML = list.map(createGCard).join('');
      const cnt = document.getElementById('gResults');
      if(cnt) cnt.textContent = list.length + ' UNITS FOUND';

      // Events
      grid.querySelectorAll('.g-overlay-cart').forEach(b=>b.addEventListener('click',e=>{e.stopPropagation();gAddCart(+b.dataset.id);}));
      grid.querySelectorAll('.g-wishlist-btn').forEach(b=>b.addEventListener('click',e=>{e.stopPropagation();gToggleWishlist(+b.dataset.id,b);}));
      grid.querySelectorAll('.g-overlay-view').forEach(b=>b.addEventListener('click',e=>{e.stopPropagation();openModal(+b.dataset.id);}));
      grid.querySelectorAll('.g-product-card').forEach(c=>{
        c.addEventListener('click',()=>{ window.location.href='<?php echo e(url("gaming-product")); ?>/'+c.dataset.id; });
      });
    }

    function filterAndRender(cat) {
      let list = cat&&cat!=='all' ? PRODUCTS.filter(p=>p.category===cat) : [...PRODUCTS];
      const sort = document.getElementById('gSort')?.value;
      if(sort==='price-asc') list.sort((a,b)=>a.price-b.price);
      if(sort==='price-desc') list.sort((a,b)=>b.price-a.price);
      if(sort==='rating') list.sort((a,b)=>b.rating-a.rating);
      renderGrid(list);
    }

    function openModal(id) {
      const p = PRODUCTS.find(x=>x.id===id);
      if(!p) return;
      const modal = document.getElementById('gQuickModal');
      const box = document.getElementById('gModalBox');
      document.getElementById('gModalInner').innerHTML = `
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
          <div style="background:var(--g-dark-2);border:1px solid var(--g-border);display:flex;align-items:center;justify-content:center;aspect-ratio:1;clip-path:polygon(0 0,calc(100%-12px) 0,100% 12px,100% 100%,12px 100%,0 calc(100%-12px));">
            <img src="${p.image}" alt="${p.name}" style="width:78%;object-fit:contain;filter:drop-shadow(0 0 20px rgba(0,245,255,0.3));" />
          </div>
          <div style="padding:0.5rem 0;">
            <div class="g-card-brand" style="margin-bottom:0.4rem;">${p.brand}</div>
            <div style="font-family:var(--g-font);font-size:1rem;font-weight:800;text-transform:uppercase;color:#e0e8ff;margin-bottom:0.75rem;line-height:1.3;">${p.name}</div>
            <div class="g-card-rating" style="margin-bottom:1rem;"><span class="g-stars">${stars(p.rating)}</span><span class="g-rating-count">${p.rating} (${p.reviews.toLocaleString()})</span></div>
            <div class="g-price-main" style="font-size:1.6rem;">${fmt(p.price)}</div>
            <div style="display:flex;gap:0.5rem;align-items:center;margin-bottom:1.25rem;">
              <span class="g-price-original">${fmt(p.original)}</span>
              <span class="g-price-save-tag">-${disc(p.price,p.original)}%</span>
            </div>
            <div style="display:flex;gap:0.6rem;flex-wrap:wrap;">
              <button class="g-btn g-btn-primary" onclick="gAddCart(${p.id});gShowToast('// ITEM ADDED');" style="flex:1;justify-content:center;"><i class="ri-shopping-cart-line"></i> ADD TO CART</button>
              <a href="gaming-product-detail.html?id=${p.id}" class="g-btn g-btn-ghost">DETAILS</a>
            </div>
          </div>
        </div>`;
      modal.style.opacity='1';modal.style.visibility='visible';
      box.style.transform='scale(1)';
    }

    // Countdown
    function initCountdown() {
      const end = Date.now() + 12*3600000 + 45*60000 + 30000;
      function tick(){
        const d=Math.max(0,end-Date.now());
        document.getElementById('gH').textContent=String(Math.floor(d/3600000)).padStart(2,'0');
        document.getElementById('gM').textContent=String(Math.floor((d%3600000)/60000)).padStart(2,'0');
        document.getElementById('gS').textContent=String(Math.floor((d%60000)/1000)).padStart(2,'0');
      }
      tick(); setInterval(tick,1000);
    }

    // Filter tabs
    let activeCat = 'all';
    function initTabs() {
      document.querySelectorAll('[data-cat]').forEach(btn => {
        btn.addEventListener('click', () => {
          activeCat = btn.dataset.cat;
          document.querySelectorAll('[data-cat]').forEach(b=>b.classList.remove('active'));
          document.querySelectorAll(`[data-cat="${activeCat}"]`).forEach(b=>b.classList.add('active'));
          filterAndRender(activeCat);
        });
      });
    }

    // Sort
    document.addEventListener('DOMContentLoaded', () => {
      document.getElementById('gSort')?.addEventListener('change', ()=>filterAndRender(activeCat));
      document.getElementById('gGridBtn')?.addEventListener('click',()=>{
        document.getElementById('gProductGrid').style.gridTemplateColumns='repeat(3,1fr)';
        document.getElementById('gGridBtn').classList.add('active');
        document.getElementById('gListBtn').classList.remove('active');
      });
      document.getElementById('gListBtn')?.addEventListener('click',()=>{
        document.getElementById('gProductGrid').style.gridTemplateColumns='1fr';
        document.getElementById('gListBtn').classList.add('active');
        document.getElementById('gGridBtn').classList.remove('active');
      });

      // Modal close
      document.getElementById('gModalClose').addEventListener('click',()=>{
        const m=document.getElementById('gQuickModal');
        m.style.opacity='0'; m.style.visibility='hidden';
        document.getElementById('gModalBox').style.transform='scale(0.9)';
      });
      document.getElementById('gQuickModal').addEventListener('click',e=>{
        if(e.target===document.getElementById('gQuickModal')){
          e.target.style.opacity='0'; e.target.style.visibility='hidden';
          document.getElementById('gModalBox').style.transform='scale(0.9)';
        }
      });

      // Rating btns
      document.querySelectorAll('.g-rating-btn').forEach(b=>b.addEventListener('click',()=>{
        document.querySelectorAll('.g-rating-btn').forEach(x=>x.classList.remove('active'));
        b.classList.add('active');
      }));

      // Pagination
      document.querySelectorAll('.g-page-btn').forEach(b=>b.addEventListener('click',()=>{
        if(b.disabled) return;
        document.querySelectorAll('.g-page-btn').forEach(x=>x.classList.remove('active'));
        b.classList.add('active');
        window.scrollTo({top:0,behavior:'smooth'});
      }));

      // Price range
      const pr = document.getElementById('gPriceRange');
      const pd = document.getElementById('gPriceDisplay');
      pr?.addEventListener('input',()=>{ pd.textContent='₹'+parseInt(pr.value).toLocaleString('en-IN'); });

      // Announcement close
      document.getElementById('gAnnClose')?.addEventListener('click',()=>{ document.getElementById('gAnnouncement').style.display='none'; });

      // Mobile menu
      const menuBtn = document.getElementById('gMenuBtn');
      const nav = document.getElementById('gNav');
      menuBtn?.addEventListener('click',()=>{ menuBtn.classList.toggle('active'); nav.classList.toggle('open'); });

      // Back top
      const backTop = document.getElementById('gBackTop');
      window.addEventListener('scroll',()=>{ backTop?.classList.toggle('visible',window.scrollY>200); },{passive:true});
      backTop?.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));

      // Init badges
      document.getElementById('gCartCount').textContent = gCart.reduce((a,i)=>a+i.qty,0);
      document.getElementById('gWishlistCount').textContent = gWishlist.length;

      initCountdown();
      initTabs();
      filterAndRender('all');

      // Check URL params
      const params = new URLSearchParams(window.location.search);
      const urlCat = params.get('cat');
      if(urlCat) {
        activeCat = urlCat;
        document.querySelectorAll(`[data-cat="${urlCat}"]`).forEach(b=>b.classList.add('active'));
        document.querySelectorAll('[data-cat]:not([data-cat="' + urlCat + '"])').forEach(b=>b.classList.remove('active'));
        filterAndRender(urlCat);
      }
    });
  </script>

  <div id="gEntranceWipe"></div>

  <script>
    /* ── Entrance wipe animation ── */
    (function () {
      const wipe = document.getElementById('gEntranceWipe');
      if (!wipe) return;

      let pct = 0;
      let startTime = null;
      const DURATION = 520; // ms for sweep down

      function animateSweep(ts) {
        if (!startTime) startTime = ts;
        const elapsed = ts - startTime;
        pct = Math.min(100, (elapsed / DURATION) * 100);
        wipe.style.setProperty('--wipe-y', pct + '%');

        if (pct < 100) {
          requestAnimationFrame(animateSweep);
        } else {
          // Sweep done → fade out the whole overlay
          wipe.style.transition = 'opacity .35s ease';
          wipe.style.opacity = '0';
          setTimeout(() => { wipe.style.display = 'none'; }, 380);
        }
      }

      // Small delay so the browser paints the page first
      setTimeout(() => requestAnimationFrame(animateSweep), 80);
    })();
  </script>

  <!-- Custom Box Pointer Cursor -->
  <div class="g-cursor" id="gCursor"></div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if(window.innerWidth < 768) return; // Disable on mobile
      const cursor = document.getElementById('gCursor');
      document.addEventListener('mousemove', e => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
      });
      // Add hover effect dynamically including for future elements
      document.body.addEventListener('mouseover', e => {
        if(e.target.closest('a, button, input, select, .g-product-card, .g-cat-card')) {
          cursor.classList.add('hover');
        } else {
          cursor.classList.remove('hover');
        }
      });
    });
  </script><?php /**PATH C:\xampp\htdocs\ebook\resources\views/layouts/gamingpartials/footer.blade.php ENDPATH**/ ?>