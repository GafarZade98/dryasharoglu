<?php $__env->startSection('content'); ?>

    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="row breadcrumbs-row">
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                        <div class="page-header">
                            <h1>Randevu Al</h1>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home"></i> -</li>
                            <li>Randevu</li>
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
                        <div class="contact-form-inner">
                            <h2 class="block-title">
                                Doctor Randevusu Alın
                                <small>Randevu almak için aşağıdaki bilgileri eksiksiz giriniz.</small>
                            </h2>
                            <?php if(session()->has('success')): ?>
                                <div class="alert alert-success">
                                    <?php if(is_array(session('success'))): ?>
                                        <ul>
                                            <?php $__currentLoopData = session('success'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($message); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php else: ?>
                                        <?php echo e(session('success')); ?>

                                    <?php endif; ?>

                                </div>
                            <?php endif; ?>
                            <form  method="post" action="<?php echo route('reservationpost', ); ?>" >
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="outer required">
                                            <div class="form-group af-inner">
                                                <label class="sr-only" for="name">Ad Soyad</label>
                                                <input
                                                    type="text" name="name" id="name" placeholder="Ad Soyad" value=""
                                                    size="30"
                                                    data-toggle="tooltip" title="Name is required" required
                                                    class="form-control placeholder"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">

                                        <div class="outer required">
                                            <div class="form-group af-inner">
                                                <label class="sr-only" for="phone">Telefon</label>
                                                <input
                                                    type="text" name="number" id="phone" placeholder="Telefon" value=""
                                                    size="30"
                                                    data-toggle="tooltip" title="Phone is required" required
                                                    class="form-control placeholder"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="outer required">
                                    <div class="form-group af-inner">
                                        <label class="sr-only" for="email">Tarih</label>
                                        <input
                                            type="datetime-local" name="created_at" id="phone" placeholder="Telefon" value=""
                                            size="30"
                                            data-toggle="tooltip" title="Phone is required" required
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                            class="form-control placeholder"/>
                                    </div>
                                </div>


                                <div class="outer required">
                                    <div class="form-group af-inner">
                                        <label class="sr-only" for="input-message">Mesaj</label>
                                        <textarea
                                            name="message" id="input-message" placeholder="Mesajınız" rows="4" cols="50"
                                            data-toggle="tooltip" title="Message is required" required
                                            class="form-control placeholder"></textarea>
                                    </div>
                                </div>
                                <div class="outer required">
                                    <div class="form-group no-margin af-inner">
                                        <button type="submit" class="form-button form-button-submit btn btn-theme btn-theme-dark">Gönder</button>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/reservation.blade.php ENDPATH**/ ?>