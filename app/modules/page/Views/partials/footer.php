<section id="map-section" class="map-section">
    <div id="map"></div>
</section>
<div class="footer">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-12 text-center">
                <img src="/skins/page/images/Corte/logo_top.jpg" alt="Logo" class="img-fluid mb-3">
            </div>
            <div class="col-12 mt-4">
                <ul class="list-footer">
                    <li><a href="/">HOME</a></li>
                    <li><a href="/inventario">INVENTARIO DE INMUEBLES</a></li>
                    <li><a href="/page/conozcanos">CONÓZCANOS</a></li>
                    <li><a href="/page/servicios">SERVICIOS</a></li>
                    <li><a href="/page/procesos">PROCESOS</a></li>
                    <li class="d-none"><a href="/page/">PAGOS</a></li>
                </ul>
            </div>
            <div class="col-12 mt-2">
                <div class="row text-center">
                    <div class="col-md-4 d-flex align-items-center gap-2 p-0 m-0">
                        <img src="/skins/page/images/Corte/CelFooter.png" alt="Cel" class="img-fluid">
                        <span class=""> <?= $this->infopage->info_pagina_telefono?></span>
                    </div>
                    <div class="col-md-4 d-flex  align-items-center gap-2 p-0 m-0">
                        <img src="/skins/page/images/Corte/MailFooter.png" alt="Mail" class="img-fluid">
                        <span class=""> <?= $this->infopage->info_pagina_correos_contacto?></span>
                    </div>
                    <div class="col-md-4 d-flex  align-items-center gap-2 p-0 m-0">
                        <img src="/skins/page/images/Corte/UbicacionFooter.png" alt="Ubicacion" class="img-fluid">
                        <span class=""> <?= $this->infopage->info_pagina_direccion_contacto?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="social-section">
                <span>Síguenos en:</span>
                <div class="social-icons">
                    <?php if ($this->infopage->info_pagina_facebook) { ?>
                        <a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php } ?>
                    <?php if ($this->infopage->info_pagina_twitter) { ?>
                        <a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php } ?>
                    <?php if ($this->infopage->info_pagina_instagram) { ?>
                        <a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank" class="red">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php } ?>
                    <?php if ($this->infopage->info_pagina_pinterest) { ?>
                        <a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank" class="red">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    <?php } ?>
                    <?php if ($this->infopage->info_pagina_youtube) { ?>
                        <a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank" class="red">
                            <i class="fab fa-youtube"></i>
                        </a>
                    <?php } ?>
                    <?php if ($this->infopage->info_pagina_linkedin) { ?>
                        <a href="<?php echo $this->infopage->info_pagina_linkdn ?>" target="_blank" class="red">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    <?php } ?>
                    <?php if ($this->infopage->info_pagina_google) { ?>
                        <a href="<?php echo $this->infopage->info_pagina_google ?>" target="_blank" class="red">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    <?php } ?>
                    <?php if ($this->infopage->info_pagina_flickr) { ?>
                        <a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank" class="red">
                            <i class="fab fa-flickr"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-footer">
    <div class="footer-bottom">
        <div class="container">
            <p class="mb-0">Todos los derechos reservados</p>
        </div>
    </div>
</div>