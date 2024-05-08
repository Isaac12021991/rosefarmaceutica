<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('jwt/vendor/autoload.php');
use \Firebase\JWT\JWT;

class Authjwt{
    
	var $key = "medinet";
	
    public function encode_token($accion, $tx_modulo, $nu_rif, $nb_dominio, $buscar)
    {
          $token = array(
                "iss" => "http://bionewpharma.com",
                "aud" => "http://bionewpharma.com",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + (7 * 24 * 60 * 60), //expira en una semana            
                "accion" => "$accion",
                "modulo" => "$tx_modulo",
                "nu_rif" => "$nu_rif",
                "nb_dominio" => "$nb_dominio",
                "buscar" => "$buscar"
           );

            $jwt = JWT::encode($token, $this->key);
            return $jwt;    
    }

    
         public function encode_token_verficar_email($email)
    {
          $token = array(
                "iss" => "http://bionewpharma.com",
                "aud" => "http://bionewpharma.com",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + (7 * 24 * 60 * 60), //expira en una semana            
                "email" => "$email"
           );

            $jwt = JWT::encode($token, $this->key);
            return $jwt;    
    }


         public function encode_token_empresa($co_usuario, $nb_empresa, $co_partner, $username)
    {
          $token = array(
                "iss" => "https://rosefarmaceutica.com",
                "aud" => "https://rosefarmaceutica.com",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + (7 * 24 * 60 * 60), //expira en una semana            
                "co_partner" => $co_partner,
                "co_usuario" => $co_usuario,
                "username" => $username,
                "nb_empresa" => $nb_empresa
           );

            $jwt = JWT::encode($token, $this->key);
            return $jwt;    
    }




	public function decode_token($jwt)
    {
	  	$decoded = JWT::decode($jwt, $this->key, array('HS256'));
		return $decoded;	
     }


}




