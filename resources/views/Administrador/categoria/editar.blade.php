@extends('adminlte::page')

@section('title', 'Tienda Axes | Administrador')

@section('content_header')
    <h1>Panel Administrativo</h1>
@stop

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<form action="{{url('/Administrador/categorias/editar/'.$categorias->id)}}" method="post">
   @csrf
  <div class="container mt-5 mr-4">
  @if(Session::has("success"))
                            <script>
                       Swal.fire(
                        'Operación éxitosa!',
                        'Se ha registrado la categoria exitosamente.',
                        'success'
                        )
                        </script>
                        @endif
      <label for="">Nombre de la Categoría</label>
      <input type="hidden" value="{{$categorias->id}}">
      <input type="text" class="form-control" name="Nombre_Categoria" value="{{$categorias->Nombre_Categoria}}" placeholder="Ingrese nombre de la categoría">
      <div class="form-group mb-3 mt-3">
        <button type="submit" class="btn btn-primary">Editar Categoría</button>
      </div>
  
  
  </div>
  </form>
@stop