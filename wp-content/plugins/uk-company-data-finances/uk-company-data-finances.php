<?php
/*
* Plugin Name: UK Company Data Finances Scraper
* Description: This plugin is use to scrape UK companies finances information.
* Version: 1.0
* Author: MJ Suarez
* Author URI: https://github.com/msmjsuarez
*/
define( 'PLUGIN_DIR', dirname(__FILE__).'/' );  
define( 'PLUGIN_URL', get_site_url().'/wp-content/plugins/uk-company-data-finances/');
add_shortcode("uk_company_data_finances_data", "uk_company_data_finances_function");

function uk_company_data_finances_function()
{
    require_once(PLUGIN_DIR.'chapi.php'); 
    require_once(PLUGIN_DIR.'simple_html_dom.php'); 
    $api_key = 'yCfxOFvgfus8UdlYRLlpGqNFKtEA4dqwzyEkOPiq';
    $api = new companiesHouseApi($api_key);
	$company_number = (!empty($_GET['company_number'])) ? $_GET['company_number'] : '';
    $companies = (!empty($company_number)) ? $api->send('/company/'. $company_number):Array();
	$company_name_orig = isset($companies['company_name']) ? $companies['company_name']:'';
 	$company_name = preg_replace('#[ -]+#', '-', $company_name_orig);

	$html = file_get_html("https://companycheck.co.uk/company/".$company_number."/".$company_name."/companies-house-data");

		foreach($html->find('div#key-financials table') as $search) {
			$tr = $search->find('tr', 1);
			$trtostring = $tr->text();
			$trtostring = preg_replace("/ {2,}/", " ", $tr->text() );
			$cash = explode(" ", trim($trtostring));
			// print "<pre>";
			// print_r($cash);
			// print "</pre>";
			if((!empty($cash)) and (!empty($cash[1]))) {
	 	        echo 'Cash: '.$cash[count($cash)-1];
			}

			$tr = $search->find('tr', 2);
			$trtostring = $tr->text();
			$trtostring = preg_replace("/ {2,}/", " ", $tr->text() );
			$net = explode(" ", trim($trtostring));
			if((!empty($net)) and (!empty($net[2]))) { 
	 	        echo '<br>Net Worth: '.$net[count($net)-1];	
			}

			$tr = $search->find('tr', 4);
			$trtostring = $tr->text();
			$trtostring = preg_replace("/ {2,}/", " ", $tr->text() );
			$current_assets = explode(" ", trim($trtostring));
			if((!empty($current_assets)) and (!empty($current_assets[4]))) { 
	 	        echo '<br>Total Current Assets: '.$current_assets[count($current_assets)-1];	
			}

			$tr = $search->find('tr', 3);
			$trtostring = $tr->text();
			$trtostring = preg_replace("/ {2,}/", " ", $tr->text() );
			$current_liabilities = explode(" ", trim($trtostring));
			if((!empty($current_liabilities)) and (!empty($current_liabilities[3]))) { 
	 	        echo '<br>Total Current Liabilities: '.$current_liabilities[count($current_liabilities)-1];	
			}
			if((empty($cash[1])) and (empty($net[2])) and (empty($current_assets[4])) and (empty($current_liabilities[3]))) { 
				echo 'Financial Status Unavailable for <strong>'.$company_name_orig.'</strong>';
			}

		}
}
