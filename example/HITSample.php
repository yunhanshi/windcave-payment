<?php
/**
 * This file is a sample demonstrating integration with the HIT interface using PHP with the cURL extension installed.
 * Inlcude PxPay objects
 */
if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}

use WindcavePayment\HIT\HITClient;
use WindcavePayment\HIT\HITRequest;

$Url    = "https://uat.windcave.com/pxmi3/pos.aspx";
$Userid = "InsertHITUserId";
$Key    = "InsertHITKey";
$station = "1234567890";
$HIT = new HITClient( $Url, $Userid, $Key );
$type = isset($_GET['type']) ? $_GET['type'] : '';
$request = new HITRequest($station, $type);

switch (strtolower($type)) {
  case "refund":
      $result = refund();
      break;
  case "status":
      $result = status();
      break;
  case "ui":
      $result = button();
      break;
  case "receipt":
      $result = receipt();
      break;
  default:
      $result = purchase();
}

print <<<HTMLEOF
<html>
<head>
<title>Windcave HIT $type result</title>
</head>
<body>
<h1>Windcave HIT $type result</h1>
<table border=1>
<tr><th>Name</th><th>Value</th></tr>
HTMLEOF;

foreach ($result as $value) {
    if (isset($value['value'])) {
        echo "<tr><td>" . $value['tag'] . "</td><td>" . $value['value'] . "</td></tr>";
    }
}

print <<<HTMLEOF
</table>
</body>
</html>
HTMLEOF;

/**
 * purchase request
 */
function purchase(){
    global $HIT, $request;

    $http_host   = getenv("HTTP_HOST");
    $request_uri = getenv("SCRIPT_NAME");
    $server_url  = "http://$http_host";
    $script_url = (version_compare(PHP_VERSION, "4.3.4", ">=")) ?"$server_url$request_uri" : "$server_url/$request_uri";

    $request->setAmount('10.00');
    $request->setCur('NZD');
    $request->setTxnRef("123");
    $request->setCur("NZD");
    $request->setDeviceId("Device 1");
    $request->setPosName("POS 1");
    $request->setPosVersion("Pos V1");
    $request->setVendorId("PXVendor");
    $request->setMRef("My Reference");
    $request->setUrlFail($script_url);
    $request->setUrlSuccess($script_url);

    // Call makeRequest function to obtain input XML
    $response = $HIT->makeRequest($request);

    // Parse output XML
    $complete = $response->get_element_text("Complete");
    $valid = $response->getXmlValue();
    return $valid;
}


/**
 * refund request
 */
function refund()
{
    global $HIT, $request;

    $http_host   = getenv("HTTP_HOST");
    $request_uri = getenv("SCRIPT_NAME");
    $server_url  = "http://$http_host";
    $script_url = (version_compare(PHP_VERSION, "4.3.4", ">=")) ?"$server_url$request_uri" : "$server_url/$request_uri";

    $request->setAmount('10.00');
    $request->setCur('NZD');
    $request->setTxnRef("123");
    $request->setDpsTxnRef("0000005400911209"); // if set, it means 'Matched refunds initiated via HIT request'. if not set, it means 'Unmatched refunds with refund card'
    $request->setCur("NZD");
    $request->setDeviceId("Device 1");
    $request->setPosName("POS 1");
    $request->setPosVersion("Pos V1");
    $request->setVendorId("PXVendor");
    $request->setMRef("My Reference");
    $request->setUrlFail($script_url);
    $request->setUrlSuccess($script_url);

    // Call makeRequest function to obtain input XML
    $response = $HIT->makeRequest($request);

    // Parse output XML
    $complete = $response->get_element_text("Complete");
    $valid = $response->getXmlValue();
    return $valid;
}

/**
 * status request
 */
function status()
{
    global $HIT, $request;

    $request->setTxnRef("123");

    // Call makeRequest function to obtain input XML
    $response = $HIT->makeRequest($request);
    // Parse output XML
    $complete = $response->get_element_text("Complete");
    $valid = $response->getXmlValue();
    return $valid;
}

/**
 * button request
 */
function button()
{
    global $HIT, $request;

    $request->setUiType("Bn");
    $request->setName("B1");
    $request->setVal("YES");
    $request->setTxnRef("12345678");

    // Call makeRequest function to obtain input XML
    $response = $HIT->makeRequest($request);

    // Parse output XML
    $complete = $response->get_element_text("Complete");
    $valid = $response->getXmlValue();
    return $valid;
}

/**
 * receipt request
 */
function receipt()
{
    global $HIT, $request;

    $request->setTxnRef("123");
    $request->setDuplicateFlag(0);
    $request->ReceiptType(2);

    // Call makeRequest function to obtain input XML
    $response = $HIT->makeRequest($request);

    // Parse output XML
    $complete = $response->get_element_text("Complete");
    $valid = $response->getXmlValue();
    return $valid;
}

?>
