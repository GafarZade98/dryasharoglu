<?php $__env->startSection('title','Yönetici Paneli - Ayar Düzenle'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('settings.Update',['id'=>$settings->id])); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" readonly
                                       value="<?php echo e($settings->settings_descriptions); ?>">
                            </div>
                        </div>
                    </div>

                    <?php if($settings->settings_type=="file"): ?>
                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="settings_value" required class="form-control">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?php if($settings->settings_type=="text"): ?>
                                    <input class="form-control" name="settings_value"
                                           value="<?php echo e($settings->settings_value); ?>">
                                <?php endif; ?>

                                <?php if($settings->settings_type=="textarea"): ?>
                                    <textarea class="form-control"
                                              name="settings_value"> <?php echo e($settings->settings_value); ?></textarea>
                                <?php endif; ?>

                                <?php if($settings->settings_type=="ckeditor"): ?>
                                    <textarea name="settings_value"
                                              id="editor1"> <?php echo e($settings->settings_value); ?></textarea>
                                <?php endif; ?>
                                    <?php if($settings->settings_type=="file"): ?>
                                        <img width="100" src="/images/settings/<?php echo e($settings->settings_value); ?>" alt="">
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <?php if($settings->settings_type=="file"): ?>
                        <input type="hidden" name="old_file" value="<?php echo e($settings->settings_value); ?>">
                    <?php endif; ?>

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Güncelle</button>
                    </div>

                </form>


            </div>
        </div>
    </section>

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/settings/edit.blade.php ENDPATH**/ ?>