{if ($news)}
    <div class="row padding110-73">
        <div class="col-xs-12">
            <h2 class="heading-text">{__("Partners",NULL)}</h2>
        </div>
        <div class="col-xs-12 col-md-12">
            <div class="innerItems">   
			{foreach from=$news key=k item=news_item}
                <article class="col-xs-3 col-md-3">   
                    <a href="{$news_item['url']}" class="p_url" title="{$news_item['name']}"><img width="200" src="{$news_item['photo']}" alt="{$news_item['name']}"></a>    
                </article> 
			{/foreach}
			</div>
		</div>	
    </div>    				
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}

