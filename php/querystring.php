<?php
$arr = [
                'destinationAddress' => '北京市朝阳区西门子大厦',
                'actualWeight' => '20.32',
                'consignee' => '南小宁',
                'consigneePhone' => '17310468484',
                'waybillCode' => '1000053398',
                # 配送时效,订单最晚配送时间
                'deliveryPrescription' => strtotime(date('Y-m-d')),
                'number' => 10,
];

echo http_build_query($arr);
