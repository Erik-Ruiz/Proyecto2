
function validacion_ajax_mant() {

    nom = document.getElementById('nombre');
    nombre = document.getElementById('nombre').value;

    user = document.getElementById('correo');
    correo = document.getElementById('correo').value;

    pass = document.getElementById('password');
    passw = document.getElementById('password').value;
    
      if (!/(?=.*[a-z])(?=.*[A-Z])/.test(nombre)) {
          
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Nombre incorrecto',
          
      })
            return false;
      }

      else if (correo.lenght == 0) {
        

        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Correo vacio',
          
      }) 
             return false;
      }
      else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Correo erroneo',
            
        })
        return false;
      }
      
    else if (passw.lenght == 0) {
        // Si no se cumple la condicion...
        alert('Campo password vacio');

        return false;
     }      
      
     else if (!/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,20})$/.test(passw)) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password no válido',
            
        })
        return false;
      }
      

      return true;
  
}
