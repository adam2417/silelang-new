<div id="wrapper">
    <h1><?= ($site) ?></h1>

    <h2>Log in to your Account</h2>
    <div class="w3layoutscontaineragileits">
        <form action="<?= ($BASE. '/login/login_action') ?>" method="post">
            <input type="text" Name="username" placeholder="USERNAME" required="">
            <input type="password" Name="password" placeholder="PASSWORD" required="">
            <!--<ul class="agileinfotickwthree">
                <li>
                    <input type="checkbox" id="brand1" value="">
                    <label for="brand1"><span></span>Remember me</label>
                </li>
            </ul>-->
            <div class="aitssendbuttonw3ls">
                <input type="hidden" name="login" value="login" />            
                <input type="submit" value="LOGIN">
                <!--<p><a href="#">REGISTER NEW ACCOUNT <span>→</span></a></p>-->
                <div class="clear"></div>
            </div>
        </form>
    </div>
    <?php if ($message): ?>        
        <strong><?= ($message) ?></strong>                
    <?php endif; ?>
</div>