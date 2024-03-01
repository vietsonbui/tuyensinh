<?php

require_once 'vendor/autoload.php';
use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;
use Google\Service\Drive\DriveFile as Google_Service_DriveFile;

class GoogleSheetsConnector
{
    private $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setAuthConfig('serious-app-415103-e624c1bd20d1.json');
        $this->client->setAccessType('offline');
        $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS, Google_Service_Drive::DRIVE]);
    }

    public function getGoogleSheetsData($spreadsheetId, $range)
    {
        $service = new Google_Service_Sheets($this->client);

        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }	
	
    public function getClient()
    {
        return $this->client;
    }
    
    public function getDataFromSheet($spreadsheetId, $range, $filterValue = null, $filterValue2 = null)
    {
        $service = new Google_Service_Sheets($this->client);
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
        
        $filteredValues = [];

        if (!empty($values)) {
            foreach ($values as $row) {
                if ($filterValue === null && $filterValue2 === null) {
                    $filteredValues[] = $row[0];
                }else if($row[0] == $filterValue && $filterValue2 === null){
                    $filteredValues[] = $row[1];
                }else if($row[0] == $filterValue && $row[1] == $filterValue2){
                    $filteredValues[] = $row[2];
                }
            }
        }

        return $filteredValues;
    }
    
    function getSheetDataByCCCD($spreadsheetId, $cccd)
    {
        $service = new Google_Service_Sheets($this->client);

        // Define the range you want to retrieve data from
        $range = 'KQXT!A:R'; // Assuming your data is in columns A to R

        try {
            // Make the request to Google Sheets API
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();

            if (empty($values)) {
                return null;
            }
    
            $foundData = [];
    
            foreach ($values as $row) {
                if ($row[0] == $cccd) {
                    $foundData[] = $row;
                }
            }
    
            return $foundData;
        } catch (Exception $e) {
            return null;
        }
    }
}
?>