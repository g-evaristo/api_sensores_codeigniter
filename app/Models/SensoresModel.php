<?php

namespace App\Models;

use CodeIgniter\Model;

class SensoresModel extends Model
{

    protected $table = 'SENSORES';
    protected $primaryKey = 'SENSOR_ID';

    // Não é auto incremento
    protected $useAutoIncrement = false;

    // Campos permitidos
    protected $allowedFields = [
        'SENSOR_ID',
        'SENSOR_NOME',
        'SENSOR_STATUS'
    ];
}