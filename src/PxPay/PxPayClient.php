<?php
namespace WindcavePayment\PxPay;

use WindcavePayment\Help\Curl;
use WindcavePayment\Help\MifMessage;
use WindcavePayment\PxPay\PxPayResponse;

class PxPayClient {
    var $PxPay_Key;
    var $PxPay_Url;
    var $PxPay_Userid;
    function __construct($Url, $UserId, $Key){
        $this->PxPay_Key = $Key;
        $this->PxPay_Url = $Url;
        $this->PxPay_Userid = $UserId;
    }

    function toXml($request){
        $arr = $request->getAllVars();

        $xml  = "<GenerateRequest>";
        foreach ($arr as $prop => $val) {
            if (empty($val)) {
                continue;
            }
            $xml .= "<$prop>$val</$prop>" ;
        }
        $xml .= "</GenerateRequest>";
        return $xml;
    }

    /**
     * create a curl request
     *
     * @param $request
     * @param $parse
     * @return string | Object
     */
    function makeRequest($request, $parse = true)
    {
        #Validate the Request
        if($request->validData() == false) return "" ;

        $xml = $this->toXml($request);

        $result = Curl::submitXml($xml, $this->PxPay_Url);

        if ($parse) {
            // parse the XML
            return new MifMessage($result);
        } else {
            return $result;
        }

    }

    /**
     * Return the transaction outcome details
     *
     * @param $result
     * @return Object
     */
    function getResponse($result){

        $inputXml = "<ProcessResponse><PxPayUserId>".$this->PxPay_Userid."</PxPayUserId><PxPayKey>".$this->PxPay_Key.
            "</PxPayKey><Response>".$result."</Response></ProcessResponse>";

        $outputXml = Curl::submitXml($inputXml, $this->PxPay_Url);

        $result = new MifMessage($outputXml);

        $pxresp = new PxPayResponse($result);

        return $pxresp;
    }

}

