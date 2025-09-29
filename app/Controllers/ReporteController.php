<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Publisher;
use App\Models\Race;
use App\Models\Alignment;
use App\Models\Superhero;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class ReporteController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getReport1()
    {
        $html = view('reportes/reporte1');
        $html2PDF = new Html2Pdf();

        try {
            $html2PDF->writeHTML($html);
            $this->response->setHeader('Content-Type', 'application/pdf');
            $html2PDF->output();
        } catch (Html2PdfException $e) {
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getMessage();
        }
    }

    public function getReport2()
    {
        $data = [
            "area" => "Finanzas",
            "autor" => "Angie Cubilla Mendoza",
            "productos" => [
                ["id" => 1, "descripcion" => "Monitor", "precio" => 750],
                ["id" => 2, "descripcion" => "Impresora", "precio" => 500],
                ["id" => 3, "descripcion" => "Webcam", "precio" => 220]
            ]
        ];

        $html = view('reportes/reporte2', $data);

        try {
            $html2PDF = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8');
            $html2PDF->writeHTML($html);
            $this->response->setHeader('Content-Type', 'application/pdf');
            $html2PDF->output('Reporte-Finanzas.pdf');
        } catch (Html2PdfException $e) {
            $html2PDF->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getMessage();
        }
    }

    public function getReport3()
    {
        $query = "
            SELECT SH.id, SH.superhero_name, SH.full_name, PB.publisher_name, AL.alignment
            FROM superhero SH
            LEFT JOIN publisher PB ON SH.publisher_id = PB.id
            LEFT JOIN alignment AL ON SH.alignment_id = AL.id
            ORDER BY PB.publisher_name
            LIMIT 150;
        ";

        $rows = $this->db->query($query)->getResultArray();
        $data = ["rows" => $rows];

        $html = view('reportes/reporte3', $data);

        try {
            $html2PDF = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8');
            $html2PDF->writeHTML($html);
            $this->response->setHeader('Content-Type', 'application/pdf');
            $html2PDF->output('Reporte-superhero.pdf');
        } catch (Html2PdfException $e) {
            $html2PDF->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getMessage();
        }
    }
    public function getReport4()
    {
    }
    // filtro
    public function showUIReport()
    {
        $publisherModel = new Publisher();
        $raceModel = new Race();
        $alignmentModel = new Alignment();

        $data = [
            'publishers' => $publisherModel->findAll(),
            'races'      => $raceModel->findAll(),
            'alignments' => $alignmentModel->findAll(),
            'selected'   => [
                'publisher_id' => '',
                'race_id' => '',
                'alignment_id' => '',
            ],
            'superheros' => [],
        ];

        return view('reportes/rpt-ui', $data);
    }

    // Método para filtrar superhéroes según filtros enviados desde el formulario
    public function filterSuperheroes()
    {
        $publisher_id = $this->request->getPost('publisher_id');
        $race_id = $this->request->getPost('race_id');
        $alignment_id = $this->request->getPost('alignment_id');

        $filters = [
            'publisher_id' => $publisher_id,
            'race_id'      => $race_id,
            'alignment_id' => $alignment_id,
        ];

        $superheroModel = new Superhero();

        $superheros = $superheroModel->getFilteredSuperheroes($filters);

        $publisherModel = new Publisher();
        $raceModel = new Race();
        $alignmentModel = new Alignment();

        $data = [
            'publishers' => $publisherModel->findAll(),
            'races'      => $raceModel->findAll(),
            'alignments' => $alignmentModel->findAll(),
            'selected'   => $filters,
            'superheros' => $superheros,
        ];

        return view('reportes/filterSuperheroes', $data);
    }
    
    public function getExcel1(){
        return view('xlxs/demo1');
    }

     public function getReporte5($id)
  {
    $query = "SELECT * FROM view_superhero_powers WHERE id=" . $id . ";";
    $rows = $this->db->query($query);

    $super_hero_name = "";
    $full_name = "";
    if (count($rows->getResultArray()) > 0) {
      $super_hero_name = $rows->getResultArray()[0]['superhero_name'];
      $full_name = $rows->getResultArray()[0]['full_name'];
    }

    $data = [
      "rows" => $rows->getResultArray(),
      "super_hero_name" => $super_hero_name,
      "full_name" => $full_name,
    ];
    $html = view('reportes/reporte5', $data);
    try {
      $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', [10, 10, 10, 10]);
      $html2pdf->writeHTML($html);
      $this->response->setHeader('Content-Type', 'application/pdf');
      $html2pdf->Output('Reporte-superhero-powers.pdf');
      exit();

    } catch (Html2PdfException $e) {
      if (isset($html2pdf)) {
        $html2pdf->clean();
      }
      $formatter = new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }
}

