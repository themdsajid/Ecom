@extends('mylayouts.app')

@section('content')
    <section class="gry-bg py-5">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center pt-4">
                                <h1 class="h4 fw-600">
                                    Login to your account.
                                </h1>
                            </div>

                            <div class="px-4 py-3 py-lg-4">
                                <div class="">
                                    <form class="form-default" role="form" action="{{route('login')}}"
                                        method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" class="form-control " value="" placeholder="Email"
                                                name="email" id="email" autocomplete="off">
                                        </div>

                                        {{-- <div class="form-group text-right">
                                            <button class="btn btn-link p-0 opacity-50 text-reset" type="button"
                                                onclick="toggleEmailPhone(this)">Use Email Instead</button>
                                        </div> --}}

                                        <div class="form-group">
                                            <input type="password" class="form-control " placeholder="Password"
                                                name="password" id="password">
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <label class="aiz-checkbox">
                                                    <input type="checkbox" name="remember">
                                                    <span class=opacity-60>Remember Me</span>
                                                    <span class="aiz-square-check"></span>
                                                </label>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="../password/reset.html" class="text-reset opacity-60 fs-14">Forgot
                                                    password?</a>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <button type="submit" class="btn btn-primary btn-block fw-600">Login</button>
                                        </div>
                                    </form>


                                </div>
                                <div class="text-center">
                                    <p class="text-muted mb-0">Dont have an account?</p>
                                    <a href="{{route('myUser-registration')}}">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if (country.iso2 == 'bd') {
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "https://www.novamaxindia.com/public/assets/js/intlTelutils.js?1590403638580",
            onlyCountries: ["IN"],
            customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                if (selectedCountryData.iso2 == 'bd') {
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function (e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });

        function toggleEmailPhone(el) {
            if (isPhoneShown) {
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                $('input[name=phone]').val(null);
                isPhoneShown = false;
                $(el).html('Use Phone Instead');
            }
            else {
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                $('input[name=email]').val(null);
                isPhoneShown = true;
                $(el).html('Use Email Instead');
            }
        }



        function autoFillSeller() {
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer() {
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }
        function autoFillDeliveryBoy() {
            $('#email').val('deliveryboy@example.com');
            $('#password').val('123456');
        }
    </script>
@endsection
