jQuery(window).on('load', function() {
  jQuery("#loader").remove();
});

jQuery(document).ready(function() {
  jQuery(`
    <div id="loader">
      <div class="circles"></div>
      <h5 class="text">Cargando</h5>
    </div>
  `).appendTo("body");

  jQuery("#loader").css("display", "flex");
});
