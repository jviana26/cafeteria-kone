<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use PhpParser\JsonDecoder;
use App\Models\Venta;
use App\Models\Cliente;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('ventas.ventas')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
   //buscador automatico con conexion a base de datos
   public function buscadorautoventa(Request $request)
   {
        $productos = Producto::all();
        $texto = $request->get('texto'); 
        $productos = Producto::firstOrNew()->where('nombre','LIKE','%'.$texto.'%')
        ->orwhere('id','LIKE','%'.$texto.'%')
        ->paginate(1);

       
        return view('ventas.paginas',)->with('productos',$productos,'texto',$texto);
   }
   //guardar el array   desde el input
 public function agregar(Request $request)
 {
  $cliente = Cliente::all();
    if ($request->get('texto') == null) {
        
    } else {
        $texto = $request->get('texto'); 
    $productosarray01 = Producto::select('id','nombre','precioventa','stock')->where('nombre','LIKE','%'.$texto.'%')
    ->orwhere('id','LIKE','%'.$texto.'%')
    ->paginate(1);

        
   $datarray = [

    'productosarray01' => $productosarray01,

   ];
   return view('ventas.ventas', $datarray )->with('cliente', $cliente);
    }
    
    return view('ventas.ventas');

    // return response()->json($arraydata,200,[]);
   // return view('ventas.ventas');

    
 
 }
 public function finalizarcompra(){
  $cliente = Cliente::all();
  return view('ventas.finalizarcompra')->with('cliente', $cliente);
 }
 public function fincompra(Request $request){
   //
  
   $clienteid = $request->get('id_biometric');

   $ventas = new Venta();

   $ventas->id_colaborador = auth()->id();
   $ventas->detalleventa = $request->get('detalleventa');
   $ventas->pagado = $request->get('pagado');
   $ventas->cambio = $request->get('cambiomostrar');
   $ventas->total = $request->get('apagar');
   $ventas->cantidad = $request->get('cantprod');
  
  if (isset($clienteid)) {
   $ventas->metodo = 'Credito';
   $ventas->cliente = $request->get('clientenombre');
   }else{
     $ventas->metodo = 'Efectivo';
     $ventas->cliente = 'Cliente Cafeteria';
   }
   $ventas->save();
  
//restar el stock de la cantidad
   $productos=json_decode($request->get('detalleventa'));
   for($i=0;$i<count($productos);$i++){

   $producto = Producto::findOrFail($productos[$i]->id);

   $producto->stock -= $productos[$i]->cantidad;
   $producto->save();
   //capturar nombre y descontar credito del usuario 
 }
 
   if (isset($clienteid)) {
     $clientebiometric = Cliente::find($request->get('id_biometric'));
    $clientebiometric->credito -= $ventas->total;
    $clientebiometric->save();
   }

   return redirect('/ventas');
 }
}
