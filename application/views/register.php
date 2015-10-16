<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>
<style type="text/css">
.form-register {
	padding: 15px;
	margin: 0 auto;
}

.form-signin .form-signin-heading,.form-signin .checkbox {
	margin-bottom: 10px;
}

.form-signin .checkbox {
	font-weight: normal;
}

.form-signin .form-control {
	position: relative;
	height: auto;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 10px;
	font-size: 16px;
}

.form-signin .form-control:focus {
	z-index: 2;
}

.form-signin select {
	margin-bottom: -1px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$("#register").validate({
			rules : {
				bsselect : {
					required : true
				}
			}
		});
	});
	function agreementcheck() {
		if ($('#agreementS').prop('checked')||$('#agreementB').prop('checked')) {
			$("#confirmAgreement").removeAttr("disabled");
		} else {
			$("#confirmAgreement").attr("disabled", "disabled");
		}
	}
	
	function bsselectChange(){
		if ($('#bsselect').val()=='buyer') {
			$("#buyer").show();
			$("#supplier").hide();
			$("#buyerC").show();
			$("#supplierC").hide();
			
			$("#confirmAgreement").attr("disabled", "disabled");
			$("#agreementS").removeAttr("checked");
			$("#agreementB").removeAttr("checked");
		} else if($('#bsselect').val()=='supplier'){
			$("#buyer").hide();
			$("#supplier").show();
			$("#buyerC").hide();
			$("#supplierC").show();
			
			$("#confirmAgreement").attr("disabled", "disabled");
			$("#agreementS").removeAttr("checked");
			$("#agreementB").removeAttr("checked");
		}else{
			$("#buyer").hide();
			$("#supplier").hide();
			$("#buyerC").hide();
			$("#supplierC").hide();
			
			$("#confirmAgreement").attr("disabled", "disabled");
			$("#agreementS").removeAttr("checked");
			$("#agreementB").removeAttr("checked");
		}
	}
</script>

<ol class="breadcrumb">
	您现在的位置：
	<li><a href="/welcome">首页</a></li>
	<li class="active">用户注册</li>
</ol>
<div style="text-align: center;" role="alert"
	class="alert alert-warning">
	<font color="#FF0000">1、供购选择</font> <span
		class="glyphicon glyphicon-arrow-right"></span> 2、注册信息 <span
		class="glyphicon glyphicon-arrow-right"></span> 3、注册成功
</div>

<form action="/User/register_select" method="post" name="register"
	id="register" role="form" class="form-register" novalidate="novalidate">
	<h2 style="text-align: center;" class="form-signin-heading">供购选择</h2>
	<br>
	<div class="row">
		<span class="col-md-4"> </span> <select onchange="bsselectChange();"
			style="max-width: 330px; text-align: center;"
			class="form-control col-md-4" name="bsselect" id="bsselect">
			<option value="">请选择供购角色</option>
			<option value="supplier">供货商</option>
			<option value="buyer">购买商</option>
		</select> <span class="col-md-4"> </span>
	</div>
	<br>
	<div style="width: 100%; display: none;" class="alert alert-warning"
		id="supplier">
		<label><p>
				<br>
			</p>
			<p>
				<br>
			</p>
			<p style="margin-bottom: 0; text-align: center">
				<span style="font-size: 24px">花拍在线供货商服务协议</span>
			</p>
			<p style="margin-bottom: 0; text-align: center">
				<span style="font-size: 19px">&nbsp;</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">&nbsp;&nbsp;&nbsp; </span><span
					style="font-size: 19px">本协议由您与花拍在线经营者共同签订，本协议具有合同效力。花拍在线经营者是指法律认可的经营该平台网站的责任主体，有关花拍在线经营者的信息请查看平台首页底部公布的公司信息和证照信息。</span><span
					style="font-size: 19px">花拍在线网址：<a
					href="http://www.kifaonline.com.cn/">www.kifaonline.com.cn</a>。
				</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">一、 协议内容及签署</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1</span><span style="font-size: 19px">、本协议内容包括协议正文及所有花拍已经发布的或将来可能发布的各类规则。所有规则为本协议不可分割的组成部分，与协议正文具有同等法律效力。除另行明确声明外，任何花拍在线及其关联公司提供的服务（以下称为花拍在线服务）均受本协议约束。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2.</span><span style="font-size: 19px">您应当在使用花拍在线服务之前认真阅读全部协议内容。如您对协议有任何疑问的，应在提交注册前向花拍在线咨询，如果您不同意本协议的约定，您应立即停止注册程序或停止使用花拍在线。一旦您已提交注册，则花拍在线即视为您已阅读、理解并同意本协议的全部条款及内容，同时本协议随即生效并对您产生约束。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">3. </span><span
					style="font-size: 19px">花拍在线有权根据需要不时地制订、修改本协议的各类规则，并以网站公示的方式进行公告，不再单独通知您。变更后的协议和规则一经在网站公布后，立即自动生效。如您不同意相关变更，应当立即停止使用花拍在线服务。您继续使用花拍在线服务的，即表示您接受经修订的协议和规则。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">二、 注册&nbsp;</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1.</span><span style="font-size: 19px">注册者资格
				</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">您确认，在您完成注册程序或以其他花拍在线允许的方式实际使用花拍在线交易时，您应当是具备完全民事权利能力和完全民事行为能力的自然人、法人或其他组织。若您不具备前述主体资格，则您及您的监护人应承担因此而导致的一切后果，且花拍在线有权注销（永久冻结）您的花拍在线账户。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2.</span><span style="font-size: 19px">账户</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">在您签署本协议，完成会员注册程序，花拍在线会向您提供唯一编号的花拍在线账户（以下亦称账户）。</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">您可以通过该会员名、密码登录花拍在线。您设置的会员名不得侵犯或涉嫌侵犯他人合法权益。如您连续一年未使用您的会员名和密码登录花拍在线，或您设置的会员名涉嫌侵犯他人合法权益，花拍在线有权终止向您提供花拍在线服务，注销您的账户。账户注销后，相应的会员名将开放给任意用户注册登记使用。</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">您应对您的账户（会员名）和密码的维护及使用安全负责。如果发现任何人不当使用您的账户或有任何其他可能危及您的账户安全的情形时，您应当立即以有效方式通知花拍在线，要求花拍在线暂停相关服务。花拍在线对在采取行动前您已经产生的后果及损失不承担任何责任。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">3.</span><span style="font-size: 19px">会员</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">在您按照注册页面提示填写信息、阅读并同意本协议并完成全部注册程序后，您即成为花拍在线会员（亦称会员）。在注册时，您应当按照法律法规要求，结合注册页面的提示，真实、完整和准确地填制您的注册信息，以便花拍在线与您进行有效联系，否则，花拍在线有权向您发出询问或要求改正的通知，并有权取消您的注册资格，花拍在线对此不承担任何责任。</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">若您在花拍在线使用及交易过程中发生电子邮件地址、联系电话、联系地址等联系方式变更的，应及时以有效的方式与花拍在线联系进行变更，若因未及时变更导致花拍在线无法与您取得联系的，花拍在线服务过程中产生任何损失或增加费用的，应由您完全独自承担。</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">您在使用花拍在线服务过程中，所产生的应纳税赋，以及一切硬件、软件、服务及其它方面的费用，均由您独自承担。&nbsp;</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">4</span><span style="font-size: 19px">、会员资格年审费</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">花拍在线</span><span
					style="font-size: 19px">向注册会员收取相应的年费，标准为120元/年/户，年费由KIFA从会员帐户内扣除，被取消购买资格的会员不予退还已收取的会员资格年审费。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">三、花拍在线收费标准及结算方式</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1</span><span style="font-size: 19px">、花拍在线服务佣金按会员交易金额的5%收取。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2</span><span style="font-size: 19px">、运费根据品种、地域分布按花拍在线公布的标准收取。</span>
			</p>
			<p>
				<span style="font-size: 19px">3</span><span
					style="font-size: 19px; font-family: 宋体">、</span><span
					style="font-size: 19px; font-family: 宋体">交易结束后次日，花拍在线将扣除交易佣金及相关费用的交易款划至会员的银行账户上，遇节假日顺延。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">四、花拍在线交易模式</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1</span><span style="font-size: 19px">、您确认同意花拍在线推行的竞价和定价两种交易模式，并按花拍在线公布的</span><span
					style="font-size: 19px">《昆明国际花卉拍卖交易中心有限公司花拍在线供货商管理细则》、《昆明国际花卉拍卖交易中心有限公司花拍在线产品质量标准》</span><span
					style="font-size: 19px">参与交易。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2</span><span style="font-size: 19px">、您</span><span
					style="font-size: 19px">参加花拍在线所有货品均为自检。您应严格遵照《昆明国际花卉拍卖交易中心有限公司花拍在线产品质量标准》之各项要求对货品进行分级、包装和质量检验，不得有弄虚作假的行为。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">五、花拍在线服务使用规范</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1.</span><span style="font-size: 19px">在花拍在线使用过程中，您承诺遵守以下约定：</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">a)</span><span style="font-size: 19px">未经花拍在线书面同意，不得对花拍在线上的任何数据作商业性利用，或以复制、传播等任何方式使用花拍在线网站上展示的资料。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">b) </span><span
					style="font-size: 19px">不使用任何装置、软件或例行程序干预或试图干预花拍在线的正常运作或正在花拍在线上进行的任何交易、活动。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2.</span><span style="font-size: 19px">不论在何种情况下，花拍在线均不对由于信息网络正常的设备维护，信息网络连接故障，电脑、通讯或其他系统的故障，电力故障，罢工，劳动争议，暴乱，起义，骚乱，生产力或生产资料不足，火灾，洪水，风暴，爆炸，战争，政府行为，司法行政机关的命令或第三方的不作为而造成的不能服务或延迟服务承担责任。&nbsp;</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">六、协议终止</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1.</span><span style="font-size: 19px">您同意，花拍在线有权不经事先通知自行全权决定中止（终止）向您提供部分或全部花拍在线服务，暂时冻结或永久冻结（注销）您的账户，且无须为此向您或任何第三方承担任何责任。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2.</span><span style="font-size: 19px">出现以下情况时，花拍在线有权直接以注销账户的方式终止本协议:</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">a)&nbsp;</span><span
					style="font-size: 19px">花拍在线终止向您提供服务后，您涉嫌再一次直接或间接或以他人名义注册为花拍在线用户的；</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">b)&nbsp;</span><span
					style="font-size: 19px">您提供的电子邮箱不存在或无法接收电子邮件，且没有其他方式可以与您进行联系，或花拍在线以其它联系方式通知您更改电子邮件信息，而您在花拍在线通知后三个工作日内仍未更改为有效的电子邮箱的。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">c)&nbsp;</span><span
					style="font-size: 19px">您注册信息中的主要内容不真实或不准确或不及时或不完整。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">d)&nbsp;</span><span
					style="font-size: 19px">本协议（含规则）变更时，您明示并通知花拍在线不愿接受新的服务协议的；</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">e)&nbsp;</span><span
					style="font-size: 19px">其它花拍在线认为应当终止服务的情况。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">3.</span><span style="font-size: 19px">您有权向花拍在线要求注销您的账户，经花拍在线审核同意的，花拍在线注销（永久冻结）您的账户，届时，您与花拍在线基于本协议的合同关系即终止。您的账户被注销（永久冻结）后，花拍在线没有义务为您保留或向您披露您账户中的任何信息，也没有义务向您或第三方转发任何您未曾阅读或发送过的信息。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">4.</span><span style="font-size: 19px">您同意，您与花拍在线的合同关系终止后，花拍在线仍享有下列权利：</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">a) </span><span
					style="font-size: 19px">继续保存您的注册信息及您使用花拍在线服务期间的所有交易信息。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">b) </span><span
					style="font-size: 19px">您在使用花拍在线服务期间存在违法行为或违反本协议和/或规则的行为的，花拍在线仍可依据本协议向您主张权利。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">&nbsp;</span>
			</p>
			<p>
				<br>
			</p>
			<p>
				<br>
			</p></label>
	</div>
	<div style="width: 100%; display: none;" class="alert alert-warning"
		id="buyer">
		<label><p>
				<br>
			</p>
			<p style="margin-bottom: 0; text-align: center">
				<span style="font-size: 24px">花拍在线购买商服务协议</span>
			</p>
			<p style="margin-bottom: 0; text-align: center">
				<span style="font-size: 19px">&nbsp;</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">&nbsp;&nbsp;&nbsp; </span><span
					style="font-size: 19px">本协议由您与花拍在线经营者共同签订，本协议具有合同效力。花拍在线经营者是指法律认可的经营该平台网站的责任主体，有关花拍在线经营者的信息请查看平台首页底部公布的公司信息和证照信息。</span><span
					style="font-size: 19px">花拍在线网址：<a
					href="http://www.kifaonline.com.cn/">www.kifaonline.com.cn</a>。
				</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">一、 协议内容及签署</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1</span><span style="font-size: 19px">、本协议内容包括协议正文及所有花拍已经发布的或将来可能发布的各类规则。所有规则为本协议不可分割的组成部分，与协议正文具有同等法律效力。除另行明确声明外，任何花拍在线及其关联公司提供的服务（以下称为花拍在线服务）均受本协议约束。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2.</span><span style="font-size: 19px">您应当在使用花拍在线服务之前认真阅读全部协议内容。如您对协议有任何疑问的，应在提交注册前向花拍在线咨询，如果您不同意本协议的约定，您应立即停止注册程序或停止使用花拍在线。一旦您已提交注册，则花拍在线即视为您已阅读、理解并同意本协议的全部条款及内容，同时本协议随即生效并对您产生约束。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">3. </span><span
					style="font-size: 19px">花拍在线有权根据需要不时地制订、修改本协议的各类规则，并以网站公示的方式进行公告，不再单独通知您。变更后的协议和规则一经在网站公布后，立即自动生效。如您不同意相关变更，应当立即停止使用花拍在线服务。您继续使用花拍在线服务的，即表示您接受经修订的协议和规则。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">二、 注册&nbsp;</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1.</span><span style="font-size: 19px">注册者资格
				</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">您确认，在您完成注册程序或以其他花拍在线允许的方式实际使用花拍在线交易时，您应当是具备完全民事权利能力和完全民事行为能力的自然人、法人或其他组织。若您不具备前述主体资格，则您及您的监护人应承担因此而导致的一切后果，且花拍在线有权注销（永久冻结）您的花拍在线账户。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2.</span><span style="font-size: 19px">账户</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">在您签署本协议，完成会员注册程序，花拍在线会向您提供唯一编号的花拍在线账户（以下亦称账户）。</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">您可以通过该会员名、密码登录花拍在线。您设置的会员名不得侵犯或涉嫌侵犯他人合法权益。如您连续一年未使用您的会员名和密码登录花拍在线，或您设置的会员名涉嫌侵犯他人合法权益，花拍在线有权终止向您提供花拍在线服务，注销您的账户。账户注销后，相应的会员名将开放给任意用户注册登记使用。</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">您应对您的账户（会员名）和密码的维护及使用安全负责。如果发现任何人不当使用您的账户或有任何其他可能危及您的账户安全的情形时，您应当立即以有效方式通知花拍在线，要求花拍在线暂停相关服务。花拍在线对在采取行动前您已经产生的后果及损失不承担任何责任。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">3.</span><span style="font-size: 19px">会员</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">在您按照注册页面提示填写信息、阅读并同意本协议并完成全部注册程序后，您即成为花拍在线会员（亦称会员）。在注册时，您应当按照法律法规要求，结合注册页面的提示，真实、完整和准确地填制您的注册信息，以便花拍在线与您进行有效联系，否则，花拍在线有权向您发出询问或要求改正的通知，并有权取消您的注册资格，花拍在线对此不承担任何责任。</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">若您在花拍在线使用及交易过程中发生电子邮件地址、联系电话、联系地址、邮政编码等联系方式变更的，应及时以有效的方式与花拍在线联系进行变更，若因未及时变更导致花拍在线无法与您取得联系的，花拍在线服务过程中产生任何损失或增加费用的，应由您完全独自承担。</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">您在使用花拍在线服务过程中，所产生的应纳税赋，以及一切硬件、软件、服务及其它方面的费用，均由您独自承担。&nbsp;</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">4</span><span style="font-size: 19px">、会员资格年审费</span>
			</p>
			<p style="margin-bottom: 0; text-indent: 37px">
				<span style="font-size: 19px">花拍在线</span><span
					style="font-size: 19px">向注册会员收取相应的年费，标准为120元/年/户，年费由KIFA从会员帐户内扣除，被取消购买资格的会员不予退还已收取的会员资格年审费。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">三、花拍在线收费标准及结算方式</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1</span><span style="font-size: 19px">、会员在花拍在线的交易费用包括：会员交易货款、佣金以及依据会员需求产生的打包配套费、运费等费用；</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2</span><span style="font-size: 19px">、花拍在线服务佣金按交易金额的5%收取，打包配套费按产品适宜的包装纸箱规格按花拍在线公布的标准收取；</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">3</span><span style="font-size: 19px">、运费包括短运费及航空运费。目的地短途配送费由会员自行支付。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">4</span><span style="font-size: 19px">、花拍在线交易采取先充值后交易的模式。当您完成充值后，花拍在线系统将从您的帐户中预先扣除5%的佣金及30%的打包配套费和运费，</span><span
					style="font-size: 19px">交易结束后按实际发生金额结算。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">四、花拍在线交易模式</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1</span><span style="font-size: 19px">、您确认同意花拍在线推行的竞价和定价两种交易模式，并按花拍在线公布的《花拍在线交易细则》参与交易。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2</span><span style="font-size: 19px">、花拍在线采用的</span><span
					style="font-size: 19px">提货模式为现场提货模式和代理发货模式。 </span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">五、花拍在线服务使用规范&nbsp;</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1.</span><span style="font-size: 19px">在花拍在线使用过程中，您承诺遵守以下约定：</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">a)</span><span style="font-size: 19px">未经花拍在线书面同意，不得对花拍在线上的任何数据作商业性利用，或以复制、传播等任何方式使用花拍在线网站上展示的资料。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">b) </span><span
					style="font-size: 19px">不使用任何装置、软件或例行程序干预或试图干预花拍在线的正常运作或正在花拍在线上进行的任何交易、活动。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2.</span><span style="font-size: 19px">不论在何种情况下，花拍在线均不对由于信息网络正常的设备维护，信息网络连接故障，电脑、通讯或其他系统的故障，电力故障，罢工，劳动争议，暴乱，起义，骚乱，生产力或生产资料不足，火灾，洪水，风暴，爆炸，战争，政府行为，司法行政机关的命令或第三方的不作为而造成的不能服务或延迟服务承担责任。&nbsp;</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">六、协议终止</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">1.</span><span style="font-size: 19px">您同意，花拍在线有权不经事先通知自行全权决定中止（终止）向您提供部分或全部花拍在线服务，暂时冻结或永久冻结（注销）您的账户，且无须为此向您或任何第三方承担任何责任。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">2.</span><span style="font-size: 19px">出现以下情况时，花拍在线有权直接以注销账户的方式终止本协议:</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">a)&nbsp;</span><span
					style="font-size: 19px">花拍在线终止向您提供服务后，您涉嫌再一次直接或间接或以他人名义注册为花拍在线用户的；</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">b)&nbsp;</span><span
					style="font-size: 19px">您提供的电子邮箱不存在或无法接收电子邮件，且没有其他方式可以与您进行联系，或花拍在线以其它联系方式通知您更改电子邮件信息，而您在花拍在线通知后三个工作日内仍未更改为有效的电子邮箱的。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">c)&nbsp;</span><span
					style="font-size: 19px">您注册信息中的主要内容不真实或不准确或不及时或不完整。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">d)&nbsp;</span><span
					style="font-size: 19px">本协议（含规则）变更时，您明示并通知花拍在线不愿接受新的服务协议的；</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">e)&nbsp;</span><span
					style="font-size: 19px">其它花拍在线认为应当终止服务的情况。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">3.</span><span style="font-size: 19px">您有权向花拍在线要求注销您的账户，经花拍在线审核同意的，花拍在线注销（永久冻结）您的账户，届时，您与花拍在线基于本协议的合同关系即终止。您的账户被注销（永久冻结）后，花拍在线没有义务为您保留或向您披露您账户中的任何信息，也没有义务向您或第三方转发任何您未曾阅读或发送过的信息。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">4.</span><span style="font-size: 19px">您同意，您与花拍在线的合同关系终止后，花拍在线仍享有下列权利：</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">a) </span><span
					style="font-size: 19px">继续保存您的注册信息及您使用花拍在线服务期间的所有交易信息。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">b) </span><span
					style="font-size: 19px">您在使用花拍在线服务期间存在违法行为或违反本协议和/或规则的行为的，花拍在线仍可依据本协议向您主张权利。</span>
			</p>
			<p style="margin-bottom: 0">
				<span style="font-size: 19px">&nbsp;</span>
			</p>
			<p>
				<br>
			</p></label>
	</div>
	<div style="display: none;" id="supplierC" class="row">
		<span class="col-md-4"> </span> <label
			style="text-align: left; margin-left: 20px;"
			class="checkbox col-md-4"> <input type="checkbox"
			onclick="agreementcheck();" id="agreementS">同意《花拍在线供货商服务协议》
		</label> <span class="col-md-4"> </span>
	</div>
	<div style="display: none;" id="buyerC" class="row">
		<span class="col-md-4"> </span> <label
			style="text-align: left; margin-left: 20px;"
			class="checkbox col-md-4"> <input type="checkbox"
			onclick="agreementcheck();" id="agreementB">同意《花拍在线购买商服务协议》
		</label> <span class="col-md-4"> </span>
	</div>
	<br>
	<div class="row">
		<span class="col-md-4"> </span>
		<button style="max-width: 330px; text-align: center;"
			disabled="disabled" type="submit"
			class="btn btn-lg btn-primary btn-block col-md-4"
			id="confirmAgreement">
			<span class="glyphicon glyphicon-ok">确认</span>
		</button>
		<span class="col-md-4"> </span>
	</div>
</form>


</div>

<?php 
require_once("application/views/public/footer.php"); 
?>