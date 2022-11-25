<?php
require_once 'connection.php';



function errorUser($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $error = true;
    }else{
        $error=false;
    }
    return $error;
}
// function errorEmail($conexion){

//     try{
    
//         $user = $_POST['mail'];        

//         //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
//         $user=strtolower(mysqli_real_escape_string($conexion,$user));
//         // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
//         $sql = "SELECT * from tbl_camarero where correo='{$user}";
//         $sql2 = "SELECT * from tbl_mantenimiento where correo='{$user}";
        
//         $resultado = mysqli_query($conexion,$sql);
//         $num=mysqli_num_rows($resultado);

//         $resultado2 = mysqli_query($conexion,$sql2);
//         $num2=mysqli_num_rows($resultado2);

//         if ($num==1 || $num2==1){

//             $error=true;
//             return $error;          
    
//         }

//         }catch(Exception $e){
//             $error=false;
                        
//             echo "<script>
//             Swal.fire({
//                 icon: 'error',
//                 title: 'Oops...',
//                 text: 'Eso no va asi',
                
//             })
//                 </script>";

//             return $error; 

//         }
// }
// function errorPsswd($conexion){

//     try{
    
//         $pass = $_POST['pass'];
//         $pass = sha1($pass);       

//         //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
//         $user=strtolower(mysqli_real_escape_string($conexion,$pass));
//         // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
//         $sql = "SELECT * from tbl_camarero where password='{$pass}";
//         $sql2 = "SELECT * from tbl_mantenimiento where password='{$pass}";
//         $resultado = mysqli_query($conexion,$sql);

//         var_dump($resultado);
//         $num=mysqli_num_rows($resultado);

//         $resultado2 = mysqli_query($conexion,$sql2);
//         $num2=mysqli_num_rows($resultado2);

//         if ($num==1 || $num2==1){

//             $error=true;
//             return $error;          
    
//         }

//         }catch(Exception $e){
//             $error=false;
//             return $error; 
//         }

// }


