<div id="content_main">
    <div id="content_left" class="content_100">
        <div id="content_head">
            <div id="welcome"><p>Willkommen</p></div>
        </div>
        <div>
            <form enctype="multipart/form-data" name="semLoginForm" action="index.php" method="POST" style="width: 100%; float:left;">
                <div class="container">
                    <div class="row">
                        <div class="col col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Benutzername</label>
                                <input name="semLoginUsername" type="email" class="form-control" placeholder="Benutzername angeben">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Passwort</label>
                                <input name="semLoginPassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Passwort">
                            </div>

                            <input type="hidden" name="semLoginLanguage" value="<?php echo $vConfig['portal']['lang'][ 0 ]; ?>" />
                            <input type="hidden" name="semRedirect" value="<?php echo ( isset ( $_SESSION['sess_semRedirect'] ) ? $_SESSION['sess_semRedirect'] : '' ); ?>">
                            <input type="hidden" name="formAction" value="checkLogin" />
                        </div>

                        <div class="col col-8">
                            <?php echo $arr_semContent['portal']['login_welcome']; ?><br><br>
                        </div>
                    </div>
                    
                </div>

                <div style="width: 100%; clear: both;">
                    <div style="float:left;">
                        <a type="button" class="btn btn-primary" href="#" onclick="document.semLoginForm.submit();" class="link_login">
                            <?php echo $arr_semContent['portal']['login_input04']; ?>
                        </a>
                    </div>
                    <div style="width:150px; margin-left:200px; float:left; overflow:visible;">
                        <img alt="Linkpfeil" src="<?php echo PATH_IMG; ?>speet_link_arrow.png" border="0" style="float:left" />
                        <a href="index.php?siteId=b" class="link_login" target="_top">
                            <?php echo $arr_semContent['portal']['reg_03']; ?>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="content_right">
    </div>
</div>
