

<?php $__env->startSection('body_class','login'); ?>

<?php $__env->startSection('content'); ?> 
<div>
<div class="row">
<?php if(Session::has('errorMessage')): ?>
<p class="alert alert-danger alert-block"><?php echo e(Session::get('errorMessage')); ?></p>
<?php endif; ?>
<?php if(Session::has('successMessage')): ?>
<p class="alert alert-success alert-block"><?php echo e(Session::get('successMessage')); ?></p>
<?php endif; ?>
</div>
    <div class="login_wrapper" style="max-width:50%">
        <div class="animate form login_form">
            <section class="login_content">

               <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="<?php echo e(asset('/public/images/logo.png')); ?>" width="207px" height="88px" alt="Logo" title="Logo" class="img-fluid" /><br>
                </div>
<br><br>
                    <!-- <h4>Pay Without Register</h4> -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php echo e(Form::open(['route'=>['guest.payments.proccess-payment'],'method' => 'post','class'=>'form-horizontal form-label-left','name'=>'frm_payment_method'])); ?>

                 <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount" style="font-size: 15px;">Payment method<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="payment_method" class="form-control col-md-7 col-xs-12 <?php if($errors->has('payment_method')): ?> parsley-error <?php endif; ?>" name="payment_method">
                                <option value="">Select payment method</option>
                                <option value="bank_account">Bank Account</option>
                                <option value="credit_card">Credit Card</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname" style="font-size: 16px;">
                            Company Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>" name="" value="<?php echo e($companyname); ?>" placeholder="Enter name" readonly>
                        </div>
                    </div>
                    <?php echo e(Form::hidden('cId', $companyid)); ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_amount" style="font-size: 15px;">Payment Amount<span class="required">*</span></label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="payment_amount" type="payment_amount" class="form-control col-md-7 col-xs-12 <?php if($errors->has('payment_amount')): ?> parsley-error <?php endif; ?>" name="payment_amount" placeholder="0.00$" value="<?php echo e($if_amount == 1 ? $amount :''); ?>" <?php if($is_fixed == 1) { echo 'readonly';} ?>  />

                        </div>
                    </div>
                    <div class="form-group" id="payment_type_fields">

                    </div>
                    <div  class="text-center">
                        <button id='btnPay' class="btn btn-round btn-success"> Pay</button>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>

            <div style="display:none" id="bank_account">
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" style="font-size: 16px;">
                            First Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" type="name" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>" name="name" value="" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname" style="font-size: 16px;">
                            Last Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="lname" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>" name="lname" value="" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname" style="font-size: 16px;">
                            Email
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="email" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('email')): ?> parsley-error <?php endif; ?>" name="email" value="" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="address" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('address')): ?> parsley-error <?php endif; ?>" name="address" placeholder="Enter address" />
                    </div>
                </div>

               <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="city" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('city')): ?> parsley-error <?php endif; ?>" name="city" placeholder="Enter city" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="state" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('state')): ?> parsley-error <?php endif; ?>" name="state" placeholder="Enter state" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zip">Zip<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="zip" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('zip')): ?> parsley-error <?php endif; ?>" name="zip" placeholder="Enter zip code" />
                    </div>
                </div>
              <!-- <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_account_name">Account Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="bank_account_name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('bank_account_name')): ?> parsley-error <?php endif; ?>" name="bank_account_name" placeholder="Enter bank account name" />
                    </div>
                </div> -->
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account_number">Account Number<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="account_number" onkeyup="account(this)" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('account_number')): ?> parsley-error <?php endif; ?>" name="account_number" placeholder="Enter bank account number" />
                    </div>
                    <div id='accountError' class="col-md-9  col-sm-6 col-xs-12" style="display: none">
                        <p style="color: red">Invalid Account Number</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="routing_number">Routing Number<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="routing_number" onkeyup="routing(this)" type="number" class="form-control col-md-7 col-xs-12 <?php if($errors->has('routing_number')): ?> parsley-error <?php endif; ?>" name="routing_number" placeholder="Enter bank routing number" />
                    </div>
                    <div id='routingError' class="col-md-9  col-sm-6 col-xs-12" style="display: none">
                        <p style="color: red">Invalid Routing Number</p>
                    </div>
                </div>
                
               
            </div>

            <div style="display:none" id="credit_card">
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" style="font-size: 16px;">
                            First Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" type="name" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>" name="name" value="" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname" style="font-size: 16px;">
                            Last Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="lname" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>" name="lname" value="" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname" style="font-size: 16px;">
                            Email
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="email" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('email')): ?> parsley-error <?php endif; ?>" name="email" value="" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="address" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('address')): ?> parsley-error <?php endif; ?>" name="address" placeholder="Enter address" />
                    </div>
                </div>

               <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="city" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('city')): ?> parsley-error <?php endif; ?>" name="city" placeholder="Enter city" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="state" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('state')): ?> parsley-error <?php endif; ?>" name="state" placeholder="Enter state" />
                    </div>
                </div>

<div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">Country<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="country" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('country')): ?> parsley-error <?php endif; ?>" name="country" placeholder="Enter country" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zip">Zip<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="zip" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('zip')): ?> parsley-error <?php endif; ?>" name="zip" placeholder="Enter zip code" />
                    </div>
                </div>
              <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_account_name">Credit Card Number<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- <input id="credit_card_number" type="number" class="form-control col-md-7 col-xs-12 <?php if($errors->has('credit_card_number')): ?> parsley-error <?php endif; ?>" name="credit_card_number" placeholder="Enter credit card number" /> -->
                        <input id="credit_card_number" type="number" onchange="ccvalidation()"   minlength="16" class="form-control col-md-7 col-xs-12 <?php if($errors->has('credit_card_number')): ?> parsley-error <?php endif; ?>" name="credit_card_number" placeholder="Enter credit card number" />
                        <p id="alert">
                      </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expiry_date">Expiration Date<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- <input id="expiry_date" pattern="\d{4}" type="text" maxlength="5" class="form-control col-md-7 col-xs-12 <?php if($errors->has('expiry_date')): ?> parsley-error <?php endif; ?>" name="expiry_date" placeholder="Enter expiration date" /> -->
                        <input id="expiry_date" pattern="\d{4}" onchange="expiryDateValidation()" minlength="4" type="text" maxlength="5" class="form-control col-md-7 col-xs-12 <?php if($errors->has('expiry_date')): ?> parsley-error <?php endif; ?>" name="expiry_date" placeholder="Enter expiration date" />
                        <p id="e_alert">
                      </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cvv">CVV<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cvv" type="text" minlength="3" maxlength="4" class="form-control col-md-7 col-xs-12 <?php if($errors->has('cvv')): ?> parsley-error <?php endif; ?>" name="cvv" placeholder="Enter cvv" />
                  
                        <!-- <input id="cvv" type="text" maxlength="4" class="form-control col-md-7 col-xs-12 <?php if($errors->has('cvv')): ?> parsley-error <?php endif; ?>" name="cvv" placeholder="Enter cvv" /> -->
                    </div>
                </div>
                
            </div>
        </section>
    </div>
</div>
</div>
<script>
function ccvalidation()
{
      document.querySelector("#alert").innerText='';
        var invalid = 'Invalid Card '
        var cardNo = document.getElementById('credit_card_number').value;
        var masterCardRegex=/^(?:5[1-5][0-9]{14})$/;
        var visaCardRegex=/^(?:4[0-9]{12})(?:[0-9]{3})$/;
        var americanExpCardRegex=/^(?:3[47][0-9]{13})$/;
        var dinersClubCardRegex=/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/;
        var laserCardRegex=/^(6304|6706|6709|6771)[0-9]{12,15}$/;
        var cardName ='';
        if(masterCardRegex.test(cardNo)){
          cardName="Master Card";
        }else if(visaCardRegex.test(cardNo)){
          cardName="Visa Card";
        }else if(americanExpCardRegex.test(cardNo)){
          cardName="American Express Card";
        }else if(dinersClubCardRegex.test(cardNo)){
          cardName="Diners Club  Card";
        }else if(laserCardRegex.test(cardNo)){
          cardName="Laser  Card";
        }
        else
        {
           cardName="invalid card";
        }
        document.querySelector("#alert").innerText=cardName;
        document.getElementById("paybutton").disabled = (cardName === "invalid card" ?true:false);
        
}
function expiryDateValidation()
{
    console.log(document.getElementById('expiry_date').value);
    today = new Date();
    someday = new Date();
    
    document.querySelector("#e_alert").innerText='';
    var expiry_dates = document.getElementById('expiry_date').value;
    var month = expiry_dates[0].concat(expiry_dates[1])-1;
    var num='20';
    var year = num.concat(expiry_dates[3].concat(expiry_dates[4]));
    var expiryDateRegex = /^(0[1-9]|1[0-2])\/(1[4-9]|[2-9][0-9])$/;
    if(expiryDateRegex.test(expiry_dates)){
        document.querySelector("#e_alert").innerText='Valid Expiry Date';
        document.getElementById("paybutton").disabled = false;
        today = new Date();
        someday = new Date();
        someday.setFullYear(year, month, 1);
        if (someday < today) {
            document.querySelector("#e_alert").innerText='Card Expired. Please select a valid expiry date';
            document.getElementById("paybutton").disabled = true;
        }
     
    }else{
        document.querySelector("#e_alert").innerText='InValid Expiry Date';
        document.getElementById("paybutton").disabled = true;
    }

}
</script>
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
<?php echo $__env->make('auth.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/admin/payments/guest-global.blade.php ENDPATH**/ ?>