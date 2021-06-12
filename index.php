<?php
require './config/config.php';

$pathName = PAGE_PATH_NAME;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stocks</title>
        <link rel="./css/app.css"/>
        <link rel="./css/landing.css"/>
    </head>
    <body style="background-color: #E0F2FF;">
        <input type="hidden" id="pathName" name="pathName" value="<?= $pathName ?>"/>
        <div  >
            <div class="text-left">
                <h1>Stocks</h1>
            </div>
            <div class="text-cener" style="display: none;">
                <form id="loginForm" action="" class="form_div login-form round-form" onsubmit='return login();' autocomplete="off">
                    <input type='hidden' name='action' value='login'/>
                    <div class="form-group">
                        <input type="text" class="form-control required" name="name" id="name"  placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control required" name="password" placeholder="Password">
                    </div>
                    <div class="__btn_submit">
                        <button type="submit" class="_btn color" data-hover="LOG IN">LOG IN</button>
                    </div>
                    <div class="callout text-center form-response login-response" id="loginResponse"></div>
                </form>
            </div>
            <div style="text-align: center;">
                <h1>The easiest way to sell and buy stocks</h1>
                <span > Stock analysis and screening tool for investors in India</span>
                <div style="margin-top: 20px;">
                    <form oninput="search()" onsubmit="return GetAllDetails()" >
                        <input type="text" id="search-input"placeholder="Search" />
                    </form>
                </div>
                <div><ul class="names"></ul></div>
            </div>
        </div>
        <script src="js_lib/main/jquery.min.js"></script>
        <script src="js_lib/main/foundation.min.js"></script>
        <script src="js/landing.min.js"></script>
        <script src="js/stock_search.min.js"></script>
    </body>
</html>
