<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Изменение контактов",null); ?></span></h2>

    <div class="module-body">
    <?php switch ($action){ case 'edit'; ?>
    <form action="<?php echo URL::base(TRUE,TRUE).'admin/'.$type.'/'.$id.'-m/update'; ?>" id="commentForm" method="POST" enctype="multipart/form-data">
    <?php break; case 'update': ?>
    <form action="<?php echo URL::base(TRUE,TRUE).'admin/'.$type.'/'.$id.'-m/update'; ?>" id="commentForm" method="POST" enctype="multipart/form-data">
                <div>
                    <span class="notification n-success"><?php echo __("Контакты были изменены",null); ?></span>
                </div>   
    <?php break; }?>                         
           <fieldset> 
            <p>                
                    <label><?php echo __("Телефон",null); ?></label>
                <?php switch ($action){ case 'edit'; case 'update'; ?>
                    <input type="text" name="phone" class="required" style="width:250px;" value="<?php echo $category['phone']; ?>" />
                <?php break; }?>  
            </p>
            <p>                
                    <label><?php echo __("Мобильный",null); ?></label>
                <?php switch ($action){ case 'edit'; case 'update'; ?>
                    <input type="text" name="mob" class="required" style="width:250px;" value="<?php echo $category['mob']; ?>" />
                <?php break; }?>  
            </p>
           <p>                
                <label><?php echo __("Email",null); ?></label>
                <?php switch ($action){ case 'edit'; case 'update'; ?>
                    <input type="text" name="email" class="required" style="width:250px;" value="<?php echo $category['email']; ?>" />
                <?php break; }?>  
            </p>
            <p>                
                    <label><?php echo __("Карта",null); ?></label>
                <?php switch ($action){ case 'edit'; case 'update'; ?>
                    <input type="text" name="map" class="required" style="width:250px;" value="<?php echo $category['map']; ?>" />
                <?php break; }?>  
            </p>             
             <div class="fade">
                <ul class="tabs"> 
                    <?php foreach ($lang_count as $k => $langs) : $k++;?>    
                        <li><a href="#<?php echo $k; ?>"><?php echo $langs;?></a></li> 
                    <?php endforeach; ?>    
                </ul> 

                <div class="items">                      
                    <?php foreach ($lang_count as $key => $langs) : $key++;?>   
                    <div id="<?php echo $key; ?>" class="item"> 
                        <p>                
                            <label><?php echo __("Адрес на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                            <?php switch ($action){  case 'edit'; case 'update'; ?>
                            <input type="text" name="address_<?php echo $langs;?>" class="required" style="width:750px;" value="<?php echo $category['address_'.$langs.'']; ?>" />
                            <?php break; }?>  
                        </p>
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