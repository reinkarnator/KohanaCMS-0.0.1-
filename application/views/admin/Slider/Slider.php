
<div class="float-right">
    <a class="button" href="<?php echo URL::base(TRUE,TRUE).'admin/slider/add'; ?>">
<span>
<?php echo __("Новый слайд",null); ?>
<img width="12" height="9" alt="New article" src="<?php echo URL::base().'html/admin/images/plus-small.gif'; ?>">
</span>
    </a>
</div>
<br clear="all" />
<br/>
                <!-- Example table -->
                <div class="module">
                	<h2><span><?php echo __("Список слайдов",null); ?></span></h2>

                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%;">#</th>
                        <?php foreach ($lang_count as $key => $langs) : $key++;?>     
                            <th style="width:11%"><?php echo __("Название на",null); ?><?php echo __("Язык".$key."",null); ?></th>
                        <?php endforeach; ?>                                      
                                    <th style="width:7%"><?php echo __("Активность",null); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($menu_elements):
                            foreach ($menu_elements as $k => $material) : $k++;?>
                                <tr>
                                    <td><?php echo $material['id']; ?></td>
                                <?php foreach ($lang_count as $key => $langs) : $key++;?>   
                                <?php if ($key == '1'): ?>             
                                    <td><a href="<?php echo URL::base(TRUE,TRUE).'admin/slider/'.$material['id'].'-m/edit';?>"><?php echo ($material['title_'.$langs.'']) ? $material['title_'.$langs.''] : 'slider'.$k; ?></a></td>
                                <?php else: ?>       
                                    <td><?php echo ($material['title_'.$langs.'']) ? $material['title_'.$langs.''] : 'slider'.$k; ?></td>
                                <?php endif; ?>      
                                <?php endforeach; ?>             
                                    <td align="center">
                                        <img src="<?php echo URL::base().'html/admin/images/status'.$material['status'].'.gif'; ?>" width="16" height="16" />
                                    <a href="<?php echo URL::base(TRUE,TRUE).'admin/slider/'.$material['id'].'-m/edit';?>"><img src="<?php echo URL::base().'html/admin/images/pencil.gif"'; ?>" width="16" height="16" /></a>
                                    <a href="<?php echo URL::base(TRUE,TRUE).'admin/slider/'.$material['id'].'-m/remove';?>"><img src="<?php echo URL::base().'html/admin/images/cross-on-white.gif"';?>" width="16" height="16" /></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif ?>
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
