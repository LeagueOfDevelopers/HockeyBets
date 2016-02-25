<?php
  class Error{
  	/**
	 * Записываем данные в лог
	 * */
  	public static function ErrLog($error){
  		$date = date('d-m-Y (H:i:s)');
		if(file_exists(ROOT_DIR.'/errorLog.dat')){
			$file = file_put_contents(ROOT_DIR.'/errorLog.dat', $date.'::'.$error, FILE_APPEND);
		}else{
			$file = file_put_contents(ROOT_DIR.'/errorLog.dat', $date.'::'.$error);
		}
	
		
  	}
	 
  }
