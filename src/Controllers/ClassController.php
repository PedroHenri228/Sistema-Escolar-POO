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

    private function render($view, $data = []) {
        extract($data);

        require_once __DIR__ . "/../Views/{$view}.php";
    }

}