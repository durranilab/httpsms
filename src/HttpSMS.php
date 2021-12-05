<?php


namespace Durranilab\Httpsms;


class HttpSMS
{

    public function getBalance($userParams = [])
    {
        if (config('smsconfig.method') === 'get') {
            // Generate URL with (Query) from Params
            $url = config('smsconfig.balance_url') . '?';
            $params = config('smsconfig.balance_params');
            return $this->requestCurlGet($url, $params, $userParams);
        }
        if (config('smsconfig.method') === 'post') {
            $url = config('smsconfig.balance_url');
            $params = config('smsconfig.balance_params');
            return $this->requestCurlPost($url, $params, $userParams);
        }
        return "Please insert valid request method in config file (SMS CONFIG)";
    }

    public function sendMessage($userParams = [])
    {
        if (config('smsconfig.method') === 'get') {
            // Generate URL with (Query) from Params
            $url = config('smsconfig.sms_url') . '?';
            $params = config('smsconfig.sms_params');
            return $this->requestCurlGet($url, $params, $userParams);
        }
        if (config('smsconfig.method') === 'post') {
            // Generate URL with (Query) from Params
            $url = config('smsconfig.sms_url');
            $params = config('smsconfig.sms_params');
            return $this->requestCurlPost($url, $params, $userParams);
        }
        return "Please insert valid request method in config file (SMS CONFIG)";
    }


    private function requestCurlGet($url, $params, $userParams)
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

        //cURL HTTP GET
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        //$err = curl_error($ch);  //if you need
        curl_close($ch);
        return $response;
    }

    private function requestCurlPost($url, $params, $userParams)
    {

        $post = array_merge($params, $userParams);
        //cURL HTTP POST
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $response = curl_exec($ch);
       // $err = curl_errno($ch);
        curl_close($ch); //if you need

        return $response;

    }
}