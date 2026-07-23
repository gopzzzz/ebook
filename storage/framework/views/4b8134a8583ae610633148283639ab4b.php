
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="<?php echo e(asset('web/js/plugins.js')); ?>"></script>
	<script src="<?php echo e(asset('web/js/script.js')); ?>"></script>
	 <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
     <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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

function savecart(callback = null) {

    let guestCart = JSON.parse(sessionStorage.getItem('guest_cart')) || [];

    // alert(guestCart.length);

    $.ajax({
        url: "<?php echo e(url('save-guest-cart')); ?>",
        type: "POST",
        data: {
            cart: guestCart,
            _token: "<?php echo e(csrf_token()); ?>"
        },
        success: function(response) {

            console.log('Cart Saved');

            if (callback) {
                callback(response);
            }
        }
    });
}






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
    var qty = 1;
    var size =$("#sizeselection").val();
    var hasSize = $(".pd-size-btn").length > 0;
   

//   alert(size);
    

   if (hasSize && (!size || size == 0)) {

         alert("Please select a size.");
        return;
    }

     // 🔄 Show loader
        button.find('.btn-text').addClass('d-none');
        button.find('.btn-loader').removeClass('d-none');
        button.prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "<?php echo e(route('add-to-cart')); ?>",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                id: id,size:size
            },
            success: function (res) {

                console.log(res);

                if (res.status == 0) {

                    $('#carts').text(res.count);
                    $('#mobilecart').text(res.count);

                    // ⏳ Delay 2 seconds then redirect
                    setTimeout(function () {
                        window.location.href = "<?php echo e(url('cart')); ?>";
                    }, 2000);

                } 
                else if (res.status == 1) {
                     let guestCart = JSON.parse(sessionStorage.getItem('guest_cart')) || [];

let existingProduct = guestCart.find(item =>
    item.product_id == id && item.size == size
);

if (existingProduct) {
    existingProduct.qty += parseInt(qty);
} else {
    guestCart.push({
        product_id: id,
        qty: parseInt(qty),
        size: size
    });
}

sessionStorage.setItem('guest_cart', JSON.stringify(guestCart));

$('#carts').text(guestCart.length);
$('#mobilecart').text(guestCart.length);
// console.log(guestCart);

savecart(function () {
    location.reload();
});
                 
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
    
});

$('.pd-size-btn').on('click', function () {
 var size = $(this).data('id');
    $('#sizeselection').val(size);

    console.log($('#sizeselection').val()); // XL
});

$('.btn-increment').on('click', function () {
  
  

    var id = $(this).data('id');
    var vid = $(this).data('vid');
    var userId = "<?php echo e(Auth::id()); ?>";

    
  

    if (userId) {
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('changeqty')); ?>",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
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
                    // $('#carts').text(res.count);
                    //  $('#mobilecart').text(res.count);
                    

                     if(res.qty == 0){
                        $('#cart-item_'+id).empty();
                    }
                    if(res.count == 0){
                        $('#checkout-btn').hide();
                    }


                } else if (res.status == 1) {
                    window.location.href = "<?php echo e(url('userlogin')); ?>";
                }

            },
            error: function () {
                alert('Something went wrong');
            }
        });
    }else{
        let guestCart = JSON.parse(sessionStorage.getItem('guest_cart')) || [];

console.log(guestCart);
console.log("Product ID:", id);
console.log("VID:", vid);

let existingProduct = guestCart.find(item => item.product_id == parseInt(id));

if (existingProduct) {

    if (vid == 1) {

        existingProduct.qty++;

    } else {

        existingProduct.qty--;

        if (existingProduct.qty <= 0) {
            guestCart = guestCart.filter(item => item.product_id != id);
            $('#cart-item_' + id).remove();
        }
    }

 sessionStorage.setItem('guest_cart', JSON.stringify(guestCart));

$('#qty_' + id).text(existingProduct.qty > 0 ? existingProduct.qty : 0);
$('#carts').text(guestCart.length);
$('#mobilecart').text(guestCart.length);

savecart(function () {
    location.reload();
});
   

} else {

    console.log('Product not found in guest cart');
}

//  window.location.reload();

    }
});



$('#search').on('keyup', function () {
    let query = $(this).val();

    if (query.length > 0) {
        $.ajax({
            url: "<?php echo e(route('search.customers')); ?>",
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

$("form").submit(function(){

    var pass = $("#password").val();
    var cpass = $("#confirm_password").val();

    if(pass != cpass){
        alert("Passwords do not match");
        return false;
    }

});



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
            url: "<?php echo e(route('checkout')); ?>",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
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



$('input[type="radio"]').on('change', function () {
    $('input[type="radio"]').not(this).prop('checked', false);
});

$('#checkout').on('submit', function (e) {

        if (!$('input[name="shipping_id"]:checked').val()) {
            e.preventDefault();
            alert('Please select a shipping address');
        }

    });



document.getElementById('payBtn').onclick = function () {

    if (!$('input[name="shipping_id"]:checked').length) {
        alert('Please select a shipping address.');
        return false;
    }

    var options = {
        key: "<?php echo e(env('RAZORPAY_KEY')); ?>",
        amount: ((parseFloat($('#totalAmount').val()) || 0) * 100) ,
        currency: "INR",
        name: "Brandson Clothings",
        description: "Order Payment",
  handler: function (response) {
    console.log(response);

            document.getElementById('razorpay_payment_id').value =
                response.razorpay_payment_id;

            document.getElementById('razorpay_order_id').value =
                response.razorpay_order_id;

            document.getElementById('razorpay_signature').value =
                response.razorpay_signature;

            document.getElementById('checkoutForm').submit();
        },
    };

    var rzp = new Razorpay(options);
    rzp.open();
};



   

    let guestCart = JSON.parse(sessionStorage.getItem('guest_cart')) || [];

     $('#carts').text(guestCart.length);
      $('#mobilecart').text(guestCart.length);

     


});
</script>
<!-- <script src="<?php echo e(asset('public/app.js')); ?>"></script> -->
<?php /**PATH C:\xampp\htdocs\ebook\resources\views/layouts/webpartials/footerscript.blade.php ENDPATH**/ ?>