@extends('layouts.weblayout')

@section('content')
<style>
:root {
    --zuky-pink:        #e91e8c;
    --zuky-pink-light:  #ff6eb4;
    --zuky-pink-pale:   #fce4ec;
    --zuky-pink-pastel: #fff0f8;
    --zuky-mint:        #4db6ac;
    --zuky-teal:        #00897b;
    --zuky-purple:      #ab47bc;
    --zuky-yellow:      #ffca28;
    --zuky-dark:        #1a1a2e;
    --zuky-text:        #3d3d3d;
    --zuky-gray:        #757575;
    --zuky-border:      #f0d6e8;
    --zuky-radius:      18px;
}

.zh-section-head { text-align: center; margin-bottom: 38px; }
.zh-section-tag {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--zuky-pink);
    background: var(--zuky-pink-pastel);
    padding: 5px 16px;
    border-radius: 50px;
    margin-bottom: 10px;
}
.zh-section-title { font-size: clamp(22px,3vw,32px); font-weight: 800; color: var(--zuky-dark); margin: 0 0 10px; line-height: 1.2; }
.zh-section-title span { color: var(--zuky-pink); }
.zh-section-sub { font-size: 14.5px; color: var(--zuky-gray); margin: 0; }
.zh-section-line { display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 12px; }
.zh-section-line::before,
.zh-section-line::after { content: ''; width: 50px; height: 2px; background: linear-gradient(90deg, transparent, var(--zuky-pink)); border-radius: 2px; }
.zh-section-line::after { background: linear-gradient(90deg, var(--zuky-pink), transparent); }
.zh-dot { width: 8px; height: 8px; background: var(--zuky-pink); border-radius: 50%; display: inline-block; }

#mainCarousel { width: 100%; }
.carousel-inner, .carousel-item { width: 100%; }
.carousel-item img { width: 100%; object-fit: cover; max-height: 560px; display: block; }
.carousel-control-prev, .carousel-control-next {
    background: rgba(233,30,140,0.85);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    width: 46px;
    height: 46px;
}
.carousel-control-prev { left: 18px; }
.carousel-control-next { right: 18px; }
.carousel-control-prev-icon, .carousel-control-next-icon { width: 26px; height: 26px; }
.carousel-indicators [data-bs-target] {
    width: 10px; height: 10px; border-radius: 50%;
    background: rgba(233,30,140,.45); border: none; margin: 0 4px;
    transition: transform .2s, background .2s;
}
.carousel-indicators .active { background: var(--zuky-pink); transform: scale(1.3); }

.zh-promo-strip { background: linear-gradient(90deg, var(--zuky-pink) 0%, var(--zuky-purple) 50%, var(--zuky-mint) 100%); padding: 14px 0; overflow: hidden; }
.zh-promo-track { display: flex; gap: 40px; animation: promoScroll 25s linear infinite; width: max-content; }
@keyframes promoScroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.zh-promo-item { display: flex; align-items: center; gap: 8px; white-space: nowrap; color: #fff; font-size: 13px; font-weight: 600; }
.zh-promo-item i { font-size: 15px; }

.zh-cat-section { padding: 64px 24px 48px; background: #fff; }
.zh-cat-grid { display: grid; grid-template-columns: repeat(5,1fr); gap: 16px; }
.zh-cat-card {
    position: relative; overflow: hidden; height: 280px; border-radius: 20px;
    text-decoration: none; background: #fce4ec; cursor: pointer;
    box-shadow: 0 4px 18px rgba(233,30,140,0.10); transition: transform .35s, box-shadow .35s;
}
.zh-cat-card:hover { transform: translateY(-6px) scale(1.015); box-shadow: 0 14px 40px rgba(233,30,140,0.22); }
.zh-cat-card img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s; }
.zh-cat-card:hover img { transform: scale(1.1); }
.zh-cat-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(233,30,140,.82) 0%, rgba(233,30,140,.08) 55%, transparent 100%);
    transition: .3s;
}
.zh-cat-card:hover .zh-cat-overlay { background: linear-gradient(to top, rgba(233,30,140,.92) 0%, rgba(171,71,188,.35) 60%, transparent 100%); }
.zh-cat-label { position: absolute; left: 50%; bottom: 22px; transform: translateX(-50%); color: #fff; text-align: center; width: 90%; z-index: 2; transition: .35s; }
.zh-cat-label h3 { font-size: 17px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; line-height: 1.3; margin: 0; color: #fff; }
.zh-cat-label span { font-size: 11.5px; color: rgba(255,255,255,.85); font-weight: 500; display: block; margin-top: 2px; }
.zh-cat-card:hover .zh-cat-label { bottom: 28px; }
.zh-cat-icon-badge {
    position: absolute; top: 14px; right: 14px;
    width: 36px; height: 36px; background: rgba(255,255,255,.9); border-radius: 50%;
    display: flex; align-items: center; justify-content: center; font-size: 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,.1); z-index: 2;
    transform: scale(0.8); transition: transform .3s;
}
.zh-cat-card:hover .zh-cat-icon-badge { transform: scale(1); }
@media (max-width:1100px) { .zh-cat-grid { grid-template-columns: repeat(3,1fr); } }
@media (max-width:768px)  { .zh-cat-grid { grid-template-columns: repeat(2,1fr); gap: 12px; } .zh-cat-card { height: 200px; } .zh-cat-label h3 { font-size: 14px; } }
@media (max-width:480px)  { .zh-cat-card { height: 160px; } }

.zh-products-section { padding: 56px 24px; }
.zh-products-section.bg-pastel { background: var(--zuky-pink-pastel); }
.zh-products-section.bg-mint   { background: #e0f2f1; }
.zh-products-section.bg-white  { background: #fff; }

.zh-prod-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 18px; }
@media (max-width:992px) { .zh-prod-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width:480px) { .zh-prod-grid { gap: 10px; } }

.zh-prod-card {
    background: #fff; border-radius: var(--zuky-radius); overflow: hidden;
    box-shadow: 0 2px 12px rgba(233,30,140,0.07);
    display: flex; flex-direction: column; position: relative;
    transition: transform .3s, box-shadow .3s;
}
.zh-prod-card:hover { transform: translateY(-6px); box-shadow: 0 16px 44px rgba(233,30,140,0.16); }

.zh-prod-img-wrap { position: relative; aspect-ratio: 4/5; background: var(--zuky-pink-pastel); overflow: hidden; }
.zh-prod-img-wrap a { display: block; height: 100%; }
.zh-prod-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform .4s; display: block; }
.zh-prod-card:hover .zh-prod-img-wrap img { transform: scale(1.06); }

.zh-badge-discount {
    position: absolute; top: 10px; left: 10px; z-index: 2;
    background: linear-gradient(135deg, #e91e8c, #ab47bc);
    color: #fff; font-size: 11px; font-weight: 700; padding: 4px 9px; border-radius: 50px;
    box-shadow: 0 2px 8px rgba(233,30,140,0.3);
}
.zh-badge-new {
    position: absolute; top: 10px; left: 10px; z-index: 2;
    background: linear-gradient(135deg, #4db6ac, #00897b);
    color: #fff; font-size: 11px; font-weight: 700; padding: 4px 9px; border-radius: 50px;
}
.zh-badge-bestseller {
    position: absolute; top: 10px; left: 10px; z-index: 2;
    background: linear-gradient(135deg, #ffca28, #f9a825);
    color: #333; font-size: 11px; font-weight: 700; padding: 4px 9px; border-radius: 50px;
}
.zh-wishlist-btn {
    position: absolute; top: 10px; right: 10px; z-index: 2;
    width: 34px; height: 34px; background: #fff; border-radius: 50%; border: none;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; color: #ccc; cursor: pointer;
    box-shadow: 0 2px 10px rgba(0,0,0,.1); transition: color .2s, transform .2s, background .2s;
}
.zh-wishlist-btn:hover { color: var(--zuky-pink); transform: scale(1.15); background: var(--zuky-pink-pastel); }
.zh-wishlist-btn.active { color: var(--zuky-pink); }

.zh-quick-overlay {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: linear-gradient(to top, rgba(233,30,140,.95), rgba(233,30,140,.4));
    display: flex; align-items: flex-end; justify-content: center;
    padding-bottom: 12px; opacity: 0; transition: opacity .3s;
}
.zh-prod-card:hover .zh-quick-overlay { opacity: 1; }
.zh-quick-btn {
    background: #fff; color: var(--zuky-pink); border: none;
    padding: 8px 20px; border-radius: 50px; font-size: 12px; font-weight: 700;
    cursor: pointer; text-decoration: none;
    display: inline-flex; align-items: center; gap: 6px;
    box-shadow: 0 4px 14px rgba(0,0,0,.15); transition: background .2s, transform .2s;
}
.zh-quick-btn:hover { background: var(--zuky-pink); color: #fff; transform: scale(1.04); }

.zh-prod-body { padding: 13px 13px 0; flex: 1; display: flex; flex-direction: column; }
.zh-prod-brand { font-size: 10.5px; font-weight: 700; color: var(--zuky-pink); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
.zh-prod-name {
    font-size: 13.5px; color: var(--zuky-dark); font-weight: 500; line-height: 1.45; margin-bottom: 7px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 38px;
}
.zh-prod-rating { display: flex; align-items: center; gap: 5px; margin-bottom: 8px; }
.zh-rating-stars { display: flex; gap: 2px; }
.zh-rating-stars i { font-size: 11px; color: var(--zuky-yellow); }
.zh-rating-stars i.empty { color: #ddd; }
.zh-rating-count { font-size: 11px; color: var(--zuky-gray); }
.zh-prod-prices { display: flex; align-items: baseline; gap: 7px; flex-wrap: wrap; margin-bottom: 12px; }
.zh-price-sp { font-size: 17px; font-weight: 800; color: var(--zuky-dark); }
.zh-price-mrp { font-size: 12px; color: #aaa; text-decoration: line-through; }
.zh-price-off { font-size: 12px; color: #00897b; font-weight: 700; }
.zh-prod-foot { margin-top: auto; padding: 0 13px 13px; }
.zh-atc-btn {
    display: flex !important; align-items: center !important; justify-content: center !important; gap: 7px !important;
    width: 100% !important; padding: 11px 10px !important; border: none !important; border-radius: 50px !important;
    font-size: 13px !important; font-weight: 700 !important; cursor: pointer !important;
    background: linear-gradient(135deg, var(--zuky-pink), var(--zuky-pink-light)) !important;
    color: #fff !important; text-decoration: none !important;
    transition: transform .2s, box-shadow .2s !important;
    box-shadow: 0 4px 14px rgba(233,30,140,0.3) !important;
}
.zh-atc-btn:hover { transform: translateY(-2px) !important; box-shadow: 0 8px 24px rgba(233,30,140,0.4) !important; color: #fff !important; }
.zh-go-btn {
    display: flex !important; align-items: center !important; justify-content: center !important; gap: 7px !important;
    width: 100% !important; padding: 11px 10px !important; border-radius: 50px !important;
    font-size: 13px !important; font-weight: 700 !important; cursor: pointer !important;
    border: 2px solid var(--zuky-mint) !important;
    background: #fff !important; color: var(--zuky-teal) !important;
    text-decoration: none !important; transition: all .2s !important;
}
.zh-go-btn:hover { background: var(--zuky-teal) !important; color: #fff !important; }

.zh-view-all-wrap { text-align: center; margin-top: 36px; }
.zh-view-all-btn {
    display: inline-flex; align-items: center; gap: 8px; padding: 13px 32px;
    background: linear-gradient(135deg, var(--zuky-pink), var(--zuky-purple));
    color: #fff; border-radius: 50px; font-weight: 700; font-size: 14px;
    text-decoration: none; box-shadow: 0 6px 24px rgba(233,30,140,0.3);
    transition: transform .25s, box-shadow .25s;
}
.zh-view-all-btn:hover { transform: translateY(-3px); box-shadow: 0 12px 36px rgba(233,30,140,0.4); color: #fff; }

.zh-testimonials { padding: 64px 24px; background: linear-gradient(135deg, var(--zuky-pink-pastel) 0%, #f3e5f5 50%, #e0f2f1 100%); }
.zh-testi-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 22px; }
@media (max-width:992px) { .zh-testi-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width:600px)  { .zh-testi-grid { grid-template-columns: 1fr; } }
.zh-testi-card {
    background: #fff; border-radius: 20px; padding: 28px 24px 24px;
    box-shadow: 0 4px 20px rgba(233,30,140,0.08); position: relative;
    transition: transform .3s, box-shadow .3s;
}
.zh-testi-card:hover { transform: translateY(-5px); box-shadow: 0 16px 44px rgba(233,30,140,0.14); }
.zh-testi-quote {
    position: absolute; top: -18px; left: 24px;
    width: 38px; height: 38px;
    background: linear-gradient(135deg, var(--zuky-pink), var(--zuky-purple));
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 16px; box-shadow: 0 4px 12px rgba(233,30,140,0.3);
}
.zh-testi-stars { margin-bottom: 12px; display: flex; gap: 3px; }
.zh-testi-stars i { color: var(--zuky-yellow); font-size: 13px; }
.zh-testi-text { font-size: 13.5px; line-height: 1.65; color: var(--zuky-gray); margin-bottom: 18px; font-style: italic; }
.zh-testi-author { display: flex; align-items: center; gap: 12px; }
.zh-testi-avatar {
    width: 44px; height: 44px; border-radius: 50%;
    background: linear-gradient(135deg, var(--zuky-pink-pale), #f3e5f5);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; font-weight: 700; color: var(--zuky-pink); flex-shrink: 0;
    border: 2px solid var(--zuky-border);
}
.zh-testi-name { font-size: 14px; font-weight: 700; color: var(--zuky-dark); margin: 0; }
.zh-testi-loc  { font-size: 12px; color: var(--zuky-gray); }

.zh-why-section { padding: 64px 24px; background: #fff; }
.zh-why-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 22px; }
@media (max-width:900px) { .zh-why-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width:480px) { .zh-why-grid { grid-template-columns: 1fr; } }
.zh-why-card {
    text-align: center; padding: 32px 20px 28px; border-radius: 20px;
    border: 2px solid var(--zuky-border); transition: transform .3s, box-shadow .3s, border-color .3s, background .3s;
}
.zh-why-card:hover { transform: translateY(-6px); box-shadow: 0 14px 40px rgba(233,30,140,0.14); border-color: var(--zuky-pink); background: var(--zuky-pink-pastel); }
.zh-why-icon {
    width: 68px; height: 68px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center; font-size: 28px;
    margin: 0 auto 18px; transition: transform .3s;
}
.zh-why-card:hover .zh-why-icon { transform: scale(1.15) rotate(8deg); }
.zh-why-icon.pink   { background: var(--zuky-pink-pale); color: var(--zuky-pink); }
.zh-why-icon.teal   { background: #e0f2f1; color: var(--zuky-teal); }
.zh-why-icon.purple { background: #f3e5f5; color: var(--zuky-purple); }
.zh-why-icon.yellow { background: #fff8e1; color: #f9a825; }
.zh-why-title { font-size: 15.5px; font-weight: 700; color: var(--zuky-dark); margin: 0 0 8px; }
.zh-why-desc  { font-size: 13px; color: var(--zuky-gray); line-height: 1.6; margin: 0; }

.zh-shipping-section { background: linear-gradient(135deg, #1a1a2e 0%, #2d1b69 50%, #16213e 100%); padding: 52px 24px; }
.zh-ship-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 20px; }
@media (max-width:900px) { .zh-ship-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width:480px) { .zh-ship-grid { grid-template-columns: 1fr; } }
.zh-ship-item {
    display: flex; align-items: center; gap: 16px; padding: 20px;
    background: rgba(255,255,255,0.06); border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(6px); transition: background .3s;
}
.zh-ship-item:hover { background: rgba(233,30,140,0.15); border-color: rgba(233,30,140,0.4); }
.zh-ship-icon {
    width: 52px; height: 52px; flex-shrink: 0;
    background: linear-gradient(135deg, var(--zuky-pink), var(--zuky-purple));
    border-radius: 14px; display: flex; align-items: center; justify-content: center;
    font-size: 22px; color: #fff; box-shadow: 0 6px 18px rgba(233,30,140,0.35);
}
.zh-ship-title { font-size: 14.5px; font-weight: 700; color: #fff; margin: 0 0 3px; }
.zh-ship-desc  { font-size: 12.5px; color: rgba(255,255,255,0.65); margin: 0; line-height: 1.5; }

.zh-newsletter { background: linear-gradient(135deg, var(--zuky-pink) 0%, var(--zuky-purple) 100%); padding: 52px 24px; margin-bottom: 0; display: block; }
.zh-newsletter-inner { max-width: 560px; margin: 0 auto; text-align: center; }
.zh-nl-emoji { font-size: 36px; margin-bottom: 12px; }
.zh-nl-title { font-size: 26px; font-weight: 800; color: #fff; margin: 0 0 8px; }
.zh-nl-sub   { font-size: 14px; color: rgba(255,255,255,0.85); margin: 0 0 24px; }
.zh-nl-form  { display: flex; border-radius: 50px; overflow: hidden; box-shadow: 0 8px 28px rgba(0,0,0,0.2); }
.zh-nl-input {
    flex: 1; border: none; outline: none; padding: 14px 22px;
    font-size: 14px; font-family: inherit; border-radius: 50px 0 0 50px;
}
.zh-nl-btn {
    background: var(--zuky-dark); color: #fff; border: none;
    padding: 14px 26px; font-size: 14px; font-weight: 700; cursor: pointer;
    border-radius: 0 50px 50px 0; white-space: nowrap; transition: background .2s;
}
.zh-nl-btn:hover { background: #000; }
</style>

<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($banner as $index => $bk)
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="{{ $index }}"
                class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($banner as $index => $banners)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('public/uploads/banners/'.$banners->banner) }}" alt="Banner {{ $index+1 }}">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="zh-promo-strip">
    <div class="zh-promo-track">
        @for($i=0; $i<2; $i++)
        <div class="zh-promo-item"><i class="fa-solid fa-truck-fast"></i> Free Delivery on orders ₹499+</div>
        <div class="zh-promo-item"><i class="fa-solid fa-rotate-left"></i> Easy 7-Day Returns</div>
        <div class="zh-promo-item"><i class="fa-solid fa-lock"></i> 100% Secure Payments</div>
        <div class="zh-promo-item"><i class="fa-solid fa-star"></i> 10,000+ Happy Customers</div>
        <div class="zh-promo-item"><i class="fa-solid fa-tag"></i> Use code ZUKY10 for 10% off</div>
        <div class="zh-promo-item"><i class="fa-solid fa-gift"></i> Gift wrapping available</div>
        @endfor
    </div>
</div>

<section class="zh-cat-section">
    <div class="zh-section-head">
        <div class="zh-section-tag">🛍️ Shop by Category</div>
        <h2 class="zh-section-title">Find Your <span>Kawaii</span> Style</h2>
        <p class="zh-section-sub">Explore our curated collections handpicked for you</p>
        <div class="zh-section-line"><span class="zh-dot"></span></div>
    </div>
    <div class="zh-cat-grid">
        @php $catEmojis = ['🐰','🎀','✨','🌸','🎁','💖','🌈','🦋']; $ei = 0; @endphp
        @foreach($catlimit as $catcall)
        <a href="{{url('product-list/'.$catcall->id)}}" class="zh-cat-card">
            <img src="{{ asset('public/uploads/banners/'.$catcall->image) }}" alt="{{ $catcall->category_name }}">
            <div class="zh-cat-overlay"></div>
            <div class="zh-cat-icon-badge">{{ $catEmojis[$ei % count($catEmojis)] }}</div>
            <div class="zh-cat-label">
                <h3>{{$catcall->category_name}}</h3>
                <span>Shop now →</span>
            </div>
        </a>
        @php $ei++; @endphp
        @endforeach
    </div>
</section>

<section class="zh-products-section bg-white">
    <div class="zh-section-head">
        <div class="zh-section-tag">🔥 Hot Right Now</div>
        <h2 class="zh-section-title">Featured <span>Products</span></h2>
        <p class="zh-section-sub">Our most-loved kawaii picks — loved by thousands!</p>
        <div class="zh-section-line"><span class="zh-dot"></span></div>
    </div>
    <div class="zh-prod-grid">
        @foreach($fastmovingProducts->take(8) as $productList)
        @php
            $inCart = in_array($productList->id, $cartProductIds);
            $dPct   = ($productList->mrp > 0 && $productList->mrp > $productList->sr) ? round((($productList->mrp - $productList->sr)/$productList->mrp)*100) : 0;
            $bname  = !empty($productList->author_name) ? $productList->author_name : 'Zuky';
            $rating = number_format(rand(40,50)/10, 1);
            $rcount = rand(50,500);
        @endphp
        <div class="zh-prod-card">
            <div class="zh-prod-img-wrap">
                <a href="{{ url('product/'.$productList->slug) }}">
                    <img src="{{ asset('public/assets/img/items/'.$productList->image) }}" alt="{{ $productList->name }}" loading="lazy">
                </a>
                @if($dPct > 0)<span class="zh-badge-discount">{{ $dPct }}% OFF</span>@endif
                <button class="zh-wishlist-btn" onclick="this.classList.toggle('active')"><i class="fa-regular fa-heart"></i></button>
                <div class="zh-quick-overlay">
                    <a href="{{ url('product/'.$productList->slug) }}" class="zh-quick-btn"><i class="fa-solid fa-eye"></i> Quick View</a>
                </div>
            </div>
            <div class="zh-prod-body">
                <div class="zh-prod-brand">{{ $bname }}</div>
                <div class="zh-prod-name">{{ $productList->name }}</div>
                <div class="zh-prod-rating">
                    <div class="zh-rating-stars">
                        @for($s=1;$s<=5;$s++)<i class="fa-star {{ $s <= round($rating) ? 'fa-solid' : 'fa-regular empty' }}"></i>@endfor
                    </div>
                    <span class="zh-rating-count">({{ $rcount }})</span>
                </div>
                <div class="zh-prod-prices">
                    <span class="zh-price-sp">₹{{ number_format($productList->sr,2) }}</span>
                    @if($productList->mrp > $productList->sr)
                    <span class="zh-price-mrp">₹{{ number_format($productList->mrp,2) }}</span>
                    @if($dPct > 0)<span class="zh-price-off">{{ $dPct }}% off</span>@endif
                    @endif
                </div>
            </div>
            <div class="zh-prod-foot">
                @if($inCart)
                <a href="{{ url('cart') }}" class="zh-go-btn"><i class="fa-solid fa-bag-shopping"></i> Go to Cart</a>
                @else
                <a href="{{ url('product/'.$productList->slug) }}" class="zh-atc-btn"><i class="fa-solid fa-cart-plus"></i> View Details</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="zh-view-all-wrap">
        <a href="{{ url('product-list') }}" class="zh-view-all-btn">View All Products <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>

<section class="zh-products-section bg-pastel">
    <div class="zh-section-head">
        <div class="zh-section-tag">✨ Just Dropped</div>
        <h2 class="zh-section-title"><span>New</span> Arrivals</h2>
        <p class="zh-section-sub">Fresh picks added to our collection — be the first!</p>
        <div class="zh-section-line"><span class="zh-dot"></span></div>
    </div>
    <div class="zh-prod-grid">
        @foreach($fastmovingProducts->shuffle()->take(4) as $productList)
        @php
            $inCart = in_array($productList->id, $cartProductIds);
            $dPct   = ($productList->mrp > 0 && $productList->mrp > $productList->sr) ? round((($productList->mrp - $productList->sr)/$productList->mrp)*100) : 0;
            $bname  = !empty($productList->author_name) ? $productList->author_name : 'Zuky';
            $rating = number_format(rand(40,50)/10, 1);
            $rcount = rand(30,200);
        @endphp
        <div class="zh-prod-card">
            <div class="zh-prod-img-wrap">
                <a href="{{ url('product/'.$productList->slug) }}">
                    <img src="{{ asset('public/assets/img/items/'.$productList->image) }}" alt="{{ $productList->name }}" loading="lazy">
                </a>
                <span class="zh-badge-new">🆕 New</span>
                <button class="zh-wishlist-btn" onclick="this.classList.toggle('active')"><i class="fa-regular fa-heart"></i></button>
                <div class="zh-quick-overlay">
                    <a href="{{ url('product/'.$productList->slug) }}" class="zh-quick-btn"><i class="fa-solid fa-eye"></i> Quick View</a>
                </div>
            </div>
            <div class="zh-prod-body">
                <div class="zh-prod-brand">{{ $bname }}</div>
                <div class="zh-prod-name">{{ $productList->name }}</div>
                <div class="zh-prod-rating">
                    <div class="zh-rating-stars">
                        @for($s=1;$s<=5;$s++)<i class="fa-star {{ $s <= round($rating) ? 'fa-solid' : 'fa-regular empty' }}"></i>@endfor
                    </div>
                    <span class="zh-rating-count">({{ $rcount }})</span>
                </div>
                <div class="zh-prod-prices">
                    <span class="zh-price-sp">₹{{ number_format($productList->sr,2) }}</span>
                    @if($productList->mrp > $productList->sr)
                    <span class="zh-price-mrp">₹{{ number_format($productList->mrp,2) }}</span>
                    @if($dPct > 0)<span class="zh-price-off">{{ $dPct }}% off</span>@endif
                    @endif
                </div>
            </div>
            <div class="zh-prod-foot">
                @if($inCart)
                <a href="{{ url('cart') }}" class="zh-go-btn"><i class="fa-solid fa-bag-shopping"></i> Go to Cart</a>
                @else
                <a href="{{ url('product/'.$productList->slug) }}" class="zh-atc-btn"><i class="fa-solid fa-cart-plus"></i> View Details</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="zh-products-section bg-mint">
    <div class="zh-section-head">
        <div class="zh-section-tag" style="color:var(--zuky-teal);background:#e0f2f1;">⭐ Customer Favorites</div>
        <h2 class="zh-section-title">Best <span style="color:var(--zuky-teal);">Sellers</span></h2>
        <p class="zh-section-sub">Top-rated products our customers can't stop buying</p>
        <div class="zh-section-line"><span class="zh-dot" style="background:var(--zuky-teal);"></span></div>
    </div>
    <div class="zh-prod-grid">
        @foreach($fastmovingProducts->reverse()->take(4) as $productList)
        @php
            $inCart = in_array($productList->id, $cartProductIds);
            $dPct   = ($productList->mrp > 0 && $productList->mrp > $productList->sr) ? round((($productList->mrp - $productList->sr)/$productList->mrp)*100) : 0;
            $bname  = !empty($productList->author_name) ? $productList->author_name : 'Zuky';
            $rating = number_format(rand(44,50)/10, 1);
            $rcount = rand(200,800);
        @endphp
        <div class="zh-prod-card">
            <div class="zh-prod-img-wrap">
                <a href="{{ url('product/'.$productList->slug) }}">
                    <img src="{{ asset('public/assets/img/items/'.$productList->image) }}" alt="{{ $productList->name }}" loading="lazy">
                </a>
                <span class="zh-badge-bestseller">⭐ Bestseller</span>
                <button class="zh-wishlist-btn" onclick="this.classList.toggle('active')"><i class="fa-regular fa-heart"></i></button>
                <div class="zh-quick-overlay">
                    <a href="{{ url('product/'.$productList->slug) }}" class="zh-quick-btn"><i class="fa-solid fa-eye"></i> Quick View</a>
                </div>
            </div>
            <div class="zh-prod-body">
                <div class="zh-prod-brand">{{ $bname }}</div>
                <div class="zh-prod-name">{{ $productList->name }}</div>
                <div class="zh-prod-rating">
                    <div class="zh-rating-stars">
                        @for($s=1;$s<=5;$s++)<i class="fa-star {{ $s <= round($rating) ? 'fa-solid' : 'fa-regular empty' }}"></i>@endfor
                    </div>
                    <span class="zh-rating-count">({{ $rcount }})</span>
                </div>
                <div class="zh-prod-prices">
                    <span class="zh-price-sp">₹{{ number_format($productList->sr,2) }}</span>
                    @if($productList->mrp > $productList->sr)
                    <span class="zh-price-mrp">₹{{ number_format($productList->mrp,2) }}</span>
                    @if($dPct > 0)<span class="zh-price-off">{{ $dPct }}% off</span>@endif
                    @endif
                </div>
            </div>
            <div class="zh-prod-foot">
                @if($inCart)
                <a href="{{ url('cart') }}" class="zh-go-btn"><i class="fa-solid fa-bag-shopping"></i> Go to Cart</a>
                @else
                <a href="{{ url('product/'.$productList->slug) }}" class="zh-atc-btn" style="background:linear-gradient(135deg,var(--zuky-teal),var(--zuky-mint))!important;"><i class="fa-solid fa-cart-plus"></i> View Details</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="zh-view-all-wrap">
        <a href="{{ url('product-list') }}" class="zh-view-all-btn" style="background:linear-gradient(135deg,var(--zuky-teal),var(--zuky-mint));">Shop All Bestsellers <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>

<section class="zh-testimonials">
    <div class="zh-section-head">
        <div class="zh-section-tag">💬 Happy Customers</div>
        <h2 class="zh-section-title">What Our <span>Customers</span> Say</h2>
        <p class="zh-section-sub">Real reviews from real kawaii lovers 🐰</p>
        <div class="zh-section-line"><span class="zh-dot"></span></div>
    </div>
    <div class="zh-testi-grid">
        <div class="zh-testi-card">
            <div class="zh-testi-quote"><i class="fa-solid fa-quote-left"></i></div>
            <div class="zh-testi-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="zh-testi-text">"Absolutely obsessed with my purchase! The quality is amazing and the packaging was so cute. Will definitely be ordering again from Zuky! 🎀"</p>
            <div class="zh-testi-author">
                <div class="zh-testi-avatar">P</div>
                <div><p class="zh-testi-name">Priya Sharma</p><p class="zh-testi-loc">📍 Kochi, Kerala</p></div>
            </div>
        </div>
        <div class="zh-testi-card">
            <div class="zh-testi-quote"><i class="fa-solid fa-quote-left"></i></div>
            <div class="zh-testi-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="zh-testi-text">"Super fast delivery and the product was exactly as shown. The kawaii designs are so unique! My kids loved the stationery. Highly recommend! ✨"</p>
            <div class="zh-testi-author">
                <div class="zh-testi-avatar" style="background:linear-gradient(135deg,#e0f2f1,#b2dfdb);color:var(--zuky-teal);">A</div>
                <div><p class="zh-testi-name">Anjali Menon</p><p class="zh-testi-loc">📍 Trivandrum, Kerala</p></div>
            </div>
        </div>
        <div class="zh-testi-card">
            <div class="zh-testi-quote"><i class="fa-solid fa-quote-left"></i></div>
            <div class="zh-testi-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></div>
            <p class="zh-testi-text">"Ordered as a gift for my daughter and she was thrilled! The packaging feels premium and the products are so adorable. Great experience overall! 🐰"</p>
            <div class="zh-testi-author">
                <div class="zh-testi-avatar" style="background:linear-gradient(135deg,#f3e5f5,#e1bee7);color:var(--zuky-purple);">R</div>
                <div><p class="zh-testi-name">Reshma Nair</p><p class="zh-testi-loc">📍 Calicut, Kerala</p></div>
            </div>
        </div>
    </div>
</section>

<section class="zh-why-section">
    <div class="zh-section-head">
        <div class="zh-section-tag">💖 Why Zuky?</div>
        <h2 class="zh-section-title">Why Shop <span>With Us</span></h2>
        <p class="zh-section-sub">We go the extra mile to make your experience special</p>
        <div class="zh-section-line"><span class="zh-dot"></span></div>
    </div>
    <div class="zh-why-grid">
        <div class="zh-why-card">
            <div class="zh-why-icon pink"><i class="fa-solid fa-award"></i></div>
            <h3 class="zh-why-title">Premium Quality</h3>
            <p class="zh-why-desc">Every product is hand-selected for quality and cuteness. Only the best kawaii finds make it to our store.</p>
        </div>
        <div class="zh-why-card">
            <div class="zh-why-icon teal"><i class="fa-solid fa-truck-fast"></i></div>
            <h3 class="zh-why-title">Fast Delivery</h3>
            <p class="zh-why-desc">Free shipping on orders above ₹499. Quick dispatch ensures your kawaii goodies reach you in record time.</p>
        </div>
        <div class="zh-why-card">
            <div class="zh-why-icon purple"><i class="fa-solid fa-shield-halved"></i></div>
            <h3 class="zh-why-title">Secure Payments</h3>
            <p class="zh-why-desc">Shop with confidence using our 100% secure payment gateway. Your data is always safe with us.</p>
        </div>
        <div class="zh-why-card">
            <div class="zh-why-icon yellow"><i class="fa-solid fa-rotate-left"></i></div>
            <h3 class="zh-why-title">Easy Returns</h3>
            <p class="zh-why-desc">Not happy? No problem! Hassle-free 7-day return policy. We care about your satisfaction above all.</p>
        </div>
    </div>
</section>

<section class="zh-shipping-section">
    <div class="zh-ship-grid">
        <div class="zh-ship-item">
            <div class="zh-ship-icon"><i class="fa-solid fa-truck-fast"></i></div>
            <div><p class="zh-ship-title">Free Shipping</p><p class="zh-ship-desc">On all orders above ₹499. Pan-India delivery available.</p></div>
        </div>
        <div class="zh-ship-item">
            <div class="zh-ship-icon"><i class="fa-solid fa-clock"></i></div>
            <div><p class="zh-ship-title">3–5 Day Delivery</p><p class="zh-ship-desc">Most orders delivered within 3–5 business days across India.</p></div>
        </div>
        <div class="zh-ship-item">
            <div class="zh-ship-icon"><i class="fa-solid fa-box-open"></i></div>
            <div><p class="zh-ship-title">Safe Packaging</p><p class="zh-ship-desc">All products are bubble-wrapped & packed with love. 🐰</p></div>
        </div>
        <div class="zh-ship-item">
            <div class="zh-ship-icon"><i class="fa-solid fa-headset"></i></div>
            <div><p class="zh-ship-title">24/7 Support</p><p class="zh-ship-desc">Our customer care team is always here to help you.</p></div>
        </div>
    </div>
</section>

<section class="zh-newsletter">
    <div class="zh-newsletter-inner">
        <div class="zh-nl-emoji">🐰✉️</div>
        <h2 class="zh-nl-title">Join the Zuky Family!</h2>
        <p class="zh-nl-sub">Subscribe for exclusive deals, new arrivals & kawaii inspiration straight to your inbox.</p>
        <form class="zh-nl-form" onsubmit="return false;">
            <input type="email" class="zh-nl-input" placeholder="Enter your email address...">
            <button type="submit" class="zh-nl-btn">Subscribe 🎀</button>
        </form>
    </div>
</section>

@endsection