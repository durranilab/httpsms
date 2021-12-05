<?php


namespace Durranilab\Httpsms;


class MessageSender
{

    public function getBalance($userParams = null)
    {
        // Generate URL with (Query) from Params
        $url = config('smsconfig.balance_url') . '?';

        $params = config('smsconfig.balance_params');

        return $this->parsecUrl($url, $params, $userParams);
    }

    public function sendMessage($userParams = null)
    {
        // Generate URL with (Query) from Params
        $url = config('smsconfig.sms_url') . '?';

        $params = config('smsconfig.sms_params');

        return $this->parsecUrl($url, $params, $userParams);
    }

    private function parsecUrl($url, $params, $userParams)
    {
        // params from Config file
        if ($params != null)
            foreach ($params as $key => $value) {
                $url = $url . '&' . $key . '=' . $value;
            }

        // user params
        if ($userParams != null)
            foreach ($userParams as $key => $value) {
                $url = $url . '&' . $key . '=' . $value;
            }

        $url = preg_replace("/ /", "%20", $url);
        $url = preg_replace("/\n/", "%0A", $url);

        //return $url;
        //cURL HTTP
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $err = curl_error($ch);  //if you need
        curl_close($ch);
        return $response;
    }
}