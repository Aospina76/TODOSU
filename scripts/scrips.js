window.addEventListener('scroll',function() {
  var menu = document.getElementById('Navega');
  var alturaseccion1 = this.document.getElementById("Inicio").offsetHeight

  if (window.scrollY >= alturaseccion1) {
    menu.classList.add('active');
  } else {
    menu.classList.remove('active');
  }
}
)