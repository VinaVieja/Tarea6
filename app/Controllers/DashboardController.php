<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Alignment;
use App\Models\ReporteAlignment;
use App\Models\ReporteGender;
use App\Models\ReportePublisher;


class DashboardController extends BaseController
{
    public function getInforme1(): string
    {
        return view('dashboard/informe1');
    }

    public function getInforme2(): string
    {
        return view('dashboard/informe2');
    }
    public function getInforme3(){
        return view('dashboard/informe3');
    }

    public function getDataInforme2()
    {
        // Establecer el tipo de contenido como JSON
        $this->response->setContentType('application/json');

        // Datos de ejemplo: popularidad de superhéroes
        $data = [
            ["superhero" => "Batman", "popularidad" => 3],
            ["superhero" => "Ben10", "popularidad" => 10],
            ["superhero" => "Goku", "popularidad" => 5],
            ["superhero" => "Spiderman", "popularidad" => 7],
            ["superhero" => "Puka", "popularidad" => 8],
            ["superhero" => "Naruto", "popularidad" => 2],
            ["superhero" => "Doraemon", "popularidad" => 3],
            ["superhero" => "Hulk", "popularidad" => 5],
            ["superhero" => "Ironman", "popularidad" => 4],
            ["superhero" => "Capitan America", "popularidad" => 1]
        ];

        // Si no hay datos, retornar error con resumen vacío
        if (empty($data)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No encontramos super héroes',
                'resumen' => []
            ]);
        }

        sleep(3);
        // Si hay datos, retornar respuesta exitosa
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Popularidad',
            'resumen' => $data
        ]);
    }
    public function getDataInforme3(){
    $this->response->setContentType( "application/json");

    $reportAlignment = new ReporteAlignment(); 
    $data = $reportAlignment->findAll(); 

    // En caso no encontramos datos...
    if (!$data) {
        return $this->response->setJSON( [
            'success' => false,
            'message' => 'No encontramos super héroes',
            'resumen' => []
        ]);
    }

    // Datos encontramos, enviando JSON...
    return $this->response->setJSON([
        'success' => true,
        'message' => 'Alineaciones',
        'resumen' => $data
    ]);
}

    public function getDataInforme3Cache(){
        $this->response->setContentType( 'application/json');
        $cachekey ='resumenAlignment';
        $data = cache($cachekey);
        if (!$data == null){
            $reporteAlignment = new ReporteAlignment();
            $data = $reporteAlignment->findAll();
            cache()->save($cachekey, $data,3600);
        } 
        if (!$data) {
            return $this->response->setJSON( [
                'success' => false,
                'message' => 'No encontramos super héroes',
                'resumen' => []
            ]);
        }
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Alineaciones',
            'resumen' => $data
        ]);
    } // Asegúrate de importar el modelo

public function getDataInforme4()
{
    $this->response->setContentType('application/json');

    $reporteGender = new ReporteGender();
    $data = $reporteGender->findAll();

    if (!$data) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'No se encontraron datos de género.',
            'resumen' => []
        ]);
    }

    return $this->response->setJSON([
        'success' => true,
        'message' => 'Datos de género obtenidos correctamente.',
        'resumen' => $data
    ]);
}
public function getInforme4()
{
    return view('dashboard/informe4');
}

    public function getInforme5()
    {
        return view('dashboard/informe5');
    }

    public function getDataInforme5()
    {
        $this->response->setContentType('application/json');
        
        try {
            $reportePublisher = new ReportePublisher();
            $data = $reportePublisher->getPublisherReport();

            if (!$data) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No se encontraron datos de publishers.',
                    'resumen' => []
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Datos de publishers obtenidos correctamente.',
                'resumen' => $data
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al obtener datos: ' . $e->getMessage(),
                'resumen' => []
            ]);
        }
    }
}
