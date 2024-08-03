<script src="/components/fancybox/umd.js"></script>

<div class="container contenedor-inmueble pt-3 pb-4">
    <div class="row">
        <div class="col-12 col-md-6">
            <?php
            if ($this->inmueble->venta > 1 && $this->inmueble->alquiler > 1) {
                $estado = "Venta o alquiler";
            } elseif ($this->inmueble->venta > 1) {
                $estado = "Venta";
            } elseif ($this->inmueble->alquiler > 1) {
                $estado = "Alquiler";
            } else {
                $estado = "El inmueble no está disponible ni para venta ni para alquiler.";
            }
            ?>
            <h1 class="header-title">
                <span><?= $estado ?> de <?= ($this->inmueble->tipo1) ?> en <?= ($this->inmueble->ciudad1) ?></span>
                <?= ($this->inmueble->titulo) ?>
            </h1>

            <div class="title-location">
                <i class="fa-solid fa-location-dot"></i>
                <h2>Carrera 55a # 26b-26
                    <span>
                        <?php if ($this->inmueble->localidad1) { ?>
                            / <?= ($this->inmueble->localidad1) ?>
                        <?php } ?>
                        <?php if ($this->inmueble->sector1) { ?>
                            / <?= ($this->inmueble->sector1) ?>
                        <?php } ?>
                    </span>
                </h2>
            </div>

            <div class="header-price">
                <?php if ($this->inmueble->venta > 1) { ?>
                    <p class="current-price"><span>Precio venta (COP)</span> $&nbsp;<?php echo number_format($this->inmueble->venta) ?></p>
                <?php } ?>

                <?php if ($this->inmueble->alquiler > 1) { ?>
                    <p class="current-price"><span>Precio alquiler (COP)</span> $&nbsp;<?php echo number_format($this->inmueble->alquiler) ?>
                    </p>
                <?php } ?>


            </div>
            <?php if ($this->inmueble->descripcion) { ?>
                <div class="contenedor-descripcion">
                    <h3>Descripción general</h3>
                    <div class="descripcion">
                        <?php echo $this->inmueble->descripcion ?>
                    </div>
                </div>
            <?php } ?>


            <div class="contenedor-descripcion">
                <h3>Detalles del inmueble</h3>
                <div class="descripcion">
                    <h4 class="title-section">Acerca del inmueble</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center cont-info">
                                <div>
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <div>
                                    <span class="d-block titulo-detalle">
                                        Tipo de inmueble
                                    </span>
                                    <span class="d-block sub-detalle">

                                        <?php echo $this->inmueble->tipo1 ?>

                                    </span>

                                </div>
                            </div>


                        </div>
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center cont-info">
                                <div>
                                    <i class="fa-solid fa-asterisk"></i>
                                </div>
                                <div>
                                    <span class="d-block titulo-detalle">
                                        Código
                                    </span>
                                    <span class="d-block sub-detalle">

                                        <?php echo $this->inmueble->ref ?>

                                    </span>

                                </div>
                            </div>
                        </div>
                        <?php if ($this->inmueble->departamento1) { ?>
                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Departamento
                                        </span>
                                        <span class="d-block sub-detalle">
                                            <?php echo $this->inmueble->departamento1 ?>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($this->inmueble->administracion) { ?>

                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-tag"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Administración
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->administracion ?>

                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($this->inmueble->estrato) { ?>

                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-arrow-up-9-1"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Estrato
                                        </span>
                                        <span class="d-block sub-detalle">
                                            <?php echo $this->inmueble->estrato ?>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($this->inmueble->tiempoconstruido) { ?>

                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-regular fa-calendar"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Tiempo de construido
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->tiempoconstruido . " años" ?>

                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($this->inmueble->sector1) { ?>

                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-location-crosshairs"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Sector
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->sector1 ?>

                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($this->inmueble->localidad1) { ?>
                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Localidad
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->localidad1 ?>

                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center cont-info">
                                <div>
                                    <i class="fa-solid fa-trowel-bricks"></i>
                                </div>
                                <div>
                                    <span class="d-block titulo-detalle">
                                        Número de pisos
                                    </span>
                                    <span class="d-block sub-detalle">

                                        <?php echo $this->inmueble->ndepiso ?>

                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descripcion">
                    <h4 class="title-section">Distribución del inmueble</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center cont-info">
                                <div>
                                    <i class="fa-solid fa-chart-area"></i>
                                </div>
                                <div>
                                    <span class="d-block titulo-detalle">
                                        Área
                                    </span>
                                    <span class="d-block sub-detalle">

                                        <?php echo $this->inmueble->area ?> m<sup>2</sup>

                                    </span>

                                </div>
                            </div>


                        </div>
                        <?php if ($this->inmueble->Alcobas) { ?>
                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-bed"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Habitaciones
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->Alcobas ?>

                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($this->inmueble->banos) { ?>

                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-bath"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Baños
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->banos ?>

                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($this->inmueble->parqueaderos) { ?>

                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-car"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Parqueadero
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->parqueaderos ?>

                                        </span>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <?php if ($this->inmueble->vigilancia) { ?>
                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-user-shield"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Vigilancia
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->vigilancia ?>

                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($this->inmueble->tipoinstalacion) { ?>

                            <div class="col-6">
                                <div class="d-flex gap-4 align-items-center cont-info">
                                    <div>
                                        <i class="fa-solid fa-fire-flame-simple"></i>
                                    </div>
                                    <div>
                                        <span class="d-block titulo-detalle">
                                            Tipo de instalación
                                        </span>
                                        <span class="d-block sub-detalle">

                                            <?php echo $this->inmueble->tipoinstalacion ?>

                                        </span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>
            </div>
            <?php if ($this->inmueble->caracteristicasadicionales) { ?>
                <div class="contenedor-descripcion">
                    <h3>Otras características</h3>
                    <div class="descripcion">
                        <?php echo $this->inmueble->caracteristicasadicionales ?>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="col-12 col-md-6">

            <div class="contenedorfotos" id="contenedorfotos">
                <div>
                    <div class="f-carousel" id="myCarousel">
                        <?php if (is_countable($this->fotos) && count($this->fotos) >= 1) { ?>

                            <?php foreach ($this->fotos as $foto) { ?>
                                <div class="f-carousel__slide" data-fancybox="gallery" data-src="/images/<?= $foto->foto ?>" data-thumb-src="/images/<?= $foto->foto ?>">


                                    <img width="640" height="480" alt="" data-lazy-src="/images/<?= $foto->foto ?>" />
                                </div>


                            <?php } ?>

                    </div>
                <?php } else { ?>
                    <img src="/skins/page/images/Corte/imagenot.jpg" alt="Imagen de  <?= $inmueble->titulo ?>" class="img-inmueble">

                <?php } ?>


                </div>


            </div>
            <hr>
            <div class="contenedor-descripcion">
                <h3>Contactar al vendedor</h3>
            </div>

            <div class="cont-form-inmueble">

                <form action="/page/inventario/envarmensaje" class="formulario-inmueble" id="formulario-inmueble">
                    <div class="row">

                        <input type="hidden" name="ref" value="<?= $this->inmueble->ref ?>">

                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <input name="hash" type="hidden" value="<?php echo md5(date("Y-m-d")); ?>" />
                        <input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
                        <input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">

                        <div class="mb-3 col-12 col-md-6">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" minlength="4" maxlength="50" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" minlength="4" maxlength="30" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="phone" name="phone" required>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Comentario</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <div class="d-none">
                        <label for="subjet">Leave</label>
                        <input type="text" id="subjet" name="subjet">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" required value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault" data-bs-toggle="modal" data-bs-target="#modalPoliticas" role="button">
                            Aceptar términos y condiciones
                        </label>
                        <!-- Modal -->
                        <div class="modal fade" id="modalPoliticas" tabindex="-1" aria-labelledby="modalPoliticasLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalPoliticasLabel"><?php echo $this->infopage->info_pagina_titulo_legal ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $this->infopage->info_pagina_descripcion_legal ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary d-none">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <input name="hash" type="hidden" value="<?php echo md5(date("Y-m-d")); ?>" />
                    <input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
                    <input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">


                    <div class="d-grid d-md-flex justify-content-center justify-content-md-between">
                        <div class="g-recaptcha" data-sitekey="6LfFDZskAAAAAE2HmM7Z16hOOToYIWZC_31E61Sr"></div>

                    </div>
                    <button type="submit" id="submit-btn" class="btn-home mt-3">Enviar</button>
                </form>
            </div>

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<style>
    .main-general {
        z-index: unset;
    }

    .contenedorfotos {
        opacity: 0;
        transition: opacity 3s ease-in-out;
    }

    .contenedorfotos.fadein {
        opacity: 1;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const contenedorfotos = document.getElementById('contenedorfotos');
        contenedorfotos.classList.add('fadein');
    });

    // Configurar Fancybox
    Fancybox.bind("[data-fancybox]", {
        initialSize: "fit",

    });
    new Carousel(
        document.getElementById("myCarousel"), {
            // Your custom options
            Dots: false,
        }, {
            Thumbs,
        }
    );
</script>