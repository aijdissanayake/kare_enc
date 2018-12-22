<?php 

/**
*  @author Achala Dissanayake
*/
class RSATest extends PHPUnit_Framework_TestCase{
	
  /**
  * Check if the class has no syntax error 
  */

  public function testIsThereAnySyntaxError(){
    $var = new kare\kare_enc\RSA;
    $this->assertTrue(is_object($var));
    unset($var);
  }
  
  public function testPublicKeyEncrypt(){
    $var = new kare\kare_enc\RSA;
    $pubKey = openssl_pkey_get_public(file_get_contents('sample_public.key'));
    $this->assertTrue(strlen($var->publicKeyEncrypt("abcde", $pubKey)) > 0);
    unset($var);
  }
  
  public function testPrivateKeyDecrypt(){
    $var = new kare\kare_enc\RSA;
    $pubKey = openssl_pkey_get_public(file_get_contents('sample_public.key'));
    $pvtKey = openssl_pkey_get_private(file_get_contents('sample_private.key'));
    $enc = $var->publicKeyEncrypt("abcde", $pubKey);
    $dec = $var->privateKeyDecrypt($enc, $pvtKey);
    $this->assertTrue($dec == 'abcde');
    unset($var);
  }

  public function testImportPrivateKeyString(){
    $var = new kare\kare_enc\RSA;
    $pvtKeyString = "-----BEGIN RSA PRIVATE KEY-----\nMIIEoQIBAAKCAQBGIdM1Sg1AEV7fR2auPildd+YQKkhzm0AbFPesm/ZaB7cSnfCb\nb9KhxSH63JVsJvK9mAT4r8ctmbKHTLkwLx6mw652g1Px7qDHAvQghkoXlsRjE2Cv\nuiIx1hAdp9QezkFaNB5yutHhOs6PJGVOnG/0zaQJ3516vtFV6PyJe/KWTvVs5Feq\naJMWi4UjOgm71q7V6/rY+cP64xplF4lZPN6v2RtsM/wxz2pr+rLvIMbNoX2y8RWR\nYRM3NWlE9dCrfh4aul6tGPdATXutgaYXHDRTGL7FxPrPI63RgsNSqxyXVq1J8ccS\ntnuB9QQ/7YbIArMf+z6FLEm32kIokn1yBQ5RAgMBAAECggEAPwKxAtXvpbp1pOI/\n7RlIjQPmnmt/AO9h33MtO9Y8tpLr9zwUK3OCqXm2l++MCMnNmm51OQKlT+Eht9JF\nKHeNcIOrwisoRtwBdAzBTl+ZPixlcia83eW8R05u2FYrjSn/KY5eNPKJE3WElLM8\nmi6PoEEKuxxAH0JGTouwKc5FHKoPlTiaSAOE+F6qkaKjm09uYoXt0pVZg/g9JDQU\nAJqJsHa9tqwzbv/vU7g7m8H5y6hCxTK38JQc+541Tj5ka5wmCYL3YuuqqrM3WnzS\nV5XaFYgKex/Gldu+lH/4wayztPqxEog12Arq4OclUix8Erm0Ry6S35Z9uJNzvd7R\n71JO4QKBgQCJys0NK7/0/K7bGJfX/s4n9OlSi6bG2XL+MTZ9gt/UCjOhHjbgNTqv\ngLMZKOgKwRKxbsQRi7FEK4UE2wwX5CYZWitmQ5Cl9RcX7Fw9PBDxLz75BfQXXERI\nB23etTQxUwl9mqeQwtCc2sBCAd1IwVdV6NzlD9A2vXfGzNYSfoA4XQKBgQCCS+Au\nlrPCwJ+Dr1yifcddfT9Hqxb9itFqQkpqae4UMLElahesVUJL98JqtNUst2UuGaG2\nDdNL4tVD5lqBofo27z+IzJOkBRODKdQqTuQyCfkGBTHygrtGc0PIGIp8ewu1wwXU\nilhFQlcABqGi4w3elLqjuYrvuPJw2T4KUbJ+hQKBgG2quwiAiYaylXhLWo7OfcXP\nZuQLwfEBoEQvZu79+qcId48EPSi1NL/57pFXvVbR087kGajdRXi8KmJy9G0PaENF\nQMVjgPyU1Ix10fPqmpFayQPpeRwekznAr/FQxvl63VLahALzCpXMhLgEQ9pkBt6Z\nNzYYH99xbKMM5FRT2jkBAoGAAo+LMF812TX/7I6du3PNX0D+5WGvafw4cWYsIDtE\nupDaamnTXUevrd6Iq6AyMFbKXkWSsAlFhdBHcLYuQS31xO6eyQl8PVT8NS+1Q7+Z\nLIKVqlCf0qxPEetiAaS51Ah3CnNyweKWKYZMP2vh8VmVBDLYGC+lU2DHIwCh/4Hr\niCECgYAcDUeDWZeoAROW9TpHSx80EXE5Olfmd9kolBOLIukEeYdV89EyW7uOfrlf\n0iMvMD7wDpxH8BK83nHU5l4/PAm+znoo2PWd7Hvr+90f4ST0yDfaVjSkjY7+cfhr\nsCW6jKCgS5h2VI0QPn4zwWaGACRhkT1RfRXJXsaDgUknz+2XZA==\n-----END RSA PRIVATE KEY-----";
    $pvtKey = $var->importPrivateKeyString($pvtKeyString);
    $pubKey = openssl_pkey_get_public(file_get_contents('sample_public.key'));
    $enc = $var->publicKeyEncrypt("abcde", $pubKey);
    $dec = $var->privateKeyDecrypt($enc, $pvtKey);
    $this->assertTrue($dec == 'abcde');
    unset($var);
  }

  public function testImportKeyFile(){
    $var = new kare\kare_enc\RSA;
    $pvtKey = $var->importPrivateKeyFile('sample_private.key');
    $pubKey = $var->importPublicKeyFile('sample_public.key');
    $enc = $var->publicKeyEncrypt("abcde", $pubKey);
    $dec = $var->privateKeyDecrypt($enc, $pvtKey);
    $this->assertTrue($dec == 'abcde');
    unset($var);
  }

  public function testImportPublicKeyString(){
    $var = new kare\kare_enc\RSA;
    $pvtKey = openssl_pkey_get_private(file_get_contents('sample_private.key'));
    $pubKeyString = "-----BEGIN PUBLIC KEY-----\nMIIBITANBgkqhkiG9w0BAQEFAAOCAQ4AMIIBCQKCAQBGIdM1Sg1AEV7fR2auPild\nd+YQKkhzm0AbFPesm/ZaB7cSnfCbb9KhxSH63JVsJvK9mAT4r8ctmbKHTLkwLx6m\nw652g1Px7qDHAvQghkoXlsRjE2CvuiIx1hAdp9QezkFaNB5yutHhOs6PJGVOnG/0\nzaQJ3516vtFV6PyJe/KWTvVs5FeqaJMWi4UjOgm71q7V6/rY+cP64xplF4lZPN6v\n2RtsM/wxz2pr+rLvIMbNoX2y8RWRYRM3NWlE9dCrfh4aul6tGPdATXutgaYXHDRT\nGL7FxPrPI63RgsNSqxyXVq1J8ccStnuB9QQ/7YbIArMf+z6FLEm32kIokn1yBQ5R\nAgMBAAE=\n-----END PUBLIC KEY-----";
    $pubKey = $var->importPublicKeyString($pubKeyString);
    $enc = $var->publicKeyEncrypt("abcde", $pubKey);
    $dec = $var->privateKeyDecrypt($enc, $pvtKey);
    $this->assertTrue($dec == 'abcde');
    unset($var);
  }
  
}
