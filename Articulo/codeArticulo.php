<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$Cod_arti = (isset($_POST['Cod_arti'])) ? $_POST['Cod_arti'] : "";
$Nom_art = (isset($_POST['Nom_art'])) ? $_POST['Nom_art'] : "";
$Precio = (isset($_POST['Precio'])) ? $_POST['Precio'] : "";
$Fecha = (isset($_POST['Fecha'])) ? $_POST['Fecha'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



        


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionArticulo = $conn->prepare(
                    "INSERT INTO articulo (Cod_arti, Nom_art, 
                Precio, Fecha) 
                VALUES ('$Cod_arti','$Nom_art','$Precio','$Fecha')"
                );



                $insercionArticulo->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
                break;
           
        
        




        

    case 'btnModificar':

        $editarArticulos = $conn->prepare(" UPDATE articulo SET Cod_arti = '$Cod_arti', 
        Nom_art = '$Nom_art ',Precio = '$Precio',Fecha = '$Fecha'
        WHERE Cod_arti = '$Cod_arti' ");

       
        

        $editarArticulos->execute();
       
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
            /* 
            $consultaFoto = $conn->prepare(" SELECT foto FROM empleados
            WHERE id = '$txtId' "); */
    
        $eliminarArticulo = $conn->prepare(" DELETE FROM articulo
        WHERE Cod_arti  = '$Cod_arti ' ");
    
            // $consultaFoto->execute();
        $eliminarArticulo->execute();
        $conn->close();
    
        header('location: index.php');
    
        break;
    
    case 'btnCancelar':
            header('location: index.php');
        break;
    
    default:
        # code...
        break;
}
    




/* Consultamos todos los empleados  */
$consultaArticulo = $conn->prepare("SELECT * FROM articulo");
$consultaArticulo->execute();
$listaArticulo = $consultaArticulo->get_result();
$conn->close();
