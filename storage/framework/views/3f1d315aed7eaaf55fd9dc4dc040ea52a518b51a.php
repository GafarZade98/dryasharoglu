<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kategori Ekle</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('category.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Isim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slug" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sıra</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="number" name="must" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Başlık Gösterme</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="featured" class="form-control" id="">
                                    <option value="1">Göster</option>
                                    <option value="0">Gösterme</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="status" class="form-control" id="">
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/category/create.blade.php ENDPATH**/ ?>