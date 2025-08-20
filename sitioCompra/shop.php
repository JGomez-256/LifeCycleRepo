<?php
// Iniciar sesión
session_start()

// Checar si el botón de añadir al carrito fue clicado
if (isset($_POST["añadir al carrito"])) {
    // Obtener el ID del producto en el formulario
    $product_id = $_POST["product_id"];

    // Obtener cantidad del producto en el formulario
    $product_quantity = $_POST["product_quantity"];

    // Inicializar la variable de la sesión del carrito si no existe
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"] = [];
        header("location:cart.php");
    }

    // Añadir el ID y cantidad del producto al carrito
    $_SESSION["carrito"][$product_id] = $product_quantity;
    header("location:cart.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TecnoTiendaSV - Aplicación de Compra</title>
        <link rel="stylesheet" href="shop.css">
    </head>
    <body>
        <header>
            <h1>Welcome <?php
            $user = $_SESSION["user"];
            echo $user["name"];
            ?> to TecnoTiendaSV</h1>
        </header>
        <nav>
            <ul>
                <li><a href="shop.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <h2>Productos</h2>
                    <div id="laptops" class="tab-content bg-white p-4 rounded shadow">Lista de laptops disponibles...
      <div id="container">
        <div id="product">
        <img src="images/laptops/hp.jpg" alt="">
        <div id="descript">
          <h3>Laptop HP</h3>
          <p>$639.99</p>
        </div>
      </div>
      <div id="product">
        <img src="images/laptops/asus.jpeg" alt="">
        <div id="descript">
          <h3>Laptop Asus</h3>
          <p>$599.99</p>
        </div>
      </div>
      <div id="product">
        <img src="images/laptops/asus2.jpg" alt="">
        <div id="descript">
          <h3>Laptop Asus</h3>
          <p>$799.99</p>
        </div>
      </div>
      <div id="product">
        <img src="images/laptops/dell.jpg" alt="">
        <div id="descript">
          <h3>Laptop Dell</h3>
          <p>$459.99</p>
        </div>
      </div>
      </div>
    </div>
    <div id="keyboards" class="tab-content bg-white p-4 rounded shadow hidden">Lista de teclados disponibles...
      <div id="container">
        <div id="product">
          <img src="images/keyboards/dellkb216.png" alt="">
          <div id="descript">
            <h3>Teclado Dell</h3>
            <p>$110.50</p>
          </div>
        </div>
        <div id="product">
          <img src="images/keyboards/hp150.png" alt="">
          <div id="descript">
            <h3>Teclado HP</h3>
            <p>$125.90</p>
          </div>
        </div>
        <div id="product">
          <img src="images/keyboards/hpkey.png" alt="">
          <div id="descript">
            <h3>Teclado HP</h3>
            <p>$90.00</p>
          </div>
        </div>
        <div id="product">
          <img src="images/keyboards/lenovo.jpg" alt="">
          <div id="descript">
            <h3>Teclado Lenovo</h3>
            <p>$159.99</p>
          </div>
        </div>
      </div>
    </div>
    <div id="mice" class="tab-content bg-white p-4 rounded shadow hidden">Lista de ratones disponibles...
      <div id="container">
        <div id="product">
          <img src="images/mice/asusROGGladius.png" alt="">
          <div id="descript">
            <h3>Mouse Asus ROG</h3>
            <p>$259.99</p>
          </div>
        </div>
        <div id="product">
          <img src="images/mice/asusTUF.png" alt="">
          <div id="descript">
            <h3>Mouse Asus TUF</h3>
            <p>$299.99</p>
          </div>
        </div>
        <div id="product">
          <img src="images/mice/dell.jpg" alt="">
          <div id="descript">
            <h3>Mouse Dell</h3>
            <p>$159.99</p>
          </div>
        </div>
        <div id="product">
          <img src="images/mice/HPWireless.jpg" alt="">
          <div id="descript">
            <h3>Mouse HP inalámbrico</h3>
            <p>$190.90</p>
          </div>
        </div>
      </div>
    </div>
  </div>
            </section>
        </main>
    </body>
</html>