<div class="projects">
    <div class="wrapper">
      <h2>{__("Projects",null)}</h2>
          <div>
      	{foreach from=$last key=k item=news_item}
      	  {if ($k != '0' && ($k % 4) == 0)}
		  </div><div class="reverse">
		  {/if} 	  	
	        <article>   
				<img src="{$news_item['photo']}" alt="{$news_item['name']}">
				<div class="caption">
					  <h3><a class="gal" href="{$news_item['photo']}" title="{$news_item['name']}">{$news_item['name']}</a></h3> 
					  <span>{$news_item['description']}</span>
				</div>          
			</article> 
		{/foreach}
	      </div>
	</div>			
</div>			