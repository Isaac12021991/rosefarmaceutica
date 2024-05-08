<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once APPPATH."/third_party/TexttoImage/Texttoimage.php";
 
class Create_imagen extends TextToImage {
    public function __construct() {
        parent::__construct();
    }
}				
?>