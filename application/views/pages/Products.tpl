{if ($brands)}
	<div class="row">
		<div class="col-xs-12 brands-desc">
		    <h2 class="heading-text">{$brands['name']}</h2>
			<div class="media-text-2 margin-bottom40">{$brands['text']}</div>
		</div>
	</div>
{/if}
{if ($news)}
	<div class="row">
		<div class="col-xs-12">
		{foreach from=$news key=k item=news_item}
			{if !($k % 2) == 0}<div class="col-xs-1"></div>{/if}
				<div class="single-partner media-text-2 col-xs-5 margin-bottom40">
					<h2><a href="{URL::base(true)}{$lang}/products/{$brands['alt_title']}/{$news_item['id']}-{$news_item['alt_title']}">{$news_item['name']}</a></h2>
					<a href="{URL::base(true)}{$lang}/products/{$brands['alt_title']}/{$news_item['id']}-{$news_item['alt_title']}"><img width="150" style="float:left;margin-right:20px;" src="{$news_item['photo']}" /></a>
					<span style="width:100%">
					<div class="trim_text">{$news_item['text']}</div><br />
					<a class="readmore" href="{URL::base(true)}{$lang}/products/{$brands['alt_title']}/{$news_item['id']}-{$news_item['alt_title']}">{__("Узнать больше",NULL)}</a>				
					</span>
				</div>
			{if ($k % 2) == 0}<div class="col-xs-1"></div>{/if}					
		{/foreach}
		</div>	
	</div>
{literal}
<script>
//Text trimming
$(function(){
	$('div.single-partner div.trim_text').each(function(){
		var trimmedString = $(this).html().substr(0,400);
		//console.log(trimmedString);
		console.log(trimmedString.lastIndexOf("."));
		if (trimmedString.lastIndexOf(".") > 0) {

			trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(".")));
		}
		$(this).html(trimmedString);		
	});
})
</script>				
{/literal}				
{/if}

