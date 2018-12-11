<div class="float-right">
<a class="button" href="<?php echo URL::base(TRUE,TRUE).'admin/menus/add'; ?>">
<span>
<?php echo __("Новое меню",null); ?>
<img width="12" height="9" alt="New article" src="<?php echo URL::base().'html/admin/images/plus-small.gif'; ?>">
</span>
</a>
</div>  
<br clear="all" /> 
<br/>
                <!-- Example table -->
                <div class="module">
                	<h2><span><?php echo __("Список меню",null); ?></span></h2>
                    <div class="module-table-body">
                    	<form action="<?php echo URL::base(TRUE,TRUE).'admin/menus/changepos'; ?>" method="POST">
                        <table id="myTable">
                        	<thead>
                                <tr>
                                    <th style="width:5%;">#</th>
                                    <th style="width:12%"><?php echo __("Подзаголовок2",null); ?></th>
                <?php foreach ($lang_count as $key => $langs) : $key++;?>
                    <th style="width:12%"><?php echo __("Название на",null); ?><?php echo __("Язык".$key."",null); ?></th>
                <?php endforeach; ?>     
                                    <th style="width:12%"><?php echo __("Родитель",null); ?></th>
                                    <th style="width:12%"><?php echo __("Тип меню",null); ?></th>
                                    <th style="width:7%"><?php echo __("Порядок",null); ?><button type="submit" style="border:0;background: none;cursor: pointer;" name="set_order"><img src="<?php echo URL::base().'html/admin/images/bin.gif"'; ?>" width="16" height="16" /></button> </th>
                                    <th style="width:7%"><?php echo __("Активность",null); ?>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php 
              //  $c='';
                foreach ($menu_elements as $material) :
               // $c++;    
                    ?>
                                <tr>
                                    <td><?php echo $material['id']; ?><input type="hidden" name="menu_id[]" value="<?php echo $material['id'];?>" /></td>
                                    <td><a href="<?php echo URL::base(TRUE,TRUE).'admin/menus/'.$material['id'].'-'.$material['alt_title'].'/edit';?>"><?php echo $material['alt_title']; ?></a></td>
                <?php foreach ($lang_count as $key => $langs) : $key++;?>                    
                                    <td><?php echo $material['name_'.$langs]; ?></td>
                <?php endforeach; ?>                       
                                    <td><?php 
                                    if($material['parent_id']=='0'){
                                    echo 'Нет'; 
                                    }else{

                                        foreach($menu_elements[0]['result_menu'] as $zt)
                                            if (in_array($material['parent_id'],$zt)){
                                                echo $zt['name_'.$lang];

                                            }

                                   // echo $material['parent_id'];
                                    }
                                    ?></td>
                                    <td><?php echo $material['type']; ?></td>
                                    <td><input style="width:50px;" type="text" name="order_id[]." value="<?php echo $material['order_id']; ?>" /></td>
                                    <td align="center">
                                        <img src="<?php echo URL::base().'html/admin/images/status'.$material['status'].'.gif'; ?>" width="16" height="16" />
                                        <a href="<?php echo URL::base(TRUE,TRUE).'admin/menus/'.$material['id'].'-'.$material['alt_title'].'/edit';?>"><img src="<?php echo URL::base().'html/admin/images/pencil.gif"'; ?>" width="16" height="16" /></a>
                                        <a href="<?php echo URL::base(TRUE,TRUE).'admin/menus/'.$material['id'].'-'.$material['alt_title'].'/remove';?>"><img src="<?php echo URL::base().'html/admin/images/cross-on-white.gif"'; ?>" width="16" height="16" /></a>
                                    </td>
                                </tr>
               <?php endforeach; ?>
                            </tbody>
                        </table>
                        </form>
                        <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="<?php echo URL::base().'html/admin/images/arrow-stop-180.gif'; ?>" alt="first"/>
                                <img class="prev" src="<?php echo URL::base().'html/admin/images/arrow-180.gif'; ?>" alt="prev"/>
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="<?php echo URL::base().'html/admin/images/arrow.gif'; ?>" alt="next"/>
                                <img class="last" src="<?php echo URL::base().'html/admin/images/arrow-stop.gif'; ?>" alt="last"/>
                                <select class="pagesize input-short align-center">
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
