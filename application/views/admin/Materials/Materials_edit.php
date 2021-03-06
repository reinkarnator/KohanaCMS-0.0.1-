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
</style> 
<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Создание материала",null); ?></span></h2>

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
                                <span class="notification n-success"><?php echo __("Материал был изменен",null); ?></span>
                            </div>   
    <?php break; }?>                         
                <p>
                    <label><?php echo __("Меню для материала",null); ?></label>

                    <select name="menu_id" class="required">
                    <?php switch ($action){  case 'add': ?>       
                        <option value="0"></option>
                        <?php echo $category; ?>
                     <?php break; case 'edit'; case 'update'; ?>
                     <?php
                            echo '<option value="0"></option>';
                            if ($category['selected']['parent_id']==0){
                                $t='<option value="'.$category['selected']['id'].'">'.$category['selected']['name_'.$lang.''].'</option>';
                            }else{
                                $t='<option value="'.$category['selected']['id'].'">--'.$category['selected']['name_'.$lang.''].'</option>';
                            }
                            $arr=explode("<span></span>",$category['menus_all']);
                            // print_r($arr);
                            if(($key = array_search($t,$arr)) !== FALSE){
                                unset($arr[$key]);
                                if ($category['selected']['parent_id']==0){
                                    $arr[$key]='<option value="'.$category['selected']['id'].'" selected="selected">'.$category['selected']['name_'.$lang.''].'</option>';
                                }else{
                                    $arr[$key]='<option value="'.$category['selected']['id'].'" selected="selected">--'.$category['selected']['name_'.$lang.''].'</option>';
                                }
                                ksort($arr);
                            }
                            foreach ($arr as $men){
                                echo $men;
                            }
                     ?> 
                    <?php break; }?>      
                     </select>
                    </p>
                     <br clear="all"  />
                     <p>
                    <label><?php echo __("Загрузить изображение",null); ?></label>    
                    <?php switch ($action){  case 'add': ?>                            
                        <textarea id="files" name="gallery" readonly="readonly" onclick="openKCFinder(this)"></textarea>
                        <div id="gallery"></div>
                    <?php break; case 'edit'; case 'update'; ?> 
                        <textarea id="files" name="gallery" readonly="readonly" onclick="openKCFinder(this)"><?php echo $category['gallery']; ?></textarea>
                        <div id="gallery">
                        <?php 
                        $gall_list = explode("\n",$category['gallery']);
                        foreach ($gall_list as $key => $photo) : 
                        if ($photo !== end($gall_list)): ?>
                             <div class="imghover" id="t<?=$key?>" onclick="removeIt(this.id)"><img src="<?php echo $photo; ?>" height="120"></div> 
                        <?php 
                        endif;
                        endforeach; ?>
                        </div>
                    <?php break; }?>  
                   <script type="text/javascript">
                    var div = document.getElementById("gallery");
                    var allcounts = div.getElementsByTagName('div').length;
                        function openKCFinder(textarea) {
                            window.KCFinder = {
                                callBackMultiple: function(files) {
                                    allcounts = allcounts + files.length;
                                    //div.innerHTML = '';
                                    
                                    window.KCFinder = null;
                                  //  textarea.value = "";

                                    for (var i = 0; i < files.length; i++) {
                                        textarea.value += files[i] + "\n";
                                    
                                        div.innerHTML += '<div class="imghover" id="t'+ parseInt(allcounts-1+i) +'" onclick="removeIt(this.id)"><img src="'+ files[i] +'" height="120"></div>';
                                    }    
                                }
                            };
                            var t = "<?php echo URL::base(TRUE); ?>";
                            window.open(t + 'html/admin/js/ckeditor/kcfinder/browse.php?type=images&dir=images/products',
                                'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
                                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                            );
                        }
                        function removeIt(val) {
                            textarea1 = document.getElementById("files");
                            textarea1.value = '';
                            var currdiv = document.getElementById(val);
                            currdiv.parentNode.removeChild(currdiv);
                            var imgs = div.getElementsByTagName('img');
                            for (var i = 0; i < imgs.length; i++) {
                                textarea1.value += imgs[i].getAttribute("src") + "\n";
                            }
                        }
                    </script>                        
                </p>                                                
                                        
            <br clear="all"  /><br clear="all"  />        
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
                            <label><?php echo __("Название на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                            <?php switch ($action){  case 'add': ?>   
                            <input type="text" name="title_<?php echo $langs;?>" class="required" style="width:250px;" value="" />
                             <?php break; case 'edit'; case 'update'; ?>
                            <input type="text" name="title_<?php echo $langs;?>" class="required" style="width:250px;" value="<?php echo $category['title_'.$langs.'']; ?>" />
                             <?php break; }?>  
                        </p>
                         <br clear="all" />

                        <fieldset style="float:left;margin-right: 20px;">
                            <label><?php echo __("Description на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                            <?php switch ($action){  case 'add': ?>
                            <textarea rows="11" cols="30" name="pg_description_<?php echo $langs;?>"></textarea>
                             <?php break; case 'edit'; case 'update'; ?>
                            <textarea rows="11" cols="30" name="pg_description_<?php echo $langs;?>"><?php echo $category['pg_description_'.$langs.'']; ?></textarea>
                             <?php break; }?>  
                        </fieldset>

                        <fieldset style="float:left;margin-right: 20px;">
                            <label><?php echo __("Keywords на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                            <?php switch ($action){  case 'add': ?>
                             <textarea rows="11" cols="30" name="pg_keywords_<?php echo $langs;?>"></textarea>
                             <?php break; case 'edit'; case 'update'; ?>
                             <textarea rows="11" cols="30" name="pg_keywords_<?php echo $langs;?>"><?php echo $category['pg_keywords_'.$langs.'']; ?></textarea>
                             <?php break; }?> 
                        </fieldset>
                         <br clear="all" /> 

                        <fieldset>
                            <label><?php echo __("Текст на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                            <?php switch ($action){  case 'add': ?>
                            <textarea rows="11" cols="50" name="text_<?php echo $langs;?>" class="ckeditor" id="editor<?php echo $key;?>"></textarea>
                            <?php break; case 'edit'; case 'update'; ?>
                            <textarea rows="11" cols="50" name="text_<?php echo $langs;?>" class="ckeditor" id="editor<?php echo $key;?>"><?php echo $category['text_'.$langs.'']; ?></textarea>
                            <?php break; }?> 
                        </fieldset>

                        </div>
                <?php endforeach; ?> 
                </div> 
            </div>                
               
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