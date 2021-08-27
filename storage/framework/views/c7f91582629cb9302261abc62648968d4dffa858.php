<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
<link href="<?php echo asset('assets/addchat/css/addchat.min.css') ?>" rel="stylesheet">
    <?php echo $__env->make('frontend.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="<?php echo e(str_replace('.','-',Route::currentRouteName())); ?> theme-<?php echo e(config('settings.theme')); ?>">
    <?php echo $__env->renderWhen(config('settings.gtm_container_id'), 'frontend.includes.gtm-body', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path'))); ?>

    <div id="app">

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->first(['frontend.includes.footer-udf','frontend.includes.footer'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div id="addchat_app" 
    data-baseurl="<?php echo url('') ?>"
    data-csrfname="<?php echo 'X-CSRF-Token' ?>"
    data-csrftoken="<?php echo csrf_token() ?>"
></div>
    </div>

    <?php echo $__env->make('frontend.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <script type="module" src="<?php echo asset('assets/addchat/js/addchat.min.js') ?>"></script>
    <!-- Fallback support for Older browsers -->
    <script nomodule src="<?php echo asset('assets/addchat/js/addchat-legacy.min.js') ?>"></script>

</body>
</html>