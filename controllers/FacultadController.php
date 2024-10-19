<?php
require_once 'BaseController.php';
require_once 'models/Facultad.php';

class FacultadController extends BaseController {

    // Método para listar todas las facultades
    public function index() {
        $facultad = new Facultad();
        $data = $facultad->getAll();
        include 'views/listar_facultades.php';
    }

    // Método para mostrar el formulario de creación
    public function create() {
        include 'views/crear_facultad.php';
    }

    // Método para almacenar una nueva facultad
    public function store() {
        $facultad = new Facultad();
        $facultad->nombre = $_POST['nombre'];
        $facultad->save();
        header('Location: index.php?controller=Facultad&action=index');
    }

    // Método para editar una facultad existente
    public function edit($id) {
        $facultad = new Facultad();
        $facultad = $facultad->findById($id);
        include 'views/editar_facultad.php';
    }

    // Método para actualizar una facultad
    public function update($id) {
        $facultad = new Facultad();
        $facultad->nombre = $_POST['nombre'];
        $facultad->update($id);
        header('Location: index.php?controller=Facultad&action=index');
    }

    // Método para eliminar (borrado lógico) una facultad
    public function delete($id) {
        $facultad = new Facultad();
        $facultad->delete($id);
        header('Location: index.php?controller=Facultad&action=index');
    }
}
?>