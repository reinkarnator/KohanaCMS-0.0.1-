{if ($last)}
<ul class="socials">
{foreach from=$last key=k item=news_item}	         
    <li><a href="{$news_item['url']}" target="_blank" class="fa fa-{$news_item['name']}"></a></li>    	
{/foreach}
</ul>
{/if}

  		