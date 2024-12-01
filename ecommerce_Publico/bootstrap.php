<?php 
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require __DIR__.'/vendor/autoload.php';

$apiContext = new ApiContext(
	new OAuthTokenCredential(
		'AY0_dC-6663LTs0bmzGBTBhru1QKqrKPCupAgshi4mwocdiyBRuNsKtcRYK1_81lsRc4HJqc--MN1WSI',
		'EJh1pfVvC8m9B0hccF_vpW5OqhA6KQjgYJI9yQb1tCwao4K5jr3iSPIgpjXuMFquND1pCpwQ-MWTm0MM'
	)
);

$apiContext->setConfig(
	array(
		'mode' => 'sandbox',
		'http.ConnectionTimeOut' => 30,
		'log.LogEnable' => true,
		'log.Filename' => 'PayPal.log',
		'log.LogLevel' => 'DEBUG',

	)
);

 ?>