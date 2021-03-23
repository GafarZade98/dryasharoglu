<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="">
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?php echo e(asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/dist/css/skins/skin-blue.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/custom/css/custom.css')); ?>">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="<?php echo e(asset('backend/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <header class="main-header">

        <a href="<?php echo route('nedmin.Index', ); ?>" class="logo">
            <span class="logo-mini"><b>S</b>S</span>
            <span class="logo-lg"><b>Sepnaz</b>Soft</span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">

            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="/images/user/<?php echo e(Auth::user()->user_file); ?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/images/user/<?php echo e(Auth::user()->user_file); ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo e(Auth::user()->name); ?> - <?php echo e(Auth::user()->role); ?>

                                    <small>Hesap yaranma tarihi - <?php echo e(Auth::user()->created_at->format('d/m/Y')); ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo e(route('user.edit',Auth::user()->id)); ?>" class="btn btn-default btn-flat"> Hesabı düzenle</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(route('nedmin.Logout')); ?>" class="btn btn-default btn-flat">Çıkış yap</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/images/user/<?php echo e(Auth::user()->user_file); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <span><?php echo e(Auth::user()->email); ?></span>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menüler</li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Ayarlar</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo asset('nedmin/user'); ?>"><i class="fa fa-user"></i> <span>Admin</span></a></li>
                        <li><a href="<?php echo asset('nedmin/settings'); ?>"><i class="fa fa-cog"></i> <span>Genel Ayarlar</span></a></li>
                        <li><a href="<?php echo asset('nedmin/team'); ?>"><i class="fa fa-users"></i> <span>Team</span></a></li>
                    </ul>
                </li>

                <li class="active"><a href="<?php echo asset('nedmin'); ?>"><i class="fa fa-home"></i> <span>Anasayfa</span></a></li>
                <li><a href="<?php echo asset('nedmin/category'); ?>"><i class="fa fa-list"></i> <span>Kategori</span></a></li>
                <li><a href="<?php echo asset('nedmin/products'); ?>"><i class="fa fa-medkit"></i> <span>Ürünler</span></a></li>
                <li><a href="<?php echo asset('nedmin/slider'); ?>"><i class="fa fa-sliders"></i> <span>Slider</span></a></li>
                <li><a href="<?php echo route('nedmin-messages', ); ?>"><i class="fa fa-commenting"></i> <span>Mesajlar</span></a></li>
                <li><a href="<?php echo route('nedmin-reservation', ); ?>"><i class="fa fa-handshake-o"></i> <span>Randevular</span></a></li>
                <li><a href="<?php echo route('nedmin-order', ); ?>"><i class="fa fa-gbp"></i> <span>Siparişler</span></a></li>

            </ul>
        </section>
    </aside>


    <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>


    <footer class="main-footer">

        <div class="pull-right hidden-xs">
            Acca zad olsannı
        </div>
        <strong>Telif Hakkı &copy; 2020 <a href="#">Hallaşdar</a>.</strong> Tüm Haklar Korunmuştur.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>>
<script src="<?php echo asset('backend/dist/js/adminlte.min.js'); ?>"></script>


<?php if(session()->has('success')): ?>
<script>
    alertify.success('<?php echo e(session('success')); ?>')
</script>
<?php endif; ?>
<?php if(session()->has('error')): ?>
<script>
    alertify.error('<?php echo e(session('error')); ?>')
</script>
<?php endif; ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        alertify.error('<?php echo e($error); ?>');
    </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\ecms\resources\views/backend/layout.blade.php ENDPATH**/ ?>