<?php $__env->startSection('title','Dr. Saddam Yaşaroğlu - Ödeme'); ?>
<?php $__env->startSection('content'); ?>


    <div class=content>
        <div class="wrapper-1">
            <div class="wrapper-2">
                <h1>Teşekkürler!</h1>
                <p>Siparişiniz için teşekkür ederiz.  </p>
                <p>Yakın zamanda sizinle iletişime geçilecektir. </p>
                <button class="go-home">
                    <a href="<?php echo e(url('/')); ?>">Ana Sayfa</a>
                </button>
            </div>

        </div>

    </div>
    <br><br><br>


    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">

    <style>

        .wrapper-1{
            width:100%;
            height:100vh;
            display: flex;
            flex-direction: column;

        }
        .wrapper-2{
            padding :30px;
            text-align:center;

        }
        h1{
            font-family: 'Kaushan Script', cursive;
            font-size:4em;
            letter-spacing:3px;
            color:orangered ;
            margin:0;
            margin-bottom:20px;
        }
        .wrapper-2 p{
            margin:0;
            font-size:1.3em;
            color:#aaa;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing:1px;
        }
        .go-home{
            color:white;
            background:orangered;
            border:none;
            padding:10px 50px;
            margin:30px 0;
            border-radius:30px;
            text-transform:capitalize;
            box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
        }
        .go-home a{
            color: white;
        }

        @media (min-width:360px){
            h1{
                font-size:4.5em;
            }
            .go-home{
                margin-bottom:20px;
            }
        }

        @media (min-width:600px){
            .content{
                max-width:1000px;
                margin:0 auto;
            }
            .wrapper-1{
                height: initial;
                max-width:620px;
                margin:0 auto;
                margin-top:50px;
                box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
            }

        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecms\resources\views/frontend/pages/confirmation.blade.php ENDPATH**/ ?>