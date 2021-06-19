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
                        @if(Session::has("success"))
                            <script>
                       Swal.fire(
                        'Operación éxitosa!',
                        'Su cuenta ha sido creada exitosamente, inicie sesion.',
                        'success'
                        )
                        </script>
                      @elseif(Session::has("failed2"))
                      <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ocurrió un error, no pudimos crear su cuenta porque ya existen datos similares'
                        })
                      </script>
                        @endif
                
                        <form action="{{url('/InicioSesionR')}}" method="post" id="registro">
                            @csrf
                            <div class="single-input-item">
                                <input type="text" name="identificacion" placeholder="Documento Identidad" />
                                @if($errors->has('identificacion'))
                                <span class="error text-danger">{{$errors->first('identificacion')}}</span>
                                @endif
                            </div>
                            <div class="single-input-item">
                                <input type="text" name="nombre" placeholder="Nombre" />
                                @if($errors->has('nombre'))
                                <span class="error text-danger">{{$errors->first('nombre')}}</span>
                                @endif
                            </div>
                            <div class="single-input-item">
                                <input type="text" name="apellido" placeholder="Apellido" />
                                @if($errors->has('apellido'))
                                <span class="error text-danger">{{$errors->first('apellido')}}</span>
                                @endif

                            </div>

                            <div class="single-input-item">
                                <input type="email" name="correo" placeholder="Correo"  />
                                @if($errors->has('correo'))
                                <span class="error text-danger">{{$errors->first('correo')}}</span>
                                @endif
                            </div>

                            <div class="single-input-item">
                                <input type="text" name="telefono" placeholder="Telefono / Celular" />
                                @if($errors->has('telefono'))
                                <span class="error text-danger">{{$errors->first('telefono')}}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="contraseña" placeholder="Contraseña" />
                                        @if($errors->has('contraseña'))
                                <span class="error text-danger">{{$errors->first('contraseña')}}</span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="ConfirmarContraseña" placeholder="Confirmar contraseña" />
                                        @if($errors->has('ConfirmarContraseña'))
                                <span class="error text-danger">{{$errors->first('ConfirmarContraseña')}}</span>
                                @endif
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <button class="sqr-btn" id="registros" type="submit">REGISTRARSE</button>
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