<div class="sidebar">
	  <div class="dates">
		  <span class="glyphicon glyphicon-time"></span>
		  <div id="currDate"></div>
	  </div>	
      <div class="forecast">
		  <span class="city"><b>Bakı</b></span>
		  {if ($weathermodule[0]['icon']=='01d' || $weathermodule[0]['icon']=='01n')}
			<div class="icon sunny">
			  <div class="sun">
				<div class="rays"></div>
			  </div>
			</div>
		  {else if ($weathermodule[0]['icon']=='02d' || $weathermodule[0]['icon']=='02n')}
			<div class="icon sun-shower">
			  <div class="cloud"></div>
			  <div class="sun">
				<div class="rays"></div>
			  </div>
			</div>		  		  
		  {else if ($weathermodule[0]['icon']=='03d' || $weathermodule[0]['icon']=='03n')}
			<div class="icon cloudy">
			  <div class="cloud"></div>
			</div>		  
		  {else if ($weathermodule[0]['icon']=='04d' || $weathermodule[0]['icon']=='04n')}
			<div class="icon cloudy">
			  <div class="cloud"></div>
			  <div class="cloud"></div>
			</div>		  
		  {else if ($weathermodule[0]['icon']=='09d' || $weathermodule[0]['icon']=='09n')}
			<div class="icon rainy">
			  <div class="cloud"></div>
			  <div class="rain"></div>
			</div>		  
		  {else if ($weathermodule[0]['icon']=='10d' || $weathermodule[0]['icon']=='10n')}
			<div class="icon sun-shower">
			  <div class="cloud"></div>
			  <div class="sun">
				<div class="rays"></div>
			  </div>
			  <div class="rain"></div>
			</div>		  
		  {else if ($weathermodule[0]['icon']=='11d' || $weathermodule[0]['icon']=='11n')}
			<div class="icon thunder-storm">
			  <div class="cloud"></div>
			  <div class="lightning">
				<div class="bolt"></div>
				<div class="bolt"></div>
			  </div>
			</div>		  
		  {else if ($weathermodule[0]['icon']=='13d' || $weathermodule[0]['icon']=='13n')}
			<div class="icon flurries">
			  <div class="cloud"></div>
			  <div class="snow">
				<div class="flake"></div>
				<div class="flake"></div>
			  </div>
			</div>		  
		  {else if ($weathermodule[0]['icon']=='50d' || $weathermodule[0]['icon']=='50n')}
			<div class="icon sun-shower"> 
			  <div class="cloud"></div>
			  <div class="cloud"></div>
			  <div class="sun">
				<div class="rays"></div>
			  </div>   
			</div>		  
		  {/if}
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
          <!--<img src="{URL::base(TRUE)}html/img/{$weathermodule[0]['icon']}.png" width="45">-->
		  <span class="grade">{$weathermodule[0]['temp']} °C</span>         
      </div>
      <div class="rates">
        <div><span class="{$currencymodule[0]['icon']}"></span><b><span class="glyphicon glyphicon-usd curr"></span></b>USD: {$currencymodule[0]['today']}</div>
        <div><span class="{$currencymodule[2]['icon']}"></span><b><span class="glyphicon glyphicon-eur curr"></span></b>EUR: {$currencymodule[2]['today']}</div>		
        <div><span class="{$currencymodule[1]['icon']}"></span><b><span class="glyphicon glyphicon-rub curr"></span></b>RUR: {$currencymodule[1]['today']}</div>
      </div> 
</div>