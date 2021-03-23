<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu - Ödeme'); ?>
<?php $__env->startSection('content'); ?>

    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="row breadcrumbs-row">
                <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                    <div class="page-header">
                        <h1>Sepet Kontrol</h1>
                    </div>
                </div>
                <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i> -</li>
                        <li>Sepet</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <br><br>

    <!--Main layout-->
    <main class="mt-5 pt-4">
        <div class="container wow fadeIn">


            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <form class="card-body" action="<?php echo route('checkout.store', ); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6 ">

                                    <!--firstName-->
                                    <div class="md-form ">
                                        <label for="firstName" class="">Ad Soyad</label>
                                        <input type="text" id="firstName" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>">
                                    </div>

                                </div>

                                <div class="col-md-6 ">

                                    <!--firstName-->
                                    <div class="md-form ">
                                        <label for="firstName" class="">Telefon</label>
                                        <input type="text" id="firstName" name="phone" class="form-control" value="<?php echo e(Auth::user()->phone); ?>">
                                    </div>

                                </div>

                            </div>
                            <!--Grid row-->


                            <!--email-->
                            <div class="md-form mb-5">
                                <label for="email" class="">Email Adresi</label>
                                <input type="" id="email" class="form-control" name="email" disabled value="<?php echo e(Auth::user()->email); ?>">

                            </div>

                            <!--address-->
                            <div class="md-form mb-5">
                                <label for="address" class="">Adres</label>
                                <input type="text" id="address" class="form-control" name="address" required value="<?php echo e(Auth::user()->address); ?>">

                            </div>



                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-12 mb-4">

                                    <label for="country">İl</label>
                                    <input type="text" id="country" class="form-control" name="province" value="<?php echo e(Auth::user()->province); ?>">
                                    <div class="invalid-feedback">
                                        Lütfen geçerli il giriniz.
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-6 mb-4">

                                    <label for="state">İlçe</label>
                                    <input type="text" id="state" class="form-control" name="district" value="<?php echo e(Auth::user()->district); ?>">
                                    <div class="invalid-feedback">
                                        Lütfen geçerli ilçe giriniz.
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-6 mb-4">

                                    <label for="zip">Posta kodu</label>
                                    <input type="text" class="form-control" id="zip" name="postcode" value="<?php echo e(Auth::user()->postcode); ?>" required>
                                    <div class="invalid-feedback">
                                       Posta kodu gereklidir
                                    </div>

                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <hr>
























































                            <button class="btn btn-primary btn-lg btn-block"  type="submit">Satın al</button>

                        </form>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!-- Heading -->
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill"><?php echo e(Cart::count()); ?></span>
                    </h4>


                    <!-- Cart -->
                    <ul class="list-group mb-3 z-depth-1">
                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">

                                <div class="media">
                                    <a class="pull-left" href="#"><img width="60"
                                                                       src="<?php echo e(asset('images/products').'/'.$cart_items->options->files); ?>"
                                                                       alt=""></a>
                                    <p class="text-success"><?php echo e($cart_items->price); ?> Tl</p>
                                    <div class="media-body">
                                        <h4 class="media-heading item-title"><a href="#"><?php echo e($cart_items->qty); ?>x <?php echo e($cart_items->name); ?> </a>
                                        </h4>

                                    </div>
                                </div>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Ürün fiyat</h6>
                            </div>
                            <span class="text-success"><?php echo e($cart_items->priceTarget); ?> Tl</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">KDV</h6>
                            </div>
                            <span class="text-success"><?php echo e(Cart::tax()); ?> Tl</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Gönderim ücreti</h6>
                            </div>
                            <span class="text-success"><?php echo e($shipping); ?> Tl</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Toplam</span>
                            <strong><?php echo e(intval(str_replace(",","",Cart::total())) +15); ?> Tl</strong>
                        </li>
                    </ul>
                    <!-- Cart -->


                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
    </main>
    <!--Main layout-->

    <br><br>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/checkout.blade.php ENDPATH**/ ?>