<?php include 'codearticulo.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Articulo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                               

                                <div class="form-group col-md-12">
                                    <label for="Cod_arti">Codigo</label>
                                    <input type="text" class="form-control" require name="Cod_arti" id="Cod_arti" placeholder="" value="<?php echo $Cod_arti  ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="Nom_art">Nombre articulo </label>
                                    <input type="text" class="form-control" require name="Nom_art" id="Nom_art" placeholder="" value="<?php echo $Nom_art ?>">

                                </div>

                                

                                <div class="form-group col-md-12">
                                    <label for="Precio">Precio</label>
                                    <input type="text" class="form-control" require name="Precio" id="Precio" placeholder="" value="<?php echo $Precio ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Fecha">Fecha</label>
                                    <input type="date" class="form-control" require name="Fecha" id="Fecha" placeholder="" value="<?php echo $Fecha ?>">
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
                Agregar Articulos
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre articulo</th>
                        <th scope="col">Precio </th>
                        <th scope="col">Fecha</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaArticulo->num_rows > 0) {

                        foreach ($listaArticulo as $Articulo) {

                    ?>

                            <tr>

                                

                                <td> <?php echo $Articulo['Cod_arti']        ?> </td>
                                <td> <?php echo $Articulo['Nom_art']    ?> </td>
                                <td> <?php echo $Articulo['Precio'] ?> </td>
                                <td> <?php echo $Articulo['Fecha']    ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="Cod_arti" value="<?php echo $Articulo['Cod_arti'];  ?>">
                                    <input type="hidden" name="Nom_art" value="<?php echo $Articulo['Nom_art'];  ?>">
                                    <input type="hidden" name="Precio" value="<?php echo $Articulo['Precio'];  ?>">
                                    <input type="hidden" name="Fecha" value="<?php echo $Articulo['Fecha'];  ?>">
                                    

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