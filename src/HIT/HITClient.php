<?php
namespace WindcavePayment\HIT;

use WindcavePayment\Help\Curl;
use WindcavePayment\Help\MifMessage;

class HITClient {
    private $HIT_Key;
    private $HIT_Url;
    private $HIT_User;
    public function __construct($Url, $User, $Key){
        $this->HIT_Key = $Key;
        $this->HIT_Url = $Url;
        $this->HIT_User = $User;
    }

    function toXml($request){
        $arr = $request->getAllVars();
        $xml  = "<Scr action=\"doScrHIT\" user=\"" . $this->HIT_User . "\" key=\"" . $this->HIT_Key . "\">";
        foreach ($arr as $prop => $val) {
            if (empty($val)) {
                continue;
            }
            $xml .= "<$prop>$val</$prop>" ;
        }
        $xml .= "</Scr>";
        return $xml;
    }

    /**
     * create a curl request
     *
     * @param $request
     * @param $parse
     * @return string | Object
     */
    public function makeRequest($request, $parse = true)
    {
        // Validate the Request
        if($request->validData() == false) return "" ;

        $xml = $this->toXml($request);
        $result = Curl::submitXml($xml, $this->HIT_Url);

        if ($parse) {
            // parse the XML
            return new MifMessage($result);
        } else {
            return $result;
        }
    }
}

