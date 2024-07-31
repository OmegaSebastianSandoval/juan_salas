<section class="section-filtros">
    <div class="container pt-2">
        <form action="/page/inventario/filtrar" method="post">
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
<div class="container mt-4">
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
                                <span class="cerrar"><a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>&dep="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->departamentoInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->ciudad != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>&ciu="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->ciudadInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->sector != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>&sec="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->sectorInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->localidad != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>&loc="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->localidadInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->tipo != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>&tipo="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->tipoInfo->nombre ?></span>
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
                                <span class="cerrar"><a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>&area="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $areaFiltro; ?> Mts2</span>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .section-filtros {
        background-color: var(--cardHeader);
        padding: 20px 0;
    }
</style>


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