<?php
$host = getenv('ep-lingering-resonance-a5wydir9.us-east-2.aws.neon.tech');
$dbname = getenv('Comedor_escolar');
$user = getenv('Comedor_escolar_owner');
$password = getenv('IfJQNh60nrGW');

$conn = new mysqli($host, $user, $password, $dbname);
if (!$conn->connect_error) {
    die("Error de conexion: " . $conn->connect_error);
}
$nombre = $_POST['nombre'];
$curso = $_POST['curso'];
$horario = $_POST['horario'];
$email = $_POST['email'];

$sql = "INSERT INTO reservas (nombre, curso, horario, email) VALUES ('$nombre', '$curso', '$horario', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Reserva registrada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close(); 
?>
