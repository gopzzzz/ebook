/* ============================================================
   POUCH GALLERY® — Main JavaScript
   Handles: product rendering, cart, wishlist, hero slider,
   countdown, reveal animation, modal, search, mobile menu
   ============================================================ */

'use strict';


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
