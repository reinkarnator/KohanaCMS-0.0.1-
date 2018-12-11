{if ($news)}
{foreach from=$news key=k item=news_item}
	<article>
	    <div class="cat_desc">
	    	{if ($news_item['photo'])}<div class="img_desc"><a href="{URL::base(TRUE)}{$lang}/{$news_item['cat_alt']}/{$news_item['id']}-{$news_item['alt_title']}"><img src="{$news_item['photo']}" width="345" alt=""></a></div>{/if}
	        <div class="cat_date">
				<div class="date_icon_white"></div>
				<span class="category"><a href="{URL::base(TRUE)}{$lang}/categories/{$news_item['cat_alt']}">{$news_item['cat_name']}</a><span class="date">{$news_item['date']}</span></span>
			</div>	
			<h6><a href="{URL::base(TRUE)}{$lang}/{$news_item['cat_alt']}/{$news_item['id']}-{$news_item['alt_title']}">{$news_item['title']}</a></h6>			    	
			<a href="{URL::base(TRUE)}{$lang}/{$news_item['cat_alt']}/{$news_item['id']}-{$news_item['alt_title']}">{$news_item['short']}</a> 
		</div>
	</article>
{/foreach}					
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}

