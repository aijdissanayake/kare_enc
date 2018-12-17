<?php 

/**
*  Corresponding Class to test YourClass class
*
*  For each class in your library, there should be a corresponding Unit-Test for it
*  Unit-Tests should be as much as possible independent from other test going on.
*
*  @author yourname
*/
class RSATest extends PHPUnit_Framework_TestCase{
	
  /**
  * Just check if the YourClass has no syntax error 
  *
  * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
  * any typo before you even use this library in a real project.
  *
  */

  public function testIsThereAnySyntaxError(){
    $var = new kare\kare_enc\RSA;
    $this->assertTrue(is_object($var));
    unset($var);
  }
  
  /**
  * Just check if the YourClass has no syntax error 
  *
  * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
  * any typo before you even use this library in a real project.
  *
  */

  public function testPublicKeyEncrypt(){
    $var = new kare\kare_enc\RSA;
    $pubkey = openssl_pkey_get_public(file_get_contents('sample_public.key'));
    $this->assertTrue(strlen($var->publicKeyEncrypt("abcde", $pubkey)) > 0);
    unset($var);
  }
  
  public function testPrivateKeyDecrypt(){
    $var = new kare\kare_enc\RSA;
    $pubkey = openssl_pkey_get_public(file_get_contents('sample_public.key'));
    $pvtkey = openssl_pkey_get_private(file_get_contents('sample_private.key'));
    $enc = $var->publicKeyEncrypt("abcde", $pubkey);
    $dec = $var->privateKeyDecrypt($enc, $pvtkey);
    $this->assertTrue($var->privateKeyDecrypt($enc, $pvtkey) == 'abcde');
    unset($var);
  }
}