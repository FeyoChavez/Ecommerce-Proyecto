<?php 
use PayPal/Rest/ApiContext;

use PayPal/Auth/AuthTokenCredential;

require __DIR__. '/vendor/autoload.php';

$apiContext = new ApiContext(
	new OAuthTokenCredential(
		'AdHssXu0K68OnMrzuxN5Jy1Fy9GlecgsfffDIzRCoBCTelOrMphJPwvEMKBmIGJE0qysBLPqRwPCv8Uo', 'EOZJsrP348rP5DepJUnKTJltQLfcprp6chRkQElbmUCcQDJ_IOIP9A2t0WiDs7kr3Q9i7zEZjPy0FN9y'
	)
	
);

$apiContext->setConfig(
array(
'mode' => 'sandbox',
'http.ConnectionTimeOut'=>30,
'log.LogEnabled'=> true,
'log.FileName'=> 'PayPal.log',
'log.LogLevel', => 'DEBUG',
	


	)

);


 ?>