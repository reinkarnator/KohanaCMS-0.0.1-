{if ($last)}
<ul id="testimonials">
	{foreach from=$last key=k item=news_item}	
    <li>
                <div class="testimonials-block">
                    <div class="bordered-single">
                        <div><img src="{$news_item['photo']}"></div>
                        <p class="bold-text">{$news_item['name']}</p> 
                    </div>

                    <p class="testimonials-txt">{$news_item['text']}</p>
                </div>

    </li>
	{/foreach}
</ul>
{/if}  		