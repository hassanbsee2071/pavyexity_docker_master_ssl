
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php echo e(Form::open(['route'=>['admin.smtp.update'],'method' => 'post','class'=>'form-horizontal form-label-left','name' => "smtpform"])); ?>

        <form action="<?php echo e(route('admin.smtp.update')); ?>" name="smtpform" class="form-horizontal form-label-left"> 

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                SMTP Host
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="host" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('host')): ?> parsley-error <?php endif; ?>" name="host" value="<?php echo e($smtp_data->host); ?>" >
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name" >
                Username    
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="user_name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('host')): ?> parsley-error <?php endif; ?>" name="user_name" value="<?php echo e($smtp_data->user_name); ?>" >
            </div>
        </div>

        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                Password
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="password" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('password')): ?> parsley-error <?php endif; ?>" name="password" value="<?php echo e($smtp_data->password); ?>" >
            </div>
        </div>

        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
              Port
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="port" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('port')): ?> parsley-error <?php endif; ?>" name="port" value="<?php echo e($smtp_data->port); ?>" >
            </div>
        </div>

        <input type="hidden" value="<?php echo e($smtp_data->id); ?>" name="smtp_id">

        <div class="text-center"> 
            <button class="btn btn-dark text-white" > Update </button>
            <a href="<?php echo e(URL::previous()); ?>"><button class="btn btn-dark text-white" type="button" > Cancel </button></a>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    var CompanySettingList = '<?php echo e(route('admin.company')); ?>';
</script>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<?php echo e(Html::script('assets/admin/js/smtp/add.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/admin/smtp/edit.blade.php ENDPATH**/ ?>