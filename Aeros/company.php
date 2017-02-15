<!DOCTYPE html>

<html lang="en">



    <head>



        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Company Data</title>



        <!-- CSS -->

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

		<link rel="stylesheet" href="Aeros/assets/bootstrap/css/bootstrap.css">



		<style type="text/css">

			.wrapper {

				margin-top: 60px;

				width: 100%;

				overflow: hidden;

			}

		</style>



    </head>



    <?php

    /*

     * This is an example API request to search for matching companies

     * */

    require('Aeros/api.php');

    $api_key = 'O28yl5HvGb4NKsb4HcfX0_qm9SIbp7l0q4tUkGN2'; // Get your API key from here: https://developer.companieshouse.gov.uk

    $str = 'Wales'; // The company name you're searching for

    $api = new companiesHouseApi($api_key);



    $companyNumber = isset($_GET['company_number']) ? $_GET['company_number']:'';

    $companies = isset($_GET['company_number']) ? $api->send('/company/'. $companyNumber):Array();

    $officers = isset($_GET['company_number']) ? $api->send('/company/'. $companyNumber .'/officers'):Array();

    $reg_office_adds = isset($_GET['company_number']) ? $api->send('/company/'. $companyNumber .'/registered-office-address'):Array();



    // Handle the API response below here...

    //echo '<p><pre>' . print_r($officers, true) . '</pre></p>';

    //echo json_encode($companies);

    ?>



    <body>



		<div class="wrapper">

			<div class="row">

				<div class="col-sm-4 col-sm-offset-4 text">

					<form action="company.php" method="get">

					<div class="col-md-6">

						<input type="text" name="company_number" class="form-control" placeholder="Company Number">

					</div>

					<button class="btn btn-primary" type="submit">Submit</button>

					</form>

				</div>

			</div>

			<div class="container">

				<div class="row">

					<h2>Company Details</h2>

					<table class="table table-bordered">

					  <thead>

					  	<tr>

					  		<th>Company Name</td>

					  		<th>Status</td>

					  		<th>Type</td>

					  		<th>SIC Codes</td>

					  	</tr>

					  </thead>

					  <tbody>

					  	<tr>

					  		<?php

					  			$company = isset($companies['company_name']) ? $companies['company_name']:'';

					  			$status = isset($companies['company_status']) ? $companies['company_status']:'';

					  			$type = isset($companies['type']) ? $companies['type']:'';

					  			$sic_codes = isset($companies['sic_codes']) ? $companies['sic_codes']:array();

					  		?>

					  		<td><?php echo $company; ?></td>

					  		<td><?php echo $status; ?></td>

					  		<td><?php echo $type; ?></td>

					  		<td>

					  			<?php

					  			foreach($sic_codes as $codes) {

					  				echo $codes .'<br/>';

					  			}

					  			?>

					  		</td>

					  	</tr>

					  </tbody>

					</table>

				</div>

				<div class="row">

					<h2>Registered Office Address</h2>

					<table class="table table-bordered">

					  <thead>

					  	<tr>

					  		<th>Address Line 1</td>

					  		<th>Address Line 2</td>

					  		<th>Country</td>

					  		<th>Locality</td>

					  		<th>PO Box</td>

					  		<th>Postal Code</td>

					  		<th>Premises</td>

					  		<th>Region</td>

					  	</tr>

					  </thead>

					  <tbody>

					  	<?php

					  		$add1 = isset($reg_office_adds['address_line_1']) ? $reg_office_adds['address_line_1']:'';

					  		$add2 = isset($reg_office_adds['address_line_2']) ? $reg_office_adds['address_line_2']:'';

					  		$country = isset($reg_office_adds['country']) ? $reg_office_adds['country']:'';

					  		$locality = isset($reg_office_adds['locality']) ? $reg_office_adds['locality']:'';

					  		$po_box = isset($reg_office_adds['po_box']) ? $reg_office_adds['po_box']:'';

					  		$postal_code = isset($reg_office_adds['postal_code']) ? $reg_office_adds['postal_code']:'';

					  		$premises = isset($reg_office_adds['premises']) ? $reg_office_adds['premises']:'';

					  		$region = isset($reg_office_adds['region']) ? $reg_office_adds['region']:'';

					  	?>

					  	<tr>

					  		<td><?php echo $add1;?></td>

					  		<td><?php echo $add2;?></td>

					  		<td><?php echo $country; ?></td>

					  		<td><?php echo $locality; ?></td>

					  		<td><?php echo $po_box; ?></td>

					  		<td><?php echo $postal_code; ?></td>

					  		<td><?php echo $premises; ?></td>

					  		<td><?php echo $region; ?></td>

					  	</tr>

					  </tbody>

					</table>

				</div>

				<div class="row">

					<h2>Officers</h2>

					<table class="table table-bordered">

					  <thead>

					  	<tr>

					  		<th>Name</td>

					  		<th>Role</td>

					  		<th>Status</td>

					  		<th>Appointed On</td>

					  		<th>Date of Birth</td>

					  	</tr>

					  </thead>

					  <tbody>

					  	<?php

					  	$officer_items = isset($officers['items']) ? $officers['items'] : array();

					  	foreach ($officer_items as $address) {

					  		$name = isset($address['name']) ? $address['name']:'';

					  		$role = isset($address['office_role']) ? $address['office_role']:'';

					  		$status = isset($address['resigned_on']) && !empty($address['resigned_on']) ? 'Resigned ('.$address['resigned_on'].')':'Active';

					  		$appointed_on = isset($address['appointed_on']) ? $address['appointed_on']:'';

					  		$year = isset($address['date_of_birth']['year']) ? $address['date_of_birth']['year']:'';

					  		$month = isset($address['date_of_birth']['month']) ? $address['date_of_birth']['month']:'';

					  		$day = isset($address['date_of_birth']['day']) ? '-'.$address['date_of_birth']['day']:'';

					  	?>

					  	<tr>

					  		<td><?php echo $name;?></td>

					  		<td><?php echo $role;?></td>

					  		<td><?php echo $status; ?></td>

					  		<td><?php echo $appointed_on; ?></td>

					  		<td><?php echo $year .'-'. $month . $day; ?></td>

					  	</tr>

					  	<?php } ?>

					  </tbody>

					</table>

				</div>

			</div>

		</div>



    </body>



</html>