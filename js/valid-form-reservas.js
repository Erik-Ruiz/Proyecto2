
function validacion() {

    // userI = document.getElementById('icono1');
    // user = document.getElementById('correo');
    fecha = document.getElementById('fecha').value;

    // passI = document.getElementById('icono2');
    // pass = document.getElementById('passw');
    hora = document.getElementById('hora').value;
    var x=new Date();
    if (fecha.lenght == 0) {
        
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Fecha vacia',
            
        })
        return false;
      }
      else if (x<=fecha) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Fecha erronea',
            
        })
        return false;
      }

    
      return true;
  
}
