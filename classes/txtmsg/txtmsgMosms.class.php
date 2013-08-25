<?php

class txtmsgMosms extends txtmsgCore {
    // =========================================================================
    // [ Fields ]
    // =========================================================================
    public $gateway = 1;
    public $resultcode = null;
    public $resultmessage = null;
    public $success = false;
    public $successcount = 0;

    public function sendSMS($message) {

        $mosms_url = "https://www.mosms.com/se/sms-send.php";
        $mosms_data = rawurlencode( $message );

        foreach( $this->recipients as $phone ){

            $result = file_get_contents( $mosms_url . "?username=" . $this->username
                . "&password=" . $this->password . "&nr=" . $phone . "&type=text"
                . "&data=" . $mosms_data );

        }

        return $result;
    }

    protected function _auth_https_post($host, $path, $data) {
        $url = $host . $path . $data;
        return sm_curl_get($url);
    }
}

?>