<?php

/**
 * Composer autoload is included
 */
require_once base_path('vendor/autoload.php');

/**
 * Import necessary models to generate the pdf
 */
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * A new DomPDF instance is created
 */
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('title', $race->name . ' inscriptions');
$dompdf = new Dompdf($options);

/**
 * Stylesheet for the PDF is added
 */
$content = '<style>
            .table {
                width: 100%;
                border-collapse: collapse;
            }
            .table th, .table td {
                border: 1px solid #999;
                padding: 8px;
                text-align: center;
            }
            .table th {
                background-color: #e6e6e6;
                
                color: #333;
            }
            .table tr:nth-child(even) td {
                background-color: #f2f2f2;
            }
            .table tr:nth-child(odd) td {
                background-color: #f9f9f9;
            }
        </style>';

/**
 * The content of the PDF
 * A table with the inscripted competitors is created
 */
$content .= '<h1>Inscriptions in ' . $race->name .'</h1>';
$content .= '<table class="table">';
$content .= '<thead>';
$content .= '<tr>';
$content .= '<th>ID</th>';
$content .= '<th>Name</th>';
$content .= '<th>Dorsal</th>';
$content .= '<th>Insurance</th>';
$content .= '</tr>';
$content .= '</thead>';
$content .= '<tbody>';

foreach ($inscriptions as $inscription) {
    $content .= '<tr>';
    $content .= '<td>' . $inscription->competitors->id . '</td>';
    $content .= '<td>' . $inscription->competitors->name . '</td>';
    $content .= '<td>' . $inscription->number . '</td>';
    $content .= '<td>' . $inscription->insurances->name . '</td>';
    $content .= '</tr>';
}

$content .= '</tbody>';
$content .= '</table>';

/**
 * The content is loaded into the Dompdf instance
 */
$dompdf->loadHtml($content);

/**
 * The PDF is rendered
 */
$dompdf->render();

/**
 * The PDF is showed to the final user
 */
$dompdf->stream('inscriptions.pdf', [
    'Attachment' => false
]);