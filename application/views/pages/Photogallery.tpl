<div class="articleBlock">
{if ($news)}
	<div class="cat_date">
		<div class="date_icon_white"></div>
		{if $news['cat_alt'] == 'KIVDF'}
		<span class="category"><a>{$news['cat_name']}</a></span>
		{else}
		<span class="category"><a href="{URL::base(TRUE)}{$lang}/categories/{$news['cat_alt']}">{$news['cat_name']}</a><span class="date">{$news['date']}</span></span>	
		{/if}
	</div>	
	<header>	
	    <h1>{$news['title']}</h1>
	</header>
	<div class="share42init" data-image="http://{$smarty.server.HTTP_HOST}{$news['photo']}" data-url="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" data-title="{strip_tags($news['title'])}" data-description="{strip_tags($news['title'])}"></div>
	<script type="text/javascript" src="{URL::base(TRUE)}html/js/share42/share42.js"></script>
	<div class="clear">&nbsp;</div>
	{if $news['views']} 
	<div class="views"><div class="ico"></div>{$news['views']}</div>
	{/if}

	{if $news['photo']}   
    <img src="{$news['photo']}" class="articlePhoto" width="100%" />	
    {/if}
    <div class="articleContent">
		{$news['full']}
		{if ($news['gallery'])}
			<div id="bx-pager">
	   		 {foreach from=$news['image'] key=t item=n}						
			  	<a data-slide-index="{$t}" href=""><img width="90" src="{$news['image'][$t]}" /></a>
			 {/foreach} 				  
			</div>

		    <ul class="bxslider">
	   		 {foreach from=$news['image'] key=t item=n}			    	
			  	<li><img height="450" src="{$news['image'][$t]}" title="<h4>{$news['name'][$t]}</h4>{$news['text'][$t]}" /></li>
			 {/foreach} 	
			</ul>

		{/if}
	</div>	
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Статья не найдена",null)}
	</div>
{/if}
</div>

