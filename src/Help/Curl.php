<?php
namespace WindcavePayment\Help;

class Curl
{
    /**
     * Actual submission of XML using cURL. Returns output XML
     *
     * @param $inputXml
     * @param $url
     * @return string
     */
    public static function submitXml($inputXml, $url){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$inputXml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        // set up proxy, this may change depending on ISP, please contact your ISP to get the correct cURL settings
        // curl_setopt($ch,CURLOPT_PROXY , "proxy:8080");
        // curl_setopt($ch,CURLOPT_PROXYUSERPWD,"username:password");

        $outputXml = curl_exec ($ch);

        curl_close ($ch);

        return $outputXml;
    }
}
