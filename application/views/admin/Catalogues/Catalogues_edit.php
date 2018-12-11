<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Фото",null); ?></span></h2>

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
                                        <span class="notification n-success"><?php echo __("Событие было изменено",null); ?></span>
                                    </div>   
            <?php break; }?>  
                <p>
                    <label><?php echo __("Год",null); ?></label>
                    <?php switch ($action){  case 'add': ?> 
                    <input type="text" name="year" class="required" style="width:250px;" value="" />
                    <?php break; case 'edit'; case 'update'; ?>
                    <input type="text" name="year" class="required" style="width:250px;" value="<?php echo $category['year'] ;?>" />                    
                    <?php break; }?> 
                </p>
                <br clear="all"  />    

                    <style type="text/css">
                        #kcfinder_div {
                            display: none;
                            position: absolute;
                            width: 670px;
                            height: 400px;
                            background: #e0dfde;
                            border: 2px solid #3687e2;
                            border-radius: 6px;
                            -moz-border-radius: 6px;
                            -webkit-border-radius: 6px;
                            padding: 1px;
                            z-index:1000;
                        }
                    </style>
                    <script type="text/javascript">
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
                                        div.style.display = 'none';
                                        div.innerHTML = '';
                                    }
                                };
                                var t = "<?php echo URL::base(TRUE); ?>";
                                div.innerHTML = '<iframe name="kcfinder_iframe" src="'+ t +'html/admin/js/ckeditor/kcfinder/browse.php?type=files&dir=files/catalogues" ' +
                                    'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';
                                div.style.display = 'block';
                            }
                    </script>
                    <p> 
                    <label><?php echo __("Выберите файл",null); ?></label>
                    <?php switch ($action){  case 'add': ?>    
                              <input type="text" readonly="readonly" class="required" name="gallery" value="<?php echo __("Выберите файл",null); ?>" onclick="openKCFinder1(this)" style="width:600px;cursor:pointer" /><br />
                    <?php break; case 'edit'; case 'update'; ?>
                              <input type="text" readonly="readonly" class="required" name="gallery" value="<?php echo $category['gallery'] ;?>" onclick="openKCFinder1(this)" style="width:600px;cursor:pointer" /><br />
                    <?php break; } ?>
                    </p>   
                    <div id="kcfinder_div"></div>                                                                                                                                     
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


                </div>
<?php endforeach; ?> 
                </div>
            </div>
                <br clear="all"  />

                            <fieldset>
                                <input class="submit-green" name="saved" type="submit" value="Submit" />
                                <input class="submit-gray"  name="back" onclick="window.location='<?php echo URL::base(TRUE,TRUE);?>admin/<?php echo $type;?>/'" type="button" value="Back" />
                            </fieldset>
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->