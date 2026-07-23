@extends('layouts.weblayout')

@section('content')

<style>
.pl-page { background: #f1f3f6; padding: 20px 0 48px; }
.pl-wrap { max-width: 1280px; margin: 0 auto; padding: 0 16px; }

.pl-breadcrumb { background: #fff; border-bottom: 1px solid #e8e8e8; padding: 11px 0; }
.pl-breadcrumb-inner {
    max-width: 1280px; margin: 0 auto; padding: 0 16px;
    font-size: 13px; color: #777; display: flex; align-items: center; gap: 6px;
}
.pl-breadcrumb-inner a { color: #555; text-decoration: none; }
.pl-breadcrumb-inner a:hover { color: #2874f0; }

.pl-top-bar {
    display: flex; align-items: center; justify-content: space-between;
    background: #fff; border: 1px solid #ddd; border-radius: 3px;
    padding: 14px 20px; margin-bottom: 16px; flex-wrap: wrap; gap: 12px;
}
.pl-top-bar-title { font-size: 20px; font-weight: 700; color: #212121; }
.pl-top-bar-count { font-size: 13px; color: #878787; font-weight: 400; margin-left: 8px; }

.pl-cat-tabs { display: flex; align-items: center; overflow-x: auto; scrollbar-width: none; }
.pl-cat-tabs::-webkit-scrollbar { display: none; }
.pl-cat-tab {
    flex-shrink: 0; padding: 7px 18px; font-size: 13px; font-weight: 500; color: #555;
    cursor: pointer; border: 1px solid #e0e0e0; border-right: none;
    background: #fff; transition: all 0.15s; white-space: nowrap;
}
.pl-cat-tab:first-child { border-radius: 3px 0 0 3px; }
.pl-cat-tab:last-child { border-right: 1px solid #e0e0e0; border-radius: 0 3px 3px 0; }
.pl-cat-tab:hover, .pl-cat-tab.pl-active { background: #2874f0; color: #fff; border-color: #2874f0; }

.pl-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
}

.pl-card {
    background: #fff; border: 1px solid #ddd; border-radius: 3px;
    overflow: hidden; display: flex; flex-direction: column;
    position: relative; transition: box-shadow 0.2s ease;
}
.pl-card:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.12); }

.pl-card-img-wrap {
    position: relative; background: #f9f9f9;
    overflow: hidden; aspect-ratio: 4/5;
    border-bottom: 1px solid #f0f0f0;
}
.pl-card-img-wrap a { display: block; height: 100%; }
.pl-card-img-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.35s ease; display: block;
}
.pl-card:hover .pl-card-img-wrap img { transform: scale(1.04); }

.pl-disc-badge {
    position: absolute; top: 8px; left: 8px;
    background: #388e3c; color: #fff;
    font-size: 11px; font-weight: 700; padding: 3px 7px;
    border-radius: 2px; z-index: 2;
}
.pl-wishlist-btn {
    position: absolute; top: 8px; right: 8px;
    width: 32px; height: 32px; border-radius: 50%;
    background: rgba(255,255,255,0.9); border: 1px solid #e0e0e0;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; z-index: 2; box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    transition: all 0.2s;
}
.pl-wishlist-btn:hover { background: #fff3f3; border-color: #e53935; }
.pl-wishlist-btn i { font-size: 13px; color: #555; }
.pl-wishlist-btn:hover i { color: #e53935; }

.pl-card-body { padding: 12px; flex: 1; display: flex; flex-direction: column; }
.pl-brand { font-size: 11px; font-weight: 700; color: #2874f0; text-transform: uppercase; margin-bottom: 3px; }
.pl-name {
    font-size: 13px; color: #212121; font-weight: 400; line-height: 1.4;
    margin-bottom: 6px; height: 37px; overflow: hidden;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
}
.pl-rating-row { display: flex; align-items: center; gap: 5px; margin-bottom: 8px; }
.pl-rating-chip {
    display: inline-flex; align-items: center; gap: 3px;
    background: #388e3c; color: #fff;
    font-size: 11px; font-weight: 700; padding: 2px 7px; border-radius: 2px;
}
.pl-rating-chip i { font-size: 9px; }
.pl-rating-cnt { font-size: 11px; color: #878787; }

.pl-price-row { display: flex; align-items: baseline; gap: 6px; margin-bottom: 10px; flex-wrap: wrap; }
.pl-sp { font-size: 16px; font-weight: 700; color: #212121; }
.pl-mrp { font-size: 12px; color: #878787; text-decoration: line-through; }
.pl-off { font-size: 12px; color: #388e3c; font-weight: 600; }




.pl-card-foot {
    border-top: 1px solid #f0f0f0;
    margin-top: auto;
}
.pl-btn-cart {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 7px !important;
    width: 100% !important;
    padding: 12px 10px !important;
    border: none !important;
    margin: 0 !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    cursor: pointer !important;
    background: #ff9f00 !important;
    color: #fff !important;
    transition: background 0.2s !important;
    text-decoration: none !important;
    letter-spacing: 0.3px !important;
    white-space: nowrap !important;
    box-sizing: border-box !important;
    font-family: inherit !important;
    line-height: 1 !important;
    position: static !important;
    bottom: auto !important;
    left: auto !important;
    z-index: auto !important;
    text-transform: none !important;
    text-align: center !important;
}
.pl-btn-cart:hover { background: #e08e00 !important; color: #fff !important; }
.pl-btn-cart * { color: #fff !important; }



.pl-empty {
    grid-column: 1/-1; text-align: center; padding: 80px 20px;
    background: #fff; border: 1px solid #ddd; border-radius: 3px;
}

@media (max-width: 1100px) { .pl-grid { grid-template-columns: repeat(3,1fr); } }
@media (max-width: 720px)  { .pl-grid { grid-template-columns: repeat(2,1fr); gap: 8px; } }
</style>

<div class="pl-breadcrumb">
    <div class="pl-breadcrumb-inner">
        <a href="{{url('index')}}">Home</a>
        <span>›</span>
        <span style="color:#212121;font-weight:500;">All Products</span>
    </div>
</div>

<div class="pl-page">
    <div class="pl-wrap">

        <div class="pl-top-bar">
            <div>
                <span class="pl-top-bar-title">All Products</span>
                <span class="pl-top-bar-count">({{ count($items) }} items)</span>
            </div>
            <div class="pl-cat-tabs">
                <div class="pl-cat-tab pl-active" onclick="plFilter(this,'all')">All</div>
                @foreach($category as $cat)
                <div class="pl-cat-tab" onclick="plFilter(this,'{{ $cat->id }}')">{{ $cat->category_name }}</div>
                @endforeach
            </div>
        </div>

        <div class="product-grid" >
        @foreach($items as $p)

<article class="product-card" data-id="{{ $p->id }}" role="button" tabindex="0" aria-label="{{ $p->name }}">
   
    <div class="product-img-wrap">

       

        
      <img src="{{ asset('public/assets/img/items/'.$p->image) }}" alt="{{ $p->name }}" loading="lazy"> 

        <div class="product-overlay" aria-hidden="true">
            <!-- <button class="overlay-btn add-to-cart overlay-cart" data-id="{{ $p->id }}">
                <i class="ri-shopping-cart-line"></i> Add to Cart
            </button> -->

             <a href="{{url('product/'.$p->slug)}}"><button class="overlay-btn overlay-view" data-id="{{ $p->id }}">
                <i class="ri-eye-line"></i> Quick View
            </button></a>
        </div>
    </div>

    <div class="product-info">

        <div class="product-brand">
            {{ $p->author_name }}
        </div>

        <div class="product-name">
            {{ $p->name }}
        </div>

        <div class="product-rating">
            <span class="stars-display">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor(5))
                        <i class="ri-star-fill"></i>
                    @else
                        <i class="ri-star-line"></i>
                    @endif
                @endfor
            </span>

            <span class="rating-count">
                5 
            </span>
        </div>

        <div class="product-price-row">
            <div>
                <span class="price-main">
                    ₹{{ number_format($p->sr, 2) }}
                </span>

                <span class="price-original">
                    ₹{{ number_format($p->mrp, 2) }}
                </span>
            </div>

            <span class="price-save">
                Save ₹{{ number_format($p->mrp - $p->sr, 2) }}
            </span>
        </div>

    </div>
</article>

        @endforeach
      </div>

        <!-- <div class="pl-grid" id="plGrid">
            @forelse($items as $p)
            @php
                $inCart   = in_array($p->id, $cartProductIds);
                $discPct  = ($p->mrp > 0 && $p->mrp > $p->sr) ? round((($p->mrp - $p->sr) / $p->mrp) * 100) : 0;
                $brand    = !empty($p->author_name) ? $p->author_name : 'Brandson';
            @endphp

            <div class="pl-card" data-cat="{{ $p->cat_id }}">
                <div class="pl-card-img-wrap">
                    <a href="{{ url('product/'.$p->slug) }}">
                        <img src="{{ asset('public/assets/img/items/'.$p->image) }}" alt="{{ $p->name }}" loading="lazy">
                    </a>
                    @if($discPct > 0)
                    <span class="pl-disc-badge">{{ $discPct }}% OFF</span>
                    @endif
                    <button class="pl-wishlist-btn" type="button" title="Save to Wishlist">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>

                <div class="pl-card-body">
                    <div class="pl-brand">{{ $brand }}</div>
                    <div class="pl-name">{{ $p->name }}</div>

                    <div class="pl-rating-row">
                        <div class="pl-rating-chip">4.1 <i class="fa-solid fa-star"></i></div>
                        <span class="pl-rating-cnt">(128)</span>
                    </div>

                    <div class="pl-price-row">
                        <span class="pl-sp">₹{{ number_format($p->sr, 2) }}</span>
                        @if($p->mrp > $p->sr)
                        <span class="pl-mrp">₹{{ number_format($p->mrp, 2) }}</span>
                        @if($discPct > 0)
                        <span class="pl-off">{{ $discPct }}% off</span>
                        @endif
                        @endif
                    </div>

                    <div class="pl-card-foot">
                        @if($inCart)
                        <a href="{{ url('cart') }}" class="pl-btn-cart go">
                            <i class="fa-solid fa-cart-shopping" style="font-size:13px;"></i> Go to Cart
                        </a>
                        @else
                        <a href="{{ url('product/'.$p->slug) }}" class="pl-btn-cart add " data-id="{{ $p->id }}">
                            <i class="fa-solid fa-cart-plus" style="font-size:13px;"></i>
                            <span class="btn-text">Add to Cart</span>
                            <span class="btn-loader d-none"><i class="fa fa-spinner fa-spin"></i></span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="pl-empty">
                <div style="font-size:48px;opacity:.2;margin-bottom:12px;">📦</div>
                <div style="font-size:16px;color:#878787;">No products found</div>
            </div>
            @endforelse
        </div> -->

    </div>
</div>

<script>
function plFilter(el, catId) {
    document.querySelectorAll('.pl-cat-tab').forEach(function(t){ t.classList.remove('pl-active'); });
    el.classList.add('pl-active');
    document.querySelectorAll('#plGrid .pl-card').forEach(function(card){
        card.style.display = (catId === 'all' || card.dataset.cat == catId) ? '' : 'none';
    });
}
</script>

@endsection
