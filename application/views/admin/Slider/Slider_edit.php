<style type="text/css">
    div.cont_blocks {
        position: relative;
        width: 100%;
        height: auto;
    }    
    #addFormElem {
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
        <h2><span><?php echo __("Создание слайда",null); ?></span></h2>

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
                                <span class="notification n-success"><?php echo __("Слайд был изменен",null); ?></span>
                            </div>   
    <?php break; }?>    
                <fieldset>
                    <label><?php echo __("Изображение",null); ?></label>
                    <style type="text/css">

                            #image {
                                width: 600px;
                                height: 300px;
                                overflow: hidden;
                                cursor: pointer;
                                background: #CCCCCC;
                                color: #fff;
                            }

                    </style>
                    <?php switch ($action){  case 'add': ?>    
                        <script type="text/javascript">

                            function openKCFinder(div) {
                                window.KCFinder = {
                                    callBack: function(url) {
                                        window.KCFinder = null;
                                        div.innerHTML = '<div style="margin:5px">Loading...</div>';
                                        var img = new Image();
                                        img.src = url;
                                        img.onload = function() {
                                        div.innerHTML = '<img id="img" src="' + url + '" /><input type="hidden" name="photo" value="' + url + '" />';
                                            var img = document.getElementById('img');
                                            var o_w = img.offsetWidth;
                                            var o_h = img.offsetHeight;
                                            var f_w = div.offsetWidth;
                                            var f_h = div.offsetHeight;
                                            if ((o_w > f_w) || (o_h > f_h)) {
                                                if ((f_w / f_h) > (o_w / o_h))
                                                    f_w = parseInt((o_w * f_h) / o_h);
                                                else if ((f_w / f_h) < (o_w / o_h))
                                                    f_h = parseInt((o_h * f_w) / o_w);
                                                img.style.width = f_w + "px";
                                                img.style.height = f_h + "px";
                                            } else {
                                                f_w = o_w;
                                                f_h = o_h;
                                            }
                                            img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                                            img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                                            img.style.visibility = "visible";
                                        }
                                    }
                                };
                                var t = "<?php echo URL::base(TRUE); ?>";
                                window.open(t + 'html/admin/js/ckeditor/kcfinder/browse.php?type=images&dir=upload/images',
                                    'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                                        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                                );
                            }
                        </script>
                        <div id="image" onclick="openKCFinder(this)">
                            <div style="padding:5px 0 0 5px;position:relative;background: #000;width:100%;opacity:0.6;-moz-opacity:0.6;height: 25px;margin:-25px 0 0 0;top:25px;">Click to load image</div>
                        </div>

                    <?php break; case 'edit'; case 'update'; ?>
                        <script type="text/javascript">
                            function openKCFinder(div) {
                                window.KCFinder = {
                                    callBack: function(url) {
                                        window.KCFinder = null;
                                        div.innerHTML = '<div style="margin:5px">Loading...</div>';
                                        var img = new Image();
                                        img.src = url;
                                        img.onload = function() {
                                        div.innerHTML = '<img id="img" src="' + url + '" /><input type="hidden" name="photo" value="' + url + '" />';
                                            var img = document.getElementById('img');
                                            var o_w = img.offsetWidth;
                                            var o_h = img.offsetHeight;
                                            var f_w = div.offsetWidth;
                                            var f_h = div.offsetHeight;
                                            if ((o_w > f_w) || (o_h > f_h)) {
                                                if ((f_w / f_h) > (o_w / o_h))
                                                    f_w = parseInt((o_w * f_h) / o_h);
                                                else if ((f_w / f_h) < (o_w / o_h))
                                                    f_h = parseInt((o_h * f_w) / o_w);
                                                img.style.width = f_w + "px";
                                                img.style.height = f_h + "px";
                                            } else {
                                                f_w = o_w;
                                                f_h = o_h;
                                            }
                                            img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                                            img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                                            img.style.visibility = "visible";
                                        }
                                    }
                                };
                                var t = "<?php echo URL::base(TRUE); ?>";
                                window.open(t + 'html/admin/js/ckeditor/kcfinder/browse.php?type=images&dir=upload/images',
                                    'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                                        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                                );
                            }
                        </script>
                        <div style="padding:5px 0 0 5px;position:relative;background: #000;width:595px;height:25px;opacity:0.6;-moz-opacity:0.6;margin:-30px 0 0 0;top:30px;color:#fff;">Click to change image</div>
                        <div id="image" onclick="openKCFinder(this)">
                            <?php if (!empty($category['photo'])) : ?>
                            <img id="img" src="<?php echo $category['photo'];?>" />
                            <input type="hidden" name="photo" value="" />
                            <?php endif; ?>
                        </div> 
                        <?php if (!empty($category['photo'])) : ?>
                        <script type="text/javascript">
                        window.onload = function() {
                                            var u = "<?php echo $category['photo'];?>";
                                            var d = document.getElementById('image'); 
                                            d.innerHTML = '<img id="img" src="'+ u +'" /><input type="hidden" name="photo" value="' + u + '" />';
                                            var i = document.getElementById('img');
                                            var i_w = i.offsetWidth;
                                            var i_h = i.offsetHeight;
                                            var d_w = d.offsetWidth;
                                            var d_h = d.offsetHeight;
                                            if ((i_w > d_w) || (i_h > d_h)) {
                                                if ((d_w / d_h) > (i_w / i_h))
                                                    d_w = parseInt((i_w * d_h) / i_h);
                                                else if ((d_w / d_h) < (i_w / i_h))
                                                    d_h = parseInt((i_h * d_w) / i_w);
                                                i.style.width = d_w + "px";
                                                i.style.height = d_h + "px";
                                            } else {
                                                d_w = i_w;
                                                d_h = i_h;
                                            }
                                            i.style.marginLeft = parseInt((d.offsetWidth - d_w) / 2) + 'px';
                                            i.style.marginTop = parseInt((d.offsetHeight - d_h) / 2) + 'px';
                                            i.style.visibility = "visible";
                        }                    
                        </script>
                        <?php endif; ?>               
                    <?php break; }?>                      
                </fieldset>                 
             
                <br clear="all" /><br clear="all" />                 


                <div class="fade">
                <ul class="tabs"> 
                <?php foreach ($lang_count as $k => $langs) : $k++;?>    
                  <li><a href="#<?php echo $k; ?>"><?php echo $langs;?></a></li> 
                <?php endforeach; ?>    
                </ul> 



                <div class="items">
                <?php foreach ($lang_count as $key => $langs) : $key++;?> 
                <div id="<?php echo $key; ?>" class="item">

                <label><?php echo __("Название на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                <?php switch ($action){  case 'add': ?>    
                    <input type="text" name="title_<?php echo $langs;?>" style="width:250px;" value="" />
                <?php break; case 'edit'; case 'update'; ?>
                    <input type="text" name="title_<?php echo $langs;?>" style="width:250px;" value="<?php echo $category['title_'.$langs.''] ;?>" />                    
                <?php break; }?>
                <br clear="all" /><br clear="all" />   
                <label><?php echo __("Qısa təsvir",null); ?> (12 işarə)</label>
                <?php switch ($action){  case 'add': ?>    
                    <input type="text" name="smalltext_<?php echo $langs;?>" maxlength="12" style="width:250px;" value="" />
                <?php break; case 'edit'; case 'update'; ?>
                    <input type="text" name="smalltext_<?php echo $langs;?>" maxlength="12" style="width:250px;" value="<?php echo $category['smalltext_'.$langs.''] ;?>" />                    
                <?php break; }?>
                <br clear="all" /><br clear="all" />  
                <label><?php echo __("Ссылка на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                <?php switch ($action){  case 'add': ?>    
                    <input type="text" name="url_<?php echo $langs;?>" style="width:250px;" value="" />
                <?php break; case 'edit'; case 'update'; ?>
                    <input type="text" name="url_<?php echo $langs;?>" style="width:250px;" value="<?php echo $category['url_'.$langs.''] ;?>" />                    
                <?php break; }?>     
                <br clear="all" /><br clear="all" />


               <!-- <fieldset>
                    <label><?php echo __("Текст на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                    <?php switch ($action){  case 'add': ?>     
                    <textarea rows="11" cols="50" name="full_<?php echo $langs;?>" class="ckeditor" id="editor<?php echo $key;?>"></textarea>
                    <?php break; case 'edit'; case 'update'; ?>
                    <textarea rows="11" cols="50" name="full_<?php echo $langs;?>" class="ckeditor" id="editor<?php echo $key;?>"><?php echo $category['full_'.$langs.''] ;?></textarea>                    
                    <?php break; }?>                      
                </fieldset>-->
                <label><?php echo __("Текст на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                <label><b><?php echo __("(1-ci və 2-ci - 12 işarə; 3-cü - 14 işarə; 4-cü - 50dən çox işarə)",null); ?></b></label>
                <?php switch ($action){  case 'add': ?>
                <div class="FormElem _<?php echo $langs;?>"></div>
                <?php break; case 'edit'; case 'update'; ?>
                <div class="FormElem _<?php echo $langs;?>">
                    <?php
                     if ($category['full_'.$langs.''] && strpos($category['full_'.$langs.''], "-|-")) {
                        $category['full_'.$langs.''] = explode("-|-", $category['full_'.$langs.'']); 
                        foreach ($category['full_'.$langs.''] as $cat_k => $cat_v): ?>
                           <div class="cont_blocks_<?php echo $langs;?>">  
                            <input placeholder="<?php echo __("Текст",null); ?>" style="margin-bottom:10px;width:250px;height:20px;" name="full_<?php echo $langs;?>[]" value="<?php echo $category['full_'.$langs.''][$cat_k];?>">
                            <button style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it">x</button>
                           </div>
                       <?php
                       endforeach; 
                     } elseif($category['full_'.$langs.'']) { ?>
                            <div class="cont_blocks_<?php echo $langs;?>">  
                            <input placeholder="<?php echo __("Текст",null); ?>" style="margin-bottom:10px;width:250px;height:20px;" name="full_<?php echo $langs;?>[]" value="<?php echo $category['full_'.$langs.''];?>">
                            <button style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it">x</button>
                           </div>      
                    <?php 
                     }

                    ?>
                </div>
                <?php break; }?>                
                </div>
                <?php endforeach; ?> 
                </div> 
				<br clear="all" />
				<button type="button" id="addFormElem">Add (+)</button>
				<script>
						var currlang = $('ul.tabs li a.selected').html();
						$('#addFormElem').attr('class','l_' + currlang);
						$('ul.tabs li a').click(function(){													
								currlang = $(this).html();
								$('#addFormElem').attr('class','l_' + currlang);
						});
                        $('#addFormElem.l_'+currlang).click(function(ev){
                            ev.preventDefault();
                            console.log($('div.cont_blocks_'+currlang).length);
                            if($('div.cont_blocks_'+currlang).length <= '3') {
                                $('div.FormElem._' + currlang).append('<div class="cont_blocks_'+currlang+'">'  
                                + '<input placeholder="<?php echo __("Текст",null); ?>" style="margin-bottom:10px;width:250px;height:20px;" name="full_'+currlang+'[]" value=""> ' 
                                + '<button style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it">x</button>'
                                + '</div>');
                            }
                        });
                        // Remove parent of 'remove' link when link is clicked.
                        $('div.FormElem').on('click', '.rem_it', function(e) {
                            e.preventDefault();

                            $(this).parent().remove();
                        });
                </script> 


                </div>    
                <fieldset>
                    <ul>
                        <?php switch ($action){  case 'add': ?>    
                        <li><label><b><?php echo __("Активность",null); ?></b>&nbsp;&nbsp;<input type="checkbox" name="status" value="1" /></label></li>
                        <?php break; case 'edit'; case 'update'; ?>
                        <li><label><b><?php echo __("Активность",null); ?></b>&nbsp;&nbsp;<input type="checkbox" name="status" <?php if ($category['status']=='1'){ echo 'checked="checked"'; } ?> value="1" /></label></li>                        
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