<?php

namespace App\Controllers;

use App\Models\ActivityModel;

class ActivityController {

    private $activityModel;
    private $classArray = [];

    public function __construct() {

        $this->activityModel = new ActivityModel();

    }

    public function list($id) {
            
            $activities = $this->activityModel->getElementsById($id);
    
            $activityArray = [];
    
            foreach ($activities as $activity ) {
                $activityArray[] = [
                    'codigo' => $activity['codigo'],
                    'descricao' => $activity['descricao'],
                    'data' => $activity['data'],
                    'turma_codigo' => $activity['turma_codigo'],
                ];
            }
    
            $this->render('activity', ['results' => $activityArray]);
    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo' => $_POST['codigo'],
                'descricao' => $_POST['descricao'],
                'data' => $_POST['data'],
                'turma_codigo' => $_POST['turma_codigo'],
            ];

            if ($this->activityModel->insert($data)) {
                header('Location: /atividades/' . $data['turma_codigo']);
                exit;
            } else {
                echo "Erro ao inserir atividade!";
            }
        }

    }
    
    public function registerPage() {
        $this->render("ActivityRegister");
    }

    private function render($view, $data = []) {
        extract($data);

        require_once __DIR__ . "/../Views/{$view}.php";
    }
}
