{if ($last)}
<h3>{$last['name']}</h3>
<div class="romb-img"><img src="{$last['photo']}" alt="{$last['name']}"></div>
<a href="{URL::base(TRUE)}{$lang}/products/{$last['brand']}/{$last['id']}-{$last['alt_title']}" class="dotted-button">{__("Узнать больше",NULL)}</a>
{/if}