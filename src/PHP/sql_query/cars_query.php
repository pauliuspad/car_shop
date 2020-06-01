

<?php

$sql = " SELECT cars.number as car_number, cars.year_made as car_year, cars.model as car_model, current_segment.name as current_segment_name , current_user_name.name as current_user_name, statuses.name as current_status, previous_user.name as last_user_name, previous_segment.name as last_segment_name
FROM cars
LEFT JOIN car_management current_car_management
ON cars.id = current_car_management.cars_id AND CURRENT_DATE() <= current_car_management.date_to
LEFT JOIN users current_user_name
ON current_car_management.user_id = current_user_name.id
LEFT JOIN segments current_segment
ON current_car_management.segments_id = current_segment.id
LEFT JOIN car_status 
ON cars.id = car_status.cars_id  AND CURRENT_DATE() <= car_status.date_to
LEFT JOIN statuses 
ON car_status.status_id = statuses.id
LEFT JOIN car_management previous_car_management
ON cars.id = previous_car_management.cars_id AND CURRENT_DATE() > previous_car_management.date_to
LEFT JOIN users previous_user
ON previous_car_management.user_id = previous_user.id
LEFT JOIN segments previous_segment
ON previous_car_management.segments_id = previous_segment.id
";

?>