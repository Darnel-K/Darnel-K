<?php
class Slack {
    private $SlackURL = null;

    public function __construct($WebHookURL) {
        $this->SlackURL = $WebHookURL;
    }

    public function Send(array $Data) {
        $Data = json_encode($Data);

        $curl = curl_init($this->SlackURL);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $Data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($Data))
        );

        return curl_exec($curl);
    }

    public function SendMultiple(array $Data) {
        $arr = array();
        foreach ($Data as $k => $v) {
            $arr[$k] = $this->Send($v);
        }
        return $arr;
    }
}
?>
