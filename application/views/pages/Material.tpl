    {if ($material)}
        {if ($material['text'])}
        <div class="row">
            <div class="top-heading company">
                <div class="company-back"></div>
                <div class="headingus">
                    <div class="vertical-center">
                        <h2>{$material['title']}</h2>
                        <div>{$material['text']}</div>
                    </div>
                </div>
            </div>
        </div>
        {/if}
        {if ($breadcrumb)}
        <div class="row">
            {$breadcrumb}
        </div>
        {/if}
        <div class="row padding110-73">
                <div class="col-xs-12">
                    <h2 class="heading-text">{$material['title']}</h2>
                </div>
            {if ($material['photos'])}
				<div class="col-xs-6 text-center margin-top20">
					{if (count($material['photos']) > 1)}
					<div class="back-slider"></div>
					<ul id="companySlider">      
						{foreach from=$material['photos'] item=photos}
							{if ($photos !== end($material['photos']))}
								<li><img src="{$photos}" /></li>
							{/if}
						{/foreach}
					</ul>
					{else}
						<img src="{$material['photos'][0]}" width="100%" />
					{/if}				
				</div>            
            {/if}

            <div class="col-xs-6 col-md-6 margin-top20 media-text-2">
                {$material['text']}
            </div>


            </div> 
            {if ($id eq '11')}
                </div>                 
                {$event}                     
            {/if}
        {literal}
        <script>
        //Minimize description text
        $(function(){
                $('div.vertical-center div').find('img, br, p').remove();
                var trimmedString = $('div.vertical-center div').html().substr(0,500);
                //console.log(trimmedString);
                console.log(trimmedString.lastIndexOf("."));
                if (trimmedString.lastIndexOf(".") > 0) {

                    trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(".")));
                }
                $('div.vertical-center div').html(trimmedString);  
                console.log($('div.vertical-center div').html());      
        })
        </script>               
        {/literal}            
    {else}
        <div style="padding:10px; margin-bottom:10px;">
                {__("Статья не найдена",null)}
        </div>
    {/if}