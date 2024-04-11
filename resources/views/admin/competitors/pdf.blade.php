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
$options->set('title', $competitor->name . ' ticket');
$dompdf = new Dompdf($options);

/**
 * Stylesheet for the PDF is added
 */
$total = 0;
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
            table {
                width: 100%;
            }
            td {
                width: 33%;
            }
            th {
                width: 33%;
            }
            .centertd {
                text-align: center;
            }
        </style>';

/**
 * The content of the PDF
 * A table with the inscripted competitors is created
 */
$content .= '<h1>' . $competitor->name .'\'s ticket</h1>';
if(count($races) > 0) {
    $content .= '<table class="table">';
    $content .= '<thead>';
    $content .= '<tr>';
    $content .= '<th>ID</th>';
    $content .= '<th>Race</th>';
    $content .= '<th>Price</th>';
    $content .= '</tr>';
    $content .= '</thead>';
    $content .= '<tbody>';

    if($competitor->partner) {
        foreach ($races as $race) {
            $content .= '<tr>';
            $content .= '<td>' . $race->id . '</td>';
            $content .= '<td>' . $race->name . '</td>';
            $content .= '<td>' . $race->inscription*0.8 . '€</td>';
            $content .= '</tr>';
            $total += $race->inscription;
        }
    } else {
        foreach ($races as $race) {
            $content .= '<tr>';
            $content .= '<td>' . $race->id . '</td>';
            $content .= '<td>' . $race->name . '</td>';
            $content .= '<td>' . $race->inscription . '€</td>';
            $content .= '</tr>';
            $total += $race->inscription;
        }
    }

    $content .= '</tbody>';
    $content .= '</table>';
    $content .= '<br>';
}

if($competitor->partner) {
    $content .= '<table class="table">';
    $content .= '<thead>';
    $content .= '<tr>';
    $content .= '<th>ID</th>';
    $content .= '<th>Company</th>';
    $content .= '<th>Price</th>';
    $content .= '</tr>';
    $content .= '</thead>';
    $content .= '<tbody>';
    $content .= '<tr>';
    $content .= '<td>' . $company->id . '</td>';
    $content .= '<td>' . $company->name . '</td>';
    $content .= '<td>' . $company->partner_price . '€</td>';
    $content .= '</tr>';
    $content .= '</tbody>';
    $content .= '</table>';
    $total += $company->partner_price;
}

$content .= '<table>';
$content .= '<tr>';
$content .= '<td colspan="2"><h2>Total</h2></td>';
$content .= '<td class="centertd">' . $total . '€</td>';
$content .= '</tr>';
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