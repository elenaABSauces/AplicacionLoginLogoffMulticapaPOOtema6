<header>
    <h1>Inicio</h1>
    <div class="buttons-header-inicio">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='webroot/media/imagen_perfil.png' alt='imagen_perfil'/>" ; ?>
        <form name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button class="logout" type="submit" name='cerrarSesion'><?php echo $aLang[$_COOKIE['idioma']]['logoff']; ?></button>
        </form>
    </div>

</header>
<main class="main-container-inicio" class="flex-container-align-item-center">
    <article>
        <h2 class="bienvenida"><?php echo $aLang[$_COOKIE['idioma']]['welcome'] ?> </h2>
        <p><?php echo ($numConexiones > 1) ? $aLang[$_COOKIE['idioma']]['numConnections'] : $aLang[$_COOKIE['idioma']]['numConnectionsWelcome']; ?></p>
        <?php echo ($ultimaConexion != null) ? "<p>" . $aLang[$_COOKIE['idioma']]['lastConnection'] . "</p>" : null; ?>
    </article>
</main>
</body>