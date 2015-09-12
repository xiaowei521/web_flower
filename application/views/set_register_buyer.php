<?php echo $header?>
    </head>
    
    <body>
        <?php echo $login_in?>
            <div class="container">
                <div class="logo">
                    <a href="/default">
                        <img src="/static/images/logo.png" style=" width: 200px; height: 45px; padding-left: 10px; margin-top: 18px;"
                        border="0" />
                    </a>
                    <img src="/static/images/wx.jpg" style=" width: 80px; height: 80px; float:right;margin-top:6px;margin-right: 6px;"
                    border="0" />
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
                        用户注册
                    </li>
                </ol>
                <div class="alert alert-warning" role="alert" style="text-align: center;">
                    1、供购选择
                    <span class="glyphicon glyphicon-arrow-right">
                    </span>
                    2、注册信息
                    <span class="glyphicon glyphicon-arrow-right">
                    </span>
                    <font color="#FF0000">
                        3、注册成功
                    </font>
                </div>
                <br>
                <div class="alert alert-success" role="alert" style="text-align: center;">
                    <font color="red" size="+3">
                        恭喜您！注册成功，请您进入注册邮箱
                        <?php echo $returnData['buyConEmail']?>
                            ，激活用户...
                            <br>
                            <label id="message">
                                <?php echo  $returnData['user_id'] ?>
                            </label>
                    </font>
                </div>
            </div>
            <?php echo $footer?>