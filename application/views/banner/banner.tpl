{if ($banner)}

  {foreach from=$banner key=k item=news_item}
            <div class="middle-column gradinet-menu-{$k++}" onclick="window.location.href='{$news_item['img_link']}'">
                <div class="menu-block">
                    <div class="menu-img">
                        <img src="{URL::base(TRUE)}{$news_item['url']}">
                    </div>
                    <div class="menu-overlay">
                        <h3>{$news_item['name']}</h3>
                        <p>{$news_item['text']}</p>
                    </div>
                </div>
            </div>
  {/foreach}    

{/if} 

