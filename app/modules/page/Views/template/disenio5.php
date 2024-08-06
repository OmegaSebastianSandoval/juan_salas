<div class="design-five five-<?php echo $contenido->contenido_id; ?>" style="<?php if ($contenido->contenido_borde == '1') {
                                                                                    echo ' border: 2px solid #13436B; border-radius:20px;  overflow: hidden; ';
                                                                                } ?> background: url(/images/<?php echo $contenido->contenido_fondo_imagen; ?>); <?php echo 'background-color: ' . $contenido->contenido_fondo_color . ' ; '; ?>">

    <?php if ($contenido->contenido_imagen && file_exists($_SERVER['DOCUMENT_ROOT'] . "/images/" . $contenido->contenido_imagen)) { ?>
        <div class="image">

            <img src="/images/<?php echo $contenido->contenido_imagen; ?>">
        </div>
    <?php } else { ?>
        <div class="image">
            <img src="/skins/page/images/Corte/imagenot.jpg" alt="Imagen de  <?= $contenido->contenido_titulo ?>" class="img-inmueble">
        </div>

    <?php } ?>

    <div class="content px-2">
        <?php if ($contenido->contenido_titulo_ver == 1) { ?>

            <h2><?php echo $contenido->contenido_titulo; ?></h2>

        <?php } ?>
        <div class="descripcion"><?php echo $contenido->contenido_descripcion; ?></div>
    </div>
    <?php if ($contenido->contenido_enlace) { ?>

        <a href="<?php echo $contenido->contenido_enlace; ?>" <?php if ($contenido->contenido_enlace_abrir == 1) { ?> target="_blank" <?php } ?> class="btn-naranja"> <?php if ($contenido->contenido_vermas) { ?><?php echo $contenido->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?></a>

    <?php } ?>

</div>