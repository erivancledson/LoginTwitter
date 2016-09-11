<?php
session_start();
require 'twconfig.php';
require 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
//verificar se existe uma sessao criada e se ela não estiver vazia
if(isset($_SESSION['tw_access_token']) && !empty($_SESSION['tw_access_token'])) {
              
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['tw_access_token']['oauth_token'], $_SESSION['tw_access_token']['oauth_token_secret']);
          //verificar se a menssagem não está vazia
	if(isset($_POST['msg']) && !empty($_POST['msg'])) {
                 //enviando mensagens para o twitter
		$connection->post('statuses/update', array(
			'status' => $_POST['msg']
		));

		echo 'Tweet publicado com sucesso!';

	}

} else {
	echo '<a href="login.php">Login com Twitter</a>';
}
?>
<!-- enviar mensagem !-->
<form method="POST">
	<input type="text" name="msg" /><br/><br/>

	<input type="submit" value="Enviar" />
</form>