
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>сайт Александра Шилова</title>
	<link rel="stylesheet" href="style.css"> 
	<script type="text/javascript">
		
		<?php

			function get_currency($currency_code, $format) {

	$date = date('d/m/Y'); // Текущая дата
	$cache_time_out = '3600'; // Время жизни кэша в секундах

	$file_currency_cache = __DIR__.'/XML_daily.asp';

	if(!is_file($file_currency_cache) || filemtime($file_currency_cache) < (time() - $cache_time_out)) {

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://www.cbr.ru/scripts/XML_daily.asp?date_req='.$date);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_HEADER, 0);

		$out = curl_exec($ch);

		curl_close($ch);

		file_put_contents($file_currency_cache, $out);

	}

	$content_currency = simplexml_load_file($file_currency_cache);

	return number_format(str_replace(',', '.', $content_currency->xpath('Valute[CharCode="'.$currency_code.'"]')[0]->Value), $format);

}


		?>

	    function abarchange() {

	    		var usd = <?php echo get_currency('USD', 5); ?>;
				var eur = <?php echo get_currency('EUR', 5); ?>;
				var huf = <?php echo get_currency('HUF', 5); ?>;
				var nok = <?php echo get_currency('NOK', 5); ?>;
				
				var cash = document.getElementById("userCash").value;
				
				huf = parseFloat(huf);
				nok = parseFloat(nok);
				
				var changeHuf = (cash/huf);
				var changeNok = (cash/nok);
				var cashRur = (cash*huf/100);
				var changeRurNok = (10*cashRur/nok);
				
				
				cash = parseFloat(cash);
				cashRur = parseFloat(cashRur);
				changeRurNok = parseFloat(changeRurNok);
				
				
				
				
					

	      
	        if ( cash > 49999999){
	        	alert("Долго же Вы копили....");
	        } else {
					alert("На Ваши форинты можно купить: \n- "+changeRurNok.toFixed(2) +" NOK (норвежских крон) ");
		        	        	
	        }
	    }

				


	</script>
</head>
<body>
<div class="content">
		<?php 
			include "menu.php";
		?>	
	<div class="contentWrap">
	    <div class="content">
	        <div class="center">

				<h1>конвертор Венгерских форинтов в Норвежские кроны</h1>

				<div>
					<p> <span>|</span>  10 Норвежских крон стоят <?php echo get_currency('NOK', 3); ?> руб. <span>|</span>  100 Венгерских форинтов стоят <?php echo get_currency('HUF', 3); ?> руб. <span>|</span>  Американский доллар стоит <?php echo get_currency('USD', 3); ?> руб. <span>|</span>   Евро <?php echo get_currency('EUR', 3); ?> руб.</p>
				</div>

                <div class="box">

                    <p>Это приложение - обменник<br><b><i>Сколько Вы хотите сконвертировать Венгерских форинтов в Норвежские кроны ?</i></b></p>
                    <p>
                    	<label class="passBold" id ="info">Введите имеющуюся у Вас сумму Венгерских форинтов</label>
                    </p>
                    <p>
                    	<input class="numberIn" type ="text" id="userCash">
                    </p> <p>    </p>
                  
                     <a href="#" onClick="abarchange();" id= "button">  Обменять</a>

                </div>

	        </div>
	    </div>
	</div>
</div>

<div class="footer">

		<?php 
			include "menu.php";
		?>	
		<br>
	Copyright &copy; <?php echo date("Y"); ?> Alexandr Shilov
<div>

</body>
</html>