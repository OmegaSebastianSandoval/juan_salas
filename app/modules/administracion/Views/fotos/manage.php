<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>"  data-bs-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />
			<?php }?>
			<div class="row">
				<input type="hidden" name="inmueble"  value="<?php if($this->content->inmueble){ echo $this->content->inmueble; } else { echo $this->inmueble; } ?>">
				<div class="col-12 form-group">
					<label for="foto" >foto</label>
					<input type="file" name="foto" id="foto" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  <?php if(!$this->content->id){ echo 'required'; } ?>>
					<div class="help-block with-errors"></div>
					<?php if($this->content->foto) { ?>
						<div id="imagen_foto">
							<img src="/images/<?= $this->content->foto; ?>"  class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('foto','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>?inmueble=<?php if($this->content->inmueble){ echo $this->content->inmueble; } else { echo $this->inmueble; } ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>