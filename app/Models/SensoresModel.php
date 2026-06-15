<?php

namespace App\Models;

use CodeIgniter\Model;

class SensoresModel extends Model
{

    protected $table = 'SENSORES';
    protected $primaryKey = 'SENSOR_ID';

    protected $useAutoIncrement = true;

    // Campos permitidos
    protected $allowedFields = [
        'SENSOR_ID',
        'SENSOR_NOME',
        'SENSOR_STATUS'
    ];
}