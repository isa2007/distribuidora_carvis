<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$Doc_prov  = (isset($_POST['Doc_prov'])) ? $_POST['Doc_prov'] : "";
$Tipo_doc_prov = (isset($_POST['Tipo_doc_prov'])) ? $_POST['Tipo_doc_prov'] : "";
$Nom_prov = (isset($_POST['Nom_prov'])) ? $_POST['Nom_prov'] : "";
$Ape_prov = (isset($_POST['Ape_prov'])) ? $_POST['Ape_prov'] : "";
$Tel_prov = (isset($_POST['Tel_prov'])) ? $_POST['Tel_prov'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':
       


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionProveedor = $conn->prepare(
                    "INSERT INTO proveedor (Doc_prov, Tipo_doc_prov, 
                Nom_prov, Ape_prov, Tel_prov) 
                VALUES ('$Doc_prov','$Tipo_doc_prov','$Nom_prov','$Ape_prov','$Tel_prov')"
                );



                $insercionProveedor->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
           



        break;

    case 'btnModificar':

        $editarProveedor = $conn->prepare(" UPDATE proveedor SET Doc_prov = '$Doc_prov', 
        Tipo_doc_prov = '$Tipo_doc_prov', Nom_prov = '$Nom_prov', Ape_prov = '$Ape_prov',
        Tel_prov = '$Tel_prov'
        WHERE Doc_prov = '$Doc_prov' ");




        $editarProveedor->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM empleados
        WHERE id = '$txtId' "); */

        $eliminarProveedor = $conn->prepare(" DELETE FROM proveedor
        WHERE Doc_prov = '$Doc_prov' ");

        // $consultaFoto->execute();
        $eliminarProveedor->execute();
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
$consultaProveedor = $conn->prepare("SELECT * FROM proveedor");
$consultaProveedor->execute();
$listaProveedor = $consultaProveedor->get_result();
$conn->close();
