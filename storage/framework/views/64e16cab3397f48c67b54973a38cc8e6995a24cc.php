<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu - Ürünler'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="row breadcrumbs-row">
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                        <div class="page-header">
                            <h1><?php echo e($categoryName); ?></h1>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home"></i> -</li>
                            <li>Ürünler</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">
                <div class="row">
                    <!-- SIDEBAR -->
                    <aside class="col-md-3 sidebar" id="sidebar">
                        <!-- widget search -->
                        <form action="<?php echo e(route('search')); ?>" method="GET" class="search-form">
                            <div class="widget">
                                <div class="widget-search">
                                    <input class="form-control" type="text" name="query" id="query" value="<?php echo e(request()->input('query')); ?>" placeholder="Ara">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <br>

                        <!-- /widget search -->
                        <!-- widget theme categories -->
                        <div class="widget shadow car-categories">
                            <h4 class="widget-title">Kategoriler</h4>
                            <div class="widget-content">
                                <ul class="sidebar">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e(request()->category==$category->slug ? 'active' : ''); ?>">
                                            <a href="<?php echo e(route('products',['category' => $category->slug])); ?>"><?php echo e($category->name); ?></a>
                                        </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <!-- /widget theme categories -->
                        <!-- widget helping center -->
                        <div class="widget shadow widget-helping-center">
                            <h4 class="widget-title">Yardım İste</h4>
                            <div class="widget-content">
                                <p>Ürünler hakkında bilgi almak için bizimle iletişime geçin</p>
                                <h5 class="widget-title-sub"><?php echo e(setting('phone')); ?></h5>
                                <p><a href="mailto:<?php echo e(setting('mail')); ?>"><?php echo e(setting('mail')); ?></a></p>
                                <div class="button">
                                    <a href="<?php echo e(route('contact')); ?>"
                                       class="btn btn-block btn-theme btn-theme-dark">Destek</a>
                                </div>
                            </div>
                        </div>
                        <!-- /widget helping center -->
                        <!-- widget tabs -->
                        <div class="widget widget-tabs alt">
                            <div class="widget-content">
                                <ul id="tabs" class="nav nav-justified">
                                    <li><a href="#tab-s1" data-toggle="tab">Son eklenen ürünler</a></li>
                                    <li class="active"><a href="#tab-s2" data-toggle="tab">Çok Satanlar</a></li>
                                </ul>
                                <div class="tab-content">
                                    <!-- tab 1 -->
                                    <div class="tab-pane fade" id="tab-s1">
                                        <div class="recent-post">
                                            <?php $__currentLoopData = $likealsothat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="media">

                                                    <a class="pull-left media-link" href="#">
                                                        <img class="media-object" width="100"
                                                             src="<?php echo asset('images/products/'.$recentpost->file); ?>"
                                                             alt="">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="media-meta">
                                                            <?php echo e($recentpost->created_at); ?>


                                                        </div>
                                                        <div>
                                                            <?php echo e($recentpost->name); ?>

                                                        </div>
                                                        <h4 class="media-heading"><a
                                                                href="#"><?php echo substr($recentpost->description,0,50); ?></a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                    <!-- tab 2 -->
                                    <div class="tab-pane fade in active" id="tab-s2">
                                        <div class="recent-post">
                                            <div class="media">
                                                <?php $__currentLoopData = $likealsothat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="media">

                                                        <a class="pull-left media-link" href="#">
                                                            <img class="media-object" width="100"
                                                                 src="<?php echo asset('images/products/'.$recentpost->file); ?>"
                                                                 alt="">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-meta">
                                                                <?php echo e($recentpost->created_at); ?>


                                                            </div>
                                                            <div>
                                                                <?php echo e($recentpost->name); ?>

                                                            </div>
                                                            <h4 class="media-heading"><a
                                                                    href="#"><?php echo substr($recentpost->description,0,50); ?></a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /widget tabs -->
                                    <!-- widget archives -->
                                    <!-- /widget twitter -->
                                    <!-- widget tag cloud -->
















                                    <!-- /widget tag cloud -->

                                </div>
                            </div>
                        </div>
                    </aside>


                    <!-- /SIDEBAR -->

                    <!-- CONTENT -->
                    <div class=" content" id="content" style="margin-left: 150px">

                        <div class=" content-area">
                            <div class="shell">
                                <div class=" container">

                                    <div class="row">

                                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="col-md-3">
                                                <div class="wsk-cp-product">
                                                    <div class="wsk-cp-img">
                                                        <a href="<?php echo route('product',$product->slug, ); ?>"><img
                                                                src="<?php echo asset('images/products/'.$product->file); ?>"
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
                                                            <div class="wcf-left"><span
                                                                    class="price"><?php echo e($product->price); ?> Tl</span></div>
                                                            <form action="<?php echo e(route('cart.store')); ?>" method="post"
                                                                  accept-charset="utf-8">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                                                <input type="hidden" name="name"
                                                                       value="<?php echo e($product->name); ?>">
                                                                <input type="hidden" name="price"
                                                                       value="<?php echo e($product->price); ?>">
                                                                <input type="hidden" name="file"
                                                                       value="<?php echo e($product->file); ?>">
                                                                <input type="hidden" name="description"
                                                                       value="<?php echo e($product->description); ?>">
                                                                <input type="hidden" name="qty"
                                                                       value="1">

                                                                <div class="wcf-right">
                                                                    <button type="submit">
                                                                        <span class="shop-button-border">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div>Bu kategoride henüz ürün yok!!</div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pagination-wrapper">
                            <?php echo e($products->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->

    </div>

    <style>
        .sidebar li.active {
            font-weight: 500;
        }

        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 10px;
            border-radius: 4px;
        }

        .pagination > li {
            display: inline;
        }

        .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
            background-color: #f4f4f4;
            border-color: #DDDDDD;
            color: inherit;
            cursor: default;
            z-index: 2;
        }

        .pagination > li:first-child > a, .pagination > li:first-child > span {
            margin-left: 10px;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination > li > a, .pagination > li > span {
            background-color: #FFFFFF;
            border: 1px solid #DDDDDD;
            color: inherit;
            float: left;
            line-height: 1.42857;
            margin: 5px;
            padding: 16px 22px;
            position: relative;
            text-decoration: none;
        }

        .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover {
            z-index: 2;
            color: #23527c;
            background-color: #eee;
            border-color: #ddd;
        }</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/products.blade.php ENDPATH**/ ?>