<ul class="navigation-menu">
{foreach from=$last item=news_item}
	{foreach from=$news_item item=news}
	   <li><a href="{URL::base(TRUE)}{$lang}/products/{$news['alt_title']}" class="cl">{$news['name']}</a>
		   {if (is_array($news['child']))}
		    <ul>
			     {foreach from=$news['child'] item=child}
			 		 <li><a href="{URL::base(TRUE)}{$lang}/products/{$child['alt_title']}" class="cl">{$child['name']}</a></li>
			 	 {/foreach}
		 	</ul> 
		   {/if}
	   </li>
	{/foreach}   
{/foreach}
</ul>  	