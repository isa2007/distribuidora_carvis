<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$Doc_cli = (isset($_POST['Doc_cli'])) ? $_POST['Doc_cli'] : "";
$Tipo_doc_cli = (isset($_POST['Tipo_doc_cli'])) ? $_POST['Tipo_doc_cli'] : "";
$Nom_cli = (isset($_POST['Nom_cli'])) ? $_POST['Nom_cli'] : "";
$Ape_cli = (isset($_POST['Ape_cli'])) ? $_POST['Ape_cli'] : "";
$Direc_cli = (isset($_POST['Direc_cli'])) ? $_POST['Direc_cli'] : "";
$Tel_cli = (isset($_POST['Tel_cli'])) ? $_POST['Tel_cli'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':
       


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionCliente = $conn->prepare(
                    "INSERT INTO cliente (Doc_cli, Tipo_doc_cli, 
                Nom_cli, Ape_cli, Direc_cli, Tel_cli) 
                VALUES ('$Doc_cli','$Tipo_doc_cli','$Nom_cli','$Ape_cli','$Direc_cli','$Tel_cli')"
                );



                $insercionCliente->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
           



        break;

    case 'btnModificar':

        $editarCliente = $conn->prepare(" UPDATE cliente SET Documento = '$Doc_cli' , 
        Tipo documento = '$Tipo_doc_cli', Nombre = '$Nom_cli', Apellidos = '$Ape_cli'
        , Direccion = '$Direc_cli' , Telefono = '$Tel_cli' 
        WHERE Doc_cli = '$Doc_cli' ");




        $editarCliente->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM empleados
        WHERE id = '$txtId' "); */

        $eliminarCliente = $conn->prepare(" DELETE FROM cliente
        WHERE Doc_cli= '$Doc_cli' ");

        // $consultaFoto->execute();
        $eliminarCliente->execute();
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
$consultaCliente = $conn->prepare("SELECT * FROM cliente");
$consultaCliente->execute();
$listaCliente = $consultaCliente->get_result();
$conn->close();
