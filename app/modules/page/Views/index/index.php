<?php echo $this->bannerprincipal; ?>
<div class="contenido-home">
    <?php echo $this->contenido; ?>
</div>

<section id="33" class="id_33 contenedor-seccion">
    <div class="content-box container">
        <h2 class="titulo_seccion titulo_33 titulo_principal_seccion  ">Inmuebles recientes</h2>

        <div class="row  justify-content-start text-left ">
            <?php foreach ($this->inmuebles as $inmueble) { ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="design-five five-34">

                        <?php if ($inmueble->imagen && file_exists($_SERVER['DOCUMENT_ROOT'] . "/images/" . $inmueble->imagen)) { ?>

                            <div class="image">

                                <img src="/images/<?= $inmueble->imagen ?>" alt="Imagen del Inmueble <?= $inmueble->titulo ?>">
                            </div>
                        <?php } else { ?>
                            <div class="image">
                                <img src="/skins/page/images/Corte/imagenot.jpg" alt="Imagen de  <?= $inmueble->titulo?>" class="img-inmueble">
                            </div>

                        <?php } ?>
                      
                        <div class="content-titulo">
                            <h2><?= $inmueble->titulo ?></h2>
                        </div>
                        <div class="content px-2">
                            <div class="descripcion">
                                <p><?= $inmueble->descripcion ?></p>
                            </div>
                        </div>

                        <a href="/page/inventario/inmueble=" class="btn-naranja"> Ver inmueble</a>


                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<div class="row content-preguntas">

    <h3>Preguntas Frecuentes</h3>
    <div class="col-md-6 order-2 order-md-1 d-sm-flex justify-content-end">
        <img src="/skins/page/images/Corte/ImagenMujer.png" class="img-preguntas">
    </div>
    <div class="col-md-6 order-1 order-md-2 text-left">
        <ul class="preguntas mt-4">
            <?php

            foreach ($this->preguntas as $key => $pregunta) {
            ?>
                <li>
                    <div>
                        <?= $key + 1 ?>. <?= $pregunta->contenido_titulo ?>
                    </div>
                </li>
            <?php

            }
            ?>
        </ul>
        <div class="d-flex justify-content-start">
            <a href="/page/preguntasfrecuentes" class=" btn-home mt-3 mx-1">Ver todas las preguntas</a>
        </div>
    </div>
</div>