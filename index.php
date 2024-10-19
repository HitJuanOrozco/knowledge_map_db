<?php
session_start();
require_once 'config/config.php';
require_once 'controllers/UsuarioController.php';

// Utiliza la conexión establecida en config.php
$usuarioController = new UsuarioController($pdo);

// Definir la acción predeterminada 'inicio' si no se pasa ninguna acción
$action = $_GET['action'] ?? 'inicio';

switch ($action) {
    case 'inicio':
        // Listar usuarios y cargar la vista de inicio
        $usuarios = $usuarioController->listar();
        $mensajeExito = $_SESSION['mensaje_exito'] ?? null;
        unset($_SESSION['mensaje_exito']);
        require_once 'views/inicio.php';
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
                if ($usuarioController->login($_POST['usuario'], $_POST['contrasena'])) {
                    $_SESSION['nombre_usuario'] = $_POST['usuario'];
                    header("Location: index.php?action=inicio");
                    exit;
                } else {
                    $mensajeError = "Usuario o contraseña incorrectos.";
                }
            } else {
                $mensajeError = "Por favor, completa todos los campos.";
            }
        }
        require_once 'views/login.php';
        break;

    case 'registro':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['nombre']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
                if ($usuarioController->registrar($_POST['nombre'], $_POST['usuario'], $_POST['contrasena'])) {
                    $_SESSION['mensaje_exito'] = "Registro exitoso. Ahora puedes iniciar sesión.";
                    header("Location: index.php?action=inicio");
                    exit;
                } else {
                    $mensajeError = "El usuario ya existe. Por favor, elige otro nombre de usuario.";
                }
            } else {
                $mensajeError = "Por favor, completa todos los campos.";
            }
        }
        require_once 'views/registro.php';
        break;

    case 'modificar':
        if (isset($_GET['id'])) {
            $usuario = $usuarioController->consultar($_GET['id']);
            if ($usuario) {
                require_once 'views/modificar_usuario.php';
            } else {
                $mensajeError = "Usuario no encontrado.";
                require_once 'views/inicio.php';
            }
        } else {
            $mensajeError = "ID de usuario no proporcionado.";
            require_once 'views/inicio.php';
        }
        break;

    case 'actualizar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'] ?? null;
            $usuario = $_POST['usuario'] ?? null;
            $contrasena = $_POST['contrasena'] ?? null;

            // Actualizar usuario
            $mensajeExito = $usuarioController->modificar($id, $nombre, $usuario, $contrasena);
            $_SESSION['mensaje_exito'] = $mensajeExito;
            header("Location: index.php?action=listar");
            exit;
        }
        break;

    case 'listar':
        $usuarios = $usuarioController->listar();
        require_once 'views/listar_usuarios.php';
        break;

    case 'consultar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['id'])) {
                $usuario = $usuarioController->consultar($_POST['id']);
            } else {
                $mensajeError = "ID de usuario no proporcionado.";
            }
        }
        require_once 'views/consultar.php';
        break;

    case 'logout':
        session_destroy();
        header("Location: index.php?action=login");
        exit;

    default:
        $usuarios = $usuarioController->listar();
        require_once 'views/inicio.php';
        break;
}