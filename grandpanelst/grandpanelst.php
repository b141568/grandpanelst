<?
// Totalmente desenvolvido por Bruno Webmaster
// site: www.brunowebmaster.pro | www.maximalhost.com




// Não altere nada






function grandpanelst_ConfigOptions() {
      $configarray = array ('Ouvintes' => array ('Type' => 'text', 'Size' => '10', 'Description' => '<br>(Numero maximo de ouvintes. Ex.: 100)'),
						  'Bitrate' => array ('Type' => 'dropdown', 'Options' => '24,32,48,64,128,320', 'Description' => '<br>(Verifique limite de seu plano)'),
						  'Espaco AutoDJ' => array ('Type' => 'text', 'Size' => '10', 'Description' => '<br>(Espaco para FTP do autodj, valor em megabytes. Ex.: 1000)'),
						 );
    return $configarray;
}

  function grandpanelst_CreateAccount ($params){
  global $debug;
	$str = "abc12484";
	$randomico=str_shuffle($str); 
	$usuario=$randomico;
	$senha=substr(md5("acegikmoqsuxywz".time()),0,12);
	$ouvintes=$params['configoption1'];
	$espaco=$params['configoption3'];
	$bitrate=$params['configoption2'];
	$bitrate=$bitrate*1000;
	$hostname=$params['serverhostname'];
	$email=$params['clientsdetails']['email'];
	$api_rv=$params['serverpassword'];
	$link='https://'.$hostname.'/api.php?api='.$api_rv.'&ouvintes='.$ouvintes.'&espaco='.$espaco.'&usuario='.$usuario.'&email='.$email.'&senha='.$senha.'&bitrate='.$bitrate.'&acao=criar';
	$response = api($link);
	if ($response['command'] == 'success')
    {
		
		
		mysql_query ('UPDATE tblhosting SET domain=\'' . $hostname . '\', username=\'' . $usuario . '\', password=\'' . encrypt ($senha). '\' WHERE id=\'' . $params['serviceid'] . '\'');
		
		 return 'success';
    }

    return $response['error'];
  
	
	  
	  
  } // funcao criar conta
  



// funcao suspender conta
  function grandpanelst_SuspendAccount ($params)
  {
    global $debug;
	
	$get_data_user=mysql_fetch_assoc(mysql_query('select * from tblhosting WHERE id=\'' . $params['serviceid'] . '\''));
	$usuario=$get_data_user["username"];
	$api_rv=$params['serverpassword'];
	$hostname=$params['serverhostname'];
	$link='https://'.$hostname.'/api.php?api='.$api_rv.'&acao=suspender&usuario='.$usuario.'';

	$response = api($link);
	if ($response['command'] == 'success')
    {
		
		
		mysql_query ('UPDATE tblhosting SET domainstatus=\'Suspended\' WHERE id=\'' . $params['serviceid'] . '\'');
		
		 return 'success';
    }

    return $response['error'];
	
  } // fim suspender conta
  
  
  
  
  
  /// funcao reativar conta
  
 
  function grandpanelst_UnsuspendAccount ($params)
  {
    global $debug;
	
	$get_data_user=mysql_fetch_assoc(mysql_query('select * from tblhosting WHERE id=\'' . $params['serviceid'] . '\''));
	$usuario=$get_data_user["username"];
	$api_rv=$params['serverpassword'];
	$hostname=$params['serverhostname'];
	$link='https://'.$hostname.'/api.php?api='.$api_rv.'&acao=reativar&usuario='.$usuario.'';

	$response = api($link);
	if ($response['command'] == 'success')
    {
		
		
		mysql_query ('UPDATE tblhosting SET domainstatus=\'Active\' WHERE id=\'' . $params['serviceid'] . '\'');
		
		 return 'success';
    }

    return $response['error'];
	
  } // fim reativar conta






// funcao terminar conta
  
 
  function grandpanelst_TerminateAccount ($params)
  {
    global $debug;
	
	$get_data_user=mysql_fetch_assoc(mysql_query('select * from tblhosting WHERE id=\'' . $params['serviceid'] . '\''));
	$usuario=$get_data_user["username"];
	$api_rv=$params['serverpassword'];
	$hostname=$params['serverhostname'];
	$link='https://'.$hostname.'/api.php?api='.$api_rv.'&acao=terminar&usuario='.$usuario.'';

	$response = api($link);
	if ($response['command'] == 'success')
    {
		
		
		mysql_query ('UPDATE tblhosting SET domainstatus=\'Terminated\' WHERE id=\'' . $params['serviceid'] . '\'');
		
		 return 'success';
    }

    return $response['error'];
	
  } // fim reativar conta





























function api ($link)
  {
	
    $content = file_get_contents($link);

 
 		if($content=='Error 1'){
	 return array ('command' => 'failed', 'error' => 'Voce ultrapassou o limite de ouvintes');
		}
		if($content=='Error 2'){
	 return array ('command' => 'failed', 'error' => 'Você já ultrapassou o limite de streamings!');
		}
		
		if($content=='Error 3'){
	 return array ('command' => 'failed', 'error' => 'Streaming não existe ou voce não tem permissao!');
		}
		
		if($content=='Error 4'){
	 return array ('command' => 'failed', 'error' => 'Usuário já existe!');
		}
		
		if($content=='Sucesso'){
	 return array ('command' => 'success', 'returned' => 'Usuário criado com sucesso');
		}
 
	
	
    

	
  } // funcao api

?>