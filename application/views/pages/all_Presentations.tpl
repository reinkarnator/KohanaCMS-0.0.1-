{if ($news)}
<style>
	
</style>
<div class="page">
<h1>{__('Презентации',NULL)}</h1>
{foreach from=$news key=k item=news_item}
						<div class="single-partner">
							<img align="left" style="padding-top:10px;" width="200" src="{$news_item['photo']}" />
							<span>
							{$news_item['text']}	
							<br />					
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
/*
$("[data-media]").on("click", function(e) {
    e.preventDefault();
    var $this = $(this);
    var videoUrl = $this.attr("data-media");
    videoUrl = videoUrl.replace('watch?v=', 'embed/');
    var popup = $this.attr("href");
    var $popupIframe = $this.parents().find(".popup").find("iframe");

    
    $popupIframe.attr("src", videoUrl);
    
    $this.closest(".page").addClass("show-popup");
});

$(".popup").on("click", function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    $(".page").removeClass("show-popup");
});

$(".popup > iframe").on("click", function(e) {
    e.stopPropagation();
});	
*/
</script>
</div>					
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}

