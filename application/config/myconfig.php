<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
	
	// 媒体管理导入模板下载
$config ['webapp_media_path_tpl'] = './tpl/upload.xls';
// 广告位导入模板下载
$config ['webapp_placehold_path_tpl'] = './tpl/placehold_upload.xls';
// 导入media
$config ['webapp_media_maxsize'] = 10485760;
$config ['webapp_media_allowtype'] = 'xls';
// 导入placehold
$config ['webapp_placehold_maxsize'] = 10485760;
$config ['webapp_placehold_allowtype'] = 'xls';
// 导出media
// 图片相关配置
$config ['webapp_img_maxsize'] = 5632000;
$config ['webapp_img_allowtype'] = 'png,jpg,gif';
$config ['webapp_img_path'] = './photo';
// 配置文件相关配置
$config ['xml_maxsize'] = 5632000;
$config ['xml_type'] = 'xml';
$config ['xml_path'] = './cfg';
$config ['xml_tpl'] = './config.xml';
// 默认不登陆可访问的url
$config ['sw_pass_url'] = array (
		'User/login',
		'User/register',
		'User/getRefreshImg',
		'User/register_select',
		
);
$config ['sw_login_url'] = 'User/login';
$config ['dsp_no_auth_url'] = 'default/account/noauth';

$config ['ad_log_path'] = '/home/work/xuguilin/adlog';
