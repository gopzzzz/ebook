<!DOCTYPE html>
<html lang="en">

@include('layouts.webpartials.head')

<body>

    <div id="header-wrap">


        @include('layouts.webpartials.header')

    </div>


    @yield('content') @include('layouts.webpartials.footer') @include('layouts.webpartials.footerscript')



</body>

</html>