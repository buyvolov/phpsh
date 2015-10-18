<?php
class Helpers {
	
	public static function dd($mVal){
		
		echo "<pre>";
			//print_r($mVal);
			var_dump($mVal);
		echo "</pre>";	
	}

	public static function checkPassw($sPassw, $sHash){
		
		$sPasswHash = md5($sPassw);

		if($sPasswHash === $sHash) return true;
		return false;
	}

	public static function render($template, $vars){
		
		if(isset($args)){
            foreach ($args as $key=>$value) {
                ${$key} = $value;
            }
        }

		ob_start();
			include($template);
    		$content = ob_get_contents();
    	ob_end_clean();

    	return $content;
	}
}