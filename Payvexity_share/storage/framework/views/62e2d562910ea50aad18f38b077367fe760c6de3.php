
<?php $__env->startSection('content'); ?>
<div class="row">
    <div  class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 card" style="padding-top: 12px;">
        <?php echo e(Form::open(['route'=>['admin.email_template.update', $email_template->id],'method' => 'post','class'=>'form-horizontal form-label-left','name'=>'frmemailtemplate'])); ?>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_subject" >
                Email Subject
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="email" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>"
                        name="email_subject" value="<?php echo e($email_template->email_subject); ?>">
                        <?php if($errors->has('name')): ?>
                <ul class="parsley-errors-list filled">
                    <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="parsley-required"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_slug" >
                Email Subject
                <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="email_slug" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>"
                        name="email_slug" value="<?php echo e($email_template->email_slug); ?>">
                        <?php if($errors->has('name')): ?>
                <ul class="parsley-errors-list filled">
                    <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="parsley-required"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_content" >
                Email Body Content
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="email_content" required><?php echo e($email_template->email_body); ?></textarea>
                <?php if($errors->has('name')): ?>
                    <ul class="parsley-errors-list filled">
                        <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="parsley-required"><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <div class="text-center"> 
            <button class="btn btn-dark text-white" > Update </button>
            <a href="<?php echo e(URL::previous()); ?>"><button class="btn btn-dark text-white" type="button" > Cancel </button></a>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<?php echo e(Html::script('assets/admin/js/email_template/add.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/admin/email_template/edit.blade.php ENDPATH**/ ?>