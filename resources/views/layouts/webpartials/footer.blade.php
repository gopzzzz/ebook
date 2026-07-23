  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="{{url('/')}}" class="footer-logo">
            <img src="{{asset('public/assets/logo.png')}}" alt="Pouch Gallery" class="footer-logo-img" />
            <span>POUCH GALLERY<sup>®</sup></span>
          </a>
          <p>Your one-stop shop for premium gaming peripherals, bags, and tech accessories. Trusted by 50,000+ customers across India.</p>
          <div class="social-links">
            <a href="{{$app_profile->insta_link}}" target="_blank" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
            <a href="{{$app_profile->facebook_link}}" target="_blank" aria-label="Facebook"><i class="ri-facebook-line"></i></a>
            <a href="{{$app_profile->youtube_link}}" target="_blank" aria-label="YouTube"><i class="ri-youtube-line"></i></a>
            <a href="{{$app_profile->twitter_link}}" aria-label="Twitter"><i class="ri-twitter-x-line"></i></a>
          </div>
        </div>
        <div class="footer-col">
          <h4>All Categories</h4>
          @foreach($catlimit as $fcat)
          <a href="{{url('gaming-products/'.$fcat->id)}}">{{$fcat->category_name}}</a>
          @endforeach
          
        </div>
        <div class="footer-col">
          <h4>Gaming</h4>
        
          <a href="{{url('')}}">Track Order</a>
           <a href="{{url('aboutus')}}">About Us</a>
          <a href="{{url('privacy')}}">Privacy Policy</a>
          <a href="{{url('term-conditions')}}">Terms & Conditions</a>
          <a href="{{url('refund')}}">Refund Policy</a>
          <a href="{{url('cancellation')}}">Cancellation Policy</a>
         
          <a href="{{url('contactus')}}">Contact Support</a>
        </div>
        <div class="footer-col">
          <h4>Contact Us</h4>
          <div class="footer-contact">
            <i class="ri-map-pin-line"></i>
            <span>{{$app_profile->address}}</span>
          </div>
          <div class="footer-contact">
            <i class="ri-phone-line"></i>
            <span>{{$app_profile->phone_number}}</span>
          </div>
          <div class="footer-contact">
            <i class="ri-mail-line"></i>
            <span>{{$app_profile->email}}</span>
          </div>
          <!-- <div class="footer-contact">
            <i class="ri-time-line"></i>
            <span>Mon–Sat: 9 AM – 7 PM</span>
          </div> -->
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2026 Pouch Gallery®. All rights reserved.</p>
        <div class="footer-links">
          <a href="https://routeqinnovations.com/" target="_blank">Designed & Developed By Routeq Innovations Pvt Ltd</a>
         
        </div>
      </div>
    </div>
  </footer>

  <div class="toast" id="cartToast">
    <i class="ri-shopping-cart-line"></i>
    <span id="toastMsg">Added to cart!</span>
  </div>

  <button class="back-top" id="backTop" aria-label="Back to top">
    <i class="ri-arrow-up-line"></i>
  </button>
