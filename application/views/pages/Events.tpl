{if ($news)}
    <div class="col-xs-12">
        <h2 class="heading-text"><span class="curr-year">{$news['name']}</span><span class="small-heading"> / {$news['year'][0]} {$news['year'][1]} <b>{$news['year'][2]}</b></span></h2>
        <div class="events-undeline"></div>
    </div>
    <div class="col-xs-12">
        <div class="row events inner media-text-3">    
            {$news['text']}
        </div>
    </div>  
    <div class="col-xs-12">
        <div class="gallery">
            <div class="gall">
            {if ($news['photos'])}
              {if (is_array($news['photos']))}
                {$news['photos'] = array_filter($news['photos'])}
                {foreach from=$news['photos'] key=k item=photo}
                    <div class="events_block"><div class="events_img ei"><a class="group1" href="{$photo}"><img src="{$news['thumbs'][$k]}"></a></div></div>
                {/foreach}
              {else}
                <div class="events_block"><div class="events_img ei"><a class="group1" href="{$news['photos']}"><img src="{$news['photos']}"></a></div></div>
              {/if}
            {/if}
            </div>
        </div>
    </div>    
{else}
    <div style="padding:10px; margin-bottom:10px;">
    {__("Ничего не найдено",null)}
    </div>
{/if}