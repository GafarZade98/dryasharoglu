<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu - Ürünler'); ?>
<?php $__env->startSection('content'); ?>

    <section id="services" class="services section-bg">

        <div class="container-fluid">
            <div class="row row-sm">
                <div class="col-md-6 _boxzoom">
                    <div class="zoom-thumb">
                        <ul class="piclist">
                            <li><img src="<?php echo e(asset('images/products').'/'.$product->file); ?>" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="<?php echo e(route('cart.store')); ?>" method="post" accept-charset="utf-8">
                    <div class="_product-detail-content">
                        <p class="_p-name"><?php echo e($product->name); ?> </p>
                        <div class="_p-price-box">
                            <div class="p-list">
                                <span class="price">  Ücret : </span> <span><del style="color: red;font-size: 22px"> <?php echo e($product->price * 1.23); ?> TL   </del></span>
                                <span class="price">   <?php echo e($product->price); ?> <i class="fa fa-turkish-lira"></i> </span>
                            </div>
                            <div class="_p-add-cart">
                                <div class="_p-qty">
                                    <span>Say</span>
                                    <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                                    <input type="number" name="qty" id="number" value="1"/>
                                    <div class="value-button increase_" id="" value="Increase Value">-</div>
                                </div>
                            </div>
                            <div class="_p-features">
                                <span> Ürün Açıklaması </span>
                                <?php echo $product->description; ?>

                            </div>

                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                                <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                                <input type="hidden" name="file" value="<?php echo e($product->file); ?>">
                                <input type="hidden" name="description" value="<?php echo e($product->description); ?>">

                                <ul class="spe_ul"></ul>
                                <div class="_p-qty-and-cart">
                                    <div class="_p-add-cart">
                                        <button class="btn-theme btn buy-btn" tabindex="0">
                                            <i class="fa fa-shopping-cart"></i> Satın Al
                                        </button>
                                        <button class="btn-theme btn btn-success" type="submit" tabindex="0">
                                            <i class="fa fa-shopping-cart"></i> Sepete Ekle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec bg-light">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 title_bx ">
                    <h3 class="title "> Diğer Ürünler</h3>
                </div>
            </div>
        </div>
    </section>
    
    <div class="shell">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $likealsothat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/product.blade.php ENDPATH**/ ?>