<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/database.php';

class UsuarioController extends BaseController {
    // Método para listar todos los usuarios
    public function listar() {
        $usuarioModel = new Usuario($this->db);
        return [
            'status' => 'success',
            'data' => $usuarioModel->getAll()
        ]; // Devuelve la lista de usuarios con estado success
    }

    // Método para registrar un nuevo usuario
    public function registrar($nombre, $usuario, $contrasena) {
        // Validación de campos obligatorios
        if (empty($nombre) || empty($usuario) || empty($contrasena)) {
            return [
                'status' => 'error',
                'mensaje' => 'Todos los campos son obligatorios.'
            ];
        }

        $usuarioModel = new Usuario($this->db);
        $resultado = $usuarioModel->create($nombre, $usuario, $contrasena);
        
        // Verificar si el usuario fue registrado correctamente
        if ($resultado === true) {
            return [
                'status' => 'success',
                'mensaje' => 'Usuario registrado correctamente.'
            ];
        } else {
            return [
                'status' => 'error',
                'mensaje' => $resultado // Devuelve el mensaje de error del modelo
            ];
        }
    }

    // Método para iniciar sesión
    public function login($usuario, $contrasena) {
        // Validación de campos obligatorios
        if (empty($usuario) || empty($contrasena)) {
            return [
                'status' => 'error',
                'mensaje' => 'Usuario y contraseña son obligatorios.'
            ];
        }

        $usuarioModel = new Usuario($this->db);
        $resultado = $usuarioModel->authenticate($usuario, $contrasena);

        if ($resultado === true) {
            return [
                'status' => 'success',
                'mensaje' => 'Inicio de sesión exitoso.'
            ];
        } else {
            return [
                'status' => 'error',
                'mensaje' => 'Credenciales incorrectas.'
            ];
        }
    }

    // Método para consultar usuario por ID
    public function consultar($id) {
        if (empty($id)) {
            return [
                'status' => 'error',
                'mensaje' => 'ID de usuario no proporcionado.'
            ];
        }

        $usuarioModel = new Usuario($this->db);
        $usuario = $usuarioModel->findById($id);

        if ($usuario) {
            return [
                'status' => 'success',
                'data' => $usuario
            ];
        } else {
            return [
                'status' => 'error',
                'mensaje' => 'Usuario no encontrado.'
            ];
        }
    }

    // Método para modificar un usuario
    public function modificar($id, $nombre, $usuario, $contrasena = null) {
        // Validar si los campos requeridos están completos
        if (empty($id) || empty($nombre) || empty($usuario)) {
            return [
                'status' => 'error',
                'mensaje' => 'ID, nombre y usuario son obligatorios.'
            ];
        }

        $usuarioModel = new Usuario($this->db);
        $resultado = $usuarioModel->update($id, $nombre, $usuario, $contrasena);

        if ($resultado === true) {
            return [
                'status' => 'success',
                'mensaje' => 'Usuario modificado correctamente.'
            ];
        } else {
            return [
                'status' => 'error',
                'mensaje' => 'Error al modificar el usuario.'
            ];
        }
    }

    // Método para eliminar un usuario
    public function eliminar($id) {
        if (empty($id)) {
            return [
                'status' => 'error',
                'mensaje' => 'ID de usuario no proporcionado.'
            ];
        }

        $usuarioModel = new Usuario($this->db);
        $resultado = $usuarioModel->delete($id);

        if ($resultado === true) {
            return [
                'status' => 'success',
                'mensaje' => 'Usuario eliminado correctamente.'
            ];
        } else {
            return [
                'status' => 'error',
                'mensaje' => 'Error al eliminar el usuario.'
            ];
        }
    }
}
?>