<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conf = [
    'groupTitle' => '订单',
    'group' => 'order',
    'title' => '新增订单',
    //保留,不在页面显示,只为兼容
    'name' => '新增订单',
    'type' => 'POST',
    'url' => '/api/v1/order/insert',
    'parameter' =>
        [
            'fields' =>
                [
                    'Parameter' =>
                        [
                                [
                                    'group' => 'Parameter',
                                    'type' => 'Number',
                                    'optional' => false,
                                    'field' => 'origin_id',
                                    'description' => <<<'YUN_NIAO_DESCRIPTION'
<p>订单第三方id,必须保证在某一个用户下面是唯一的</p>
<p>最小长度: 1, 最大长度: 64</p>
YUN_NIAO_DESCRIPTION
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => false,
                                    'field' => 'customer_name',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>客户名称</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => false,
                                    'field' => 'dp_contact_name',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>收货人的名称</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'Number',
                                    'optional' => false,
                                    'field' => 'dp_contact_mobile',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>收货人的手机号<br>最小长度:5, 最大长度:32, 如13529149243</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => true,
                                    'field' => 'dp_backup_mobile',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>收货人的备用手机号 <br> 最小长度:5, 最大长度:32, 如 13529149244</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => true,
                                    'field' => 'province',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>省或直辖市, 如:北京市</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => true,
                                    'field' => 'city',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>如北京市</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => true,
                                    'field' => 'district',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>区或县信息, 如 朝阳区</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => false,
                                    'field' => 'dp_address',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>收货人的配送地址, 最小长度:1, 最大长度:128, 如: 北京市海淀区新中关购物中心 </p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => true,
                                    'field' => 'coord_type',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>代表客户系统使用的地图服务商。1是百度，2是高德(火星坐标系)；空或者0默认是百度坐标系。</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => true,
                                    'field' => 'dp_longitude',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>收货人配送地址对应的经度  收货人配送地址对应的经度</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => true,
                                    'field' => 'dp_latitude',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>收货人配送地址对应的纬度。示例: 23455.123（１到３位的整数，或者１到３位的整数加０到６位的小数）</p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                                [
                                    'group' => 'Parameter',
                                    'type' => 'String',
                                    'optional' => true,
                                    'field' => 'order_create_time',
                                    'description' => <<<'YUN_NIAO_DESCRITON'
<p>订单的创建时间，为unix时间戳,</br>如: 1391367781 </p>
YUN_NIAO_DESCRITON
                                    ,
                                ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'order_create_time',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>订单的创建时间，为unix时间戳,</br>如: 1391367781 </p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'order_send_day',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>订单的配送天，格式为unix时间戳, </br>最小值: 今日凌晨时间戳, 最大值: 31天后凌晨时间戳 </br> 如:1442630000
 </p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'dp_rta_start',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>订单配送的开始时间，为unix时间戳 </p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'dp_rta_end',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>订单配送的结束时间，为unix时间戳</p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'is_important',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>是否为重要用户， 0:非重要客户 1:重要客户 默认为0</p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'is_abnormal',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>订单配送货物是否为异形货物  0:非异形货  1:异形货  默认为0  说明：只能填“1”或“0”，或者不填</p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'is_abnormal',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>订单配送货物是否为异形货物  0:非异形货  1:异形货  默认为0  说明：只能填“1”或“0”，或者不填</p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'is_cod',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>是否为代收款，0：不需要代收款 1：需要代收款  默认为0</p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'callback_url',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>客户提供的接收订单信息回传的接口地址。如: http://baidu.com</p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'iti_callback_url ',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>客户提供的派车单及司机信息回传的接口地址.如: http://baidu.com</p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            [
                                'group' => 'Parameter',
                                'type' => 'String',
                                'optional' => true,
                                'field' => 'iti_callback_url ',
                                'description' => <<<'YUN_NIAO_DESCRITON'
<p>客户提供的派车单及司机信息回传的接口地址.如: http://baidu.com</p>
YUN_NIAO_DESCRITON
                                ,
                            ],
                            //@TODO 是个体力活

                        ],
                ],
        ],
    'success' =>
        [
            'fields' =>
                [
                    'Success 200' =>
                        [
                            0 =>
                                [
                                    'group' => 'Success 200',
                                    'type' => 'Object',
                                    'optional' => false,
                                    'field' => 'info',
                                    'description' => <<<'DESCRIPTION'
<p>bu用户信息</p>
DESCRIPTION
                                    ,
                                ],
                        ],
                ],
            'examples' =>
                [
                    0 =>
                        [
                            'title' => '{',
                            'content' => <<<'REQUEST_EXAMPLE_CONTENT'
{
  "code": 0,
  "msg": "成功",
  "info": {
    "buid": 1000081,
    "name": "北京",
    "children_ids": [
      1000129,
      1000125,
      1000138,
      1000206
    ],
    "assistants": [
      "刘诗杨-客服助理-北京1",
      "刘建闯拓展"
    ],
    "members": [
      "刘诗杨-客服经理-北京1",
      "刘诗杨-客服经理-北京2",
      "刘诗杨-客服助理-北京1",
      "刘诗杨-客服经理-天津1",
      "wangxue6",
      "李雅（客服经理）",
      "刘建闯拓展"
    ],
    "created_at": "2015-06-15 15:26:54"
  }
}
REQUEST_EXAMPLE_CONTENT
                            ,

                            'type' => 'json',
                        ],
                ],
        ],
    'version' => '0.0.0',
    'filename' => '',
];

$str = json_encode($conf, JSON_UNESCAPED_UNICODE);

try {
    $file = '/home/wwwroot/scripts/php/jsons/demo.json';
    $handler = fopen($file, 'w+');
    fwrite($handler, $str);
    fclose($handler);
    $str = file_get_contents('/home/wwwroot/scripts/php/jsons/demo.json');
    $result = json_decode($str, true);
    if(is_null($result)){
        throw new \Exception('写入json文件发生错误');
    }
} catch (\Throwable $e) {
    echo $e->getMessage();
    exit(1);
}


