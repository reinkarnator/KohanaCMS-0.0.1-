<style type="text/css">
    textarea#files {
        width: 400px;
        height: 200px;
        cursor: pointer
    }
    div.imghover {
        display:inline-block;
        margin-right:10px;
        border: 1px solid #cccccc;
        width: 160px;
        height: 120px;
        overflow: hidden;
    }
    div.cont_blocks {
        position: relative;
        width: 100%;
        height: auto;
    }
    .kcfinder_div {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -335px;
        margin-top: -200px;
        width: 670px;
        height: 400px;
        background: #e0dfde;
        border: 2px solid #3687e2;
        border-radius: 6px;
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        padding: 1px;
        z-index: 1000;
    }    
    #addFormElem,
    #addFormElem1,
    #addFormElem2 {
        border:1px solid #fff;
        color:#fff;
        background: orange;
        padding: 10px 20px;
        cursor:pointer;
    }
</style>  
<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Создание элемента",null); ?></span></h2>

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
                                <span class="notification n-success"><?php echo __("Элемента был изменен",null); ?></span>
                            </div>   
    <?php break; }?>                           
        <p>
                <label><?php echo __("Презентации",null); ?></label>
                <?php switch ($action){  case 'add': ?>
                <div class="FormElem"></div>
                <?php break; case 'edit'; case 'update'; ?>
                <div class="FormElem">
                    <?php
                    if ($category['head_addon_presentations']) {
                     if (strpos($category['head_addon_presentations'], "-|-")) {
                        $category['head_addon_presentations'] = explode("-|-", $category['head_addon_presentations']); 
                        $category['img_addon_presentations'] = explode("-|-", $category['img_addon_presentations']); 


                        foreach ($category['head_addon_presentations'] as $cat_k => $cat_v): ?>
                           <div class="cont_blocks">  
                            <input type="text" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_presentations[]" value="<?php echo $category['head_addon_presentations'][$cat_k];?>" /> 
                            <input type="text" readonly="readonly" onclick="openImg(this)" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_presentations[]" value="<?php echo $category['img_addon_presentations'][$cat_k];?>" /> 
                            <div id="kcfinder_div" class="kcfinder_div"></div>'
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it">x</button>
                           </div>
                       <?php
                       endforeach; 
                     } else { ?>
                            <div class="cont_blocks">   
                            <input type="text" placeholder="<?php echo __("Название",null); ?>" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_presentations[]" value="<?php echo $category['head_addon_presentations'];?>" /> 
                            <input type="text" placeholder="<?php echo __("Файл",null); ?>" readonly="readonly" onclick="openImg(this)" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_presentations[]" value="<?php echo $category['img_addon_presentations'];?>" /> 
                            <div id="kcfinder_div" class="kcfinder_div"></div>
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it">x</button>
                           </div>      
                    <?php 
                     }
                   }

                    ?>
                </div>
                <?php break; }?>
                <button type="button" id="addFormElem">Add (+)</button>
                <script type="text/javascript">
                function openImg(field) {
                    var div = document.getElementById('kcfinder_div');
                    if (div.style.display == "block") {
                        div.style.display = 'none';
                        div.innerHTML = '';
                        return;
                    }
                    window.KCFinder = {
                        callBack: function(url) {
                            window.KCFinder = null;
                            field.value = url;
                            div.style.display = 'none';
                            div.innerHTML = '';
                        }
                    };
                    var t = "<?php echo URL::base(TRUE); ?>";
                    div.innerHTML = '<iframe name="kcfinder_iframe" src="'+ t + 'html/admin/js/ckeditor/kcfinder/browse.php?type=files&dir=files' +
                        'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';
                    div.style.display = 'block';
                }
                </script>                
                <script>
                    $(function(){
                        $('#addFormElem').click(function(ev){
                            ev.preventDefault();
                            $('div.FormElem').append('<div class="cont_blocks">'    
                            + '<input type="text" placeholder="<?php echo __("Название",null); ?>" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_presentations[]" value="" />' 
                            + '<input type="text" placeholder="<?php echo __("Файл",null); ?>" readonly="readonly" onclick="openImg(this)" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_presentations[]" value="" />' 
                            + '<div id="kcfinder_div" class="kcfinder_div"></div>'
                            + '<button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it">x</button>'
                            + '</div>');
                        });
                        // Remove parent of 'remove' link when link is clicked.
                        $('div.FormElem').on('click', '.rem_it', function(e) {
                            e.preventDefault();
                            $(this).parent().remove();
                        });
                    });
                </script> 

        <!---Каталоги---->

                <br clear="all"  />
                <label><?php echo __("Каталоги",null); ?></label>
                <?php switch ($action){  case 'add': ?>
                <div class="FormElem1"></div>
                <?php break; case 'edit'; case 'update'; ?>
                <div class="FormElem1">
                    <?php
                    if ($category['head_addon_catalogue']) {
                     if (strpos($category['head_addon_catalogue'], "-|-")) {
                        $category['head_addon_catalogue'] = explode("-|-", $category['head_addon_catalogue']); 
                        $category['img_addon_catalogue'] = explode("-|-", $category['img_addon_catalogue']); 


                        foreach ($category['head_addon_catalogue'] as $cat_k => $cat_v): ?>
                           <div class="cont_blocks">  
                            <input type="text" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_catalogue[]" value="<?php echo $category['head_addon_catalogue'][$cat_k];?>" /> 
                            <input type="text" readonly="readonly" onclick="openImg(this)" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_catalogue[]" value="<?php echo $category['img_addon_catalogue'][$cat_k];?>" /> 
                            <div id="kcfinder_div" class="kcfinder_div"></div>
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it1">x</button>
                           </div>
                       <?php
                       endforeach; 
                     } else { ?>
                            <div class="cont_blocks">   
                            <input type="text" placeholder="<?php echo __("Название",null); ?>" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_catalogue[]" value="<?php echo $category['head_addon_catalogue'];?>" /> 
                            <input type="text" placeholder="<?php echo __("Файл",null); ?>" readonly="readonly" onclick="openImg(this)" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_catalogue[]" value="<?php echo $category['img_addon_catalogue'];?>" /> 
                            <div id="kcfinder_div" class="kcfinder_div"></div>'
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it1">x</button>
                           </div>      
                    <?php 
                     }
                   }

                    ?>
                </div>
                <?php break; }?>
                <button type="button" id="addFormElem1">Add (+)</button>
                <script type="text/javascript">
                function openImg(field) {
                    var div = document.getElementById('kcfinder_div');
                    if (div.style.display == "block") {
                        div.style.display = 'none';
                        div.innerHTML = '';
                        return;
                    }
                    window.KCFinder = {
                        callBack: function(url) {
                            window.KCFinder = null;
                            field.value = url;
                            div.style.display = 'none';
                            div.innerHTML = '';
                        }
                    };
                    var t = "<?php echo URL::base(TRUE); ?>";
                    div.innerHTML = '<iframe name="kcfinder_iframe" src="'+ t + 'html/admin/js/ckeditor/kcfinder/browse.php?type=files&dir=files' +
                        'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';
                    div.style.display = 'block';
                }
                </script>                
                <script>
                    $(function(){
                        $('#addFormElem1').click(function(ev){
                            ev.preventDefault();
                            $('div.FormElem1').append('<div class="cont_blocks">'    
                            + '<input type="text" placeholder="<?php echo __("Название",null); ?>" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_catalogue[]" value="" />' 
                            + '<input type="text" placeholder="<?php echo __("Файл",null); ?>" readonly="readonly" onclick="openImg(this)" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_catalogue[]" value="" />' 
                            + '<div id="kcfinder_div" class="kcfinder_div"></div>'
                            + '<button style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it1">x</button>'
                            + '</div>');
                        });
                        // Remove parent of 'remove' link when link is clicked.
                        $('div.FormElem1').on('click', '.rem_it1', function(e) {
                            e.preventDefault();
                            $(this).parent().remove();
                        });
                    });
                </script>  


       <!---Видео---->

                <br clear="all"  />
                <label><?php echo __("Видео",null); ?></label>
                <?php switch ($action){  case 'add': ?>
                <div class="FormElem2"></div>
                <?php break; case 'edit'; case 'update'; ?>
                <div class="FormElem2">
                    <?php
                    if ($category['head_addon_video']) {
                     if (strpos($category['head_addon_video'], "-|-")) {
                        $category['head_addon_video'] = explode("-|-", $category['head_addon_video']); 
                        $category['img_addon_video'] = explode("-|-", $category['img_addon_video']); 


                        foreach ($category['head_addon_video'] as $cat_k => $cat_v): ?>
                           <div class="cont_blocks">  
                            <input type="text" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_video[]" value="<?php echo $category['head_addon_video'][$cat_k];?>" /> 
                            <input type="text" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_video[]" value="<?php echo $category['img_addon_video'][$cat_k];?>" /> 
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it2">x</button>
                           </div>
                       <?php
                       endforeach; 
                     } else { ?>
                            <div class="cont_blocks">   
                            <input type="text" placeholder="<?php echo __("Название",null); ?>" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_video[]" value="<?php echo $category['head_addon_video'];?>" /> 
                            <input type="text" placeholder="<?php echo __("УРЛ",null); ?>" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_video[]" value="<?php echo $category['img_addon_video'];?>" /> 
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it2">x</button>
                           </div>      
                    <?php 
                     }
                   }

                    ?>
                </div>
                <?php break; }?>
                <button type="button" id="addFormElem2">Add (+)</button>               
                <script>
                    $(function(){
                        $('#addFormElem2').click(function(ev){
                            ev.preventDefault();
                            $('div.FormElem2').append('<div class="cont_blocks">'    
                            + '<input type="text" placeholder="<?php echo __("Название",null); ?>" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="head_addon_video[]" value="" />' 
                            + '<input type="text" placeholder="<?php echo __("УРЛ",null); ?>" style="width:250px;height:20px;margin-right:20px;display:inline-block;vertical-align:top;" name="img_addon_video[]" value="" />' 
                            + '<button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it2">x</button>'
                            + '</div>');
                        });
                        // Remove parent of 'remove' link when link is clicked.
                        $('div.FormElem2').on('click', '.rem_it2', function(e) {
                            e.preventDefault();
                            $(this).parent().remove();
                        });
                    });
                </script>                                                                   
             <br clear="all"  />
             <br clear="all"  />         
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