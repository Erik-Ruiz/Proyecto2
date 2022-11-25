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
                str=str+"<td>" + item.nombre + "</td>";
                str+="<td>" + item.correo + "</td>";
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
        
        var ajax = new XMLHttpRequest();
        ajax.open('POST', 'registrar.php');
            ajax.onload=function (){
                if(ajax.status===200){
                    
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
                document.getElementById('nombre').value = json.nombre;
                document.getElementById('correo').value = json.correo;
                // document.getElementById('password').value = json.password;
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
