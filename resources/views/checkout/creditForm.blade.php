<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Fill the Credit Card Information') }}</div>
                <div class="card-body">

                    <form name="ezPay" method="POST" action="/order">
                        @csrf
                        <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Reciever Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" minlength="3" maxlength="20" value="Joe{{ old('name') }}" required autocomplete="name" autofocus>
                                <p style="font-size: 14px">* Character number must be between 3 to 20.</p>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone number -->
                        <div class="form-group row">
                            <label for="cell-tel" class="col-md-3 col-form-label text-md-right">{{ __('Cell Phone') }}</label>

                            <div class="col-md-6">
                                <input id="cell-tel" type="tel" class="form-control @error('cell-phone') is-invalid @enderror" name="cell-tel" value="0978-241900{{ old('cell-tel') }}"  placeholder="09**-******" pattern="09[0-9]{2}-[0-9]{6}" autocomplete="cell-tel" required >

                                @error('cell-tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- Credit Card Number-->
                        <div class="form-group row">
                            <label for="credit-no" class="col-md-3 col-form-label text-md-right">{{ __('Credit Card Number') }}</label>

                            <div class="col-md-6">
                                <input id="credit-no" type="tel" value="4000-2222-2222-2222" class="form-control @error('cell-phone') is-invalid @enderror" name="credit-no" value="{{ old('credit-no') }}"  pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="****-****-****-*****"  required >
                                <p style="font-size: 14px">*<i>4000-2222-2222-2222</i> is the only accepted credit card number in the test api. Others will cause transaction failure.</p>
                                @error('credit-no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- Valid date -->
                        <div class="form-group row">
                            <label for="expiry" class="col-md-3 col-form-label text-md-right">{{ __('Valid Date (Month/Year)') }}</label>

                            <div class="col-md-6">
                                <input id="expiry" type="tel" class="form-control @error('valid-date') is-invalid @enderror" name="expiry" value="12/22" placeholder="MM/YY" pattern="(0[1-9]|1[1-2]){1}/[0-9]{2}"  required >

                                <p style="font-size: 14px">*Fill whatever you want. Month: 01~12</p>

                                @error('expiry')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- CVC -->
                        <div class="form-group row">
                            <label for="cvc" class="col-md-3 col-form-label text-md-right">{{ __('CVC') }}</label>

                            <div class="col-md-6">
                                <input id="cvc" type="tel" oninput="if(value.length>3)value=value.slice(0,3)" class="form-control @error('valid-date') is-invalid @enderror"  pattern="[0-9]{3}" name="cvc" value="123"  required >

                                <p style="font-size: 14px">*Fill whatever you want. Require 3 digital characters. </p>
                                @error('cvc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row">
                            <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <span class="buyerAddr" >
                                    County/City: &nbsp; 
                                    <select id="county" name="county" class="form-control col-md-3">
                                        <option value> Please Select</option>
                                        <option value="1"> Taipei City </option>
                                    </select>
                                    &nbsp; &nbsp; &nbsp;
                                    City/District:  &nbsp;
                                    <select id="city" name="city" class="form-control col-md-3">
                                        <option value> Please Select</option>
                                        <option value="1">  Shilin  </option>
                                        <option value="2"> Beitou  </option>
                                        <option value="3">  Neihu </option>
                                        <option value="4">  Wenshan </option>
                                        <option value="5">  Nangang </option>
                                        <option value="6"> Zhongshan  </option>
                                        <option value="7">  Da'an  </option>
                                        <option value="8"> Xinyi  </option>
                                        <option value="9"> Songshan  </option>
                                        <option value="10">  Wanhua  </option>
                                        <option value="11">  Zhongzheng  </option>
                                        <option value="12">  Datong  </option>
                                    </select>
                                </span>
                                <span style="display:flex;">
                                    <p>Road: &nbsp;</p> <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="test road{{ old('address') }}"  required >
                                </span>
                                
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit button-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div

