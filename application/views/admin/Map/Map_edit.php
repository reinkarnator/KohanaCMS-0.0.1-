<style>
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
        text-align: center;
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
    #marker {
        position: absolute;
        font-size: 2.4rem;
        color: red;  
        top: 0;
        left: 0;                                  
    }
    #add_marker {
        border:1px solid #fff;
        color:#fff;
        background: orange;
        padding: 10px 20px;
        cursor:pointer;
    }  
    .map {
        width: 1108px;
        height: 547px;
        position: relative;
        background-repeat: no-repeat;
    }  
    @media (max-width: 1440px) {
        .map {
        } 
    }            
</style>

<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span><?php echo __("Создание маркера",null); ?></span></h2>

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
                                <span class="notification n-success"><?php echo __("Карта изменена",null); ?></span>
                            </div>   
    <?php break; }?> 



            <?php switch ($action){  case 'add': ?>  
                <p>                
                    <label><?php echo __("Координаты",null); ?></label>
                    <input type="text" id="coords" readonly name="coordinates" style="width:250px;" value="" />
                </p>     
                <div class="map" style="background-image: url(<?php echo URL::base(TRUE,TRUE); ?>html/img/global-map-blue.png);"></div> 
                <button type="button" id="add_marker">Add marker</button>
              
            <?php break; case 'edit'; case 'update'; ?>
                <p>                
                    <label><?php echo __("Координаты",null); ?></label>
                    <input type="text" id="coords" readonly name="coordinates" style="width:250px;" value="<?php echo $category['coordinates']; ?>" />
                </p>             
                <div class="map" style="background-image: url(<?php echo URL::base(TRUE,TRUE); ?>html/img/global-map-blue.png);">
                    <div id="marker" class="fa fa-map-marker" aria-hidden="true" style="<?php echo $category['coordinates']; ?>"></div>
                </div> 
            <?php break; }?>
            
            
            <script>
                $(function(){
                    if($('#marker').length != 0) {
                        $('#marker').draggable({
                              containment: ".map",
                           /*   stop: function( event, ui ) {
                                   $(this).css("left",parseInt($(this).css("left")) / ($(".map").width() / 100)+"%");
                                   $(this).css("top",parseInt($(this).css("top")) / ($(".map").height() / 100)+"%");
                              }
                           */   
                        });
                    }
                });
                $('#add_marker').one('click',function(e) { 
                    e.preventDefault();
                    $('.map').append('<div id="marker" class="fa fa-map-marker" aria-hidden="true"></div>');
                    $('#marker').draggable({
                          containment: ".map",
                          /*stop: function( event, ui ) {
                           $(this).css("left",parseInt($(this).css("left")) / ($(".map").width() / 100)+"%");
                           $(this).css("top",parseInt($(this).css("top")) / ($(".map").height() / 100)+"%");
                          }*/
                    });
                });
                $(document).on('mouseleave', '#marker', function(){
                   // alert('aasdas');
                  //  var m_top = $('#marker').attr('style');
                    var m_top = $('#marker').css('top');
                    var m_left = $('#marker').css('left');
                    
                  /*  if(m_top.slice(0, -2) < 0){
                        alert('t0');
                        $('#marker').css('top','50px');
                        m_top = '50px';   
                    }
                    if(m_left.slice(0, -2) < 0){
                        alert('l0');
                        $('#marker').css('left','50px');
                        m_left = '50px';         
                    } */

                    $('#coords').val('top:'+ m_top + ';left:' + m_left);
                });
                
            </script>

            <p>
                    <label><?php echo __("Partners",null); ?></label>    
                    <?php switch ($action){  case 'add': ?>                            
                        <textarea id="files" name="logo" readonly="readonly" onclick="openKCFinder(this)"></textarea>
                        <div id="gallery"></div>
                    <?php break; case 'edit'; case 'update'; ?> 
                        <textarea id="files" name="logo" readonly="readonly" onclick="openKCFinder(this)"><?php echo $category['logo']; ?></textarea>
                        <div id="gallery">
                        <?php 
                        $gall_list = explode("\n",$category['logo']);
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
                    <label><?php echo __("Страна на",null); ?> <?php echo __("Язык".$key."",null); ?></label>
                    <?php switch ($action){  case 'add': ?>   
                    <input type="text" name="country_<?php echo $langs;?>" class="required" style="width:250px;" value="" />
                    <?php break; case 'edit'; case 'update'; ?>
                    <input type="text" name="country_<?php echo $langs;?>" class="required" style="width:250px;" value="<?php echo $category['country_'.$langs.'']; ?>" />
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