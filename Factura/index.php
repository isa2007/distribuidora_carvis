<?php include 'codefactura.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">




        <form action="" method="post">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Factura</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">


                            <input type="hidden" require name="Id_fac" id="Id_fac" placeholder="" value="<?php echo $Id_fac ?>">


                            
                           


                                  

                                 <!-- INICIO SELECTOR CLIENTE -->

                                <div class="form-group col-md-12">

                                    <label for="Doc_cli ">Cliente</label>


                                    <select name="Doc_cli " id="Doc_cli " class="form-control">

                                        <?php

                                        if ($listaCliente->num_rows > 0) {
                                            foreach ($listaCliente as $cliente) {
                                                echo " <option value='' hidden > Seleccione el Cliente</option> ";
                                                echo " <option value='{$cliente['Doc_cli ']}'> {$cliente['Tipo_doc_cli']} {$cliente['Nom_cli']} {$cliente['Nom_cli']} {$cliente['Direc_cli']} {$cliente['Tel_cli']}</option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR CLIENTE -->


                                <!-- Selector de EMPLEADOS -->
                                <div class="form-group col-md-12">

                                    <label for="id">Empleado</label>


                                    <select name="id" id="id" class="form-control">

                                        <?php

                                        if ($listaEmpleados->num_rows > 0) {
                                            foreach ($listaEmpleados as $empleado) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$empleado['id']}'> {$empleado['id']} {$empleado['nombre']} {$empleado['apellidoP']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR EMPLEADO -->



                    

                                

                                 <!-- INICIO SELECTOR PROVEEDOR-->

                                 <div class="form-group col-md-12">

                                 <label for="Doc_prov">Proveedor</label>


                                 <select name="Doc_prov" id="Doc_prov" class="form-control">

                                 <?php

                                 if ($listaProveedor->num_rows > 0) {
                                  foreach ($listaProveedor as $proveedor) {
                                    echo " <option value='' hidden > Seleccione el Proveedor</option> ";
                                    echo " <option value='{$proveedor['Doc_prov']}'> {$proveedor['Doc_prov']} {$proveedor['Nom_prov']} {$proveedor['Ape_prov']} </option> ";
                                       }
                                  } else {

                                    echo "<h2> No tenemos resultados </h2>";
                                  }
                                   ?>
                                </select>


                                </div>

                                <!-- FIN SELECTOR PROVEEDOR -->


                                <!-- INICIO SELECTOR ARTICULO-->

                                <div class="form-group col-md-12">

                                <label for="Cod_arti ">Artículo</label>


                                 <select name="Cod_arti " id="Cod_arti " class="form-control">

                                <?php

                                 if ($listaArticulo->num_rows > 0) {
                                foreach ($listaArticulo as $Articulo) {
                                  echo " <option value='' hidden > Seleccione el Articulo</option> ";
                                  echo " <option value='{$Articulo['Cod_arti ']}'> {$Articulo['Nom_art']} {$Articulo['Precio']}  {$Articulo['Fecha']} </option> ";
                                }
                                } else {

                                 echo "<h2> No tenemos resultados </h2>";
                                }
                                ?>
                                 </select>


                                 </div>

                                <!-- FIN SELECTOR ARTICULO -->



                                <div class="form-group col-md-12">
                                    <label for="Cantidad">Cantidad</label>
                                    <input type="text" class="form-control" require name="Cantidad" id="Cantidad" value="<?php echo $Cantidad ?>">
                                    <br>
                                </div>

                                
                                <div class="form-group col-md-12">
                                    <label for="Form_pag">Forma de pago</label>
                                    
                                    <select name="Form_pag" id="Form_pag" class="form-control">
                                        <option value="#">Seleccione Forma de Pago</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                                        <option value="Transferencia">Transferencia</option>
                                    </select>
                                </div>



                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer btn-group">
                            <div class="btn-group col-md-12">
                                <button value="btnAgregar" class="btn btn-success col-md-6 " type="submit" name="accion">Agregar</button>
                                <button value="btnCancelar" class="btn btn-primary col-md-6 " type="submit" name="accion">Cancelar</button>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal;">
                Agregar Factura
            </button>


        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Documento cliente</th>
                        <th scope="col">Docummento Empleado</th>
                        <th scope="col">Documento proveedor</th>
                        <th scope="col">Codigo articulo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Forma de pago</th>
                        <th scope="col">Fecha factura</th>


                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaFactura->num_rows > 0) {

                        foreach ($listaFactura as $factura) {

                    ?>

                            <tr>


                                <td> <?php echo $factura['Id_fac ']  ?> </td>
                                <td> <?php echo $factura['Doc_cli']," ", $factura['Tipo_doc_cli'], " ", $factura['Nom_cli'], " ", $factura['Ape_cli'], " ", $factura['Direc_cli'], " ", $factura['Tel_cli']  ?> </td>
                                <td> <?php echo $factura['id ']," ", $factura['nombre'], " ", $factura['apellidoP']  ?> </td>
                                <td> <?php echo $factura['Doc_prov ']," ", $factura['Nom_prov'], " ", $factura['Ape_prov']   ?> </td>
                                <td> <?php echo $factura['Cod_arti ']," ", $factura['Nom_art'], " ", $factura['Precio'], " ", $factura['Fecha']       ?> </td>
                                <td> <?php echo $factura['Cantidad']  ?> </td>
                                <td> <?php echo $factura['Form_pag']     ?> </td>
                                <td> <?php echo $factura['Fecha_fac']     ?> </td>


                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">
                                    <input type="hidden" name="Id_fac" value="<?php echo $factura['Id_fac'];  ?>">
                                    <input type="hidden" name="Doc_cli" value="<?php echo $factura['Doc_cli'];  ?>">
                                    <input type="hidden" name="id" value="<?php echo $factura['id'];  ?>">
                                    <input type="hidden" name="Doc_prov" value="<?php echo $factura['Doc_prov'];  ?>">
                                    <input type="hidden" name="Cod_arti" value="<?php echo $factura['Cod_arti'];  ?>">
                                    <input type="hidden" name="Cantidad" value="<?php echo $factura['Cantidad'];  ?>">
                                    <input type="hidden" name="Form_pag" value="<?php echo $factura['Form_pag'];  ?>">
                                    <input type="hidden" name="Fecha_fac" value="<?php echo $factura['Fecha_fac'];  ?>">





                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                                </form>


                            </tr>


                    <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>


                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>