<?php if (isset($_SESSION['usuario'])): ?>
    <div id="usuario-logeado" class="bloque">
        <strong>bienvenido al blog <?= $_SESSION['usuario']['nombre']?> </strong>
        <a href="entradas.php" class="boton boton-verde">Crear entradas.</a>
        <?php if($_SESSION['usuario']['nombre'] == 'aaron') : ?>
        <a href="categoria.php" class="boton boton-verde">ADMIN.</a>
        <?php endif;?>
        <a href="datos.php" class="boton boton-naranja">Mis datos.</a>
        <a href="cerrar.php" class="boton">Cerrar sesión.</a>
    </div>
    <?php endif;?>


            <?php if (!isset($_SESSION['usuario'])): ?>
                <h3>inicio sesión.</h3>
            <div id="login" class="bloque">
            <div class="info_sesion">
                <p>Para iniciar sesion debes de estar registrado.</p>
                <h5>Registrate!</h5>
                </div>
      

                <form action="login.php" method="POST">
                    <label for="email">Email</label>
                    <input class="input_sesion" type="email" name="email"/>

                    <label for="password">Contraseña</label>
                    <input  class="input_sesion" id="contrasena" type="password" name="password"/>
                    <spam id="mostrar">mostrar contraseña</spam>
                    <input type="submit" value="Entrar"/>
                    <?php if (isset($_SESSION['error_login'])) : ?>
                    <?php echo $_SESSION['error_login'];?>
                    <?php endif;?>
                </form>
            

            </div>
            
            <?php endif;?>