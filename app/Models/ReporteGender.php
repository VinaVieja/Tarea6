<?php

namespace App\Models;

use CodeIgniter\Model;

class ReporteGender extends Model
{
    protected $table      = 'view_superhero_gender';
    protected $primaryKey = 'genero'; // puedes usar un campo único como clave "falsa"
    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useTimestamps  = false;

    protected $allowedFields = ['genero', 'total'];

    protected $skipValidation = true;
}
