<?php
/* Customise the paths here: */

$file_path = dirname(__FILE__) . '/user_upload';  // full filesystem path
$web_path = '/user_upload';                // path from root of website


/* Supernoob-style PHP file upload begins here: */
$uploadedFiles = array();
if (is_array($_FILES) && count($_FILES)) {
    $image_folder_writable = is_writable($file_path);
    foreach ($_FILES as $file) {
        if ($image_folder_writable && (int)$file['size'] > 0 && $file['error'] == '0') {
            $filename = $file['name'];
            $filetype = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = (string)md5($filename . time() . (string)rand()) . "." . $filetype;
            if ($filetype == "php") $filename .= '.txt'; // diffuse PHP files
            $target = $file_path . DIRECTORY_SEPARATOR . $filename;
            if (file_exists($target)) {
                $filename = time() . '-' . $filename;
                $target = $file_path . DIRECTORY_SEPARATOR . $filename;
            }
            if (move_uploaded_file($file['tmp_name'], $target)) {
                //echo $web_path . '/' . $filename;
                $uploadedFiles[] = $web_path . '/' . $filename;
                //exit;
            }
        }
    }
    echo json_encode($uploadedFiles);
    exit;
}
echo 'FAIL';
?>
