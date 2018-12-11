{if ($last)}    
 <div class="container-fluid">
    <div class="row padding110-73">
	    <div class="col-xs-12">
	        <h2 class="heading-text">{__("Latest events",NULL)}</h2>
	    </div>
		<div class="col-xs-12">
		    <div class="row events">    
			{foreach from=$last key=k item=news_item}
		       <div class="col-xs-3">
		            <div class="events_block" onclick="window.location.href='{URL::base(TRUE)}{$lang}/events/{$news_item['id']}-{trim($news_item['year'][0])}_{trim($news_item['year'][1])}_{trim($news_item['year'][2])}';">
		                <div class="events_img e"><img src="{$news_item['photos'][0]}"></div>
		                <div class="events_caption">
		                    <div class="media"> 
		                        <div class="media-left text-center">
		                            <p class="bold-text">{$news_item['year'][0]}</p>
		                            <p class="media-text-2">{$news_item['year'][1]}</p>
		                        </div>
		                        <div class="media-body" style="vertical-align: middle;">
		                            <p class="media-text">{$news_item['name']}</p>
		                        </div>
		                    </div>
		                </div>
		            </div>
		       </div>
			{/foreach}
			</div>
		</div>	
	</div>
</div>			
{/if}	