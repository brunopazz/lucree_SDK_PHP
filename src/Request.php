<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 05:52
 */

namespace lucree\SDK;

use Exception;

/**
 * Class Request
 *
 * @package lucree\SDK
 */
class Request
{
    private $token;

    /**
     * Request constructor.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @param $url_path
     * @param $params
     *
     * @return mixed
     * @throws Exception
     */
    function post($url_path, $params)
    {
        return $this->send($url_path, 'POST', $params);
    }

    /**
     * @param      $url_path
     * @param      $method
     * @param null $json
     *
     * @return mixed
     * @throws Exception
     */
    private function send($url_path, $method, $json = null)
    {
        $curl    = curl_init($url_path);
        $headers = array(
            'Authorization: Basic '.$this->token,
            'Content-Type: application/json',
            'Accept: application/json'
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_USERAGENT, "gateway/2.1");

        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

        } elseif ($method == 'GET') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        }

        $response = curl_exec($curl);


        if (curl_errno($curl)) {
            $info   = curl_getinfo($curl);
            $result = ['error' => $info];
            echo json_encode($result);
            curl_close($curl);
            exit;
        }

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 500) {
            throw new Exception("Internal Server Error", CURLINFO_HTTP_CODE);
        }
        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) >= 400) {
            throw new Exception(trim(strip_tags($response)),
                CURLINFO_HTTP_CODE);
        }

        curl_close($curl);

        return json_decode($response, true);
    }


}
