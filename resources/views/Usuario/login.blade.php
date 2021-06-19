@extends('Layout.plantillaU')
@section('paginas')

<style>
    .nice-select{
        display: none;
    }
</style>

<div class="login-register-wrapper">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Login Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap  pr-lg-50">
                        <h2>Iniciar Sesión</h2>
                     
                        <form>
                            <div class="single-input-item">
                                <input type="email" placeholder="Ingrese su Correo" name="Correo" id="correo"/>
                                @if($errors->has('Correo'))
                                <span class="error text-danger">{{$errors->first('Correo')}}</span>
                                @endif
                                <span class="error text-danger" id="spanCorreo"></span>

                            </div>
                            <div class="single-input-item">
                                <input type="password" placeholder="Ingrese su Contraseña" name="Contraseña" id="contra"/>
                                @if($errors->has('Contraseña'))
                                <span class="error text-danger">{{$errors->first('Contraseña')}}</span>
                                @endif
                                <span class="error text-danger" id="spanContraseña"></span>
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                        </div>
                                    </div>
                                    <a href="{{route('email')}}" class="forget-pwd">¿Olvidaste tu Contraseña?</a>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button type="button" class="sqr-btn" id="ingresar">INGRESAR</button>
                                <button type="button" class="sqr-btn" id="google">Google</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Content End -->

                <!-- Register Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                        <h2>REGISTRO</h2>         
                        <form>
                            <div class="single-input-item">
                                <input type="text" name="identificacion" placeholder="Documento Identidad" id="identificacion"/>
                                @if($errors->has('identificacion'))
                                <span class="error text-danger">{{$errors->first('identificacion')}}</span>
                                @endif
                                <span id="spanI" style="color:red;"></span>
                            </div>
                            <div class="single-input-item">
                                <input type="text" name="nombre" placeholder="Nombre" id="nombre"/>
                                @if($errors->has('nombre'))
                                <span class="error text-danger">{{$errors->first('nombre')}}</span>
                                @endif
                                <span id="spanN" style="color:red;"></span>

                            </div>
                            <div class="single-input-item">
                                <input type="text" name="apellido" placeholder="Apellido" id="apellido"/>
                                @if($errors->has('apellido'))
                                <span class="error text-danger">{{$errors->first('apellido')}}</span>
                                @endif
                                <span id="spanA" style="color:red;"></span>

                            </div>

                            <div class="single-input-item">
                                <input type="email" name="correo" placeholder="Correo" id="correoU" />
                                @if($errors->has('correo'))
                                <span class="error text-danger">{{$errors->first('correo')}}</span>
                                @endif
                                <span id="spanC" style="color:red;"></span>

                            </div>

                            <div class="single-input-item">
                                <input type="text" name="telefono" placeholder="Telefono / Celular" id="telefono"/>
                                @if($errors->has('telefono'))
                                <span class="error text-danger">{{$errors->first('telefono')}}</span>
                                @endif
                                <span id="spanT" style="color:red;"></span>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="contraseña" placeholder="Contraseña" id="contraseña"/>
                                        @if($errors->has('contraseña'))
                                <span class="error text-danger">{{$errors->first('contraseña')}}</span>
                                @endif
                                <span id="spanContra" style="color:red;"></span>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="ConfirmarContraseña" placeholder="Confirmar contraseña" id="confirmarContraseña"/>
                                        @if($errors->has('ConfirmarContraseña'))
                                <span class="error text-danger">{{$errors->first('ConfirmarContraseña')}}</span>
                                @endif
                                <span id="spanContraConfirm" style="color:red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <button class="sqr-btn" id="registrar" type="button">REGISTRARSE</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Content End -->
            </div>
        </div>
    </div>
</div>




@endsection