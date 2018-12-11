{if ($last)}
<ul class="navigation-menu">
	{$val = max($last)}		
	{foreach from=$last key=k item=news_item}
		<li>	
			{if ($val == $news_item)}	
				<div id="choosed-year"></div>	
				<a href="javascript:void(0);">{$news_item}</a>
			{else}
				<a href="javascript:void(0);">{$news_item}</a>
			{/if}
		</li>
	{/foreach}	
</ul>
{/if}