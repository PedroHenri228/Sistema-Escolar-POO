<?php

namespace App\Controllers;

use App\Models\ClassModel;

class ClassController {

    private $classModel;
    private $classArray = [];


    public function __construct() {

        $this->classModel = new ClassModel();

    }

    public function list() {

        $classes = $this->classModel->getElements();

        foreach ($classes as $class ) {
            $this->classArray[] = [
                'codigo' => $class['codigo'],
                'nome' => $class['nome'],
                'professor_codigo' => $class['professor_codigo'],
            ];
        }

        $this->render('Class', ['results' => $this->classArray]);

    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo' => $_POST['codigo'],
                'nome' => $_POST['nome'],
                'professor_codigo' => $_POST['professor_codigo'],
            ];

            if ($this->classModel->insert($data)) {
                header('Location: turmas');
                exit;
            } else {
                echo "Erro ao inserir turma!";
            }
        }
    }


    public function registerPage() {
        $this->render('ClassRegister');
    }


    public function delete($id) {
        if ($id) {
            try {

                $this->classModel->delete($id);
                header('Location: ../turmas');
                exit;
                
            } catch (\Exception $e) {

                error_log("Erro ao deletar turma: " . $e->getMessage());
            }

        } else {
            echo "Identificador não encontrado!";
        }
    }
    

    private function render($view, $data = []) {
        extract($data);

        require_once __DIR__ . "/../Views/{$view}.php";
    }

}