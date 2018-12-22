<?php namespace kare\kare_enc;

/**
*  @author Achala Dissanayake
*/

final class RSA{

    public static function importPrivateKeyString($keyString){
        return openssl_pkey_get_private($keyString);
    }

    public static function importPrivateKeyFile($filePath){
        $keyString = file_get_contents($filePath);
        return openssl_pkey_get_private($keyString);
    }

    public static function importPublicKeyString($keyString){
        return openssl_pkey_get_public($keyString);
    }

    public static function importPublicKeyFile($filePath){
        $keyString = file_get_contents($filePath);
        return openssl_pkey_get_public($keyString);
    }
    
    public static function publicKeyEncrypt($message, $publicKey){
        openssl_public_encrypt($message, $encrypted, $publicKey, $padding = OPENSSL_PKCS1_OAEP_PADDING);
        return $encrypted;
    }

    public static function privateKeyDecrypt($encryptedMessage, $privateKey){
        openssl_private_decrypt($encryptedMessage, $decrypted, $privateKey, $padding = OPENSSL_PKCS1_OAEP_PADDING);
        return $decrypted;
    }

}
