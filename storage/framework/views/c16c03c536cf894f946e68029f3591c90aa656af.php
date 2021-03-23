<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu - Hesabım'); ?>
<?php $__env->startSection('content'); ?>



    <hr>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1><?php echo e($data->name); ?></h1></div>
        </div>
        <div class="row">
            <div class="col-sm-3"><!--left col-->


                <ul class="list-group">

                    <li class="list-group-item text-right"><a href=" <?php echo e(route('cart')); ?>"><span class="pull-left"><strong>Sepetim</strong></span> <?php echo e(Cart::count()); ?>

                        </a></li>



                    
                    <li class="list-group-item text-right"><span class="pull-left"><strong>
                             <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <?php echo e(__('Çıkış Yap')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
                        </strong></span> -
                    </li>
                </ul>


            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">

                    
                    <li class="active"><a data-toggle="tab" href="#settings">Teslimat Adresi</a></li>
                </ul>


                <div class="tab-content">


                    

                    

                    
                    
                    
                    

                    

                    
                    
                    
                    
                    

                    

                    
                    
                    
                    
                    

                    

                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    

                    


                    <div class="tab-pane active" id="settings">
                        <form class="form" action="<?php echo route('user.address.update',$data->id, ); ?>" method="post"
                              id="registrationForm">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>Ad Soyad</h4></label>
                                    <input type="text" class="form-control" name="name" id="first_name"
                                           value="<?php echo e($data->name); ?>">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>Telefon</h4></label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                           value="<?php echo e($data->phone); ?>">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>İl</h4></label>
                                    <input type="text" class="form-control" id="location" name="province"
                                           value="<?php echo e($data->province); ?>" title=" Lütfen geçerli il giriniz.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>İlçe</h4></label>
                                    <input type="text" class="form-control" name="district" id="password"
                                           value="<?php echo e($data->district); ?>" title=" Lütfen geçerli ilçe giriniz.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>Adres</h4></label>
                                    <input type="text" class="form-control" name="address" id="password2"
                                           value="<?php echo e($data->address); ?>">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>Posta Kodu</h4></label>
                                    <input type="text" class="form-control" name="postcode" id="password2"
                                           value="<?php echo e($data->postcode); ?>" title="Lütfen geçerli posta kodu giriniz.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success pull-right" type="submit"><i
                                            class="glyphicon glyphicon-ok-sign"></i> Kaydet
                                    </button>
                                    <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                </div>
                            </div>
                        </form>
                    </div>

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

    <br><br>
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

    <script>
        $(document).ready(function () {


            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function () {
                readURL(this);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/account.blade.php ENDPATH**/ ?>