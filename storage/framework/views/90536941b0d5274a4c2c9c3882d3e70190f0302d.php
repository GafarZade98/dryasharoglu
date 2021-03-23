<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu - Satış Sözleşmesi'); ?>
<?php $__env->startSection('content'); ?>

    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="row breadcrumbs-row">
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                        <div class="page-header">
                            <h1>Satış Sözleşmesi</h1>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home"></i> -</li>
                            <li>Satış Sözleşmesi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
        <section class="page-section light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p>
                            <?php echo setting('contract'); ?>

                        </p>
                    </div>
                </div>
            </div>
        </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/contract.blade.php ENDPATH**/ ?>