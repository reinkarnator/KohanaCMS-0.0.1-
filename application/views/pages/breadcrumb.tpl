{if ($news)}
<ol class="breadcrumb-custom">
{$max = max(array_keys($news))}	
{foreach from=$news key=k item=news_item}
	  {if ($k == $max)}
          <li class="active"><a href="{$news_item['link']}">{$news_item['name']}</a></li>
      {else}
		  <li><a href="{$news_item['link']}">{$news_item['name']}</a></li>
  	  {/if}
{/foreach}
</ol>					
{/if}

