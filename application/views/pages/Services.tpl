    {if ($news)}
        {if ($breadcrumb)}
        <div class="row">
            {$breadcrumb}
        </div>
        {/if}
        <div class="row padding110-73">
                <div class="col-xs-12">
                    <h2 class="heading-text">{$news['name']}</h2>
                </div>  
            {if ($news['gallery'])}
				<div class="col-xs-6 text-center margin-top20">
					{if (count($news['gallery']) > 1)}
					<div class="back-slider"></div>
					<ul id="companySlider">      
						{foreach from=$news['gallery'] item=photos}
							{if ($photos !== end($news['gallery']))}
								<li><img src="{$photos}" /></li>
							{/if}
						{/foreach}
					</ul>
					{else}
						<img src="{$news['gallery'][0]}" width="100%" />
					{/if}				
				</div>                 
            {/if}
            <div class="col-xs-6 col-md-6 margin-top20 media-text-2">
                {$news['text']}
            </div>
        </div>                                               
    {else}
        <div style="padding:10px; margin-bottom:10px;">
                {__("Статья не найдена",null)}
        </div>
    {/if}