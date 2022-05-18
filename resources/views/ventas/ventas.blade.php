@extends('layouts.main', ['activePage' => 'venta', 'titlePage' => 'Ventas'])
@section('content')
    <h6 style="margin-top: 50px; margin-left:30px;">Ultima Conexión: {{ Auth::user()->last_login }} </h6>
    <div class="content" style="margin-bottom: -160px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <form action="/ventas/agregar" method="get">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <div class="input-group">                                             
                                            <input type="search" class="form-control rounded mt-4" placeholder="Agregar producto" name="texto" id="texto" />
                                        <button type="submit" class="btn btn-info mt-4">Agregar</button>
                                    </div>
                                </div>
                       </form>
                      </div>
                    </div> 
                    <div id="resultados"></div>
                    @if (@isset($productosarray01))
                    <div id="compracancelada"></div>
                    <div class="container"> 
                        <form action="/ventas/finalizarcompra">
                            <button type="submit" class="btn btn-success " id="terminarcompra" onclick="terminar_compra()">Termiinar compra</button>
                            <a href="/ventas" class="btn btn-danger  " onclick="cancelar_compra()">Cancelar compra</a>
                        </form>
                    </div>
                        <div class="container">
                            <label for="">Valor a pagar</label>
                            <input type="text" name="textosuma" id="textosuma" value="" readonly>
                    </div>
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="card">
                                  
                        <div class="table-responsive  my-3">
                            <table class="table"> 
                                <thead class="text-info">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>cantidad</th>
                                   <!-- <th>acciones</th> -->

                                </thead>
                                <tbody>
                                    @foreach ($productosarray01 as $productosarray01)
                                    <script>
                                        var productosarray01 = @json($productosarray01); 
                                        var arr = []
                                        arr.push(productosarray01)
                                        
                                      //  console.log(JSON.stringify(iddeproducto));
                                        //guardar arreglot
                                        
                                       
                                        let primero = JSON.parse(localStorage.getItem('data')) || [];
                                         
                                     // console.log(productosarray01);
                                     // if (primero.length > 0) {console.log(primero[0].id);}
                                    var arraycantidad = 1;
                                   //validar si stock esta vacio
                                    if (productosarray01.stock <= 0) {
                                        document.getElementById('compracancelada').innerHTML ="<div class='alert alert-warning' role='alert'>Producto agotado</div>"
                                    }else{
                                        //validar si se ingresar un primer producto
                                        if (primero.length === 0) {
                                       
                                       primero.push(productosarray01)
                                       let detalletotal = [];
                                        for (let i = 0; i < primero.length; i++) {
                                        detalletotal.push({"id":primero[i].id, "nombre":primero[i].nombre,"precio":primero[i].precioventa, "cantidad":arraycantidad})
                                            }console.log(detalletotal);
                                           localStorage.setItem('data',JSON.stringify(detalletotal));
                                         
                                   }else{ 
                                       //validar si hay productos repetidos
                                     if (primero.some(elementoarray => elementoarray.id === productosarray01.id)) {
                                         console.log("se repite");
                                         let repite = JSON.parse(localStorage.getItem('data'))
                                        var repitente = repite.find(elementorepite => elementorepite.id == productosarray01.id)
                                        const indice = repite.indexOf(repitente);
                                          var sumacantfinal = repitente.cantidad = repitente.cantidad + 1;
                                        console.log(productosarray01.stock - repitente.cantidad);
                                        if ((productosarray01.stock - repitente.cantidad) < 0) {
                                        document.getElementById('compracancelada').innerHTML ="<div class='alert alert-warning' role='alert'>Producto agotado</div>"
                                    }else{ repitente.cantidad = sumacantfinal;
                                          repite.splice(indice, 1)
                                          repite.push(repitente)
                                          console.log(repite);
                                          localStorage.setItem('data',JSON.stringify(repite));
                                        }}
                                         else{
                                       let nuevobueno = JSON.parse(localStorage.getItem('data'))
                                       console.log(nuevobueno); 
                                       let detalletotal = nuevobueno
                                       
                                        detalletotal.push({"id":productosarray01.id, "nombre":productosarray01.nombre,"precio":productosarray01.precioventa, "cantidad":arraycantidad})
                                            console.log(detalletotal);
                                            localStorage.setItem('data',JSON.stringify(detalletotal));
                                     }
                                         }
                                    }
                                          //intentar hacer lo del include con el aray de aca  
                                    //OBTENER DE LOCALSTORAG
                                    
                                           </script>
                                                     <tr>
                                                            <td id="id"></td>
                                                            <td id="nombre"></td>
                                                            <td id="precio"></td>
                                                           <td id="cantidad"></td>
                                                        <!--    <td id="acciones"></td> -->
                                                    </tr>
                                                    @endforeach
                                
                                                    </tbody>
                                                </table>
                                            </div>
                                            <script>
                                            let mostrar = JSON.parse(localStorage.getItem('data'));  
                                            //   console.log(mostrar[0].id);
                                            
                                               console.log(mostrar);
                                                mostrar.forEach(object =>{
                                                        
                                            //  console.log(object.id);
                                            //console.log(object.nombre);
                               
                                                       document.getElementById('id').innerHTML += "<table><tr><td>"+object.id+"</td><tr><table>"; 
                                                       document.getElementById('nombre').innerHTML += "<table><tr><td>"+object.nombre+"</td><tr><table>";
                                                       document.getElementById('precio').innerHTML += "<table><tr><td>"+object.precio+"</td><tr><table>";
                                                        document.getElementById('cantidad').innerHTML += "<table><tr><td>"+object.cantidad+"</td><tr><table>";
                                                        
                                                      //  document.getElementById('acciones').innerHTML += "<table><tr><td></td><i class='fa fa-plus' ></i><i class='fa fa-minus' ></i><i class='fa fa-trash' ></i><td></td><tr><table>";
                                                        
                                                        }); 
                                                       
                                                       
                                                        // metodo para la suma de los precios 
                                                    var suma = 0
                                                    for (let i = 0; i < mostrar.length; i++) {
                                                    suma += (parseInt(mostrar[i].precio)*(mostrar[i].cantidad))}
                                                     document.getElementById('textosuma').value = suma + " $";
                                                     localStorage.setItem('suma', JSON.stringify(suma))
                                                     // metodo para sumar cantidad
                                                     var sumacantidad = 0
                                                        for (let i = 0; i < mostrar.length; i++) {
                                                            sumacantidad += (mostrar[i].cantidad) }
                                                            localStorage.setItem('sumacant', JSON.stringify(sumacantidad))
                                                            //metodo para subir la cantidad y restarlo con la existencia
                                                            mostrar.forEach(objectstocknuevo=>{
                                                                localStorage.setItem('id', JSON.stringify(objectstocknuevo.id))
                                                            })
                                                          let cliente = @json($cliente);
                                                          console.log(cliente); 
                                                             
                                                    
                                                     //cancelar compra
                                                     function cancelar_compra()
                                                     {
                                                         document.getElementById('compracancelada').innerHTML ="<div class='alert alert-danger' role='alert'>compra cancelada</div>"
                                                         localStorage.clear('data');
                                                     }
                                                     /////terminar compra
                                                    function terminar_compra()
                                                     {
                                                        
                                                 localStorage.setItem('detalleventa', JSON.stringify(mostrar))
                                                 var confirmcredit = confirm("va a cancelar con credito?");
                                                         if (confirmcredit == true) 
                                                       {
                                                        var biometric = prompt('colocar el biometrico');
                                                       if (cliente.some(biometricid => biometricid.id_biometric == biometric)) {
                                                        localStorage.setItem('pagado', JSON.stringify(suma))
                                                        localStorage.setItem('biometric_id', JSON.stringify(biometric))
                                                       }
                                                       else{
                                                           alert('biometrico  no encontrado')
                                                           event.preventDefault();
                                                       }
                                                       }
                                                         else
                                                       {
                                                        var cambiodinero = prompt('¿ dinero recibido ?');
                                                        localStorage.setItem('pagado', JSON.stringify(cambiodinero))
                                                            if (cambiodinero < suma) 
                                                            {
                                                                alert('no alcanza para comprar el producto');
                                                                event.preventDefault();
                                                          }}}
                                                     </script>
                                         
                                                @else 
                                               <div class="row">
                                               <div class="container">
                                                <div class="card ">
                                                    <div class="card-header"><h1></h1></div>
                                                    <div class="card-body">
                                                      <h5 class="card-title text-center" id="h5s">Para iniciar la venta agrega un producto</h5>
                                                    </div>
                                                    <div class="card-header"><h1></h1></div>
                                                  </div>
                                               </div>
                                               </div>
                                                @endif
                                        
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                       
@endsection


<script>
    ///eyupp

    window.addEventListener("load",function(){
        document.getElementById("texto").addEventListener("keyup",function(){
         //console.log(document.getElementById("texto").value)
         if (( document.getElementById("texto").value.length)>=2) 
         fetch(`/buscadorautoventa?texto=${document.getElementById("texto").value}`,{
                method:'get'
            })
          .then(response => response.text() )
          .then(html => {
              document.getElementById("resultados").innerHTML = html
          })             
         else document.getElementById("resultados").innerHTML = "<div class='alert alert-info text-center text-black' role='alert'>!No se encontraron resultados!</div"
        })
    })

   

</script>