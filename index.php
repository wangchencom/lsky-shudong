<?php

/**
 * User: WispX
 * Date: 2017/10/26 0026
 * Time: 9:02
 * Link: http://gitee.com/wispx
 */

//error_reporting(0);

define('LSKY', 'LSKY');

$action = isset($_POST['action']) ? $_POST['action'] : false;
$post_type = isset($_POST['type']) ? $_POST['type'] : 'index';
$get_type = isset($_GET['type']) ? $_GET['type'] : false;

require './vendor/Functions.php';

require './config.php';

require './vendor/Query.php';

$db = new Query('test');

// 设置数据表
$db->table('article');

switch ($post_type) {
    case 'index':
        $list = $db->order('id desc')
            //->limit('0,3')
            ->select();
        break;
    case 'real_name':
        $list = $db->where('is_anonymous = 0')
            ->order('id desc')
            //->limit('0,3')
            ->select();
        break;
    case 'anonymous':
        $list = $db->where('is_anonymous = 1')
            ->order('id desc')
            //->limit('0,3')
            ->select();
        break;
    default:
        break;
}

if($get_type) {
    if($get_type == 'send') {
        $ip = getIp();
        $time = time();
        $count = count($db->table('article')->where('send_time > ' . strtotime(date('Y-m-d', $time)))->select());
        if($count >= 3) {
            return json(2, '每天只能发表3个悄悄话哦！明天再来吧！');
        }
        $data = trimArray($_POST);
        // 处理数据  防注入
        foreach ($data as $item => &$value) {
            $data[$item] = addslashes($value);
            // 判断是否有字段为空，否则直接退出
            if(empty($data[$item])) {
                break;
                return json(0, '数据异常');
            }
        }
        if(mb_strlen($data['name']) <= 20 && mb_strlen($data['qq']) <= 10) {
            if(is_numeric($data['qq'])) {
                $data['ip'] = $ip;
                $data['send_time'] = $time;
                if($db->add($data, 'article')) {
                    return json(1, '发布成功');
                }
                return json(0, '发布失败');
            }
            return json(0, 'QQ格式不正确');
        }
        return json(0, '数据异常');
    }
}

require "./view/". ($action ? "page/{$action}" : "index") . ".php";