@extends('layouts.weblayout')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <div class="card">
        <div class="card-body">

     

 

   @if(session('success'))
     <h3 class="mb-2 text-center">✅ Order Placed Successfully</h3>
      <p class="text-center">
            <span>Order ID :  # {{ session('success') }}</span>
            
          </p>

@endif

         @if(session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif
          

         
        </div>
      </div>

    </div>
  </div>
</div>

@endsection