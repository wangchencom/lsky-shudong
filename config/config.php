<?php defined('LSKY') or die('Illegal access!');

return [

    // 表情
    'face'          => [
        '二哈', '柴犬', '柴犬不高兴', '柴犬再见', '柴犬哭', '柴犬舔舌头', '柴犬耍帅', '柴犬大嘴', '呵呵', '哈哈', '吐舌', '太开心',
        '笑眼', '花心', '小乖', '乖', '捂嘴笑', '滑稽', '你懂的', '不高兴', '怒', '汗', '黑线', '泪', '真棒', '喷', '惊哭', '阴险',
        '鄙视', '酷', '啊', '狂汗', 'what', '疑问', '酸爽', '呀咩爹', '委屈', '惊讶', '睡觉', '笑尿', '挖鼻', '吐', '犀利', '小红脸',
        '懒的理', '勉强', '爱心', '心碎', '玫瑰', '礼物', '彩虹', '太阳', '星星月亮', '钱币', '茶杯', '蛋糕', '大拇指', '胜利', 'haha',
        'OK', '沙发', '手纸', '香蕉', '便便', '药丸', '红领巾', '蜡烛', '音乐', '灯泡',
    ],

    'blacklist'     => array_values(get_blacklist()),

    'administrator' => [
        'username'  => 'admin',
        'password'  => 'admin'
    ],

];