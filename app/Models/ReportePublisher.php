<?php

namespace App\Models;
use CodeIgniter\Model;

class ReportePublisher extends Model
{
    protected $table = 'view_superhero_publisher';  // Usamos la vista
    protected $primaryKey = 'id';
    protected $allowedFields = ['publisher', 'total'];

    public function getPublisherReport()
    {
        return $this->findAll();
    }
}
