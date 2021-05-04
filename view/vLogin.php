<header>
    <h1>LoginLogoff POOMulticapa</h1>
</header>
<main>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
                <div>   
                    <label>Usuario</label>	
                    <input type="text" name="CodUsuario" value="<?php if($aErrores['CodUsuario'] == NULL && isset($_REQUEST['CodUsuario'])){ echo $_REQUEST['CodUsuario'];}?>">
                </div>    
                <br><br>
                <div class="input-container">
                         <label>Password</label>
                            <input type = "Password"  name = "Password" value="<?php if($aErrores['Password'] == NULL && isset($_REQUEST['Password'])){ echo $_REQUEST['Password'];}?>">
                </div> 
                <br><br>
                <input type="submit" value="INICIAR SESION" name="IniciarSesion" class="enviar"> <br><br>
                <input type="submit" value="REGISTRATE" name="registrarse" class="registro">
                    
            </form>
</main>     