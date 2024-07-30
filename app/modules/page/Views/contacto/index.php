<?php
echo $this->banner;
?>
<div class="container contenedor-contacto pb-5">

  <?php
  echo $this->contenido;
  ?>

  <div class="row">
    <div class="col-12 col-lg-6 order-2 order-lg-1 mt-5 mt-md-0">
      <form action="/page/contacto/envarmensaje" class="formulario-contacto" id="formulario-contacto">
        <div class="row">

          <div class="mb-3 col-12 col-md-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" minlength="4" maxlength="50" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3 col-12 col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" minlength="4" maxlength="30" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3 col-12 col-md-6">
            <label for="city" class="form-label">Ciudad</label>
            <input type="text" minlength="3" maxlength="30" class="form-control" id="city" name="city" required>
          </div>
          <div class="mb-3 col-12 col-md-6">
            <label for="enterprise" class="form-label">Empresa</label>
            <input type="text" minlength="4" maxlength="30" class="form-control" id="enterprise" name="enterprise" required>
          </div>
          <div class="mb-3 col-12 col-md-6">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="number" class="form-control" id="phone" name="phone" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Comentario</label>
          <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <div class="d-none">
          <label for="subjet">Leave</label>
          <input type="text" id="subjet" name="subjet">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" required value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault" data-bs-toggle="modal" data-bs-target="#modalPoliticas" role="button">
            Aceptar términos y condiciones
          </label>
          <!-- Modal -->
          <div class="modal fade" id="modalPoliticas" tabindex="-1" aria-labelledby="modalPoliticasLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalPoliticasLabel"><?php echo $this->infopage->info_pagina_titulo_legal ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <?php echo $this->infopage->info_pagina_descripcion_legal ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary d-none">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input name="hash" type="hidden" value="<?php echo md5(date("Y-m-d")); ?>" />
        <input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
        <input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">


        <div class="d-grid d-md-flex justify-content-center justify-content-md-between">
          <div class="g-recaptcha" data-sitekey="6LfFDZskAAAAAE2HmM7Z16hOOToYIWZC_31E61Sr"></div>

        </div>
        <button type="submit" id="submit-btn" class="btn-home mt-3">Enviar</button>
      </form>
    </div>
    <div class="col-12 col-lg-6  order-1 order-lg-2">
      <h2 class="mb-4">Detalles de Contacto</h2>

      <div class="contenido-contacto shadow rounded">
        <img class="img-contacto" src="/images/<?= $this->imagenContacto->publicidad_imagen ?>" alt="Imagen de contacenos">
        <span><img src="/skins/page/images/Corte/icono1_contacto.gif" /> <?= $this->infopage->info_pagina_correos_contacto ?> </span>
        <span><img src="/skins/page/images/Corte/icono2_contacto.gif" /> <?= $this->infopage->info_pagina_telefono ?> </span>
        <span><img src="/skins/page/images/Corte/icono3_contacto.gif" /> <?= $this->infopage->info_pagina_direccion_contacto ?> </span>
        <span><img src="/skins/page/images/Corte/icono4_contacto.gif" /> <?= $this->infopage->info_pagina_informacion_contacto ?> </span>

      </div>
    </div>
  </div>
</div>



<style>
  .main-general {
    background-color: #f7f7f7;
    z-index: unset;
  }
</style>

<script>
  document.getElementById('phone').addEventListener('input', function() {
    if (this.value.length > 12) {
      this.value = this.value.slice(0, 12); // Limita la longitud a 6 caracteres
    }
  });
</script>