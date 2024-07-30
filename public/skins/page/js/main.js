var videos = [];
$(document).ready(function () {
  $('.dropdown-toggle').dropdown();
  $(".carouselsection").carousel({
    quantity: 4,
    sizes: {
      '900': 3,
      '500': 1
    }
  });
  $(".btn-menu").on("click", function () {
      if ($(".botonera-resposive").is(":visible")) {
          $(".botonera-resposive").hide(300);
      } else {
          $(".botonera-resposive").show(300);
      }
  });
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
$(".collapse")
    .on("shown.bs.collapse", function () {
        $(this)
            .parent()
            .find("#icono")
            .removeClass("fa-angle-down")
            .addClass("fa-angle-up");
        $(this)
            .parent()
            .find(".icono-principios")
            .removeClass("fa-angle-down")
            .addClass("fa-angle-up");
        $(this)
            .parent()
            .find(".card-header")
            .removeClass("panel-hide")
            .addClass("panel-show");
        /*$(this).parent().find(".accordion-heading").addClass("heading-show");
          $(this).parent().find(".accordion-heading").removeClass("heading-hide");
          $(this).parent().find(".titulo-credito").addClass("d-none")
          $(this).parent().find(".titulo-credito").removeClass("d-none");*/
    })
    .on("hidden.bs.collapse", function () {
        $(this)
            .parent()
            .find("#icono")
            .removeClass("fa-angle-up")
            .addClass("fa-angle-down");
        $(this)
            .parent()
            .find(".icono-principios")
            .removeClass("fa-angle-up")
            .addClass("fa-angle-down");
        $(this)
            .parent()
            .find(".card-header")
            .removeClass("panel-show")
            .addClass("panel-hide");
        /* $(this).parent().find(".accordion-heading").removeClass("heading-show");
          $(this).parent().find(".accordion-heading").addClass("heading-hide");
          $(this).parent().find(".vermascredito").addClass("vermascredito-hide").removeClass("vermascredito-show");
          $(this).parent().find(".titulo-credito").removeClass("d-none")
          $(this).parent().find(".titulo-credito").addClass("d-none");  */
    });
  $('.banner-video-youtube').each(function () {
    // console.log($(this).attr('data-video'));
    const datavideo = $(this).attr('data-video');
    const idvideo = $(this).attr('id');
    const playerDefaults = {
      'autoplay': 0,
      'autohide': 1,
      'modestbranding': 0,
      'rel': 0,
      'showinfo': 0,
      'controls': 0,
      'disablekb': 1,
      'enablejsapi': 0,
      'iv_load_policy': 3
    };
    const video = {
      'videoId': datavideo,
      'suggestedQuality': 'hd1080'
    };
    videos[videos.length] = new YT.Player(idvideo, {
      'videoId': datavideo,
      'playerVars': playerDefaults,
      'events': {
        'onReady': onAutoPlay,
        'onStateChange': onFinish
      }
    });
  });


  $(function () {
    $(".doc-item-theme").on("click", function () {
      let id = $(this).attr("data-id");
      console.log(id);
      $("#" + id).slideToggle();
    });
  });
  
  function onAutoPlay(event) {
    event.target.playVideo();
    event.target.mute();
  }

  function onFinish(event) {
    if (event.data === 0) {
      event.target.playVideo();
    }
  }
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
})

document.addEventListener('DOMContentLoaded', function () {
  var map = L.map('map').setView([4.60971, -74.08175], 13); // Coordenadas de Bogotá

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  var marker = L.marker([4.60971, -74.08175]).addTo(map)
      .bindPopup('Bogotá, Colombia')
      .openPopup();

      document
      .getElementById("formulario-contacto")
      ?.addEventListener("submit", function (e) {
        e.preventDefault();
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
          Swal.fire({
            icon: "warning",
            text: "Por favor, verifica que no eres un robot.",
            confirmButtonColor: "#f87004",
            confirmButtonText: "Continuar",
          });
        } else {
          $(".loader-bx").addClass("show");
  
          let submitBtn = document.getElementById("submit-btn");
          // Deshabilitar botón y mostrar animación
          submitBtn.disabled = true;
  
          let formData = new FormData(this);
          let data = {};
          formData.forEach((value, key) => {
            data[key] = value;
          });
  
          // console.log(data);
  
          fetch(this.getAttribute("action"), {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "success") {
                Swal.fire({
                  icon: "success",
                  text: "Hemos recibido tu mensaje, te responderemos a la brevedad.",
                  confirmButtonColor: "#f87004",
                  confirmButtonText: "Continuar",
                });
              } else if (data.status === "error") {
                Swal.fire({
                  icon: "error",
                  text: "Ha ocurrido un error, por favor intenta de nuevo.",
                  confirmButtonColor: "#f87004",
                  confirmButtonText: "Continuar",
                });
              }
              document.getElementById("formulario-contacto").reset();
              // Habilitar botón y ocultar animación
              submitBtn.disabled = false;
              $(".loader-bx").removeClass("show");
            })
  
            .catch((error) => {
              Swal.fire({
                icon: "error",
                text: "Ha ocurrido un error, por favor intenta de nuevo.",
                confirmButtonColor: "#f87004",
                confirmButtonText: "Continuar",
              });
              // Habilitar botón y ocultar animación
              submitBtn.disabled = false;
              $(".loader-bx").removeClass("show");
            });
        }
      });
});