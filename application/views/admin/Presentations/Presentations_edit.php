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
        <h2><span><?php echo __("Создание презентации",null); ?></span></h2>

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
                                <span class="notification n-success"><?php echo __("Презентация была изменена",null); ?></span>
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
                            <select name="head_addon_presentations[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {    
                                  if($lib['head_addon_presentations']) {                     
                                    if (strpos($lib['head_addon_presentations'], "-|-")) {
                                        $lib['head_addon_presentations'] = explode("-|-", $lib['head_addon_presentations']);  
                                        foreach ($lib['head_addon_presentations'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($cat_v == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                     <option value="<?php echo $lib['head_addon_presentations']; ?>" <?php echo ($cat_v == $lib['head_addon_presentations']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['head_addon_presentations']; ?></option>   
                                    <?php } ?> 
                                  <?php } ?> 
                                <?php } ?>
                            </select> 
                            <select name="img_addon_presentations[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if ($lib['img_addon_presentations']) {
                                    if (strpos($lib['img_addon_presentations'], "-|-")) {
                                        $lib['img_addon_presentations'] = explode("-|-", $lib['img_addon_presentations']);  
                                        foreach ($lib['img_addon_presentations'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ( $category['img_addon_presentations'][$cat_k] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                            <option value="<?php echo $lib['img_addon_presentations']; ?>" <?php echo ($category['img_addon_presentations'][$cat_k] == $lib['img_addon_presentations']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['img_addon_presentations']; ?></option>   
                                    <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select>                                                             
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it">x</button>
                           </div>
                    <?php endforeach; ?>              
                    <?php } else { ?>
                            <div class="cont_blocks">   
                            <select name="head_addon_presentations[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if ($lib['head_addon_presentations']) {
                                    if (strpos($lib['head_addon_presentations'], "-|-")) {
                                        $lib['head_addon_presentations'] = explode("-|-", $lib['head_addon_presentations']);  
                                        foreach ($lib['head_addon_presentations'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($category['head_addon_presentations'] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                     <option value="<?php echo $lib['head_addon_presentations']; ?>" <?php echo ($category['head_addon_presentations'] == $lib['head_addon_presentations']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['head_addon_presentations']; ?></option>   
                                    <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select> 
                            <select name="img_addon_presentations[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if ($lib['img_addon_presentations']) {
                                    if (strpos($lib['img_addon_presentations'], "-|-")) {
                                        $lib['img_addon_presentations'] = explode("-|-", $lib['img_addon_presentations']);  
                                        foreach ($lib['img_addon_presentations'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($category['img_addon_presentations'] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                            <option value="<?php echo $lib['img_addon_presentations']; ?>" <?php echo ($category['img_addon_presentations'] == $lib['img_addon_presentations']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['img_addon_presentations']; ?></option>   
                                    <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select>                  
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
                            + '<select name="head_addon_presentations[]"><option value=""></option><?php foreach ($library as $key => $lib) {if ($lib["head_addon_presentations"]) {if (strpos($lib["head_addon_presentations"], "-|-")) { $lib["head_addon_presentations"] = explode("-|-", $lib["head_addon_presentations"]); foreach ($lib["head_addon_presentations"] as $k => $head_add) { ?><option value="<?php echo $head_add; ?>"><?php echo $head_add; ?></option><?php } } else { ?><option value="<?php echo $lib["head_addon_presentations"]; ?>"><?php echo $lib["head_addon_presentations"]; ?></option><?php } ?><?php } ?><?php } ?></select>' 
                            + '<select name="img_addon_presentations[]"><option value=""></option><?php foreach ($library as $key => $lib) {if ($lib["img_addon_presentations"]) {if (strpos($lib["img_addon_presentations"], "-|-")) { $lib["img_addon_presentations"] = explode("-|-", $lib["img_addon_presentations"]); foreach ($lib["img_addon_presentations"] as $k => $head_add) { ?><option value="<?php echo $head_add; ?>"><?php echo $head_add; ?></option><?php } } else { ?><option value="<?php echo $lib["img_addon_presentations"]; ?>"><?php echo $lib["img_addon_presentations"]; ?></option><?php } ?><?php } ?><?php } ?></select>' 
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
                        foreach ($category['head_addon_catalogue'] as $cat_k => $cat_v):  ?>

                           <div class="cont_blocks">  
                            <select name="head_addon_catalogue[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if (strpos($lib['head_addon_catalogue'], "-|-")) {
                                        $lib['head_addon_catalogue'] = explode("-|-", $lib['head_addon_catalogue']);  
                                        foreach ($lib['head_addon_catalogue'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($cat_v == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                     <option value="<?php echo $lib['head_addon_catalogue']; ?>" <?php echo ($cat_v == $lib['head_addon_catalogue']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['head_addon_catalogue']; ?></option>   
                                    <?php } ?> 
                                <?php } ?>
                            </select> 
                            <select name="img_addon_catalogue[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if ($lib['img_addon_catalogue']) {
                                    if (strpos($lib['img_addon_catalogue'], "-|-")) {
                                        $lib['img_addon_catalogue'] = explode("-|-", $lib['img_addon_catalogue']);  
                                        foreach ($lib['img_addon_catalogue'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ( $category['img_addon_catalogue'][$cat_k] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                            <option value="<?php echo $lib['img_addon_catalogue']; ?>" <?php echo ($category['img_addon_catalogue'][$cat_k] == $lib['img_addon_catalogue']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['img_addon_catalogue']; ?></option>   
                                    <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select>                                                             
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it1">x</button>
                           </div>
                    <?php endforeach; ?>              
                    <?php } else {  ?>
                            <div class="cont_blocks">   
                            <select name="head_addon_catalogue[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if ($lib['head_addon_catalogue']) {
                                    if (strpos($lib['head_addon_catalogue'], "-|-")) {
                                        $lib['head_addon_catalogue'] = explode("-|-", $lib['head_addon_catalogue']);  
                                        foreach ($lib['head_addon_catalogue'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($category['head_addon_catalogue'] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                        <option value="<?php echo $lib['head_addon_catalogue']; ?>" <?php echo ($category['head_addon_catalogue'] == $lib['head_addon_catalogue']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['head_addon_catalogue']; ?></option>   
                                    <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select> 
                            <select name="img_addon_catalogue[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if ($lib['img_addon_catalogue']) {
                                    if (strpos($lib['img_addon_catalogue'], "-|-")) {
                                        $lib['img_addon_catalogue'] = explode("-|-", $lib['img_addon_catalogue']);  
                                        foreach ($lib['img_addon_catalogue'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($category['img_addon_catalogue'] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                            <option value="<?php echo $lib['img_addon_catalogue']; ?>" <?php echo ($category['img_addon_catalogue'] == $lib['img_addon_catalogue']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['img_addon_catalogue']; ?></option>   
                                    <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select>                  
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
                            + '<select name="head_addon_catalogue[]"><option value=""></option><?php foreach ($library as $key => $lib) {if ($lib["head_addon_catalogue"]) {if (strpos($lib["head_addon_catalogue"], "-|-")) { $lib["head_addon_catalogue"] = explode("-|-", $lib["head_addon_catalogue"]); foreach ($lib["head_addon_catalogue"] as $k => $head_add) { ?><option value="<?php echo $head_add; ?>"><?php echo $head_add; ?></option><?php } } else { ?><option value="<?php echo $lib["head_addon_catalogue"]; ?>"><?php echo $lib["head_addon_catalogue"]; ?></option><?php } ?><?php } ?><?php } ?></select>' 
                            + '<select name="img_addon_catalogue[]"><option value=""></option><?php foreach ($library as $key => $lib) {if ($lib["img_addon_catalogue"]) {if (strpos($lib["img_addon_catalogue"], "-|-")) { $lib["img_addon_catalogue"] = explode("-|-", $lib["img_addon_catalogue"]); foreach ($lib["img_addon_catalogue"] as $k => $head_add) { ?><option value="<?php echo $head_add; ?>"><?php echo $head_add; ?></option><?php } } else { ?><option value="<?php echo $lib["img_addon_catalogue"]; ?>"><?php echo $lib["img_addon_catalogue"]; ?></option><?php } ?><?php } ?><?php } ?></select>' 
                            + '<div id="kcfinder_div" class="kcfinder_div"></div>'
                            + '<button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it1">x</button>'
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
                            <select name="head_addon_video[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if (strpos($lib['head_addon_video'], "-|-")) {
                                        $lib['head_addon_video'] = explode("-|-", $lib['head_addon_video']);  
                                        foreach ($lib['head_addon_video'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($cat_v == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                     <option value="<?php echo $lib['head_addon_video']; ?>" <?php echo ($cat_v == $lib['head_addon_video']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['head_addon_video']; ?></option>   
                                    <?php } ?> 
                                <?php } ?>
                            </select> 
                            <select name="img_addon_video[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if (strpos($lib['img_addon_video'], "-|-")) {
                                        $lib['img_addon_video'] = explode("-|-", $lib['img_addon_video']);  
                                        foreach ($lib['img_addon_video'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ( $category['img_addon_video'][$cat_k] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                            <option value="<?php echo $lib['img_addon_video']; ?>" <?php echo ($category['img_addon_video'][$cat_k] == $lib['img_addon_video']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['img_addon_video']; ?></option>   
                                    <?php } ?> 
                                <?php } ?>
                            </select>                                                             
                            <button type="button" style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it2">x</button>
                           </div>
                    <?php endforeach; ?>              
                    <?php } else { ?>
                            <div class="cont_blocks">   
                            <select name="head_addon_video[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if ($lib['head_addon_video']) {
                                    if (strpos($lib['head_addon_video'], "-|-")) {
                                        $lib['head_addon_video'] = explode("-|-", $lib['head_addon_video']);  
                                        foreach ($lib['head_addon_video'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($category['head_addon_video'] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                            <option value="<?php echo $lib['head_addon_video']; ?>" <?php echo ($category['head_addon_video'] == $lib['head_addon_video']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['head_addon_video']; ?></option>   
                                    <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select> 
                            <select name="img_addon_video[]">
                                <option value=""></option>
                                <?php foreach ($library as $key => $lib) {                         
                                    if ($lib['img_addon_video']) {
                                    if (strpos($lib['img_addon_video'], "-|-")) {
                                        $lib['img_addon_video'] = explode("-|-", $lib['img_addon_video']);  
                                        foreach ($lib['img_addon_video'] as $k => $head_add) { ?>                    
                                            <option value="<?php echo $head_add; ?>" <?php echo ($category['img_addon_video'] == $head_add) ? 'selected="selected"' : NULL; ?>><?php echo $head_add; ?></option>
                                        <?php } ?>     
                                    <?php } else { ?>  
                                            <option value="<?php echo $lib['img_addon_video']; ?>" <?php echo ($category['img_addon_video'] == $lib['img_addon_video']) ? 'selected="selected"' : NULL; ?>><?php echo $lib['img_addon_video']; ?></option>   
                                    <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select>                  
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
                            + '<select name="head_addon_video[]"><option value=""></option><?php foreach ($library as $key => $lib) {if ($lib["head_addon_video"]) {if (strpos($lib["head_addon_video"], "-|-")) { $lib["head_addon_video"] = explode("-|-", $lib["head_addon_video"]); foreach ($lib["head_addon_video"] as $k => $head_add) { ?><option value="<?php echo $head_add; ?>"><?php echo $head_add; ?></option><?php } } else { ?><option value="<?php echo $lib["head_addon_video"]; ?>"><?php echo $lib["head_addon_video"]; ?></option><?php } ?><?php } ?><?php } ?></select>' 
                            + '<select name="img_addon_video[]"><option value=""></option><?php foreach ($library as $key => $lib) {if ($lib["img_addon_video"]) {if (strpos($lib["img_addon_video"], "-|-")) { $lib["img_addon_video"] = explode("-|-", $lib["img_addon_video"]); foreach ($lib["img_addon_video"] as $k => $head_add) { ?><option value="<?php echo $head_add; ?>"><?php echo $head_add; ?></option><?php } } else { ?><option value="<?php echo $lib["img_addon_video"]; ?>"><?php echo $lib["img_addon_video"]; ?></option><?php } ?><?php } ?><?php } ?></select>' 
                            + '<button style="display:inline-block;vertical-align:top;background:red;color:#fff;border:1px solid #fff;padding:5px 15px;line-height:12px;cursor:pointer;" class="rem_it2">x</button>'
                            + '</div>');
                        });
                    });
                    // Remove parent of 'remove' link when link is clicked.
                    $('div.FormElem2').on('click', '.rem_it2', function(e) {
                        e.preventDefault();
                        $(this).parent().remove();
                    });
                </script>                                                                   
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
                            <input type="text" name="name_<?php echo $langs;?>" class="required" style="width:250px;" value="" />
                             <?php break; case 'edit'; case 'update'; ?>
                            <input type="text" name="name_<?php echo $langs;?>" class="required" style="width:250px;" value="<?php echo $category['name_'.$langs.'']; ?>" />
                             <?php break; }?>  
                        </p>
                         <br clear="all" />                        
                        <p>                
                            <label><?php echo __("Текст на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                            <?php switch ($action){  case 'add': ?>   
                            <textarea rows="11" cols="50" name="description_<?php echo $langs;?>" class="ckeditor" id="editor<?php echo $key;?>"></textarea>
                            <?php break; case 'edit'; case 'update'; ?>
                            <textarea rows="11" cols="50" name="description_<?php echo $langs;?>" class="ckeditor" id="editor<?php echo $key;?>"><?php echo $category['description_'.$langs.'']; ?></textarea>
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