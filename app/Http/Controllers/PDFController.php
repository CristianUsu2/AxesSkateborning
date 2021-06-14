<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\EntradaProducto;
use App\Models\Pedidos;
use App\Models\EstadoPedido;
use App\Models\Productos;
use App\Models\DetallePedidoProducto;
class PDFController extends Controller
{
    public function generatePDF()
    {

        $entradaProductos=EntradaProducto::join("entradas","entrada_productos.Id_entrada","=","entradas.id")
        ->join("productos","productos.id","=","entrada_productos.Id_producto")
        ->select("*")
        ->get();    

        $pdf = PDF::loadView('myPDF', compact('entradaProductos'));
    
        return $pdf->download('InformeStock.pdf');
    }

    public function comprobante(){
        $sesion=session('datosU');
        $idUsuario;
        foreach($sesion as $usua){
            $idUsuario=$usua->Id_Usuarios;
        }
        $usuario=User::find($idUsuario);
        $user = User::all();
        $productos=Productos::all();
        $pedidosT=Pedidos::all();
        $estadosPedido=EstadoPedido::all();
        $detalleP = DetallePedidoProducto::all();
        $pedidos=Pedidos::join("detalle_pedido_productos", "detalle_pedido_productos.id_pedido", "=", "pedidos.Id_pedido")
                         ->join("pago_en_lineas", "pago_en_lineas.id_pedido","=","pedidos.Id_pedido")
                         ->where('id_usuario','=',$usuario->Id_Usuarios)
                         ->select("*")
                         ->get();
                         
        $pdf = PDF::loadView('comprobantePago', compact('user','productos','pedidosT','estadosPedido','pedidos','detalleP'));

        return $pdf->download('ComprobantePago.pdf');

    }
}
