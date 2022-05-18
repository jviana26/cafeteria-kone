<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Stockupdate;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(20);
        return view('productos.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = new Producto();

        $productos->nombre = $request->get('nombre');
        $productos->descripcion = $request->get('descripcion');
        $productos->precio = $request->get('precio');
        $productos->stock = $request->get('stock');

        $productos->save();
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request)
    {    
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productoempa = Producto::find($id);
        return view('productos.edit')->with('productoempa',$productoempa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //en este espacio se guardara el stock para guardar en el detallestock desde el index 

         $productostockindex = Producto::find($id);
         $productostockindex->stock += $request->get('nuevostock');
         
         $productostockindex->save();

         //desde el modulo edit

        $producto = Producto::find($id);

        $producto->nombre = $request->get('nombre');
        $producto->preciocompra = $request->get('preciocompra');
        $producto->precioventa = $request->get('precioventa');

        $producto->save();

        //guardar cada movimiento en la base de datos

        /*
         primero crear la tabla en la base de4 datos donde voy a almacebnar todo conmo en detalles ventas esto con id, nombre, 
         precio compra, precio venta, stock y fecha despues hacer esto en la funcion update y finalizar arreglando el modulo de ventas          
        
        
        $productostock = new Stockupdate2();

        $productostock->nombre = $request->get('nombre');
        $productostock->preciocompra = $request->get('preciocompra');
        $productostock->precioventa = $request->get('precioventa');
        $productostock->stock_antiguo = $producto->stock - $request->get('stock');
        $productostock->stock_agregar = $request->get('stock');
        $productostock->fecha_creacion = $producto->created_at;
        $productostock->fecha_actualizacion = $producto->updated_at;

        $productostock->save();
*/

       
        //espera

        $productostock = new Stockupdate();
        $productostock->idprod = $producto->id;
        $productostock->nombre = $request->get('nombre');
        $productostock->preciocompra = $request->get('preciocompra');
        $productostock->precioventa = $request->get('precioventa');
        $productostock->stock_antiguo =  $productostockindex->stock - $request->get('nuevostock');
        if ($request->get('nuevostock') == null) {
            $productostock->stock_agregar = 0;
        }else {
            $productostock->stock_agregar = $request->get('nuevostock');
        }
        $productostock->fecha_creacion = $producto->created_at;
        $productostock->fecha_actualizacion = $producto->updated_at;

        $productostock->save();
       
       
        return redirect('/productos');
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->delete();
        return redirect('/productos');
    }
    
    public function buscador(Request $request)
    {
        $productos = Producto::all();
        $texto = $request->get('texto'); 
        $productos = Producto::firstOrNew()->where('nombre','LIKE','%'.$texto.'%')
        ->orwhere('id','LIKE','%'.$texto.'%')
        ->orwhere('descripcion','LIKE','%'.$texto.'%')
        ->orwhere('precio','LIKE','%'.$texto.'%')
        ->paginate(4);

        return view('productos.index',["texto" => $texto,"productos" => $productos]);
   }
   public function buscadorauto(Request $request)
   {
        $productos = Producto::all();
        $texto = $request->get('texto'); 
        $productos = Producto::firstOrNew()->where('nombre','LIKE','%'.$texto.'%')
        ->orwhere('id','LIKE','%'.$texto.'%')
        ->orwhere('descripcion','LIKE','%'.$texto.'%')
        ->orwhere('precio','LIKE','%'.$texto.'%')
        ->paginate(4);
        return view('productos.paginas',)->with('productos',$productos,'texto',$texto);
   }
   public function ventas()
   {
    
    
   }
   public function detallestock()
   {
       $productos = Stockupdate::paginate(7);
       return view('productos.detallestock')->with('productos', $productos);
   }
   public function buscadorstock(Request $request)
   {
       $productos = Stockupdate::all();
       $texto = $request->get('texto'); 
       $productos = Stockupdate::firstOrNew()->where('nombre','LIKE','%'.$texto.'%')
       ->orwhere('id','LIKE','%'.$texto.'%')
       ->orwhere('fecha_actualizacion','LIKE','%'.$texto.'%')
       ->paginate(15);

       return view('productos.detallestock',["texto" => $texto,"productos" => $productos]);
  }
  
   
}

