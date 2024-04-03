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
$content .= '<th>Address</th>';
$content .= '<th>Logo</th>';
$content .= '</tr>';
$content .= '</thead>';
$content .= '<tbody>';

foreach ($sponsors as $sponsor) {
    $content .= '<tr>';
    $content .= '<td>' . $sponsor->id . '</td>';
    $content .= '<td>' . $sponsor->name . '</td>';
    $content .= '<td>' . $sponsor->address . '</td>';
    $content .= '<td>' . $sponsor->logo . '</td>';
    // $content .= '<td><img src="../../../../public/images/' . $sponsor->logo . '" alt="' . $sponsor->name . '" style="max-width: 30px;"></td>';
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
$dompdf->stream('sponsorships.pdf', [
    'Attachment' => false
]);