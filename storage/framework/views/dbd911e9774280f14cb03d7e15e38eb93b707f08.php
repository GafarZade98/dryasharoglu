<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu - Sepet'); ?>
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
                        <li><i class="fa fa-home"></i> - </li>
                        <li>Sepet</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php if(Cart::count()>0): ?>
    <div class="wrap cf">

        <div class="heading cf">
            <h1>Ürünlerim</h1>
            <a href="<?php echo e(route('products')); ?>" class="continue">Alışveriş et</a>
        </div>
        <div class="special">
            <div class="specialContent">Sepetinizde <?php echo e(Cart::count()); ?> adet ürün bulunmaktadır!!<br><br></div>
        </div>
        <?php if(session()->has('success_message')): ?>
            <div class="alert alert-success">
                <?php if(is_array(session('success_message'))): ?>
                    <ul>
                        <?php $__currentLoopData = session('success_message'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <?php echo e(session('success_message')); ?>

                <?php endif; ?>

            </div>
        <?php endif; ?>
        <div class="cart">
            <ul class="cartWrap">
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="items even">
                        <div class="infoWrap">
                            <div class="cartSection info">

                                <img src="<?php echo e(asset('images/products').'/'.$cart_items->options->files); ?>" alt="" class="itemImg"/>

                                <p class="itemNumber">#QUE-007544-<?php echo e($cart_items->id); ?></p>
                                <h3><?php echo e($cart_items->name); ?></h3>

                                <select class="quantity" data-id="<?php echo e($cart_items->rowId); ?>" data-productQuantity="<?php echo e($cart_items->quantity); ?>">
                                    <?php for($i = 1; $i < 20 + 1 ; $i++): ?>
                                        <option <?php echo e($cart_items->qty == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                                <p> x <?php echo e($cart_items->price); ?> Tl</p>

                                <p class="stockStatus">Stokta var</p>

                            </div>


                            <div class="prodTotal cartSection">
                                <p><?php echo e($cart_items->priceTarget); ?> Tl</p>
                            </div>

                            <div class="cartSection removeWrap">
                                <form action="<?php echo e(route('cart.destroy',$cart_items->rowId)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit" class="btn btn-danger">Sil</button>

                                </form>
                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

        </div>

        



        <div class="subtotal cf">
            <ul>
                <li class="totalRow"><span class="label">Ürün fiyatı+KDV</span><span class="value"><?php echo e(Cart::subtotal()); ?> Tl</span></li>
                <li class="totalRow"><span class="label">Kdv</span><span class="value"><?php echo e(Cart::tax()); ?> Tl</span></li>
                <li class="totalRow"><span class="label">Gönderim ücreti</span><span class="value"><?php echo e((int)$shipping); ?> Tl</span></li>
                <li class="totalRow final"><span class="label">Toplam</span><span class="value"><?php echo e(intval(str_replace(",","",Cart::total()))+(int)$shipping); ?>   Tl</span></li>
                <li class="totalRow"><a href="<?php echo e(route('checkout')); ?>" class="btn-b continue">Ödeme</a></li>
            </ul>
        </div>
    </div>


<?php else: ?>
    <div class="heading cf">
        <h1>Ürünlerim</h1>
        <a href="<?php echo e(route('products')); ?>" class="continue">Alışveriş et</a>
    </div>
    <div class="special">
        <div class="specialContent">Sepetinizde ürün bulunmamaktadır!!<br><br></div>
    </div>
<?php endif; ?>

    <h1 class="projTitle">Diğer Ürünler</h1>

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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function () {

                    const id = element.getAttribute('data-id')
                    // const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        // productQuantity: productQuantity
                    })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '<?php echo e(route('cart')); ?>'
                        })
                        .catch(function (error) {
                            console.log(error);
                            
                        });
                })
            })
        })();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/cart.blade.php ENDPATH**/ ?>