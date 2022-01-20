<?php

class GoogleSheets {
	//sheet ID you //? will find it in the sheet url
	private $spreadsheetId = '1SkSbVNkP9jTH1ucLawm3RO3bk2wvs8GyXeBR3TJqVjc';
	//credentials file path
	private $credentialsFile = __DIR__ . '/google-sheets-keys.json';
	//application name //?(go with any name you want)
	private $applicationName = "PHP Google Sheets API";
	//global attribute to hold google sheet connection object
	private $service;

	public function __construct(){
		//instantiate google client service
		$client = new \Google_Client();

		//set application name
		$client->setApplicationName($this->applicationName);

		//set the scope to read and write
		$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
		$client->setAccessType('offline');

		//get credentials file and set the authentication
		$client->setAuthConfig($this->credentialsFile);

		//start the service and attached to the global variable
		$this->service = new \Google_Service_Sheets($client);
	}

	//read data from the sheet
	public function readData(){
		//?specify the page on the sheets that you want to read from
		$page = 'op';
		//* connect to google sheets service and get the sheet information
		$response = $this->service->spreadsheets_values->get($this->spreadsheetId, $page);
		//* read sheet data and save it
		$sheetData = $response->getValues();
		return $sheetData;
	}

	// write array of data to the sheet
	public function writeData(Array $data)
	{
		//?specify the page on the sheets that you want to write on
		$page = 'new_op';

		//prepare request body
		$body = new \Google_Service_Sheets_ValueRange(['values' => $data]);

		//set writing parameter method 
		$params = ['valueInputOption' => 'RAW'];

		//call the service to append the data at the end of the sheet
		//#NOTE: you can call "update" to overwrite the data stored in the sheet
		$this->service->spreadsheets_values->append($this->spreadsheetId, $page, $body, $params);

		//*return true to inform the application that the write process is done
		return true;
	}


	//delete sheet data
	public function clearData()
	{
		//?specify the page on the sheets that you want to write on
		$page = 'new_op';
		//prepare request body
		$body = new \Google_Service_Sheets_ClearValuesRequest();
		//call the service to delete all the data in the sheet
		$this->service->spreadsheets_values->clear($this->spreadsheetId, $page, $body);
	}
}