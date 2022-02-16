<?php
namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FatooraServices {
    private $base_url;
    private $header;
    private $request_client;

        /**
         * fattoraService constructor
         *
         * @param CLient request_client
         */
        public function __construct(Client $request_client) {
            $this->request_client = $request_client;
            $this->base_url = env('fatoorah_base_url');
            $this->header = [
                'content-type'=>'application/json',
                'authorization'=>'Bearer '.env('fatoorah_token'),
            ];

        }

    public function buildRequest($url ,$method, $data=[]) {
        $request = new Request($method,$this->base_url . $url,$this->header);
        if(!$data)
            return false;
        $response = $this->request_client->send($request,[
            'json'=>$data,
        ]);

        if($response->getStatusCode() != 200) {
            return false;
        }
        $response = json_decode($response->getBody(),true);
        return $response;
    }

    public function sendPayment($data) {
       return $response = $this->buildRequest('v2/SendPayment','post',$data);
    }

    public function getPaymentStatus($data) {
       return $response = $this->buildRequest('v2/getPaymentStatus','post',$data);

    }

}
