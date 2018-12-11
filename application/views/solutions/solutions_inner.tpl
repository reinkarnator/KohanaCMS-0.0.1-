<div class="blocks-hover">
    <ul>
	{foreach from=$last key=k item=news_item}	   
		{$k=$k+1} 
    	 <li class="sol{$k}"><a href="{URL::base(TRUE)}{$lang}/solutions/{$news_item['id']}-{$news_item['alt_title']}">{$news_item['name']}</a></li>           	
	{/foreach}
   </ul> 
</div>
  		