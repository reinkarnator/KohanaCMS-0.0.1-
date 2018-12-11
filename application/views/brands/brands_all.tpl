<ul class="footer-menu">
{foreach from=$last key=k item=news_item}	         
 	<li><a href="{URL::base(TRUE)}{$lang}/products/{$news_item['alt_title']}">{$news_item['name']}</a></li>
{/foreach}
</ul>  	