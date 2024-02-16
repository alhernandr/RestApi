$(".addCategoria").click(function (e) {
  // Evita que el formulario se envíe y la página se recargue
  e.preventDefault();

  // Recoge los valores del formulario
  let cat_nom = $(".cat_nom").val();
  let cat_obs = $(".cat_obs").val();

  // Valida que los campos no estén vacíos
  if (cat_nom !== "" && cat_obs !== "") {
    let datos = {
      cat_nom: cat_nom,
      cat_obs: cat_obs,
    };

    $.ajax({
      url: "/controller/categoria.php?op=Insert",
      type: "POST",
      data: datos,
      dataType: "json", // Espera una respuesta JSON del servidor
    })

      // Si funciona muestra el aviso correcto
      .always(function (respuesta) {
        $(".respuesta").html(`<p class="avisoValido">${respuesta.message}</p>`);

        setTimeout(function () {
          $(".respuesta").empty();
          $(".formCategoria")[0].reset();
        }, 3000);
      });
  } else {
    // Muestra un error
    $(".respuesta").html(
      '<p class="avisoError">You have to fill all the containers/p>'
    );

    setTimeout(function () {
      $(".respuesta").empty();
    }, 3000);
  }
});

