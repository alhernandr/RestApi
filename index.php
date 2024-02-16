<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./build/css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Control Panel</title>
</head>
<body>
    <main>
    <center>
        <h1>Control Panel</h1>
    </center>
        <section class="formularios">
        <form action="#" method="POST" class="formProductShow">
                <h3>Show Products</h3>
                <table>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </form>    
        
        <!-- Formulario para las categorías -->
            <form action="" method="POST" class="formCategoria">
                <h3>Create Category</h3>
                <table>
                    <tr>
                        <td>
                            <input type="text" name="cat_nom" class="cat_nom" placeholder="Name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="cat_obs" class="cat_obs" placeholder="Observations" rows="5" cols="20"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" value="Add Category" class="addCategoria">
                        </td>
                    </tr>
                </table>
            </form>

            <!-- Formulario para los productos -->
            <form action="#" method="POST" class="formProducto">
                <h3>Create Product</h3>
                <table>
                    <tr>
                        <td>
                            <input type="text" class="prod_nom" name="prod_nom" placeholder="Name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select name="cat_id" class="cat_id">
                                <option value="">-- Select --</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" value="Add Product" class="addProduct">
                        </td>
                    </tr>
                </table>
            </form>

        <!-- Muestra el resultado -->
        <section class="respuesta"></section>
    </main>

    <script src="./build/js/index.js"></script>
    <script src="./build/js/productos.js"></script>
    <script src="./build/js/categorias.js"></script>
</body>
</html>
