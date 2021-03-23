<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu'); ?>
<?php $__env->startSection('content'); ?>


    <section class="page-section no-padding slider">
        <div class="container full-width">
            <div class="main-slider">
                <div class="owl-carousel" id="main-slider">
                    <?php $__currentLoopData = $data['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item slide3 jumbotron-section jb3 with-overlay" style=" background: #e9e9e9 url(/images/slider/<?php echo e($slider->slider_file); ?>) center center no-repeat;">
                            <div class="caption">
                                <div class="container">
                                    <div class="div-table">
                                        <div class="div-cell">
                                            <div class="caption-content">
                                                <div class="jumbotron text-center">

                                                    <h1 class="jumbotron-title"><?php echo e($slider->slider_title); ?></h1>
                                                    <p class="jumbotron-text">
                                                        <?php echo substr($slider->slider_content,0,150) ."..."; ?>

                                                    </p>
                                                    <p class="btn-row">
                                                        <a class="btn btn-theme btn-rounded btn-theme-lg" href="<?php if(strlen($slider->slider_url)>0 ): ?>  <?php echo e($slider->slider_url); ?> <?php else: ?> javascript:void(0)  <?php endif; ?>">Daha Fazla</a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

<!-- PAGE -->


<section class="page-section call-to-action border-bottom with-overlay">
    <div class="container">

        <div class="message-box alt2">
            <div class="message-box-inner">
                <a class="btn btn-theme btn-theme-green btn-rounded pull-right" href="<?php echo e(route('reservation')); ?>">Randevu al</a>
                <h2>Sağlığınız ile ilgili endişeniz varsa hemen randevu alın</h2>
            </div>
        </div>

    </div>
</section>

<div class="shell">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="wsk-cp-product">
                        <div class="wsk-cp-img">
                            <a href="<?php echo e(route('product',$product->slug)); ?>"><img
                                    src="<?php echo e(asset('images/products').'/'.$product->file); ?>"
                                    alt="Product" class="img-responsive"/>
                            </a>
                        </div>
                        <div class="wsk-cp-text">
                            <div class="category">
                                <span><?php echo e($product->name); ?></span>
                            </div>
                            <div class="title-product">
                                <a href="#"><h3><?php echo e($product->details); ?></h3></a>
                            </div>
                            <div class="description-prod">
                                <p><?php echo $product->description; ?></p>
                            </div>
                            <div class="card-footer">
                                <div class="wcf-left"><span class="price"><?php echo e($product->price); ?> Tl</span></div>
                                <form action="<?php echo e(route('cart.store')); ?>" method="post" accept-charset="utf-8">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                    <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                                    <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                                    <input type="hidden" name="file" value="<?php echo e($product->file); ?>">
                                    <input type="hidden" name="description" value="<?php echo e($product->description); ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <div class="wcf-right"><button type="submit"><span class="shop-button-border">
                                    <i class="fa fa-shopping-cart"></i></span></button></div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<!-- PAGE -->
<section class="page-section image call-to-action with-overlay">
    <div class="container">

        <div class="message-box alt">
            <div class="message-box-inner">
                <a class="btn btn-theme btn-theme-green btn-rounded pull-right" href="<?php echo e(route('reservation')); ?>">Randevu Al</a>
                <h2>Sağlığınız ile ilgili endişeniz varsa hemen randevu alın</h2>
            </div>
        </div>

    </div>
</section>
<!-- /PAGE -->

<!-- /PAGE -->


<!-- /CONTENT AREA -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/index.blade.php ENDPATH**/ ?>