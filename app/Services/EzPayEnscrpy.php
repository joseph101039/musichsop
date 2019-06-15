<?php

namespace App\Services;
use Illuminate\Support\Collection;

class StringEncryptService
{
    /**
     * @param Collection $collection
     * @param null $key
     * @param null $iv
     * @return string
     * @throws Exception
     */

    static public function encryptAes256cbc(Collection $collection, $hashkey=NULL, $hashiv=NULL)
    {
        if($collection->isNotEmpty())
        {
            $retStr = http_build_query($collection->toArray());
        }
        else{
            throw new \Exception('Post data can not be empty.');
        }

        $tadeInfo = trim(bin2hex(
            openssl_encrypt(
                self::addPadding($retStr),
                'AES-256-CBC',
                $hashkey ?? config('ezpay.mpg.HashKey'), /* adding in php7.0 */
                OPENSSL_RAW_DATA | OPENSSL_NO_PADDING,
                $hashiv ?? config('ezpay.mpg.HashIv')

            )
        ));

        return $tadeInfo;
    }

    static public function descrytAes256cbc($parameter = "")
    {
        return self::stripPadding(
            openssl_decrypt(
                hex2bin($parameter),
                'AES-256-CBC',
                config('ezpay.mpg.HashKey'),
                OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING,
                config('ezpay.mpg.HashIv')
            )
        );
    }

    /**
     * @param $aesTradeInfo
     * @return string
     * @throws Exception
     */
    static public function encryptSha256($aesTradeInfo)
    {
        if (empty($aesTradeInfo)) {
            throw new \Exception('TradeInfo can not be empty');
        }
        $beHashString[] = 'HashKey='. config('ezpay.mpg.HashKey');
        $beHashString[] = $aesTradeInfo;
        $beHashString[] = 'HashIV='. config('ezpay.mpg.HashIV');
        return strtoupper(hash("sha256", join('&', $beHashString)));
    }

    static public function jsonParseResponse($info)
    {
        return json_decode(self::descrpyAes256cbc($info));
    }

    static private function addPadding($string, $blockSize = 32) {
        $len = strlen($string);
        $pad = $blockSize - ($len % $blockSize);
        $string .= str_repeat(chr($pad), $pad);
        return $string;
    }

    static private function stripPadding($string) {
        $slast = ord(substr($string, -1));
        $slastc = chr($slast);
        if (preg_match("/$slastc{" . $slast . "}/", $string)) {
            $string = substr($string, 0, strlen($string) - $slast);
            return $string;
        } else {
            return false;
        }
    }
}