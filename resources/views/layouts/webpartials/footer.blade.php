<style>
/* ═══════════════════════════════════
   ZUKY FOOTER — Dark Kawaii Theme
═══════════════════════════════════ */
footer#footer {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%) !important;
    padding: 56px 0 32px !important;
    border-top: 3px solid #e91e8c !important;
    margin-top: 0 !important;
}
.zuky-footer-brand p {
    color: rgba(255,255,255,0.65);
    font-size: 13.5px;
    line-height: 1.7;
    margin: 10px 0 18px;
    max-width: 260px;
}
.zuky-footer-social {
    display: flex;
    gap: 10px;
    margin-top: 12px;
}
.zuky-footer-social a {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.12);
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,0.7);
    font-size: 14px;
    text-decoration: none;
    transition: background .2s, color .2s, transform .2s;
}
.zuky-footer-social a:hover {
    background: #e91e8c;
    border-color: #e91e8c;
    color: #fff;
    transform: scale(1.12);
}

#footer .footer-menu h5 {
    color: #fff !important;
    font-size: 15px;
    font-weight: 700 !important;
    margin-bottom: 16px;
    position: relative;
    padding-bottom: 10px;
}
#footer .footer-menu h5::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0;
    width: 28px; height: 2px;
    background: #e91e8c;
    border-radius: 2px;
}
#footer .footer-menu ul {
    list-style: none;
    margin: 0; padding: 0;
}
#footer .footer-menu ul li {
    margin-bottom: 8px;
}
#footer .footer-menu ul li a {
    color: rgba(255,255,255,0.6);
    font-size: 13.5px;
    text-decoration: none;
    transition: color .2s, padding-left .2s;
    display: block;
}
#footer .footer-menu ul li a:hover {
    color: #e91e8c;
    padding-left: 6px;
}

.zuky-footer-contact p {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    color: rgba(255,255,255,0.6);
    font-size: 13.5px;
    margin-bottom: 10px;
}
.zuky-footer-contact i {
    color: #e91e8c;
    margin-top: 3px;
    flex-shrink: 0;
}

/* Footer bottom */
#footer-bottom {
    background: rgba(0,0,0,0.35);
    padding: 16px 0;
    border-top: 1px solid rgba(255,255,255,0.07);
}
#footer-bottom .copyright p {
    font-size: 12.5px;
    color: rgba(255,255,255,0.45);
    margin: 0;
}
#footer-bottom .copyright a {
    color: #e91e8c;
    text-decoration: none;
}
#footer-bottom .copyright a:hover { text-decoration: underline; }

.footer-logo { max-height: 60px; width: auto; object-fit: contain; }
</style>

<footer id="footer">
    <div class="container">
        <div class="row g-4">

            {{-- Brand --}}
            <div class="col-md-4">
                <div class="zuky-footer-brand">
                    <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="Zuky Logo" class="footer-logo">
                    <p>{{$app_profile->description}}</p>
                    <p style="color:rgba(255,255,255,0.45);font-size:12px;">Cute & Kawaii finds for smart minds.<br>By <strong style="color:#e91e8c;">VIDHYA MART</strong></p>
                    <div class="zuky-footer-social">
                        <a href="{{$app_profile->facebook_link}}" target="_blank" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{$app_profile->twitter_link}}"  target="_blank" title="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="{{$app_profile->youtube_link}}"  target="_blank" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="{{$app_profile->insta_link}}"    target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-md-2">
                <div class="footer-menu">
                    <h5>Quick Links</h5>
                    <ul class="menu-list">
                        <li class="menu-item"><a href="{{url('index')}}">🏠 Home</a></li>
                        <li class="menu-item"><a href="{{url('product-list')}}">🛍️ Products</a></li>
                        <li class="menu-item"><a href="{{url('aboutus')}}">💫 About Us</a></li>
                        <li class="menu-item"><a href="{{url('contactus')}}">📩 Contact Us</a></li>
                    </ul>
                </div>
            </div>

            {{-- Legal --}}
            <div class="col-md-2">
                <div class="footer-menu">
                    <h5>Legal</h5>
                    <ul class="menu-list">
                        <li class="menu-item"><a href="{{url('privacy')}}" target="_blank">Privacy Policy</a></li>
                        <li class="menu-item"><a href="{{url('term-conditions')}}" target="_blank">Terms & Conditions</a></li>
                        <li class="menu-item"><a href="{{url('refund')}}" target="_blank">Refund Policy</a></li>
                    </ul>
                </div>
            </div>

            {{-- My Account --}}
            <div class="col-md-2">
                <div class="footer-menu">
                    <h5>My Account</h5>
                    <ul class="menu-list">
                        <li class="menu-item"><a href="{{url('userlogin')}}">Sign In</a></li>
                        <li class="menu-item"><a href="{{url('cart')}}">View Cart 🛒</a></li>
                        <li class="menu-item"><a href="{{url('userprofile')}}">My Profile</a></li>
                        <li class="menu-item"><a href="{{url('userprofile')}}">Track My Order</a></li>
                    </ul>
                </div>
            </div>

            {{-- Contact --}}
            <div class="col-md-2">
                <div class="footer-menu">
                    <h5>Contact</h5>
                    <div class="zuky-footer-contact">
                        <p><i class="fa-solid fa-location-dot"></i> <span>{{$app_profile->address}}</span></p>
                        <p><i class="fa-solid fa-phone"></i> <span>+91 {{$app_profile->phone_number}}</span></p>
                        <p><i class="fa-solid fa-envelope"></i> <span>{{$app_profile->email}}</span></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

<div id="footer-bottom">
    <div class="container">
        <div class="copyright">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <p>© {{ date('Y') }} Zuky by Vidhya Mart. All rights reserved. Developed by
                        <a href="https://routeqinnovations.com/" target="_blank">Routeq Innovations Private Limited</a>
                    </p>
                </div>
                <div class="col-md-3 text-end">
                    <div style="display:flex;gap:12px;justify-content:flex-end;">
                        <a href="{{$app_profile->facebook_link}}" target="_blank" style="color:rgba(255,255,255,0.45);font-size:14px;"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{$app_profile->insta_link}}"    target="_blank" style="color:rgba(255,255,255,0.45);font-size:14px;"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{$app_profile->youtube_link}}"  target="_blank" style="color:rgba(255,255,255,0.45);font-size:14px;"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>