{if ($news)}
<h1>{__('Поиск',NULL)}</h1>
{foreach from=$news key=k item=news_item}
						<div class="single-partner">
							<img width="300" src="{$news_item['photo']}" />
							<span>
						    <h2>{$news_item['name']}</h2>
							<div class="srch_itm">{$news_item['text']}</div>
							<br />
							<a class="readmore" href="{URL::base(TRUE)}{$lang}/{$news_item['base']}/{$news_item['id']}-{$news_item['alt_title']}">{__('Узнать больше',NULL)}</a><br />							
							</span>								
						</div>
<script>
$(function(){
	$('.srch_itm').each(function(){	
		//console.log($(this).html());
	var str = $(this).html();
	if(str.length > 200) str = str.substring(0,200);
	$(this).html(str+'...');
	});	
});					
</script>
{/foreach}					
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}


