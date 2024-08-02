<!-- stdClass Object
(
    [id] => 229
    [tipo] => 5
    [ref] => abierta
    [area] => 94,64
    [NombreVendedor] => 
    [departamento] => 6
    [ciudad] => 5
    [sector] => 73
    [localidad] => 14
    [descripcion] => Excelentes oficinas en muy buen estado de conservaciÃ³n, con cocina integral, piso en porcelanato, buena ubicacion en sector exclusivo de la ciudada, vÃ­as de acceso y de servicio pÃºblico cerca al edificio, zona de amplio comercio y centros comerciales.
    [venta] => 1350000000
    [alquiler] => 3756181
    [administracion] => 1543819
    [descripcionE] => 
    [titulo] => Oficina Arriendo y venta
    [banos] => 1
    [Alcobas] => 
    [parqueaderos] => 2
    [direccion] => 
    [duena] => 
    [telefonod] => 
    [estrato] => 6
    [tiempoconstruido] => 25
    [ndepiso] => 7
    [tipoinstalacion] => 
    [vigilancia] => 24 horas 
    [caracteristicasadicionales] => salones de reuniones disponibles
    [ocultar] => 0
    [departamento1] => Cundinamarca
    [ciudad1] => Bogotá
    [sector1] => Chico Norte
    [localidad1] => Usaquén
    [tipo1] => Oficina
)




   -->
<?php print_r($this->inmueble) ?>
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
                            <div class="d-flex gap-4 align-items-center posit">
                                <div>
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <div>
                                    <span class="d-block">
                                        Tipo de inmueble
                                    </span>
                                    <span class="d-block">

                                        <?php echo $this->inmueble->tipo1 ?>

                                    </span>

                                </div>
                            </div>


                        </div>
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center posit">
                                <div>
                                    <i class="fa-solid fa-asterisk"></i>
                                </div>
                                <div>
                                    <span class="d-block">
                                        Código
                                    </span>
                                    <span class="d-block">

                                        <?php echo $this->inmueble->ref ?>

                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center posit">
                                <div>
                                    <i class="fa-solid fa-asterisk"></i>
                                </div>
                                <div>
                                    <span class="d-block">
                                        Administración
                                    </span>
                                    <span class="d-block">

                                        <?php echo $this->inmueble->administracion ?>

                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center posit">
                                <div>
                                    <i class="fa-solid fa-asterisk"></i>
                                </div>
                                <div>
                                    <span class="d-block">
                                        Estrato
                                    </span>
                                    <span class="d-block">

                                        <?php echo $this->inmueble->estrato ?>

                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center posit">
                                <div>
                                    <i class="fa-solid fa-asterisk"></i>
                                </div>
                                <div>
                                    <span class="d-block">
                                        Tiempo de construido
                                    </span>
                                    <span class="d-block">

                                        <?php echo $this->inmueble->tiempoconstruido ?>

                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center posit">
                                <div>
                                    <i class="fa-solid fa-asterisk"></i>
                                </div>
                                <div>
                                    <span class="d-block">
                                        Sector
                                    </span>
                                    <span class="d-block">

                                        <?php echo $this->inmueble->sector1 ?>

                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex gap-4 align-items-center posit">
                                <div>
                                    <i class="fa-solid fa-asterisk"></i>
                                </div>
                                <div>
                                    <span class="d-block">
                                        Localidad
                                    </span>
                                    <span class="d-block">

                                        <?php echo $this->inmueble->localidad1 ?>

                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-6"></div>
    </div>

</div>


<style>
    .header-title {
        grid-area: title;

        font-style: normal;
        font-weight: bold;

        color: rgb(37, 33, 41);
        margin-bottom: 4px;
        font-size: 36px;
        line-height: 48px;
        margin-bottom: 8px;
    }

    .header-title span {
        display: block;

        color: rgb(120, 116, 123);
        font-size: 24px;
        line-height: 32px;
    }

    .title-location {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .title-location h2 {
        font-size: 14px;
        line-height: 24px;
        color: rgb(67, 62, 71);
        font-weight: normal;
        margin: 0;
    }

    .title-location h2 span {
        display: inline;
        margin-left: 4px;
        font-weight: 700;
    }

    .header-price .current-price {
        font-size: 36px;
        line-height: 48px;
    }

    .header-price .current-price {
        display: block;
        color: rgb(99, 1, 204);
        border-radius: 4px;
        font-style: normal;
        font-weight: 700;
        font-size: 36px;
        line-height: 48px;
        margin-bottom: 15px;
    }

    .header-price .current-price span {
        font-size: 16px;
        display: block;
        font-family: Montserrat;
        font-size: 14px;
        line-height: 24px;
        color: rgb(120, 116, 123);
        font-weight: 500;
    }

    .contenedor-descripcion {
        margin-bottom: 20px;
    }

    .contenedor-descripcion h3 {
        color: #FFF;
        font-size: 19px;
        margin: 0;
        padding: 15px 10px;
        background-color: var(--cardHeader);
    }

    .contenedor-descripcion .descripcion {
        margin-top: 10px;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 150%;
        text-align: justify;
    }

    .title-section {
        margin-bottom: 38px;
        font-family: "Open Sans";
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        border-bottom: 1px solid rgb(209, 209, 209);
        line-height: 36px;

    }
</style>