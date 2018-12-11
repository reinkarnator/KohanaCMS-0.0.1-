{if ($last)} 
 <div class="container-fluid historyback">
    <div class="row padding50-73">
        <div class="col-xs-12">
            <h2 class="heading-text whiteFont">{__("Distribution",NULL)}</h2>
        </div>

        <div class="col-xs-12 text-center">
        	<div class="map_partners">
        		{foreach from=$last item=news_item}
					<div class="markers fa fa-map-marker" aria-hidden="true" style="{$news_item['coordinates']}">
						<span>
							<div class="mrk-items">
					            {if ($news_item['logo'])}
					              {if (is_array($news_item['logo']))}
					                {$news_item['logo'] = array_filter($news_item['logo'])}
					                {foreach from=$news_item['logo'] key=k item=photo}
					                    <div class="tooltip_img"><img src="{$photo}"></div>
					                {/foreach}
					              {else}
					                	<div class="tooltip_img"><img src="{$news_item['logo']}"></div>
					              {/if}
					            {/if}							
								<p>{$news_item['country']}</p>
							</div>
						</span>
					</div>
        		{/foreach}
        	</div>
        </div>
    </div>
</div> 
{/if}