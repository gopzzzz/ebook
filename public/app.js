/* ============================================================
   POUCH GALLERY® — Main JavaScript
   Handles: product rendering, cart, wishlist, hero slider,
   countdown, reveal animation, modal, search, mobile menu
   ============================================================ */

'use strict';

// ─── PRODUCTS DATA ────────────────────────────────────────────
const PRODUCTS = [
  { id:1, name:'HyperX Alloy Origins RGB Mechanical Keyboard', brand:'HyperX',    category:'keyboards',   price:3499,  original:5999,  image:'/ebook/public/assets/keyboard.png',  rating:4.8, reviews:1243, badge:'discount',   isNew:false, isBestSeller:true,  isFeatured:true  },
  { id:2, name:'Logitech G502 Hero High Performance Gaming Mouse', brand:'Logitech', category:'mice',      price:2799,  original:4999,  image:'/ebook/public/assets/mouse.png',     rating:4.9, reviews:2890, badge:'bestseller', isNew:false, isBestSeller:true,  isFeatured:true  },
  { id:3, name:'HyperX Cloud II Gaming Headset 7.1 Surround',   brand:'HyperX',    category:'headsets',    price:4999,  original:7499,  image:'/ebook/public/assets/headset.png',   rating:4.7, reviews:1876, badge:'hot',        isNew:false, isBestSeller:true,  isFeatured:true  },
  { id:4, name:'Green Soul Ergonomic Gaming Chair – Alpha Series', brand:'Green Soul', category:'chairs',  price:12999, original:18999, image:'/ebook/public/assets/chair.png',     rating:4.6, reviews:543,  badge:'discount',   isNew:false, isBestSeller:false, isFeatured:true  },
  { id:5, name:'27" Curved Gaming Monitor 165Hz 1ms FreeSync',   brand:'LG',        category:'monitors',   price:18999, original:27999, image:'/ebook/public/assets/monitor.png',   rating:4.8, reviews:723,  badge:'new',        isNew:true,  isBestSeller:false, isFeatured:false },
  { id:6, name:'Xbox Wireless Controller – Carbon Black',        brand:'Microsoft', category:'controllers', price:5499,  original:7999,  image:'/ebook/public/assets/controller.png',rating:4.9, reviews:3210, badge:'discount',   isNew:false, isBestSeller:true,  isFeatured:false },
  { id:7, name:'Corsair MM350 Pro Extended Gaming Mousepad',     brand:'Corsair',   category:'mousepads',   price:1499,  original:2499,  image:'/ebook/public/assets/mousepad.png',  rating:4.7, reviews:912,  badge:'new',        isNew:true,  isBestSeller:false, isFeatured:false },
  { id:8, name:'Razer DeathAdder V3 Ultra-Lightweight Gaming Mouse', brand:'Razer', category:'mice',       price:5999,  original:8999,  image:'/ebook/public/assets/mouse.png',     rating:4.9, reviews:1432, badge:'hot',        isNew:true,  isBestSeller:false, isFeatured:true  },
];

// ─── STATE ───────────────────────────────────────────────────
let cart     = JSON.parse(localStorage.getItem('pg_cart')     || '[]');
let wishlist = JSON.parse(localStorage.getItem('pg_wishlist') || '[]');

// ─── HELPERS ─────────────────────────────────────────────────
const $  = sel => document.querySelector(sel);
const $$ = sel => document.querySelectorAll(sel);
const fmt      = n => '₹' + n.toLocaleString('en-IN');
const discPct  = (p,o) => Math.round(((o-p)/o)*100);

function starsHTML(r) {
  const full = Math.floor(r), half = r % 1 >= 0.5;
  return Array.from({length:5}, (_,i) => i < full ? '★' : (i === full && half) ? '½' : '☆').join('');
}

function saveCart()     { localStorage.setItem('pg_cart',     JSON.stringify(cart));     updateBadges(); }
function saveWishlist() { localStorage.setItem('pg_wishlist', JSON.stringify(wishlist)); updateBadges(); }

function updateBadges() {
  const cartEl = $('#cartCount'),   wishEl = $('#wishlistCount');
  if (cartEl) cartEl.textContent = cart.reduce((a,i) => a + i.qty, 0);
  if (wishEl) wishEl.textContent = wishlist.length;
}

function showToast(msg) {
  const t = $('#cartToast');
  if (!t) return;
  $('#toastMsg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 2500);
}
window.showToast = showToast; // expose for inline calls

// ─── CART ────────────────────────────────────────────────────
function addToCart(id, qty = 1) {
  const ex = cart.find(i => i.id === id);
  if (ex) ex.qty += qty; else cart.push({ id, qty });
  saveCart();
  showToast('Added to cart! 🛒');
}
window.addToCart = addToCart;

// ─── WISHLIST ─────────────────────────────────────────────────
function toggleWishlist(id, btn) {
  const idx = wishlist.indexOf(id);
  if (idx === -1) {
    wishlist.push(id);
    btn.classList.add('active');
    btn.innerHTML = '<i class="ri-heart-fill"></i>';
    showToast('Added to wishlist! ♥');
  } else {
    wishlist.splice(idx, 1);
    btn.classList.remove('active');
    btn.innerHTML = '<i class="ri-heart-line"></i>';
    showToast('Removed from wishlist');
  }
  saveWishlist();
}

// ─── PRODUCT CARD ─────────────────────────────────────────────
function createProductCard(p) {
  const isWished = wishlist.includes(p.id);
  const save     = discPct(p.price, p.original);
  const badge    = {
    discount:   `<span class="badge-pill badge-discount">-${save}%</span>`,
    new:        `<span class="badge-pill badge-new">NEW</span>`,
    hot:        `<span class="badge-pill badge-hot">🔥 HOT</span>`,
    bestseller: `<span class="badge-pill badge-bestseller">★ BEST SELLER</span>`,
  }[p.badge] || '';

  return `
    <article class="product-card" data-id="${p.id}" role="button" tabindex="0" aria-label="${p.name}">
      <div class="product-img-wrap">
        <div class="product-badges">${badge}</div>
        <button class="wishlist-btn ${isWished ? 'active' : ''}" data-id="${p.id}" aria-label="Toggle wishlist">
          <i class="${isWished ? 'ri-heart-fill' : 'ri-heart-line'}"></i>
        </button>
        <img src="${p.image}" alt="${p.name}" loading="lazy" />
        <div class="product-overlay" aria-hidden="true">
          <button class="overlay-btn overlay-cart" data-id="${p.id}">
            <i class="ri-shopping-cart-line"></i> Add to Cart
          </button>
          <button class="overlay-btn overlay-view" data-id="${p.id}">
            <i class="ri-eye-line"></i> Quick View
          </button>
        </div>
      </div>
      <div class="product-info">
        <div class="product-brand">${p.brand}</div>
        <div class="product-name">${p.name}</div>
        <div class="product-rating">
          <span class="stars-display">${starsHTML(p.rating)}</span>
          <span class="rating-count">${p.rating} (${p.reviews.toLocaleString()})</span>
        </div>
        <div class="product-price-row">
          <div>
            <span class="price-main">${fmt(p.price)}</span>
            <span class="price-original">${fmt(p.original)}</span>
          </div>
          <span class="price-save">Save ${fmt(p.original - p.price)}</span>
        </div>
      </div>
    </article>`;
}

// ─── RENDER GRIDS ─────────────────────────────────────────────
function renderGrid(containerId, filterFn) {
  const el = $(`#${containerId}`);
  if (!el) return;
  el.innerHTML = PRODUCTS.filter(filterFn).map(createProductCard).join('');
  attachCardEvents(el);
}

function renderHomepageGrids() {
  renderGrid('featuredGrid',    p => p.isFeatured);
  renderGrid('newArrivalsGrid', p => p.isNew || p.badge === 'new');
  renderGrid('bestSellersGrid', p => p.isBestSeller);
}

function attachCardEvents(container) {
  container.querySelectorAll('.overlay-cart').forEach(btn =>
    btn.addEventListener('click', e => { e.stopPropagation(); addToCart(+btn.dataset.id); })
  );
  container.querySelectorAll('.wishlist-btn').forEach(btn =>
    btn.addEventListener('click', e => { e.stopPropagation(); toggleWishlist(+btn.dataset.id, btn); })
  );
  container.querySelectorAll('.overlay-view').forEach(btn =>
    btn.addEventListener('click', e => { e.stopPropagation(); openQuickView(+btn.dataset.id); })
  );
  container.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('click', () => { window.location.href = 'gaming-product-detail.html?id=' + card.dataset.id; });
    card.addEventListener('keydown', e => { if (e.key === 'Enter') card.click(); });
  });
}

// ─── QUICK VIEW ───────────────────────────────────────────────
function openQuickView(id) {
  const p = PRODUCTS.find(x => x.id === id);
  if (!p) return;
  const modal = $('#quickViewModal'), inner = $('#modalInner');
  if (!modal || !inner) return;
  const save = discPct(p.price, p.original);
  inner.innerHTML = `
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;align-items:start;">
      <div style="background:var(--dark-2);border:1px solid var(--border);border-radius:var(--radius-lg);padding:2rem;display:flex;align-items:center;justify-content:center;aspect-ratio:1;">
        <img src="${p.image}" alt="${p.name}" style="width:85%;object-fit:contain;filter:drop-shadow(0 10px 30px rgba(124,58,237,.3));" />
      </div>
      <div>
        <div class="product-brand" style="margin-bottom:.4rem;">${p.brand}</div>
        <h3 style="font-size:1.15rem;font-weight:800;margin-bottom:.75rem;line-height:1.3;">${p.name}</h3>
        <div class="product-rating" style="margin-bottom:1rem;">
          <span class="stars-display">${starsHTML(p.rating)}</span>
          <span class="rating-count">${p.rating} (${p.reviews.toLocaleString()} reviews)</span>
        </div>
        <div style="margin-bottom:1.25rem;">
          <span class="price-main" style="font-size:1.75rem;font-weight:900;">${fmt(p.price)}</span>
          <span class="price-original" style="font-size:1rem;margin-left:.5rem;">${fmt(p.original)}</span>
          <span class="badge-pill badge-discount" style="margin-left:.5rem;">-${save}%</span>
        </div>
        <div style="display:flex;gap:.75rem;flex-wrap:wrap;">
          <button class="btn btn-primary" onclick="addToCart(${p.id});showToast('Added to cart! 🛒');" style="flex:1;justify-content:center;">
            <i class="ri-shopping-cart-line"></i> Add to Cart
          </button>
          <a href="gaming-product-detail.html?id=${p.id}" class="btn btn-ghost">View Details</a>
        </div>
      </div>
    </div>`;
  modal.classList.add('open');
}
window.openQuickView = openQuickView;

// ─── HERO SLIDER ──────────────────────────────────────────────
function initHeroSlider() {
  const slides = $$('.hero-slide'), dots = $$('.hero-dot');
  if (!slides.length) return;
  let current = 0, timer;

  function goTo(n) {
    slides[current].classList.remove('active');
    dots[current]?.classList.remove('active');
    current = (n + slides.length) % slides.length;
    slides[current].classList.add('active');
    dots[current]?.classList.add('active');
  }
  function next() { goTo(current + 1); }
  function prev() { goTo(current - 1); }
  function startTimer() { clearInterval(timer); timer = setInterval(next, 5000); }

  $('#heroNext')?.addEventListener('click', () => { next(); startTimer(); });
  $('#heroPrev')?.addEventListener('click', () => { prev(); startTimer(); });
  dots.forEach((dot, i) => dot.addEventListener('click', () => { goTo(i); startTimer(); }));
  startTimer();
}

// ─── COUNTDOWN ────────────────────────────────────────────────
function initCountdown() {
  const h = $('#cd-h'), m = $('#cd-m'), s = $('#cd-s');
  if (!h) return;
  const end = Date.now() + (12 * 3600 + 45 * 60 + 30) * 1000;
  function tick() {
    const d = Math.max(0, end - Date.now());
    h.textContent = String(Math.floor(d / 3600000)).padStart(2, '0');
    m.textContent = String(Math.floor((d % 3600000) / 60000)).padStart(2, '0');
    s.textContent = String(Math.floor((d % 60000) / 1000)).padStart(2, '0');
  }
  tick(); setInterval(tick, 1000);
}

// ─── SCROLL REVEAL ────────────────────────────────────────────
function initReveal() {
  const els = $$('.reveal');
  if (!('IntersectionObserver' in window)) { els.forEach(e => e.classList.add('visible')); return; }
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
  }, { threshold: 0.12 });
  els.forEach(e => io.observe(e));
}

// ─── HEADER SCROLL ────────────────────────────────────────────
function initHeaderScroll() {
  const header = $('#siteHeader'), backTop = $('#backTop');
  if (!header) return;
  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY > 60;
    header.classList.toggle('scrolled', scrolled);
    backTop?.classList.toggle('visible', scrolled);
  }, { passive: true });
  backTop?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

// ─── MOBILE MENU ──────────────────────────────────────────────
function initMobileMenu() {
  const btn = $('#mobileMenuBtn'), nav = $('#mainNav');
  if (!btn || !nav) return;
  btn.addEventListener('click', () => {
    btn.classList.toggle('active');
    nav.classList.toggle('open');
    document.body.style.overflow = nav.classList.contains('open') ? 'hidden' : '';
  });
  nav.querySelectorAll('.nav-link').forEach(link => link.addEventListener('click', () => {
    btn.classList.remove('active'); nav.classList.remove('open'); document.body.style.overflow = '';
  }));
}

// ─── ANNOUNCEMENT ─────────────────────────────────────────────
function initAnnouncement() {
  const bar = $('#announcementBar'), close = $('#annClose');
  if (!bar || !close) return;
  close.addEventListener('click', () => { bar.style.display = 'none'; });
}

// ─── MODAL ────────────────────────────────────────────────────
function initModal() {
  const modal = $('#quickViewModal'), close = $('#modalClose');
  if (!modal) return;
  close?.addEventListener('click', () => modal.classList.remove('open'));
  modal.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('open'); });
}

// ─── NEWSLETTER ───────────────────────────────────────────────
function handleNewsletter(e) {
  e.preventDefault();
  showToast('Subscribed! Welcome to Pouch Gallery 🎉');
  $('#nlEmail').value = '';
}
window.handleNewsletter = handleNewsletter;

// ─── SEARCH ───────────────────────────────────────────────────
function initSearch() {
  const input = $('#searchInput');
  if (!input) return;
  input.addEventListener('keydown', e => {
    if (e.key === 'Enter' && input.value.trim()) {
      window.location.href = 'gaming-products.html?q=' + encodeURIComponent(input.value.trim());
    }
  });
  $('.search-btn')?.addEventListener('click', () => {
    const v = input.value.trim();
    if (v) window.location.href = 'gaming-products.html?q=' + encodeURIComponent(v);
  });
}

// ─── PRODUCT DETAIL PAGE ──────────────────────────────────────
function initProductDetail() {
  const params = new URLSearchParams(window.location.search);
  const p = PRODUCTS.find(x => x.id === +params.get('id')) || PRODUCTS[0];

  // Populate fields
  const set = (id, val) => { const el = $(id); if (el) el.textContent = val; };
  const mainImg = $('#mainProductImg');
  if (mainImg) mainImg.src = p.image;
  set('#detailTitle',    p.name);
  set('#detailBrand',    p.brand);
  set('#detailPrice',    fmt(p.price));
  set('#detailOriginal', fmt(p.original));
  set('#detailSave',     `Save ${discPct(p.price, p.original)}%`);
  set('#detailRating',   starsHTML(p.rating));
  set('#detailReviews',  `${p.rating} · ${p.reviews.toLocaleString()} Reviews`);
  const bc = $('#breadcrumbName'); if (bc) bc.textContent = p.name;

  // Quantity control
  let qty = 1;
  const qtyEl = $('#qtyValue');
  $('#qtyMinus')?.addEventListener('click', () => { if (qty > 1) { qty--; if (qtyEl) qtyEl.textContent = qty; } });
  $('#qtyPlus')?.addEventListener('click',  () => { qty++; if (qtyEl) qtyEl.textContent = qty; });

  // Add to cart
  $('#detailAddCart')?.addEventListener('click', () => { addToCart(p.id, qty); showToast(`${qty} item(s) added to cart! 🛒`); });

  // Wishlist
  const wishBtn = $('#detailWishlist');
  wishBtn?.addEventListener('click', () => {
    const idx = wishlist.indexOf(p.id);
    if (idx === -1) {
      wishlist.push(p.id);
      wishBtn.innerHTML = '<i class="ri-heart-fill"></i> Wishlisted';
      wishBtn.style.cssText = 'background:rgba(239,68,68,.1);border-color:rgba(239,68,68,.4);color:#ef4444;';
      showToast('Added to wishlist! ♥');
    } else {
      wishlist.splice(idx, 1);
      wishBtn.innerHTML = '<i class="ri-heart-line"></i> Wishlist';
      wishBtn.style.cssText = '';
      showToast('Removed from wishlist');
    }
    saveWishlist();
  });

  // Thumbnail swap
  $$('.thumb-btn').forEach(btn => btn.addEventListener('click', () => {
    $$('.thumb-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const img = btn.querySelector('img');
    if (mainImg && img) mainImg.src = img.src;
  }));

  // Tabs
  $$('.tab-btn').forEach(btn => btn.addEventListener('click', () => {
    $$('.tab-btn').forEach(b => b.classList.remove('active'));
    $$('.tab-panel').forEach(panel => panel.classList.remove('active'));
    btn.classList.add('active');
    $(`#tab-${btn.dataset.tab}`)?.classList.add('active');
  }));

  // Variants
  $$('.variant-btn').forEach(btn => btn.addEventListener('click', () => {
    btn.closest('.variant-row')?.querySelectorAll('.variant-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  }));

  // Related products
  const relGrid = $('#relatedGrid');
  if (relGrid) {
    const related = PRODUCTS.filter(x => x.id !== p.id && x.category === p.category)
      .concat(PRODUCTS.filter(x => x.id !== p.id && x.category !== p.category))
      .slice(0, 4);
    relGrid.innerHTML = related.map(createProductCard).join('');
    attachCardEvents(relGrid);
  }
}

// ─── INIT ─────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
  updateBadges();
  initHeaderScroll();
  initMobileMenu();
  initAnnouncement();
  initModal();
  initHeroSlider();
  initCountdown();
  initReveal();
  initSearch();
  renderHomepageGrids();

  // Page-specific init
  if ($('#detailTitle')) initProductDetail();
});
