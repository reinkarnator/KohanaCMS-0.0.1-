{if ($news)}
<div class="row">
    {$breadcrumb}
</div>
<div class="row padding110-73">
<div class="col-xs-12">
    <h2 class="heading-text">{__('Контакты',NULL)}</h2>
</div>
            <div class="col-xs-6 col-md-6 contcs padding-right30">
                <p>{__('contacts_text',NULL)}</p><br>
                <div class="c-icons">
                    <div class="address-blocks">
                       <div class="contact-heading">
                            <h2>{__('Контакты',NULL)}:</h2>
                       </div>
                       <div class="address-heading">
                            <h2>{__('Адрес',NULL)}:</h2>
                       </div> 
                        <div class="work-block blocks">
                            <i></i>
                            <div class="c-floats">
                                <b>{__("Monday-Friday",NULL)}:</b> {__("9.00-18.00",NULL)}<br />
                                <b>{__("Saturday",NULL)}:</b> {__("11.00-15.00",NULL)}
                            </div>
                        </div>
                        <div class="phones-block blocks">
                            <i></i>
                            <div class="c-floats">
                                <b>{__('Телефон',NULL)}:</b> {$news['phone']}<br />
                                <b>{__('Mob',NULL)}:</b> {$news['mob']}
                            </div>                            
                        </div>
                        <div class="address-block blocks">
                            <i></i>
                            <div class="c-floats">
                                <b>{__('Адрес',NULL)}:</b> {$news['address']}
                            </div>                              
                        </div>
                        <div class="mail-block blocks">
                            <i></i>
                            <div class="c-floats">
                                {$news['email']}
                            </div>                              
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-6 padding-left30">
                <iframe src="{$news['map']}" width="100%" height="450" frameborder="0" allowfullscreen></iframe>                                 
            </div>                      
</div>   					
{else}
	<div style="padding:10px; margin-bottom:10px;">
	{__("Ничего не найдено",null)}
	</div>
{/if}

