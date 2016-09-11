<?php
session_start();
require 'twconfig.php';
require 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
//liberando acesso
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
//enviar para o twitter para saber o que eu estou querendo
$request_token = $connection->oauth('oauth/request_token', array(
	'oauth_callback' => OAUTH_CALLBACK
));
//criando sessão ele retorna um array
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
//url de autorizacao
$url = $connection->url('oauth/authorize', array(
	'oauth_token' => $request_token['oauth_token']
));
//pega a url de autorizacao e retorna para o callback
header("Location: ".$url);