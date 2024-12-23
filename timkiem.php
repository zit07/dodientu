<?php
require("header.php");
// Nếu người dùng submit form thì thực hiện
if (isset($_REQUEST['ok'])) 
{
    // Gán hàm addslashes để chống sql injection
    $search = $_GET['search'];

    // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
    if (empty($search)) {
        echo "Yeu cau nhap du lieu vao o trong";
    } 
    else
    {
        // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
        $query = "SELECT * FROM sanpham WHERE TenSanPham like '%$search%'";

        // Thực thi câu truy vấn
        $sql = mysqli_query($connection, $query);
        // echo$query;
        // Đếm số đong trả về trong sql.
        if ($sql) {
            // Truy vấn thành công, lấy số dòng
            $num = mysqli_num_rows($sql);
        } else {
            // Truy vấn thất bại, đặt num = 0
            $num = 0;
        }
        echo "<div class='mainmenu'><p><h2 style='font-weight: normal;'>Có <b>$num </b>kết quả trả về với từ khóa $search</h2></p>";
        // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
        if ($num > 0 && $search != "") 
        {
            // Dùng $num để đếm số dòng trả về.
        
            // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
            while($row = mysqli_fetch_array($sql))
            {
                $id = $row['MaSanPham'];
                $name = $row['TenSanPham'];
                $price = $row['GiaSanPham'];
                $hinh = $row['HinhURL'];
                echo'<div class="list2"><a href="/dodientu/SanPham/index.php?mod=sanpham&id='.$id.'">
                <img src="/dodientu/images/'.$hinh.'" width="215px" height="200px"></a>';
                echo '<a id="tensp" href="/dodientu/SanPham/index.php?mod=sanpham&id='.$id.'"><p>'.$name.'</p></a>';
                echo'<span>';
                echo number_format($price, 0).' đ<br>';
                echo '</span></div>';
            }
            echo'</div>';
        } 
        else {
            echo "Khong tim thay ket qua!";
        }
    }
}

?>