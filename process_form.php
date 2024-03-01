<?php

require_once 'GSConnector.php';

// Replace 'your-spreadsheet-id' with the actual ID of your Google Sheet
$spreadsheetId = '1YC8g0h26_kpR8wo1Ctlbdw9CBRJMwAo3JWCmIRAyCO4';
$range = 'Data';
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Collect form data
$data = [
    date('H:i:s d/m/Y'),
    $_POST['idcard'],
    $_POST['fname'],
    $_POST['sex'],
    $_POST['birth'],
    $_POST['phone'],
    $_POST['email'],
    $_POST['tinhThanhPho'],
    $_POST['quanHuyen'],
    $_POST['phuongXa'],
    $_POST['sonha'],
    $_POST['tinhthpt'],
    $_POST['huyenthpt'],
    $_POST['truongthpt'],
    $_POST['kv'],
    $_POST['dtut'],
    $_POST['hl12'],
    $_POST['hk12'],
    $_POST['he'],
    $_POST['pt'],
    $_POST['nganh'],
    $_POST['mth'],
    $_POST['mon1'],
    $_POST['mon2'],
    $_POST['mon3'],
    $_POST['ghichu'],
    $_POST['hfile'],
    $_POST['hfile1'],
    $_POST['hfile2'],
    $_POST['hfile3'],
    $_POST['hfile4'],
    $_POST['hfile5']
    // Add more data fields as needed
];

// Thời gian đăng ký
// CCCD/CMT
// Họ và tên
// Giới tính
// Ngày sinh
// Điện thoại
// Email
// Tỉnh cư trú
// Huyện cư trú
// Xã cư trú
// Số nhà
// Tỉnh thpt
// Huyện thpt
// Trường thpt
// Khu vực
// Đối tượng ưu tiên
// Học lực lớp 12
// Hạnh kiểm lớp 12
// Hệ đào tạo
// Phương thức xét tuyển
// Ngành xét tuyển
// Tổ hợp xét tuyển
// Môn 1
// Môn 2
// Môn 3
// Ghi chú
// Lệ phí xét tuyển
// Link1
// Link2
// Link3
// Link4
// Link5

// Create an instance of GoogleSheetsConnector
$googleSheetsConnector = new GoogleSheetsConnector();

// Append data to Google Sheets
$service = new Google_Service_Sheets($googleSheetsConnector->getClient());
$values = [$data];
$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);
$params = [
    'valueInputOption' => 'RAW'
];

$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

// var_dump($data);

if ($result) {
    echo 'Gửi đăng ký thành công!';
} else {
    echo 'Gửi đăng ký thất bại, vui lòng kiểm tra lại thông tin.';
}
?>
