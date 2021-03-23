<?php $__env->startSection('title','Yönetici Paneli - Slider Düzenle'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Slider Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('slider.update',$sliders->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <?php if(isset($sliders->slider_file)): ?>
                    <div class="form-group">
                        <label>Yüklü Resim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="/images/slider/<?php echo e($sliders->slider_file); ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="slider_file" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slider_title" value="<?php echo e($sliders->slider_title); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slider_slug"value="<?php echo e($sliders->slider_slug); ?>" class="form-control">
                            </div>
                        </div>
                    </div> <div class="form-group">
                        <label>Url</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slider_url"value="<?php echo e($sliders->slider_url); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1" name="slider_content"><?php echo e($sliders->slider_content); ?></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="slider_status" class="form-control" id="">
                                    <option <?php echo e($sliders->slider_status=='1' ? 'selected=""' : ''); ?> value="1">Aktif</option>
                                    <option <?php echo e($sliders->slider_status=='0' ? 'selected=""' : ''); ?> value="0">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="<?php echo e($sliders->slider_file); ?>">

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Düzenle</button>
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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/slider/edit.blade.php ENDPATH**/ ?>