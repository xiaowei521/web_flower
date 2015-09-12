<?php echo $header?>
    <style type="text/css">
        .form-signin { max-width: 390px; padding: 15px; margin: 0 auto; text-align:center;
        } .form-signin .form-signin-heading, .form-signin .checkbox { margin-bottom:
        10px; } .form-signin .checkbox { font-weight: normal; } .form-signin .form-control
        { position: relative; height: auto; -webkit-box-sizing: border-box; -moz-box-sizing:
        border-box; box-sizing: border-box; padding: 10px; font-size: 16px; } .form-signin
        .form-control:focus { z-index: 2; } .form-signin input[type="text"] { margin-bottom:
        -1px; border-bottom-right-radius: 0; border-bottom-left-radius: 0; } .form-signin
        input[type="password"] { margin-bottom: 10px; border-top-left-radius: 0;
        border-top-right-radius: 0; } .form-signin img { margin-bottom: 10px; height:44px;
        border-top-left-radius: 0; border-top-right-radius: 0; }
    </style>
    </head>
    
    <body>
        <?php echo $login_in?>
            <div class="container">
                <div class="logo">
                    <a href="/default">
                        <img src="/static/images/logo.png" style=" width: 200px; height: 45px; padding-left: 10px; margin-top: 18px;"
                        border="0">
                    </a>
                    <img src="/static/images/wx.jpg" style=" width: 80px; height: 80px; float:right;margin-top:6px;margin-right: 6px;"
                    border="0">
                    <!-- <div class="col-md-12">
                    <img class="img-responsive" alt="Responsive image"  src="/static/images/header.png"  usemap="#planetmap" >
                    <map name="planetmap">
                    <area href="" shape="rect" coords="0,0,230,98">
                    </map>
                    </div> -->
                </div>
                <ol class="breadcrumb">
                    您现在的位置：
                    <li>
                        <a href="/default">
                            首页
                        </a>
                    </li>
                    <li class="active">
                        登录
                    </li>
                </ol>
                <form class="form-signin" role="form" method="post" action="/User/login_check">
                    <h2 class="form-signin-heading">
                        花拍在线
                    </h2>
                    <br>
                    <input type="text" name="j_username" class="form-control" placeholder="账号"
                    required="" autofocus="">
                    <br>
                    <input type="password" name="j_password" class="form-control" placeholder="密码"
                    required="">
                    <br>
                    <div class="input-group">
                        <input type="text" name="captcha" class="form-control" style="width: 175px;margin-right: 5px;"
                        placeholder="效验码" required="">
                        <img src="/login/captcha.jpg">
                    </div>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        登录
                    </button>
                    <br>
                    <ul class="pager">
                        <li class="previous">
                            <a href="/forgetpassword">
                                忘记密码?
                            </a>
                        </li>
                        <li class="next">
                            <a href="/register">
                                注册新用户
                            </a>
                        </li>
                    </ul>
                </form>
                ​
            </div>
            <?php echo $footer?>