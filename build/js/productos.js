$(".addProduct").click(function (e) {
  // Evita que el formulario se envíe y la página se recargue
  e.preventDefault();

  // Recoge los valores del formulario
  let prod_nom = $(".prod_nom").val();
  let cat_id = $(".cat_id").val();

  // Valida que los campos no esten vacíos
  if (prod_nom !== "" && cat_id !== "") {
    let datos = {
      prod_nom: prod_nom,
      cat_id: cat_id,
    };

    $.ajax({
      url: "/controller/producto.php?op=Insert",
      type: "POST",
      data: datos,
      dataType: "json", // Espera una respuesta JSON del servidor
    })

      // Si funciona muestra el aviso correcto
      .always(function (respuesta) {
        $(".respuesta").html(`<p class="avisoValido">${respuesta.message}</p>`);

        setTimeout(function () {
          $(".respuesta").empty();
          $(".formProducto")[0].reset();
        }, 3000);
      });

      eliminar();
  } else {
    // Muestra un error
    $(".respuesta").html(
      '<p class="avisoError">You have to fill all the containers</p>'
    );

    setTimeout(function () {
      $(".respuesta").empty();
    }, 3000);
  }
});

const  obtenerProducto = async () =>{
  const url =
    "/controller/producto.php?op=GetAll";
  const resultado = await fetch(url);
  const datos = await resultado.json();
  mostrar(datos);
}

function mostrar(datos){
  const tbody = document.getElementById("tbody");
  datos.forEach(dato => {
    let tr = document.createElement("tr");
    let td_id = document.createElement("td");
    td_id.textContent = dato.prod_id;
    let td_nombre = document.createElement("td");
    td_nombre.textContent = dato.prod_nom;
    tr.appendChild(td_id);
    tr.appendChild(td_nombre);
    tbody.appendChild(tr);
  });
}

const eliminar = () => {
  let trs = document.getElementById("tbody").getElementsByTagName("tr");
  while (trs.length > 0) trs[0].parentNode.removeChild(trs[0]);


  const timeOut = setTimeout(obtenerProducto, 100);
};

obtenerProducto();
