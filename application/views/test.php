<?php

function uploadFile($filePath)
{
    $url = 'https://storage-api-ten.vercel.app/files';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); // Set timeout to 60 seconds


    $data = $_FILES['multipartFile'];
    $postData = array(
        "file" => new CURLFile($data['tmp_name'], $data['type'], $data['name'])
    );

    curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);

    $response = curl_exec($ch);

    if ($response === false) {
        return 'Error: ' . curl_error($ch);
    } else {
        return $response;
    }

    curl_close($ch);

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $tmpFilePath = $_FILES['file']['tmp_name'];
    $response = uploadFile($tmpFilePath);
    echo $response;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form action="/FYP/home/test" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" accept="image/*" required>
        <button type="submit">Upload Image</button>
    </form>
</body>
</html>