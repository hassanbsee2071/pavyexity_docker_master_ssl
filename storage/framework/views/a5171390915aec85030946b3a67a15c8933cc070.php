
<?php $__env->startSection('content'); ?>

<div class="title_left">
    <h1 class="h3">Invoice Add</h1>
</div>  
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 card" style="padding-top: 12px;">
       
        <?php echo e(Form::open(['route'=>['admin.company.invoice.save'],'method' => 'post','class'=>'form-horizontal form-label-left', 'name' => "frminvoice"])); ?>

        <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="text-danger"><?php echo e($error); ?></span><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <!-- <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">Select Client<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="user_id" id="user_id" class="form-control col-md-7 col-xs-12 js-example-tags">
                    <option value="" selected>-- Select User --</option>
                    <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user['id']); ?>"><?php echo e($user['email']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div> -->
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invoice_title">User<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id=" " type="text" class="form-control col-md-7 col-xs-12 " name="user_mail" placeholder="Enter User Email" value="" />
            </div>
        </div>
           
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invoice_title">Invoice Title<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="invoice_title" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('invoice_title')): ?> parsley-error <?php endif; ?>" name="invoice_title" value="" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="due_date">Due Date<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <div class="input-group date" id="dp_due_date">
                    <input type="text" class="form-control" name="due_date" id="due_date_new" value="" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invoice_date">Invoice Date<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <div class="input-group date" id="dp_invoice_date">
                        <input type="text" class="form-control" name="invoice_date" id="invoice_date_new" value="" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="row dynamicField">
        <div class="col-lg-8">
            <div class="table-responsive">
                <!-- <form method="post" id="dynamic_form"> -->
                <span id="result"></span>
                <table class="table table-bordered table-striped" id="user_table">
                    <thead>
                        <tr>
                            <th width="">Item</th>
                            <th width="">Quantity</th>
                            <th width="">Rate</th>
                            <th width="">Amount</th>
                            <th width="">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                
                </table>
                <!-- </form> -->
            </div><br>
        </div>
        </div>

        

        

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_recurring" >
                Is recurring?
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="checkbox">
                    <label>
                        <input id="is_recurring" type="checkbox" class="" name="is_recurring"  value="1" >
                        </ul>
                    </label>
                </div>
            </div>
        </div>

        <div  >
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recurring_period">Select Recurring Period<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="recurring_period" id="recurring_period" class="form-control col-md-7 col-xs-12">
                    <option value="">-- Select Recurring Period--</option>
                    <option value="weekly" >Weekly</option>
                    <option value="monthly" >Monthly</option>
                </select>
            </div>
        </div>
<br><br><br>
        <div class="form-group is_recurring_area">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recurrring_end_date">Recurring End Date<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <div class="input-group date" id="">
                        <input type="text" class="form-control" name="recurrring_end_date" id="recurrring_end_date_new" value="" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="text-center"> 
            <button type="submit" class="btn btn-dark text-white"> Add </button>
            <a href="<?php echo e(URL::previous()); ?>"><button class="btn btn-dark text-white" type="button" > <?php echo e(__('views.admin.company.invoice.show.cancel')); ?> </button></a>
        </div>
        <?php echo e(Form::close()); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<?php echo e(Html::script('assets/admin/js/invoice/add.js')); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/admin/invoice/add.blade.php ENDPATH**/ ?>