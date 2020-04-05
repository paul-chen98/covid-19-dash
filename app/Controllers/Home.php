<?php namespace App\Controllers;
use Parse\ParseException;
use Parse\ParseQuery;

class Home extends BaseController
{
	
	public function index()
	{
		//return view('welcome_message');
		$title = "COVID-19 Updates: PH";

		$data = array(
		    'title' => 'My Title',
		    'heading' => 'My Heading',
		    'message' => 'My Message',

		);

		//echo json_encode($data);
		//echo view('welcome_message', $data);

		$query = new ParseQuery("Coronaviruscases_Covid19Cases");
		try {

			$query->equalTo("countryName", "Philippines");
			$query->ascending("countryName");
			$results = $query->find();

			$datas = array();
			$new_case = 0;
			for ($i = 0; $i < count($results); $i++) 
			{
				$object = $results[$i];
				 // echo $object->getObjectId() . ' - ' . $object->get('cases');

				$countryName = $object->get('countryName');
				$date = $object->get('date')->format("F j, Y");
				$cases = $object->get('cases');
				$recovered = $object->get('recovered');
				$deaths = $object->get('deaths');
				//$updatedAt = $object->get('updatedAt')->format("Y-m-d");

				$datas[$i]= array(
								'countryName' => $countryName,
								'date' 	  => $date,
								'cases'	  => $cases,
								'recovered' => $recovered,
								'deaths' => $deaths
								//'updatedAt' => $updatedAt
							);
			}

			//print_r($datas);

			//echo $parser->setData($datas)->render('index');
			//print_r($results);
			//echo "Successfully retrieved " . count($results) . " count.";
			echo view('templates/header', $data = ['title' => $title] );
			echo view('index', ['data' => $datas]);

		} catch (ParseException $ex) {
			console.log($ex);
		  // The object was not retrieved successfully.
		  // error is a ParseException with an error code and message.
		}
		//return view('welcome_message');
	}

	public function api()
	{
		$query = new ParseQuery("Coronaviruscases_Covid19Cases");
		try {
		  $myCustomObject = $query->get("<PARSE_OBJECT_ID>");
		  // The object was retrieved successfully.

		  // To get attributes, you can use the "get" method, providing the attribute name:
		  $date = $myCustomObject->get("date");
		  $countryName = $myCustomObject->get("countryName");
		  $deaths = $myCustomObject->get("deaths");
		  $cases = $myCustomObject->get("cases");
		  $recovered = $myCustomObject->get("recovered");
		  $countryPointer = $myCustomObject->get("countryPointer");

		  echo "done";
		} catch (ParseException $ex) {
		  // The object was not retrieved successfully.
		  // error is a ParseException with an error code and message.
		}
	}

	//--------------------------------------------------------------------

}
