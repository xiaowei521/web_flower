
    <script type="text/javascript">
        $(document).ready(function() {
            jQuery.validator.addMethod("chrnum",
            function(value, element) {
                return this.optional(element) || (/^([a-zA-Z0-9]+)$/.test(value));
            },
            "只能为字母与数字");
            $("#supplier").validate({
                rules: {
                    id: {
                        required: true,
                        chrnum: true,
                        minlength: 6,
                        maxlength: 20,
                        remote: {
                            url: "/User/isUnique",
                            //后台处理程序
                            type: "get",
                            //数据发送方式
                            data: { //要传递的数据
                                id: function() {
                                    return $("#id").val();
                                },
                                date: new Date()
                            }
                        }
                    },
                    passWD: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    rePassWD: {
                        required: true,
                        equalTo: "#passWD"
                    },
                    supConName: {
                        required: true,
                        maxlength: 16
                    },
                    supConPid: {
                        required: true,
                        minlength: 18,
                        maxlength: 18
                    },
                    supConTel: {
                        required: true,
                        maxlength: 30
                    },
                    supConMobile: {
                        maxlength: 30
                    },
                    supMinInfo: {
                        maxlength: 30
                    },
                    supConQq: {
                        maxlength: 20
                    },
                    supConEmail: {
                        required: true,
                        email: true,
                        maxlength: 30
                    },
                    supAddress: {
                        required: true,
                        maxlength: 60
                    },
                    supZip: {
                        digits: true,
                        maxlength: 6
                    },
                    supBrand: {
                        required: true,
                        maxlength: 20
                    },
                    supKind: {
                        required: true,
                        maxlength: 1
                    },
                    supBankAccount: {
                        required: true,
                        maxlength: 30
                    },
                    supBankCode: {
                        required: true,
                        maxlength: 20
                    },
                    supBankAccName: {
                        required: true,
                        maxlength: 60
                    }
                },
                messages: {
                    id: {
                        remote: "账号已被占用"
                    }
                }
            });
        });
    </script>
    </head>
    
    <body>

            <div class="container">
                <div class="logo">
                    <a href="/welcome">
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
                        <a href="/welcome">
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
                    <font color="#FF0000">
                        2、注册信息
                    </font>
                    <span class="glyphicon glyphicon-arrow-right">
                    </span>
                    3、注册成功
                </div>
                <form id="supplier" name="supplier" class="form-horizontal" role="form"
                action="/register/supplierRegister" method="post">
                    <fieldset>
                        <legend>
                            供货商基本信息
                        </legend>
                        <div class="form-group">
                            <label for="inputid" class="col-md-1 control-label">
                                登录账号*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="id" name="id" value="" onblur="this.value = this.value.toLowerCase();"
                                placeholder="6-20位数字或字母">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputpassWD" class="col-md-1 control-label">
                                登录密码*
                            </label>
                            <div class="col-md-5">
                                <input type="password" class="form-control" id="passWD" name="passWD"
                                value="" placeholder="6-20位">
                            </div>
                            <label for="inputrePassWD" class="col-md-1 control-label">
                                确认密码*
                            </label>
                            <div class="col-md-5">
                                <input type="password" class="form-control" id="rePassWD" name="rePassWD"
                                value="" placeholder="6-20位">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>
                            联系人信息
                        </legend>
                        <div class="form-group">
                            <label for="inputsupConName" class="col-md-1 control-label">
                                姓名*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supConName" name="supConName"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupConPid" class="col-md-1 control-label">
                                身份证号*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supConPid" name="supConPid"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupConTel" class="col-md-1 control-label">
                                电话*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supConTel" name="supConTel"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupConMobile" class="col-md-1 control-label">
                                备用电话
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supConMobile" name="supConMobile"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupConEmail" class="col-md-1 control-label">
                                Email*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supConEmail" name="supConEmail"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupConEmail" class="col-md-1 control-label">
                                微信
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supMinInfo" name="supMinInfo"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupConQq" class="col-md-1 control-label">
                                QQ
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supConQq" name="supConQq"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupAddress" class="col-md-1 control-label">
                                地址*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supAddress" name="supAddress"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupZip" class="col-md-1 control-label">
                                邮编
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supZip" name="supZip" value=""
                                placeholder="">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>
                            供货信息
                        </legend>
                        <div class="form-group">
                            <label for="inputsupBrand" class="col-md-1 control-label">
                                供货品牌*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supBrand" name="supBrand"
                                value="" placeholder="4-20位数字或字母">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupKind" class="col-md-1 control-label">
                                性质*
                            </label>
                            <div class="col-md-11">
                                <select name="supKind" id="supKind" class="form-control">
                                    <option value="">
                                        请选择供货商性质
                                    </option>
                                    <option value='G'>
                                        公司
                                    </option>
                                    <option value='J'>
                                        基地
                                    </option>
                                    <option value='L'>
                                        联合体
                                    </option>
                                    <option value='C'>
                                        采后处理中心
                                    </option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>
                            划账帐号
                        </legend>
                        <div class="form-group">
                            <label for="inputsupBankCode" class="col-md-1 control-label">
                                开户行*
                            </label>
                            <div class="col-md-11">
                                <select name="supBankCode" id="supBankCode" class="form-control">
                                    <option value='农行'>
                                        农行
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupBankAccName" class="col-md-1 control-label">
                                账户名*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supBankAccName" name="supBankAccName"
                                value="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsupBankAccount" class="col-md-1 control-label">
                                帐号*
                            </label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="supBankAccount" name="supBankAccount"
                                value="" placeholder="">
                            </div>
                        </div>
                    </fieldset>
                    <span class="col-md-4">
                    </span>
                    <button type="submit" class="btn btn-primary btn-lg col-md-4">
                        <span class="glyphicon glyphicon-ok">
                            保存
                        </span>
                    </button>
                    <span class="col-md-4">
                    </span>
                </form>
            </div>
