<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu - Hakkımızda'); ?>
<?php $__env->startSection('content'); ?>



    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="row breadcrumbs-row">
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                        <div class="page-header">
                            <h1>Bizi Tanıyın</h1>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home"></i> - </li>
                            <li>Hakkımızda</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <img class="img-responsive" src="images/settings/<?php echo e(setting('hakkimizda_file')); ?>" alt=""/>
                        <hr class="page-divider transparent">
                        <h2 class="section-title sm-margin">Bizim Hakkımızda</h2>
                        <p><?php echo setting('about'); ?></p>
                    </div>
                </div>
                <hr class="page-divider">
                <hr class="page-divider transparent">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="section-title sm-margin text-left">Misyonumuz</h2>
                        <p><?php echo setting('mission'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="section-title sm-margin text-left">Vizyonumuz</h2>
                        <p><?php echo setting('vision'); ?></p>
                    </div>
                </div>

            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->




























        <!-- /PAGE -->

        <!-- PAGE -->






























































        <!-- /PAGE -->

    </div>
    <!-- /CONTENT AREA -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/about.blade.php ENDPATH**/ ?>