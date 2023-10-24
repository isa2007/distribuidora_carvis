<?php include 'codeCliente.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                

                                <div class="form-group col-md-12">
                                    <label for="Doc_cli ">Documento</label>
                                    <input type="text" class="form-control" require name="Doc_cli" id="Doc_cli" placeholder="" value="<?php echo $Doc_cli ?>">
                                    <br>
                                </div>  

                                <div class="form-group col-md-12">
                                    <label for="Tipo_doc_cli">Tipo de documento</label>
                                    <input type="text" class="form-control" require name="Tipo_doc_cli" id="Tipo_doc_cli" placeholder="" value="<?php echo $Tipo_doc_cli ?>">
                                    <br>
                                </div>  

                                <div class="form-group col-md-12">
                                    <label for="Nom_cli">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="Nom_cli" id="Nom_cli" placeholder="" value="<?php echo $Nom_cli ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="Ape_cli">Apellido </label>
                                    <input type="text" class="form-control" require name="Ape_cli" id="Ape_cli" placeholder="" value="<?php echo $Ape_cli ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Direc_cli">Direccion</label>
                                    <input type="text" class="form-control" require name="Direc_cli" id="Direc_cli" placeholder="" value="<?php echo $Direc_cli ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Tel_cli">Telefono</label>
                                    <input type="text" class="form-control" require name="Tel_cli" id="Tel_cli" placeholder="" value="<?php echo $Tel_cli ?>">
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Cliente
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
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php

                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaCliente->num_rows > 0) {

                        foreach ($listaCliente as $Cliente) {

                    ?>

                            <tr>

                               

                                <td> <?php echo $Cliente['Doc_cli']        ?> </td>
                                <td> <?php echo $Cliente['Tipo_doc_cli']    ?> </td>
                                <td> <?php echo $Cliente['Nom_cli'] ?> </td>
                                <td> <?php echo $Cliente['Ape_cli'] ?> </td>
                                <td> <?php echo $Cliente['Direc_cli']    ?> </td>
                                <td> <?php echo $Cliente['Tel_cli']    ?> </td>




                                <form action="" method="post">

                                    <input type="hidden" name="Doc_cli" value="<?php echo $Cliente['Doc_cli'];  ?>">
                                    <input type="hidden" name="Tipo_doc_cli" value="<?php echo $Cliente['Tipo_doc_cli'];  ?>">
                                    <input type="hidden" name="Nom_cli" value="<?php echo $Cliente['Nom_cli'];  ?>">
                                    <input type="hidden" name="Ape_cli" value="<?php echo $Cliente['Ape_cli'];  ?>">
                                    <input type="hidden" name="Direc_cli" value="<?php echo $Cliente['Direc_cli'];  ?>">
                                    <input type="hidden" name="Tel_cli" value="<?php echo $Cliente['Tel_cli'];  ?>">

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