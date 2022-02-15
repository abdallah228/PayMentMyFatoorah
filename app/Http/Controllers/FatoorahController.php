<?php

namespace App\Http\Controllers;

use App\Http\Services\FatooraServices;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    //
    private $fatooraServices;
    public function __construct(FatooraServices $fatooraServices) {
        $this->$fatooraServices = $fatooraServices;
    }


    public function payOrder() {
        $data = [
            //Fill required data
            'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
            'InvoiceValue'       => '50',
            'CustomerName'       => 'fname lname',
                //Fill optional data
                'DisplayCurrencyIso' => 'KWD',
                //'MobileCountryCode'  => '+965',
                //'CustomerMobile'     => '1234567890',
                'CustomerEmail'      => 'email@example.com',
                'CallBackUrl'        => env('CallBackUrl'),
                'ErrorUrl'           => env('ErrorUrl'), //or 'https://example.com/error.php'
                'Language'           => 'en', //or 'ar'
                //'CustomerReference'  => 'orderId',
                //'CustomerCivilId'    => 'CivilId',
                //'UserDefinedField'   => 'This could be string, number, or array',
                //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
                //'SourceInfo'         => 'Pure PHP', //For example: (Laravel/Yii API Ver2.0 integration)
                //'CustomerAddress'    => $customerAddress,
                //'InvoiceItems'       => $invoiceItems,
        ];
        $this->fatooraServices->sendPayment($data);

    }

    public function callBack() {

    }

    public function error() {

    }
}
