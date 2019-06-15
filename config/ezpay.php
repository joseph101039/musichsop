<?php
    return [
        "mpg"=>
        [
            "MerchantID"=> env("EZPAY_MPG_MERCHANT_ID", ""),
            "Version" => "1.0",
            "HashKey" => env("EZPAY_MPG_HASH_KEY", ""),
            "HashIV" => env("EZPAY_MPG_HASH_IV", ""),
        ],

        
    ];

?>