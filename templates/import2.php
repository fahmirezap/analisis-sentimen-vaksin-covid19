<?php

$file_data = fopen('preprocessing.csv', 'r');
fgetcsv($file_data);
while($row = fgetcsv($file_data))
{
$data[] = array(
'Case Folding'  => $row[0],
'Remove Number & Remove Punctuation'  => $row[1],
'Tokenizing'  => $row[2],
'Remove Stopword'  => $row[3],
'Stemming'  => $row[4],
'Normalisasi'  => $row[5]
);
}
echo json_encode($data);

?>