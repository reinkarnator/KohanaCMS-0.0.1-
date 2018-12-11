{if ($slider)}
<ul id="slider">
  {foreach from=$slider key=k item=news_item}
    <li id="sn{$news_item['id']}">
        <div class="eyvf-slider" style="background-image: url({$news_item['photo']});">
            <div class="animated-text">
                {if ($news_item['title'])}<div class="slide-head">{$news_item['title']}</div>{/if}
                {if ($news_item['smalltext'])}<div class="slide-head-middle">{$news_item['smalltext']}</div>{/if}
                {if ($news_item['full'][0] != '')}
                <ul class="slide-list">
                    {foreach from=$news_item['full'] key=cat_k item=cat_v}
                        {if ($cat_k == 5)} {break} {/if}
                        <li>{$cat_v}</li>
                    {/foreach}              
                </ul>
                {/if}                  
            </div>
        </div>
    </li>
    {/foreach}    
</ul>
{/if} 

