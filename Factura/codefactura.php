<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$Id_fac = (isset($_POST['Id_fac'])) ? $_POST['Id_fac'] : "";
$Doc_cli = (isset($_POST['Doc_cli'])) ? $_POST['Doc_cli'] : "";
$id  = (isset($_POST['id '])) ? $_POST['id'] : "";
$Doc_prov = (isset($_POST['Doc_prov'])) ? $_POST['Doc_prov'] : "";
$Cod_arti  = (isset($_POST['Cod_arti'])) ? $_POST['Cod_arti'] : "";
$Cantidad = (isset($_POST['Cantidad'])) ? $_POST['Cantidad'] : "";
$Form_pag = (isset($_POST['Form_pag'])) ? $_POST['Form_pag'] : "";
$Fecha_fac = (isset($_POST['Fecha_fac'])) ? $_POST['Fecha_fac'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionFactura = $conn->prepare(
                "INSERT INTO factura (Id_fac , Doc_cli, id , Doc_prov, Cod_arti, Cantidad, Form_pag, Fecha_fac) 
                               VALUES ('$Id_fac','$Doc_cli','$id ','$Doc_prov','$Cod_arti','$Cantidad', '$Form_pag','$Fecha_fac')"
             );



        $insercionFactura->execute();
        $conn->close();

        header('location: index.php');



        break;


    case 'btnEliminar':


        $eliminarFactura = $conn->prepare(" DELETE FROM factura
        WHERE Id_fac = '$Id_fac' ");

        // $consultaFoto->execute();
        $eliminarFactura->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;


}



/* Consultamos todas las Facturas  */
$consultaFactura = $conn->prepare("SELECT * FROM factura 
INNER JOIN cliente ON factura.IDoc_cli  = cliente.Doc_cli 
INNER JOIN empleados ON factura.id = empleados.id 
INNER JOIN proveedor ON factura.Doc_prov = proveedor.Doc_prov
INNER JOIN articulo ON factura.Cod_arti =articulo.Cod_arti");
$consultaFactura->execute();
$listaFactura = $consultaFactura->get_result();



/* Consultamos todos los Clientes  */
$consultaCliente = $conn->prepare("SELECT * FROM cliente");
$consultaCliente->execute();
$listaCliente = $consultaCliente->get_result();



/* Consultamos todos los Empleados  */
$consultaEmpleados = $conn->prepare("SELECT * FROM empleados");
$consultaEmpleados->execute();
$listaEmpleados = $consultaEmpleados->get_result();


/* Consultamos todos los Proveedores  */
$consultaProveedor = $conn->prepare("SELECT * FROM proveedor");
$consultaProveedor->execute();
$listaProveedor = $consultaProveedor->get_result();


/* Consultamos todos los Articulos  */
 $consultaArticulo = $conn->prepare("SELECT * FROM articulo");
$consultaArticulo->execute();
$listaArticulo= $consultaArticulo->get_result();

//Al final de todas las consultas se cierra la conexion
 $conn->close();
