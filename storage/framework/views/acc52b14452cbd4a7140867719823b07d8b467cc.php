<?php $__env->startSection('title','Yönetici Paneli - Slider Ekle'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Slider Ekle</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('slider.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
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
                                <input type="text" name="slider_title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slider_slug" class="form-control">
                            </div>
                        </div>
                    </div>   <div class="form-group">
                        <label>Url</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slider_url" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1" name="slider_content"> </textarea>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="slider_status" class="form-control" id="">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Ekle</button>
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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/slider/create.blade.php ENDPATH**/ ?>