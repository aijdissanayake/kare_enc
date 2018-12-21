<?php namespace kare\kare_enc;

/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author Achala
*/
final class RSA{

   /**  @var string $m_SampleProperty define here what this variable is for, do this for every instance variable */
   private $enc_algo = 'RSA';
 
  /**
  * Sample method 
  *
  * Always create a corresponding docblock for each method, describing what it is for,
  * this helps the phpdocumentator to properly generator the documentation
  *
  * @param string $param1 A string containing the parameter, do this for each parameter to the function, make sure to make it descriptive
  *
  * @return string
  */

   public static function publicKeyEncrypt($message, $publicKey){
        openssl_public_encrypt($message, $encrypted, $publicKey);
        return $encrypted;
   }

   public static function privateKeyDecrypt($encryptedMessage, $privateKey){
        openssl_private_decrypt($encryptedMessage, $decrypted, $privateKey);
        return $decrypted;
   }
}
