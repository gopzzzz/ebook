
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('public/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('public/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('public/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('public/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('public/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('public/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('public/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
    $(document).ready(function(){
    $('.editstatus').on('click',function(){


    var id = $(this).data('id');

    if (id) {
        $.ajax({
            type: "POST",
            url: "{{ route('getAddrees') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            success: function (res) {

                console.log(res);
                   var data = res.orders; // 🔥 important

    var address = data.address + '\n' +
                  data.district + '\n' +
                  data.state + ' - ' + data.pincode + '\nPhone: ' +
                  data.phone_number;

    $('#address').val(address);

    $('#order_status').val(data.status);
    $('#id').val(data.id);
              

            },
            error: function () {
                alert('Something went wrong');
            }
        });
    }
    });
    });

    </script>