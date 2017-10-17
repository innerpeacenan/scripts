<?php
                $arr = [
                    'status' => 100,
                    'trans_task_id' => '14510',
                    'trans_event_id' => '2987131',
                    'driver_id' => '2003420',
                    'work_time' => "2017-09-06 10:00:00",
                    'car_num' => '1000124',
                ];


$response = ['values' => $arr];

echo json_encode($response);
