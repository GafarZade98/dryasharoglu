<?php $__env->startSection('title','Yönetici Paneli - Ürün Düzenle'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Products Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="<?php echo e(route('products.update',$products->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <?php if(isset($products->file)): ?>
                        <div class="form-group">
                            <label>Yüklü Resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="75" src="<?php echo e(asset('images/products').'/'.$products->file); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                    </div>















                    <div class="form-group">
                        <label>İsim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="name" value="<?php echo e($products->name); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slug" value="<?php echo e($products->slug); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Özellik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="details"><?php echo e($products->details); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fiyat</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="number" name="price" value="<?php echo e($products->price); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1"
                                          name="description"><?php echo e($products->description); ?></textarea>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="status" class="form-control" id="">
                                    <option <?php echo e($products->status=='1' ? 'selected=""' : ''); ?> value="1">Aktif</option>
                                    <option <?php echo e($products->status=='0' ? 'selected=""' : ''); ?> value="0">Pasif</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="<?php echo e($products->file); ?>">

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Düzenle</button>
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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/products/edit.blade.php ENDPATH**/ ?>