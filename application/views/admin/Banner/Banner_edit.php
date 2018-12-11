<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Баннер",null); ?></span></h2>

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
                                        <span class="notification n-success"><?php echo __("Баннер был изменен",null); ?></span>
                                    </div>   
            <?php break; }?>  
                <div>
                       <div>
                               <label><?php echo __("Компонент",null); ?></label>
                               <select class="required" style="width:250px;" name="type" id="typeselect" onchange="onTypeChange()">
                               <?php switch ($action){  case 'add': ?> 
                                   <option value=""></option>
                                   <option value="image"><?php echo __("Изображение",null); ?></option>
                                   <option value="flash"><?php echo __("Анимация",null); ?></option>
                               <?php break; case 'edit'; case 'update'; ?>    
                               <?php if ($category['type']=='image'): ?>
                                   <option value="image" selected="selected"><?php echo __("Изображение",null); ?></option>
                                   <option value="flash"><?php echo __("Анимация",null); ?></option>
                               <?php endif; ?>
                               <?php if ($category['type']=='flash'): ?>
                                   <option value="image"><?php echo __("Изображение",null); ?></option>
                                   <option value="flash" selected="selected"><?php echo __("Анимация",null); ?></option>
                               <?php endif; ?>
                               <?php break; }?> 
                               </select>
                      </div>
                       <br clear="all"  />
                                  <style type="text/css">
                                    #kcfinder_div {
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
                      <div id="image" style="display:none">
                                <p> 
                                    <label><?php echo __("Выберите файл",null); ?></label>
                                <?php switch ($action){  case 'add': ?>    
                                          <input type="text" readonly="readonly" id="img_value" class="required" name="url" value="<?php echo __("Выберите файл",null); ?>" onclick="openKCFinder(this)" style="width:600px;cursor:pointer" /><br /><br />
                                          <label><?php echo __("Ссылка",null); ?></label>
                                          <input type="text" class="required" name="img_link" style="width:250px;" /><br />
                                <?php break; case 'edit'; case 'update'; ?>
                                          <input type="text" readonly="readonly" id="img_value" class="required" name="url" value="<?php echo $category['url'] ;?>" onclick="openKCFinder(this)" style="width:600px;cursor:pointer" /><br /><br />
                                          <label><?php echo __("Ссылка",null); ?></label>
                                          <input type="text" class="required" name="img_link" value="<?php echo $category['img_link'] ;?>" style="width:250px;" /><br />
                                <?php break; } ?>
                                </p>                   
                                 <br clear="all"  />
                    </div>
                    <div id="flash" style="display:none">
                                    <p> 
                                        <label><?php echo __("Выберите файл",null); ?></label>
                                    <?php switch ($action){  case 'add': ?>    
                                              <input type="text" readonly="readonly" id="flash_value" class="required" value="<?php echo __("Выберите файл",null); ?>" onclick="openKCFinder1(this)" style="width:600px;cursor:pointer" /><br />
                                    <?php break; case 'edit'; case 'update'; ?>
                                              <input type="text" readonly="readonly" id="flash_value" class="required" value="<?php echo $category['url'] ;?>" onclick="openKCFinder1(this)" style="width:600px;cursor:pointer" /><br />
                                    <?php break; } ?>
                                    </p>   
                                     <br clear="all"  />
                    </div>
                    <div id="kcfinder_div"></div>
                                <script type="text/javascript">
                                        function openKCFinder(field) {
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
                                                    document.getElementById('img_value').value = url;
                                                    div.style.display = 'none';
                                                    div.innerHTML = '';
                                                }
                                            };
                                            var t = "<?php echo URL::base(TRUE); ?>";
                                            div.innerHTML = '<iframe name="kcfinder_iframe" src="'+ t +'html/admin/js/ckeditor/kcfinder/browse.php?type=images&dir=upload/images" ' +
                                                'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';
                                            div.style.display = 'block';
                                        }

                                        function openKCFinder1(field) {
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
                                                    document.getElementById('flash_value').value = url;
                                                    div.style.display = 'none';
                                                    div.innerHTML = '';
                                                }
                                            };
                                            var t = "<?php echo URL::base(TRUE); ?>";
                                            div.innerHTML = '<iframe name="kcfinder_iframe" src="'+ t +'html/admin/js/ckeditor/kcfinder/browse.php?type=flash&dir=upload/flash" ' +
                                                'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';
                                            div.style.display = 'block';
                                        }
                                </script>                   
                    <?php switch ($action){  case 'add': ?> 
                    <?php break; case 'edit'; case 'update'; ?> 
                    <?php if ($category['type']=='image'): ?> 
                    <script>
                    document.getElementById('image').style.display = 'block';
                    document.getElementById('flash').style.display = 'none'; 
                    document.getElementById('flash_value').removeAttribute('name');  
                    document.getElementById('img_value').setAttribute('name','url');                    
                    </script>
                    <?php endif; ?>   
                    <?php if ($category['type']=='flash'): ?>  
                    <script>
                    document.getElementById('flash').style.display = 'block';
                    document.getElementById('image').style.display = 'none'; 
                    document.getElementById('img_value').removeAttribute('name');  
                    document.getElementById('flash_value').setAttribute('name','url');                
                    </script>
                    <?php endif; ?>    
                    <?php break; }?>
                    <script>
                    function onTypeChange(){
                    if (document.getElementById('typeselect').value == 'image') {
                    document.getElementById('image').style.display = 'block';
                    document.getElementById('flash').style.display = 'none';
                    document.getElementById('flash_value').removeAttribute('name');  
                    document.getElementById('img_value').setAttribute('name','url');
                    document.getElementById('img_value').setAttribute('value','<?php echo __("Выберите файл",null); ?>');   
                    }
                    if (document.getElementById('typeselect').value == 'flash') {
                    document.getElementById('flash').style.display = 'block';
                    document.getElementById('image').style.display = 'none';
                    document.getElementById('img_value').removeAttribute('name');  
                    document.getElementById('flash_value').setAttribute('name','url'); 
                    document.getElementById('flash_value').setAttribute('value','<?php echo __("Выберите файл",null); ?>'); 
                    }
                    }                      
                    </script>    
                  </div>
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
                                            <input type="text" name="name_<?php echo $langs;?>" class="required" style="width:250px;" value="" />
                                             <?php break; case 'edit'; case 'update'; ?>
                                            <input type="text" name="name_<?php echo $langs;?>" class="required" style="width:250px;" value="<?php echo $category['name_'.$langs.'']; ?>" />
                                             <?php break; }?>  
                                        </p>
                                         <br clear="all" />                        
                                        <p>                
                                            <label><?php echo __("Текст на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                                            <?php switch ($action){  case 'add': ?>   
                                            <textarea rows="11" cols="50" name="text_<?php echo $langs;?>" class="ckeditor" id="editor<?php echo $key;?>"></textarea>
                                            <?php break; case 'edit'; case 'update'; ?>
                                            <textarea rows="11" cols="50" name="text_<?php echo $langs;?>" class="ckeditor" id="editor<?php echo $key;?>"><?php echo $category['text_'.$langs.'']; ?></textarea>
                                            <?php break; }?>  
                                        </p>
                                    </div>
                                    <?php endforeach; ?> 
                                </div> 
                            </div>                    
                            <fieldset>
                                <input class="submit-green" name="saved" type="submit" value="Submit" />
                                <input class="submit-gray"  name="back" onclick="window.location='<?php echo URL::base(TRUE,TRUE);?>admin/<?php echo $type;?>/'" type="button" value="Back" />
                            </fieldset>
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->