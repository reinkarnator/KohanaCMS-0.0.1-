<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <span class="bold-text">{__("Language",NULL)}:</span>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="display:inline-block;">
                <img src="{URL::base(TRUE)}html/img/flag/{$language}.png">
                <span>{strtoupper($language)}</span>
                <span class="caret"></span>
            </a> 
            {foreach from=$difflang item=lang}   
                <ul class="dropdown-menu">
                    <li><a href="{URL::base(TRUE)}{$lang}"><img src="{URL::base(TRUE)}html/img/flag/{$lang}.png" class="flag"> {strtoupper($lang)}</a></li>
                </ul>
            {/foreach}                      
    </li>
</ul>