@extends('Layout.plantillaU')
@section('paginas')

<style>
    .titulo{
        width: 100%;
        height: 100%;
        margin-bottom:50px ;
    }
    h2{
        font-family: 'Arial';
        color:#000000;
        text-align: center;
        font-size:45px;
    }
    .parrafo p{
        color:#000000;
        width: 60%;
        height: 100%;
        text-align:justify;
        margin: 5px auto;
        font-family: 'Arial';
        font-size: 15px;
    }
</style>

<div class="container-fluid mt-3">
    <div class="titulo">
    <h2>TÉRMINOS Y CONDICIONES</h2>
    </div>
    <div class="parrafo">
    <p>Este aplicativo web fue diseñado y creado para la promoción y distribución de productos y servicios
    de <strong>Axes Skateboarding.</strong> Todos nuestros productos cumplen con las normas establecidas por
    las entidades regulares de industria y comercio, garantizando la calidad y legalidad de cada producto.
    </p>
    </div>

</div>

@endsection
