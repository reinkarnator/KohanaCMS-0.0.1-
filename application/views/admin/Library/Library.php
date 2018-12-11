
<div class="float-right">
    <a class="button" href="<?php echo URL::base(TRUE,TRUE).'admin/Library/add'; ?>">
<span>
<?php echo __("Добавить элемент",null); ?>
<img width="12" height="9" alt="New article" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" src="<?php echo URL::base().'html/admin/images/plus-small.gif'; ?>">
</span>
    </a>
</div>
<br clear="all" />
<br/>
                <!-- Example table -->
                <div class="module">
                	<h2><span><?php echo __("Список элементов,",null); ?></span></h2>

                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%;">#</th>
                                    <th style="width:21%"><?php echo __("Презентации",null); ?></th>                                
                                    <th style="width:21%"><?php echo __("Каталоги",null); ?></th>                                
                                    <th style="width:21%"><?php echo __("Видео",null); ?></th>                                
                                    <th style="width:5%"><?php echo __("Активность",null); ?>&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($menu_elements) {
                                    foreach ($menu_elements as $material) {
                                        $presentations = explode('-|-',$material['head_addon_presentations']);
                                        $catalogue = explode('-|-',$material['head_addon_catalogue']);
                                        $video = explode('-|-',$material['head_addon_video']);
                                    ?>
                                    <tr>
                                        <td><a href="<?php echo URL::base(TRUE,TRUE).'admin/Library/'.$material['id'].'-m/edit';?>"><?php echo $material['id']; ?></a></td>                               
                                        <td>
                                        <?php 
                                        if(is_array($presentations)){
                                                 foreach ($presentations as $present) { echo $present."<br />"; } 
                                        } else { echo $presentations; } 
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                        if(is_array($catalogue)){
                                                 foreach ($catalogue as $catalog) { echo $catalog."<br />"; } 
                                        } else { echo $catalogue; } 
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                        if(is_array($video)){
                                                 foreach ($video as $vid) { echo $vid."<br />"; } 
                                        } else { echo $video; } 
                                        ?>
                                        </td>                                                                            
                                        <td align="center">
                                            <img src="<?php echo URL::base().'html/admin/images/status'.$material['status'].'.gif'; ?>" width="16" height="16" />
                                            <a href="<?php echo URL::base(TRUE,TRUE).'admin/Library/'.$material['id'].'-m/edit';?>"><img src="<?php echo URL::base().'html/admin/images/pencil.gif"'; ?>" width="16" height="16" /></a>
                                            <a href="<?php echo URL::base(TRUE,TRUE).'admin/Library/'.$material['id'].'-m/remove';?>"><img src="<?php echo URL::base().'html/admin/images/cross-on-white.gif"'; ?>" width="16" height="16" /></a>
                                        </td>
                                    </tr>
                                <?php 
                                    }
                                    }
                                ?>
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
