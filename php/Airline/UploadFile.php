<?php $check = 1;
$image = $_FILES['AirlineImage']['name'];
$target_file = "../../icon/" . ($image);
$allowed_image_extension = array("png", "jpg", "jpeg", "gif");
$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
if (!file_exists($_FILES['AirlineImage']['tmp_name'])) {
    $response = "Hãy chọn ảnh để tải lên";
    $check = 0;
} else if ($_FILES['AirlineImage']['size'] >= 500000) {
    $type = "error";
    $response = 'Ảnh quá lớn, vui lòng chọn lại';
    $check = 0;
} else if (!in_array($file_extension, $allowed_image_extension)) {
    $type = "error";
    $response = 'Tập tin sai định dạng';
    $check = 0;
}
if ($check == 1) {
    $temp_name = $_FILES['AirlineImage']['tmp_name'];
    move_uploaded_file($temp_name, $target_file);
}
die("AirlineImage=" . $_FILES['AirlineImage']['name']);
