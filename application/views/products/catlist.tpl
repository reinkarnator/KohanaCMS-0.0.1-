{if ($last)}
  <ul>
	   <li style="width: calc(14.2% - 5px)">
				<h4>{__("Cərrahiyyə",NULL)}</h4>
				<img src="{URL::base(TRUE)}/html/upload/images/ct-1.jpg" alt="{__("Cərrahiyyə",NULL)}" />
		</li>
	   <li style="width: calc(14.2% - 5px)">
				<h4>{__("Endodontiya",NULL)}</h4>
				<img src="{URL::base(TRUE)}/html/upload/images/pr2.jpg" alt="{__("Endodontiya",NULL)}" />
		</li>
	   <li style="width: calc(14.2% - 5px)">
				<h4>{__("Restovrasiya",NULL)}</h4>
				<img src="{URL::base(TRUE)}/html/upload/images/ct-3.jpg" alt="{__("Restovrasiya",NULL)}" />
		</li>
	   <li style="width: calc(14.2% - 5px)">
				<h4>{__("Ortodontiya",NULL)}</h4>
				<img src="{URL::base(TRUE)}/html/upload/images/pr4.jpg" alt="{__("Ortodontiya",NULL)}" />
		</li>
	   <li style="width: calc(14.2% - 5px)">
				<h4>{__("Ortopediya",NULL)}</h4>
				<img src="{URL::base(TRUE)}/html/upload/images/ct-5.jpg" alt="{__("Ortopediya",NULL)}" />
		</li>		
	   <li style="width: calc(14.2% - 5px)">
				<h4>{__("Periodontologiya",NULL)}</h4>
				<img src="{URL::base(TRUE)}/html/upload/images/ct-6.jpg" alt="{__("Periodontologiya",NULL)}" />
		</li>		
	   <li style="width: calc(14.2% - 5px)">
				<h4>{__("Laboratoriya",NULL)}</h4>
				<img src="{URL::base(TRUE)}/html/upload/images/ct-7.jpg" alt="{__("Laboratoriya",NULL)}" />
		</li>		
     <!--{$z=0}
     {foreach from=$last key=k item=news_item}
         {$z=$z+1}
		 {$c = 100 / count($last)}
         <li style="width: calc({$c}% - 5px)">
			 <a class="catlist" href="{URL::base(TRUE)}{$lang}/products/{$news_item['alt_title']}">
				<h4>{$news_item['name']}</h4>
			 </a>
			 <a class="imglist" href="{URL::base(TRUE)}{$lang}/products/{$news_item['alt_title']}">
				<img src="{$news_item['photo']}">
			 </a>
		 </li>    
     {/foreach}
	 -->
  </ul>
{/if}