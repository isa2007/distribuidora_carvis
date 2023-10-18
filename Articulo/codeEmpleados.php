<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$Cod_arti = (isset($_POST['Cod_arti'])) ? $_POST['Cod_arti'] : "";
$Nom_art = (isset($_POST['Nom_art'])) ? $_POST['Nom_art'] : "";
$Des_arti = (isset($_POST['Des_arti'])) ? $_POST['Des_arti'] : "";
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
                    "INSERT INTO articulo(Cod_arti, Nom_art, 
                Des_arti, Precio, Fecha) 
                VALUES ('$Cod_arti','$Nom_art','$Des_arti','$Precio','$Fecha')"
                );



                $insercionArticulo->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
            } else {
                echo "Problemas";
            }
        } else {
            // Manejar el error de carga de la imagen.
            echo "Error al cargar la imagen: " . $_FILES['foto']['error'];
        }




        break;

    case 'btnModificar':

        $editarEmpleados = $conn->prepare(" UPDATE empleados SET nombre = '$txtNombre' , 
        apellidoP = '$txtApellidoP', apellidoM = '$txtApellidoM', correo = '$txtCorreo'
        WHERE id = '$txtId' ");

       
        

        $editarEmpleados->execute();
        $editarEmpleadosFoto->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM empleados
        WHERE id = '$txtId' "); */

        $eliminarEmpleado = $conn->prepare(" DELETE FROM empleados
        WHERE id = '$txtId' ");

        // $consultaFoto->execute();
        $eliminarEmpleado->execute();
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
$consultaEmpleados = $conn->prepare("SELECT * FROM empleados");
$consultaEmpleados->execute();
$listaEmpleados = $consultaEmpleados->get_result();
$conn->close();