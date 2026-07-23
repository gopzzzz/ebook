<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>

@include('layouts.partials.head')

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">


                @include('layouts.partials.navbar')

                 <div class="layout-page">

                
                @include('layouts.partials.header') 
                

          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
                
                @yield('content') 

                      </div>

                
                
                @include('layouts.partials.footer')


            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>


   @include('layouts.partials.footer-scripts')



  </body>
</html>
