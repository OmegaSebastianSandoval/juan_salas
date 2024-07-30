<ul>
  <?php if (Session::getInstance()->get('kt_login_level') == '1') { ?>
    <li <?php if ($this->botonpanel == 1) { ?>class="activo" <?php } ?>>
      <a href="/administracion/panel">
        <i class="fas fa-info-circle"></i>
        Información Página
      </a>
    </li>
  <?php } ?>
  <li <?php if ($this->botonpanel == 2) { ?>class="activo" <?php } ?>>
    <a href="/administracion/publicidad">
      <i class="far fa-images"></i>
      Administrar Publicidad
    </a>
  </li>
  <li <?php if ($this->botonpanel == 3) { ?>class="activo" <?php } ?>>
    <a href="/administracion/contenido">
      <i class="fas fa-file-invoice"></i>
      Administrar Contenidos
    </a>
  </li>
  <?php if (Session::getInstance()->get('kt_login_level') == '1') { ?>
    <li <?php if ($this->botonpanel == 4) { ?>class="activo" <?php } ?>>
      <a href="/administracion/usuario">
        <i class="fas fa-users"></i>
        Administrar Usuarios
      </a>
    </li>
  <?php } ?>
  <!-- <li <?php if ($this->botonpanel == 5) { ?>class="activo" <?php } ?>>
    <a href="/administracion/preguntas">
      <i class="fas fa-file-invoice"></i> 
      Administrar Preguntas
    </a>
  </li> -->
  <li <?php if ($this->botonpanel == 6) { ?>class="activo" <?php } ?>>
    <a href="/administracion/departamentos">
      <i class="fas fa-file-invoice"></i>
      Administrar Departamentos
    </a>
  </li>
  <li <?php if ($this->botonpanel == 7) { ?>class="activo" <?php } ?>>
    <a href="/administracion/ciudades">
      <i class="fas fa-file-invoice"></i>
      Administrar Ciudades
    </a>
  </li>
  <li <?php if ($this->botonpanel == 8) { ?>class="activo" <?php } ?>>
    <a href="/administracion/sectores">
      <i class="fas fa-file-invoice"></i>
      Administrar Sectores
    </a>
  </li>
  <li <?php if ($this->botonpanel == 9) { ?>class="activo" <?php } ?>>
    <a href="/administracion/localidades">
      <i class="fas fa-file-invoice"></i>
      Administrar Localidades
    </a>
  </li>
  <li <?php if ($this->botonpanel == 10) { ?>class="activo" <?php } ?>>
    <a href="/administracion/tipos">
      <i class="fas fa-file-invoice"></i>
      Administrar Tipos de Inmuebles 
    </a>
  </li>
  <li <?php if ($this->botonpanel == 11) { ?>class="activo" <?php } ?>>
    <a href="/administracion/inmuebles">
      <i class="fas fa-file-invoice"></i>
      Administrar Inmuebles 
    </a>
  </li>
</ul>