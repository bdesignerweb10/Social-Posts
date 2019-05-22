<?php
// ########################################
// ######## VARIAVEIS DE AMBIENTE #########
// ########################################

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

ob_start();
if (!isset($_SESSION)) session_start(); 

//require_once("acts/errorhandling.php");

// ########################################
// ############ CONN DATABASE #############
// ########################################

// DEV
$conn = new mysqli("localhost", "root", "root", "socialposts");

// PRD
//$conn = new mysqli("cartolassemcar.mysql.dbaas.com.br", "cartolassemcar", "cart@12345", "cartolassemcar");

if ($conn->connect_errno) {
    die("00000 - Failed to connect to MySQL: [$conn->connect_errno] $conn->connect_error");
}

// ########################################
// ################# INFO: ################
// ########################################

// PADRAO DE MENSAGEM DE ERROS:
// 99999
// |
// --> Prefixo do nivel do sistema. 0 = conn | 1 = site | 2 = admin
// 99999
//  |
//  --> Numero que indica o script. Sequencial em cada nivel de sistema
// 99999
//   |
//   --> Tres seguintes numeros: Sequencial do lugar onde a mensagem foi apresentada. Vai facilitar na hora de buscar no codigo do porque do erro aconteceu

	// ########################################
	// ################ SETS ##################
	// ########################################

	$_SESSION["fake_id"] = 98478521;

	// ########################################
	// ############## COOKIES #################
	// ########################################

	if(!isset($_SESSION["usu_id"]) || empty($_SESSION["usu_id"])) {
		if(isset($_COOKIE['usu_id']) && !empty($_COOKIE['usu_id'])) {
			$_SESSION["usu_id"] = $_COOKIE['usu_id'];
		}
	}	

	if(!isset($_SESSION["usu_login"]) || empty($_SESSION["usu_login"])) {
		if(isset($_COOKIE['usu_login']) && !empty($_COOKIE['usu_login'])) {
			$_SESSION["usu_login"] = $_COOKIE['usu_login'];
		}
	}

	if(!isset($_SESSION["usu_nome"]) || empty($_SESSION["usu_nome"])) {
		if(isset($_COOKIE['usu_nome']) && !empty($_COOKIE['usu_nome'])) {
			$_SESSION["usu_nome"] = $_COOKIE['usu_nome'];
		}
	}

	if(!isset($_SESSION["usu_nivel"]) || empty($_SESSION["usu_nivel"])) {
		if(isset($_COOKIE['usu_nivel']) && !empty($_COOKIE['usu_nivel'])) {
			$_SESSION["usu_nivel"] = $_COOKIE['usu_nivel'];
		}
	}


	// ########################################
	// ############# FUNCTIONS ################
	// ########################################	

	function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
	{
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
		$rand = mt_rand(1, $len);
		$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}

	function url_origin($s, $use_forwarded_host = false)
	{
	    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
	    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
	    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
	    $port     = $s['SERVER_PORT'];
	    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
	    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
	    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
	    return $protocol . '://' . $host;
	}

	function full_url($s, $use_forwarded_host = false)
	{
	    return htmlspecialchars(url_origin( $s, $use_forwarded_host) . $s['REQUEST_URI'], ENT_QUOTES, 'UTF-8' );
	}

	function full_path()
	{
		$x = pathinfo(full_url($_SERVER));
	    return $x['dirname'] . "/";
	}

	
	function nl2p($string)
	{
	    $paragraphs = '';

	    foreach (explode("\n", $string) as $line) {
	        if (trim($line)) {
	            $paragraphs .= '<p>' . $line . '</p>';
	        }
	    }

	    return $paragraphs;
	}

?>