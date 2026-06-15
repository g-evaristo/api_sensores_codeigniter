<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

/**
 * Controller API
 * Retorna JSON ao inves de HTML
 */
class SensoresController extends ResourceController
{
    protected $modelName = 'App\\Models\\SensoresModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $sensor = $this->model->find($id);

        if ($sensor === null) {
            return $this->failNotFound('Sensores nao encontrado');
        }

        return $this->respond($sensor);
    }

    public function create()
    {
        $dados = $this->request->getJSON(true);

        if (! is_array($dados) || $dados === []) {
            $dados = $this->request->getPost();
        }

        $dados = array_intersect_key($dados, array_flip([
            'SENSOR_NOME','SENSOR_STATUS',
        ]));

        if (empty($dados['SENSOR_NOME']) || empty($dados['SENSOR_STATUS'])) {
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

