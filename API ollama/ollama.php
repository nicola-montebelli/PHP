<?php 
$ch = curl_init("http://localhost:11434/api/generate");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: appliction/json'
));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
    'model' => 'gemma3:1b',
    'prompt' => $_POST['prompt'],
    'stream' => false
)));

$response = curl_exec($ch);
curl_close($ch);

?>


