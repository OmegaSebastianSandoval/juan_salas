<?php if ($columna->contenido_seccion == 5) { ?>

	<div class="d-none d-md-block mt-3">
		<div class="acordion-tab d-flex align-items-start contenedor_<?php echo $columna->contenido_id; ?>">
			<div class=" nav flex-column nav-pills gap-3 me-3 nav<?php echo $columna->contenido_id; ?>" id="v-pills-tab" role="tablist" aria-orientation="vertical">

				<?php foreach ($acordioncontent as $key3 => $acordion) : ?>
					<?php $acordion = $acordion["nietos"]; ?>

					<!-- <button class="nav-link  shadow-sm  <?php echo $key3 == 0 ? "active" : '' ?>" id="v-pills-<?php echo $acordion->contenido_id; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $acordion->contenido_id; ?>" type="button" role="tab" aria-controls="v-pills-<?php echo $acordion->contenido_id; ?>" aria-selected="<?php echo $key3 == 0 ? "true" : 'false' ?>"><?php echo ($key3 + 1) . ". " . $acordion->contenido_titulo; ?></button> -->

					<button class="cta <?php echo $key3 == 0 ? "active" : '' ?> " id="v-pills-<?php echo $acordion->contenido_id; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $acordion->contenido_id; ?>" type="button" role="tab" aria-controls="v-pills-<?php echo $acordion->contenido_id; ?>" aria-selected="<?php echo $key3 == 0 ? "true" : 'false' ?>">
						<span class="span"><?php echo ($key3 + 1) . ". " . $acordion->contenido_titulo; ?></span>
						<span class="second">
							<svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 66 43" height="20px" width="50px">
								<g fill-rule="evenodd" fill="none" stroke-width="1" stroke="none" id="arrow">
									<path fill="#FFFFFF" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" class="one"></path>
									<path fill="#FFFFFF" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" class="two"></path>
									<path fill="#FFFFFF" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" class="three"></path>
								</g>
							</svg>
						</span>
					</button>
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