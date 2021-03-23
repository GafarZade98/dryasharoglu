<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ayar Ekle</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('settings.Store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="settings_descriptions" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Anahtar Değer</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="settings_key" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tip</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="settings_type" class="form-control" id="">
                                    <option value="text">Text</option>
                                    <option value="file">File</option>
                                    <option value="ckeditor">Ckeditor</option>
                                    <option value="textarea">Textarea</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="settings_status" class="form-control" id="">
                                    <option value="0">Pasif</option>
                                    <option selected="" value="1">Aktif</option>
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
        CKEDITOR.replace('editor1');
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/settings/create.blade.php ENDPATH**/ ?>