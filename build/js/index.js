// Almacena las categorias
const datosCategorias = [];

document.addEventListener("DOMContentLoaded", (e) => {
  e.preventDefault();

  // Crea una nueva instancia de XMLHttpRequest
  let ajax = new XMLHttpRequest();

  // Configura la solicitud
  ajax.open("GET", "/controller/categoria.php?op=GetAll", true);

  // Configura la función de respuesta
  ajax.onload = function () {
    if (ajax.status >= 200 && ajax.status < 300) {
      let categorias = JSON.parse(ajax.responseText);
      datosCategorias.push(categorias);

      // Llama a la función que muestra las opciones en el html
      $(document).ready(function () {
        mostrarOption();
      });
    } else {
      console.error(
        "There was a problem. Status Code:",
        ajax.status
      );
    }
  };

  // Manejo de errores
  ajax.onerror = function () {
    console.error("There was a problem");
  };

  ajax.send();
});

// Muestra en el option las categorias
function mostrarOption() {
  const $select = $(".cat_id");

  $.each(datosCategorias, function (index, value) {
    $.each(value, function (index, value) {
      $select.append(
        $("<option>", {
          value: value.cat_id,
          text: value.cat_nom,
        })
      );
    });
  });
}
