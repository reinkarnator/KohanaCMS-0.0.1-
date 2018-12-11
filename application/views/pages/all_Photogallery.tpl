{if ($news)}
<div class="photogallery">
{foreach from=$news key=k item=news_item}
    <article>
        <div class="img_desc"><img src="{$news_item['image'][0]}" alt=""></div>      
        <div class="cat_desc">
          <a>{$news_item['title']}</a> 
        </div>  
        {if ($news_item['description'])}<span class="gallery_desc">{$news_item['description']}</span>{/if}  
        <div class="full_page_link" style="display:none;">
			<div id="bx-pager">
	   		 {foreach from=$news_item['image'] key=t item=n}						
			  	<a data-slide-index="{$t}" href=""><img width="90" src="{$news_item['image'][$t]}" /></a>
			 {/foreach} 				  
			</div>

		    <ul class="bxslider">
	   		 {foreach from=$news_item['image'] key=t item=n}			    	
			  	<li><img src="{$news_item['image'][$t]}" title="<h4>{$news['name'][$t]}</h4>{$news['text'][$t]}" /></li>
			 {/foreach} 	
			</ul>  
		</div>          
    </article>    
{/foreach}	
</div>    				
{else}
<div style="padding:10px; margin-bottom:10px;">
{__("Ничего не найдено",null)}
</div>
{/if}

