<?php
error_reporting(E_ERROR | E_PARSE);

function validate($address_line1, $address_line2, $city, $state, $zipcode)
{
  $input_data = "<AddressValidateRequest USERID='620SH0001049'>
  <Revision>1</Revision>
  <Address ID='0'>
    <Address1>$address_line1</Address1>
    <Address2>$address_line2</Address2>
    <City>$city</City>
    <State>$state</State>
    <Zip5>$zipcode</Zip5>
    <Zip4 />
  </Address>
</AddressValidateRequest>";
  $GET_URL = 'https://secure.shippingapis.com/ShippingAPI.dll';
  $headers = array(
    'Accept: */*',
    'Content-Type: application/xml'
  );
  $data = array(
    'XML' => $input_data,
    'API' => 'Verify'
  );
  $params = http_build_query($data);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $GET_URL . '?' . $params);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FAILONERROR, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

  $RESPONSE = curl_exec($ch);
  curl_close($ch);
  if (curl_errno($ch)) {
    print curl_error($ch);
  }
  $oXML = new SimpleXMLElement($RESPONSE);
  return $oXML;
}

if ($_POST["city"] && $_POST["zipcode"] && $_POST["address_line_1"] && $_POST["address_line_2"] && $_POST["state"]) {
  $original = array(
    "address_line_1" => $_POST["address_line_1"],
    "address_line_2" => $_POST["address_line_2"],
    "city" => $_POST["city"],
    "state" => $_POST["state"],
    "zipcode" => $_POST["zipcode"]
  );
  $validate_result = array();
  try {
    $validate_result = validate($_POST["address_line_1"], $_POST["address_line_2"], $_POST["city"], $_POST["state"], $_POST["zipcode"]);
  } catch (Exception $e) {
    $validate_result = array('error' => 'Error in Posted Data.');
  }
  print_r(json_encode(['original' => $original, 'validate_result' => $validate_result]));
} else {
  print_r(
    json_encode(
      array(
        "error" => 1,
      )
    )
  );
}