<?php
if (isset($_GET['image'])) {
    $image = $_GET['image'];

    // Kiểm tra tính hợp lệ của tệp, chỉ cho phép tải các tệp trong thư mục images
    $imagePath = '/images/' . $image;

    // Kiểm tra xem tệp có tồn tại không
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
        // Set header để tải xuống tệp
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($image) . '"');
        header('Content-Length: ' . filesize($_SERVER['DOCUMENT_ROOT'] . $imagePath));
        
        // Đọc tệp và gửi dữ liệu đến trình duyệt
        readfile($_SERVER['DOCUMENT_ROOT'] . $imagePath);
        exit;
    } else {
        echo 'Tệp không tồn tại!';
    }
} else {
    echo 'Không có tệp để tải!';
}

?>
