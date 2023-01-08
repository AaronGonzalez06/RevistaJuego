<div id="register" class="bloque">
                
            
                
                <h3>Unirse a la comunidad.</h3>
                <form action="register.php" method="POST">
                    <label for="nombre">Nombre (nick)</label>
                    <input type="text" name="nombre"/>
                    <?php if (isset($_SESSION['errores'])) : ?>
                    <?php echo alerta($_SESSION['errores'], 'nombre');?>
                    <?php endif;?>            
                    
                    <label for="email">Email</label>
                    <input type="email" name="email"/>
                    <?php if (isset($_SESSION['errores'])) : ?>
                    <?php echo alerta($_SESSION['errores'], 'email');?>
                    <?php endif;?>
                    
                    <label for="password">Contraseña</label>
                    <input type="password" name="password"/>
                    <?php if (isset($_SESSION['errores'])) : ?>
                    <?php echo alerta($_SESSION['errores'], 'password');?>
                    <?php endif;?>
                     
                    <label for="password2">Repetir contraseña</label>
                    <input type="password" name="password2"/>
                    <?php if (isset($_SESSION['errores'])) : ?>
                    <?php echo alerta($_SESSION['errores'], 'noigual');?>
                    <?php endif;?>
                    
                    <div class="g-recaptcha" data-sitekey="6LcME8ocAAAAAC31KLekI2i_8iijrsNlsCbVT3-E"></div>

                    <input type="submit" value="registrar"/>
                </form>
                 <?php if (isset($_SESSION['miembro'])) : ?>
                 <?php echo $_SESSION['miembro'] ;?>
                 <?php endif;?>
                <?php unset($_SESSION['errores']);?>
                <?php unset($_SESSION['miembro']);?>
            </div>