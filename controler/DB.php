<?php
class DB {
    private static $conexion;

    public static function conectar() {
        $host = "localhost"; // Cambia esto si tu base de datos está en un servidor diferente
        $usuario = "TFC"; // Cambia esto por el nombre de usuario de tu base de datos
        $contraseña = "1234"; // Cambia esto por la contraseña de tu base de datos
        $base_datos = "tfc"; // Cambia esto por el nombre de tu base de datos

        self::$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

        if (self::$conexion->connect_error) {
            die("Error de conexión: " . self::$conexion->connect_error);
        }
    }

    public static function verificaCliente($usuario, $contraseña) {
        self::conectar();
        $usuario = self::$conexion->real_escape_string($usuario);
        $contraseña = self::$conexion->real_escape_string($contraseña);
        $consulta = "SELECT id FROM Usuario WHERE correo='$usuario' AND contraseña='$contraseña'";
        $resultado = self::$conexion->query($consulta);
        if ($resultado->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    // Aquí podrías agregar más funciones para interactuar con la base de datos según sea necesario
}
?>
