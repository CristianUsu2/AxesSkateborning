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
    <h2>POLÍTICA Y PRIVACIDAD</h2>
    </div>
    <div class="parrafo">
    <p><strong>Axes Skateboarding</strong> es una empresa Colombiana enfocada en la fabricación y venta de ropa
    y elementos deportivos de alto rendimiento, cada producto cumple con las normas establecidas de comercialización
    como el IVA y pagos de derecho de distribución, cualquier uso indebido del nombre de los productos o
    servicios de la empresa <strong>Axes Skateboarding</strong> será sancionado por las entidades reguladoras
    de industria y comercio.
    </p>
    </div>

</div>

@endsection
