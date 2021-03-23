<?php $__env->startSection('title','Yönetici Paneli - Ayarlar'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ayarlar</h3>
                <div align="right"><a href="<?php echo e(route('settings.Create')); ?>">
                        <button class="btn btn-success">Ekle</button>
                    </a></div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">İçerik</th>
                        <th scope="col">Anahtar Değer</th>
                        <th scope="col">Tip</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody id="sortable">
                    <?php $__currentLoopData = $data['adminSettings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="item-<?php echo e($adminSettings->id); ?>">
                            <td><?php echo e($adminSettings->id); ?></td>
                            <td class="sortable"><?php echo e($adminSettings->settings_descriptions); ?></td>
                            <td>
                                <?php if($adminSettings->settings_type=="file"): ?>
                                <img width="75" src="/images/settings/<?php echo e($adminSettings->settings_value); ?>" alt="">

                                <?php else: ?>
                                    <?php if(strlen($adminSettings->settings_value)>120): ?>
                                        <?php echo substr($adminSettings->settings_value,0 ,110); ?>...
                                        <?php else: ?>
                                        <?php echo e($adminSettings->settings_value); ?>

                                    <?php endif; ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo $adminSettings->settings_key; ?></td>
                            <td><?php echo $adminSettings->settings_keywords; ?></td>
                            <td><a href="<?php echo e(route('edit.Settings',['id'=>$adminSettings->id])); ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td>
                                <?php if($adminSettings->settings_delete): ?>
                                    <a href="javascript:void(0)"><i id="<?php echo $adminSettings->id ?>"
                                                                    class="fa fa-trash-o"></i></a>

                                <?php endif; ?>
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
                        url: "<?php echo e(route('settings.Sortable')); ?>",
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
                    location.href = "/nedmin/settings/delete/" + destroy_id;
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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/backend/settings/index.blade.php ENDPATH**/ ?>