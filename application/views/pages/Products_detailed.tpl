{if ($news)}
	{if ($news['name'])}
            <div class="col-xs-12">
                <h2 class="heading-text">{$news['name']}</h2>
            </div>	
            <div class="col-xs-12 media-text-3">
	                {if $news['photo']}
	                <div class="col-xs-6 setcenter">
						<img style="max-height:300px;max-width:100%;" src="{$news['photo']}" />
					</div>
	                {/if}
	                <div class="product-stats col-xs-6">
	                    <div><span class="glyphicon glyphicon-header" aria-hidden="true"></span><b>{$news['name']}</b></div>
	                    <div><span class="glyphicon glyphicon-tags" aria-hidden="true"></span><b>{$news['pdf']}</b></div>
	                    <div><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><b>{$news['video']}</b></div>               
                    </div>	                
					<div class="col-xs-12">{$news['text']}</div>															
			        {if $news['img_addon_video'][0] ne ''}
			        <div class="big-videos">
			            <h2>{__("Видео",NULL)}</h2>
			            {foreach from=$news['img_addon_video'] key=cat_k item=cat_v}
			                <div class="video-item">
			                    <iframe src="{$news['img_addon_video'][$cat_k]}" width="100%" height="200" frameborder="0" allowfullscreen="true"></iframe>
			                </div>
			            {/foreach}    
			        </div> 
			        <script>
			            $(function(){
			                $('.video-item iframe').each(function(){
			                    var videoUrl = $(this).attr('src');
			                    videoUrl = videoUrl.replace('watch?v=', 'embed/');
			                    $(this).attr('src',videoUrl);
			                });     
			            });
			        </script>
			        {/if}
			        {if $news['img_addon_presentations'][0] ne ''}
			        <div class="big-presentations">
			            <h2>{__("Презентации",NULL)}</h2>
			            <div class="pdf">
			            {foreach from=$news['img_addon_presentations'] key=cat_k item=cat_v}
			                    <div><a class="pdfimg" href="{$news['img_addon_presentations'][$cat_k]}">{$news['head_addon_presentations'][$cat_k]}</a></div> 
			            {/foreach}    
			            </div> 
			        </div> 
			        {/if}  
			        {if $news['img_addon_catalogue'][0] ne ''}
			        <div class="big-catalogues">
			            <h2>{__("Каталоги",NULL)}</h2>
			            <div class="pdf">
			            {foreach from=$news['img_addon_catalogue'] key=cat_k item=cat_v}
			                    <div><a class="pdfimg" href="{$news['img_addon_catalogue'][$cat_k]}">{$news['head_addon_catalogue'][$cat_k]}</a></div> 
			            {/foreach}    
			            </div>   
			        </div> 
			        {/if}
			</div>		          				
	{else}
	<h1>{$news[0]['bname']}</h1>
	{foreach from=$news key=k item=news_item}
							<div class="single-partner">
								<h2><a href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}">{$news_item['name']}</a></h2>
								<a href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}"><img width="100%" style="margin-bottom:30px;" src="{$news_item['photo']}" /></a>
								<span style="width:100%">
								<div class="trim_text">{$news_item['text']}</div><br />
								<a class="readmore" href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}">{__("Узнать больше",NULL)}</a>										
								</span>
							<br clear="all" />
							{if ($news_item['head_addon_video'][0] != '')}
							<div class="videos">
								<h4>{__('Видео',NULL)}</h4>
								<ul>
									{foreach from=$news_item['head_addon_video'] key=cat_k item=cat_v}
										<li><a class="present-videos" href="{$news_item['img_addon_video'][$cat_k]}">{$news_item['head_addon_video'][$cat_k]}</a></li>
										<!--<li><a href="#media-popup" data-media="{$news_item['img_addon_video'][$cat_k]}">{$news_item['head_addon_video'][$cat_k]}</a></li>
										<div class="popup" id="media-popup">
									        <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
									    </div>-->
									{/foreach}															
								</ul>
							</div>	
							{/if}
							{if ($news_item['head_addon_presentations'][0] != '')}							
							<div class="presentations">
								<h4>{__('Презентации',NULL)}</h4>
								<ul>
									{foreach from=$news_item['head_addon_presentations'] key=cat_k item=cat_v}
										<li><a href="{$news_item['img_addon_presentations'][$cat_k]}">{$news_item['head_addon_presentations'][$cat_k]}</a></li>
									{/foreach}										
								</ul>
							</div>
							{/if}
							{if ($news_item['head_addon_catalogue'][0] != '')}
							<div class="catalogues">
								<h4>{__('Каталоги',NULL)}</h4>
								<ul>								
									{foreach from=$news_item['head_addon_catalogue'] key=cat_k item=cat_v}
										<li><a href="{$news_item['img_addon_catalogue'][$cat_k]}">{$news_item['head_addon_catalogue'][$cat_k]}</a></li>
									{/foreach}																		
								</ul>
							</div>	
							{/if}																		
							</div>
	{/foreach}
<script>
$(function(){
	$('div.single-partner div.trim_text').each(function(){
		var trimmedString = $(this).html().substr(0,500);
		//console.log(trimmedString);
		console.log(trimmedString.lastIndexOf("."));
		if (trimmedString.lastIndexOf(".") > 0) {

			trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(".")));
		}
		$(this).html(trimmedString);		
	});
})
</script>	
{/if}

<div class="others col-xs-12">
    <div class="col-xs-12">
        <h3 class="heading-text">{__('Other products',NULL)}</h3>
    </div>		
	{foreach from=$other key=k item=news_item}	
		<div class="col-xs-3">
		    {if $news_item['photo']}
		    <div class="other_img">
				<a href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}"><img src="{$news_item['photo']}" /></a>
			</div>
		    {/if}	
		    <div class="other_name">
		    	<a href="{URL::base(true)}{$lang}/products/{$news_item['brand']}/{$news_item['id']}-{$news_item['alt_title']}">{$news_item['name']}</a>
		    </div>	
		</div>
	{/foreach}
</div>						
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}

