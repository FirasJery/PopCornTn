<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
require("functions.php");

// get paiement

    $query = "SELECT * FROM evenement";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$paiement = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $paiement[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=events.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('id','titre', 'description', 'image_location','realisateur', 'date' ,'prix' ));

if (count($paiement) > 0) {
    foreach ($paiement as $row) {
        fputcsv($output, $row);
    }
}

?>