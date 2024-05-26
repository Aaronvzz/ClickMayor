<?php
// add_article.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clickmayor";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$title = $_POST['title'];
$content = $_POST['content'];

// Prevenir inyección SQL
$title = $conn->real_escape_string($title);
$content = $conn->real_escape_string($content);

// Insertar artículo en la base de datos
$sql = "INSERT INTO articles (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo artículo agregado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>