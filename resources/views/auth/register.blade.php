<!DOCTYPE html>
<html>
@include('layouts.head')
<body>
<div class="wrapper">
    <div class="wrapper">
        <!-- Header part  -->
        @include('layouts.header')

        {{--Register form--}}
        <div class="registration-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center" style="color: honeydew">Create Your Account</h2>
                        <form method="POST"  id="#Register">
                            @csrf
                            {{--Daca nu apar probleme, afisam un mesaj--}}
                            <div id="success-msg" class="hidden">
                                <div class="alert alert-info alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Success!</strong> Check your mail for login confirmation!!
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 form-control-label Whitish" >First Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="First Name"  minlength="2" required oninput="myFunction('#name-error')">


                                    <span class="text-danger">
                                        <strong id="name-error"></strong>
                                    </span>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-sm-2 form-control-label Whitish">Last Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" minlength="2" required oninput="myFunction('#lname-error')">

                                    <span class="text-danger">
                                        <strong id="lname-error"></strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 form-control-label Whitish">Email:</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="example@example.com" oninput="myFunction('#email-error')">

                                    <span class="text-danger">
                                        <strong id="email-error"></strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 form-control-label Whitish">Username:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" oninput="myFunction('#username-error')">

                                    <span class="text-danger">
                                        <strong id="username-error"></strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 form-control-label Whitish">Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required oninput="myFunction('#password-error')">

                                    <span class="text-danger">
                                        <strong id="password-error"></strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-2 form-control-label Whitish">Confirm Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Same password previously entered" required oninput="myFunction('#confirm_password-error')">

                                    <span class="text-danger">
                                        <strong id="confirm_password-error"></strong>
                                    </span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="birthdate" class="col-sm-2 form-control-label Whitish">Birthdate:</label>
                                <div class="col-sm-8">
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" placeholder="Enter you birthday" name="birthdate" id="birthdate" oninput="myFunction('#birthdate-error')"/>


                                        <span class="text-danger">
                                        <strong id="birthdate-error"></strong>
                                    </span>



                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address-line" class="col-sm-2 form-control-label Whitish">Address Line:</label>
                                <div class="col-sm-8" id="address-line">
                                    <input type='text' class="form-control" placeholder="Street address, Apartment/Building, Unit, Floor etc." name="address" id="address" oninput="myFunction('#address_line-error')"/>

                                    <span class="text-danger">
                                        <strong id="address_line-error"></strong>
                                    </span>

                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-sm-2 form-control-label Whitish">City:</label>
                                <div class="col-sm-8">
                                    <input type='text' class="form-control" placeholder="City" name="city" id="city" oninput="myFunction('#city-error')"/>

                                    <span class="text-danger">
                                        <strong id="city-error"></strong>
                                    </span>


                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cp" class="col-sm-2 form-control-label Whitish">Postal code:</label>
                                <div class="col-sm-8" id="cp">
                                    <input type='number' class="form-control" placeholder="ex:9065500" name="postal_code" id="postal_code" oninput="myFunction('#cp-error')">

                                    <span class="text-danger">
                                        <strong id="cp-error"></strong>
                                    </span>

                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-sm-2 form-control-label Whitish">Country:</label>
                                <div class="col-sm-8"  >
                                    <select id="country" name="country" class="input-group-lg" >
                                        <option value="" selected="selected">(please select a country)</option>
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

                            <div class="form-group row">
                                <div class="col-sm-offset-5 col-sm-8">
                                    <input type="submit" class="btn btn-success btn-lg " id="ajaxSubmit" value="Sign Up Now" />
                                </div>
                            </div>

                        </form>
                    </div>
                </div> <!--End Row-->

            </div>
        </div> <!--End Registration page div-->

        @include('layouts.footer')
    </div> <!-- End wrapper -->
</div>
<!-- Scripts -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/webslidemenu.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('js/moment-with-locales.min.js')}}"></script>
<script src="{{asset('js/bootstrat-datepicker.js')}}"></script>
<script  src="{{asset('js/datepicker_function.js')}}"></script>

<script>
    jQuery(document).ready(function(){
        jQuery('#ajaxSubmit').click(function(e){
            // jQuery('.alert').show();
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/register/post') }}",
                method: 'post',
                dataType: "json",
                data: {
                    name: jQuery('#name').val(),
                    lname: jQuery('#lname').val(),
                    email: jQuery('#email').val(),
                    username: jQuery('#username').val(),
                    password: jQuery('#password').val(),
                    password_confirmation: jQuery('#password_confirmation').val(),
                    birthdate: jQuery('#birthdate').val(),
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
                        if (data.errors.email) {
                            $('#email-error').html(data.errors.email[0]);
                        }
                        if (data.errors.password) {
                            $('#password-error').html(data.errors.password[0]);
                            $('#password_confirmation').html(data.errors.password[0]);
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
    });
</script>
    <script>
        function myFunction(string) {
            $(string).empty();
    }
</script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript">
    $("#search").autocomplete({
        source: function(request, response){
            $.get("http://127.0.0.1:8000/autocomplete", {
                term:request.term
            }, function(data){
                response($.map(data, function(item) {
                    return {
                        value: item.id,
                        label: item.title
                    }
                }))
            }, "json");
        },
        select: function( event, ui ) {
            console.log( ui.item ?
                "Selected: " + ui.item.label :
                "Nothing selected, input was " + this.value);
            window.location.href = "/Product/" + ui.item.value;
        },
        minLength: 2,
        dataType: "json",
        cache: false
    });
</script>
</body>
</html>
