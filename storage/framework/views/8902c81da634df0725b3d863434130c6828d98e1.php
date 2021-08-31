<?php $__env->startSection('body_class','bg-white'); ?>

<?php $__env->startSection('content'); ?>
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<div>
    <?php echo e(Form::open(['route'=>['guest.payments.proccess-payment'],'method' => 'post','class'=>'form-horizontal form-label-left','name'=>'frm_payment_method', 'id' => 'payment-form'])); ?>
    <div class="header">
        <div class="logo">
            <h1>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="site_title">
                    <img src="<?php echo e(asset('/images/logo.png')); ?>" alt="Logo" title="Go To Dashboard" class="img-fluid" />
                </a>
            </h1>
        </div>
    </div>
    <div id="loader"></div>
    <div class="App-Container is-noBackground flex-container justify-content-center" style="padding-top: 30px;">
        <div class="App App--singleItem">
            <div class="App-Overview">
                <header class="Header" style="background-color: rgb(255, 255, 255);">
                    <div class="Header-Content flex-container justify-content-space-between align-items-stretch">
                        <div class="Header-business flex-item width-grow flex-container align-items-center"><a
                                class="Link Header-businessLink Link--primary"
                                href="<?php echo e($back_link); ?>" aria-label="Previous page"
                                title="<?php echo e($companyname); ?>" target="_self">
                                <div style="position: relative;">
                                    <div class="flex-container align-items-center">
                                        <div class="Header-backArrowContainer" style="opacity: 1; transform: none;"><svg
                                                class="InlineSVG Icon Header-backArrow mr2 Icon--sm" focusable="false"
                                                width="12" height="12" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.417 7H15a1 1 0 0 1 0 2H3.417l4.591 4.591a1 1 0 0 1-1.415 1.416l-6.3-6.3a1 1 0 0 1 0-1.414l6.3-6.3A1 1 0 0 1 8.008 2.41z"
                                                    fill-rule="evenodd"></path>
                                            </svg></div>
                                        <div class="Header-merchantLogoContainer" style="transform: none;">
                                            <div class="Header-merchantLogoWithLabel flex-item width-grow">
                                                <div
                                                    class="HeaderImage HeaderImage--icon HeaderImage--iconFallback flex-item width-fixed flex-container justify-content-center align-items-center width-fixed">
                                                    <svg class="InlineSVG Icon HeaderImage-fallbackIcon Icon--sm"
                                                        focusable="false" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3 7.5V12h10V7.5c.718 0 1.398-.168 2-.468V15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7.032c.602.3 1.282.468 2 .468zM0 3L1.703.445A1 1 0 0 1 2.535 0h10.93a1 1 0 0 1 .832.445L16 3a3 3 0 0 1-5.5 1.659C9.963 5.467 9.043 6 8 6s-1.963-.533-2.5-1.341A3 3 0 0 1 0 3z"
                                                            fill-rule="evenodd"></path>
                                                    </svg></div><span
                                                    class="Header-businessLink-label Text Text-color--gray800 Text-fontSize--14 Text-fontWeight--500">Back</span>
                                                <h1
                                                    class="Header-businessLink-name Text Text-color--gray800 Text-fontSize--14 Text-fontWeight--500 Text--truncate">
                                                    <?php echo e($companyname); ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div></div>
                </header>
                <div class="">
                    <div class="ProductSummary">
                    <h6>How would you like to pay?</h6>
                    <div class="ProductSummary-info select">
                        <?php if($is_bank_allowed == 'on'): ?>  

                        <button class="payment-btn" id="bank_account_btn" type="button" onclick="changePaymentMethod('bank_account')">Bank Account</button>
                        <?php endif; ?> 
                        <?php if($is_credit_allowed == 'on'): ?>  

                        <button class="payment-btn" id="credit_card_btn" type="button" onclick="changePaymentMethod('credit_card')">Credit Card</button>
                        <?php endif; ?> 
                        <?php if($is_bank_allowed == 'on' && $is_credit_allowed != 'on'): ?>
                      
                      <?php
                      echo "<script> window.onload = function() {
                        changePaymentMethod('bank_account');
                    }; </script>"; ?>
                        <?php endif; ?>

                        <?php if($is_credit_allowed == 'on' && $is_bank_allowed != 'on'): ?>
                      
                      <?php
                      echo "<script> window.onload = function() {
                        changePaymentMethod('credit_card');
                    }; </script>"; ?>
                        <?php endif; ?>

                        <select style="opacity: 0;height:0px;" id="payment_method" class="Select-source w-100 col-md-7 col-xs-12 <?php if($errors->has('payment_method')): ?> parsley-error <?php endif; ?>" name="payment_method">
                                <option value="">Select payment method</option>
                                <option value="bank_account">Bank Account</option>
                                <option value="credit_card">Credit Card</option>
                            </select>
                        </div>

                        <div class="ProductSummary-info select mt-2" style="margin-top:5px;">
                    <h6>Amount:</h6>

                          <?php if($is_fixed == 1): ?>
                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
                            <input id="payment_amount" type="payment_amount" class="CheckoutInput Input Input--empty <?php if($errors->has('payment_amount')): ?> parsley-error <?php endif; ?>" name="payment_amount" placeholder="0.00$" value="<?php echo e($if_amount == 1 ? $amount :''); ?>" <?php if ($is_fixed == 1) {
    echo 'readonly';
} ?>  />
                            </div>
                          <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="App-Payment">
                <div class="row">
                    <?php if(Session::has('errorMessage')): ?>
                        <!-- <p class="alert alert-danger alert-block"><?php echo e(Session::get('errorMessage')); ?></p> -->
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong><?php echo e(Session::get('errorMessage')); ?></strong>.
                        </div>
                    <?php endif; ?>
                    <?php if(Session::has('successMessage')): ?>
                    <p class="alert alert-success alert-block"><?php echo e(Session::get('successMessage')); ?></p>
                    <?php endif; ?>
                </div>
                <div class="CheckoutPaymentForm">
                    <div class="PaymentRequestOrHeader" style="height: auto;">
                        <div class="ButtonAndDividerContainer" style="opacity: 0; display: none;"></div>
                    </div>
                        <div class="App-Global-Fields flex-container spacing-16 direction-row wrap-wrap">
                            
                            <div class="flex-item width-12">
                                <h2
                                    class="ShippingDetails-Heading Text Text-color--gray800 Text-fontSize--16 Text-fontWeight--500">
                                    Billing information</h2>
                            </div>
                            <div class="flex-item width-12">
                                <div class="FormFieldGroup">
                                    <div
                                        class="FormFieldGroup-labelContainer flex-container justify-content-space-between">
                                        <label for="email"><span
                                                class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Email</span></label>
                                        <div style="opacity: 1; transform: none;"></div>
                                    </div>
                                    <div class="FormFieldGroup-Fieldset" id="email-fieldset">
                                        <div class="FormFieldGroup-container">
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input class="CheckoutInput Input Input--empty"
                                                            autocomplete="email" autocorrect="off" spellcheck="false"
                                                            id="email" name="email" type="email" inputmode="email"
                                                            autocapitalize="none" aria-invalid="false"
                                                            aria-describedby="" value=""></span></div>
                                            </div>
                                            <div style="opacity: 0; height: 0px;"><span
                                                    class="FieldError Text Text-color--red Text-fontSize--13"><span
                                                        aria-hidden="true"></span></span></div>
                                        </div>
                                        <div style="opacity: 0; height: 0px;"><span
                                                class="FieldError Text Text-color--red Text-fontSize--13"><span
                                                    aria-hidden="true"></span></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ShippingForm flex-item width-12">
                                <div class="FormFieldGroup">
                                    <div
                                        class="FormFieldGroup-labelContainer flex-container justify-content-space-between">
                                        <label for="shipping-address-fieldset"><span
                                                class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Billing
                                                address</span></label></div>
                                    <fieldset class="FormFieldGroup-Fieldset" id="shipping-address-fieldset">
                                        <div class="FormFieldGroup-container">
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input class="CheckoutInput Input Input--empty"
                                                            autocomplete="shipping name" autocorrect="off"
                                                            spellcheck="false" id="shippingName" name="name"
                                                            type="text" aria-label="Name" placeholder="First name"
                                                            aria-invalid="false" aria-describedby="" value=""></span>
                                                </div>
                                            </div>
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input class="CheckoutInput Input Input--empty"
                                                            autocomplete="shipping name" autocorrect="off"
                                                            spellcheck="false" id="shippingName1" name="lname"
                                                            type="text" aria-label="Name" placeholder="Last name"
                                                            aria-invalid="false" aria-describedby="" value=""></span>
                                                </div>
                                            </div>
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight">
                                                <div class="FormFieldInput is-select">
                                                    <div>
                                                        <div class="Select"><select id="shippingCountry" autocomplete="shipping country" aria-label="Country or region" name="country" class="Select-source">
                                                                <option value="" disabled="" hidden=""></option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AX">Åland Islands</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="AD">Andorra</option>
                                                                <option value="AO">Angola</option>
                                                                <option value="AI">Anguilla</option>
                                                                <option value="AQ">Antarctica</option>
                                                                <option value="AG">Antigua &amp; Barbuda</option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AM">Armenia</option>
                                                                <option value="AW">Aruba</option>
                                                                <option value="AU">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option>
                                                                <option value="BS">Bahamas</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BD">Bangladesh</option>
                                                                <option value="BB">Barbados</option>
                                                                <option value="BY">Belarus</option>
                                                                <option value="BE">Belgium</option>
                                                                <option value="BZ">Belize</option>
                                                                <option value="BJ">Benin</option>
                                                                <option value="BM">Bermuda</option>
                                                                <option value="BT">Bhutan</option>
                                                                <option value="BO">Bolivia</option>
                                                                <option value="BA">Bosnia &amp; Herzegovina</option>
                                                                <option value="BW">Botswana</option>
                                                                <option value="BV">Bouvet Island</option>
                                                                <option value="BR">Brazil</option>
                                                                <option value="IO">British Indian Ocean Territory
                                                                </option>
                                                                <option value="VG">British Virgin Islands</option>
                                                                <option value="BN">Brunei</option>
                                                                <option value="BG">Bulgaria</option>
                                                                <option value="BF">Burkina Faso</option>
                                                                <option value="BI">Burundi</option>
                                                                <option value="KH">Cambodia</option>
                                                                <option value="CM">Cameroon</option>
                                                                <option value="CA">Canada</option>
                                                                <option value="CV">Cape Verde</option>
                                                                <option value="BQ">Caribbean Netherlands</option>
                                                                <option value="KY">Cayman Islands</option>
                                                                <option value="CF">Central African Republic</option>
                                                                <option value="TD">Chad</option>
                                                                <option value="CL">Chile</option>
                                                                <option value="CN">China</option>
                                                                <option value="CO">Colombia</option>
                                                                <option value="KM">Comoros</option>
                                                                <option value="CG">Congo - Brazzaville</option>
                                                                <option value="CD">Congo - Kinshasa</option>
                                                                <option value="CK">Cook Islands</option>
                                                                <option value="CR">Costa Rica</option>
                                                                <option value="CI">Côte d’Ivoire</option>
                                                                <option value="HR">Croatia</option>
                                                                <option value="CW">Curaçao</option>
                                                                <option value="CY">Cyprus</option>
                                                                <option value="CZ">Czechia</option>
                                                                <option value="DK">Denmark</option>
                                                                <option value="DJ">Djibouti</option>
                                                                <option value="DM">Dominica</option>
                                                                <option value="DO">Dominican Republic</option>
                                                                <option value="EC">Ecuador</option>
                                                                <option value="EG">Egypt</option>
                                                                <option value="SV">El Salvador</option>
                                                                <option value="GQ">Equatorial Guinea</option>
                                                                <option value="ER">Eritrea</option>
                                                                <option value="EE">Estonia</option>
                                                                <option value="SZ">Eswatini</option>
                                                                <option value="ET">Ethiopia</option>
                                                                <option value="FK">Falkland Islands</option>
                                                                <option value="FO">Faroe Islands</option>
                                                                <option value="FJ">Fiji</option>
                                                                <option value="FI">Finland</option>
                                                                <option value="FR">France</option>
                                                                <option value="GF">French Guiana</option>
                                                                <option value="PF">French Polynesia</option>
                                                                <option value="TF">French Southern Territories</option>
                                                                <option value="GA">Gabon</option>
                                                                <option value="GM">Gambia</option>
                                                                <option value="GE">Georgia</option>
                                                                <option value="DE">Germany</option>
                                                                <option value="GH">Ghana</option>
                                                                <option value="GI">Gibraltar</option>
                                                                <option value="GR">Greece</option>
                                                                <option value="GL">Greenland</option>
                                                                <option value="GD">Grenada</option>
                                                                <option value="GP">Guadeloupe</option>
                                                                <option value="GU">Guam</option>
                                                                <option value="GT">Guatemala</option>
                                                                <option value="GG">Guernsey</option>
                                                                <option value="GN">Guinea</option>
                                                                <option value="GW">Guinea-Bissau</option>
                                                                <option value="GY">Guyana</option>
                                                                <option value="HT">Haiti</option>
                                                                <option value="HN">Honduras</option>
                                                                <option value="HK">Hong Kong SAR China</option>
                                                                <option value="HU">Hungary</option>
                                                                <option value="IS">Iceland</option>
                                                                <option value="IN">India</option>
                                                                <option value="ID">Indonesia</option>
                                                                <option value="IQ">Iraq</option>
                                                                <option value="IE">Ireland</option>
                                                                <option value="IM">Isle of Man</option>
                                                                <option value="IL">Israel</option>
                                                                <option value="IT">Italy</option>
                                                                <option value="JM">Jamaica</option>
                                                                <option value="JP">Japan</option>
                                                                <option value="JE">Jersey</option>
                                                                <option value="JO">Jordan</option>
                                                                <option value="KZ">Kazakhstan</option>
                                                                <option value="KE">Kenya</option>
                                                                <option value="KI">Kiribati</option>
                                                                <option value="XK">Kosovo</option>
                                                                <option value="KW">Kuwait</option>
                                                                <option value="KG">Kyrgyzstan</option>
                                                                <option value="LA">Laos</option>
                                                                <option value="LV">Latvia</option>
                                                                <option value="LB">Lebanon</option>
                                                                <option value="LS">Lesotho</option>
                                                                <option value="LR">Liberia</option>
                                                                <option value="LY">Libya</option>
                                                                <option value="LI">Liechtenstein</option>
                                                                <option value="LT">Lithuania</option>
                                                                <option value="LU">Luxembourg</option>
                                                                <option value="MO">Macao SAR China</option>
                                                                <option value="MG">Madagascar</option>
                                                                <option value="MW">Malawi</option>
                                                                <option value="MY">Malaysia</option>
                                                                <option value="MV">Maldives</option>
                                                                <option value="ML">Mali</option>
                                                                <option value="MT">Malta</option>
                                                                <option value="MQ">Martinique</option>
                                                                <option value="MR">Mauritania</option>
                                                                <option value="MU">Mauritius</option>
                                                                <option value="YT">Mayotte</option>
                                                                <option value="MX">Mexico</option>
                                                                <option value="MD">Moldova</option>
                                                                <option value="MC">Monaco</option>
                                                                <option value="MN">Mongolia</option>
                                                                <option value="ME">Montenegro</option>
                                                                <option value="MS">Montserrat</option>
                                                                <option value="MA">Morocco</option>
                                                                <option value="MZ">Mozambique</option>
                                                                <option value="MM">Myanmar (Burma)</option>
                                                                <option value="NA">Namibia</option>
                                                                <option value="NR">Nauru</option>
                                                                <option value="NP">Nepal</option>
                                                                <option value="NL">Netherlands</option>
                                                                <option value="NC">New Caledonia</option>
                                                                <option value="NZ">New Zealand</option>
                                                                <option value="NI">Nicaragua</option>
                                                                <option value="NE">Niger</option>
                                                                <option value="NG">Nigeria</option>
                                                                <option value="NU">Niue</option>
                                                                <option value="MK">North Macedonia</option>
                                                                <option value="NO">Norway</option>
                                                                <option value="OM">Oman</option>
                                                                <option value="PK">Pakistan</option>
                                                                <option value="PS">Palestinian Territories</option>
                                                                <option value="PA">Panama</option>
                                                                <option value="PG">Papua New Guinea</option>
                                                                <option value="PY">Paraguay</option>
                                                                <option value="PE">Peru</option>
                                                                <option value="PH">Philippines</option>
                                                                <option value="PN">Pitcairn Islands</option>
                                                                <option value="PL">Poland</option>
                                                                <option value="PT">Portugal</option>
                                                                <option value="PR">Puerto Rico</option>
                                                                <option value="QA">Qatar</option>
                                                                <option value="RE">Réunion</option>
                                                                <option value="RO">Romania</option>
                                                                <option value="RU">Russia</option>
                                                                <option value="RW">Rwanda</option>
                                                                <option value="WS">Samoa</option>
                                                                <option value="SM">San Marino</option>
                                                                <option value="ST">São Tomé &amp; Príncipe</option>
                                                                <option value="SA">Saudi Arabia</option>
                                                                <option value="SN">Senegal</option>
                                                                <option value="RS">Serbia</option>
                                                                <option value="SC">Seychelles</option>
                                                                <option value="SL">Sierra Leone</option>
                                                                <option value="SG">Singapore</option>
                                                                <option value="SX">Sint Maarten</option>
                                                                <option value="SK">Slovakia</option>
                                                                <option value="SI">Slovenia</option>
                                                                <option value="SB">Solomon Islands</option>
                                                                <option value="SO">Somalia</option>
                                                                <option value="ZA">South Africa</option>
                                                                <option value="GS">South Georgia &amp; South Sandwich
                                                                    Islands</option>
                                                                <option value="KR">South Korea</option>
                                                                <option value="SS">South Sudan</option>
                                                                <option value="ES">Spain</option>
                                                                <option value="LK">Sri Lanka</option>
                                                                <option value="BL">St Barthélemy</option>
                                                                <option value="SH">St Helena</option>
                                                                <option value="KN">St Kitts &amp; Nevis</option>
                                                                <option value="LC">St Lucia</option>
                                                                <option value="MF">St Martin</option>
                                                                <option value="PM">St Pierre &amp; Miquelon</option>
                                                                <option value="VC">St Vincent &amp; Grenadines</option>
                                                                <option value="SR">Suriname</option>
                                                                <option value="SJ">Svalbard &amp; Jan Mayen</option>
                                                                <option value="SE">Sweden</option>
                                                                <option value="CH">Switzerland</option>
                                                                <option value="TW">Taiwan</option>
                                                                <option value="TJ">Tajikistan</option>
                                                                <option value="TZ">Tanzania</option>
                                                                <option value="TH">Thailand</option>
                                                                <option value="TL">Timor-Leste</option>
                                                                <option value="TG">Togo</option>
                                                                <option value="TK">Tokelau</option>
                                                                <option value="TO">Tonga</option>
                                                                <option value="TT">Trinidad &amp; Tobago</option>
                                                                <option value="TA">Tristan da Cunha</option>
                                                                <option value="TN">Tunisia</option>
                                                                <option value="TR">Turkey</option>
                                                                <option value="TM">Turkmenistan</option>
                                                                <option value="TC">Turks &amp; Caicos Islands</option>
                                                                <option value="TV">Tuvalu</option>
                                                                <option value="UG">Uganda</option>
                                                                <option value="UA">Ukraine</option>
                                                                <option value="AE">United Arab Emirates</option>
                                                                <option value="GB">United Kingdom</option>
                                                                <option value="US" selected>United States</option>
                                                                <option value="UY">Uruguay</option>
                                                                <option value="UZ">Uzbekistan</option>
                                                                <option value="VU">Vanuatu</option>
                                                                <option value="VA">Vatican City</option>
                                                                <option value="VE">Venezuela</option>
                                                                <option value="VN">Vietnam</option>
                                                                <option value="WF">Wallis &amp; Futuna</option>
                                                                <option value="EH">Western Sahara</option>
                                                                <option value="YE">Yemen</option>
                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select><svg class="InlineSVG Icon Select-arrow Icon--sm"
                                                                focusable="false" viewBox="0 0 12 12">
                                                                <path
                                                                    d="M10.193 3.97a.75.75 0 0 1 1.062 1.062L6.53 9.756a.75.75 0 0 1-1.06 0L.745 5.032A.75.75 0 0 1 1.807 3.97L6 8.163l4.193-4.193z"
                                                                    fill-rule="evenodd"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input class="CheckoutInput Input Input--empty"
                                                            autocomplete="shipping address-line1" autocorrect="off"
                                                            spellcheck="false" id="shippingAddressLine1"
                                                            name="address" type="text"
                                                            aria-label="Address" placeholder="Address"
                                                            aria-invalid="false" aria-describedby="" value=""></span>
                                                </div>
                                            </div>
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input class="CheckoutInput Input Input--empty"
                                                            autocomplete="shipping address-line2" autocorrect="off"
                                                            spellcheck="false" id="shippingAddressLine2"
                                                            name="city" type="text"
                                                            aria-label="Address" placeholder="City"
                                                            aria-invalid="false" aria-describedby="" value=""></span>
                                                </div>
                                            </div>
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input class="CheckoutInput Input Input--empty"
                                                            autocomplete="shipping address-line2" autocorrect="off"
                                                            spellcheck="false" id="shippingAddressLine3"
                                                            name="state" type="text"
                                                            aria-label="State" placeholder="State"
                                                            aria-invalid="false" aria-describedby="" value=""></span>
                                                </div>
                                            </div>
                                            <?php echo e(Form::hidden('cId', $companyid)); ?>

                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childRight FormFieldGroup-childBottom">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input class="CheckoutInput Input Input--empty"
                                                            autocomplete="shipping postal-code" autocorrect="off"
                                                            spellcheck="false" id="shippingPostalCode"
                                                            name="zip" type="text"
                                                            aria-label="Postal code" placeholder="Zip code"
                                                            aria-invalid="false" aria-describedby="" value=""></span>
                                                </div>
                                            </div>
                                            <div style="opacity: 0; height: 0px;"><span
                                                    class="FieldError Text Text-color--red Text-fontSize--13"><span
                                                        aria-hidden="true"></span></span></div>
                                        </div>
                                        <div style="opacity: 0; height: 0px;"><span
                                                class="FieldError Text Text-color--red Text-fontSize--13"><span
                                                    aria-hidden="true"></span></span></div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="flex-item width-12">
                                <h2
                                    class="PaymentMethod-Heading Text Text-color--gray800 Text-fontSize--16 Text-fontWeight--500">
                                    Payment details</h2>
                            </div>
                        </div>
                        <div id="payment_type_fields">

                        </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    <div style="display:none;height: 0;position: fixed;top: -10000px;" id="bank_account" class="App-Global-Fields flex-container spacing-16 direction-row wrap-wrap">
                            <div class="flex-item width-12">
                                <h2
                                    class="ShippingDetails-Heading Text Text-color--gray800 Text-fontSize--16 Text-fontWeight--500">
                                    Bank information</h2>
                            </div>
                            <div class="flex-item width-12">
                                <div class="FormFieldGroup">
                                    <div class="FormFieldGroup-Fieldset" id="email-fieldset">
                                        <div class="FormFieldGroup-container">
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input inputmode="numeric" class="CheckoutInput Input Input--empty <?php if($errors->has('account_number')): ?> parsley-error <?php endif; ?>" name="account_number" placeholder="Enter bank account number"
                                                        id="account_number" type="number"></span></div>
                                            </div>
                                            <div style="opacity: 0; height: 0px;"><span
                                                    class="FieldError Text Text-color--red Text-fontSize--13"><span
                                                        aria-hidden="true"></span></span></div>
                                                        <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input inputmode="numeric" class="CheckoutInput Input Input--empty <?php if($errors->has('routing_number')): ?> parsley-error <?php endif; ?>" id="routing_number" type="number" name="routing_number" placeholder="Enter bank routing number"></span></div>
                                            </div>
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
                                                <div class="FormFieldInput is-select"><span class="InputContainer"
                                                        data-max="">
                                                        <div class="Select">
                                                        <select id="account_type" class="form-control col-md-7 col-xs-12 <?php if($errors->has('account_type')): ?> parsley-error <?php endif; ?>" name="account_type">
                                                            <option value="">Select account type </option>
                                                            <option value="1">Checking</option>
                                                            <option value="2">Savings</option>
                                                        </select>
                                                        </div>
                                                    </span></div>
                                                </div>
                                            </div>
                                        <div style="opacity: 0; height: 0px;"><span
                                                class="FieldError Text Text-color--red Text-fontSize--13"><span
                                                    aria-hidden="true"></span></span></div>
                                    </div>
                                    <div class="flex-item width-12"><button disabled class="SubmitButton SubmitButton--incomplete"
                                    type="submit"
                                    style="background-color: rgb(36, 103, 182); color: rgb(255, 255, 255);">
                                    <div class="SubmitButton-Shimmer"
                                        style="background: linear-gradient(to right, rgba(36, 103, 182, 0) 0%, rgb(68, 125, 207) 50%, rgba(36, 103, 182, 0) 100%);">
                                    </div>
                                    <div class="SubmitButton-TextContainer"><span
                                            class="SubmitButton-Text SubmitButton-Text--current Text Text-color--default Text-fontWeight--500 Text--truncate"
                                            aria-hidden="false">Pay $<?php echo e($if_amount == 1 ? $amount :''); ?></span><span
                                            class="SubmitButton-Text SubmitButton-Text--pre Text Text-color--default Text-fontWeight--500 Text--truncate"
                                            aria-hidden="true">Processing...</span></div>
                                    <div class="SubmitButton-IconContainer">
                                        <div class="SubmitButton-Icon SubmitButton-Icon--pre">
                                            <div class="Icon Icon--md Icon--square"><svg viewBox="0 0 16 16"
                                                    xmlns="http://www.w3.org/2000/svg" focusable="false">
                                                    <path
                                                        d="M3 7V5a5 5 0 1 1 10 0v2h.5a1 1 0 0 1 1 1v6a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2V8a1 1 0 0 1 1-1zm5 2.5a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0v-2a1 1 0 0 0-1-1zM11 7V5a3 3 0 1 0-6 0v2z"
                                                        fill="#ffffff" fill-rule="evenodd"></path>
                                                </svg></div>
                                        </div>
                                        <div class="SubmitButton-Icon SubmitButton-SpinnerIcon SubmitButton-Icon--pre">
                                            <div class="Icon Icon--md Icon--square"><svg viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" focusable="false">
                                                    <ellipse cx="12" cy="12" rx="10" ry="10"
                                                        style="stroke: rgb(255, 255, 255);"></ellipse>
                                                </svg></div>
                                        </div>
                                    </div>
                                    <div class="SubmitButton-CheckmarkIcon">
                                        <div class="Icon Icon--md"><svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                height="14" focusable="false">
                                                <path d="M 0.5 6 L 8 13.5 L 21.5 0" fill="transparent" stroke-width="2"
                                                    stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg></div>
                                    </div>
                                </button>
                                <div class="ConfirmPayment-PostSubmit">
                                    <div>
                                        <div class="ConfirmTerms Text Text-color--gray500 Text-fontSize--13">By
                                            confirming your payment, you allow <?php echo e($companyname); ?> to charge your card
                                            for this payment and future payments in accordance with their terms.</div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <div style="opacity:0;height: 0;position: fixed;top: -1100000px;" id="credit_card" class="PaymentForm-paymentMethodFormContainer flex-container spacing-16 direction-row wrap-wrap">
                            <div class="flex-item width-12">
                                <div class="FormFieldGroup">
                                    <div
                                        class="FormFieldGroup-labelContainer flex-container justify-content-space-between">
                                        <label for="cardNumber-fieldset"><span
                                                class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Card
                                                information</span></label></div>
                                    <fieldset class="FormFieldGroup-Fieldset" id="cardNumber-fieldset">
                                        <div class="FormFieldGroup-container" id="cardNumber-fieldset">
                                            <div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop">
                                                <div class="FormFieldInput has-icon"><span class="InputContainer"
                                                        data-max=""><input
                                                            class="CheckoutInput CheckoutInput--tabularnums Input" id="cc-input"
                                                            autocomplete="cc-number" autocorrect="on"
                                                            spellcheck="false" data-payment='cc-number' id="cardNumber" name="credit_card_number"
                                                            type="text" inputmode="numeric" aria-label="Card number"
                                                            placeholder="1234 1234 1234 1234" aria-invalid="false" onkeyup="myFunctionCheck()" min="19" minlength="19"
                                                            value=""></span>
                                                    <div class="FormFieldInput-Icons" style="opacity: 0;">
                                                        <div style="transform: translateX(84px) translateZ(0px);"><span
                                                                class="FormFieldInput-IconsIcon is-visible"><img
                                                                    src="https://js.stripe.com/v3/fingerprinted/img/visa-365725566f9578a9589553aa9296d178.svg"
                                                                    alt="visa" class="BrandIcon"></span></div>
                                                        <div style="transform: translateX(56px) translateZ(0px);"><span
                                                                class="FormFieldInput-IconsIcon is-visible"><img
                                                                    src="https://js.stripe.com/v3/fingerprinted/img/mastercard-4d8844094130711885b5e41b28c9848f.svg"
                                                                    alt="mastercard" class="BrandIcon"></span></div>
                                                        <div style="transform: translateX(28px) translateZ(0px);"><span
                                                                class="FormFieldInput-IconsIcon is-visible"><img
                                                                    src="https://js.stripe.com/v3/fingerprinted/img/amex-a49b82f46c5cd6a96a6e418a6ca1717c.svg"
                                                                    alt="amex" class="BrandIcon"></span></div>
                                                        <div class="CardFormFieldGroupIconOverflow"><span
                                                                class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible"
                                                                role="presentation"><span
                                                                    class="FormFieldInput-IconsIcon"
                                                                    role="presentation"><img
                                                                        src="https://js.stripe.com/v3/fingerprinted/img/unionpay-8a10aefc7295216c338ba4e1224627a1.svg"
                                                                        alt="unionpay"
                                                                        class="BrandIcon"></span></span><span
                                                                class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible"
                                                                role="presentation"><span
                                                                    class="FormFieldInput-IconsIcon"
                                                                    role="presentation"><img
                                                                        src="https://js.stripe.com/v3/fingerprinted/img/jcb-271fd06e6e7a2c52692ffa91a95fb64f.svg"
                                                                        alt="jcb" class="BrandIcon"></span></span><span
                                                                class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--visible"
                                                                role="presentation"><span
                                                                    class="FormFieldInput-IconsIcon"
                                                                    role="presentation"><img
                                                                        src="https://js.stripe.com/v3/fingerprinted/img/discover-ac52cd46f89fa40a29a0bfb954e33173.svg"
                                                                        alt="discover"
                                                                        class="BrandIcon"></span></span><span
                                                                class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible"
                                                                role="presentation"><span
                                                                    class="FormFieldInput-IconsIcon"
                                                                    role="presentation"><img
                                                                        src="https://js.stripe.com/v3/fingerprinted/img/diners-fbcbd3360f8e3f629cdaa80e93abdb8b.svg"
                                                                        alt="diners" class="BrandIcon"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="FormFieldInput-Icon is-loaded">
                                                        <img src="https://js.stripe.com/v3/fingerprinted/img/visa-365725566f9578a9589553aa9296d178.svg" alt="visa" class="BrandIcon" id="visa-img" style="display: none;">
                                                        <img src="https://js.stripe.com/v3/fingerprinted/img/mastercard-4d8844094130711885b5e41b28c9848f.svg" alt="mastercard" class="BrandIcon" id="mastercard-img" style="display: none;">
                                                        <img src="https://js.stripe.com/v3/fingerprinted/img/amex-a49b82f46c5cd6a96a6e418a6ca1717c.svg" alt="amex" class="BrandIcon" id="amex-img" style="display: none;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-6 FormFieldGroup-childLeft FormFieldGroup-childBottom">
                                                <div class="FormFieldInput"><span class="InputContainer"
                                                        data-max=""><input
                                                            class="CheckoutInput CheckoutInput--tabularnums Input"
                                                            autocomplete="cc-exp" autocorrect="on" spellcheck="false"
                                                            id="cardExpiry" name="expiry_date" type="text"
                                                            inputmode="numeric" aria-label="Expiry"
                                                            placeholder="MM / YY" data-payment='cc-exp' aria-invalid="false"
                                                            value=""></span></div>
                                            </div>
                                            <div
                                                class="FormFieldGroup-child FormFieldGroup-child--width-6 FormFieldGroup-childRight FormFieldGroup-childBottom">
                                                <div class="FormFieldInput has-icon"><span class="InputContainer"
                                                        data-max=""><input
                                                            class="CheckoutInput CheckoutInput--tabularnums Input"
                                                            autocomplete="cc-csc" autocorrect="off" spellcheck="false"
                                                            id="cardCvc" name="cvv" type="text" inputmode="numeric"
                                                            aria-label="CVC" data-payment='cc-cvc' placeholder="CVC" aria-invalid="false"
                                                            value=""></span>
                                                    <div class="FormFieldInput-Icon is-loaded"><svg
                                                            class="Icon Icon--md" focusable="false" viewBox="0 0 32 21">
                                                            <g fill="none" fill-rule="evenodd">
                                                                <g class="Icon-fill">
                                                                    <g transform="translate(0 2)">
                                                                        <path
                                                                            d="M21.68 0H2c-.92 0-2 1.06-2 2v15c0 .94 1.08 2 2 2h25c.92 0 2-1.06 2-2V9.47a5.98 5.98 0 0 1-3 1.45V11c0 .66-.36 1-1 1H3c-.64 0-1-.34-1-1v-1c0-.66.36-1 1-1h17.53a5.98 5.98 0 0 1 1.15-9z"
                                                                            opacity=".2"></path>
                                                                        <path
                                                                            d="M19.34 3H0v3h19.08a6.04 6.04 0 0 1 .26-3z"
                                                                            opacity=".3"></path>
                                                                    </g>
                                                                    <g transform="translate(18)">
                                                                        <path
                                                                            d="M7 14A7 7 0 1 1 7 0a7 7 0 0 1 0 14zM4.22 4.1h-.79l-1.93.98v1l1.53-.8V9.9h1.2V4.1zm2.3.8c.57 0 .97.32.97.78 0 .5-.47.85-1.15.85h-.3v.85h.36c.72 0 1.21.36 1.21.88 0 .5-.48.84-1.16.84-.5 0-1-.16-1.52-.47v1c.56.24 1.12.37 1.67.37 1.31 0 2.21-.67 2.21-1.64 0-.68-.42-1.23-1.12-1.45.6-.2.99-.73.99-1.33C8.68 4.64 7.85 4 6.65 4a4 4 0 0 0-1.57.34v.98c.48-.27.97-.42 1.44-.42zm4.32 2.18c.73 0 1.24.43 1.24.99 0 .59-.51 1-1.24 1-.44 0-.9-.14-1.37-.43v1.03c.49.22.99.33 1.48.33.26 0 .5-.04.73-.1.52-.85.82-1.83.82-2.88l-.02-.42a2.3 2.3 0 0 0-1.23-.32c-.18 0-.37.01-.57.04v-1.3h1.44a5.62 5.62 0 0 0-.46-.92H9.64v3.15c.4-.1.8-.17 1.2-.17z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg></div>
                                                </div>
                                            </div>
                                            <div style="opacity: 0; height: 0px;"><span
                                                    class="FieldError Text Text-color--red Text-fontSize--13"><span
                                                        aria-hidden="true"></span></span></div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="flex-item width-12"></div>
                            <div class="flex-item width-12"><button disabled class="SubmitButton SubmitButton--incomplete"
                                    type="submit"
                                    style="background-color: rgb(36, 103, 182); color: rgb(255, 255, 255);">
                                    <div class="SubmitButton-Shimmer"
                                        style="background: linear-gradient(to right, rgba(36, 103, 182, 0) 0%, rgb(68, 125, 207) 50%, rgba(36, 103, 182, 0) 100%);">
                                    </div>
                                    <div class="SubmitButton-TextContainer"><span
                                            class="SubmitButton-Text SubmitButton-Text--current Text Text-color--default Text-fontWeight--500 Text--truncate"
                                            aria-hidden="false">Pay $<?php echo e($if_amount == 1 ? $amount :''); ?></span><span
                                            class="SubmitButton-Text SubmitButton-Text--pre Text Text-color--default Text-fontWeight--500 Text--truncate"
                                            aria-hidden="true">Processing...</span></div>
                                    <div class="SubmitButton-IconContainer">
                                        <div class="SubmitButton-Icon SubmitButton-Icon--pre">
                                            <div class="Icon Icon--md Icon--square"><svg viewBox="0 0 16 16"
                                                    xmlns="http://www.w3.org/2000/svg" focusable="false">
                                                    <path
                                                        d="M3 7V5a5 5 0 1 1 10 0v2h.5a1 1 0 0 1 1 1v6a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2V8a1 1 0 0 1 1-1zm5 2.5a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0v-2a1 1 0 0 0-1-1zM11 7V5a3 3 0 1 0-6 0v2z"
                                                        fill="#ffffff" fill-rule="evenodd"></path>
                                                </svg></div>
                                        </div>
                                        <div class="SubmitButton-Icon SubmitButton-SpinnerIcon SubmitButton-Icon--pre">
                                            <div class="Icon Icon--md Icon--square"><svg viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" focusable="false">
                                                    <ellipse cx="12" cy="12" rx="10" ry="10"
                                                        style="stroke: rgb(255, 255, 255);"></ellipse>
                                                </svg></div>
                                        </div>
                                    </div>
                                    <div class="SubmitButton-CheckmarkIcon">
                                        <div class="Icon Icon--md"><svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                height="14" focusable="false">
                                                <path d="M 0.5 6 L 8 13.5 L 21.5 0" fill="transparent" stroke-width="2"
                                                    stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg></div>
                                    </div>
                                </button>
                                <div class="ConfirmPayment-PostSubmit">
                                    <div>
                                        <div class="ConfirmTerms Text Text-color--gray500 Text-fontSize--13">By
                                            confirming your payment, you allow <?php echo e($companyname); ?> to charge your card
                                            for this payment and future payments in accordance with their terms.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
<script>
     function myFunctionCheck() {
    var x = document.getElementById("cc-input").value;
    if (x == "4") {
        $("#visa-img").show();
        $("#mastercard-img").hide();
        $("#amex-img").hide();    

        $("#cardCvc").attr('maxlength','3');
    }
    if (x == "5") {
        $("#visa-img").hide();
        $("#mastercard-img").show();
        $("#amex-img").hide();    

        $("#cardCvc").attr('maxlength','3');
    }
    if (x == "3") {
        $("#visa-img").hide();
        $("#mastercard-img").hide();
        $("#amex-img").show();    

        $("#cardCvc").attr('maxlength','4');
    }
    console.log("Hellop");
    
  }
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<title>Payvexity | qweqwe</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##

<?php echo e(Html::style(mix('assets/auth/css/login.css'))); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<!-- <?php echo e(Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')); ?> -->
<script>
    // Generated by CoffeeScript 1.7.1
(function() {
  var $, cardFromNumber, cardFromType, cards, defaultFormat, formatBackCardNumber, formatBackExpiry, formatCardNumber, formatExpiry, formatForwardExpiry, formatForwardSlashAndSpace, hasTextSelected, luhnCheck, reFormatCVC, reFormatCardNumber, reFormatExpiry, reFormatNumeric, replaceFullWidthChars, restrictCVC, restrictCardNumber, restrictExpiry, restrictNumeric, safeVal, setCardType,
    __slice = [].slice,
    __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

  $ = window.jQuery || window.Zepto || window.$;

  $.payment = {};

  $.payment.fn = {};

  $.fn.payment = function() {
    var args, method;
    method = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
    return $.payment.fn[method].apply(this, args);
  };

  defaultFormat = /(\d{1,4})/g;

  $.payment.cards = cards = [
    {
      type: 'maestro',
      patterns: [5018, 502, 503, 506, 56, 58, 639, 6220, 67],
      format: defaultFormat,
      length: [12, 13, 14, 15, 16, 17, 18, 19],
      cvcLength: [3],
      luhn: true
    }, {
      type: 'forbrugsforeningen',
      patterns: [600],
      format: defaultFormat,
      length: [16],
      cvcLength: [3],
      luhn: true
    }, {
      type: 'dankort',
      patterns: [5019],
      format: defaultFormat,
      length: [16],
      cvcLength: [3],
      luhn: true
    }, {
      type: 'visa',
      patterns: [4],
      format: defaultFormat,
      length: [13, 16],
      cvcLength: [3],
      luhn: true
    }, {
      type: 'mastercard',
      patterns: [51, 52, 53, 54, 55, 22, 23, 24, 25, 26, 27],
      format: defaultFormat,
      length: [16],
      cvcLength: [3],
      luhn: true
    }, {
      type: 'amex',
      patterns: [34, 37],
      format: /(\d{1,4})(\d{1,6})?(\d{1,5})?/,
      length: [15],
      cvcLength: [3, 4],
      luhn: true
    }, {
      type: 'dinersclub',
      patterns: [30, 36, 38, 39],
      format: /(\d{1,4})(\d{1,6})?(\d{1,4})?/,
      length: [14],
      cvcLength: [3],
      luhn: true
    }, {
      type: 'discover',
      patterns: [60, 64, 65, 622],
      format: defaultFormat,
      length: [16],
      cvcLength: [3],
      luhn: true
    }, {
      type: 'unionpay',
      patterns: [62, 88],
      format: defaultFormat,
      length: [16, 17, 18, 19],
      cvcLength: [3],
      luhn: false
    }, {
      type: 'jcb',
      patterns: [35],
      format: defaultFormat,
      length: [16],
      cvcLength: [3],
      luhn: true
    }
  ];

  cardFromNumber = function(num) {
    var card, p, pattern, _i, _j, _len, _len1, _ref;
    num = (num + '').replace(/\D/g, '');
    for (_i = 0, _len = cards.length; _i < _len; _i++) {
      card = cards[_i];
      _ref = card.patterns;
      for (_j = 0, _len1 = _ref.length; _j < _len1; _j++) {
        pattern = _ref[_j];
        p = pattern + '';
        if (num.substr(0, p.length) === p) {
          return card;
        }
      }
    }
  };

  cardFromType = function(type) {
    var card, _i, _len;
    for (_i = 0, _len = cards.length; _i < _len; _i++) {
      card = cards[_i];
      if (card.type === type) {
        return card;
      }
    }
  };

  luhnCheck = function(num) {
    var digit, digits, odd, sum, _i, _len;
    odd = true;
    sum = 0;
    digits = (num + '').split('').reverse();
    for (_i = 0, _len = digits.length; _i < _len; _i++) {
      digit = digits[_i];
      digit = parseInt(digit, 10);
      if ((odd = !odd)) {
        digit *= 2;
      }
      if (digit > 9) {
        digit -= 9;
      }
      sum += digit;
    }
    return sum % 10 === 0;
  };

  hasTextSelected = function($target) {
    var _ref;
    if (($target.prop('selectionStart') != null) && $target.prop('selectionStart') !== $target.prop('selectionEnd')) {
      return true;
    }
    if ((typeof document !== "undefined" && document !== null ? (_ref = document.selection) != null ? _ref.createRange : void 0 : void 0) != null) {
      if (document.selection.createRange().text) {
        return true;
      }
    }
    return false;
  };

  safeVal = function(value, $target) {
    var currPair, cursor, digit, error, last, prevPair;
    try {
      cursor = $target.prop('selectionStart');
    } catch (_error) {
      error = _error;
      cursor = null;
    }
    last = $target.val();
    $target.val(value);
    if (cursor !== null && $target.is(":focus")) {
      if (cursor === last.length) {
        cursor = value.length;
      }
      if (last !== value) {
        prevPair = last.slice(cursor - 1, +cursor + 1 || 9e9);
        currPair = value.slice(cursor - 1, +cursor + 1 || 9e9);
        digit = value[cursor];
        if (/\d/.test(digit) && prevPair === ("" + digit + " ") && currPair === (" " + digit)) {
          cursor = cursor + 1;
        }
      }
      $target.prop('selectionStart', cursor);
      return $target.prop('selectionEnd', cursor);
    }
  };

  replaceFullWidthChars = function(str) {
    var chars, chr, fullWidth, halfWidth, idx, value, _i, _len;
    if (str == null) {
      str = '';
    }
    fullWidth = '\uff10\uff11\uff12\uff13\uff14\uff15\uff16\uff17\uff18\uff19';
    halfWidth = '0123456789';
    value = '';
    chars = str.split('');
    for (_i = 0, _len = chars.length; _i < _len; _i++) {
      chr = chars[_i];
      idx = fullWidth.indexOf(chr);
      if (idx > -1) {
        chr = halfWidth[idx];
      }
      value += chr;
    }
    return value;
  };

  reFormatNumeric = function(e) {
    var $target;
    $target = $(e.currentTarget);
    return setTimeout(function() {
      var value;
      value = $target.val();
      value = replaceFullWidthChars(value);
      value = value.replace(/\D/g, '');
      return safeVal(value, $target);
    });
  };

  reFormatCardNumber = function(e) {
    var $target;
    $target = $(e.currentTarget);
    return setTimeout(function() {
      var value;
      value = $target.val();
      value = replaceFullWidthChars(value);
      value = $.payment.formatCardNumber(value);
      return safeVal(value, $target);
    });
  };

  formatCardNumber = function(e) {
    var $target, card, digit, length, re, upperLength, value;
    digit = String.fromCharCode(e.which);
    if (!/^\d+$/.test(digit)) {
      return;
    }
    $target = $(e.currentTarget);
    value = $target.val();
    card = cardFromNumber(value + digit);
    length = (value.replace(/\D/g, '') + digit).length;
    upperLength = 16;
    if (card) {
      upperLength = card.length[card.length.length - 1];
    }
    if (length >= upperLength) {
      return;
    }
    if (($target.prop('selectionStart') != null) && $target.prop('selectionStart') !== value.length) {
      return;
    }
    if (card && card.type === 'amex') {
      re = /^(\d{4}|\d{4}\s\d{6})$/;
    } else {
      re = /(?:^|\s)(\d{4})$/;
    }
    if (re.test(value)) {
      e.preventDefault();
      return setTimeout(function() {
        return $target.val(value + ' ' + digit);
      });
    } else if (re.test(value + digit)) {
      e.preventDefault();
      return setTimeout(function() {
        return $target.val(value + digit + ' ');
      });
    }
  };

  formatBackCardNumber = function(e) {
    var $target, value;
    $target = $(e.currentTarget);
    value = $target.val();
    if (e.which !== 8) {
      return;
    }
    if (($target.prop('selectionStart') != null) && $target.prop('selectionStart') !== value.length) {
      return;
    }
    if (/\d\s$/.test(value)) {
      e.preventDefault();
      return setTimeout(function() {
        return $target.val(value.replace(/\d\s$/, ''));
      });
    } else if (/\s\d?$/.test(value)) {
      e.preventDefault();
      return setTimeout(function() {
        return $target.val(value.replace(/\d$/, ''));
      });
    }
  };

  reFormatExpiry = function(e) {
    var $target;
    $target = $(e.currentTarget);
    return setTimeout(function() {
      var value;
      value = $target.val();
      value = replaceFullWidthChars(value);
      value = $.payment.formatExpiry(value);
      return safeVal(value, $target);
    });
  };

  formatExpiry = function(e) {
    var $target, digit, val;
    digit = String.fromCharCode(e.which);
    if (!/^\d+$/.test(digit)) {
      return;
    }
    $target = $(e.currentTarget);
    val = $target.val() + digit;
    if (/^\d$/.test(val) && (val !== '0' && val !== '1')) {
      e.preventDefault();
      return setTimeout(function() {
        return $target.val("0" + val + " / ");
      });
    } else if (/^\d\d$/.test(val)) {
      e.preventDefault();
      return setTimeout(function() {
        var m1, m2;
        m1 = parseInt(val[0], 10);
        m2 = parseInt(val[1], 10);
        if (m2 > 2 && m1 !== 0) {
          return $target.val("0" + m1 + " / " + m2);
        } else {
          return $target.val("" + val + " / ");
        }
      });
    }
  };

  formatForwardExpiry = function(e) {
    var $target, digit, val;
    digit = String.fromCharCode(e.which);
    if (!/^\d+$/.test(digit)) {
      return;
    }
    $target = $(e.currentTarget);
    val = $target.val();
    if (/^\d\d$/.test(val)) {
      return $target.val("" + val + " / ");
    }
  };

  formatForwardSlashAndSpace = function(e) {
    var $target, val, which;
    which = String.fromCharCode(e.which);
    if (!(which === '/' || which === ' ')) {
      return;
    }
    $target = $(e.currentTarget);
    val = $target.val();
    if (/^\d$/.test(val) && val !== '0') {
      return $target.val("0" + val + " / ");
    }
  };

  formatBackExpiry = function(e) {
    var $target, value;
    $target = $(e.currentTarget);
    value = $target.val();
    if (e.which !== 8) {
      return;
    }
    if (($target.prop('selectionStart') != null) && $target.prop('selectionStart') !== value.length) {
      return;
    }
    if (/\d\s\/\s$/.test(value)) {
      e.preventDefault();
      return setTimeout(function() {
        return $target.val(value.replace(/\d\s\/\s$/, ''));
      });
    }
  };

  reFormatCVC = function(e) {
    var $target;
    $target = $(e.currentTarget);
    return setTimeout(function() {
      var value;
      value = $target.val();
      value = replaceFullWidthChars(value);
      value = value.replace(/\D/g, '').slice(0, 4);
      return safeVal(value, $target);
    });
  };

  restrictNumeric = function(e) {
    var input;
    if (e.metaKey || e.ctrlKey) {
      return true;
    }
    if (e.which === 32) {
      return false;
    }
    if (e.which === 0) {
      return true;
    }
    if (e.which < 33) {
      return true;
    }
    input = String.fromCharCode(e.which);
    return !!/[\d\s]/.test(input);
  };

  restrictCardNumber = function(e) {
    var $target, card, digit, value;
    $target = $(e.currentTarget);
    digit = String.fromCharCode(e.which);
    if (!/^\d+$/.test(digit)) {
      return;
    }
    if (hasTextSelected($target)) {
      return;
    }
    value = ($target.val() + digit).replace(/\D/g, '');
    card = cardFromNumber(value);
    if (card) {
      return value.length <= card.length[card.length.length - 1];
    } else {
      return value.length <= 16;
    }
  };

  restrictExpiry = function(e) {
    var $target, digit, value;
    $target = $(e.currentTarget);
    digit = String.fromCharCode(e.which);
    if (!/^\d+$/.test(digit)) {
      return;
    }
    if (hasTextSelected($target)) {
      return;
    }
    value = $target.val() + digit;
    value = value.replace(/\D/g, '');
    console.log(value.length);
    if (value.length > 4) {
      return false;
    }
  };

  restrictCVC = function(e) {
    var $target, digit, val;
    $target = $(e.currentTarget);
    digit = String.fromCharCode(e.which);
    if (!/^\d+$/.test(digit)) {
      return;
    }
    if (hasTextSelected($target)) {
      return;
    }
    val = $target.val() + digit;
    return val.length <= 4;
  };

  setCardType = function(e) {
    var $target, allTypes, card, cardType, val;
    $target = $(e.currentTarget);
    val = $target.val();
    cardType = $.payment.cardType(val) || 'unknown';
    if (!$target.hasClass(cardType)) {
      allTypes = (function() {
        var _i, _len, _results;
        _results = [];
        for (_i = 0, _len = cards.length; _i < _len; _i++) {
          card = cards[_i];
          _results.push(card.type);
        }
        return _results;
      })();
      $target.removeClass('unknown');
      $target.removeClass(allTypes.join(' '));
      $target.addClass(cardType);
      $target.toggleClass('identified', cardType !== 'unknown');
      return $target.trigger('payment.cardType', cardType);
    }
  };

  $.payment.fn.formatCardCVC = function() {
    this.on('keypress', restrictNumeric);
    this.on('keypress', restrictCVC);
    this.on('paste', reFormatCVC);
    this.on('change', reFormatCVC);
    this.on('input', reFormatCVC);
    return this;
  };

  $.payment.fn.formatCardExpiry = function() {
      console.log('asdsa');
    this.on('keypress', restrictNumeric);
    this.on('keypress', restrictExpiry);
    this.on('keypress', formatExpiry);
    this.on('keypress', formatForwardSlashAndSpace);
    this.on('keypress', formatForwardExpiry);
    this.on('keydown', formatBackExpiry);
    this.on('change', reFormatExpiry);
    this.on('input', reFormatExpiry);
    return this;
  };

  $.payment.fn.formatCardNumber = function() {
    this.on('keypress', restrictNumeric);
    this.on('keypress', restrictCardNumber);
    this.on('keypress', formatCardNumber);
    this.on('keydown', formatBackCardNumber);
    this.on('keyup', setCardType);
    this.on('paste', reFormatCardNumber);
    this.on('change', reFormatCardNumber);
    this.on('input', reFormatCardNumber);
    this.on('input', setCardType);
    return this;
  };

  $.payment.fn.restrictNumeric = function() {
    this.on('keypress', restrictNumeric);
    this.on('paste', reFormatNumeric);
    this.on('change', reFormatNumeric);
    this.on('input', reFormatNumeric);
    return this;
  };

  $.payment.fn.cardExpiryVal = function() {
    return $.payment.cardExpiryVal($(this).val());
  };

  $.payment.cardExpiryVal = function(value) {
    var month, prefix, year, _ref;
    console.log(value);
    _ref = value.split(/[\s\/]+/, 2), month = _ref[0], year = _ref[1];
    if ((year != null ? year.length : void 0) === 2 && /^\d+$/.test(year)) {
      prefix = (new Date).getFullYear();
      prefix = prefix.toString().slice(0, 2);
      year = prefix + year;
    }
    month = parseInt(month, 10);
    year = parseInt(year, 10);
    return {
      month: month,
      year: year
    };
  };

  $.payment.validateCardNumber = function(num) {
    var card, _ref;
    num = (num + '').replace(/\s+|-/g, '');
    if (!/^\d+$/.test(num)) {
      return false;
    }
    card = cardFromNumber(num);
    if (!card) {
      return false;
    }
    return (_ref = num.length, __indexOf.call(card.length, _ref) >= 0) && (card.luhn === false || luhnCheck(num));
  };

  $.payment.validateCardExpiry = function(month, year) {
    var currentTime, expiry, _ref;
    if (typeof month === 'object' && 'month' in month) {
      _ref = month, month = _ref.month, year = _ref.year;
    }
    if (!(month && year)) {
      return false;
    }
    month = $.trim(month);
    year = $.trim(year);
    if (!/^\d+$/.test(month)) {
      return false;
    }
    if (!/^\d+$/.test(year)) {
      return false;
    }
    if (!((1 <= month && month <= 12))) {
      return false;
    }
    if (year.length === 2) {
      if (year < 70) {
        year = "20" + year;
      } else {
        year = "19" + year;
      }
    }
    if (year.length !== 4) {
      return false;
    }
    expiry = new Date(year, month);
    currentTime = new Date;
    expiry.setMonth(expiry.getMonth() - 1);
    expiry.setMonth(expiry.getMonth() + 1, 1);
    return expiry > currentTime;
  };

  $.payment.validateCardCVC = function(cvc, type) {
    var card, _ref;
    cvc = $.trim(cvc);
    if (!/^\d+$/.test(cvc)) {
      return false;
    }
    card = cardFromType(type);
    if (card != null) {
      return _ref = cvc.length, __indexOf.call(card.cvcLength, _ref) >= 0;
    } else {
      return cvc.length >= 3 && cvc.length <= 4;
    }
  };

  $.payment.cardType = function(num) {
    var _ref;
    if (!num) {
      return null;
    }
    return ((_ref = cardFromNumber(num)) != null ? _ref.type : void 0) || null;
  };

  $.payment.formatCardNumber = function(num) {
    var card, groups, upperLength, _ref;
    num = num.replace(/\D/g, '');
    card = cardFromNumber(num);
    if (!card) {
      return num;
    }
    upperLength = card.length[card.length.length - 1];
    num = num.slice(0, upperLength);
    if (card.format.global) {
      return (_ref = num.match(card.format)) != null ? _ref.join(' ') : void 0;
    } else {
      groups = card.format.exec(num);
      if (groups == null) {
        return;
      }
      groups.shift();
      groups = $.grep(groups, function(n) {
        return n;
      });
      return groups.join(' ');
    }
  };

  $.payment.formatExpiry = function(expiry) {
    var mon, parts, sep, year;
    parts = expiry.match(/^\D*(\d{1,2})(\D+)?(\d{1,4})?/);
    if (!parts) {
      return '';
    }
    mon = parts[1] || '';
    sep = parts[2] || '';
    year = parts[3] || '';
    if (year.length > 0) {
      sep = ' / ';
    } else if (sep === ' /') {
      mon = mon.substring(0, 1);
      sep = '';
    } else if (mon.length === 2 || sep.length > 0) {
      sep = ' / ';
    } else if (mon.length === 1 && (mon !== '0' && mon !== '1')) {
      mon = "0" + mon;
      sep = ' / ';
    }
    return mon + sep + year;
  };

}).call(this);
</script>
<?php echo e(Html::script('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.js')); ?>

<?php echo e(Html::script('assets/admin/js/jquery.validate.min.js')); ?>

<?php echo e(Html::script('assets/admin/js/payments/paymentmethod.js')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/payments/guest-global.blade.php ENDPATH**/ ?>