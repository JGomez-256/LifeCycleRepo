<?php
if ($_SERVER["REQUEST METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Conectar a la base de datos
    $server = "localhost";
    $db_name = "usuarios";
    $db_user = "root";
    $db_pass = "";

    try {
        $db = new PDO(
            "mysql:host=$server;dbname=$db_name",
            $db_user,
            $db_pass
        );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Ver si el usuario existe en la base de datos
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE correo = :correo");
        $stmt->bindParam(":correo", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user){
            //Verificar la contraseña
            if (password_verify($password, $user["password"])){
                session_start();
                $_SESSION["user"] = $user;
                echo '<script type="text/javascript">
                window.onload = function(){
                alert("¡Bienvenido/a a TecnoTiendaSV!")
                window.location.href
                };
                </script>';
            } else {
                echo "<h2>Fallo al iniciar sesión</h2>";
                echo "El correo electrónico o contraseña no son válidos";
            }
        } else {
            echo "<h2>Fallo al iniciar sesión</h2>";
            echo "El usuario no existe";
        }
    } catch (PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }
}
?>