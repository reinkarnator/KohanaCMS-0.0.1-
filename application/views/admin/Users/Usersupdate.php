<?php if (!empty($category)) : ?>
<!-- Form elements -->
<div class="grid_12">

    <div class="module">
        <h2><span>Редактирование пользователя</span></h2>

        <div class="module-body">
            <form action="" id="commentForm" method="POST" enctype="multipart/form-data">
                <div>
                    <span class="notification n-success">Пользователь изменен</span>
                </div>
                <div style="float:left;padding-right:50px;border-right:1px dotted #DDDDDD;height:300px;">
                    <p>
                        <label>Имя</label>
                        <input type="text" id="cname" name="name" class="required" style="width:250px;" value="<?php echo $category['name']; ?>" />
                    </p>
                    <p>
                        <label>Аккаунт</label>
                        <input type="text" id="cname1" name="username" class="required" style="width:250px;" value="<?php echo $category['username']; ?>" />
                    </p>
                    <p>
                        <label>Пароль</label>
                        <input type="text" id="cname2" name="password" class="required" style="width:250px;" value="" />
                    </p>
                    <p>
                        <label>Эл.почта</label>
                        <input type="text" id="cname3" name="email" class="required" style="width:200px;" value="<?php echo $category['email']; ?>"/>
                    </p>
                </div>
                <div style="float:left;margin-left:50px;">
                    <div style="float:left;margin-right:50px;">
                        <label>Фото пользователя</label>

                        <style type="text/css">

                            #image {
                                width: 270px;
                                height: 270px;
                                overflow: hidden;
                                cursor: pointer;
                                background: #CCCCCC;
                                color: #fff;
                            }
                            #image img {

                            }

                        </style>

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
                                window.open(t + 'application/views/admin/js/ckeditor/kcfinder/browse.php?type=images&dir=upload/images',
                                    'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                                        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                                );
                            }

                        </script>

                        <div id="image" onclick="openKCFinder(this)">
                            <div style="padding:5px 0 0 5px;position:absolute;background: #000;width:265px;opacity:0.6;-moz-opacity:0.6;height: 25px;">Кликните чтоб загрузить изображение</div>
                            <?php if (!empty($category['photo'])) : ?>
                            <img height="150" src="<?php echo URL::base(TRUE).$category['photo'];?>" />
                            <input type="hidden" name="photo" value="<?php echo $category['photo'];?>" />
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <br clear="all" />
                            <fieldset>
                                <input class="submit-green" name="saved" type="submit" value="Submit" />
                                <input class="submit-gray"  name="back" onclick="window.location='<?php echo URL::base(TRUE,TRUE);?>admin/<?php echo $type;?>/'" type="button" value="Back" />
                            </fieldset>
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->

<?php else: ?>
<div style="padding:10px; margin-bottom:10px;">
    Статья не найдена или не существует
</div>
<?php endif; ?>