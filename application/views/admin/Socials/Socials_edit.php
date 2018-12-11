<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Создание соцсети",null); ?></span></h2>

    <div class="module-body">
    <?php switch ($action){  case 'add': ?>    
    <form action="<?php echo URL::base(TRUE,TRUE).'admin/'.$type.'/save'; ?>" id="commentForm" method="POST" enctype="multipart/form-data">
    <?php break; 
    case 'edit': ?>
    <form action="<?php echo URL::base(TRUE,TRUE).'admin/'.$type.'/'.$id.'-'.$artname.'/update'; ?>" id="commentForm" method="POST" enctype="multipart/form-data">
    <?php break; 
    case 'update': ?>
    <form action="<?php echo URL::base(TRUE,TRUE).'admin/'.$type.'/'.$id.'-'.$artname.'/update'; ?>" id="commentForm" method="POST" enctype="multipart/form-data">
                            <div>
                                <span class="notification n-success"><?php echo __("Соцсеть была изменена",null); ?></span>
                            </div>   
    <?php break; }?> 
        <p>                
            <label><?php echo __("Название",null); ?></label>
            <?php switch ($action){  case 'add': ?>   
            <input type="text" name="name" class="required" style="width:250px;" value="" />
            <?php break; case 'edit'; case 'update'; ?>
            <input type="text" name="name" class="required" style="width:250px;" value="<?php echo $category['name']; ?>" />
            <?php break; }?>  
        </p> 
        <p>                
            <label><?php echo __("Ссылка",null); ?></label>
            <?php switch ($action){  case 'add': ?>   
            <input type="text" name="url" class="required" style="width:250px;" value="" />
            <?php break; case 'edit'; case 'update'; ?>
            <input type="text" name="url" class="required" style="width:250px;" value="<?php echo $category['url']; ?>" />
            <?php break; }?>  
        </p>                                    
                <fieldset>
                    <ul>
                        <?php switch ($action){  case 'add': ?>
                    <li><label><b><?php echo __("Активность",null); ?></b>&nbsp;&nbsp;<input type="checkbox" name="status" value="1" /></label></li>
                        <?php break; case 'edit'; case 'update'; ?>    
                    <li><label><b><?php echo __("Активность",null); ?></b>&nbsp;&nbsp;<input type="checkbox" name="status" <?php if ($category['status']=='1'){       echo 'checked="checked"'; } ?> value="1" /></label></li>
                        <?php break; }?> 
                    </ul>
                </fieldset>                    
                <fieldset>
                    <input class="submit-green" name="saved" type="submit" value="Submit" />
                    <input class="submit-gray"  name="back" onclick="window.location='<?php echo URL::base(TRUE,TRUE);?>admin/<?php echo $type;?>/'" type="button" value="Back" />
                </fieldset>
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->