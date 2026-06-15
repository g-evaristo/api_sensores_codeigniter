<?php

namespace App\Models;

use CodeIgniter\Model;

class MedidasSensoresModel extends Model
{

    protected $table = 'MEDIDAS_SENSORES';
    protected $primaryKey = 'MEDIDA_SENSOR_ID';

    protected $useAutoIncrement = true;

    // Campos permitidos
    protected $allowedFields = [
        'MEDIDA_SENSOR_ID',
        'MEDIDA_SENSOR_DADO',
        'MEDIDA_SENSOR_UNIDADE_MEDIDA',
        'MEDIDA_SENSOR_DATA',
        'FK_SENSOR_ID'
    ];
}