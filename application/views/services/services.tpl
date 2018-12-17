	<div class="row delseback padding50-73">
	    <div class="row">
		{$z=1}
		{foreach from=$last key=k item=news_item}	
			{$z = $z++}
			{if $z==1}  
		            <div class="col-xs-5">
		                <div class="media">
		                    <div class="media-left" style="vertical-align: middle;">
							{if (is_array($news_item['gallery']))}
		                        <img src="{$news_item['gallery'][0]}" class="media-object delpay">
		                        <div class="delpay-back"><img src="{$news_item['gallery'][0]}" width="100%"></div>
							{else}
		                        <img src="{$news_item['gallery']}" class="media-object delpay">
		                        <div class="delpay-back"><img src="{$news_item['gallery']}" width="100%"></div>						
							{/if}
		                    </div>
		                    <div class="media-body" style="padding-left: 30px;">
		                        <p class="media-head">{$news_item['name']}</p>
		                        <p class="media-text svcs">{$news_item['text']}</p>
		                    </div>
		                </div>
		            </div>  
		            <div class="col-xs-2"></div>
		    {else}
		            <div class="col-xs-5">
		                <div class="media">
		                    <div class="media-left" style="vertical-align: middle;">
							{if (is_array($news_item['gallery']))}
		                        <img src="{$news_item['gallery'][0]}" class="media-object delpay">
		                        <div class="delpay-back"><img src="{$news_item['gallery'][0]}" width="100%"></div>
							{else}
		                        <img src="{$news_item['gallery']}" class="media-object delpay">
		                        <div class="delpay-back"><img src="{$news_item['gallery']}" width="100%"></div>						
							{/if}
		                    </div>
		                    <div class="media-body" style="padding-left: 30px;">
		                        <p class="media-head">{$news_item['name']}</p>
		                        <p class="media-text svcs">{$news_item['text']}</p>
		                    </div>
		                </div>
		            </div>
		    {/if}       	
		{/foreach}
		</div>
		<div class="row">
		{$j=1}	
		{foreach from=$last key=k item=news_item}	  
			{$j = $j++}
			{if $j==1}  
	            <div class="col-xs-5">
	                <a href="{URL::base(TRUE)}{$lang}/services/{$news_item['id']}-{$news_item['alt_title']}" class="fill-button fill-button-addon" style="float: right;">
	                	{__("Detailed",NULL)}</a> <!--Service button-->
	            </div>  
	            <div class="col-xs-2"></div>
		    {else}
	            <div class="col-xs-5">
	                <a href="{URL::base(TRUE)}{$lang}/services/{$news_item['id']}-{$news_item['alt_title']}" class="fill-button fill-button-addon" style="float: right;">{__("Detailed",NULL)}</a> <!--Service button-->
	            </div>
		    {/if}       	
		{/foreach}          	
		</div>
	</div>
<script>
$(function(){
	$('.svcs').each(function(){
		var trimmedString = $(this).html().substr(0,250);

		if (trimmedString.lastIndexOf(" ") > 0) {
			trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")));
		}
		$(this).html(trimmedString);		
	});
})
</script>

  		