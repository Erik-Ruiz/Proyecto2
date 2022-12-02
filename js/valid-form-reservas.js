
function validacion() {

    // fechas = document.getElementById('fecha');
    fecha = document.getElementById('fecha').value;

    // horas = document.getElementById('hora');
    // hora = document.getElementById('hora').value;
    
    FechaActual = new Date();

    FechaActual = FechaActual.getFullYear()  + '-' + FechaActual.getDate() + '-' + FechaActual.getMonth();

    // const [hour, minutes, seconds] = [date.getHours(), date.getMinutes(), date.getSeconds()];

    // var fecha = new Date(fecha);

if (FechaActual > fecha) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Fecha no disponible',
            
        })
        return false;
      }

    
      return true;
  
}
