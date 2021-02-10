<?php
namespace WindcavePayment\HIT;

class HITRequest
{
    private $Station; // Station Name of the Windcave terminal being selected by the POS.
    private $Amount; // Amount of transaction in D.CC format. Where D is dollar and C is cent value. Numeric and decimal point, from 1 to 13 digits.
    private $AmountCash; // Amount for cash out. Numeric and decimal point, from 1 to 13 digits.
    private $Cur = 'NZD'; // Currency of the transaction. Alphanumeric, 3 characters only allowed.
    private $TxnType; // For Receipt Request, the value should be Receipt.
    private $TxnRef; //	Transaction reference assigned by POS. This should be different for each transaction. Alphanumeric, from 1 to 40 characters.
    private $DpsTxnRef; // To initiate a refund directly from the POS, the DpsTxnRef of the initial transaction must be included. The unique TxnRef is used separately as a reference to the refund and must be unique.
    private $DeviceId = 'Device 1'; // HIT POS identifier provided by POS. For example, a POS Lane Identifier etc. Alphanumeric, from 1 to 32 characters.
    private $PosName = 'POS 1'; // PosName – agreed between POS Vendor and Windcave. Alphanumeric, from 1 to 32 characters.
    private $PosVersion = 'Pos V1'; // Version of POS. Supplied by POS to assist transaction recording and diagnosis. Alphanumeric, from 1 to 32 characters.
    private $VendorId = 'PXVendor'; // The developer of the POS Application. This is agreed between Windcave and vendor. Alphanumeric from 1 to 32 characters in length.
    private $MRef; // Merchant text field. Alphanumeric, max 64 characters. Recommend to use, useful for reporting purposes.
    private $UrlSuccess; //	Set the URL to receive a HTTP GET notification on approved card present payment
    private $UrlFail; // Set the URL to receive a HTTP GET notification on declined card present payment
    private $UiType = 'Bn'; // Bn for button request
    private $Name; // B1 or B2. Depending on the button pressed.
    private $Val; // Value to be sent with the request for button press - CANCEL, YES, NO.
    private $DuplicateFlag; // An optional tag. If value 1: Includes a DUPLICATE RECEIPT text string on the receipt content. Otherwise 0 will not include the duplicate text string.
    private $ReceiptType; // A flag indicating the receipt content type to receive. Valid Values: 1 = Merchant Copy of receipt with a signature placeholder (only for signature transaction) 2 = Customer Copy of receipt 3 = Merchant Copy of receipt

    public function __construct($station, $TxnType){
        $this->setStation($station);
        $this->setTxnType($TxnType);
    }

    /**
     * @return mixed
     */
    public function getStation()
    {
        return $this->Station;
    }

    /**
     * @param mixed $Station
     */
    public function setStation($Station)
    {
        $this->Station = $Station;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param mixed $Amount
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
    }

    /**
     * @return mixed
     */
    public function getAmountCash()
    {
        return $this->AmountCash;
    }

    /**
     * @param mixed $AmountCash
     */
    public function setAmountCash($AmountCash)
    {
        $this->AmountCash = $AmountCash;
    }

    /**
     * @return mixed
     */
    public function getCur()
    {
        return $this->Cur;
    }

    /**
     * @param mixed $Cur
     */
    public function setCur($Cur)
    {
        $this->Cur = $Cur;
    }

    /**
     * @return mixed
     */
    public function getTxnType()
    {
        return $this->TxnType;
    }

    /**
     * @param mixed $TxnType
     */
    public function setTxnType($TxnType)
    {
        $this->TxnType = ucfirst(strtolower($TxnType));
    }

    /**
     * @return mixed
     */
    public function getTxnRef()
    {
        return $this->TxnRef;
    }

    /**
     * @param mixed $TxnRef
     */
    public function setTxnRef($TxnRef)
    {
        $this->TxnRef = $TxnRef;
    }

    /**
     * @return mixed
     */
    public function getDpsTxnRef()
    {
        return $this->DpsTxnRef;
    }

    /**
     * @param mixed $DpsTxnRef
     */
    public function setDpsTxnRef($DpsTxnRef)
    {
        $this->DpsTxnRef = $DpsTxnRef;
    }

    /**
     * @return mixed
     */
    public function getDeviceId()
    {
        return $this->DeviceId;
    }

    /**
     * @param mixed $DeviceId
     */
    public function setDeviceId($DeviceId)
    {
        $this->DeviceId = $DeviceId;
    }

    /**
     * @return mixed
     */
    public function getPosName()
    {
        return $this->PosName;
    }

    /**
     * @param mixed $PosName
     */
    public function setPosName($PosName)
    {
        $this->PosName = $PosName;
    }

    /**
     * @return mixed
     */
    public function getPosVersion()
    {
        return $this->PosVersion;
    }

    /**
     * @param mixed $PosVersion
     */
    public function setPosVersion($PosVersion)
    {
        $this->PosVersion = $PosVersion;
    }

    /**
     * @return mixed
     */
    public function getVendorId()
    {
        return $this->VendorId;
    }

    /**
     * @param mixed $VendorId
     */
    public function setVendorId($VendorId)
    {
        $this->VendorId = $VendorId;
    }

    /**
     * @return mixed
     */
    public function getMRef()
    {
        return $this->MRef;
    }

    /**
     * @param mixed $MRef
     */
    public function setMRef($MRef)
    {
        $this->MRef = $MRef;
    }

    /**
     * @return mixed
     */
    public function getUrlSuccess()
    {
        return $this->UrlSuccess;
    }

    /**
     * @param mixed $UrlSuccess
     */
    public function setUrlSuccess($UrlSuccess)
    {
        $this->UrlSuccess = $UrlSuccess;
    }

    /**
     * @return mixed
     */
    public function getUrlFail()
    {
        return $this->UrlFail;
    }

    /**
     * @param mixed $UrlFail
     */
    public function setUrlFail($UrlFail)
    {
        $this->UrlFail = $UrlFail;
    }

    /**
     * @return mixed
     */
    public function getUiType()
    {
        return $this->UiType;
    }

    /**
     * @param mixed $UiType
     */
    public function setUiType($UiType)
    {
        $this->UiType = $UiType;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getVal()
    {
        return $this->Val;
    }

    /**
     * @param mixed $Val
     */
    public function setVal($Val)
    {
        $this->Val = $Val;
    }

    /**
     * @return mixed
     */
    public function getDuplicateFlag()
    {
        return $this->DuplicateFlag;
    }

    /**
     * @param mixed $DuplicateFlag
     */
    public function setDuplicateFlag($DuplicateFlag)
    {
        $this->DuplicateFlag = $DuplicateFlag;
    }

    /**
     * @return mixed
     */
    public function getReceiptType()
    {
        return $this->ReceiptType;
    }

    /**
     * @param mixed $ReceiptType
     */
    public function setReceiptType($ReceiptType)
    {
        $this->ReceiptType = $ReceiptType;
    }

    public function getAllVars() {
        return get_object_vars($this);
    }

    /**
     * @return boolean
     */
    public function validData(){
        $msg = "";

        switch ($this->TxnType) {
            case "Purchase":
            case "Validate":
            case "Auth":
                $msg .= $this->validPurchase();
                break;
            case "Refund":
                $msg .= $this->validRefund();
                break;
            case "Status":
                $msg .= $this->validStatus();
                break;
            case "UI":
                $msg .= $this->validButton();
                break;
            case "Receipt":
                $msg .= $this->validReceipt();
                break;
            default:
                $msg .= "Invalid TxnType[$this->TxnType]<br>";
        }

        if ($msg != "") {
            trigger_error($msg,E_USER_ERROR);
            return false;
        }
        return true;
    }

    private function validPurchase() {
        $msg = "";

        if (empty($this->Station) || strlen($this->Station) > 32) {
            $msg .= "Invalid Station[$this->Station]<br>";
        }

        if (!is_numeric($this->Amount) || strlen($this->Amount) > 13) {
            $msg .= "Invalid Amount[$this->Amount]<br>";
        }

        if ($this->AmountCash && (is_numeric($this->AmountCash) || strlen($this->AmountCash) > 13)) {
            $msg .= "Invalid AmountCash[$this->AmountCash]<br>";
        }

        if (empty($this->Cur) || strlen($this->Cur) != 3) {
            $msg .= "Invalid Cur[$this->Cur]<br>";
        }

        if(empty($this->TxnRef) || strlen($this->TxnRef) > 40) {
            $msg .= "Invalid TxnRef[$this->TxnRef]<br>";
        }

        if(empty($this->DeviceId) || strlen($this->DeviceId) > 32) {
            $msg .= "Invalid DeviceId[$this->DeviceId]<br>";
        }

        if(empty($this->PosName) || strlen($this->PosName) > 32) {
            $msg .= "Invalid PosName[$this->PosName]<br>";
        }

        if(strlen($this->PosVersion) > 32) {
            $msg .= "Invalid PosVersion[$this->PosVersion]<br>";
        }

        if(empty($this->VendorId) || strlen($this->VendorId) > 32) {
            $msg .= "Invalid VendorId[$this->VendorId]<br>";
        }

        if(strlen($this->MRef) > 64) {
            $msg .= "Invalid MRef[$this->MRef]<br>";
        }

        if(strlen($this->UrlFail) > 255) {
            $msg .= "Invalid UrlFail [$this->UrlFail]<br>";
        }

        if(strlen($this->UrlSuccess) > 255) {
            $msg .= "Invalid UrlSuccess [$this->UrlSuccess]<br>";
        }

        return $msg;
    }

    private function validRefund() {
        $msg = "";

        if (!is_numeric($this->Amount) || strlen($this->Amount) > 13) {
            $msg .= "Invalid Amount[$this->Amount]<br>";
        }

        if (empty($this->Cur) || strlen($this->Cur) != 3) {
            $msg .= "Invalid Cur[$this->Cur]<br>";
        }

        if (empty($this->Station) || strlen($this->Station) > 32) {
            $msg .= "Invalid Station[$this->Station]<br>";
        }

        if(empty($this->TxnRef) || strlen($this->TxnRef) > 40) {
            $msg .= "Invalid TxnRef[$this->TxnRef]<br>";
        }

        if(strlen($this->DpsTxnRef) > 40) {
            $msg .= "Invalid DpsTxnRef[$this->DpsTxnRef]<br>";
        }

        if(empty($this->DeviceId) || strlen($this->DeviceId) > 32) {
            $msg .= "Invalid DeviceId[$this->DeviceId]<br>";
        }

        if(empty($this->PosName) || strlen($this->PosName) > 32) {
            $msg .= "Invalid PosName[$this->PosName]<br>";
        }

        if(strlen($this->PosVersion) > 32) {
            $msg .= "Invalid PosVersion[$this->PosVersion]<br>";
        }

        if(empty($this->VendorId) || strlen($this->VendorId) > 32) {
            $msg .= "Invalid VendorId[$this->VendorId]<br>";
        }

        if(strlen($this->MRef) > 64) {
            $msg .= "Invalid MRef[$this->MRef]<br>";
        }

        if(strlen($this->UrlFail) > 255) {
            $msg .= "Invalid UrlFail [$this->UrlFail]<br>";
        }

        if(strlen($this->UrlSuccess) > 255) {
            $msg .= "Invalid UrlSuccess [$this->UrlSuccess]<br>";
        }

        return $msg;
    }

    private function validStatus() {
        $msg = "";

        if (empty($this->Station) || strlen($this->Station) > 32) {
            $msg .= "Invalid Station[$this->Station]<br>";
        }

        if(empty($this->TxnRef) || strlen($this->TxnRef) > 40) {
            $msg .= "Invalid TxnRef[$this->TxnRef]<br>";
        }

        return $msg;
    }

    private function validButton() {
        $msg = "";

        if (empty($this->Station) || strlen($this->Station) > 32) {
            $msg .= "Invalid Station[$this->Station]<br>";
        }

        if(empty($this->TxnRef) || strlen($this->TxnRef) > 40) {
            $msg .= "Invalid TxnRef[$this->TxnRef]<br>";
        }

        if(empty($this->UiType) || $this->UiType != 'Bn') {
            $msg .= "Invalid UiType[$this->UiType], should be 'Bn'<br>";
        }

        if(empty($this->Name) || !in_array($this->UiType, ['B1', 'B2'])) {
            $msg .= "Invalid Name[$this->Name], should be 'B1' or 'B2'<br>";
        }

        if(empty($this->Val) || !in_array($this->UiType, ['YES', 'NO'])) {
            $msg .= "Invalid Val[$this->Val], should be 'YES' or 'NO'<br>";
        }

        return $msg;
    }

    private function validReceipt() {
        $msg = "";

        if (empty($this->Station) || strlen($this->Station) > 32) {
            $msg .= "Invalid Station[$this->Station]<br>";
        }

        if(empty($this->TxnRef) || strlen($this->TxnRef) > 40) {
            $msg .= "Invalid TxnRef[$this->TxnRef]<br>";
        }

        if(!empty($this->DuplicateFlag) && !in_array($this->DuplicateFlag, [0, 1])) {
            $msg .= "Invalid DuplicateFlag[$this->DuplicateFlag], should be 0 or 1<br>";
        }

        if(empty($this->ReceiptType) || !in_array($this->ReceiptType, [1, 2, 3])) {
            $msg .= "Invalid ReceiptType[$this->ReceiptType], should be 1, 2 or 3<br>";
        }

        return $msg;
    }

}

