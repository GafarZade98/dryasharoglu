<?php $__env->startSection('title','Yönetici Paneli - Siparişler'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Siparişler</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>


                        <th scope="col">Id</th>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Kullanıcı Mail</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Adres</th>
                        <th scope="col">İl</th>
                        <th scope="col">İlçe</th>
                        <th scope="col">Toplam Fiyat</th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                    </thead>

                    <tbody id="sortable">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="item-<?php echo e($order->user_id); ?>">
                            <td><?php echo e($order->id); ?></td>
                            <td><?php echo e($order->billing_name); ?></td>
                            <td><?php echo e($order->billing_email); ?></td>
                            <td><?php echo e($order->billing_phone); ?></td>
                            <td><?php echo e($order->billing_address); ?></td>
                            <td><?php echo e($order->billing_province); ?></td>
                            <td><?php echo e($order->billing_district); ?></td>
                            <td><?php echo e($order->billing_subtotal); ?></td>
                            <td></td>

                            <td width="10"><a href="<?php echo e(route('order.product',$order->id)); ?>">Ürünler</a></td>
                            <td width="10"><a href="javascript:void(0)"><i id="<?php echo e($order->id); ?>"
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


        // SILME ISLEMI ILK OLARAQ ICONUN CLASINI GIRIRK ID ATRIBUT VERIRIK DUZGUN OLSA LINKE GEDIR OLMASA ALERT VERIRIK

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');
            alertify.confirm('Silme İşlemini Onaylayın', 'Bu işlem geri alınamaz',

                function () {

                    //routumuz resource oldugu ucun silmeni ajax ile edirik
                    $.ajax({
                        type: "DELETE",
                        url: "category/" + destroy_id,
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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/orders/index.blade.php ENDPATH**/ ?>