<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">                
                <div class="image" style="width: 75px; height: 75px; border-radius: 50%; background-image: url('<?= ($BASE.'/'.$media_images) ?>/profile/profile3.png');background-position: center center; background-size: cover; "></div>
                <span><?= ($username) ?></span>
            </li>
            <?php foreach (($menu_list?:[]) as $menu): ?>                
                <?php if (($menu['has_child'] == 1) && ($menu['mnu_parent_id'] == null)): ?>
                    
                        <li>
                            <a href="<?= ($menu['links']) ?>"><i class="<?= ($menu['icons']) ?>"></i> <?= ($menu['deskripsi']) ?></a> 
                            <ul class="nav nav-second-level">
                                <?php foreach (($menu_list?:[]) as $submenu): ?>
                                    <?php if ($submenu['mnu_parent_id'] == $menu['mnu_id']): ?>
                                        <li>
                                            <a href="<?= ($BASE.$submenu['links']) ?>"><i class="<?= ($submenu['icons']) ?>"></i> <?= ($submenu['deskripsi']) ?></a> 
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    
                    <?php else: ?>
                        <?php if ($menu['mnu_parent_id'] == null): ?>
                            <li>
                                <a href="<?= ($BASE.$menu['links']) ?>"><i class="<?= ($menu['icons']) ?>"></i> <?= ($menu['deskripsi']) ?></a> 
                            </li>
                        <?php endif; ?>
                    
                <?php endif; ?>                
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
