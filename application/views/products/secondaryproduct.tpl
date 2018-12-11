	<div class="row delseback prs padding50-73">
	    <div class="row">
		{$z = 0}
		{foreach from=$last key=k item=news_item}	
		{$z = $z+1}
		 {if $z==1}  
	            <div class="col-xs-5">
	                <div class="media">
	                    <div class="media-left" style="vertical-align: middle;">
	                        <img src="{$news_item['photo']}" class="media-object delpay">
	                        <div class="delpay-back"><img src="{$news_item['photo']}" height="100%"></div>						
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
	                        <img src="{$news_item['photo']}" class="media-object delpay">
	                        <div class="delpay-back"><img src="{$news_item['photo']}" height="100%"></div>						
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
		{$j = 0}	
		{foreach from=$last key=k item=news_item}	  
		{$j = $j+1}
		 {if $j==1}  
            <div class="col-xs-5">
                <a href="{URL::base(TRUE)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}" class="fill-button fill-button-addon" style="float: right;">
                	{__("Detailed",NULL)}</a> <!--Service button-->
            </div>  
            <div class="col-xs-2"></div>
	     {else}
            <div class="col-xs-5">
                <a href="{URL::base(TRUE)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}" class="fill-button fill-button-addon" style="float: right;">{__("Detailed",NULL)}</a> <!--Service button-->
            </div>
	     {/if}       	
		{/foreach}          	
		</div>
	</div>