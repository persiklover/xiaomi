<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

// Google Sheets API
require_once __DIR__ . "/google-api-php-client/vendor/autoload.php";

print(__DIR__ . "/google-api-php-client/vendor/autoload.php");

$client = new Google_Client();
$client->setApplicationName('Google Sheets PHP');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);
$spreadsheetId = "15ZLwME61N0qv-7XrjE5IPgYKQkVjBeulAVGFAM9dwHk";

// Отправляем
$range = "Applications";
$values = [
  [ $_GET['email'] ]
];
$query_body = new Google_Service_Sheets_ValueRange([
  'values' => $values
]);
$params = [
  'valueInputOption' => 'RAW'
];
$insert = [
  'insertDataOption' => 'INSERT_ROWS'
];
$result = $service->spreadsheets_values->append(
  $spreadsheetId,
  $range,
  $query_body,
  $params,
  $insert
);


?>