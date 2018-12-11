<div class="top-socials">
    {$socialsmodule}
</div>
<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <span class="bold-text">{__("Language",NULL)}:</span>
                    {if $language == 'az'}
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="display:inline-block;">
                        <img src="{URL::base(TRUE)}html/img/flag/az.png">
                        <span>AZ</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{URL::base(TRUE)}en"><img src="{URL::base(TRUE)}html/img/flag/en.png" class="flag"> EN</a></li>
                    </ul>
                    {/if}
                    {if $language == 'en'}
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="display:inline-block;">
                        <img src="{URL::base(TRUE)}html/img/flag/en.png">
                        <span>EN</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{URL::base(TRUE)}az"><img src="{URL::base(TRUE)}html/img/flag/az.png" class="flag"> AZ</a></li>
                    </ul>
                    {/if}                   
                </li>
</ul>