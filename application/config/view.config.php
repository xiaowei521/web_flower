<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
	


$config ['ad_log_path'] = '/home/work/xuguilin/adlog';

//花派百科
$config ['webCyclopediaContent'] = array(
		
		'list' => array(
			1 => array(
				'title' => '全部',
				'date'  => '2015-01-29',
				'href' =>'/webCyclopediaContent',
					
			),
			2 => array(
				'title' => '情人节，云南玫瑰还会任性吗...',
				'date'  => '2015-01-29',
				'href' =>  '/webCyclopediaContent/show/2',
					
			),
			3 => array(
				'title' => '亮瞎你的眼，几十个泰兰品种...',
				'date'  => '2015-01-30',
				'href' =>  '/webCyclopediaContent/show/3',
			),
		),
		'show' => array(
			1 => array(
					'time' => '2015-01-29 16:59:09.77',
					'body' => '<p>近期，包括电商、花店、批发商不断来电咨询今年“情人节”玫瑰的市场情况，特别是一听到昆明遭受寒流，大家更是提心吊胆，深恐再遇到2014年云南玫瑰大任性。虽然我们拥有十多年的交易的大数据，但天事难料，要对2015年情人节云南玫瑰市场做一个准确判断也非易事。</p> <img src="static/images/ban.gif" alt="test">',
			),
			
		),
	);

