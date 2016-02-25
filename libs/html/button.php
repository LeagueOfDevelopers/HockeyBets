<?php
/**
 * Сборка кнопки
 **/
return "<html><script language=JavaScript ".
"src='https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?".
"MerchantLogin=$mrh_login&OutSum=$out_summ&InvoiceID=$inv_id".
"&Description=$inv_desc&SignatureValue=$crc'></script></html>
				   <br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться'/>
				   ";