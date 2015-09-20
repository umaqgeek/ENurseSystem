<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_Func {
	
	public function __construct(){
		$this->obj = &get_instance();
	}
        
        public function encrypt($text) {
		$CI = $this->obj;
		//$data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $CI->config->item('encryption_key'), $text, MCRYPT_MODE_ECB, '1');
        //return base64_encode($data);
		$val1 = $CI->encrypt->encode($text);
		$val2 = '';
		for ($i=0; $i<strlen($val1); $i++) {
			if ($val1[$i] == '/') {
				$val2 .= '_';
			} else if ($val1[$i] == '+') {
				$val2 .= '-';
			} else {
				$val2 .= $val1[$i];
			}
		}
		return $val2;
	}
	
	public function decrypt($text) {
		$CI = $this->obj;
		//$text = base64_decode($text);
        //return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $CI->config->item('encryption_key'), $text, MCRYPT_MODE_ECB, '1');
		$val1 = '';
		for ($i=0; $i<strlen($text); $i++) {
			if ($text[$i] == '_') {
				$val1 .= '/';
			} else if ($text[$i] == '-') {
				$val1 .= '+';
			} else {
				$val1 .= $text[$i];
			}
		}
		$val2 = $CI->encrypt->decode($val1);
		return $val2;
	}
        
        public function getCheckDigit($len=1) {
            return random_string('numeric', $len);
        }
        
}
?>