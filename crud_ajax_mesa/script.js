ListarProductos('');
function ListarProductos(busqueda) {

    

    var resultado= document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();

    formdata.append('busqueda', busqueda);


    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'listar.php');
    ajax.onload = function () {
        var str="";
        if (ajax.status == 200) {

            var json=JSON.parse(ajax.responseText);
            
             var tabla='';
             
             json.forEach(function(item) {
                 str="<tr><td>" + item.id + "</td>";
                str=str+"<td>" + item.nombre_mesa + "</td>";
                str+="<td>" + item.estado +  "</td>";
                str+="<td>" + item.id_sala +  "</td>";
                
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-success' onclick="+"Editar(" + item.id + ")>Editar</button>";
                 str=str+ " <button type='button' class='btn btn-danger' onclick="+"Eliminar(" + item.id + ")>Eliminar</button>";  
                str+="</td> ";       
            str+="</tr>";
             tabla += str;
         });
        resultado.innerHTML=tabla;
            
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
     
    


}

registrar.addEventListener("click", () => {


        var form = document.getElementById('frm');         
        var formdata = new FormData(form);

        // var form = document.querySelector('frm');         
        // form.onsubmit = e =>{

        //    var nombre_mesa = document.getElementById('nombre_mesa').value;
        //    var estado = document.getElementById('estado').value;
        //    var id_sala = document.getElementById('id_sala').value;
        //    var idp = document.getElementById('idp').value;


        //    var formdata = new FormData();
        //    formdata.append('nombre_mesa', nombre_mesa);
        //    formdata.append('estado', estado);
        //    formdata.append('id_sala', id_sala);
        //    formdata.append('idp', idp);

        //    e.preventDefault();

        // }

    //     alert(form);
  
    // alert(formdata);
        var ajax = new XMLHttpRequest();
        ajax.open('POST', 'registrar.php');
            ajax.onload=function (){
                if(ajax.status==200){
                    if (ajax.responseText == "ok") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrado',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        form.reset();
                        ListarProductos('');
                    }else{
                            Swal.fire({
                                icon: 'success',
                                title: 'Modificado',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            registrar.value = "Registrar";
                            idp.value = "";
                            ListarProductos('');
                            form.reset();
                        }
                }else{
                    respuesta_ajax.innerText = 'Error';
                }           
            
            
            }
            ajax.send(formdata);
});

function Eliminar(id) 
{   
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'NO'
    }).then((result) =>
     {
        if (result.isConfirmed)
         {

            
             
            var formdata = new FormData();
            formdata.append('id', id);
            var ajax = new XMLHttpRequest();
            ajax.open('POST', 'eliminar.php');
                ajax.onload=function ()
                {
                    if(ajax.status===200)
                    {
                        
                        if (ajax.responseText == "ok")
                            {
                                ListarProductos('');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                     } 
                } 
                ajax.send(formdata); 
         }
    })
            
        
    
}

function Editar(id) {


    var formdata = new FormData();
    formdata.append('id', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'editar.php');
    ajax.onload=function ()
        {
        if(ajax.status==200)
            {
                var json=JSON.parse(ajax.responseText);
                alert(json);
                document.getElementById('idp').value = json.id;
                document.getElementById('nombre_mesa').value = json.nombre_mesa;
                document.getElementById('estado').value = json.estado;
                document.getElementById('id_sala').value = json.id_sala;
                document.getElementById('registrar').value = "Actualizar"
            }
        }
        ajax.send(formdata);
    
       

}
buscar.addEventListener("keyup", () => {
    const valor = buscar.value;
    if (valor == "") {
        ListarProductos('');
    }else{
        ListarProductos(valor);
    }
});
