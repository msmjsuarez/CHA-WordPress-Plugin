<?php
/*
* Plugin Name: UK Company Data - Companies House
* Description: This plugin is use to fetch UK company information from Companies House.
* Version: 1.0
* Author: MJ Suarez
* Author URI: https://github.com/msmjsuarez
*/
define( 'PLUGIN_DIR', dirname(__FILE__).'/' );  
define( 'PLUGIN_URL', get_site_url().'/wp-content/plugins/uk-company-data-companies-house/');
add_shortcode("uk_company_data_companies_house", "uk_company_data_companies_house_function");

function uk_company_data_companies_house_function()
{
 
    require_once(PLUGIN_DIR.'chapi.php');
    require_once(PLUGIN_DIR.'db/wpdb_queries.class.php'); 
    require_once(PLUGIN_DIR.'db/UK_Company.class.php');

 
    $api_key = 'yCfxOFvgfus8UdlYRLlpGqNFKtEA4dqwzyEkOPiq';
    $str = 'a'; // The company name you're searching for
    $api = new companiesHouseApi($api_key);

	$j = 0;
    for ($i=0; $i<50; $i++) {
    	$response = $api->send('/search/companies', ['q' => $str, 'items_per_page' => 100, 'start_index' => $j]);
    	$j++;
    	if($response <= 0) break 1;
    	else echo '<p><pre>The iteration is number:' .$i.'<br>'. print_r($response, true) . '</pre></p>';
	}



























	// $company_number = (!empty($_GET['company_number'])) ? $_GET['company_number'] : '';
 	// $companies = (!empty($company_number)) ? $api->send('/company/'. $company_number):Array();

    echo '<p><pre>' . print_r($response, true) . '</pre></p>';

	// $company_name_orig = isset($companies['company_name']) ? $companies['company_name']:'';
 // 	$company_name = preg_replace('#[ -]+#', '-', $company_name_orig);

	// $html = file_get_html("https://companycheck.co.uk/company/".$company_number."/".$company_name."/companies-house-data");

	// 	foreach($html->find('div#key-financials table') as $search) {
	// 		$tr = $search->find('tr', 1);
	// 		$trtostring = $tr->text();
	// 		$trtostring = preg_replace("/ {2,}/", " ", $tr->text() );
	// 		$cash = explode(" ", trim($trtostring));
	// 		// print "<pre>";
	// 		// print_r($cash);
	// 		// print "</pre>";
	// 		if((!empty($cash)) and (!empty($cash[1]))) {
	//  	        echo 'Cash: '.$cash[count($cash)-1];
	// 		}

	// 		$tr = $search->find('tr', 2);
	// 		$trtostring = $tr->text();
	// 		$trtostring = preg_replace("/ {2,}/", " ", $tr->text() );
	// 		$net = explode(" ", trim($trtostring));
	// 		if((!empty($net)) and (!empty($net[2]))) { 
	//  	        echo '<br>Net Worth: '.$net[count($net)-1];	
	// 		}

	// 		$tr = $search->find('tr', 4);
	// 		$trtostring = $tr->text();
	// 		$trtostring = preg_replace("/ {2,}/", " ", $tr->text() );
	// 		$current_assets = explode(" ", trim($trtostring));
	// 		if((!empty($current_assets)) and (!empty($current_assets[4]))) { 
	//  	        echo '<br>Total Current Assets: '.$current_assets[count($current_assets)-1];	
	// 		}

	// 		$tr = $search->find('tr', 3);
	// 		$trtostring = $tr->text();
	// 		$trtostring = preg_replace("/ {2,}/", " ", $tr->text() );
	// 		$current_liabilities = explode(" ", trim($trtostring));
	// 		if((!empty($current_liabilities)) and (!empty($current_liabilities[3]))) { 
	//  	        echo '<br>Total Current Liabilities: '.$current_liabilities[count($current_liabilities)-1];	
	// 		}
	// 		if((empty($cash[1])) and (empty($net[2])) and (empty($current_assets[4])) and (empty($current_liabilities[3]))) { 
	// 			echo 'Financial Status Unavailable for <strong>'.$company_name_orig.'</strong>';
	// 		} 
	// 	}
}

