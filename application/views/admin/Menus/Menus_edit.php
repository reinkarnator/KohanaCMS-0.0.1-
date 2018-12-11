
          <!-- Form elements -->
            <div class="grid_12">

                <div class="module">
                     <h2><span><?php echo __("Добавление меню",null); ?></span></h2>

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
                                <span class="notification n-success"><?php echo __("Меню было изменено",null); ?></span>
                            </div>   
    <?php break; }?>  
                          <div style="float:left;padding-right:50px;border-right:1px dotted #DDDDDD;">
                          <!--  <p>
                                <label><?php echo __("Подзаголовок",null); ?></label>
                               <?php switch ($action){  case 'add': ?> 
                                <input type="text" id="cname3" name="alt_title" class="required" style="width:200px;"/>
                               <?php break; case 'edit'; case 'update'; ?>
                                <input type="text" id="cname3" name="alt_title" class="required" value="<?php echo $category['alt_title']; ?>" style="width:200px;"/> 
                                <?php break; }?>  
                            </p>-->
                            <p>
                              <?php foreach ($lang_count as $key => $langs) : $key++;?>
                                <label><?php echo __("Название на",null); ?><?php echo __("Язык".$key."",null); ?></label>
                                <?php switch ($action){  case 'add': ?> 
                                <input type="text" id="cname" name="name_<?php echo $langs;?>" class="required" style="width:250px;" />
                                <?php break; case 'edit'; case 'update'; ?>
                                <input type="text" id="cname" name="name_<?php echo $langs;?>" class="required" value="<?php echo $category['name_'.$langs.'']; ?>" style="width:250px;" />  
                                <?php break; }?>  
                              <?php endforeach; ?>                               
                            </p>
                           </div>
                           <div style="float:left;margin-left:50px;">
                               <div style="float:left;">
                               <label><?php echo __("Компонент",null); ?></label>
                               <select class="required" style="width:250px;" name="component" id="typeselect" onchange="onTypeChange()">
                               <?php switch ($action){  case 'add': ?> 
                                   <option value=""></option>
                                   <option value="1"><?php echo __("Внешняя ссылка",null); ?></option>
                                   <option value="2"><?php echo __("Материалы",null); ?></option>
                                   <option value="3"><?php echo __("Без ссылки",null); ?></option> 
                               <?php break; case 'edit'; case 'update'; ?>    
                               <?php if ($category['component']=='2'): ?>
                                   <option value="1"><?php echo __("Внешняя ссылка",null); ?></option>
                                   <option value="2" selected="selected"><?php echo __("Материалы",null); ?></option>
                                   <option value="3"><?php echo __("Без ссылки",null); ?></option>
                                <?php endif; ?>
                                <?php if ($category['component']=='1'): ?>
                                   <option value="1" selected="selected"><?php echo __("Внешняя ссылка",null); ?></option>
                                   <option value="2"><?php echo __("Материалы",null); ?></option>
                                   <option value="3"><?php echo __("Без ссылки",null); ?></option>
                                <?php endif; ?>
                                <?php if ($category['component']=='3'): ?>
                                   <option value="1"><?php echo __("Внешняя ссылка",null); ?></option>
                                   <option value="2"><?php echo __("Материалы",null); ?></option>
                                   <option value="3" selected="selected"><?php echo __("Без ссылки",null); ?></option>
                                <?php endif; ?>
                                <?php break; }?>
                               </select>
                               </div>

                              <div id="mat">
                                 <br clear="all" />
                                 <br clear="all" />
                                <div style="float:left;">
                                <label><?php echo __("Родительский элемент",null); ?></label>

                                <select style="width:250px;" name="parent">
                                  <?php switch ($action){  case 'add': ?>
                                    <option value=""></option>
                                    <?php echo $menus; ?>
                                  <?php break; case 'edit'; case 'update'; ?>  
                                   <option value="0"></option>
                                   <?php echo $category['menus_all']; ?>    
                                  <?php break; }?> 
                                </select>
                                </div>
                              </div>

                            <div id="cat" style="display:none;">
                               <br clear="all" />
                               <br clear="all" />
                               <div style="float:left;">
                                <label><?php echo __("Внешняя ссылка",null); ?></label>
                                <?php switch ($action){  case 'add': ?>
                                <input type="text" name="link" style="width:250px;" id="req" />
                                <?php break; case 'edit'; case 'update'; ?> 
                                 <?php if ($category['component']=='1'): ?>
                                 <input type="text" style="width:350px;" name="link" value="<?php echo $category['link'];?>" class="required" id="req" />
                                 <?php else: ?>
                                 <input type="text" style="width:350px;" name="link" value="" class="required" id="req" />
                                 <?php endif; ?>
                                 <?php break; }?> 
                               </div>
                            </div>
<?php switch ($action){  case 'add': ?> 
<script>
function onTypeChange(){
if (document.getElementById('typeselect').value == '3') {
document.getElementById('cat').style.display = 'none';
//document.getElementById('mat').style.display = 'none';
document.getElementById('req').className = 'notused';
}

if (document.getElementById('typeselect').value == '1') {
document.getElementById('cat').style.display = 'block';
document.getElementById('req').className = 'required';
//document.getElementById('mat').style.display = 'none';
}

if (document.getElementById('typeselect').value == '2') {
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';
}

}

</script>                           
<?php break; case 'edit'; case 'update'; ?> 
<?php if ($category['component']=='3'): ?>
<script>
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';

function onTypeChange(){
if (document.getElementById('typeselect').value == '1') {
document.getElementById('cat').style.display = 'block';
document.getElementById('req').className = 'required';
//document.getElementById('mat').style.display = 'none';
}

if (document.getElementById('typeselect').value == '2') {
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';
}

if (document.getElementById('typeselect').value == '3') {
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';
}

}
</script>
<?php endif; ?>

<?php if ($category['component']=='2'): ?>
<script>
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';

function onTypeChange(){
if (document.getElementById('typeselect').value == '1') {
document.getElementById('cat').style.display = 'block';
document.getElementById('req').className = 'required';
//document.getElementById('mat').style.display = 'none';
}

if (document.getElementById('typeselect').value == '2') {
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';
}

if (document.getElementById('typeselect').value == '3') {
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';
}

}
</script>
<?php endif; ?>

<?php if ($category['component']=='1'): ?>
<script>
//document.getElementById('mat').style.display = 'none';
document.getElementById('cat').style.display = 'block';
document.getElementById('req').className = 'required';

function onTypeChange(){
if (document.getElementById('typeselect').value == '1') {
document.getElementById('cat').style.display = 'block';
document.getElementById('req').className = 'required';
//document.getElementById('mat').style.display = 'none';
}

if (document.getElementById('typeselect').value == '2') {
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';
}

if (document.getElementById('typeselect').value == '3') {
//document.getElementById('mat').style.display = 'block';
document.getElementById('req').className = 'notused';
document.getElementById('cat').style.display = 'none';
}

}
</script>
<?php endif; ?>     
<?php break; }?>                        
<br clear="all" /><br clear="all" />
                               <div style="float:left;">
                               <label><?php echo __("Тип меню",null); ?></label>

                               <select class="required" style="width:100px;" name="type">
                                <?php switch ($action){  case 'add': ?>
                                   <option value=""></option>
                                   <option value="top"><?php echo __("Верхнее",null); ?></option>
                                   <option value="left"><?php echo __("Нижнее",null); ?></option>
                                <?php break; case 'edit'; case 'update'; ?> 
                                <?php if($category['type']=='left') {
                                echo '<option value="left" selected="selected">'.__("Нижнее",null).'</option>';
                                echo '<option value="top">'.__("Верхнее",null).'</option>';
                                } if($category['type']=='top'){
                                echo '<option value="top" selected="selected">'.__("Верхнее",null).'</option>';
                                echo '<option value="left">'.__("Нижнее",null).'</option>';
                                }
                                ?>  
                                <?php break; }?> 
                               </select>
                           </div>
                               <br clear="all" />
                               <br clear="all" />
                               <div style="float:left;">
                                   <label><?php echo __("Порядок меню",null); ?>:</label>
                                   <?php switch ($action){  case 'add': ?>
                                   <input class="required" type="text" name="order" value="" />
                                   <?php break; case 'edit'; case 'update'; ?>
                                   <input class="required" type="text" name="order" value="<?php echo $category['order_id']; ?>" />
                                   <?php break; }?> 
                               </div>
                           </div>
                           <br clear="all" />
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