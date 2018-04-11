<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 22.02.2018
 * Time: 14:07
 */
?>


<!DOCTYPE html>
<html>
@include('layouts.head')
<body>
<div class="wrapper">
    <div class="wrapper">
        <!-- Header part  -->
        @include('layouts.header')
        <!--Login form-->

        <div class="content-area" style="background: white">

            <div class="account-page">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-3">
                            <h2>My Account</h2>
                            <ul>
                                <li  class="active"><a href="{{route('Account')}}">Account Control Panel</a></li>
                                <li><a href="account_orders.php">My Orders(!)</a></li>
                                <li><a href="account_cart.blade.php">My Cart Products</a></li>
                                <li><a href="account_reviews.php">My Reviews and Ratings</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <h2>Account Control Panel</h2>
                            <strong>Hello, {{\Auth::user()->name}}</strong><br />
                            <p>From your account control panel, you can access all of your recent activites, orders, save products and you can edit your personal information and other details.</p>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="well">
                                        <h3>Contact Information</h3>
                                        <p>First Name : {{\Auth::user()->name}}</p>
                                        <p>Last Name : {{\Auth::user()->lname}}</p>
                                        <p>Email : {{\Auth::user()->email}}</p>
                                        <p>Username : {{\Auth::user()->username}}</p>
                                        <p>Birthdate : {{\Auth::user()->birthdate}}</p>
                                        <p>Address : {{\Auth::user()->address}}</p>
                                        <p>City : {{\Auth::user()->city}}</p>
                                        <p>postal_code : {{\Auth::user()->postal_code}}</p>
                                        <p>Phone No : {{\Auth::user()->phone_number}}</p>
                                        <p>Country : {{\Auth::user()->country}}</p>
                                        <p>{{--<a href="account_change_email.html">Change Email</a> |--}} <a class="pull-right" href="/password/reset">Change Password</a></p>
                                        <br>
                                        <p class="pull-right"><a href="#" data-toggle="modal" data-target="#editAccount"><i class="fa fa-edit"></i>Edit Account Information</a></p>
                                        <div class="clearfix"></div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit your account</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Modify desired fields:
                                                    </div>
                                                    <form method="POST"  id="">
                                                        @csrf
                                                        {{--Daca nu apar probleme, afisam un mesaj--}}
                                                        <div id="success-msg" class="hidden">
                                                            <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <strong>Success!</strong> Your new contact information has been stored.
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="name" class="col-sm-2 form-control-label " >First Name:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="name" class="form-control" id="name" placeholder="{{\Auth::user()->name}}"  minlength="2" required oninput="myFunction('#name-error')">
                                                                <span class="text-danger">
                                                                    <strong id="name-error"></strong>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="lastname" class="col-sm-2 form-control-label ">Last Name:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="lname" class="form-control" id="lname" placeholder="{{\Auth::user()->lname}}" minlength="2" required oninput="myFunction('#lname-error')">

                                                                <span class="text-danger">
                                                                    <strong id="lname-error"></strong>
                                                                </span>

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="username" class="col-sm-2 form-control-label ">Username:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="username" class="form-control" id="username" placeholder="{{\Auth::user()->username}}" oninput="myFunction('#username-error')">

                                                                <span class="text-danger">
                                                                    <strong id="username-error"></strong>
                                                                </span>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="birthdate" class="col-sm-2 form-control-label ">Birthdate:</label>
                                                            <div class="col-sm-8">
                                                                <div class='input-group date'>
                                                                    <input type='text' class="form-control" placeholder="{{\Auth::user()->birthdate}}" name="birthdate" id="birthdate" oninput="myFunction('#birthdate-error')"/>


                                                                    <span class="text-danger">
                                                                        <strong id="birthdate-error"></strong>
                                                                    </span>

                                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="address-line" class="col-sm-2 form-control-label ">Address:</label>
                                                            <div class="col-sm-8" id="address-line">
                                                                <input type='text' class="form-control" placeholder="{{\Auth::user()->address}}" name="address" id="address" oninput="myFunction('#address_line-error')"/>

                                                                <span class="text-danger">
                                                                    <strong id="address_line-error"></strong>
                                                                </span>

                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="city" class="col-sm-2 form-control-label ">City:</label>
                                                            <div class="col-sm-8">
                                                                <input type='text' class="form-control" placeholder="{{\Auth::user()->city}}" name="city" id="city" oninput="myFunction('#city-error')"/>

                                                                <span class="text-danger">
                                                                    <strong id="city-error"></strong>
                                                                </span>
                                                                </span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="phone_number" class="col-sm-2 form-control-label ">Phone Number:</label>
                                                            <div class="col-sm-8">
                                                                <input type='text' class="form-control" placeholder="{{\Auth::user()->phone_number}}" name="phone_number" id="phone_number" oninput="myFunction('#phone_number-error')"/>

                                                                <span class="text-danger">
                                                                    <strong id="phone_number-error"></strong>
                                                                </span>

                                                                </span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="cp" class="col-sm-2 form-control-label ">Postal code:</label>
                                                            <div class="col-sm-8" id="cp">
                                                                <input type='number' class="form-control" placeholder="{{\Auth::user()->postal_code}}" name="postal_code" id="postal_code" oninput="myFunction('#cp-error')">

                                                                <span class="text-danger">
                                                                    <strong id="cp-error"></strong>
                                                                </span>

                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="country" class="col-sm-2 form-control-label ">Country:</label>
                                                            <div class="col-sm-8"  >
                                                                <select id="country" name="country" class="input-group-lg" >
                                                                    <option value="" selected="selected">{{\Auth::user()->country}}</option>
                                                                    <option value="AF">Afghanistan</option>
                                                                    <option value="AL">Albania</option>
                                                                    <option value="DZ">Algeria</option>
                                                                    <option value="AS">American Samoa</option>
                                                                    <option value="AD">Andorra</option>
                                                                    <option value="AO">Angola</option>
                                                                    <option value="AI">Anguilla</option>
                                                                    <option value="AQ">Antarctica</option>
                                                                    <option value="AG">Antigua and Barbuda</option>
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
                                                                    <option value="BA">Bosnia and Herzegowina</option>
                                                                    <option value="BW">Botswana</option>
                                                                    <option value="BV">Bouvet Island</option>
                                                                    <option value="BR">Brazil</option>
                                                                    <option value="IO">British Indian Ocean Territory</option>
                                                                    <option value="BN">Brunei Darussalam</option>
                                                                    <option value="BG">Bulgaria</option>
                                                                    <option value="BF">Burkina Faso</option>
                                                                    <option value="BI">Burundi</option>
                                                                    <option value="KH">Cambodia</option>
                                                                    <option value="CM">Cameroon</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="CV">Cape Verde</option>
                                                                    <option value="KY">Cayman Islands</option>
                                                                    <option value="CF">Central African Republic</option>
                                                                    <option value="TD">Chad</option>
                                                                    <option value="CL">Chile</option>
                                                                    <option value="CN">China</option>
                                                                    <option value="CX">Christmas Island</option>
                                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                                    <option value="CO">Colombia</option>
                                                                    <option value="KM">Comoros</option>
                                                                    <option value="CG">Congo</option>
                                                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                                                    <option value="CK">Cook Islands</option>
                                                                    <option value="CR">Costa Rica</option>
                                                                    <option value="CI">Cote d'Ivoire</option>
                                                                    <option value="HR">Croatia (Hrvatska)</option>
                                                                    <option value="CU">Cuba</option>
                                                                    <option value="CY">Cyprus</option>
                                                                    <option value="CZ">Czech Republic</option>
                                                                    <option value="DK">Denmark</option>
                                                                    <option value="DJ">Djibouti</option>
                                                                    <option value="DM">Dominica</option>
                                                                    <option value="DO">Dominican Republic</option>
                                                                    <option value="TP">East Timor</option>
                                                                    <option value="EC">Ecuador</option>
                                                                    <option value="EG">Egypt</option>
                                                                    <option value="SV">El Salvador</option>
                                                                    <option value="GQ">Equatorial Guinea</option>
                                                                    <option value="ER">Eritrea</option>
                                                                    <option value="EE">Estonia</option>
                                                                    <option value="ET">Ethiopia</option>
                                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                                    <option value="FO">Faroe Islands</option>
                                                                    <option value="FJ">Fiji</option>
                                                                    <option value="FI">Finland</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="FX">France, Metropolitan</option>
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
                                                                    <option value="GN">Guinea</option>
                                                                    <option value="GW">Guinea-Bissau</option>
                                                                    <option value="GY">Guyana</option>
                                                                    <option value="HT">Haiti</option>
                                                                    <option value="HM">Heard and Mc Donald Islands</option>
                                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                                    <option value="HN">Honduras</option>
                                                                    <option value="HK">Hong Kong</option>
                                                                    <option value="HU">Hungary</option>
                                                                    <option value="IS">Iceland</option>
                                                                    <option value="IN">India</option>
                                                                    <option value="ID">Indonesia</option>
                                                                    <option value="IR">Iran (Islamic Republic of)</option>
                                                                    <option value="IQ">Iraq</option>
                                                                    <option value="IE">Ireland</option>
                                                                    <option value="IL">Israel</option>
                                                                    <option value="IT">Italy</option>
                                                                    <option value="JM">Jamaica</option>
                                                                    <option value="JP">Japan</option>
                                                                    <option value="JO">Jordan</option>
                                                                    <option value="KZ">Kazakhstan</option>
                                                                    <option value="KE">Kenya</option>
                                                                    <option value="KI">Kiribati</option>
                                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                                    <option value="KR">Korea, Republic of</option>
                                                                    <option value="KW">Kuwait</option>
                                                                    <option value="KG">Kyrgyzstan</option>
                                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                                    <option value="LV">Latvia</option>
                                                                    <option value="LB">Lebanon</option>
                                                                    <option value="LS">Lesotho</option>
                                                                    <option value="LR">Liberia</option>
                                                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                                                    <option value="LI">Liechtenstein</option>
                                                                    <option value="LT">Lithuania</option>
                                                                    <option value="LU">Luxembourg</option>
                                                                    <option value="MO">Macau</option>
                                                                    <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                                                    <option value="MG">Madagascar</option>
                                                                    <option value="MW">Malawi</option>
                                                                    <option value="MY">Malaysia</option>
                                                                    <option value="MV">Maldives</option>
                                                                    <option value="ML">Mali</option>
                                                                    <option value="MT">Malta</option>
                                                                    <option value="MH">Marshall Islands</option>
                                                                    <option value="MQ">Martinique</option>
                                                                    <option value="MR">Mauritania</option>
                                                                    <option value="MU">Mauritius</option>
                                                                    <option value="YT">Mayotte</option>
                                                                    <option value="MX">Mexico</option>
                                                                    <option value="FM">Micronesia, Federated States of</option>
                                                                    <option value="MD">Moldova, Republic of</option>
                                                                    <option value="MC">Monaco</option>
                                                                    <option value="MN">Mongolia</option>
                                                                    <option value="MS">Montserrat</option>
                                                                    <option value="MA">Morocco</option>
                                                                    <option value="MZ">Mozambique</option>
                                                                    <option value="MM">Myanmar</option>
                                                                    <option value="NA">Namibia</option>
                                                                    <option value="NR">Nauru</option>
                                                                    <option value="NP">Nepal</option>
                                                                    <option value="NL">Netherlands</option>
                                                                    <option value="AN">Netherlands Antilles</option>
                                                                    <option value="NC">New Caledonia</option>
                                                                    <option value="NZ">New Zealand</option>
                                                                    <option value="NI">Nicaragua</option>
                                                                    <option value="NE">Niger</option>
                                                                    <option value="NG">Nigeria</option>
                                                                    <option value="NU">Niue</option>
                                                                    <option value="NF">Norfolk Island</option>
                                                                    <option value="MP">Northern Mariana Islands</option>
                                                                    <option value="NO">Norway</option>
                                                                    <option value="OM">Oman</option>
                                                                    <option value="PK">Pakistan</option>
                                                                    <option value="PW">Palau</option>
                                                                    <option value="PA">Panama</option>
                                                                    <option value="PG">Papua New Guinea</option>
                                                                    <option value="PY">Paraguay</option>
                                                                    <option value="PE">Peru</option>
                                                                    <option value="PH">Philippines</option>
                                                                    <option value="PN">Pitcairn</option>
                                                                    <option value="PL">Poland</option>
                                                                    <option value="PT">Portugal</option>
                                                                    <option value="PR">Puerto Rico</option>
                                                                    <option value="QA">Qatar</option>
                                                                    <option value="RE">Reunion</option>
                                                                    <option value="RO">Romania</option>
                                                                    <option value="RU">Russian Federation</option>
                                                                    <option value="RW">Rwanda</option>
                                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                                    <option value="LC">Saint LUCIA</option>
                                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                                    <option value="WS">Samoa</option>
                                                                    <option value="SM">San Marino</option>
                                                                    <option value="ST">Sao Tome and Principe</option>
                                                                    <option value="SA">Saudi Arabia</option>
                                                                    <option value="SN">Senegal</option>
                                                                    <option value="SC">Seychelles</option>
                                                                    <option value="SL">Sierra Leone</option>
                                                                    <option value="SG">Singapore</option>
                                                                    <option value="SK">Slovakia (Slovak Republic)</option>
                                                                    <option value="SI">Slovenia</option>
                                                                    <option value="SB">Solomon Islands</option>
                                                                    <option value="SO">Somalia</option>
                                                                    <option value="ZA">South Africa</option>
                                                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                                    <option value="ES">Spain</option>
                                                                    <option value="LK">Sri Lanka</option>
                                                                    <option value="SH">St. Helena</option>
                                                                    <option value="PM">St. Pierre and Miquelon</option>
                                                                    <option value="SD">Sudan</option>
                                                                    <option value="SR">Suriname</option>
                                                                    <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                                                    <option value="SZ">Swaziland</option>
                                                                    <option value="SE">Sweden</option>
                                                                    <option value="CH">Switzerland</option>
                                                                    <option value="SY">Syrian Arab Republic</option>
                                                                    <option value="TW">Taiwan, Province of China</option>
                                                                    <option value="TJ">Tajikistan</option>
                                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                                    <option value="TH">Thailand</option>
                                                                    <option value="TG">Togo</option>
                                                                    <option value="TK">Tokelau</option>
                                                                    <option value="TO">Tonga</option>
                                                                    <option value="TT">Trinidad and Tobago</option>
                                                                    <option value="TN">Tunisia</option>
                                                                    <option value="TR">Turkey</option>
                                                                    <option value="TM">Turkmenistan</option>
                                                                    <option value="TC">Turks and Caicos Islands</option>
                                                                    <option value="TV">Tuvalu</option>
                                                                    <option value="UG">Uganda</option>
                                                                    <option value="UA">Ukraine</option>
                                                                    <option value="AE">United Arab Emirates</option>
                                                                    <option value="GB">United Kingdom</option>
                                                                    <option value="US">United States</option>
                                                                    <option value="UM">United States Minor Outlying Islands</option>
                                                                    <option value="UY">Uruguay</option>
                                                                    <option value="UZ">Uzbekistan</option>
                                                                    <option value="VU">Vanuatu</option>
                                                                    <option value="VE">Venezuela</option>
                                                                    <option value="VN">Viet Nam</option>
                                                                    <option value="VG">Virgin Islands (British)</option>
                                                                    <option value="VI">Virgin Islands (U.S.)</option>
                                                                    <option value="WF">Wallis and Futuna Islands</option>
                                                                    <option value="EH">Western Sahara</option>
                                                                    <option value="YE">Yemen</option>
                                                                    <option value="YU">Yugoslavia</option>
                                                                    <option value="ZM">Zambia</option>
                                                                    <option value="ZW">Zimbabwe</option>
                                                                </select>

                                                                <span class="text-danger">
                                                                    <strong id="country-error"></strong>
                                                                </span>
                                                                </span>
                                                            </div>
                                                        </div>



                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-success btn-lg " id="ajaxSubmit" value="Edit" />
                                                        </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>





                            </div>
                        </div>
                    </div> <!--End Row-->

                </div>
            </div> <!--End Account page div-->

        </div> <!-- End content Area class -->


        <!--End Login form-->
        @include('layouts.footer')
    </div>
    </div> <!-- End wrapper -->
    <!-- Scripts -->

    <!-- Scripts --><script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
    <script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/productSearch.js')}}"></script>
<script type="text/javascript" src="{{asset('js/moment-with-locales.min.js')}}"></script>
<script src="{{asset('js/bootstrat-datepicker.js')}}"></script>
<script  src="{{asset('js/datepicker_function.js')}}"></script>
<script>
        jQuery('#ajaxSubmit').click(function(e){
             jQuery('.alert').show();
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('editContact')}}",
                method: 'post',
                dataType: "json",
                data: {
                    name: jQuery('#name').val(),
                    lname: jQuery('#lname').val(),
                    username: jQuery('#username').val(),
                    birthdate: jQuery('#birthdate').val(),
                    phone_number: jQuery('#phone_number').val(),
                    address: jQuery('#address').val(),
                    city: jQuery('#city').val(),
                    postal_code: jQuery('#postal_code').val(),
                    country: jQuery('#country').val()
                },
                success:function(data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }
                        if (data.errors.lname) {
                            $('#lname-error').html(data.errors.lname[0]);
                        }
                        if (data.errors.phone_number) {
                            $('#phone_number-error').html(data.errors.phone_number[0]);
                        }
                        if (data.errors.birthdate) {
                            $('#birthdate-error').html(data.errors.birthdate[0]);
                        }
                        if (data.errors.address) {
                            $('#address_line-error').html(data.errors.address[0]);
                        }
                        if (data.errors.city) {
                            $('#city-error').html(data.errors.city[0]);
                        }
                        if (data.errors.postal_code) {
                            $('#postal_code').html(data.errors.postal_code[0]);
                        }
                        if (data.errors.username) {
                            $('#username-error').html(data.errors.username[0]);
                        }
                    }
                    if (data.success) {
                        $('#success-msg').removeClass('hidden');
                    }
                }
            });
        });
</script>
<script>
    function myFunction(string) {
        $(string).empty();
    }
</script>

</body>
</html>

