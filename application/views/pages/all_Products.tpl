{if ($news)}
<h1>{__('Продукты',NULL)}</h1>
{foreach from=$news key=k item=news_item}
	<div class="single-partner">
		<a href="{$news_item['url']}" target="_blank"><img align="left" style="padding-top:20px;" width="200" src="{$news_item['photo']}" /></a>
		<span>
		{$news_item['text']}	
		<br />
		<a class="readmore" href="{URL::base(TRUE)}{$lang}/products/{$news_item['id']}-{$news_item['alt_title']}" target="_blank">{__('Узнать больше',NULL)}</a><br />						
		</span>								
	</div>
{/foreach}					
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}

