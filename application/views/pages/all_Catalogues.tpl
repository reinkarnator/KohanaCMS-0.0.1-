{if ($news)}
    <div class="col-xs-12">
        <h2 class="heading-text"><span class="curr-year">{__("Catalogues",NULL)}</span></h2>
        <div class="events-undeline"></div>
    </div>
    <div class="col-xs-12">
        <div class="row events">    
     {foreach from=$news key=k item=news_item}
       <div class="col-xs-4 y{date('Y', strtotime($news_item['year']))}">
            <div class="events_block">
                <div class="events_img"><a target="_blank" href="{$news_item['gallery']}"><img src="{$news_item['gallery']}.jpg" /></a></div>
            </div>
            <div class="catalogue_name">{$news_item['name']}</div>
       </div>
     {/foreach}
          </div>
     </div>    
{else}
     <div style="padding:10px; margin-bottom:10px;">
     {__("Ничего не найдено",null)}
     </div>
{/if}