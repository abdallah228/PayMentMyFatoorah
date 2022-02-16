<?php

namespace App\Http\Controllers;

use App\Http\Services\FatooraServices;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    //
    private $fatoora;
    public function __construct(FatooraServices $fatooraServices) {
        $this->fatoora = $fatooraServices;
    }


    public function payOrder() {
        $data = [
            //Fill required data
            'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
            'InvoiceValue'       => '1000',
            'CustomerName'       => 'fname lname',
                //Fill optional data
                'DisplayCurrencyIso' => 'KWD',
                //'MobileCountryCode'  => '+965',
                //'CustomerMobile'     => '1234567890',
                'CustomerEmail'      => 'email@example.com',
                'CallBackUrl'        => 'http://127.0.0.1:8008/api/callBack',
                'ErrorUrl'           => 'https://youtube.com/', //or 'https://example.com/error.php'
                'Language'           => 'en', //or 'ar'
                //'CustomerReference'  => 'orderId',
                //'CustomerCivilId'    => 'CivilId',
                //'UserDefinedField'   => 'This could be string, number, or array',
                //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
                //'SourceInfo'         => 'Pure PHP', //For example: (Laravel/Yii API Ver2.0 integration)
                //'CustomerAddress'    => $customerAddress,
                //'InvoiceItems'       => $invoiceItems,
        ];
      return  $this->fatoora->sendPayment($data);

      //make table transaction
      //invoiceId
      //user id

    }

    public function callBack(Request $request) {
        //save transaction to database
        // dd($request);
        $data = [];
        $data['Key'] = $request->paymentId;
        $data['KeyType'] = 'paymentId' ;
        $paymentData =  $this->fatoora->getPaymentStatus($data);
       return $paymentData['Data']['InvoiceId'];
    }

    public function error() {

    }
}
