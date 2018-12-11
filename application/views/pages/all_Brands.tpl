{if ($news)}
<div class="col-xs-12">
    <h2 class="heading-text">{__('Продукты',NULL)}</h2>
</div>
<div class="row">
{foreach from=$news key=k item=news_item}
    <div class="col-xs-3 text-center margin-bottom40">
        <div data-type="border-block" onclick="window.location.href='{URL::base(TRUE)}{$lang}/products/{$news_item['alt_title']}';">
        	{if ($news_item['photo'])}
            <img src="{$news_item['photo']}">
            {/if}
            <span><a href="{URL::base(TRUE)}{$lang}/products/{$news_item['alt_title']}" class="cl">{$news_item['name']}</a></span>
        </div>
    </div>
{/foreach}
</div>					
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}

