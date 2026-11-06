<?php
require __DIR__ . '/../../../fpdf/fpdf.php';   // ← CAMBIO: ruta correcta

$grupo = "2DAW";
$curso = "Curso 2026-2027";
$centro = "IES FRANCISCO AYALA";

$alumnos = [
    ["nombre" => "Dario", "apellidos"=>"Gomez", "notas"=>[8,6,8]],
    ["nombre"=>"Marc", "apellidos"=>"Triay", "notas"=>[9,9,8]],
    ["nombre"=>"Jose Antonio", "apellidos"=>"Dionisio", "notas"=>[5,5,2]],
    ["nombre"=> "Cristian", "apellidos"=>"Garcia", "notas"=>[4,2,10]],
    ["nombre"=> "Mohammad", "apellidos"=>"asjdhfks", "notas"=>[1,2,3]],
];

usort($alumnos, fn($a, $b) => strcmp($a["apellidos"], $b["apellidos"]));
foreach ($alumnos as &$alumno) {
    $alumno["media"] = array_sum($alumno["notas"]) / count($alumno["notas"]);
    $alumno["estado"] = $alumno["media"] >= 5 ? "Apto" : "No apto";
}
unset($alumno);


// FPDF no entiende UTF-8: convertimos los textos con tildes y eñes
function t(string $texto): string
{
    return iconv("UTF-8", "windows-1252", $texto);
}

class PDF extends FPDF{
    public string $titulo = "";   // ← CAMBIO: propiedad declarada

    function Header(){
        $this->Image(__DIR__ . "/logo.png", 10, 8, 22);   // ← CAMBIO: ruta del logo segura
        $this->SetFont("Times", "B", 18);
        $this->SetTextColor(30, 70, 140);
        $this->Cell(0, 10, t($this->titulo), 0, 1, "C");
        $this->SetFont("Times", "I", 11);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 6, t("Listado oficial de alumnos"), 0, 1, "C");
        $this->Ln(12);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont("Arial", "I", 8);
        $this->SetTextColor(128);
        $this->Cell(0, 10, t("Página ") . $this->PageNo() . "/{nb}", 0, 0, "C");
    }
}
// ---------- 4. GENERAR el PDF ----------
$pdf = new PDF();
$pdf->titulo = $centro;
$pdf->AliasNbPages();      // para el {nb} del pie (total de páginas)
$pdf->AddPage();

// Datos del grupo
$pdf->SetFont("Arial", "B", 13);
$pdf->SetTextColor(0);
$pdf->Cell(0, 8, t("Grupo: $grupo"), 0, 1);
$pdf->SetFont("Arial", "", 12);
$pdf->Cell(0, 8, t($curso), 0, 1);
$pdf->Ln(5);

// Cabecera de la tabla
$anchos = [10, 55, 40, 30, 30];
$columnas = ["Nº", "Apellidos", "Nombre", "Nota media", "Estado"];

$pdf->SetFont("Arial", "B", 11);
$pdf->SetFillColor(30, 70, 140);
$pdf->SetTextColor(255);
foreach ($columnas as $i => $col) {
    $pdf->Cell($anchos[$i], 9, t($col), 1, 0, "C", true);
}
$pdf->Ln();

// Filas de la tabla (con colores alternos)
$pdf->SetFont("Courier", "", 11);
$pdf->SetTextColor(0);
$relleno = false;

foreach ($alumnos as $n => $a) {
    $pdf->SetFillColor(225, 235, 250);
    $pdf->Cell($anchos[0], 8, $n + 1, 1, 0, "C", $relleno);
    $pdf->Cell($anchos[1], 8, t($a["apellidos"]), 1, 0, "L", $relleno);
    $pdf->Cell($anchos[2], 8, t($a["nombre"]), 1, 0, "L", $relleno);
    $pdf->Cell($anchos[3], 8, number_format($a["media"], 2, ",", ""), 1, 0, "R", $relleno);

    // Estado en verde o rojo
    $a["estado"] === "Apto" ? $pdf->SetTextColor(0, 130, 0) : $pdf->SetTextColor(200, 0, 0);
    $pdf->Cell($anchos[4], 8, $a["estado"], 1, 0, "C", $relleno);
    $pdf->SetTextColor(0);

    $pdf->Ln();
    $relleno = !$relleno;
}

// Resumen final
$aprobados = count(array_filter($alumnos, fn($a) => $a["estado"] === "Apto"));
$pdf->Ln(6);
$pdf->SetFont("Times", "B", 12);
$pdf->Cell(0, 8, t("Total de alumnos: " . count($alumnos) . "   ·   Aptos: $aprobados"), 0, 1);
$pdf->SetFont("Times", "I", 10);
$pdf->Cell(0, 8, t("Documento generado el " . date("d/m/Y")), 0, 1);

// "I" = mostrarlo en el navegador. Usa "D" para descargarlo o "F" para guardarlo.
$pdf->Output("I", "listado_2DAW.pdf");