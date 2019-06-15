<?php

namespace App\Services;

use EZPay\Collections\EzPayPostCollection;

class EzpayOrder
{
    protected $apiUrl;
    protected $postCollection;
    protected $postData;

    public function __construct(EzPayPostCollection $postCollection)
    {
        $this->apiUrl = env('EZPAY_TEST_API_URL');
        $this->postCollection = $postCollection;
    }

    public function createOrder($attributes)
    {
        $attributes['NotifyURL'] = ($attributes['NotifyURL'] ?? route('ezpay.notify'));
        $attributes['ReturnURL'] = ($attributes['ReturnURL'] ?? route('ezpay.return'));
        $attributes['CustomerURL'] = $attributes['CustomerURL'] ?? route('ezpay.customer');
        // validation >>>
        // todo
        //validation <<<
        
        $this->postCollection->setBasicInfo()->setOrderOptional($attributes);
        $this->postCollection->setTradeInfo()->setTradeSha();

        return $this->composePostData()->send();
    }

    public function composePostData()
    {
        $this->postData = 
        [
            'MerchantID' => $this->postCollection->merchantId,
            'Version' => $this->postCollection->version,
            'TradeInfo' => $this->postCollection->tradeInfo,
            'TradeSha' => $this->postCollection->tradeSha
        ];

        return $this;
    }

    public function send()
    {
        $data = [
            'apiUrl' => $this->apiUrl,
            'postData'  => $this->postData
        ];
        return view('ezpay::send', $data);
    }

    public function query()
    {
        $client = new Client();
        $response = $client->post($this->apiUrl, ['form_params'=>$this->postData]);
        return json_decode((string)$response->getBody());
    }
}