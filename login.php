<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gustavo Castro">
        <title>AdminPanel</title>
        <?php
        require_once 'helpers/globalHelper.php';
        require_once 'helpers/headerHelper.php';
        ?>
        <style>
            .centered {
                margin: 0 auto !important;
                float: none !important;
            }
            .vertical-center {
                min-height: 100%;
                min-height: 100vh;
                display: flex;
                align-items: center;
            }
            .login-box{
                border: 1px solid lightgray;
                border-radius: 10px;
                padding-bottom: 15px;
            }

        </style>
        <script src="<?php echo RAIZ; ?>ajax/login.js"></script>
    </head>
    <body>        
        <div class="container vertical-center">
            <div class="col-lg-4 centered login-box">
                <form>
                    <h3>Login</h3>
                    <fieldset>
                        <div class="form-group ">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span> 
                                </div>
                                <input class="form-control" id="txtUser" type="text"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group ">                            
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span> 
                                </div>
                                <input class="form-control" id="txtSenha" type="password"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <button type="button" class="btn btn-primary btn-group-vertical" style="width: 100%;" onclick="login();">Login</button>
                    </fieldset>
                </form>
            </div>
        </div>




        <?php
        require_once 'helpers/footerHelper.php';
        ?>

    </body>
</html>
