<?php
    require_once 'GSConnector.php';
    use Google\Service\Drive\DriveFile as Google_Service_DriveFile;

    $connector = new GoogleSheetsConnector();
    $client = $connector->getClient();

    // Giới hạn dung lượng tải lên
    $maxFileSize = 100 * 1024 * 1024; // 100MB
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'bmp'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $uploadedFile = $_FILES['file'];

        // // Kiểm tra dung lượng file
        // if ($uploadedFile['size'] <= $maxFileSize) {

        //     // Kiểm tra định dạng file
        //     $fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);
        //     if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                $service = new Google_Service_Drive($client);

                // ID của thư mục trên Google Drive
                $folderId = '1oqXY0KU21BgiVNphxvLa58Tk3cMv5hzD'; // Thay thế bằng ID của thư mục thực tế

                // Upload file to Google Drive
                $fileMetadata = new Google_Service_DriveFile([
                    'name' => $uploadedFile['name'],
                    'parents' => [$folderId], // Đặt thư mục cha cho file
                ]);

                $content = file_get_contents($uploadedFile['tmp_name']);
                $driveFile = $service->files->create($fileMetadata, [
                    'data' => $content,
                    'mimeType' => $uploadedFile['type'],
                    'uploadType' => 'resumable',
                ]);

                // Get the link to the uploaded file
                $fileLink = 'https://drive.google.com/file/d/' . $driveFile->id;

                // Now you can use $fileLink as the link to the uploaded file
                // echo "Tải ảnh lên thành công. <a href=\"$fileLink\" target=\"_blank\">$fileLink</a>";
                echo $fileLink;

        //     } else {
        //         echo 'Định dạng file không được phép. Vui lòng chọn file ảnh hoặc pdf.';
        //     }
        // } else {
        //     echo 'Dung lượng file quá lớn. Vui lòng chọn file nhỏ hơn 100MB.';
        // }
    } else {
        echo "Lỗi tải ảnh lên. Vui lòng thử lại.";
    }
?>
