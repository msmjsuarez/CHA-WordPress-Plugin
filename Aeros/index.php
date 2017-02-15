<?php
/*
 * This is an example API request to search for matching companies
 * */
require('api.php');
$api_key = 'O28yl5HvGb4NKsb4HcfX0_qm9SIbp7l0q4tUkGN2'; // Get your API key from here: https://developer.companieshouse.gov.uk
$str = 'Wales'; // The company name you're searching for
$api = new companiesHouseApi($api_key);
$response = $api->send('/search', ['q' => $str, 'items_per_page' => 300, 'start_index' => 100]); // Process API request
// Handle the API response below here...
echo '<p><pre>' . print_r($response, true) . '</pre></p>';
//echo json_encode($response);