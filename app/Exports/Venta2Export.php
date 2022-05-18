<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Models\Venta2;
use Maatwebsite\Excel\Concerns\FromCollection;

class Venta2Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        return Venta2::select('id','id_colaborador','detalleventa','cantidad','total','pagado','cambio','metodo','cliente','created_at')->get();
        //return Venta2::select('id','id_colaborador','detalleventa','cantidad','total','pagado','cambio','metodo','cliente','created_at')->get();
    }
    public function printexcell(Request $request)
    { 
        
    }
}
