<?php

class Spay
{
    public static $url = "";
    public static $providerkey = "";
    public static $username = "";
    public static $password = "";

    
    /** 
     * Get the public key form spay api
     */
    public static function enrol_spay_get_public_key()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Spay::$url . "GetPublicKey/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'providerKey' => Spay::$providerkey
            ]),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            return json_decode($response);
        }
    }

    /* 
    * Login the d2el user in the spay api
    */
    public static function enrol_spay_login_service()
    {
        $password = Spay::enrol_spay_encrypt_password() ? Spay::enrol_spay_encrypt_password() : null;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Spay::$url . "Login/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'login' => Spay::$username,
                'password' => $password
            ]),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            return json_decode($response);
        }
    }

    public static function enrol_spay_init_pay($msisdn, $servicecode)
    {
        $token = Spay::enrol_spay_login_service() ? Spay::enrol_spay_login_service()->token : null;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Spay::$url . "InitPay/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'msisdn' => $msisdn,
                'serviceCode' => $servicecode
            ]),
            CURLOPT_HTTPHEADER => array(
                "token: " . $token,
                "Content-Type: application/json",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return json_decode($response);
        }
    }

    public static function enrol_spay_encrypt_password()
    {
        if(Spay::enrol_spay_get_public_key()){
            $public_key = "-----BEGIN PUBLIC KEY-----\n" . chunk_split(Spay::enrol_spay_get_public_key()->publicKey, 64, "\n") . "-----END PUBLIC KEY-----";
            if (openssl_public_encrypt(Spay::$password, $crypted, $public_key)) {
                return base64_encode($crypted);
            }
        }else {
            return null;
        }
    }

    public static function enrol_spay_check_subscription($msisdn)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Spay::$url . "CheckSubscription/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>  json_encode([
                'serviceCode' => Spay::$providerkey,
                'msisdn' => $msisdn
            ]),
            CURLOPT_HTTPHEADER => array(
                "token: " . Spay::enrol_spay_login_service()->token,
                "Content-Type: application/json",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            return json_decode($response);
        }
    }

    public static function enrol_spay_unsubscription($msisdn)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Spay::$url . "UnSubscribe/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>  json_encode([
                'serviceCode' => Spay::$providerkey,
                'msisdn' => $msisdn
            ]),
            CURLOPT_HTTPHEADER => array(
                "token: " . Spay::enrol_spay_login_service()->token,
                "Content-Type: application/json",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            return json_decode($response);
        }
    }

    /** 
     * sudain spay payment
     */
    public static function enrol_spay_pay($pin, $requestid)
    {
<<<<<<< HEAD
        $token = Spay::enrol_spay_login_service() ? Spay::enrol_spay_login_service()->token : null;
=======

>>>>>>> d8668c00992f3283667ddcdaf0998e32deb4dbb2
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL =>  Spay::$url . "Payment/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'pin' => $pin,
                'requestId' => $requestid //requestId per operation i have to bind it ro the specific requester
            ]),
            CURLOPT_HTTPHEADER => array(
<<<<<<< HEAD
                "token: " . $token ,
=======
                "token: " . Spay::enrol_spay_login_service()->token,
>>>>>>> d8668c00992f3283667ddcdaf0998e32deb4dbb2
                "Content-Type: application/json",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
<<<<<<< HEAD
        
        $error = curl_error($curl); 
        
        curl_close($curl);
        
        return ($error) ? null : json_decode($response);
=======
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo json_decode($response);
        }
>>>>>>> d8668c00992f3283667ddcdaf0998e32deb4dbb2
    }
}
