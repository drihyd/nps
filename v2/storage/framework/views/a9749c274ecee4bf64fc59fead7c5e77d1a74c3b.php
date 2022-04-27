
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- End col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Onboard a new Organization</h5>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-xl-6">
                        <form  action="<?php echo e(url('organizations/update_gst/')); ?>" method="post">
                        	<?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($comapany_id); ?>">

                            <input type="hidden" name="address_1" class="form-control" id="address_1" value="<?php echo e($organizations_data->address_1??''); ?>">
                            <input type="hidden" name="address_2" class="form-control" id="address_2" value="<?php echo e($organizations_data->address_2??''); ?>">
                            <input type="hidden" name="pincode" class="form-control" id="pincode" value="<?php echo e($organizations_data->pincode??''); ?>">
                            <input type="hidden" name="city" class="form-control" id="city" value="<?php echo e($organizations_data->city??''); ?>">
                            <select type="hidden" class="form-control" name="country" id="country" hidden="">

                                                           <option value="">-- Select --</option>
                                                           <option value="india" <?php if($organizations_data->country??'' == 'india'): ?> selected <?php else: ?> <?php endif; ?>>India</option>
                                                       </select>

                            <div>
                                <h3>GST Details</h3>
                                                <section>
                                                    <div class="form-group">
                                                        <label for="username">GSTIN Number<span class="text-danger">*</span>&ensp;<small>(max 15 charecters)</small></label>
                                                        <input type="text" name="gst_no" class="form-control" id="gstin" required="required" data-parsley-maxlength="15" maxlength="15" value="<?php echo e(old('gst_no',$organizations_data->gst_no??'')); ?>">
                                                    </div>
                                                    <h4 class="font-22 mb-3">Billing Address</h4>
                                                    <div class="form-group">
                                                        <input type="checkbox" id="check-address" name="get_permanent_address" class="checkbox primary" data-pk="<?php echo e($organizations_data->id); ?>"/>
                                                        <label for="groupcompany" class="primary-rgba">Same as company address<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address1">Address line 1<span class="text-danger">*</span></label>
                                                        <input type="text" name="billing_address_1" class="form-control" id="billing_address_1" required="required" value="<?php echo e(old('billing_address_1',$organizations_data->billing_address_1??'')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address2">Address line 2</label>
                                                        <input type="text" name="billing_address_2" class="form-control" id="billing_address_2" value="<?php echo e(old('billing_address_2',$organizations_data->billing_address_2??'')); ?>">
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pincode">Pincode<span class="text-danger">*</span></label>
                                                        <input type="number" name="billing_pincode" class="form-control" id="billing_pincode" required="required" data-parsley-type="number" data-parsley-maxlength="6" value="<?php echo e(old('billing_pincode',$organizations_data->billing_pincode??'')); ?>">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City<span class="text-danger">*</span></label>
                                                        <input type="text" name="billing_city" class="form-control" id="billing_city" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i" value="<?php echo e(old('city',$organizations_data->billing_city??'')); ?>">
                                                    </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="country">Country<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="billing_country" id="formControlSelect2" required="required" id="billing_country">
                                                            <option value="">-- Select --</option>
                                                           <option value="india" <?php if($organizations_data->billing_country??'' == 'india'): ?> selected <?php else: ?> <?php endif; ?>>India</option>
                                                           <!-- <option value="Albania">Albania</option>
                                                           <option value="Algeria">Algeria</option>
                                                           <option value="American Samoa">American Samoa</option>
                                                           <option value="Andorra">Andorra</option>
                                                           <option value="Angola">Angola</option>
                                                           <option value="Anguilla">Anguilla</option>
                                                           <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                           <option value="Argentina">Argentina</option>
                                                           <option value="Armenia">Armenia</option>
                                                           <option value="Aruba">Aruba</option>
                                                           <option value="Australia">Australia</option>
                                                           <option value="Austria">Austria</option>
                                                           <option value="Azerbaijan">Azerbaijan</option>
                                                           <option value="Bahamas">Bahamas</option>
                                                           <option value="Bahrain">Bahrain</option>
                                                           <option value="Bangladesh">Bangladesh</option>
                                                           <option value="Barbados">Barbados</option>
                                                           <option value="Belarus">Belarus</option>
                                                           <option value="Belgium">Belgium</option>
                                                           <option value="Belize">Belize</option>
                                                           <option value="Benin">Benin</option>
                                                           <option value="Bermuda">Bermuda</option>
                                                           <option value="Bhutan">Bhutan</option>
                                                           <option value="Bolivia">Bolivia</option>
                                                           <option value="Bonaire">Bonaire</option>
                                                           <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                           <option value="Botswana">Botswana</option>
                                                           <option value="Brazil">Brazil</option>
                                                           <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                           <option value="Brunei">Brunei</option>
                                                           <option value="Bulgaria">Bulgaria</option>
                                                           <option value="Burkina Faso">Burkina Faso</option>
                                                           <option value="Burundi">Burundi</option>
                                                           <option value="Cambodia">Cambodia</option>
                                                           <option value="Cameroon">Cameroon</option>
                                                           <option value="Canada">Canada</option>
                                                           <option value="Canary Islands">Canary Islands</option>
                                                           <option value="Cape Verde">Cape Verde</option>
                                                           <option value="Cayman Islands">Cayman Islands</option>
                                                           <option value="Central African Republic">Central African Republic</option>
                                                           <option value="Chad">Chad</option>
                                                           <option value="Channel Islands">Channel Islands</option>
                                                           <option value="Chile">Chile</option>
                                                           <option value="China">China</option>
                                                           <option value="Christmas Island">Christmas Island</option>
                                                           <option value="Cocos Island">Cocos Island</option>
                                                           <option value="Colombia">Colombia</option>
                                                           <option value="Comoros">Comoros</option>
                                                           <option value="Congo">Congo</option>
                                                           <option value="Cook Islands">Cook Islands</option>
                                                           <option value="Costa Rica">Costa Rica</option>
                                                           <option value="Cote DIvoire">Cote DIvoire</option>
                                                           <option value="Croatia">Croatia</option>
                                                           <option value="Cuba">Cuba</option>
                                                           <option value="Curaco">Curacao</option>
                                                           <option value="Cyprus">Cyprus</option>
                                                           <option value="Czech Republic">Czech Republic</option>
                                                           <option value="Denmark">Denmark</option>
                                                           <option value="Djibouti">Djibouti</option>
                                                           <option value="Dominica">Dominica</option>
                                                           <option value="Dominican Republic">Dominican Republic</option>
                                                           <option value="East Timor">East Timor</option>
                                                           <option value="Ecuador">Ecuador</option>
                                                           <option value="Egypt">Egypt</option>
                                                           <option value="El Salvador">El Salvador</option>
                                                           <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                           <option value="Eritrea">Eritrea</option>
                                                           <option value="Estonia">Estonia</option>
                                                           <option value="Ethiopia">Ethiopia</option>
                                                           <option value="Falkland Islands">Falkland Islands</option>
                                                           <option value="Faroe Islands">Faroe Islands</option>
                                                           <option value="Fiji">Fiji</option>
                                                           <option value="Finland">Finland</option>
                                                           <option value="France">France</option>
                                                           <option value="French Guiana">French Guiana</option>
                                                           <option value="French Polynesia">French Polynesia</option>
                                                           <option value="French Southern Ter">French Southern Ter</option>
                                                           <option value="Gabon">Gabon</option>
                                                           <option value="Gambia">Gambia</option>
                                                           <option value="Georgia">Georgia</option>
                                                           <option value="Germany">Germany</option>
                                                           <option value="Ghana">Ghana</option>
                                                           <option value="Gibraltar">Gibraltar</option>
                                                           <option value="Great Britain">Great Britain</option>
                                                           <option value="Greece">Greece</option>
                                                           <option value="Greenland">Greenland</option>
                                                           <option value="Grenada">Grenada</option>
                                                           <option value="Guadeloupe">Guadeloupe</option>
                                                           <option value="Guam">Guam</option>
                                                           <option value="Guatemala">Guatemala</option>
                                                           <option value="Guinea">Guinea</option>
                                                           <option value="Guyana">Guyana</option>
                                                           <option value="Haiti">Haiti</option>
                                                           <option value="Hawaii">Hawaii</option>
                                                           <option value="Honduras">Honduras</option>
                                                           <option value="Hong Kong">Hong Kong</option>
                                                           <option value="Hungary">Hungary</option>
                                                           <option value="Iceland">Iceland</option>
                                                           <option value="Indonesia">Indonesia</option>
                                                           <option value="India">India</option>
                                                           <option value="Iran">Iran</option>
                                                           <option value="Iraq">Iraq</option>
                                                           <option value="Ireland">Ireland</option>
                                                           <option value="Isle of Man">Isle of Man</option>
                                                           <option value="Israel">Israel</option>
                                                           <option value="Italy">Italy</option>
                                                           <option value="Jamaica">Jamaica</option>
                                                           <option value="Japan">Japan</option>
                                                           <option value="Jordan">Jordan</option>
                                                           <option value="Kazakhstan">Kazakhstan</option>
                                                           <option value="Kenya">Kenya</option>
                                                           <option value="Kiribati">Kiribati</option>
                                                           <option value="Korea North">Korea North</option>
                                                           <option value="Korea Sout">Korea South</option>
                                                           <option value="Kuwait">Kuwait</option>
                                                           <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                           <option value="Laos">Laos</option>
                                                           <option value="Latvia">Latvia</option>
                                                           <option value="Lebanon">Lebanon</option>
                                                           <option value="Lesotho">Lesotho</option>
                                                           <option value="Liberia">Liberia</option>
                                                           <option value="Libya">Libya</option>
                                                           <option value="Liechtenstein">Liechtenstein</option>
                                                           <option value="Lithuania">Lithuania</option>
                                                           <option value="Luxembourg">Luxembourg</option>
                                                           <option value="Macau">Macau</option>
                                                           <option value="Macedonia">Macedonia</option>
                                                           <option value="Madagascar">Madagascar</option>
                                                           <option value="Malaysia">Malaysia</option>
                                                           <option value="Malawi">Malawi</option>
                                                           <option value="Maldives">Maldives</option>
                                                           <option value="Mali">Mali</option>
                                                           <option value="Malta">Malta</option>
                                                           <option value="Marshall Islands">Marshall Islands</option>
                                                           <option value="Martinique">Martinique</option>
                                                           <option value="Mauritania">Mauritania</option>
                                                           <option value="Mauritius">Mauritius</option>
                                                           <option value="Mayotte">Mayotte</option>
                                                           <option value="Mexico">Mexico</option>
                                                           <option value="Midway Islands">Midway Islands</option>
                                                           <option value="Moldova">Moldova</option>
                                                           <option value="Monaco">Monaco</option>
                                                           <option value="Mongolia">Mongolia</option>
                                                           <option value="Montserrat">Montserrat</option>
                                                           <option value="Morocco">Morocco</option>
                                                           <option value="Mozambique">Mozambique</option>
                                                           <option value="Myanmar">Myanmar</option>
                                                           <option value="Nambia">Nambia</option>
                                                           <option value="Nauru">Nauru</option>
                                                           <option value="Nepal">Nepal</option>
                                                           <option value="Netherland Antilles">Netherland Antilles</option>
                                                           <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                           <option value="Nevis">Nevis</option>
                                                           <option value="New Caledonia">New Caledonia</option>
                                                           <option value="New Zealand">New Zealand</option>
                                                           <option value="Nicaragua">Nicaragua</option>
                                                           <option value="Niger">Niger</option>
                                                           <option value="Nigeria">Nigeria</option>
                                                           <option value="Niue">Niue</option>
                                                           <option value="Norfolk Island">Norfolk Island</option>
                                                           <option value="Norway">Norway</option>
                                                           <option value="Oman">Oman</option>
                                                           <option value="Pakistan">Pakistan</option>
                                                           <option value="Palau Island">Palau Island</option>
                                                           <option value="Palestine">Palestine</option>
                                                           <option value="Panama">Panama</option>
                                                           <option value="Papua New Guinea">Papua New Guinea</option>
                                                           <option value="Paraguay">Paraguay</option>
                                                           <option value="Peru">Peru</option>
                                                           <option value="Phillipines">Philippines</option>
                                                           <option value="Pitcairn Island">Pitcairn Island</option>
                                                           <option value="Poland">Poland</option>
                                                           <option value="Portugal">Portugal</option>
                                                           <option value="Puerto Rico">Puerto Rico</option>
                                                           <option value="Qatar">Qatar</option>
                                                           <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                           <option value="Republic of Serbia">Republic of Serbia</option>
                                                           <option value="Reunion">Reunion</option>
                                                           <option value="Romania">Romania</option>
                                                           <option value="Russia">Russia</option>
                                                           <option value="Rwanda">Rwanda</option>
                                                           <option value="St Barthelemy">St Barthelemy</option>
                                                           <option value="St Eustatius">St Eustatius</option>
                                                           <option value="St Helena">St Helena</option>
                                                           <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                           <option value="St Lucia">St Lucia</option>
                                                           <option value="St Maarten">St Maarten</option>
                                                           <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                           <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                           <option value="Saipan">Saipan</option>
                                                           <option value="Samoa">Samoa</option>
                                                           <option value="Samoa American">Samoa American</option>
                                                           <option value="San Marino">San Marino</option>
                                                           <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                           <option value="Saudi Arabia">Saudi Arabia</option>
                                                           <option value="Senegal">Senegal</option>
                                                           <option value="Seychelles">Seychelles</option>
                                                           <option value="Sierra Leone">Sierra Leone</option>
                                                           <option value="Singapore">Singapore</option>
                                                           <option value="Slovakia">Slovakia</option>
                                                           <option value="Slovenia">Slovenia</option>
                                                           <option value="Solomon Islands">Solomon Islands</option>
                                                           <option value="Somalia">Somalia</option>
                                                           <option value="South Africa">South Africa</option>
                                                           <option value="Spain">Spain</option>
                                                           <option value="Sri Lanka">Sri Lanka</option>
                                                           <option value="Sudan">Sudan</option>
                                                           <option value="Suriname">Suriname</option>
                                                           <option value="Swaziland">Swaziland</option>
                                                           <option value="Sweden">Sweden</option>
                                                           <option value="Switzerland">Switzerland</option>
                                                           <option value="Syria">Syria</option>
                                                           <option value="Tahiti">Tahiti</option>
                                                           <option value="Taiwan">Taiwan</option>
                                                           <option value="Tajikistan">Tajikistan</option>
                                                           <option value="Tanzania">Tanzania</option>
                                                           <option value="Thailand">Thailand</option>
                                                           <option value="Togo">Togo</option>
                                                           <option value="Tokelau">Tokelau</option>
                                                           <option value="Tonga">Tonga</option>
                                                           <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                           <option value="Tunisia">Tunisia</option>
                                                           <option value="Turkey">Turkey</option>
                                                           <option value="Turkmenistan">Turkmenistan</option>
                                                           <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                           <option value="Tuvalu">Tuvalu</option>
                                                           <option value="Uganda">Uganda</option>
                                                           <option value="United Kingdom">United Kingdom</option>
                                                           <option value="Ukraine">Ukraine</option>
                                                           <option value="United Arab Erimates">United Arab Emirates</option>
                                                           <option value="United States of America">United States of America</option>
                                                           <option value="Uraguay">Uruguay</option>
                                                           <option value="Uzbekistan">Uzbekistan</option>
                                                           <option value="Vanuatu">Vanuatu</option>
                                                           <option value="Vatican City State">Vatican City State</option>
                                                           <option value="Venezuela">Venezuela</option>
                                                           <option value="Vietnam">Vietnam</option>
                                                           <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                           <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                           <option value="Wake Island">Wake Island</option>
                                                           <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                           <option value="Yemen">Yemen</option>
                                                           <option value="Zaire">Zaire</option>
                                                           <option value="Zambia">Zambia</option>
                                                           <option value="Zimbabwe">Zimbabwe</option> -->
                                                        </select>
                                                    </div>
                                                    <a href="<?php echo e(url('organizations/add-address/'.Crypt::encryptString($comapany_id))); ?>" class="btn btn-danger btn-sm">Back</a>
                                    <button type="submit" class="btn btn-primary btn-sm">Save & Continue</button>
                                </section>
                            </div>
                        </form>  
                    </div>  
                </div>                             
            </div>
        </div>
    </div>  
    <!-- End col -->
   
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <!-- <script>
$('#get_permanent_address').change(function() {
        if(this.checked) {
            getpermanentaddress();

        }else{
      /*    $('#address_1').val('<?php echo e($single_data->address_1??''); ?>');
          $('#address_2').val('<?php echo e($single_data->address_2??''); ?>');
          $('#city').val('<?php echo e($single_data->city??''); ?>');
          $('#pincode').val('<?php echo e($single_data->pincode??''); ?>');
          $('#district').val('<?php echo e($single_data->district??''); ?>');
          $('#state').val('<?php echo e($single_data->state_id??''); ?>');
          $('#country').val('<?php echo e($single_data->country_id??''); ?>');*/

          $('#billing_address_1').val('');
          $('#billing_address_2').val('');
          $('#billing_pincode').val('');
          $('#billing_city').val('');
          $('#billing_country').val('');
        }
    });

function getpermanentaddress(){


var organization_id = $comapany_id;

 alert(organization_id);
  
  $.ajax("<?php echo e(url('organizations/get_permanent_address')); ?>", {
      type: 'POST',  // http method
      
        // data to submit
       data: {'id':'<?php echo e($comapany_id); ?>', type:'object_type',"_token": "<?php echo e(csrf_token()); ?>"},
      
      success: function (data, status, xhr) {
          var user_address = $.parseJSON(data); 
          $('#address_1').val(user_address.address_1);

          $('#address_2').val(user_address.address_2);
          $('#city').val(user_address.city);
          $('#pincode').val(user_address.pincode);
          $('#district').val(user_address.district);
          $('#state').val(user_address.state_id);
          $('#country').val(user_address.country_id);
      },
      error: function (jqXhr, textStatus, errorMessage) {
              $('p').append('Error' + errorMessage);
      }
  });
}
    </script> -->
    <script type="text/javascript">
   $(document).ready(function(){ 
     $('#check-address').click(function(){ 
     
     
     
     if ($('#check-address').is(":checked")) {
         
         
    
      $('#billing_address_1').val($('#address_1').val());
      $('#billing_address_2').val($('#address_2').val());
      $('#billing_pincode').val($('#pincode').val());
      $('#billing_city').val($('#city').val());
      
      var country = $('#country option:selected').val();
      $('#billing_country option[value=' + country + ']').attr('selected','selected');
     } else { //Clear on uncheck
     
    
      $('#billing_address_1').val("");
      $('#billing_address_2').val("");
      $('#billing_pincode').val("");
      $('#billing_city').val("");
      $('#billing_country option[value=""]').attr('selected','selected');
     };
    });
 
   });
</script>

    <?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepred/public_html/demos/nps/v1/resources/views/admin/organizations/add_gst_details.blade.php ENDPATH**/ ?>