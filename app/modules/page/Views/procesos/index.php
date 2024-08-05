<?php
echo $this->banner;
?>
<div class="container contenedor-servicio">

  <?php
  echo $this->contenido;


  ?>
  


</div>


<style>
  .main-general {
    background-color: #f7f7f7;
  }


</style>


<script>
  document.addEventListener('DOMContentLoaded', function() {

   


    // Función para activar la pestaña basada en el hash de la URL
    function activateTabFromHash() {
      const hash = window.location.hash;
      if (hash) {
        const targetTab = document.querySelector(hash + '[data-bs-toggle="pill"]');
        if (targetTab) {
          const tab = new bootstrap.Tab(targetTab);
          tab.show();
          
        }
      } 
    }

    // Activar la pestaña correcta al cargar la página
    activateTabFromHash();

    // Re-activar la pestaña correcta cuando se cambia el hash de la URL
    window.addEventListener('hashchange', activateTabFromHash);

    
  });
</script>