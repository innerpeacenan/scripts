<?php
$json = '{"logistics_interface":"<request><driverName>\u962e\u767b\u5cf0<\/driverName><driverPhone>13871434663<\/driverPhone><licence>\u9102A91D9P<\/licence><loadOrderCode>01841710300035<\/loadOrderCode><positionInfos><positionInfo><lon>114.5709193250868<\/lon><lat>30.988109809027776<\/lat><direction>110.00<\/direction><velocity>0<\/velocity><precision>5.0<\/precision><coordinate>GCJ-02<\/coordinate><satelliteAmount>0<\/satelliteAmount><positionType>GPS<\/positionType><positionTime>1509428785130<\/positionTime><\/positionInfo><\/positionInfos><\/request>","data_digest":"MzNmOWFlMGU0NmJjNmZlNmRhYjA5ZTE1N2JlYzlmZWI=","partner_code":"YUNNIAOPEISONG-0001","from_code":"DMS_CUSTOM_APP","msg_type":"TMS_TRANS_POSITION_NOTIFY","msg_id":"01841710300035"}';
print_r(json_decode($json, true));
