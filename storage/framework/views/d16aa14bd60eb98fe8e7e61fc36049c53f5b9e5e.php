<?php $__env->startSection('title','Yönetici Paneli - Ürünler'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Products</h3>
                <div align="right"><a href="<?php echo e(route('products.create')); ?>">
                        <button class="btn btn-success">Ekle</button>
                    </a></div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th scope="col">Id</th>
                        <th scope="col">Ad</th>
                        <th scope="col">Resim</th>
                        <th scope="col">Özellik</th>
                        <th scope="col">Fiyat</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody id="sortable">
                    <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="item-<?php echo e($products->id); ?>">
                            <td class="sortable"><?php echo e($products->id); ?></td>
                            <td class="sortable"><?php echo e($products->name); ?></td>
                            <td ><img width="50" src="<?php echo e(asset('images/products').'/'.$products->file); ?>" alt=""></td>
                            <td><?php echo e($products->details); ?></td>
                            <td><?php echo e($products->price); ?></td>

                            <td width="10"><a href="<?php echo e(route('products.edit',$products->id)); ?>"><i
                                        class="fa fa-pencil-square-o"></i></a></td>
                            <td width="10"><a href="javascript:void(0)"><i id="<?php echo $products->id ?>"
                                                                           class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    const data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "<?php echo e(route('products.Sortable')); ?>",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("İşlem başarılı...");
                            } else {
                                alertify.error("İşlem başarısız...");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });

        // SILME ISLEMI ILK OLARAQ ICONUN CLASINI GIRIRK ID ATRIBUT VERIRIK DUZGUN OLSA LINKE GEDIR OLMASA ALERT VERIRIK

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');
            alertify.confirm('Silme İşlemini Onaylayın', 'Bu işlem geri alınamaz',

                function () {

                    //routumuz resource oldugu ucun silmeni ajax ile edirik
                    $.ajax({
                        type: "DELETE",
                        url: "products/" + destroy_id,
                        success: function (msg) {
                            if (msg) {
                                $("#item-" + destroy_id).remove();
                                alertify.success("Silme İşlemi Başarılı");

                            } else {
                                alertify.error("İşlem Tamamlanamadı");
                            }
                        }
                    });

                },
                function () {
                    alertify.error('Silme işlemi iptal edildi.')
                }
            )
        });


    </script>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/products/index.blade.php ENDPATH**/ ?>