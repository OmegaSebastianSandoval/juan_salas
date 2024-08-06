<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>" data-bs-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />
			<?php } ?>
			<div class="row">
				<div class="col-4 form-group">
					<label for="titulo" class="control-label">t&iacute;tulo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->titulo; ?>" name="titulo" id="titulo" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-4 form-group">
					<label class="control-label">tipo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="tipo" required>
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_tipo as $key => $value) { ?>
								<option <?php if ($this->getObjectVariable($this->content, "tipo") == $key) {
											echo "selected";
										} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">

					<div class="tooltip1">
						<div class="tooltiptext">Esta referencia ya se encuentra registrada</div>
					</div>
					<label for="ref" class="control-label">ref</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->ref; ?>" name="ref" id="ref" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="area" class="control-label">&aacute;rea en m <sup>2</sup></label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="number" step="any"  value="<?= $this->content->area; ?>" name="area" id="area" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-4 form-group">
					<label class="control-label">departamento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="departamento" required>
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_departamento as $key => $value) { ?>
								<option <?php if ($this->getObjectVariable($this->content, "departamento") == $key) {
											echo "selected";
										} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label class="control-label">ciudad</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="ciudad" required>
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_ciudad as $key => $value) { ?>
								<option <?php if ($this->getObjectVariable($this->content, "ciudad") == $key) {
											echo "selected";
										} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label class="control-label">sector</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="sector" >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_sector as $key => $value) { ?>
								<option <?php if ($this->getObjectVariable($this->content, "sector") == $key) {
											echo "selected";
										} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label class="control-label">localidad</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="localidad">
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_localidad as $key => $value) { ?>
								<option <?php if ($this->getObjectVariable($this->content, "localidad") == $key) {
											echo "selected";
										} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="descripcion" class="form-label">descripci&oacute;n</label>
					<textarea name="descripcion" id="descripcion" class="form-control tinyeditor" rows="10"><?= $this->content->descripcion; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="venta" class="control-label">Precio venta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono"><i class="fa-solid fa-dollar-sign"></i></span>
						</div>
						<input type="text" value="<?= $this->content->venta; ?>" name="venta2" id="venta2" class="form-control" onkeyup="convertir('venta2','venta');" onchange="convertir('venta2','venta');">
						<input type="hidden" value="<?= $this->content->venta; ?>" name="venta" id="venta" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="alquiler" class="control-label">Precio alquiler</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono"><i class="fa-solid fa-dollar-sign"></i></span>
						</div>
						<input type="text" value="<?= $this->content->alquiler; ?>" name="alquiler2" id="alquiler2" class="form-control " onkeyup="convertir('alquiler2','alquiler');" onchange="convertir('alquiler2','alquiler');">
						<input type="hidden" value="<?= $this->content->alquiler; ?>" name="alquiler" id="alquiler" class="form-control ">

					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="administracion" class="control-label">Administración</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono"><i class="fa-solid fa-dollar-sign"></i></span>
						</div>
						<input type="text" value="<?= $this->content->administracion; ?>" name="administracion2" id="administracion2" class="form-control" onkeyup="convertir('administracion2','administracion');" onchange="convertir('administracion2','administracion');">
						<input type="hidden" value="<?= $this->content->administracion; ?>" name="administracion" id="administracion" class="form-control">

					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="banos" class="control-label">ba&ntilde;os</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  "><i class="fa-solid fa-hashtag"></i></span>
						</div>
						<input type="number" value="<?= $this->content->banos; ?>" name="banos" id="banos" class="form-control" >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="Alcobas" class="control-label">Habitaciones</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado "><i class="fa-solid fa-hashtag"></i></span>
						</div>
						<input type="number" value="<?= $this->content->Alcobas; ?>" name="Alcobas" id="Alcobas" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="parqueaderos" class="control-label">parqueaderos</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fa-solid fa-hashtag"></i></span>
						</div>
						<input type="number" value="<?= $this->content->parqueaderos; ?>" name="parqueaderos" id="parqueaderos" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>



				<div class="col-4 form-group">
					<label for="estrato" class="control-label">estrato</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="number" value="<?= $this->content->estrato; ?>" name="estrato" id="estrato" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="tiempoconstruido" class="control-label">tiempo construido</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->tiempoconstruido; ?>" name="tiempoconstruido" id="tiempoconstruido" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="ndepiso" class="control-label">n&uacute;mero de piso</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="number" value="<?= $this->content->ndepiso; ?>" name="ndepiso" id="ndepiso" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="tipoinstalacion" class="control-label">tipo de instalaci&oacute;n</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->tipoinstalacion; ?>" name="tipoinstalacion" id="tipoinstalacion" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="vigilancia" class="control-label">vigilancia</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->vigilancia; ?>" name="vigilancia" id="vigilancia" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-12 form-group">
					<label for="caracteristicasadicionales" class="form-label">caracter&iacute;sticas adicionales</label>
					<textarea name="caracteristicasadicionales" id="caracteristicasadicionales" class="form-control tinyeditor" rows="10"><?= $this->content->caracteristicasadicionales; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group d-none">
					<label for="descripcionE" class="form-label">descripci&oacute;nE</label>
					<textarea name="descripcionE" id="descripcionE" class="form-control tinyeditor" rows="10"><?= $this->content->descripcionE; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>

			</div>
			<div class="row">


				<hr>
				<div>
					<h3>Datos ocultos</h3>
				</div>
				<div class="col-4 form-group">
					<label for="NombreVendedor" class="control-label">Nombre Vendedor</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->NombreVendedor; ?>" name="NombreVendedor" id="NombreVendedor" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>




				<div class="col-4 form-group">
					<label for="duena" class="control-label">Dueño/a</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->duena; ?>" name="duena" id="duena" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-4 form-group">
					<label for="telefonod" class="control-label">télefono dueño/a</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->telefonod; ?>" name="telefonod" id="telefonod" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-4 form-group">
					<label for="direccion" class="control-label">direccion</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->direccion; ?>" name="direccion" id="direccion" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-1 form-group">
					<label class="control-label">Ocultar (Si, NO)</label>
					<input type="checkbox" name="ocultar" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'ocultar') == 1) {
																											echo "checked";
																										} ?>></input>
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>
<script type="text/javascript">
	function convertir(id1, id2) {
		var x = document.getElementById(id1).value;
		x = x.replace(",", "");
		x = x.replace(",", "");
		x = x.replace(",", "");
		var y = x;
		var parts = x.toString().split(".");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		var res = parts.join(".");
		document.getElementById(id1).value = res;
		document.getElementById(id2).value = y;
	}

	function formatInitialValues() {
		convertir('venta2', 'venta');
		convertir('alquiler2', 'alquiler');
		convertir('administracion2', 'administracion');

	}

	document.addEventListener("DOMContentLoaded", formatInitialValues);

	document.addEventListener("DOMContentLoaded", () => {
		formatInitialValues

		const referencia = document.getElementById("ref");
		const tooltip = document.querySelector(".tooltip1");

		const validarReferencia = (ref) => {
			if (ref.value.length > 2) {
				fetch(`/administracion/inmuebles/validarinmueble/?ref=${ref.value.trim()}`)
					.then((response) => response.json())
					.then((data) => {
						if (data.status === "error") {
							tooltip.classList.add("active");
							disableAllInputs();
						} else {
							tooltip.classList.remove("active");

							// In case you want to re-enable the inputs if the status is not "error"
							enableAllInputs();
						}
					});
			}
		}
		//referencia.addEventListener("input", () => validarReferencia(referencia));


		function disableAllInputs() {
			const inputs = document.querySelectorAll(
				"input, select, button[type='submit']"
			);
			inputs.forEach((element) => {
				if (element.id !== "ref") {
					element.disabled = true;
				}
			});
		}

		function enableAllInputs() {
			const inputs = document.querySelectorAll(
				"input, select, button[type='submit']"
			);
			inputs.forEach((element) => {
				element.disabled = false;
			});
		}
	});
</script>