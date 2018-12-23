# KARE ENC

Composer Package - https://packagist.org/packages/kare/kare_enc

[![Latest Stable Version](https://poser.pugx.org/kare/kare_enc/v/stable)](https://packagist.org/packages/kare/kare_enc)
[![Latest Unstable Version](https://poser.pugx.org/kare/kare_enc/v/unstable)](https://packagist.org/packages/kare/kare_enc)
[![License](https://poser.pugx.org/kare/kare_enc/license)](https://packagist.org/packages/kare/kare_enc)
[![Total Downloads](https://poser.pugx.org/kare/kare_enc/downloads)](https://packagist.org/packages/kare/kare_enc)

## Install

```
$ composer require kare/kare_enc
```

## Usage

### Initialize
```php
use kare\kare_enc\RSA as RSA;
```
### Generate RSA Key Pair

```generateKeyPair(int $keyLength)``` - Returns a private public key pair in the form of ```pkcs8-pem``` in an array with ```key  => value``` pairs as ```['publicKey'=> $publicKey, 'privateKey'=> $privateKey}```.  ```$keyLength``` is an optional parameter defaulted to ```2048```.
##### Example :
```php
$keyPair = RSA::generateKeyPair(); //generates a RSA key pair of bit-length 2048 - default key length
$keyPair = RSA::generateKeyPair(4096);  //generates a RSA key pair of bit-length 4096
$pubKey = $keyPair['publicKey']; // get the public component
$pvtKey = $keyPair['privateKey']; // get the private component
```

### Import RSA Keys

---

```importPrivateKeyString(string $keyString)``` - Returns the private key corresponding to the given `pem` string.
##### Example :
```php
$pvtKeyString = "-----BEGIN RSA PRIVATE KEY-----\nMIIEoQIBAAKCAQBGIdM1Sg1AEV7fR2auPildd+YQKkhzm0AbFPesm/ZaB7cSnfCb\nb9KhxSH63JVsJvK9mAT4r8ctmbKHTLkwLx6mw652g1Px7qDHAvQghkoXlsRjE2Cv\nuiIx1hAdp9QezkFaNB5yutHhOs6PJGVOnG/0zaQJ3516vtFV6PyJe/KWTvVs5Feq\naJMWi4UjOgm71q7V6/rY+cP64xplF4lZPN6v2RtsM/wxz2pr+rLvIMbNoX2y8RWR\nYRM3NWlE9dCrfh4aul6tGPdATXutgaYXHDRTGL7FxPrPI63RgsNSqxyXVq1J8ccS\ntnuB9QQ/7YbIArMf+z6FLEm32kIokn1yBQ5RAgMBAAECggEAPwKxAtXvpbp1pOI/\n7RlIjQPmnmt/AO9h33MtO9Y8tpLr9zwUK3OCqXm2l++MCMnNmm51OQKlT+Eht9JF\nKHeNcIOrwisoRtwBdAzBTl+ZPixlcia83eW8R05u2FYrjSn/KY5eNPKJE3WElLM8\nmi6PoEEKuxxAH0JGTouwKc5FHKoPlTiaSAOE+F6qkaKjm09uYoXt0pVZg/g9JDQU\nAJqJsHa9tqwzbv/vU7g7m8H5y6hCxTK38JQc+541Tj5ka5wmCYL3YuuqqrM3WnzS\nV5XaFYgKex/Gldu+lH/4wayztPqxEog12Arq4OclUix8Erm0Ry6S35Z9uJNzvd7R\n71JO4QKBgQCJys0NK7/0/K7bGJfX/s4n9OlSi6bG2XL+MTZ9gt/UCjOhHjbgNTqv\ngLMZKOgKwRKxbsQRi7FEK4UE2wwX5CYZWitmQ5Cl9RcX7Fw9PBDxLz75BfQXXERI\nB23etTQxUwl9mqeQwtCc2sBCAd1IwVdV6NzlD9A2vXfGzNYSfoA4XQKBgQCCS+Au\nlrPCwJ+Dr1yifcddfT9Hqxb9itFqQkpqae4UMLElahesVUJL98JqtNUst2UuGaG2\nDdNL4tVD5lqBofo27z+IzJOkBRODKdQqTuQyCfkGBTHygrtGc0PIGIp8ewu1wwXU\nilhFQlcABqGi4w3elLqjuYrvuPJw2T4KUbJ+hQKBgG2quwiAiYaylXhLWo7OfcXP\nZuQLwfEBoEQvZu79+qcId48EPSi1NL/57pFXvVbR087kGajdRXi8KmJy9G0PaENF\nQMVjgPyU1Ix10fPqmpFayQPpeRwekznAr/FQxvl63VLahALzCpXMhLgEQ9pkBt6Z\nNzYYH99xbKMM5FRT2jkBAoGAAo+LMF812TX/7I6du3PNX0D+5WGvafw4cWYsIDtE\nupDaamnTXUevrd6Iq6AyMFbKXkWSsAlFhdBHcLYuQS31xO6eyQl8PVT8NS+1Q7+Z\nLIKVqlCf0qxPEetiAaS51Ah3CnNyweKWKYZMP2vh8VmVBDLYGC+lU2DHIwCh/4Hr\niCECgYAcDUeDWZeoAROW9TpHSx80EXE5Olfmd9kolBOLIukEeYdV89EyW7uOfrlf\n0iMvMD7wDpxH8BK83nHU5l4/PAm+znoo2PWd7Hvr+90f4ST0yDfaVjSkjY7+cfhr\nsCW6jKCgS5h2VI0QPn4zwWaGACRhkT1RfRXJXsaDgUknz+2XZA==\n-----END RSA PRIVATE KEY-----";
$pvtKey = RSA::importPrivateKeyString($pvtKeyString);
```

---

```importPrivateKeyFile(string $filePath)``` - Returns the private key corresponding to the given content in the `.key` file specified in the  `$filePath`.
##### Example :
```php
$pvtKey = RSA::importPrivateKeyFile('./keys/sample_private.key');
```

---


```importPublicKeyString(string $keyString)``` - Returns the public key corresponding to the given `pem` string.
##### Example :
```php
$pubKeyString = "-----BEGIN PUBLIC KEY-----\nMIIBITANBgkqhkiG9w0BAQEFAAOCAQ4AMIIBCQKCAQBGIdM1Sg1AEV7fR2auPild\nd+YQKkhzm0AbFPesm/ZaB7cSnfCbb9KhxSH63JVsJvK9mAT4r8ctmbKHTLkwLx6m\nw652g1Px7qDHAvQghkoXlsRjE2CvuiIx1hAdp9QezkFaNB5yutHhOs6PJGVOnG/0\nzaQJ3516vtFV6PyJe/KWTvVs5FeqaJMWi4UjOgm71q7V6/rY+cP64xplF4lZPN6v\n2RtsM/wxz2pr+rLvIMbNoX2y8RWRYRM3NWlE9dCrfh4aul6tGPdATXutgaYXHDRT\nGL7FxPrPI63RgsNSqxyXVq1J8ccStnuB9QQ/7YbIArMf+z6FLEm32kIokn1yBQ5R\nAgMBAAE=\n-----END PUBLIC KEY-----";
$pubKey = RSA::importPrivateKeyString($pubKeyString);
```

---

```importPublicKeyFile(string $filePath)``` - Returns the public key corresponding to the given content in the `.key` file specified in the  `$filePath`.
##### Example :
```php
$pubKey = RSA::importPublicKeyFile('./keys/sample_public.key');
```

### Encrypt

```publicKeyEncrypt(string $message, mixed $publicKey)``` - Returns the encrypted value in ```base64``` format, given a string message and the public key obtained as shown above.

##### Example :
```php
$encrypted = RSA::publicKeyEncrypt("abcde", $pubkey);
```

### Decrypt

```privateKeyDecrypt(string encryptedMessage, mixed privateKey)``` - Returns the derypted string value, given the encrypted value in ```base64``` format and the private key obtained as shown above.

##### Example :
```php
$decrypted = RSA::privateKeyDecrypt($enc, $encrypted);
```
