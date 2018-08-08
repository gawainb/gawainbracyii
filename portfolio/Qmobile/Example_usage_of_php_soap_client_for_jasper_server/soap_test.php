<?php
include 'jasper_server_client.php';

/* JasperServer credentials:url, username, password.
NOTE: url via localhost is for local dev onlyl  */

$jasper_url = "http://localhost:8080/jasperserver/services/repository";
$jasper_username = "jasperadmin";
$jasper_password = "jasperadmin";


// instantiate client using supplied credentials
$client = new jasper_server_client($jasper_url, $jasper_username, $jasper_password);

// request specific info
$report_unit = "/reports/multipharm/QMedRx/PharmAnalysis";
$report_format = "HTML";
$report_params = array();

//  sample parameter array if we ever need to supply any
//  $report_params = array('foo' => 'bar', 'fruit' => 'apple');

// request report, store result
$result = $client->requestReport($report_unit, $report_format,$report_params);



//substr strips out headers for file output
echo  substr($result, 82);


// name of output file
$file = 'PharmacyAnalsys.html';
file_put_contents($file, substr($result, 82));


//HTML Header, unused for now
header('Content-type: text/html');
