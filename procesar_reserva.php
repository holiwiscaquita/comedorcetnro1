<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nombre_base_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$curso = $_POST['curso'];
$horario = $_POST['horario'];
$email = $_POST['email'];

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO reservas (nombre, curso, horario, email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $curso, $horario, $email);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Reserva realizada con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>
