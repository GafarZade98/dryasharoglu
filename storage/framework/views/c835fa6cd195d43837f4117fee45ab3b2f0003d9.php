<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kategori Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('category.update',$categories->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>

                    <div class="form-group">
                        <label>İsim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="name" value="<?php echo e($categories->name); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slug" value="<?php echo e($categories->slug); ?>" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Sayfada Yayınlama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="featured" class="form-control" id="">
                                    <option <?php echo e($categories->featured=='1' ? 'selected=""' : ''); ?> value="1">Göster</option>
                                    <option <?php echo e($categories->featured=='0' ? 'selected=""' : ''); ?> value="0">Gösterme</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="status" class="form-control" id="">
                                    <option <?php echo e($categories->status=='1' ? 'selected=""' : ''); ?> value="1">Aktif</option>
                                    <option <?php echo e($categories->status=='0' ? 'selected=""' : ''); ?> value="0">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>


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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/category/edit.blade.php ENDPATH**/ ?>