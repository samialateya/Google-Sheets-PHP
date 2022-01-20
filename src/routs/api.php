<?php
//import request,response interface from psr
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//define a URI route for reading the sheet
$app->get('/read',function(Request $request, Response $response)
{
	//*instantiate an object from google sheets helper class
	$sheet = new GoogleSheets();
	//read the sheet data
	$sheetData = $sheet->readData();
	//return a json response with the sheet data to the client
	return $response->withJson($sheetData);
});

//define a URI route for write data into the sheet
$app->post('/write',function(Request $request, Response $response)
{
	//catch data from the client
	$sheetData = $request->getParam('sheet-data');
	//*return 422 error response if the sheet data is not set
	if(!$sheetData) return $response->withJson(['error' => 'sheet-data is required'])->withStatus(422);
	//* return 406 error response if the sheet-data is not an array or its values is not arrays ?[ [a1,b1,c1], [a2,b2,c2] ]
	if (!is_array($sheetData) || !is_array($sheetData[0])) return $response->withJson(['error' => 'sheet-data must be an array of arrays with values'])->withStatus(406);

	//*instantiate an object from google sheets helper class
	$sheet = new GoogleSheets();
	//write the data to sheet
	$sheet->writeData($sheetData);
	//return success response and inform the user that the data has been recorded
	return $response->withJson(['message' => 'sheet data has been recorded successfully']);
});


//define a URI route to delete data from the sheet
$app->post('/clear', function (Request $request, Response $response) {
	//*instantiate an object from google sheets helper class
	$sheet = new GoogleSheets();
	//read the sheet data
	$sheetData = $sheet->clearData();
	//return success response and inform the user that the data has been recorded
	return $response->withJson(['message' => 'sheet data has been deleted successfully']);
});