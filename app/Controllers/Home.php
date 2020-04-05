<?php namespace App\Controllers;
use Parse\ParseException;
use Parse\ParseQuery;

class Home extends BaseController
{
	public function index()
	{
		//return view('welcome_message');
		$query = new ParseQuery("Coronaviruscases_Covid19Cases");
		try {

			$query->equalTo("countryName", "Philippines");
			$query->ascending("countryName");
			$results = $query->find();
			echo "Successfully retrieved " . count($results) . " count.";
			// Do something with the returned ParseObject values
			$new_case = 0;
			for ($i = 0; $i < count($results); $i++) 
			{
			  $object = $results[$i];
			 // echo $object->getObjectId() . ' - ' . $object->get('cases');

			  $case = $object->get('cases');
 				echo  "<br>";
			  echo $object->get('countryName') . "<br>";
			  echo $object->get('cases') . "<br>";
			  echo "new case : ";
			  if($new_case==0)
			  {
			  	echo $new_case;
			  	echo "<br>";
			  }
			  else
			  {
			  	echo $case - $new_case;
			  	echo "<br>";
			  	$new_case = $case;
			  }
			  $new_case = $case;
			  echo $object->get('date')->format("Y-m-d") . "<br>";
			  echo  "<br>";
			}
			  //$myCustomObject = $query->get("gL6lGKRjyA");
			  // The object was retrieved successfully.

			  // To get attributes, you can use the "get" method, providing the attribute name:
			  // $date = $myCustomObject->get("date");
			  // $countryName = $myCustomObject->get("countryName");
			  // $deaths = $myCustomObject->get("deaths");
			  // $cases = $myCustomObject->get("cases");
			  // $recovered = $myCustomObject->get("recovered");
			  // $countryPointer = $myCustomObject->get("countryPointer");

			  echo "done";

		} catch (ParseException $ex) {
			print_r($ex);
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
