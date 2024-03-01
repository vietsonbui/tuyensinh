<?php
require_once 'GSConnector.php';
$spreadsheetId = '1YC8g0h26_kpR8wo1Ctlbdw9CBRJMwAo3JWCmIRAyCO4';

if (isset($_GET['action'])) {
    // Load Quận Huyện data based on selected Tỉnh Thành Phố
    if ($_GET['action'] == 'loadQuanHuyen' && isset($_GET['tinhThanhPho'])) {
        $tinhThanhPho = $_GET['tinhThanhPho'];
        $connector = new GoogleSheetsConnector();
        $quanHuyen = $connector->getDataFromSheet($spreadsheetId, 'diadanh!A2:B', $tinhThanhPho);        
        $lastvalue = "";
        echo "<option>Chọn Quận Huyện</option>";
        foreach ($quanHuyen as $value) {
            if($value != $lastvalue)
            {
                echo "<option value=\"$value\">$value</option>";
                $lastvalue = $value;
            }
        }
    }
    // Load Phường Xã data based on selected Quận Huyện
    elseif ($_GET['action'] == 'loadPhuongXa' && isset($_GET['quanHuyen'])) {
        $quanHuyen = $_GET['quanHuyen'];
        $connector = new GoogleSheetsConnector();
        $phuongXa = $connector->getDataFromSheet($spreadsheetId, 'diadanh!B2:C', $quanHuyen);        
        $lastvalue = "";
        echo "<option>Chọn Phường Xã</option>";
        foreach ($phuongXa as $value) {
            if($value != $lastvalue)
            {
                echo "<option value=\"$value\">$value</option>";
                $lastvalue = $value;
            }
        }
    }

    // Load Quận Huyện data based on selected Tỉnh Thành Phố
    elseif ($_GET['action'] == 'loadQuanHuyenTHPT' && isset($_GET['tinhthpt'])) {
        $tinhThanhPho = $_GET['tinhthpt'];
        $connector = new GoogleSheetsConnector();
        $quanHuyen = $connector->getDataFromSheet($spreadsheetId, 'thpt!A2:B', $tinhThanhPho);        
        $lastvalue = "";
        echo "<option>Chọn Quận Huyện</option>";
        foreach ($quanHuyen as $value) {
            if($value != $lastvalue)
            {
                echo "<option value=\"$value\">$value</option>";
                $lastvalue = $value;
            }
        }
    }

    // Load Phường Xã data based on selected Quận Huyện
    elseif ($_GET['action'] == 'loadTruongTHPT' && isset($_GET['huyenthpt'])) {
        $quanHuyen = $_GET['huyenthpt'];
        $connector = new GoogleSheetsConnector();
        $phuongXa = $connector->getDataFromSheet($spreadsheetId, 'thpt!B2:C', $quanHuyen);        
        $lastvalue = "";
        echo "<option>Chọn Trường THPT</option>";
        foreach ($phuongXa as $value) {
            if($value != $lastvalue)
            {
                echo "<option value=\"$value\">$value</option>";
                $lastvalue = $value;
            }
        }
    }
    
    // Load PT
    elseif ($_GET['action'] == 'loadPhuongThuc' && isset($_GET['he'])) {
        $he = $_GET['he'];
        $connector = new GoogleSheetsConnector();
        $pt = $connector->getDataFromSheet($spreadsheetId, 'NganhTS!A2:B', $he);        
        $lastvalue = "";
        echo "<option>Chọn Phương Thức</option>";
        foreach ($pt as $value) {
            if($value != $lastvalue)
            {
                echo "<option value=\"$value\">$value</option>";
                $lastvalue = $value;
            }
        }
    }
    // Load Nganh
    elseif ($_GET['action'] == 'loadNganh' && isset($_GET['pt'])) {
        $he = $_GET['he'];
        $pt = $_GET['pt'];
        $connector = new GoogleSheetsConnector();
        $nganh = $connector->getDataFromSheet($spreadsheetId, 'NganhTS!A2:C', $he, $pt);        
        $lastvalue = "";
        echo "<option>Chọn Ngành</option>";
        foreach ($nganh as $value) {
            if($value != $lastvalue)
            {
                echo "<option value=\"$value\">$value</option>";
                $lastvalue = $value;
            }
        }
    }
    // Load ToHop
    elseif ($_GET['action'] == 'loadToHop' && isset($_GET['nganh'])) {
        $pt = $_GET['pt'];
        $nganh = $_GET['nganh'];
        $connector = new GoogleSheetsConnector();
        $th = $connector->getDataFromSheet($spreadsheetId, 'NganhTS!B2:D', $pt, $nganh);        
        $lastvalue = "";
        echo "<option>Chọn Tổ hợp</option>";
        foreach ($th as $value) {
            if($value != $lastvalue)
            {
                echo "<option value=\"$value\">$value</option>";
                $lastvalue = $value;
            }
        }
    }
}
?>