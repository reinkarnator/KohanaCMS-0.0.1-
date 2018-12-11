 <!-- Dashboard icons -->                           
            <div class="grid_7">
                    <?php foreach ($menus as $key=>$menu): ?>
                        <?php if ($menu !== reset($menus) && $menu !== end($menus)): ?>
                            <a href="<?php echo URL::base(TRUE,TRUE);?>admin/<?php echo $menu; ?>" class="dashboard-module">
                                <img src="<?php echo URL::base(TRUE);?>html/admin/images/<?php echo $menu; ?>.png" width="64" height="64"  />
                                <span><?php echo $key; ?></span>
                            </a>
                        <?php endif; ?>   
                    <?php endforeach; ?>
                    <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->

            <!-- Account overview -->
            <div class="grid_5">
                <div class="module">
                        <h2><span><?php echo __("Пользователь",null); ?></span></h2>
                        <div class="module-body">
                        	<p style="float: left;">
                                <strong><?php echo __("Пользователь",null); ?>: </strong><?php echo $account['username']; ?><br />
                                <strong><?php echo __("Имя",null); ?>: </strong><?php echo $account['name']; ?><br />
                                <strong>E-mail: </strong><?php echo $account['email']; ?><br />
                            </p>
                            <div style="float:right;">
                                <strong style="float:left;"><?php echo __("Фото",null); ?>:&nbsp;&nbsp; </strong>
                                <img style="border:5px solid #e5e5e5" width="200" src="<?php echo $account['photo']; ?>" />
                            </div>
                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->

            <div style="clear:both;"></div>