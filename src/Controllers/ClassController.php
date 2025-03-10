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
            } else {
                echo "Erro ao inserir turma!";
            }
        }
    }


    public function registerPage() {
        $this->render('ClassRegister');
    }

    private function render($view, $data = []) {
        extract($data);

        require_once __DIR__ . "/../Views/{$view}.php";
    }

}