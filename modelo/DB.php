<?php
class DB {
    private static $conexion;

    public static function conectar() {
        $host = "localhost"; 
        $usuario = "root2";
        $contraseña = "test"; 
        $base_datos = "tfg"; 

        self::$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

        if (self::$conexion->connect_error) {
            die("Error de conexión: " . self::$conexion->connect_error);
        }
    }
    public static function ejecutarConsulta($consulta) {
        self::conectar();
        $resultset = array();
        $resultado = self::$conexion->query($consulta);
        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }
    public static function obtenerNombre($correo) {
        self::conectar();
        $consulta = "SELECT nombre FROM usuario WHERE LOWER(correo) = LOWER('$correo')";
        $resultado = self::ejecutarConsulta($consulta);
        if (count($resultado) > 0) {
            return $resultado[0]['nombre'];
        } else {
            return null;
        }
    }

    

    public static function verificaCliente($correo, $contraseña) {
        self::conectar();
        $correo = self::$conexion->real_escape_string($correo);
        $contraseña = self::$conexion->real_escape_string($contraseña);

        // Lo que va a hacer es obtener la contraseña que este asignada a ese correo/ usuario
        $consulta = "SELECT contraseña FROM usuario WHERE correo = '$correo'";
        $resultado = self::$conexion->query($consulta);
        
        if ($resultado !== false && $resultado->num_rows > 0) {
            // Para poder comparar las contraseñas, cifrada y no cifrada necesitaremos usar el password verify
            $fila = $resultado->fetch_assoc();
            $hashedPassword = $fila['contraseña'];
            // Verifica la contraseña proporcionada por el usuario con la contraseña obtenida de la base de datos encriptada hash
            if (password_verify($contraseña, $hashedPassword)) {
                return true;
            } else {
                return false;
            }
        } else {
            // No se ha encontrado el correo en la base de datos
            return false;
        }




   
    }
    
    public static function registrarUsuario($nombre, $apellidos, $correo, $contraseña) {
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

    public static function agregardireccion($correo, $direccion, $ciudad, $codigo_postal, $pais) {
        self::conectar();

       // Consulta de verificación
    $consulta_verificacion = "SELECT * FROM direcciones WHERE correo_usuario = '$correo' AND direccion = '$direccion' AND ciudad = '$ciudad' AND codigo_postal = '$codigo_postal' AND pais = '$pais'";
    $resultado = self::$conexion->query($consulta_verificacion);

    if ($resultado->num_rows > 0) {
            return "Ya tienes registrada esta dirección.";
        } else{
            $consulta= "INSERT INTO direcciones (correo_usuario, direccion, ciudad, codigo_postal, pais) VALUES ('$correo', '$direccion', '$ciudad', '$codigo_postal', '$pais')";
            if (self::$conexion->query($consulta) === TRUE) {
                return "Dirección guardada con Éxito ";
            } else {
                return "Error al registrar usuario: " . self::$conexion->error;
            }
        }
        
       
    }

    public static function agregarPedido($correo, $id_direccion, $precio_total, $estado) {
        self::conectar();

       // Consulta de verificación
       $consulta = "INSERT INTO pedido (correo_usuario, id_direccion, precio_total, estado) VALUES ('$correo', '$id_direccion', '$precio_total', '$estado')";
       if (self::$conexion->query($consulta) === TRUE) {
           // Si la inserción fue exitosa, retornamos el ID del pedido recién insertado
        $id_pedido = self::$conexion->insert_id;
        return $id_pedido;
       } else {
           return "Fallo al guardar el pedido: " . self::$conexion->error;
       }
    }
    public static function agregarDetallePedido($id_pedido, $cod_producto, $cantidad, $precio_unitario) {
        self::conectar();

       // Consulta de verificación
       $consulta = "INSERT INTO detalle_pedido (id_pedido, cod_producto, cantidad, precio_unitario) VALUES ('$id_pedido', '$cod_producto', '$cantidad', '$precio_unitario')";
       if (self::$conexion->query($consulta) === TRUE) {
           return "Pedido detalle guardado con éxito";
       } else {
           return "Fallo al guardar el detalle_pedido" . self::$conexion->error;
       }
    }


    public static function cambiarcontraseña($contraseña, $contraseña_nueva, $correo) {
        self::conectar();

        // Validar la contraseña
        if ($contraseña !== $contraseña_nueva) {
            return "Las contraseñas no coinciden.";
        }

        if (!preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/', $contraseña_nueva)) {
            return "La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.";
        }

        
        $hashed_password = password_hash($contraseña_nueva, PASSWORD_BCRYPT);
        $consulta_cambio = "UPDATE usuario SET contraseña = '$hashed_password' WHERE correo = '$correo'";
        $resultado = self::$conexion->query($consulta_cambio);
        if ($resultado === TRUE) {
            return "Ha sido Actualizada con exito el usuario $correo y su contraseña $contraseña_nueva";
        } else{
            return "Error al Actualizar la contraseña" . self::$conexion->error;
        }



       // Consulta de verificación
    $consulta_verificacion = "SELECT * FROM direcciones WHERE correo_usuario = '$correo' AND direccion = '$direccion' AND ciudad = '$ciudad' AND codigo_postal = '$codigo_postal' AND pais = '$pais'";
    $resultado = self::$conexion->query($consulta_verificacion);

    if ($resultado->num_rows > 0) {
            return "Ya tienes registrada esta dirección.";
        } else{
            $consulta= "INSERT INTO direcciones (correo_usuario, direccion, ciudad, codigo_postal, pais) VALUES ('$correo', '$direccion', '$ciudad', '$codigo_postal', '$pais')";
            if (self::$conexion->query($consulta) === TRUE) {
                return "Dirección guardada con Éxito ";
            } else {
                return "Error al registrar usuario: " . self::$conexion->error;
            }
        }
        
       
    }




    public static function correoRegistrado($correo) {
        self::conectar();
        $correo = self::$conexion->real_escape_string($correo);
        $consulta = "SELECT id FROM usuario WHERE correo='$correo'";
        $resultado = self::$conexion->query($consulta);
        return $resultado->num_rows > 0;
    }


    

}
?>
