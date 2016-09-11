<?php
session_start();
require 'twconfig.php';
require 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
//pega a sessao criada em login.php
$request_token = array(
	'oauth_token' => $_SESSION['oauth_token'],
	'oauth_token_secret' => $_SESSION['oauth_token_secret']
);
//abrindo conexao com o twitter
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
//definindo a sessao
$_SESSION['tw_access_token'] = $connection->oauth('oauth/access_token', array(
	'oauth_verifier' => $_GET['oauth_verifier']
));

header("Location: index.php");