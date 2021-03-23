<?php $__env->startSection('title','Yönetici Paneli - Ürün Ekle'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Products Ekle</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="file" required class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="category_id" class="form-control" id="">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>İsim</label>
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
                        <label>Özellik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="details"> </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fiyat</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1" name="description"> </textarea>

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

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/products/create.blade.php ENDPATH**/ ?>