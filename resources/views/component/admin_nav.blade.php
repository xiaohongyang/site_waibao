<?php
use Illuminate\Http\Request;
$currentFullUrl = \Request::getPathInfo() . (\Request::getQueryString() ?  ('?' . \Request::getQueryString() )  : '');

$articleTypeActive = '';


$routeName = Route::currentRouteName(); 

if (in_array($routeName, [
	'admin.articleType',
	'admin.articleTypeCreate',
])) {
	$articleTypeActive = 'active';
}

function setActiveNavClass($navArr, $routeValue, $className = 'active') {
	foreach ($navArr as $key_01 => $lavel_01) {
		$link_01 = key_exists('link', $lavel_01) ? $lavel_01['link'] : '';
		$navArr[$key_01]['activeClass'] = '';
		if ($link_01 == $routeValue) {
			$navArr[$key_01]['activeClass'] = $className;
			break;
		}
		if (key_exists('children', $lavel_01) && count($lavel_01['children'])) {
			foreach ($lavel_01['children'] as $key_02 => $lavel_02) {
				$link_02 = key_exists('link', $lavel_02) ? $lavel_02['link'] : '';
				if (strpos($link_02, $routeValue) !== false) {
					$navArr[$key_01]['activeClass'] = $className;
					$navArr[$key_01]['children'][$key_02]['activeClass'] = $className;
					break 2;
				}
			}
		}
	}
	return $navArr;
}

$navArr = [
	[
		'name' => '网站配置',
		'link' => route('admin.config.edit'),
	],
	[
		'name' => '类别管理',
		'children' => [
			[
				'name' => '类别列表',
				'link' => route('admin.articleType'),
			], [
				'name' => '类别创建',
				'link' => route('admin.articleTypeCreate',['top_id'=>1]),
			],
		],
	], [
		'name' => '文章管理',
		'children' => [
			[
				'name' => '文章列表',
				'link' => route('admin.article'),
			], [
				'name' => '文章创建',
				'link' => route('admin.article.create'),
			],
		],
	], [
		'name' => '留言管理',
		'children' => [
			[
				'name' => '留言列表',
				'link' => route('admin.guestbook.index'),
			],
		],
	],[
		'name' => '满意度调查',
		'children' => [
			[
				'name' => '调查列表',
				'link' => route('admin.survey.index',['type_id'=>2]),
			],
		],
	],
];

$navArr = setActiveNavClass($navArr, $currentFullUrl);
?>

<nav class="xhy-nav bs-docs-sidebar hidden-print hidden-xs hidden-sm affix">
    <ul class="nav bs-docs-sidenav">

        @if(is_array($navArr) && count($navArr))
            @foreach($navArr as $level_01)
                <li class="first_level_nav {{key_exists('activeClass', $level_01) ? $level_01['activeClass'] : ''}}">
                    <a href="{{key_exists('link',$level_01) ? $level_01['link'] : '#overview'}}">{{$level_01['name']}}</a>
                    <ul class="nav">
                        @if(key_exists('children', $level_01) && count($level_01['children']))
                            @foreach($level_01['children'] as $level_02)
                                <li class="{{key_exists('activeClass', $level_02) ? $level_02['activeClass'] : ''}}"><a href="{{$level_02['link']}}">{{$level_02['name']}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            @endforeach
        @endif

    </ul>

</nav>