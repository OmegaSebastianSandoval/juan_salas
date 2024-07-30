<?php echo $this->bannerprincipal; ?>
<div class="contenido-home">
    <?php echo $this->contenido; ?>
</div>
<!--  [0] => stdClass Object
        (
            [id] => 233
            [tipo] => 2
            [ref] => 020Apt
            [area] => 330
            [NombreVendedor] => 
            [departamento] => 6
            [ciudad] => 5
            [sector] => 47
            [localidad] => 19
            [descripcion] => Lujoso apartamento duplex  de 330Mt2 con un precio de venta de 3 mil millones de pesos,  cuenta con tres habitaciones y cuatro baÃ±os, tres de ellos completos.
Cuenta con tres salas, una de ellas en el primer piso que puede funcionar como estudio o estar de televisiÃ³n, En el segundo piso tiene una maravillosa sala con salida exclusiva a los cerros orientales y los jardines del conjunto. Se siente como una casa campestre pero con todas las comodidades y la seguridad de un apartamento. Para ello tiene mas de 30 cÃ¡maras de seguridad, 10 vigilantes por turno y cerramiento. 
AdemÃ¡s, cuenta con una amplia cocina y una espectacular sala-comedor, closet de linos,closet de vajillas y cuarto de servicio con su baÃ±o privado.
Valor de la administraciÃ³n incluye pago del predial.
            [venta] => 2147483647
            [alquiler] => 
            [administracion] => 6000000
            [descripcionE] => 
            [titulo] => Lujoso Penthouse en Rosales
            [banos] => 4
            [Alcobas] => 3
            [parqueaderos] => 2
            [direccion] => 
            [duena] => 
            [telefonod] => 
            [estrato] => 6
            [tiempoconstruido] => 
            [ndepiso] => 3
            [tipoinstalacion] => 
            [vigilancia] => 24horas
            [caracteristicasadicionales] => 
            [ocultar] => 0
        )
 -->
<section id="33" class="id_33 contenedor-seccion">
    <div class="content-box container">
        <h2 class="titulo_seccion titulo_33 titulo_principal_seccion  ">Inmuebles recientes</h2>

        <div class="row  justify-content-start text-left ">
            <?php foreach ($this->inmuebles as $inmueble) { ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="design-five five-34">

                        <div class="image">

                            <img src="/images/<?= $inmueble->imagen?>" alt="Imagen del Inmueble <?= $inmueble->titulo?>">
                        </div>
                        <div class="content px-2">
                            <div class="descripcion">
                                <p><?= $inmueble->descripcion?></p>
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