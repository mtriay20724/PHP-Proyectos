<?php

    // Práctica 14: Generación de PDF con FPDF
    // Requisito: carpeta "fpdf" (descargada de http://www.fpdf.org/) junto a este script.
    require('fpdf/fpdf.php');

    /* ---------- 1. DATOS ESTRUCTURADOS (array) ---------- */
    $centro = 'IES Francisco Ayala';
    $grupo  = '2º DAW';
    $curso  = '2026/2027';
    $tutor  = 'Ana García Ruiz';

    $alumnos = [
        ['apellidos' => 'Fernández Molina', 'nombre' => 'Lucía'],
        ['apellidos' => 'García López',      'nombre' => 'Carlos'],
        ['apellidos' => 'Martín Ortega',     'nombre' => 'Sofía'],
        ['apellidos' => 'Núñez Castro',      'nombre' => 'Álvaro'],
        ['apellidos' => 'Pérez Jiménez',     'nombre' => 'Marta'],
        ['apellidos' => 'Ruiz Serrano',      'nombre' => 'Javier'],
        ['apellidos' => 'Torres Vega',       'nombre' => 'Inés'],
    ];
    // Ordenamos por apellidos
    usort($alumnos, fn($a, $b) => strcmp($a['apellidos'], $b['apellidos']));

    /* ---------- 2. UTILIDAD: UTF-8 -> Windows-1252 (tildes y ñ en FPDF) ---------- */
    function t($texto) {
        return iconv('UTF-8', 'windows-1252//TRANSLIT', $texto);
    }

    /* ---------- 3. CLASE PDF PERSONALIZADA ---------- */
    class PDF extends FPDF
    {
        public $centro;

        // Cabecera: logotipo + nombre del centro (se repite en cada página)
        function Header()
        {
            $this->Image('logo.png', 10, 8, 25);
            $this->SetFont('Times', 'B', 20);
            $this->SetTextColor(20, 60, 120);
            $this->Cell(0, 10, t($this->centro), 0, 1, 'C');
            $this->SetFont('Courier', 'I', 10);
            $this->SetTextColor(100, 100, 100);
            $this->Cell(0, 6, t('Departamento de Informática'), 0, 1, 'C');
            $this->SetDrawColor(20, 60, 120);
            $this->SetLineWidth(0.6);
            $this->Line(10, 35, 200, 35);
            $this->Ln(14);
        }

        // Pie: fecha y número de página
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Helvetica', 'I', 8);
            $this->SetTextColor(120, 120, 120);
            $this->Cell(0, 10, t('Generado el ' . date('d/m/Y') . '  -  Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
        }

        // Cabecera de la tabla
        function TableHeader($w)
        {
            $this->SetFont('Helvetica', 'B', 11);
            $this->SetFillColor(20, 60, 120);
            $this->SetTextColor(255, 255, 255);
            $this->Cell($w[0], 9, t('Nº'), 1, 0, 'C', true);
            $this->Cell($w[1], 9, t('Apellidos'), 1, 0, 'C', true);
            $this->Cell($w[2], 9, t('Nombre'), 1, 1, 'C', true);
        }
    }

    /* ---------- 4. CONSTRUCCIÓN DEL DOCUMENTO ---------- */
    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->centro = $centro;
    $pdf->AliasNbPages();
    $pdf->SetTitle(t("Listado de alumnos $grupo"));
    $pdf->SetAuthor(t($centro));
    $pdf->AddPage();

    // Título (fuente Times en negrita)
    $pdf->SetFont('Times', 'B', 18);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(0, 10, t('LISTADO OFICIAL DE ALUMNOS'), 0, 1, 'C');

    // Datos del grupo (fuente Helvetica)
    $pdf->Ln(2);
    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(30, 8, t('Grupo:'));
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(60, 8, t($grupo));
    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(30, 8, t('Curso:'));
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(0, 8, t($curso), 0, 1);
    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(30, 8, t('Tutor/a:'));
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(0, 8, t($tutor), 0, 1);

    // Párrafo introductorio (fuente Courier cursiva)
    $pdf->Ln(4);
    $pdf->SetFont('Courier', 'I', 10);
    $pdf->SetTextColor(70, 70, 70);
    $pdf->MultiCell(0, 5, t('A continuación se relacionan los alumnos matriculados en el grupo, ordenados alfabéticamente por apellidos. Total de alumnos: ' . count($alumnos) . '.'));
    $pdf->Ln(6);

    // Tabla de datos alineada
    $w = [15, 95, 80];           // anchos de columna (suman 190 mm)
    $pdf->TableHeader($w);
    $pdf->SetFont('Helvetica', '', 11);
    $pdf->SetTextColor(0, 0, 0);

    $fill = false;
    foreach ($alumnos as $i => $al) {
        // Salto de página con cabecera de tabla repetida
        if ($pdf->GetY() > 265) {
            $pdf->AddPage();
            $pdf->TableHeader($w);
            $pdf->SetFont('Helvetica', '', 11);
            $pdf->SetTextColor(0, 0, 0);
        }
        $pdf->SetFillColor(232, 240, 252);
        $pdf->Cell($w[0], 8, $i + 1, 1, 0, 'C', $fill);
        $pdf->Cell($w[1], 8, t($al['apellidos']), 1, 0, 'L', $fill);
        $pdf->Cell($w[2], 8, t($al['nombre']), 1, 1, 'L', $fill);
        $fill = !$fill;          // filas alternas
    }

    // Salida: 'I' = mostrar en el navegador; 'D' = descargar; 'F' = guardar en servidor
    $pdf->Output('I', 'listado_alumnos.pdf');
?>