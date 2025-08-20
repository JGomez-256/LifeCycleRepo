<?php
if ($_SERVER["REQUEST METHOD"] == "POST") {
    // Toma los datos de registrarusuario.html
    $id = $_POST["userid"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["userpass"];
    $regdate = $_POST["fecha"];

    //Encripta la contraseña
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "regClientes";

    try {
        $db = new PDO(
            "mysql:host=$db_server;dbname=$db_name",
            $db_user, $db_pass
        );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Inserta al usuario en la base de datos
        $stmt = $db->prepare(
            "INSERT INTO usuarios (id_usuario, nombre, correo, direccion, contraseña, fecha_registro)
            VALUES (:id_usuario, :nombre, :correo, :direccion, :contraseña, :fecha_registro)"
        );
        $stmt->bindParam(":id_usuario", $id);
        $stmt->bindParam(":nombre", $name);
        $stmt->bindParam(":correo", $email);
        $stmt->bindParam(":direccion", $address);
        $stmt->bindParam(":contraseña", $password);
        $stmt->bindParam(":fecha_registro", $regdate);
        $stmt->execute();
        echo "<h2>Registro exitoso</h2>";
        echo "Gracias por registrarte, " . $name . ".<br>";
        echo "Serás redireccionado en 3 segundos.";
        header("refresh:3;url=login.html");
    } catch(PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }
}

/* try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if ($conn) {
        echo "Conectado con éxito <br>";
    } else {
        echo "No se pudo conectar";
    }

    $sql = "INSERT INTO usuarios VALUES ('$id', '$username', '$email', '$address', '$password', '$regdate')";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha insertado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} catch(mysqli_sql_exception) {
    echo "No se pudo conectar";
} */
?>