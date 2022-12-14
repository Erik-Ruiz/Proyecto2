
function validacion() {

    // userI = document.getElementById('icono1');
    user = document.getElementById('correo');
    correo = document.getElementById('correo').value;

    // passI = document.getElementById('icono2');
    pass = document.getElementById('passw');
    passw = document.getElementById('passw').value;

    if (correo.lenght == 0) {
        
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
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Password vacio',
          
      })
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
