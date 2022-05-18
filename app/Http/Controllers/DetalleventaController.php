<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleventa = Venta::paginate(4);
        return view('detallesventas.index')->with('detalleventa', $detalleventa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function buscadordetalle(Request $request)
    {
        $detalleventa = Venta::all();
        $texto = $request->get('texto'); 
        $detalleventa = Venta::firstOrNew()->where('id','LIKE','%'.$texto.'%')
        ->paginate(1);

        return view('detallesventas.index',)->with('detalleventa',$detalleventa,'texto',$texto);
    }
    public function buscadordetalleauto(Request $request)
    {
         $detalleventa = Venta::all();
         $texto = $request->get('texto'); 
         $detalleventa = Venta::firstOrNew()->where('id','LIKE','%'.$texto.'%')
        ->paginate(1);
         return view('detallesventas.paginas',)->with('detalleventa',$detalleventa,'texto',$texto);
    }
    public function detalleventaindex()
    {
        
    }
    public function reportespfd()
    {
        return view('ventas.reportespdf');
    }
   
}
