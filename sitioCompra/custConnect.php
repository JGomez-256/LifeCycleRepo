<?php
$name = $_POST["name"];
$email = $_POST["email"];
  
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "regClientes";

try {
  $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
  if ($conn) {
    echo "Conectado con éxito <br>";
  } else {
    echo "No se pudo conectar";
  }

  $sql = "INSERT INTO clientes VALUES ('$name', '$email')";

  if ($conn->query($sql) === TRUE) {
    echo "Se ha insertado con éxito";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  return $conn;
} catch(mysqli_sql_exception) {
  echo "No se pudo conectar";
}

$conn->close();
?>