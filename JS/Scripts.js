document.addEventListener("DOMContentLoaded", function () {
  // Mostrar/Ocultar info alcalde actual
  window.toggleInfo = function () {
    const infoSection = document.getElementById("infoSection");
    const btn = document.getElementById("verMasBtn");

    if (infoSection.classList.contains("expandido")) {
      infoSection.classList.remove("expandido");
      btn.textContent = "Ver más";
    } else {
      infoSection.classList.add("expandido");
      btn.textContent = "Ocultar información";
    }
  };

  // Abrir modal de alcalde con contenido dinámico
  window.abrirModal = function (id) {
    if (id === 'Intro') {
      const intro = document.getElementById('modalIntro');
      if (intro) intro.style.display = 'block';
      return;
    }

    const contenido = document.getElementById('contenido-alcalde-' + id);
    const modal = document.getElementById('modalAlcalde');
    const contenedor = document.getElementById('contenidoModalAlcalde');

    if (!contenido || !modal || !contenedor) {
      alert('Error: elemento modal no encontrado en el DOM.');
      return;
    }

    contenedor.innerHTML = contenido.innerHTML;
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
  };

  window.cerrarModal = function (tipo) {
    if (tipo === 'Alcalde') {
      document.getElementById('modalAlcalde').style.display = 'none';
    } else if (tipo === 'Intro') {
      document.getElementById('modalIntro').style.display = 'none';
    }
    document.body.style.overflow = 'auto';
  };

  window.abrirImagenModal = function (src) {
    const modal = document.getElementById('modalImagen');
    const imagen = document.getElementById('imagenAmpliada');
    if (modal && imagen) {
      imagen.src = src;
      modal.style.display = 'block';
      document.body.style.overflow = 'hidden';
    }
  };

  window.cerrarImagenModal = function () {
    const modal = document.getElementById('modalImagen');
    if (modal) {
      modal.style.display = 'none';
      document.body.style.overflow = 'auto';
    }
  };
});

function filtrarGaleria() {
  const filtro = document.getElementById("filtro").value;
  const imagenes = document.querySelectorAll(".imagen");

  imagenes.forEach(imagen => {
    const categoria = imagen.getAttribute("data-categoria");
    
    if (filtro === "todos" || categoria === filtro) {
      imagen.style.display = "block";
    } else {
      imagen.style.display = "none";
    }
  });
}

