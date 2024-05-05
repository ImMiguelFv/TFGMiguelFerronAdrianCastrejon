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
    
    public static function registrarUsuario($nombre, $apellidos, $correo, $contraseña, $verificarContraseña) {
        self::conectar();

        // Verificar si el correo ya está registrado
        $correo = self::$conexion->real_escape_string($correo);
        $consulta_correo = "SELECT id FROM Usuario WHERE correo='$correo'";
        $resultado_correo = self::$conexion->query($consulta_correo);
        if ($resultado_correo->num_rows > 0) {
            return "El correo electrónico ya está registrado.";
        }

        // Verificar la longitud y seguridad de la contraseña
        if (strlen($contraseña) < 8 || !preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $contraseña)) {
            return "La contraseña debe tener al menos 8 caracteres y contener letras y números.";
        }

        // Verificar si las contraseñas coinciden
        if ($contraseña !== $verificarContraseña) {
            return "Las contraseñas no coinciden.";
        }

        // Encriptar la contraseña antes de almacenarla en la base de datos
        $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la base de datos
        $nombre = self::$conexion->real_escape_string($nombre);
        $apellidos = self::$conexion->real_escape_string($apellidos);
        $consulta_insertar = "INSERT INTO Usuario (nombre, apellidos, correo, contraseña) VALUES ('$nombre', '$apellidos', '$correo', '$contraseña_encriptada')";
        if (self::$conexion->query($consulta_insertar) === TRUE) {
            return true;
        } else {
            return "Error al registrar usuario: " . self::$conexion->error;
        }
    }
    public static function correoRegistrado($correo) {
        self::conectar();
        $correo = self::$conexion->real_escape_string($correo);
        $consulta = "SELECT id FROM Usuario WHERE correo='$correo'";
        $resultado = self::$conexion->query($consulta);
        return $resultado->num_rows > 0;
    }
    
}
?>
