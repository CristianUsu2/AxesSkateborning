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

    public function comprobante($fecha){
        $totales=[];
        $totales2=[];
        $sesion=session('datosU');
        $idUsuario;
        foreach($sesion as $usua){
            $idUsuario=$usua->Id_Usuarios;
        }
        $usuario=User::find($idUsuario);
        
        $productos=Productos::all();
        $pedidosT=Pedidos::all();
        $estadosPedido=EstadoPedido::all();
        $detalleP = DetallePedidoProducto::all();
        $pedidos=Pedidos::join("detalle_pedido_productos", "detalle_pedido_productos.id_pedido", "=", "pedidos.Id_pedido")
                         ->join("pago_en_lineas", "pago_en_lineas.id_pedido","=","pedidos.Id_pedido")
                         ->where('id_usuario','=',$usuario->Id_Usuarios)
                         ->where('pedidos.Fecha','=',$fecha)
                         ->select("*")
                         ->get();
                         
        foreach($pedidos as $p){
          array_push($totales,$p->Sub_Total);
          array_push($totales2,$p->Total);
        }
      
        $subtotal=array_sum($totales);
        $total=array_sum($totales2);
        
    
        $pdf = PDF::loadView('comprobantePago', compact('productos','pedidosT','subtotal','total','pedidos','detalleP','usuario'));

        return view('comprobantePago', compact('productos','pedidosT','subtotal','total','pedidos','detalleP','usuario'));//$pdf->download('ComprobantePago.pdf');

    }
}
