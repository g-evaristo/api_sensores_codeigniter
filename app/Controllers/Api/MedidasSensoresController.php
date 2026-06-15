<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

/**
 * Controller API
 * Retorna JSON ao inves de HTML
 */
class MedidasSensoresController extends ResourceController
{
    protected $modelName = 'App\\Models\\MedidasSensoresModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $medida_sensor = $this->model->find($id);

        if ($medida_sensor === null) {
            return $this->failNotFound('Medidas dos Sensores nao encontradas');
        }

        return $this->respond($medida_sensor);
    }

    public function create()
    {
        $dados = $this->request->getJSON(true);

        if (! is_array($dados) || $dados === []) {
            $dados = $this->request->getPost();
        }

        $dados = array_intersect_key($dados, array_flip([
            'MEDIDA_SENSOR_DADO','MEDIDA_SENSOR_UNIDADE_MEDIDA','MEDIDA_SENSOR_DATA','FK_SENSOR_ID'
        ]));

        if (    empty($dados['MEDIDA_SENSOR_DADO']) 
            ||  empty($dados['MEDIDA_SENSOR_UNIDADE_MEDIDA'])
            ||  empty($dados['MEDIDA_SENSOR_DATA'])
            ||  empty($dados['FK_SENSOR_ID'])) {
            return $this->failValidationErrors('existem dados obrigatorios não preenchidos!');
        }

        $id = $this->model->insert($dados);

        if ($id === false) {
            return $this->failValidationErrors($this->model->errors());
        }

        $aluno = $this->model->find($id);

        return $this->respondCreated($aluno);
    }
}

