<?php

namespace App\EZPay\Collections;

use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Services\StringEncryptService;

class EzPayPostCollection extends Collection
{
    public $merchantId;
    public $version;
    public $tradeInfo;
    public $tradeSha;


    public function __construct()
    {
        parent::__construct();
        $this->merchantId = config('ezpay.mpg.MerchantId');
        $this->version = config('ezpay.mpg.Version');
    } 

    public function setBasicInfo()
    {
        $this->put('MerchantID', $this->merchantId);
        $this->put('TimeStamp', Carbon::now()->timestamp);
        $this->put('Version', $this->version);
        return $this;
    }



    public function setOrderRequired($attributes)
    {
        $this->put('MerchantOrderNo', $attributes['orderId']);
        $this->put('Amt', $attributes['amount']);
        $this->put('ItemDesc', $attributes['itemName']);
        return $this;

    }

    public function setOrderOptional($attributes)
    {
        $optionalParams = [
            'LangType', 'TradeLimit', 'CustomerURL', 'ClientBackURL', 'P2GEACC', 'ACCLINK',
            'CREDIT', 'InstFlag', 'CreditRed', 'WEBATM', 'VACC', 'CVS',
            'ExpireDate', 'ExpireTime', 'NotifyURL', 'ReturnURL'
        ];
        
        foreach($optionalParams as $param) {
            if (isset($attributes[$param])) {
                $this->put($param, $attributes[$param]);
            }
        }
        return $this;
    }

    public function setTradeInfo()
    {
        $this->tradeInfo = StringEncryptService::encryptAes256cbc($this);
        return $this;
    }

    public function setTradeSha()
    {
        $this->tradeSha = StringEncryptService::encryptSha256($this->tradeInfo);
        return $this;
    }


}