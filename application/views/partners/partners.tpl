{if ($last)}
<ul id="partners">
  {foreach from=$last key=k item=news_item} 
    <li>
       <img src="{$news_item['photo']}" width="70%">
    </li>
  {/foreach}
</ul>
{/if}     