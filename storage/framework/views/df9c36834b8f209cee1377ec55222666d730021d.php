

<?php $__env->startSection('title','One Time Payment'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
<?php if(Session::has('errorMessage')): ?>
<p class="alert alert-danger alert-block"><?php echo e(Session::get('errorMessage')); ?></p>
<?php endif; ?>
        <?php echo e(Form::open(['route'=>['admin.payments.send-payment'],'method' => 'post','class'=>'form-horizontal form-label-left','name'=>'frm_send_payment'])); ?>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                Email
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="email" type="email" class="form-control col-md-7 col-xs-12 <?php if($errors->has('email')): ?> parsley-error <?php endif; ?>" name="email" value="" placeholder="Enter email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_amount">Payment Amount<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="payment_amount" type="payment_amount" class="form-control col-md-7 col-xs-12 <?php if($errors->has('payment_amount')): ?> parsley-error <?php endif; ?>" name="payment_amount" placeholder="0.00" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required"></span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="description" class="form-control col-md-7 col-xs-12 <?php if($errors->has('description')): ?> parsley-error <?php endif; ?>" name="description" placeholder="Enter Description"> </textarea>
            </div>
        </div>
        <div class="form-group" id="payment_type_fields">
        <div class="row">
        <!-- <div class="col col-md-3 col-lg-3 control-label ">
        <input type="checkbox" id="someone" name="someone">
        </div>
        <div class="col col-md-9 col-lg-9 "> 
        <h6>Send to someone who is not associated with the company</h6>
        </div> -->
        
        </div>
        </div>
        <div class="text-center">
            <button class="btn btn-round btn-success"> Pay </button>

            <a class="btn btn-round btn-danger" href="<?php echo e(url()->previous()); ?>"> Cancel </a>
        </div>
        
        <?php echo e(Form::close()); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<?php echo e(Html::script('assets/admin/js/jquery.validate.min.js')); ?>

<?php echo e(Html::script('assets/admin/js/payments/onetimepayment.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/admin/payments/onetimepayment.blade.php ENDPATH**/ ?>