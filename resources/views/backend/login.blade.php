
<!DOCTYPE html>
<html lang="en" direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->
<head>
    <meta charset="utf-8" />
    <title>تسجيل الدخول</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('backend/css_en/login-1.rtl.css_en') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('backend/css_en/plugins.bundle.rtl.css_en') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css_en/prismjs.bundle.rtl.css_en') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css_en/style.bundle.rtl.css_en') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css_en/main.css_en') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('backend/css_en/layouts/base_light.rtl.css_en') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css_en/layouts/menu_light.rtl.css_en') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css_en/layouts/brand_dark.rtl.css_en') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css_en/layouts/aside_dark.rtl.css_en') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login_page login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form login-signin">
                    @include('sweetalert::alert')
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                {{ Form::open(['route' =>'dashboard.login' , 'method' => 'POST','class' => 'form', 'novalidate' => 'novalidate', 'id' => 'kt_login_signin_form']) }}
                <!--begin::Title-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="{{ asset('backend/images/tif.png') }}" class="max-h-75px" alt="">
                        </a>
                    </div>
                    <!--begin::Title-->
                    <!--begin::Form group-->
                    <div class="form-group">
                        {{ Form::label('البريد الألكتروني', 'البريد الألكتروني' ,['class' => 'font-size-h6 font-weight-bolder text-dark']) }}
                        {{ Form::email('email', old('email') ,['class' => 'form-control form-control-solid h-auto', 'placeholder' => ' أدخل البريدالألكتروني ...']) }}
                        @if ($errors->has("email"))
                            <span class="form-text text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group">
                        {{ Form::label('كلمة المرور', 'كلمة المرور' ,['class' => 'font-size-h6 font-weight-bolder text-dark']) }}
                        {{ Form::password('password',['class' => 'form-control form-control-solid h-auto', 'placeholder' => 'أدخل كلمة المرور ...']) }}
                    </div>
                    <!--end::Form group-->

                    <!-- Forget Password And New Account -->
                    <div class="container text-center forget_password_and_new_account">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="" style="color: #0c0e1a !important; ">نسيت كلمة المرور ؟</a>
                            </div>
                            <div class="col-lg-6">
                                <a href="" style="color: #0c0e1a !important; ">   تسجيل حساب جديد</a>
                            </div>
                        </div>
                    </div>

                    <!--begin::Action-->
                    <div class="pb-lg-0 pb-5 text-center">
                        {{ Form::submit('دخول', ['class' => 'btn kt_login_signin_submit btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3']) }}
                    </div>
                    <!--end::Action-->
                {{ Form::close() }}
                <!--end::Form-->
                </div>
            </div>
            <!--end::Content body-->
            <!--begin::Content footer-->
            <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0 m-auto">
                <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                    <a href="http://www.tif.sa" target="_blank" class="text-light">جميع الحقوق محفوظة لشركة طيف &copy; 2021</a>
                </div>
            </div>
            <!--end::Content footer-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->

<!--begin::Global Theme Bundle(used by all pages)-->

<script src="{{ asset('backend/js/plugins.bundle.js') }}"></script>
<script src="{{ asset('backend/js/prismjs.bundle.js') }}"></script>
<script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
<!--end::Body-->
</html>
