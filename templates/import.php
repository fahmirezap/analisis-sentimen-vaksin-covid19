<?php

$file_data = fopen('dataset.csv', 'r');
fgetcsv($file_data);
while($row = fgetcsv($file_data))
{
$data[] = array(
'Username'  => $row[0],
'Comment'  => $row[1],
'Label'  => $row[2],
);
}
echo json_encode($data);

?>