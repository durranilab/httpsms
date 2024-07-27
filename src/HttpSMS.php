<?php


namespace Durranilab\Httpsms;


class HttpSMS
{
    private $method;
    private $balanceUrl;
    private $balanceParams;
    private $smsUrl;
    private $smsParams;

    public function __construct()
    {
        $this->method = config('smsconfig.method');
        $this->balanceUrl = config('smsconfig.balance_url');
        $this->balanceParams = config('smsconfig.balance_params');
        $this->smsUrl = config('smsconfig.sms_url');
        $this->smsParams = config('smsconfig.sms_params');
    }

    public function getBalance($userParams = [])
    {
        return $this->makeRequest($this->balanceUrl, $this->balanceParams, $userParams);
    }

    public function sendMessage($userParams = [])
    {
        return $this->makeRequest($this->smsUrl, $this->smsParams, $userParams);
    }

    private function makeRequest($url, $params, $userParams)
    {
        if ($this->method === 'get') {
            return $this->requestCurlGet($url, $params, $userParams);
        } elseif ($this->method === 'post') {
            return $this->requestCurlPost($url, $params, $userParams);
        }
        return "Please insert a valid request method in the config file (SMS CONFIG)";
    }

    private function requestCurlGet($url, $params, $userParams)
    {
        $query = http_build_query(array_merge($params, $userParams));
        $finalUrl = rtrim($url, '?') . '?' . $query;

        $finalUrl = str_replace([" ", "\n"], ["%20", "%0A"], $finalUrl);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $finalUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return "Curl error: $error";
        }
        curl_close($ch);
        return $response;
    }

    private function requestCurlPost($url, $params, $userParams)
    {
        $postFields = array_merge($params, $userParams);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return "Curl error: $error";
        }
        curl_close($ch);
        return $response;
    }
}
