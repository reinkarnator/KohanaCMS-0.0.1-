<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Создание партнера",null); ?></span></h2>

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
                                <span class="notification n-success"><?php echo __("Партнер был изменен",null); ?></span>
                            </div>   
    <?php break; }?>                         
        <p>
          <fieldset> 
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
                <br clear="all"  />
           <fieldset> 
            <p>                
                    <label><?php echo __("URL",null); ?></label>
                <?php switch ($action){  case 'add': ?>   
                    <input type="text" name="url" class="required" style="width:250px;" value="" />
                <?php break; case 'edit'; case 'update'; ?>
                    <input type="text" name="url" class="required" style="width:250px;" value="<?php echo $category['url']; ?>" />
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
                            <label><?php echo __("Название на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                            <?php switch ($action){  case 'add': ?>   
                            <input type="text" name="name_<?php echo $langs;?>" class="required" style="width:250px;" value="" />
                             <?php break; case 'edit'; case 'update'; ?>
                            <input type="text" name="name_<?php echo $langs;?>" class="required" style="width:250px;" value="<?php echo $category['name_'.$langs.'']; ?>" />
                             <?php break; }?>  
                        </p>
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