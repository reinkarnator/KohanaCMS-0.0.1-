{if ($news)}
	{if ($news['name'])}
        <div class="col-xs-12">
            <h2 class="heading-text">{$news['name']}</h2>
        </div>	
        <div class="col-xs-12 media-text-3">
            {if $news['photo']}
            <div class="col-xs-6 setcenter">
				<img style="max-height:300px;max-width:100%;" src="{$news['photo']}" />
			</div>
            {/if}
            <div class="product-stats col-xs-6">
                <div><span class="glyphicon glyphicon-header" aria-hidden="true"></span><b>{$news['name']}</b></div> 
            </div>	                
			<div class="col-xs-12">{$news['text']}</div>															
		</div>		          				
	{else}
		<h1>{$news[0]['bname']}</h1>
		{foreach from=$news key=k item=news_item}
			<div class="single-partner">
				<h2><a href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}">{$news_item['name']}</a></h2>
				<a href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}"><img width="100%" style="margin-bottom:30px;" src="{$news_item['photo']}" /></a>
				<span style="width:100%">
				<div class="trim_text">{$news_item['text']}</div><br />
				<a class="readmore" href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}">{__("Узнать больше",NULL)}</a>										
				</span>
				<br clear="all" />										
			</div>
		{/foreach}
	<script>
	$(function(){
		$('div.single-partner div.trim_text').each(function(){
			var trimmedString = $(this).html().substr(0,500);
			//console.log(trimmedString);
			console.log(trimmedString.lastIndexOf("."));
			if (trimmedString.lastIndexOf(".") > 0) {

				trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(".")));
			}
			$(this).html(trimmedString);		
		});
	})
	</script>	
{/if}
<!---Other latest added products--->
<div class="others col-xs-12">
    <div class="col-xs-12">
        <h3 class="heading-text">{__('Other products',NULL)}</h3>
    </div>		
	{foreach from=$other key=k item=news_item}	
		<div class="col-xs-3">
		    {if $news_item['photo']}
		    <div class="other_img">
				<a href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}"><img src="{$news_item['photo']}" /></a>
			</div>
		    {/if}	
		    <div class="other_name">
		    	<a href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}">{$news_item['name']}</a>
		    </div>	
		</div>
	{/foreach}
</div>						
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}

