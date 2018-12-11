 <style>
.child-solutions {
    margin-top: 40px;
    padding-top: 20px;
    border-top: 4px solid #cecece;
    font-size: 0.9rem;
    color: #656565;
}
 </style>   
    {if ($news)}
        <h1>{$news['name']}</h1>
        <span>
        <img src="{$news['photo']}" class="content-photo" alt="{$news['name']}" /><br />
        {$news['text']}         
        </span>  
        <div class="gray-line">
            <div class="butts">
                <div class="alternate-block">
                     {if $news['id'] eq $ids[0]['maxid']}
                        <a href="{URL::base(TRUE)}{$lang}/solutions/{$ids[0]['minid']}-alternative" class="alternate">{__("Альтернативное решение",NULL)}</a>
                     {else}
                        <a href="{URL::base(TRUE)}{$lang}/solutions/{$news['id']+1}-alternative" class="alternate">{__("Альтернативное решение",NULL)}</a>
                     {/if}
                </div>                  
            </div>
        </div> 
        {if ($childs)}
        <ul class="sub-solutions">
        {foreach from=$childs key=cat_k item=parent}
        {$key = $cat_k + 2}
        <li class="sol{$key}"><a href="{URL::base(TRUE)}{$lang}/solutions/{$parent['id']}-{$parent['alt_title']}">{$parent['name']}</a></li>
        <!--<div class="child-solutions">
            <h2>{$parent['name']}</h2>
             <img src="{$parent['photo']}" style="width:200px;margin-right:20px;" align="left" class="content-photo" alt="{$parent['name']}" />
            <span>              
                {$parent['text']}         
            </span> 
        </div>  -->      
        {/foreach}
        </ul> 
        {/if}
        {if $news['img_addon_video'][0] ne ''}
        <div class="big-videos">
            <h2>{__("Видео",NULL)}</h2>
            {foreach from=$news['img_addon_video'] key=cat_k item=cat_v}
                <div class="video-item">
                    <iframe class="present-videos" src="{$news['img_addon_video'][$cat_k]}" width="100%" height="200" frameborder="0" allowfullscreen="true"></iframe>
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
{literal}
<!--<script>
    $(function(){
        var firstid = $('div.solp ul li:first-child').attr('class');
        var lastid = $('div.solp ul li:last-child').attr('class');
        lastid = lastid.replace(/[^0-9]/g, '');
        if()
        console.log(lastid);
    })
</script>-->
{/literal}                                 
    {else}
        <div style="padding:10px; margin-bottom:10px;">
                {__("Статья не найдена",null)}
        </div>
    {/if}