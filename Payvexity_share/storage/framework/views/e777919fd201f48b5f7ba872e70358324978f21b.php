

<?php $__env->startSection('body_class','login'); ?>

<?php $__env->startSection('content'); ?>
<div>
    <div class="login_wrapper" style="max-width:50%">
        <div class="animate form login_form">
            <section class="login_content">
               <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php echo e(Form::open(['route'=>['admin.payments.proccess-payment'],'method' => 'post','class'=>'form-horizontal form-label-left','name'=>'frm_payment_method'])); ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Payment method<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="payment_method" class="form-control col-md-7 col-xs-12 <?php if($errors->has('payment_method')): ?> parsley-error <?php endif; ?>" name="payment_method">
                                <!-- <option value="">Select payment method</option> -->
                                <option value="bank_account">Bank Account</option>
                                <!-- <option value="credit_card">Credit Card</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" type="name" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>" name="name" value="" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_amount">Payment Amount<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="payment_amount" type="payment_amount" class="form-control col-md-7 col-xs-12 <?php if($errors->has('payment_amount')): ?> parsley-error <?php endif; ?>" name="payment_amount" placeholder="0.00" value="<?php echo e($if_amount == 1 ? $amount :''); ?>"  <?php echo e($if_amount == 1 ? 'readonly' :''); ?>/>

                        </div>
                    </div>
                    <div id="bank_account">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account_number">Account Number<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="account_number" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('account_number')): ?> parsley-error <?php endif; ?>" name="account_number" placeholder="Enter bank account number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="routing_number">Routing Number<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="routing_number" type="number" class="form-control col-md-7 col-xs-12 <?php if($errors->has('routing_number')): ?> parsley-error <?php endif; ?>" name="routing_number" placeholder="Enter bank routing number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account_type">Account Type<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="account_type" class="form-control col-md-7 col-xs-12 <?php if($errors->has('account_type')): ?> parsley-error <?php endif; ?>" name="account_type">
                                    <option value="">Select account type </option>
                                    <option value="1">Checking</option>
                                    <option value="2">Savings</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_account_name">Bank Account Name<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="bank_account_name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('bank_account_name')): ?> parsley-error <?php endif; ?>" name="bank_account_name" placeholder="Enter bank account name" />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group" id="payment_type_fields">

                    </div> -->
                    <div class="text-center">
                        <button class="btn btn-round btn-success"> Pay</button>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>

            <!-- <div style="display:none" id="bank_account">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account_number">Account Number<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="account_number" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('account_number')): ?> parsley-error <?php endif; ?>" name="account_number" placeholder="Enter bank account number." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="routing_number">Routing Number<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="routing_number" type="number" class="form-control col-md-7 col-xs-12 <?php if($errors->has('routing_number')): ?> parsley-error <?php endif; ?>" name="routing_number" placeholder="Enter bank routing number." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account_type">Account Type<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="account_type" class="form-control col-md-7 col-xs-12 <?php if($errors->has('account_type')): ?> parsley-error <?php endif; ?>" name="account_type">
                            <option value="">Select account type </option>
                            <option value="1">Checking</option>
                            <option value="2">Savings</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_account_name">Bank Account Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="bank_account_name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('bank_account_name')): ?> parsley-error <?php endif; ?>" name="bank_account_name" placeholder="Enter bank account name." />
                    </div>
                </div>
            </div> -->
        </section>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##

<?php echo e(Html::style(mix('assets/auth/css/login.css'))); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<?php echo e(Html::script('assets/admin/js/jquery.validate.min.js')); ?>

<?php echo e(Html::script('assets/admin/js/payments/paymentmethod.js')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/admin/payments/global.blade.php ENDPATH**/ ?>