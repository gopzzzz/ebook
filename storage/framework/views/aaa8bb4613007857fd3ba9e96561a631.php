<?php $__env->startSection('content'); ?>

<style>
.profile-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    transition: 0.3s;
}
.profile-card:hover {
    transform: translateY(-6px);
}
.profile-cover {
    height: 150px;
    background: linear-gradient(135deg, #4e73df, #224abe);
}
.profile-img {
    margin-top: -60px;
    text-align: center;
}
.profile-img img {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    border: 5px solid #fff;
    object-fit: cover;
}
.profile-body {
    padding: 20px;
}
</style>

<?php
    $profile = $admin;
    $logo = data_get($profile, 'logo');
    $name = data_get($profile, 'name', 'No Name');
    $desc = data_get($profile, 'description');
    $email = data_get($profile, 'email', '-');
    $phone = data_get($profile, 'phone_number', '-');
    $address = data_get($profile, 'address', '-');

    $facebook = data_get($profile, 'facebook_link');
    $youtube = data_get($profile, 'youtube_link');
    $insta = data_get($profile, 'insta_link');
    $twitter = data_get($profile, 'twitter_link');
    
   
?>

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Profile
</h4>

<div class="card mb-4">
<div class="row justify-content-center">

<?php if($profile): ?>

<div class="col-md-8 col-lg-6">
    <div class="profile-card">

        <div class="profile-cover"></div>

        
        <div class="profile-img">
            <img 
                src="<?php echo e(!empty($logo) ? asset('public/uploads/profile/'.$logo) : 'https://via.placeholder.com/110'); ?>">
        </div>

        <div class="profile-body">

            <div class="text-center mb-4">
                <h3 class="fw-bold"><?php echo e($name); ?> </h3>

                <?php if(!empty($desc)): ?>
                    <p class="text-muted"><?php echo e($desc); ?></p>
                <?php endif; ?>
            </div>

            <div class="px-4 text-start">

                <p><strong>Email:</strong> <?php echo e($email); ?></p>
                <p><strong>Phone:</strong> <?php echo e($phone); ?></p>
                <p><strong>Address:</strong> <?php echo e($address); ?></p>

               <div class="d-flex justify-content-start gap-3 mt-3">

    <?php if(!empty($facebook)): ?>
        <a href="<?php echo e($facebook); ?>" target="_blank" class="social-icon fb">
            <i class="fab fa-facebook-f"></i>
        </a>
    <?php endif; ?>

    <?php if(!empty($youtube)): ?>
        <a href="<?php echo e($youtube); ?>" target="_blank" class="social-icon yt">
            <i class="fab fa-youtube"></i>
        </a>
    <?php endif; ?>

    <?php if(!empty($insta)): ?>
        <a href="<?php echo e($insta); ?>" target="_blank" class="social-icon insta">
            <i class="fab fa-instagram"></i>
        </a>
    <?php endif; ?>

    <?php if(!empty($twitter)): ?>
        <a href="<?php echo e($twitter); ?>" target="_blank" class="social-icon tw">
            <i class="fab fa-twitter"></i>
        </a>
    <?php endif; ?>

</div>

            </div>

            <div class="text-center mt-4">
                <button class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#EditProfileModal">
                    Edit Profile
                </button>
            </div>

        </div>
    </div>
</div>

<?php endif; ?>

</div>
</div>


<?php if($profile): ?>
<div class="modal fade" id="EditProfileModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <form method="POST" enctype="multipart/form-data" action="<?php echo e(url('profiles/update')); ?>">
        <?php echo csrf_field(); ?>

        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3 text-center">
            <label>Current Logo</label><br>
            
            <img 
                src="<?php echo e(!empty($logo) ? asset('public/uploads/profile/'.$logo) : 'https://via.placeholder.com/120'); ?>" 
                class="img-thumbnail" width="120">
          </div>

          <div class="mb-3">
            <label>Replace Logo</label>
            <input type="file" name="logo" class="form-control">
          </div>

          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($name); ?>">
          </div>

          <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"><?php echo e($desc ?? ''); ?></textarea>
          </div>

          <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone_number" class="form-control" value="<?php echo e($phone); ?>">
          </div>

          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo e($email); ?>">
          </div>

          <div class="mb-3">
            <label>Facebook</label>
            <input type="text" name="facebook_link" class="form-control" value="<?php echo e($facebook ?? ''); ?>">
          </div>

          <div class="mb-3">
            <label>YouTube</label>
            <input type="text" name="youtube_link" class="form-control" value="<?php echo e($youtube ?? ''); ?>">
          </div>

          <div class="mb-3">
            <label>Instagram</label>
            <input type="text" name="insta_link" class="form-control" value="<?php echo e($insta ?? ''); ?>">
          </div>

          <div class="mb-3">
            <label>Twitter</label>
            <input type="text" name="twitter_link" class="form-control" value="<?php echo e($twitter ?? ''); ?>">
          </div>

          <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"><?php echo e($address); ?></textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainlayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ebook\resources\views/admin/profile.blade.php ENDPATH**/ ?>