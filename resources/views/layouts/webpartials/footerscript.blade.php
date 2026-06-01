
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="{{asset('public/web/js/plugins.js')}}"></script>
	<script src="{{asset('public/web/js/script.js')}}"></script>
	 <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
	
<script>
$(document).ready(function(){

    $("#confirm_password").keyup(function(){

        var pass = $("#password").val();
        var cpass = $("#confirm_password").val();

        if(pass != cpass){
            $("#pass_error").text("Passwords do not match");
        }else{
            $("#pass_error").text("");
        }

    });

$('.add-to-cart').on('click', function () {

    var button = $(this);
    var id = button.data('id');

    if (id) {

        // 🔄 Show loader
        button.find('.btn-text').addClass('d-none');
        button.find('.btn-loader').removeClass('d-none');
        button.prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "{{ route('add-to-cart') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            success: function (res) {

                console.log(res);

                if (res.status == 0) {

                    $('#carts').text(res.count);

                    // ⏳ Delay 2 seconds then redirect
                    setTimeout(function () {
                        window.location.href = "{{ url('cart') }}";
                    }, 2000);

                } 
                else if (res.status == 1) {

                    setTimeout(function () {
                        window.location.href = "{{ url('userlogin') }}";
                    }, 2000);
                }

            },
            error: function () {

                alert('Something went wrong');

                // ❌ Reset button
                button.find('.btn-text').removeClass('d-none');
                button.find('.btn-loader').addClass('d-none');
                button.prop('disabled', false);
            }
        });
    }
});

$('.btn-increment').on('click', function () {

    var id = $(this).data('id');
    var vid = $(this).data('vid');

    if (id) {
        $.ajax({
            type: "POST",
            url: "{{ route('changeqty') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                vid: vid
            },
            success: function (res) {

                console.log(res);

                if (res.status == 0) {

                    // ✅ update individual qty
                    $('#qty_' + id).text(res.count);
                    $('#subtotal').text(res.subtotal);
                    $('#discount').text(res.discount);
                    $('#grandtotal').text(res.grandtotal + 60 );
                    $('#carts').text(res.count);
                    

                     if(res.qty == 0){
                        $('#cart-item_'+id).empty();
                    }
                    if(res.count == 0){
                        $('#checkout-btn').hide();
                    }


                } else if (res.status == 1) {
                    window.location.href = "{{ url('userlogin') }}";
                }

            },
            error: function () {
                alert('Something went wrong');
            }
        });
    }
});

});

$('#search').on('keyup', function () {
    let query = $(this).val();

    if (query.length > 0) {
        $.ajax({
            url: "{{ route('search.customers') }}",
            type: "GET",
            data: { query: query },
            success: function (data) {
                $('#search-list').html(data).show();
            }
        });
    } else {
        $('#search-list').hide();
    }
});

// click select
$(document).on('click', '#search-list div', function () {
    $('#search').val($(this).text());
    $('#search-list').hide();
});
</script>

<script>
$("form").submit(function(){

    var pass = $("#password").val();
    var cpass = $("#confirm_password").val();

    if(pass != cpass){
        alert("Passwords do not match");
        return false;
    }

});
</script>

<script>
$(document).ready(function () {

    $("#payNow").click(function (e) {
        e.preventDefault();

        const btn = $(this);
        btn.prop("disabled", true);

        let selectedShipping = document.querySelector('input[name="shipping_id"]:checked');

        if (!selectedShipping) {
            alert("Please select a shipping address");
            btn.prop("disabled", false);
            return;
        }

        $.ajax({
            type: "POST",
            url: "{{ route('checkout') }}",
            data: {
                _token: "{{ csrf_token() }}",
                shipping_id: selectedShipping.value, // ✅ FIXED
            },
            success: function (res) {
                console.log(res);
                if (!res.payment_session_id) {
                    alert("Failed to create order");
                    btn.prop("disabled", false);
                    return;
                }

                const cashfree = Cashfree({
                    mode: "production"
                });

                cashfree.checkout({
                    paymentSessionId: res.payment_session_id,
                    redirectTarget: "_self"
                });
            },
            error: function () {
                alert("Server error");
                btn.prop("disabled", false);
            }
        });
    });

});
</script>

<script>
    $(document).ready(function(){
$('input[type="radio"]').on('change', function () {
    $('input[type="radio"]').not(this).prop('checked', false);
});

$('#checkout').on('submit', function (e) {

        if (!$('input[name="shipping_id"]:checked').val()) {
            e.preventDefault();
            alert('Please select a shipping address');
        }

    });

});
</script>