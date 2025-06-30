<?php
$servername = "localhost";
$username = "gaxlseqv_ryzen";
$password = "wLY4KQjBZCPxrfVKkqqP"; // mặc định không có mật khẩu
$dbname = "gaxlseqv_ryzen"; // tên database bạn tạo ở bước 2

// Kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: center;
        }

        th {
            background-color: #f2a654;
        }
    </style>
</head>

<body>
    <h2>Danh sách sinh viên</h2>
    <table>
        <tr>
            <th>MSSV</th>
            <th>Tên Sinh Viên</th>
        </tr>
        <?php
        $sql = "SELECT MSSV, TenSV FROM ryzen";
        $result = $conn->query($sql);

        if (!$result) {
            die("Lỗi truy vấn SQL: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // Hiển thị từng dòng
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["MSSV"] . "</td><td>" . $row["TenSV"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Không có dữ liệu</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>