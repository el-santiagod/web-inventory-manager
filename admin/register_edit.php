<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Contenedor Inicio -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <!-- Titulo -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Usuario </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['edit_btn']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM register WHERE id='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="code.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                                <div class="form-group">
                                    <label> Usuario </label>
                                    <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control"placeholder="Ingresar Usuario" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Ingresar Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Ingresar Contraseña" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>TipoUser</label>
                                    <select name="edit_usertype" class="form-control" required>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Costurero">Costurero</option>
                                    </select>
                                </div>



                                <a href="register.php" class="btn btn-danger"> Cancelar </a>
                                <button type="submit" name="updatebtn" class="btn btn-primary"> Actualizar </button>
                            </form>
                            <?php
                    }
                }
            ?>


            </div>
                </div>
            </div>

            </div>
<!-- Contenedor Fin -->



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>