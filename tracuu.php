<!doctype html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký Tuyển sinh - Đại học Hạ Long</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<header>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <img src="dhhl.png" alt="logo dai hoc ha long" width="150" class="logo-img" />
    </div>
</header>
<body>

<h1>Tra cứu thông tin theo CCCD</h1>
    <form method="post" action="tracuu.php">
        <label for="cccd">Nhập CCCD:</label>
        <input type="text" id="cccd" name="cccd" required>
        <button type="submit">Tra cứu</button>
    </form>
    <?php

    require_once 'GSConnector.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $googleSheetsConnector = new GoogleSheetsConnector();
        // Xử lý form khi được gửi đi
        $cccdToSearch = isset($_POST['cccd']) ? $_POST['cccd'] : '';
        $spreadsheetId = '1YC8g0h26_kpR8wo1Ctlbdw9CBRJMwAo3JWCmIRAyCO4';

        // Lay du lieu tu Google Sheets
        $result =  $googleSheetsConnector->getSheetDataByCCCD($spreadsheetId, $cccdToSearch);

        if ($result) {
            // CCCD được tìm thấy, hiển thị dữ liệu
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>CCCD</th>';
            echo '<th>Đợt XT</th>';
            echo '<th>TT</th>';
            echo '<th>Họ và Tên</th>';
            echo '<th>Ngày Sinh</th>';
            echo '<th>Giới Tính</th>';
            echo '<th>Tỉnh</th>';
            echo '<th>Khu Vực</th>';
            echo '<th>Đối Tượng</th>';
            echo '<th>Tên Ngành Đào Tạo</th>';
            echo '<th>Mã Tổ Hợp</th>';
            echo '<th>ĐTB M1</th>';
            echo '<th>ĐTB M2</th>';
            echo '<th>ĐTB M3</th>';
            echo '<th>Tổng Điểm</th>';
            echo '<th>Điểm Ưu Tiên</th>';
            echo '<th>Điểm Xét Tuyển</th>';
            echo '<th>Ghi Chú</th>';
            echo '</tr>';
    
            foreach ($result as $row) {
                echo '<tr>';
                foreach ($row as $cell) {
                    echo '<td>' . $cell . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        } else {
            // CCCD không tìm thấy
            echo 'CCCD không tìm thấy.';
        }

        // if ($result) {
        //     echo '<h1>Thông tin theo CCCD</h1>';
        //     echo '<table border="1">';
    
        //     // Hiển thị tên cột
        //     foreach ($result[0] as $key => $value) {
        //         echo '<tr>';
        //         echo '<th>' . $key . '</th>';
        //         echo '<td>' . $value . '</td>';
        //         echo '</tr>';
        //     }
    
        //     echo '</table>';
        // } else {
        //     // CCCD không tìm thấy
        //     echo '<p>CCCD không tìm thấy.</p>';
        // }
    }
    ?>
</body>

</body>
</html>