<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('user.update',$users->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <?php if(isset($users->user_file)): ?>
                    <div class="form-group">
                        <label>Yüklü Resim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="/images/user/<?php echo e($users->user_file); ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="user_file" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>AD Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="name" value="<?php echo e($users->name); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="email" name="email"value="<?php echo e($users->email); ?>" class="form-control">
                            </div>
                        </div>
                    </div> <div class="form-group">
                        <label>Parola</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="role" class="form-control" id="">
                                    <option <?php echo e($users->role=='admin' ? 'selected=""' : ''); ?> value="1">Admin</option>
                                    <option <?php echo e($users->role=='user' ? 'selected=""' : ''); ?> value="0">User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="<?php echo e($users->user_file); ?>">

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Düzenle</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/user/edit.blade.php ENDPATH**/ ?>