<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>"  data-bs-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->preguntas_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->preguntas_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-8 form-group">
					<label for="preguntas_pregunta"  class="control-label">Pregunta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->preguntas_pregunta; ?>" name="preguntas_pregunta" id="preguntas_pregunta" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
                <div class="col-2 form-group">
					<label for="preguntas_fecha"  class="control-label">Fecha</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="date" value="<?= $this->content->preguntas_fecha; ?>" name="preguntas_fecha" id="preguntas_fecha" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
                <div class="col-2 form-group">
                    <label   class="control-label">Estado</label>
                    <label class="input-group">
                        <input type="checkbox" name="preguntas_estado" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'preguntas_estado') == 1) { echo "checked";} ?>   ></input>
                        <div class="help-block with-errors"></div>
                    </label>
                </div>
				
				<div class="col-12 form-group">
					<label for="preguntas_respuestas" class="form-label" >Respuesta</label>
					<textarea name="preguntas_respuestas" id="preguntas_respuestas"   class="form-control tinyeditor" rows="10"   ><?= $this->content->preguntas_respuestas; ?></textarea>
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