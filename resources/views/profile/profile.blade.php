@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row text-center">
                    <div class="col-md-3 p-5">
                        <!-- it should work now -->
                        <img src="{{ url($user->image) }}" style="width:120px; height:120px;" class="rounded-circle w-70">
                    </div>
                    <div class="col-md-9 align-self-center">
                        <h2>{{ $user['username'] }}</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="text-center col-md-3">
                        <div>
                            <button type="button" class="btn mb-2 btn-primary btn-block" data-toggle="modal" data-target="#profileModal">
                                Edit profile
                            </button>
                        </div>

                        <div>
                            <button type="button" class="btn mb-2 btn-primary btn-block" data-toggle="modal" data-target="#imageModal">
                                Change picture
                            </button>
                        </div>

                        <div>
                            <button type="button" class="btn mb-2 btn-primary btn-block" data-toggle="modal" data-target="#passwordModal">
                                Change password
                            </button>
                        </div>
                    </div>

                    <div class="col-md-9 text-center">
                        <div class="text-center border-top pt-3 pb-2">
                            <h4>{{ __('User Details') }}</h4>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Email address') }}</div>

                                <div>
                                    <label for="email">{{ $user['email'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('First name') }}</div>

                                <div>
                                    <label for="firstname">{{ $user['firstname'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Last name') }}</div>

                                <div>
                                    <label for="lastname">{{ $user['lastname'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center border-top pt-3 pb-2">
                            <h5>{{ __('Address') }}</h5>
                        </div>

                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Country') }}</div>

                                <div>
                                    <label for="country">{{ $user->address['country'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('City') }}</div>

                                <div>
                                    <label for="city">{{ $user->address['city'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Zip') }}</div>

                                @if ($user->address['zip'] == null)
                                <div>
                                    <label for="line_2">{{ __('No zip added') }}</label>
                                </div>
                                @else
                                <div>
                                    <label for="zip">{{ $user->address['zip'] }}</label>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Address line 1') }}</div>
                                <div>
                                    <label for="line_1">{{ $user->address['line_1'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Address line 2') }}</div>

                                @if ($user->address['line_2'] == null)
                                <div>
                                    <label for="line_2">{{ __('No address added') }}</label>
                                </div>
                                @else
                                <div>
                                    <label for="line_2">{{ $user->address['line_2'] }}</label>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ProfileImage Update Modal -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Change profile picture</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data" autocomplete="off">
                                @method('PATCH')

                                @csrf

                                <div class="modal-body">
                                    <div class="row">
                                        <label for="image" class="col-md-4 col-form-label">Profile image</label>

                                        <input type="file" class="form-control-file" id="image" name="image">

                                        @if ($errors->has('image'))
                                        <strong>{{ $errors->first('image') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update_image_profile" class="btn btn-primary">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Password Update Modal -->
                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="passwordModalLabel">Change password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" autocomplete="off">
                                @method('PATCH')

                                @csrf

                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Current Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password" name="new_password" required>

                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password-comfig" type="password" class="form-control" placeholder="Confirm Password" name="new_password_confirmation" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update_password" class="btn btn-primary">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- User Update Modal -->
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="passwordModalLabel">Edit user details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" autocomplete="off">
                                @method('PATCH')

                                @csrf

                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="username">{{ __('Username') }}</label>

                                            <div>
                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" id="validationServer02" placeholder="Username" name="username" value="{{ old('username') ?? $user['username'] }}" required autocomplete="username" autofocus>

                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="email">{{ __('Email address') }}</label>

                                            <div>
                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') ?? $user['email'] }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstname">{{ __('First name') }}</label>

                                            <div>
                                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First name" name="firstname" value="{{ old('firstname') ?? $user['firstname'] }}" required autocomplete="firstname" autofocus>

                                                @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="lastname">{{ __('Last name') }}</label>

                                            <div>
                                                <input id="lastname" value="{{ $user['lastname'] }}" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="First name" name="lastname" value="{{ old('lastname') ?? $user['lastname'] }}" required autocomplete="lastname" autofocus>

                                                @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-center">Address</p>
                                    <hr>
                                   
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Country</label>

                                            <select name="country" class="custom-select" id="country">
                                                <option value="{{ $user->address['country'] }}">{{ $user->address['country'] }}</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="city">{{ __('City') }}</label>

                                            <div>
                                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" value="{{ old('city') ?? $user->address['city'] }}" required autocomplete="city" autofocus>

                                                @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="zip">{{ __('Zip') }}</label>

                                            <div>
                                                <input id="zip" type="number" class="form-control @error('zip') is-invalid @enderror" placeholder="zip" name="zip" value="{{ old('zip') ?? $user->address['zip'] }}" autocomplete="zip" autofocus>

                                                @error('zip')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="line_1">{{ __('Line 1') }}</label>

                                            <div>
                                                <input id="line_1" type="text" class="form-control @error('line_1') is-invalid @enderror" placeholder="Address line *" name="line_1" value="{{ old('line_1') ?? $user->address['line_1'] }}" required autocomplete="line_1" autofocus>

                                                @error('line_1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="line_2">{{ __('Line 2') }}</label>

                                            <div>
                                                <input id="line_2" type="text" class="form-control @error('line_2') is-invalid @enderror" placeholder="Address line 2" name="line_2" value="{{ old('line_2') ?? $user->address['line_2'] }}" autocomplete="line_2" autofocus>

                                                @error('line_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="update_profile" name="update_profile" class="btn btn-primary">Update profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection