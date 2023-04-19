<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <meta charset="utf-8"/>

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $data->page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $data->page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('storage/logo_vertical.png') }}" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Includable CSS --}}
    <link href="{{ asset('css/pages/login/classic/login-2.css') }}" rel="stylesheet" type="text/css"/>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
            <!--begin: Aside Container-->
            <div class="d-flex flex-row-fluid flex-column justify-content-between">
                <!--begin::Aside body-->
                <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">

                    <a href="#" class="mb-15 text-center">
                        <img src="{{ asset('storage/logoatux.png') }}" class="max-h-300px" alt="" />
                    </a>
                    <!--begin::Signin-->
                    <div class="login-form login-signin">
                        <div class="text-center mb-10 mb-lg-20">
                            <h2 class="font-weight-bold">Iniciar Sesión</h2>
                            <p class="text-muted font-weight-bold">Ingresa tu Nombre de Usuario y Contraseña</p>
                        </div>
                        <!--begin::Form-->
                        @if($errors->any())
                            <div class="fv-plugins-message-container" id="logueofallido">
                                <div class="fv-help-block">
                                    {{ $errors->first() }}
                                </div>
                            </div>
                        @endif
                        <form method="POST" class="form" id="kt_login_signin_form"  novalidate="novalidate" action="{{ route('autenticacion.login') }}">
                            @csrf
                            <div class="form-group py-3 m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Email" placeholder="Nombre de Usuario" name="email" autocomplete="off" id="email" />
                            </div>
                            <div class="form-group py-3 border-top m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password" placeholder="Contraseña" name="password" id="password" />
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                                <!-- <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline m-0 text-muted">
                                        <input type="checkbox" name="remember" />
                                        <span></span>Recordar</label>
                                </div> -->
                                <!-- <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">Olvidaste tu Contraseña ?</a> -->
                            </div>
                            <div align="center">
                                <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3" type="submit">Acceder</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                    <!--begin::Signup-->
                    <div class="login-form login-signup">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="">Registro</h3>
                            <p class="text-muted font-weight-bold">Registra los siguientes datos para crear tu cuenta</p>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="post" action="{{ route('autenticacion.store') }}" id="form_register">
                            @csrf
                            <div class="form-group py-3 border-bottom m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Email" name="item[email]" autocomplete="off" />
                            </div>
                            <div class="form-group py-3 border-bottom m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Nombres" name="item[name]" autocomplete="off" />
                            </div>
                            <div class="form-group py-3 border-bottom m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Celular" name="item[celular]" autocomplete="off" />
                            </div>
                            <div class="form-group py-3 border-bottom m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Dirección" name="item[direccion]" autocomplete="off" />
                            </div>
                            <div class="form-group py-3 border-bottom m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Ciudad" name="item[ciudad]" autocomplete="off" />
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-6 col-form-label">Género</label>
                                <div class="col-lg-6">
                                    <div class="kt-radio-inline">
                                        <br>
                                        <label class="kt-radio kt-radio--brand">
                                            <input type="radio" name="item[genero]" value="1"> Hombre
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" name="item[genero]" value="2"> Mujer
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group py-3 border-bottom m-0">
                                        <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Contraseña" name="item[password]" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group py-3 border-bottom m-0">
                                        <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Confirmar contraseña" autocomplete="off" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="form-group d-flex flex-wrap flex-center">
                                <button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Enviar</button>
                                <button id="cancel" class="btn btn-outline-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signup-->
                    <!--begin::Forgot-->
                    <div class="login-form login-forgot">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="">Olvidaste tu Contraseña ?</h3>
                            <p class="text-muted font-weight-bold">Ingresa tu correo electrónico para restablecer tu contraseña</p>
                        </div>
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                            <div class="form-group py-3 border-bottom mb-10">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="email" placeholder="Correo Electrónico" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center">
                                <button class="btn btn-primary float-right">Guardar</button>
                                <button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Enviar</button>
                                <button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Forgot-->
                </div>
                <!--end::Aside body-->
                <!--begin: Aside footer for desktop-->
                <div class="d-flex flex-column-auto justify-content-between mt-15">
                    <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© {{ date("Y") }} ATUX SRL.</div>
                </div>
                <!--end: Aside footer for desktop-->
            </div>
            <!--end: Aside Container-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7" style="background-image: url( {{ asset('media/bg/bg-2.jpg') }});">
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-lg-center">
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="display-4 font-weight-bold my-7 text-white">SISTEMA DE SEGUIMIENTO DE PROYECTOS</h3>
                    <p class="font-weight-bold font-size-h3 text-white opacity-80"></p>
                </div>
            </div>
            <!--end::Content body-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->



{{-- Global Config (global config for global JS scripts) --}}
<script>
    var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>

{{-- Global Theme JS Bundle (used by all pages)  --}}
@foreach(config('layout.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach

{{-- Includable JS --}}

<script src="{{ asset('js/pages/custom/login/login-general.js') }}" type="text/javascript"></script>

</body>
</html>

