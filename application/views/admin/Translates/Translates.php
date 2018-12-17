<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Переводы",null); ?></span></h2>

    <div class="module-body">
    <?php switch ($action) {
    case 'edit': ?>
    <form action="<?php echo URL::base(TRUE,TRUE).'admin/'.$type.'/update'; ?>" id="commentForm" method="POST" enctype="multipart/form-data">
    <?php break; 
    case 'update': ?>
    <form action="<?php echo URL::base(TRUE,TRUE).'admin/'.$type.'/update'; ?>" id="commentForm" method="POST" enctype="multipart/form-data">
                            <div>
                                <span class="notification n-success"><?php echo __("Перевод был изменен",null); ?></span>
                            </div>   
    <?php break; }?>                         

            <div class="fade">
                <ul class="tabs"> 
                <?php foreach ($lang_count as $k => $langs) : $k++;?>    
                  <li><a href="#<?php echo $k; ?>"><?php echo $langs;?></a></li> 
                <?php endforeach; ?>    
                </ul> 

                <div class="items">                      
    <?php foreach ($ars as $key => $langs) : $key++;?>   
                    <div id="<?php echo $key; ?>" class="item"> 
                        
                    <fieldset>
                        <label><?php echo __("Перевод на",null); ?> <?php echo __("Язык".$key."",null); ?></label>
                        <?php switch ($action) { case 'edit'; case 'update'; ?>
                        <textarea rows="40" cols="100" name="translate_<?php echo $key;?>"><?php echo $langs; ?></textarea>
                        <?php break; }?> 
                    </fieldset>
                     
                    </div>

    <?php endforeach; ?> 
                </div> 

            </div>                
               
                <fieldset>
                    <input class="submit-green" name="saved" type="submit" value="Submit" />
                </fieldset>
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->