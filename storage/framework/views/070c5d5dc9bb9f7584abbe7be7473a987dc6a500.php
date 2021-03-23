<?php $__env->startSection('title','Yönetici Paneli - Mesajlar'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Mesajlar</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>


                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">Mesaj</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody id="sortable">
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="item-<?php echo e($message->id); ?>">
                            <td class="sortable"><?php echo e($message->name); ?></td>
                            <td class="sortable"><?php echo e($message->email); ?></td>
                            <td class="sortable"><?php echo e($message->message); ?></td>
                            <td ><a href="javascript:void(0)"><i id="<?php echo e($message->id); ?>"
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
                    location.href = "/nedmin/messages/delete/" + destroy_id;
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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/message/index.blade.php ENDPATH**/ ?>