	<script src="{{asset('web/js/jquery-1.11.0.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="{{asset('web/js/plugins.js')}}"></script>
	<script src="{{asset('web/js/script.js')}}"></script>

	
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

    var id = $(this).data('id');

    if (id) {
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
                    // alert('Product added to cart');
                    $('#carts').text(res.count); // update cart number
                } 
                else if (res.status == 1) {
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