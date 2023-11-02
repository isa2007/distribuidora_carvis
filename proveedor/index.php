<?php include 'codeproveedor.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">



        <!-- enctype="multipart/form-data" se utiliza para tratar la fotografia -->
        <form action="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Proveedor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                

                                <div class="form-group col-md-12">
                                    <label for=" ">Documento</label>
                                    <input type="text" class="form-control" require name="Doc_prov" id="Doc_prov" placeholder="" value="<?php echo $Doc_prov ?>">
                                    <br>
                                </div>  

                                <div class="form-group col-md-12">
                                    <label for="Tipo_dDoc_provoc_prov">Tipo de documento</label>
                                    <input type="text" class="form-control" require name="Tipo_doc_prov" id="Tipo_doc_prov" placeholder="" value="<?php echo $Tipo_doc_prov ?>">
                                    <br>
                                </div>  

                                <div class="form-group col-md-12">
                                    <label for="Nom_prov">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="Nom_prov" id="Nom_prov" placeholder="" value="<?php echo $Nom_prov ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="Ape_prov">Apellido </label>
                                    <input type="text" class="form-control" require name="Ape_prov" id="Ape_prov" placeholder="" value="<?php echo $Ape_prov ?>">

                                </div>

                               

                                <div class="form-group col-md-12">
                                    <label for="Tel_prov ">Telefono</label>
                                    <input type="text" class="form-control" require name="Tel_prov " id="Tel_prov " placeholder="" value="<?php echo $Tel_prov  ?>">
                                    <br>
                                </div>  

                                



                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer">

                            <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
                            <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                            <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Proveedor
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        
                        <th scope="col">Documento</th>
                        <th scope="col">Tipo Documento</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php

                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaProveedor->num_rows > 0) {

                        foreach ($listaProveedor as $Proveedor) {

                    ?>

                            <tr>

                               

                                <td> <?php echo $Proveedor['Doc_prov']        ?> </td>
                                <td> <?php echo $Proveedor['Tipo_doc_prov']    ?> </td>
                                <td> <?php echo $Proveedor['Nom_prov'] ?> </td>
                                <td> <?php echo $Proveedor['Ape_prov'] ?> </td>
                                <td> <?php echo $Proveedor['Tel_prov']    ?> </td>




                                <form action="" method="post">

                                    <input type="hidden" name="Doc_prov" value="<?php echo $Proveedor['Doc_prov'];  ?>">
                                    <input type="hidden" name="Tipo_doc_prov" value="<?php echo $Proveedor['Tipo_doc_prov'];  ?>">
                                    <input type="hidden" name="Nom_prov" value="<?php echo $Proveedor['Nom_prov'];  ?>">
                                    <input type="hidden" name="Ape_prov" value="<?php echo $Proveedor['Ape_prov'];  ?>">
                                    <input type="hidden" name="Tel_prov" value="<?php echo $Proveedor['Tel_prov'];  ?>">

                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
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