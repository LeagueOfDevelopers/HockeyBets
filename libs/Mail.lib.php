<?php

 class Mail{
   //Отправка письма
   public static function new_mail($to, $subject, $message){
   	
   	 $headers = "MIME-Version: 1.0" . "\r\n";
	 $headers .= "Content-type:text/html;charset=windows-1251" . "\r\n";
   	 $headers .= 'From: robot@hockeybets.com' . "\r\n";

     if(mail($to, $subject, $message, $headers)) return true;
	
	 return false;
   }
   	
 }
