<?php if ($columna->contenido_seccion == 5) { ?>

	<div class="d-none d-md-block mt-3">
		<div class="acordion-tab d-flex align-items-start contenedor_<?php echo $columna->contenido_id; ?>">
			<div class=" nav flex-column nav-pills gap-3 me-3 nav<?php echo $columna->contenido_id; ?>" id="v-pills-tab" role="tablist" aria-orientation="vertical">

				<?php foreach ($acordioncontent as $key3 => $acordion) : ?>
					<?php $acordion = $acordion["nietos"]; ?>

					<button class="nav-link  shadow-sm  <?php echo $key3 == 0 ? "active" : '' ?>" id="v-pills-<?php echo $acordion->contenido_id; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $acordion->contenido_id; ?>" type="button" role="tab" aria-controls="v-pills-<?php echo $acordion->contenido_id; ?>" aria-selected="<?php echo $key3 == 0 ? "true" : 'false' ?>"><?php echo ($key3 + 1) . ". " . $acordion->contenido_titulo; ?></button>

				<?php endforeach ?>

			</div>
			<div class="tab-content p-4 rounded shadow-sm" id="v-pills-tabContent">

				<?php foreach ($acordioncontent as $key3 => $acordion) : ?>
					<?php $acordion = $acordion["nietos"]; ?>

					<div class="tab-pane fade show <?php echo $key3 == 0 ? "active" : '' ?> " id="v-pills-<?php echo $acordion->contenido_id; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $acordion->contenido_id; ?>-tab" tabindex="0">
						<h2>
						<?php echo ($key3 + 1) . ". " .  $acordion->contenido_titulo; ?>

						</h2>
						<?php echo $acordion->contenido_descripcion; ?>
					</div>
				<?php endforeach ?>

			</div>
		</div>

	</div>





	<div class="d-block d-md-none">

		<div data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="accordion my-3 " id="accordion<?php echo $columna->contenido_id; ?>">

			<?php foreach ($acordioncontent as $key3 => $acordion) : ?>

				<?php $acordion = $acordion["nietos"]; ?>
				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $acordion->contenido_id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $acordion->contenido_id; ?>">
							<?php echo $acordion->contenido_titulo; ?>

						</button>
					</h2>
					<div id="collapse<?php echo $acordion->contenido_id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
						<div class="accordion-body">
							<?php if ($acordion->contenido_imagen) { ?>
								<div class="imagen-contenido">
									<div><img src="/images/<?php echo $acordion->contenido_imagen; ?>"></div>
								</div>
							<?php } ?>
							<div>
								<div class="descripcion">
									<?php echo $acordion->contenido_descripcion; ?>
								</div>
								<?php if ($acordion->contenido_enlace) { ?>
									<div>
										<a href="<?php $acordion->contenido_enlace; ?>" <?php if ($acordion->contenido_enlace_abrir == 1) { ?> target="_blank" <?php } ?> class="btn btn-block btn-vermas"> <?php if ($acordion->contenido_vermas) { ?><?php echo $acordion->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?></a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<div class="card w-100 d-none">
					<div class="card-header" id="heading<?php echo $acordion->contenido_id; ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $acordion->contenido_id; ?>" <?php if ($key3 == 0) { ?> aria-expanded="true" <?php } ?> aria-controls="collapse<?php echo $acordion->contenido_id; ?>">
						<?php if ($acordion->contenido_imagen) { ?>
							<img src="/images/<?php echo $acordion->contenido_imagen; ?>" style="max-width: 50px" class="mr-2">
						<?php } ?>
						<?php echo $acordion->contenido_titulo; ?>
					</div>
					<div id="collapse<?php echo $acordion->contenido_id; ?>" class="collapse " aria-labelledby="heading<?php echo $acordion->contenido_id; ?>" data-parent="#accordion<?php echo $columna->contenido_id; ?>">
						<div class="card-body">
							<!-- <?php if ($acordion->contenido_imagen) { ?>
					<div class="imagen-contenido">
						<div><img src="/images/<?php echo $acordion->contenido_imagen; ?>"></div>
					</div>
				<?php } ?> -->
							<div>
								<div class="descripcion">
									<?php echo $acordion->contenido_descripcion; ?>
								</div>
								<?php if ($acordion->contenido_enlace) { ?>
									<div>
										<a href="<?php $acordion->contenido_enlace; ?>" <?php if ($acordion->contenido_enlace_abrir == 1) { ?> target="_blank" <?php } ?> class="btn btn-block btn-vermas"> <?php if ($acordion->contenido_vermas) { ?><?php echo $acordion->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?></a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>


			<?php endforeach ?>
		</div>
	</div>

<?php } else { ?>
	<div data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="accordion my-3 " id="accordion<?php echo $columna->contenido_id; ?>">

		<?php foreach ($acordioncontent as $key3 => $acordion) : ?>

			<?php $acordion = $acordion["nietos"]; ?>
			<div class="accordion-item">
				<h2 class="accordion-header">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $acordion->contenido_id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $acordion->contenido_id; ?>">
						<?php echo $acordion->contenido_titulo; ?>

					</button>
				</h2>
				<div id="collapse<?php echo $acordion->contenido_id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<?php if ($acordion->contenido_imagen) { ?>
							<div class="imagen-contenido">
								<div><img src="/images/<?php echo $acordion->contenido_imagen; ?>"></div>
							</div>
						<?php } ?>
						<div>
							<div class="descripcion">
								<?php echo $acordion->contenido_descripcion; ?>
							</div>
							<?php if ($acordion->contenido_enlace) { ?>
								<div>
									<a href="<?php $acordion->contenido_enlace; ?>" <?php if ($acordion->contenido_enlace_abrir == 1) { ?> target="_blank" <?php } ?> class="btn btn-block btn-vermas"> <?php if ($acordion->contenido_vermas) { ?><?php echo $acordion->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>




		<?php endforeach ?>
	</div>
<?php } ?>