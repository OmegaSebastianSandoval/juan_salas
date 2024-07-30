<?php if(is_countable($this->banners) AND count($this->banners)>0){ ?>
 
    <div class="slider-principal mb-4">
        <div id="carouselprincipal<?php echo $this->seccionbanner; ?>" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators align-items-center">
                <?php foreach ($this->banners as $key => $banner) { ?>
                    <li data-bs-target="#carouselprincipal<?php echo $this->seccionbanner; ?>" data-bs-slide-to="<?php echo $key ?>" <?php if ($key == 0) { ?>class="active"<?php } ?>>
                        <div class="circulo"></div>
                    </li>
                <?php } ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($this->banners as $key => $banner) { ?>
                    <div class="carousel-item <?php if ($key == 0) { ?>active<?php } ?>">
                        <?php if ($this->id_youtube($banner->publicidad_video) != false) { ?>
                            <div class="fondo-video-youtube">
                                <div class="banner-video-youtube" id="videobanner<?php echo $banner->publicidad_id; ?> " data-video="<?php echo $this->id_youtube($banner->publicidad_video); ?>"></div>
                            </div>
                        <?php } else { ?>
                            <div class="fondo-imagen d-none d-md-block" onclick="('#enlace<?php echo $key ?>').click();" style="background:url(/images/<?php echo $banner->publicidad_imagen; ?>);"></div>
                            <div class="fondo-imagen d-sm-block d-md-none" onclick="('#enlace<?php echo $key ?>').click();" style="background:url(/images/<?php echo $banner->publicidad_imagenresponsive; ?>);"></div>
                        <?php } ?>
                        <div class="carousel-caption d-flex h-100 <?php echo $banner->publicidad_posicion; ?>" style="background-color:<?php echo $banner->publicidad_color_fondo; ?>;">
                            <div class="container texto-banner" style="padding-top:7rem;" onclick="document.getElementById('enlace<?php echo $key ?>').click();">
                                <div class="col-6 descripcion-banner">
                                    <?php if ($banner->publicidad_nombre_ver == 1) { ?>
                                        <div class="titulo-banner text-left">
                                            <h1><?php echo $banner->publicidad_nombre; ?></h1>
                                        </div>
                                    <?php } ?>
                                    <?php echo $banner->publicidad_descripcion; ?>
                                    <?php if ($banner->publicidad_enlace) { ?>
                                        <a class="btn btn-vermas" id='enlace<?php echo $key ?>' href="<?php echo $banner->publicidad_enlace; ?>" <?php if ($banner->publicidad_tipo_enlace == 1) { ?> target="_blank" <?php } ?> <?php if ($banner->publicidad_texto_enlace == null) { ?> style="opacity:0" <?php } ?>>
                                            <?php if ($banner->publicidad_texto_enlace) { ?>
                                                <?php echo $banner->publicidad_texto_enlace; ?>
                                            <?php } else { ?>

                                            <?php } ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselprincipal<?php echo $this->seccionbanner; ?>" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselprincipal<?php echo $this->seccionbanner; ?>" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>


 <?php } ?>

<?php foreach ($this->banners as $key => $banner){ ?>
    <?php if($banner->publicidad_enlace){ ?>
        <a class="btn btn-lg btn-success d-none" id='enlace<?php echo $key?>' href="<?php echo $banner->publicidad_enlace; ?>" <?php if($banner->publicidad_tipo_enlace == 1){ ?> target="_blank" <?php } ?>>
            <?php if($banner->publicidad_enlace_vermas){ ?>
                <?php echo $banner->publicidad_enlace_vermas; ?>
            <?php } else { ?>
                Ver Más
            <?php } ?>
        </a>
        <?php } ?>             
 <?php } ?>
