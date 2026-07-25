
    <script src="<?php echo e(asset('public/assets/vendor/libs/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/vendor/libs/popper/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/vendor/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>

    <script src="<?php echo e(asset('public/assets/vendor/js/menu.js')); ?>"></script>

    <script src="<?php echo e(asset('public/assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>

    <script src="<?php echo e(asset('public/assets/js/main.js')); ?>"></script>

    <script src="<?php echo e(asset('public/assets/js/dashboards-analytics.js')); ?>"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
    $(document).ready(function(){
    $('.editstatus').on('click',function(){


    var id = $(this).data('id');

    if (id) {
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('getAddrees')); ?>",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
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
<?php /**PATH C:\xampp\htdocs\ebook\resources\views/layouts/partials/footer-scripts.blade.php ENDPATH**/ ?>