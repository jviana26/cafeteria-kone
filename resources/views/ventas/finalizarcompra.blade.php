@extends('layouts.main', ['activePage' => 'venta', 'titlePage' => 'ventas SEDE SMDL'])
@section('content')
    <h6 style="margin-top: 50px; margin-left:30px;">Ultima Conexión: {{ Auth::user()->last_login }} </h6>
    <div class="content" style="margin-bottom: -160px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                   <form action="/ventas/fincompra" method="POST">
        
                        @csrf
                        @method('GET') 
                        <div id="compracancelada"></div>
                        <button type="submit" class="btn btn-success mt-4" onclick="terminar_compra()">finalizar compra</button>
                        <a href="/ventas2" class="btn btn-danger mt-4" onclick="cancelar_compra()">Cancelar compra</a>
                        <div class="container mt-4 ">
                        </label> total a pagar:
                        <input type="text" name="apagar" id="apagar" readonly>
                        </label> Valor de cambio: 
                        <input type="text" name="cambiomostrar" id="cambiomostrar" readonly> 
                        </label> Valor cancelado: 
                        <input type="text" name="pagado" id="pagado" readonly>
                   
                        </div>
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="card">
                                <!--espacio para los input de guardado -->
                                  <table id="resultados" class="table"> 
                                                            <thead class="text-info ">
                                                                <th>ID</th>
                                                                <th>Nombre</th>
                                                                <th>Precio</th>
                                                                <th>cantidad</th>
                                                                </thead>
                                                                <tbody>
                                                            <tr>
                                                                <td id="id"></td>
                                                                <td id="nombre"></td>
                                                                <td id="precio"></td>
                                                                <td id="cantidad"></td>
                                                            </tr>
                                                                    
                                                            </tbody>

                                         <td><input type="hidden" name="detalleventa" id="detalleventa" readonly></td>
                                         <td><input type="hidden" name="idprod" id="idprod" readonly></td>
                                           <td><input type="hidden" name="cantidadprod" id="cantidadprod" readonly></td>
                                           <input type="hidden" name="id_biometric" id="id_biometric">
                                          {{--tal vez eliminarlo 
                                            <td><input type="hidden" name="idguardar" id="idguardar" readonly></td>
                                           <td> <input type="hidden" name="nombreguardar" id="nombreguardar" readonly></td>
                                           <td><input type="hidden" name="descripcionguardar" id="descripcionguardar" readonly></td>
                                           <td><input type="hidden" name="precioguardar" id="precioguardar" readonly></td>
                                           <td><input type="hidden" name="cantidadguardar" id="cantidadguardar" readonly></td>
                                            --}}
                                                                    
                                                                    </table>
                                                                </div>
                                                                
                                                                    <div class="card">
                                                                        <br>
                                                                <div class="container">
                                                                </label> Cantidad de articulos: 
                                                                <input type="text" name="cantprod" id="cantprod" readonly>
                                                                <p></p>
                                                                <div class="row">
                                                                      <span>
                                                                        <label>Nombre:</label>
                                                                        <input type="text" name="clientenombre" id="clientenombre" class="border-0">
                                                                    </span>
                                                                    <span>
                                                                    <label>Credito disponible: </label>
                                                                    <input type="text" name="clientecredito" id="clientecredito" class="border-0">
                                                                    </span>
                                                                   </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                                    </div>
                                                            </div>
                                                           </div>
                                                            </div>
                                                          </div>
                                                            
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                //traer datos de el localstorage
                                    var suma = JSON.parse(localStorage.getItem('suma')); 
                                    var pagado = JSON.parse(localStorage.getItem('pagado'));
                                    let detalleventa = JSON.parse(localStorage.getItem('detalleventa')); 
                                    var sumacant = JSON.parse(localStorage.getItem('sumacant'));
                                    var id = JSON.parse(localStorage.getItem('id')); 
                                    var biometric_id = JSON.parse(localStorage.getItem('biometric_id')); 
                                    var arraycantidad = 1;
                                    let cliente = @json($cliente);
                                    console.log(cliente);
                                    
                                
   
                                            var resultcambio = (pagado - suma );
                                                       document.getElementById("cambiomostrar").value = resultcambio 
                                                       document.getElementById("apagar").value = suma 
                                                       document.getElementById("pagado").value = pagado
                                                       document.getElementById("cantprod").value = sumacant
                                                       for (let i = 0; i < detalleventa.length; i++) {
                                                        document.getElementById("idprod").value = detalleventa[i].id
                                                        document.getElementById("cantidadprod").value = detalleventa[i].cantidad
                                                        document.getElementById("id_biometric").value = biometric_id
                                                           
                                                       }
                                                       
                                                  
                                                     
                                                     
                                                      
                                                       
                                                          //guardar detalle de la venta a la base de datos

                                                          document.getElementById('detalleventa').value += JSON.stringify(detalleventa)
                                                          
                                                         
                                                         /*tal vez a eliminar
                                                          for (let i = 0; i < detalleventa.length; i++) {
                                                             document.getElementById('idguardar').value += detalleventa[i].id
                                                             document.getElementById('nombreguardar').value += detalleventa[i].nombre
                                                             document.getElementById('descripcionguardar').value += detalleventa[i].descripcion
                                                             document.getElementById('precioguardar').value += detalleventa[i].precio
                                                             document.getElementById('cantidadguardar').value = arraycantidad
                                                          }
                                                         */
                                                        // mostrando resultados desde el foreach 
                                                          detalleventa.forEach(object =>{
                                                                   document.getElementById('id').innerHTML += "<table><tr><td>"+object.id+"</td><tr><table>"; 
                                                                   document.getElementById('nombre').innerHTML += "<table><tr><td>"+object.nombre+"</td><tr><table>";
                                                                   document.getElementById('precio').innerHTML += "<table><tr><td>"+object.precio+"</td><tr><table>";
                                                                   document.getElementById('cantidad').innerHTML += "<table><tr><td>"+object.cantidad+"</td><tr><table>";
                                                                   
                                                                  })

                                                                  
                                                                  var nombrecliente = cliente.find(nombrecliente => JSON.stringify(nombrecliente.id_biometric) === biometric_id);
                                                       console.log(nombrecliente.credito);
                                                       console.log(biometric_id);
                                                       document.getElementById('clientenombre').value = nombrecliente.nombre 
                                                       document.getElementById('clientecredito').value = nombrecliente.credito 
                                                                  
                                                                    //restar el stock con la cantidad y enviar a bd (tal vez a borrar)
                                                                 //    
                                                                /*
                                                                 let stockarr = [];
                                                                  for (let i = 0; i < detalleventa.length; i++) {
                                                                  var stockrest = detalleventa[i].stock - detalleventa[i].cantidad
                                                                    stockarr.push({'id': detalleventa[i].id, 'nuevostock': stockrest})
                                                                    localStorage.setItem('stockcomplete',JSON.stringify(stockarr));
                                                                    document.getElementById('stock').value += stockarr}
                                                                    for (let i = 0; i < stockarr.length; i++) {
                                                                        document.getElementById("idprod").value += stockarr[i].id
                                                                        document.getElementById("stocknuevo").value += stockarr[i].nuevostock
                                                                        }
                                                                *///
                                                                   //funcion para terminar y cancelar compra

                                                        function cancelar_compra()
                                                        {
                                                         document.getElementById('compracancelada').innerHTML ="<div class='alert alert-danger' role='alert'>compra cancelada</div>"
                                                         localStorage.clear();}

                                                        function terminar_compra()
                                                        {
                                                            if (nombrecliente.credito < suma) {
                                                                document.getElementById('compracancelada').innerHTML ="<div class='alert alert-warning' role='alert'>Credito insuficiente</div>"
                                                                localStorage.clear();
                                                            }else{
                                                                document.getElementById('compracancelada').innerHTML ="<div class='alert alert-success' role='alert'>compra finalizada</div>"
                                                                localStorage.clear();
                                                            }
                                                            
                                                            
                                                        }
                                                      
                                                       
                                                       
                                        </script>
                                    @endsection