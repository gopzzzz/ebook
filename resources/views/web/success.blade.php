@extends('layouts.weblayout')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">

            <div class="card shadow-sm">
                <div class="card-body text-center">

                    @if(session('success'))
                        <h3 class="mb-3 text-success">✅ Order Placed Successfully</h3>
                        <p>Order ID: <strong>#{{ session('success') }}</strong></p>
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