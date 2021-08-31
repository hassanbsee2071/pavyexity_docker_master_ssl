
<?php $__env->startSection('content'); ?>
<div class="title_left">
    <h1 class="h3">User Add</h1>
</div>
<div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 card" style="padding-top: 12px;">
        <?php echo e(Form::open(['route'=>['admin.users.save'],'method' => 'post','class'=>'form-horizontal form-label-left', 'name' => "frmuser"])); ?>

        <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="text-danger"><?php echo e($error); ?></span><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="first_name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('first_name')): ?> parsley-error <?php endif; ?>" name="first_name" value="<?php echo e(old('first_name')); ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="last_name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('last_name')): ?> parsley-error <?php endif; ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="email" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('email')): ?> parsley-error <?php endif; ?>" name="email" value="<?php echo e(old('email')); ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="phone" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('phone')): ?> parsley-error <?php endif; ?>" name="phone" value="<?php echo e(old('phone')); ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password" >
                Password
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="password" type="password" class="form-control col-md-7 col-xs-12 <?php if($errors->has('password')): ?> parsley-error <?php endif; ?>" name="password" value="<?php echo e(old('password')); ?>" />
            </div>
        </div>
        <?php if(isSuperAdmin()): ?>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmed" >
                Select roles
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="checkbox">
                    <label>
                        <input
                            type="checkbox"
                            name="roles[]"
                            value="<?php echo e($role->id); ?>">
                            <?php echo e($role->name); ?>

                    </label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if(isSuperAdmin()): ?>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmed" >
                Select Access
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="checkbox">
                    <label>
                        <input
                            type="checkbox"
                            name="modules[]"
                            value="<?php echo e($module->id); ?>">
                            <?php echo e($module->name); ?>

                    </label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php elseif(isAdmin()): ?>
        <div class="form-group">
            <input type="checkbox" hidden name="modules[]" checked value="7">               
            <input type="checkbox" hidden name="modules[]" checked value="9">                              
        </div>

        <?php endif; ?>
        <div class="text-center">
            <button type="submit" class="btn btn-dark text-white"> Add </button>
            <a href="<?php echo e(URL::previous()); ?>"><button class="btn btn-dark text-white" type="button" > <?php echo e(__('views.admin.users.edit.cancel')); ?> </button></a>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<?php echo e(Html::script('assets/admin/js/users/add.js')); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/admin/users/add.blade.php ENDPATH**/ ?>