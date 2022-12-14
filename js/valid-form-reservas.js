
function validacion() {

    // fechas = document.getElementById('fecha');
    fecha = document.getElementById('fecha').value;
    mesa = document.getElementById('id_mesa').value;
    // horas = document.getElementById('hora');
    // hora = document.getElementById('hora').value;
    
    FechaActual = new Date();

    FechaActual = FechaActual.getFullYear()  + '-' + FechaActual.getDate() + '-' + FechaActual.getMonth();

    // const [hour, minutes, seconds] = [date.getHours(), date.getMinutes(), date.getSeconds()];

    // var fecha = new Date(fecha);

    if (mesa.lenght == 0) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Mesa no seleccionada',
            
        })
        return false;
      }
      else if (FechaActual > fecha) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Fecha no disponible',
            
        })
        return false;
      }

    
      return true;
  
}
