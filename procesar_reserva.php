<?php
$host = getenv('ep-lingering-resonance-a5wydir9.us-east-2.aws.neon.tech');
$port = getenv('5432');
$dbname = getenv('Comedor_escolar');
$user = getenv('Comedor_escolar_owner');
$password = getenv('IfJQNh60nrGW');
$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$connection) {
    die("Error de conexion: " . pg_last_error());
}
$nombre = $_POST['nombre'];
$curso = $_POST['curso'];
$horario = $_POST['horario'];
$email = $_POST['email'];
$query = "INSERT INTO reservas (nombre, curso, email) VALUES('$nombre', '$curso', '$horario', '$email')";
$result = pg_query($connection, $query);
if (!$result) {
    echo "Error al guardar los datos: " . pg_last_error();
} else {
    echo "Datos guardados correctamente.";
}
pg_close($connection);
?>
