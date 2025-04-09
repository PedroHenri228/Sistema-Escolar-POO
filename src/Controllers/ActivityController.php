<?php

namespace App\Controllers;

use App\Models\ActivityModel;

class ActivityController {

    private $activityModel;
    private $classArray = [];
    private $idActivity;

    public function __construct() {

        $this->activityModel = new ActivityModel();

    }

    public function list() {
            
            $id = $_GET['codigo'] ?? null;

            $this->idActivity = $id;

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

    
    public function registerPage() {
        $id = $_GET['codigo'] ?? null;
        
        if ($id) {
            $this->render("ActivityRegister", ['id' => $id]);
        } else {
            echo "Erro: Código da turma não informado.";
            return; // Encerra a execução para evitar código desnecessário
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['descricao']) || empty($_POST['date']) || empty($_POST['turma_codigo'])) {
                echo "Erro: Todos os campos são obrigatórios!";
                return;
            }
    
            $data = [
                'descricao' => trim($_POST['descricao']),
                'date' => $_POST['date'],
                'turma_codigo' => $_POST['turma_codigo'],
            ];
    
            if ($this->activityModel->insert($data)) {
                header('Location: atividades?codigo=' . urlencode($data['turma_codigo']));
                exit;
            } else {
                echo "Erro ao inserir atividade!";
            }
        }
    }
    
    public function delete($id) {
        if ($id) {
            try {

                
                $this->activityModel->delete($id);

                $idByclass = $this->activityModel->getIdbyClass($id);

                header('Location: ../atividades?codigo=' . $idByclass['turma_codigo']);
                exit;
                
            } catch (\Exception $e) {

                error_log("Erro ao deletar atividade: " . $e->getMessage());
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
