<header>
    <h1>Inicio</h1>
    <div>
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='webroot/media/imagen_perfil.png' alt='imagen_perfil'/>" ; ?>
        <form name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button class="logout" type="submit" name='detalle'>Detalle</button>
            <button class="logout" type="submit" name='cerrarSesion'><?php echo $aLang[$_COOKIE['idioma']]['logoff']; ?></button>
        </form>
    </div>

</header>
<main>
    <article>
        <h2><?php echo $aLang[$_COOKIE['idioma']]['welcome'] ?> </h2>
        <h3><?php echo ($numConexiones > 1) ? "Te has conectado " . $numConexiones . " veces.<br>La última conexión fue el " . date('d/m/Y', $ultimaConexionAnterior) . " a las " . date('H:i:s', $ultimaConexionAnterior)  : "Esta es la primera vez que te conectas." ?></h3>
        <div>
        <form name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button class="logout" type="submit" name='editar'>Editar Perfil</button>
            <button class="logout" type="submit" name='BorrarCuenta'>Borrar Cuenta</button>
            <button class="logout" type="submit" name='wip'>Mto.Departamentos</button>
        </form>
</div>
        <?php echo ($ultimaConexion != null) ? "<p>" . $aLang[$_COOKIE['idioma']]['lastConnection'] . "</p>" : null; ?>
    </article>
</main>
</body>