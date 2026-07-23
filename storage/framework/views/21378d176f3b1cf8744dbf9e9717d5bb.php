<?php $__env->startSection('content'); ?>

<style>
    .register-card {
        max-width: 460px;
        margin: auto;
    }

   
</style>





<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <div class="register-card w-100">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">

                    
                    <?php if(session('error')): ?>
                        <div class="alert alert-warning text-center small-text py-2">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    
                    <div class="text-center mb-3">
                        
                        <p class="text-muted mb-0">Join Aron Books</p>
                    </div>

                    
                    <form action="<?php echo e(route('uregister')); ?>" method="POST" id="registerForm">
                        <?php echo csrf_field(); ?>

                        
                        <div class="mb-2">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Your name" required>
                        </div>

                        
                        <div class="mb-2">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Your email" required>
                        </div>

                        
                        <div class="mb-2">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>

                        
                        <div class="mb-2">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="cpassword" placeholder="Confirm password" required>
                            <small id="pass_error" class="text-danger small-text"></small>
                        </div>

                        
                        <div class="d-grid mb-2 mt-3">
                            <button class="btn btn-primary" type="submit">
                                Register
                            </button>
                        </div>

                    </form>

                    
                    <div class="text-center">
                        <span class="small-text">Already have an account?</span>
                        <a href="<?php echo e(url('userlogin')); ?>" class="small-text">Login</a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>


<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    let password = document.getElementById('password').value;
    let confirm = document.getElementById('confirm_password').value;
    let error = document.getElementById('pass_error');

    if (password !== confirm) {
        e.preventDefault();
        error.innerText = "Passwords do not match!";
    } else {
        error.innerText = "";
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.weblayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ebook\resources\views/web/register.blade.php ENDPATH**/ ?>