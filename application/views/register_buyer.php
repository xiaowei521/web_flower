<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>
<script type="text/javascript">
            var checksubmitflg = false;
            function checkSubmit() {
                if (checksubmitflg == true) {
                    return false;
                }
                checksubmitflg = true;
                return true;
            }
            document.ondblclick = function docondblclick() {
                //	window.event.returnvalue = false; 
            }
            document.onclick = function doconclick() {
                if (checksubmitflg) {
                    window.event.returnvalue = false;
                }
            }
            $(document).ready(function() {
                jQuery.validator.addMethod("chrnum",
                function(value, element) {
                    return this.optional(element) || (/^([a-zA-Z0-9]+)$/.test(value));
                },
                "只能为字母与数字");
                $("#buyer").validate({
                    rules: {
                        id: {
                            required: true,
                            chrnum: true,
                            minlength: 6,
                            maxlength: 20,
                            remote: {
                                url: "/User/isUnique",
                                //后台处理程序
                                async: false,
                                type: "get",
                                //数据发送方式
                                data: { //要传递的数据
                                    id: function() {
                                        return $("#id").val();
                                    },
                                    date: new Date()
                                },
                            }
                        },
                        buyName: {
                            required: true,
                            maxlength: 50
                        },
                        passWD: {
                            required: true,
                            minlength: 6,
                            maxlength: 20
                        },
                        // 				rePassWD : {
                        // 					required : true,
                        // 					equalTo : "#passWD"
                        // 				},
                        // 				buyPickPsw : {
                        // 					digits : true,
                        // 					minlength : 6,
                        // 					maxlength : 6
                        // 				},
                        // 				reBuyPickPsw : {
                        // 					digits : true,
                        // 					equalTo : "#buyPickPsw"
                        // 				},
                        // 				buyConName : {
                        // 					required : true,
                        // 					maxlength : 16
                        // 				},
                        // 				buyConPid : {
                        // 					required : true,
                        // 					minlength : 18,
                        // 					maxlength : 18
                        // 				},
                        // 				buyConTel : {
                        // 					required : true,
                        // 					maxlength : 30
                        // 				},
                        // 				buyMinInfo : {
                        // 					maxlength : 30
                        // 				},
                        // 				buyConQq : {
                        // 					maxlength : 20
                        // 				},
                        buyConEmail: {
                            required: true,
                            email: true,
                            maxlength: 30
                        },

                        // 				conProvince : {
                        // 					required : true
                        // 				},
                        // 				conCity : {
                        // 					required : true
                        // 				},
                        // 				buyAddress : {
                        // 					required : true,
                        // 					maxlength : 60
                        // 				},
                        // 				buyIsShip : {
                        // 					required : true,
                        // 					maxlength : 1
                        // 				},
                        // 				buyShipAddress : {
                        // 					maxlength : 80
                        // 				}
                    },
                    messages: {
                        id: {
                            remote: "账号已被占用",
                        }
                    },
                });
            });

            function buyIsShipChange() {
                if ($("#buyIsShip").val() == 'Y') {
                    $("#province").attr("required", "required");
                    $("#city").attr("required", "required");
                    $("#buyShipAddress").attr("required", "required");
                    $("#buyPickPsw").removeAttr("required");
                    $("#reBuyPickPsw").removeAttr("required");
                    $("#inputbuyPickPsw").html("提货密码");
                    $("#inputreBuyPickPsw").html("确认密码");

                } else {
                    $("#province").attr("required", "required");
                    $("#city").attr("required", "required");
                    $("#buyShipAddress").attr("required", "required");
                    $("#buyPickPsw").attr("required", "required");
                    $("#reBuyPickPsw").attr("required", "required");
                    $("#inputbuyPickPsw").html("提货密码*");
                    $("#inputreBuyPickPsw").html("确认密码*");

                }
            }

            function getCity() {
                $.getJSON("/User/getCity", {
                    province: $("#province").val(),
                    date: new Date()
                },
                function(result) {
                    if (result['success'] == 'Y') {
                        var city = document.getElementById("city");
                        city.length = 0;
                        var cityAreas = result["cityAreas"];
                        city.options.add(new Option("请选择", ""));
                        for (var i = 0; i < cityAreas.length; i++) {
                            city.options.add(new Option(cityAreas[i]["asName"], cityAreas[i]["asCode"]));
                        }
                    }
                });
            };
            function getConCity() {
                $.getJSON("/User/getConCity", {
                    province: $("#conProvince").val(),
                    date: new Date()
                },
                function(result) {
                    if (result[0]['success'] == 'Y') {
                        var conCity = document.getElementById("conCity");
                        conCity.length = 0;
                        var cityAreas = result[0]["cityAreas"];
                        conCity.options.add(new Option("请选择州市", ""));
                        for (var i = 0; i < cityAreas.length; i++) {
                            conCity.options.add(new Option(cityAreas[i]["asName"], cityAreas[i]["asCode"]));
                        }
                    }
                });
            };
        </script>
		<ol class="breadcrumb">
			您现在的位置：
			<li><a href="/welcome"> 首页 </a></li>
			<li class="active">用户注册</li>
		</ol>
		<div style="text-align: center;" role="alert"
			class="alert alert-warning">
			1、供购选择 <span class="glyphicon glyphicon-arrow-right"> </span> <font
				color="#FF0000"> 2、注册信息 </font> <span
				class="glyphicon glyphicon-arrow-right"> </span> 3、注册成功
		</div>
		<form method="post" action="/user/set_register_buyer" role="form"
			class="form-horizontal" name="buyer" id="buyer"
			novalidate="novalidate">
			<fieldset>
				<legend> 购买商基本信息（亲，如下信息涉及您的货品安全、资金安全，请认真填写） </legend>
				<div class="form-group">
					<label class="col-md-1 control-label" for="inputid"> 登录账号* </label>
					<div class="col-md-5">
						<input type="text" placeholder="6-20位数字或字母"
							onblur="this.value = this.value.toLowerCase();" value=""
							name="id" id="id" class="form-control">
					</div>
					<label class="col-md-1 control-label" for="inputid"> 花店名称* </label>
					<div class="col-md-5">
						<input type="text" placeholder="如无花店，请填写真实姓名" value=""
							name="buyName" id="buyName" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-1 control-label" for="inputpassWD"> 登录密码* </label>
					<div class="col-md-5">
						<input type="password" placeholder="6-20位" value="" name="passWD"
							id="passWD" class="form-control">
					</div>
					<label class="col-md-1 control-label" for="inputrePassWD"> 确认密码* </label>
					<div class="col-md-5">
						<input type="password" placeholder="6-20位" value=""
							name="rePassWD" id="rePassWD" class="form-control">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend> 联系人信息 </legend>
				<div class="form-group">
					<label class="col-md-1 control-label" for="inputbuyConName"> 姓名* </label>
					<div class="col-md-5">
						<input type="text" placeholder="" value="" name="buyConName"
							id="buyConName" class="form-control">
					</div>
					<label class="col-md-1 control-label" for="inputbuyConPid"> 身份证号* </label>
					<div class="col-md-5">
						<input type="text" placeholder="" value="" name="buyConPid"
							id="buyConPid" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-1 control-label" for="inputbuyConTel"> 电话* </label>
					<div class="col-md-5">
						<input type="text" placeholder="如实填写，方便及时联系" value=""
							name="buyConTel" id="buyConTel" class="form-control">
					</div>
					<label class="col-md-1 control-label" for="inputbuyConEmail">
						Email* </label>
					<div class="col-md-5">
						<input type="text" placeholder="如实填写，方便及时联系" value=""
							name="buyConEmail" id="buyConEmail" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-1 control-label" for="inputbuyConQq"> 微信 </label>
					<div class="col-md-5">
						<input type="text" placeholder="" value="" name="buyMinInfo"
							id="buyMinInfo" class="form-control">
					</div>
					<label class="col-md-1 control-label" for="inputbuyConQq"> QQ </label>
					<div class="col-md-5">
						<input type="text" placeholder="" value="" name="buyConQq"
							id="buyConQq" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-1 control-label" for="inputbuyAddress"> 花店地址*
					</label>
					<div class="col-md-2">
						<select onchange="getConCity();" class="form-control"
							id="conProvince" name="conProvince">
							<option value="">请选择省份</option>
							<option value="11">北京</option>
							<option value="12">天津</option>
							<option value="13">河北省</option>
							<option value="14">山西省</option>
							<option value="15">内蒙古自治区</option>
							<option value="21">辽宁省&#12288;</option>
							<option value="22">吉林省</option>
							<option value="23">黑龙江省</option>
							<option value="31">上海市</option>
							<option value="32">江苏省</option>
							<option value="33">浙江省</option>
							<option value="34">安徽省</option>
							<option value="35">福建省</option>
							<option value="36">江西省</option>
							<option value="37">山东省</option>
							<option value="41">河南省&#12288;</option>
							<option value="42">湖北省</option>
							<option value="43">湖南省</option>
							<option value="44">广东省</option>
							<option value="45">广西壮族自治区</option>
							<option value="46">海南省</option>
							<option value="50">重庆市&#12288;</option>
							<option value="51">四川省</option>
							<option value="52">贵州省</option>
							<option value="53">云南省</option>
							<option value="54">西藏自治区</option>
							<option value="61">陕西省</option>
							<option value="62">甘肃省</option>
							<option value="63">青海省</option>
							<option value="64">宁夏回族自治区</option>
							<option value="65">新疆维吾尔自治区&#12288;</option>
						</select>
					</div>
					<div class="col-md-3">
						<select class="form-control" id="conCity" name="conCity">
							<option value="">请选择州市</option>
						</select>
					</div>
					<div class="col-md-6">
						<input type="text" placeholder="详细地址" value="" name="buyAddress"
							id="buyAddress" class="form-control">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend> 代理发货信息（亲，您在斗南是否有自己的提货人和发货人） </legend>
				<div class="form-group">
					<label class="col-md-1 control-label" for="buyIsShip"> 是否代理* </label>
					<div class="col-md-11">
						<select onchange="buyIsShipChange()" class="form-control"
							id="buyIsShip" name="buyIsShip">
							<option value="">是否代理</option>
							<option value="N">不需要</option>
							<option value="Y">需要</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-1 control-label" id="inputAddress"
						for="inputAddress"> 发货地址* </label>
					<div class="col-md-2">
						<select onchange="getCity();" class="form-control " id="province"
							name="province">
							<option value="">请选择省份</option>
							<option value="11">北京</option>
							<option value="12">天津</option>
							<option value="13">河北省</option>
							<option value="14">山西省</option>
							<option value="15">内蒙古自治区</option>
							<option value="21">辽宁省&#12288;</option>
							<option value="23">黑龙江省</option>
							<option value="31">上海市</option>
							<option value="32">江苏省</option>
							<option value="33">浙江省</option>
							<option value="34">安徽省</option>
							<option value="35">福建省</option>
							<option value="36">江西省</option>
							<option value="37">山东省</option>
							<option value="41">河南省&#12288;</option>
							<option value="42">湖北省</option>
							<option value="43">湖南省</option>
							<option value="44">广东省</option>
							<option value="45">广西壮族自治区</option>
							<option value="50">重庆市&#12288;</option>
							<option value="51">四川省</option>
							<option value="52">贵州省</option>
							<option value="53">云南省</option>
							<option value="61">陕西省</option>
							<option value="62">甘肃省</option>
						</select>
					</div>
					<div class="col-md-3">
						<select class="form-control" id="city" name="city">
							<option value="">请选择州市</option>
						</select>
					</div>
					<div class="col-md-6">
						<input type="text" placeholder="详细地址" value=""
							name="buyShipAddress" id="buyShipAddress" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-1 control-label" id="inputbuyPickPsw"
						for="inputbuyPickPsw"> 提货密码 </label>
					<div class="col-md-5">
						<input type="password" placeholder="6位数字" value=""
							name="buyPickPsw" id="buyPickPsw" class="form-control">
					</div>
					<label class="col-md-1 control-label" id="inputreBuyPickPsw"
						for="inputreBuyPickPsw"> 确认密码 </label>
					<div class="col-md-5">
						<input type="password" placeholder="6位数字" value=""
							name="reBuyPickPsw" id="reBuyPickPsw" class="form-control">
					</div>
				</div>
			</fieldset>
			<span class="col-md-4"> </span>
			<button class="btn btn-primary btn-lg col-md-4" type="submit">
				<span class="glyphicon glyphicon-ok"> 保存 </span>
			</button>
			<span class="col-md-4"> </span>
		</form>
	</div>
            <?php
												require_once ("application/views/public/footer.php");
												?>