<section class="section-filtros">
    <div class="container pt-2">
        <form action="/page/inventario/filtrar">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="departamento" id="departamento">
                        <option value="" selected disabled>--Departamento--</option>
                        <?php foreach ($this->departamentos as  $departamento) { ?>
                            <option value="<?php echo $departamento->id ?>" <?php echo $this->departamento === $departamento->id ? 'selected' : '' ?>><?php echo $departamento->nombre ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="ciudad" id="ciudad">
                        <option value="" selected disabled>--Ciudad-- </option>
                        <?php foreach ($this->ciudades as  $ciudad) { ?>
                            <option value="<?php echo $ciudad->id ?>" data-departamento="<?php echo $ciudad->departamento ?>" <?php echo $this->ciudad === $ciudad->id ? 'selected' : '' ?>><?php echo $ciudad->nombre ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="sector" id="sector">
                        <option value="" selected disabled> --Sector-- </option>
                        <?php foreach ($this->sectores as $key => $sector) { ?>
                            <option value="<?php echo $sector->id ?>" data-departamento="<?php echo $sector->departamento ?>" data-ciudad="<?php echo $sector->ciudad ?>" <?php echo $this->sector === $sector->id ? 'selected' : '' ?>><?php echo $sector->nombre ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="localidad" id="localidad">
                        <option value="" selected disabled> --Localidad-- </option>
                        <?php foreach ($this->localidades as $key => $localidad) { ?>
                            <option value="<?php echo $localidad->id ?>" data-departamento="<?php echo $localidad->departamento ?>" data-ciudad="<?php echo $localidad->ciudad ?>" <?php echo $this->localidad === $localidad->id ? 'selected' : '' ?>><?php echo $localidad->nombre ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="tipo" id="tipo">
                        <option value="" selected disabled> --Tipo de inmueble-- </option>
                        <?php foreach ($this->tipos as $tipo) { ?>
                            <option value="<?php echo $tipo->id ?>" <?php echo $this->tipo === $tipo->id ? 'selected' : '' ?>><?php echo $tipo->nombre ?></option>

                        <?php } ?>
                    </select>
                </div>



                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="area" id="area">
                        <option value="" selected disabled>Área (mts&sup2;)</option>
                        <option value="all" <?php echo $this->area === "all" ? 'selected' : '' ?>></option>
                        <option value="0-50" <?php echo $this->area === "0-50" ? 'selected' : '' ?>>De 0 a 50</option>
                        <option value="50-100" <?php echo $this->area === "50-100" ? 'selected' : '' ?>>De 50 a 100</option>
                        <option value="100-150" <?php echo $this->area === "100-150" ? 'selected' : '' ?>>De 100 a 150</option>
                        <option value="150-200" <?php echo $this->area === "150-200" ? 'selected' : '' ?>>De 150 a 200</option>
                        <option value="200-300" <?php echo $this->area === "200-300" ? 'selected' : '' ?>>De 200 a 300</option>
                        <option value="300-500" <?php echo $this->area === "300-500" ? 'selected' : '' ?>>De 300 a 500</option>
                        <option value="500-1000" <?php echo $this->area === "500-1000" ? 'selected' : '' ?>>De 500 a 1000</option>
                        <option value="1000-9999" <?php echo $this->area === "1000-9999" ? 'selected' : '' ?>>Más de 1000</option>


                    </select>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4 d-flex gap-2 justify-content-center align-items-center">
                    <div class="form-check">
                        <label class="form-check-label" for="compra">
                            Compra
                        </label>
                    </div>
                    <input class="form-check-input" type="checkbox" value="1" name="compra" id="compra" <?php echo $this->compra === "1" ? 'checked' : '' ?>>

                    <div class="form-check">
                        <label class="form-check-label" for="arriendo">
                            Arriendo
                        </label>
                    </div>
                    <input class="form-check-input" type="checkbox" value="1" name="arriendo" id="arriendo" <?php echo $this->arriendo === "1" ? 'checked' : '' ?>>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4 d-flex align-items-center  ">
                    <button class=" m-0 btn-home" type="submit">BUSCAR</button>
                </div>
            </div>

        </form>
    </div>
</section>

<div class="container mt-4  pb-4">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-2">
            <div class="content-filtros-activos">
                <h2>
                    Filtros Activos
                </h2>
                <hr>
                <div>
                    <div class="filtros-activos">
                        <?php if ($this->departamento != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&departamento="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->departamentoInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->ciudad != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&ciudad="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->ciudadInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->sector != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&sector="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->sectorInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->localidad != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&localidad="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->localidadInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->tipo != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&tipo="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->tipoInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->area != '') { ?>
                            <?php
                            $areaFiltro = $this->area;
                            if ($this->area == "1000-9999") {
                                $areaFiltro = "1000+";
                            }
                            ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&area="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $areaFiltro; ?> Mts2</span>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            </div>

            <div class="content-filtros-disponibles">
                <h2>
                    Filtros Disponibles
                </h2>

                <div class="content-filtros-activo-ind">
                    <h3>Precio de Arriendo (Millones)</h3>
                    <div class="lista_disponibles">
                        <ul>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PA=0-5" class="enlace <?= $this->PA == '0-5' ? 'active' : '' ?>">De 0 a 5</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PA=5-10" class="enlace <?= $this->PA == '5-10' ? 'active' : '' ?>">De 5 a 10</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PA=10-20" class="enlace <?= $this->PA == '10-20' ? 'active' : '' ?>">De 10 a 20</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PA=20-50" class="enlace <?= $this->PA == '20-50' ? 'active' : '' ?>">De 20 a 50</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PA=50-1000" class="enlace <?= $this->PA == '50-1000' ? 'active' : '' ?>">Más de 50</a></li>
                        </ul>
                    </div>
                </div>

                <div class="content-filtros-activo-ind">
                    <h3>Precio de Venta <br>(Millones)</h3>
                    <div class="lista_disponibles">
                        <ul>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PV=0-50" class="enlace <?= $this->PV == '0-50' ? 'active' : '' ?> ">De 0 a 50</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PV=50-100" class="enlace <?= $this->PV == '50-100' ? 'active' : '' ?> ">De 50 a 100</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PV=100-150" class="enlace <?= $this->PV == '100-150' ? 'active' : '' ?> ">De 100 a 150</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PV=150-200" class="enlace <?= $this->PV == '150-200' ? 'active' : '' ?> ">De 150 a 200</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PV=200-300" class="enlace <?= $this->PV == '200-300' ? 'active' : '' ?> ">De 200 a 300</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PV=300-500" class="enlace <?= $this->PV == '300-500' ? 'active' : '' ?> ">De 300 a 500</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PV=500-1000" class="enlace <?= $this->PV == '500-1000' ? 'active' : '' ?> ">De 500 a 1000</a></li>
                            <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PV=1000-10000" class="enlace <?= $this->PV == '1000-10000' ? 'active' : '' ?> ">Más de 1000</a></li>
                        </ul>
                    </div>
                </div>

                <div class="content-filtros-activo-ind">
                    <h3>Habitaciones</h3>
                    <div class="lista_disponibles">
                        <ul>
                            <?php for ($j = 1; $j <= 10; $j++) { ?>
                                <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&hab=<?php echo $j; ?>" class="enlace"><?php echo $j; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-12 col-md-9 col-lg-10 content-resultados">


            <?php if ($this->register_number >= 1) { ?>
                <h4>Se encontraron <?php echo $this->register_number ?> inmuebles que coinciden con la búsqueda</h4>


                <div class="filtros-orden">

                    <span>Ordenar por:</span>

                    <select name="orden" id="orden" class="form-select form-control">
                        <option value="1" <?= $this->orden == 1 ? ' selected' : '' ?>>Número de habitaciones</option>
                        <option value="2" <?= $this->orden == 2 ? ' selected' : '' ?>>Precio de Arriendo</option>
                        <option value="3" <?= $this->orden == 3 ? ' selected' : '' ?>>Precio de Venta</option>
                        <option value="4" <?= $this->orden == 4 ? ' selected' : '' ?>>Área</option>
                    </select>

                    <select name="orden2" id="orden2" size="1" class="form-select form-control">
                        <option value="1" <?= $this->orden2 == 1 ? ' selected' : '' ?>>Menor/Mayor</option>
                        <option value="2" <?= $this->orden2 == 2 ? ' selected' : '' ?>>Mayor/Menor</option>
                    </select>
                    <button name="ordenar" type="button" class="btn-home" id="ordenar">
                        Ordenar
                    </button>
                </div>

                <div class="resultados-inmuebles">
                    <?php foreach ($this->inmueblesList as $inmueble) { ?>
                        <div class="inmueble shadow-sm rounded">
                            <div class="row">
                                <div class="col-12 col-md-5 d-grid align-items-center">
                                    <img src="/images/<?= $inmueble->imagen ?>" alt="Imagen de  <?= $inmueble->titulo ?>" class="img-inmueble">
                                </div>
                                <div class="col-12 col-md-7">
                                    <h5><?= $inmueble->titulo ?></h5>
                                    <hr>

                                    <div class="row">
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Tipo de inmueble:</span>
                                            <span class="inmueble-subtitulo"><?= $inmueble->tipo1 ?></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Habitaciones:</span>
                                            <span class="inmueble-subtitulo"><?= number_format($inmueble->Alcobas) ?></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Área:</span>
                                            <span class="inmueble-subtitulo"><?= $inmueble->area ?> mt<sup>2</sup></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Ciudad:
                                            </span>
                                            <span class="inmueble-subtitulo"><?= $inmueble->ciudad1 ?></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Baños: </span>
                                            <span class="inmueble-subtitulo"><?= $inmueble->banos ?></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Administración: </span>
                                            <span class="inmueble-subtitulo">$<?= $inmueble->administracion >= 1 ? number_format($inmueble->administracion) : 0 ?></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Alquiler:
                                            </span>
                                            <span class="inmueble-subtitulo">$<?= $inmueble->alquiler >= 1 ? number_format($inmueble->alquiler) : 0 ?></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Venta:
                                            </span>
                                            <span class="inmueble-subtitulo">$<?= $inmueble->venta >= 1 ? number_format($inmueble->venta) : 0 ?></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Departamento:
                                            </span>
                                            <span class="inmueble-subtitulo"><?= $inmueble->departamento1 ?></span>

                                        </div>
                                        <div class="col-12 col-md-6 contenedor-span">
                                            <span class="inmueble-titulo">Sector:
                                            </span>
                                            <span class="inmueble-subtitulo"><?= $inmueble->sector1 ?></span>

                                        </div>
                                        <a href="/page/inventario/inmueble?id=<?= $inmueble->id ?>" class="learn-more">
                                            <span class="circle" aria-hidden="true">
                                                <span class="icon arrow"></span>
                                            </span>
                                            <span class="button-text">Ver más</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>

                    <div class=" pagination mt-3 mb-5 justify-content-center">
                        <?php
                        $url = $_SERVER['REQUEST_URI'];
                        $min = $this->page - 10;
                        if ($min < 0) {
                            $min = 1;
                        }
                        $max = $this->page + 10;
                        if ($this->totalpages > 1) {
                            if ($this->page != 1)
                                echo '<li class="page-item"><a class="page-link text-pagination" href="' . $url . '&page=' . ($this->page - 1) . '"> &laquo; Anterior </a></li>';
                            for ($i = 1; $i <= $this->totalpages; $i++) {
                                if ($this->page == $i) {
                                    echo '<li class="page-item  fondo-pagination active"><a class="page-link  text-pagination">' . $this->page . '</a></li>';
                                } else {
                                    if ($i <= $max and $i >= $min) {
                                        echo '<li class="page-item fondo-pagination"><a class="page-link text-pagination" href="' . $url . '&page=' . $i . '">' . $i . '</a></li>  ';
                                    }
                                }
                            }
                            if ($this->page != $this->totalpages)
                                echo '<li class="page-item"><a class="page-link text-pagination" href="' . $url . '&page=' . ($this->page + 1) . '">Siguiente &raquo;</a></li>';
                        }
                        ?>
                    </div>
                </div>
            <?php } else { ?>
                <h4>Sin resultados para la búsqueda</h4>
            <?php } ?>
        </div>


    </div>
</div>

<style>
    .section-filtros {
        background-color: var(--cardHeader);
        padding: 20px 0;
    }
</style>

<script type="text/javascript">
    document.getElementById('ordenar').addEventListener('click', function() {
        const orden = document.getElementById('orden').value;
        const orden2 = document.getElementById('orden2').value;
        const baseUrl = '<?php echo $_SERVER['REQUEST_URI']; ?>';

        window.location = `${baseUrl}&orden=${orden}&orden2=${orden2}`;
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const departamentoSelect = document.getElementById('departamento');
        const ciudadSelect = document.getElementById('ciudad');
        const sectorSelect = document.getElementById('sector');
        const localidadSelect = document.getElementById('localidad');
        const ciudadOptions = Array.from(ciudadSelect.options);
        const sectorOptions = Array.from(sectorSelect.options);
        const localidadOptions = Array.from(localidadSelect.options);

        // Ocultar todas las opciones de ciudades, sectores y localidades al cargar la página
        ciudadOptions.forEach(option => {
            if (option.value) option.style.display = 'none';
        });
        sectorOptions.forEach(option => {
            if (option.value) option.style.display = 'none';
        });
        localidadOptions.forEach(option => {
            if (option.value) option.style.display = 'none';
        });

        departamentoSelect.addEventListener('change', () => {
            const selectedDepartamento = departamentoSelect.value;

            // Ocultar todas las opciones de ciudades, sectores y localidades
            ciudadOptions.forEach(option => {
                if (option.value) option.style.display = 'none';
            });
            sectorOptions.forEach(option => {
                if (option.value) option.style.display = 'none';
            });
            localidadOptions.forEach(option => {
                if (option.value) option.style.display = 'none';
            });

            // Mostrar solo las opciones de ciudades que corresponden al departamento seleccionado
            ciudadOptions.forEach(option => {
                if (option.dataset.departamento === selectedDepartamento) {
                    option.style.display = 'block';
                }
            });

            // Resetear los selects de ciudades, sectores y localidades
            ciudadSelect.value = "";
            sectorSelect.value = "";
            localidadSelect.value = "";
        });

        ciudadSelect.addEventListener('change', () => {
            const selectedCiudad = ciudadSelect.value;

            // Ocultar todas las opciones de sectores y localidades
            sectorOptions.forEach(option => {
                if (option.value) option.style.display = 'none';
            });
            localidadOptions.forEach(option => {
                if (option.value) option.style.display = 'none';
            });

            // Mostrar solo las opciones de sectores que corresponden a la ciudad seleccionada
            sectorOptions.forEach(option => {
                if (option.dataset.ciudad === selectedCiudad && option.dataset.departamento === departamentoSelect.value) {
                    option.style.display = 'block';
                }
            });

            // Mostrar solo las opciones de localidades que corresponden a la ciudad seleccionada
            localidadOptions.forEach(option => {
                if (option.dataset.ciudad === selectedCiudad && option.dataset.departamento === departamentoSelect.value) {
                    option.style.display = 'block';
                }
            });

            // Resetear los selects de sectores y localidades
            sectorSelect.value = "";
            localidadSelect.value = "";
        });


    });
</script>