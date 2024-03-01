<!doctype html>

<html lang="en">

   <head>

      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Đăng ký Tuyển sinh - Đại học Hạ Long</title>

      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



      <style>

         @import url('https://fonts.googleapis.com/css2?family=Prompt&display=swap');

         * {

            font-family: 'Calibri', sans-serif;

         }

         p {

            line-height: 1.0;

         }

         .container {

            max-width: 500px;

            margin: auto;

            background: white;

            padding: 10px;

         }

         select {

            text-wrap: wrap;

         }

         select option {

            white-space: normal;

            max-width: 500px;

            overflow-wrap: break-word;

         }

      </style>

      <!-- Your head content -->

      <style>

        /* Định dạng input file upload */
        input[type="file"] {
            display: block;
            margin-bottom: 10px; /* Khoảng cách giữa input và thẻ <a> */
        }

        /* Định dạng thẻ <a> */
        a {
            display: block;
            width: 100%;
            word-wrap: break-word; /* Cho phép xuống dòng khi nội dung quá dài */
            white-space: pre-line; /* Hiển thị khoảng trắng và xuống dòng */
            overflow: hidden; /* Ẩn phần nội dung bị tràn */
        }

      </style>

   </head>

   <header>

      <div class="d-flex justify-content-center align-items-center mt-5">

         <img src="dhhl.png" alt="logo dai hoc ha long" width="150" class="logo-img" />

      </div>

   </header>

   <body>

      <div class="container -sm d-flex justify-content-center align-items-center mt-2">

      <form class="row g-3" id="myForm" action="process_form.php" method="post">

         <h5 class="text-Dark text-center">XÉT TUYỂN ĐẠI HỌC, CAO ĐẲNG <br>Năm 2024</h5>

         <div class="mb-1">

            <h5 style="color: green">I.THÔNG TIN THÍ SINH:</h5>

            <label for="fname" class="form-label">Họ và tên:</label>

            <input type="text" class="form-control" id="fname" name="fname"  required>

         </div>

         <div class="mb-1">

            <label for="sex" class="form-label">Giới tính:</label>

            <select id="sex" name="sex" class="form-select" required>

               <option value="Không">Chọn giới tính</option>

               <option value="Nam">Nam</option>

               <option value="Nữ">Nữ</option>

            </select>

         </div>

         <div class="mb-1">

            <label for="birth" class="form-label">Ngày sinh:</label>

            <input type="date" id="birth" name="birth" class="form-control" required/>

         </div>

         <div class="mb-1">

            <label for="idcard" class="form-label">Số CMND/CCCD</label>

            <input type="text" class="form-control" id="idcard" name="idcard" required>

         </div>

         <div class="mb-1">

            <label for="fname" class="form-label">Số điện thoại</label>

            <input type="text" class="form-control" id="phone" name="phone" required>

         </div>

         <div class="mb-1">

            <label for="inputPassword4" class="form-label">Địa chỉ mail</label>

            <input type="email" class="form-control" id="email" name="email" required>

         </div>

         <div class="mb-1">

            <h5 style="color: green">III.ĐỊA CHỈ NHẬN GIẤY BÁO/NƠI CƯ TRÚ:</h5>

            <label for="tinh" class="form-label">Tỉnh/Thành phố nơi cư trú:</label>

            <select class="form-control" name="tinhThanhPho" id="tinhThanhPho" onchange="loadQuanHuyen()" required>

               <option value="" selected="selected">Chọn Tỉnh/Thành phố</option>

               <?php

                  require_once 'GSConnector.php';

                  $spreadsheetId = '1YC8g0h26_kpR8wo1Ctlbdw9CBRJMwAo3JWCmIRAyCO4';



                  // Load Tỉnh Thành Phố

                  $connector = new GoogleSheetsConnector();

                  $tinhThanhPho = $connector->getDataFromSheet($spreadsheetId, 'diadanh!A2:A');

                  foreach ($tinhThanhPho as $value) {

                      if($value != $lastvalue)

                      {

                          echo "<option value=\"$value\">$value</option>";

                          $lastvalue = $value;

                      }

                  }

                ?>

            </select>

         </div>

         <div class="mb-1">

            <label for="tp" class="form-label">Quận/Huyện:</label>

            <select class="form-control" name="quanHuyen" id="quanHuyen" onchange="loadPhuongXa()" required>

               <option value="" selected="selected">Chọn Tỉnh/Thành phố trước</option>

            </select>

         </div>

         <div class="mb-1">

            <label for="phuong" class="form-label">Xã/Phường:</label>

            <select class="form-control" name="phuongXa" id="phuongXa" required>

               <option value="" selected="selected">Chọn Quận/Huyện trước</option>

            </select>

         </div>

         <div class="mb-1">

            <label for="sonha" class="form-label">Số nhà, đường, tổ, khu:</label>

            <textarea class="form-control" id="sonha" name="sonha" placeholder="Ghi rõ nội dung..."required></textarea>

         </div>

         <div class="mb-1">

            <h5 style="color: green">III. THÔNG TIN TRƯỜNG THPT:</h5>

            <label for="tinhthpt" class="form-label">Tỉnh/Thành phố:</label>

            <select class="form-control" name="tinhthpt" id="tinhthpt" onchange="loadQuanHuyenTHPT()" required>

               <option value="" selected="selected">Chọn tỉnh/thành phố trường THPT</option>

               <?php

                  require_once 'GSConnector.php';

                  $spreadsheetId = '1YC8g0h26_kpR8wo1Ctlbdw9CBRJMwAo3JWCmIRAyCO4';



                  // Load Tỉnh Thành Phố

                  $connector = new GoogleSheetsConnector();

                  $tinhThanhPho = $connector->getDataFromSheet($spreadsheetId, 'thpt!A2:A');

                  foreach ($tinhThanhPho as $value) {

                      if($value != $lastvalue)

                      {

                          echo "<option value=\"$value\">$value</option>";

                          $lastvalue = $value;

                      }

                  }

                ?>

            </select>

         </div>

         <div class="mb-1">

            <label for="huyenthpt" class="form-label">Quận/Huyện:</label>

            <select class="form-control" name="huyenthpt" id="huyenthpt" onchange="loadTruongTHPT()">

               <option value="" selected="selected">Chọn tỉnh/thành phố trước</option>

            </select>

         </div>

         <div class="mb-1">

            <label for="truongthpt" class="form-label">Trường THPT:</label>

            <select class="form-control" name="truongthpt" id="truongthpt"required>

               <option value="" selected="selected">Chọn Quận/Huyện trước</option>

            </select>

         </div>

         <div class="mb-1">

            <h5 style="color: green">III.THÔNG TIN ĐĂNG KÝ XÉT TUYỂN:</h5>

            <ul class="list-unstyled">

               <li>

                  Nội dung đọc kỹ trước khi đăng ký (ấn vào đường link để xem ) :

                  <ul>

                     <li><a href="https://drive.google.com/file/d/1DTB6u1RW1aT7AiZnfD-9YYKCNZdLPb5a/view?usp=sharing" target="_blank">Cách tính điểm xét tuyển</a></li>

                     <li><a href="https://drive.google.com/file/d/1dDUoLctoKjbSctDGstSQcks-KZxSVXfr/view?usp=sharing" target="_blank">Đối tượng xét kết hợp</a></li>

                     <li><a href="https://uhl.edu.vn/thong-tin-tuyen-sinh/khu-vuc-123-la-gi-phan-chia-khu-vuc-tuyen-sinh-dai-hoc-cac-thi-sinh-can-nam-chac/" target="_blank">Khu vực ưu tiên</a></li>

                     <li><a href="https://drive.google.com/file/d/1cQOKX9nwl-KSjFqX5InybwMwk-qI9yxr/view?usp=sharing" target="_blank">Đối tượng ưu tiên</a></li>

                  </ul>

               </li>

            </ul>

            <label for="fname" class="form-label">Trình độ đào tạo:</label>

            <select class="form-control" name="he" id="he" onchange="loadPhuongThuc()">

               <option value="" selected="selected">Chọn trình độ đào tạo</option>

               <?php

                  require_once 'GSConnector.php';

                  $spreadsheetId = '1YC8g0h26_kpR8wo1Ctlbdw9CBRJMwAo3JWCmIRAyCO4';



                  // Load Tỉnh Thành Phố

                  $connector = new GoogleSheetsConnector();

                  $tinhThanhPho = $connector->getDataFromSheet($spreadsheetId, 'NganhTS!A2:A');

                  foreach ($tinhThanhPho as $value) {

                      if($value != $lastvalue)

                      {

                          echo "<option value=\"$value\">$value</option>";

                          $lastvalue = $value;

                      }

                  }

                ?>

            </select>

         </div>

         <div class="mb-1">

            <label for="fname" class="form-label">Phương thức xét tuyển:</label>

            <select class="form-control" name="pt" id="pt" onchange="loadNganh()">

               <option value="" selected="selected">Chọn trình độ đào tạo trước</option>

            </select>

         </div>

         <div class="mb-1">

            <label for="fname" class="form-label">Chọn ngành xét tuyển:</label>

            <select class="form-control" name="nganh" id="nganh" onchange="loadToHop()">

               <option value="" selected="selected">Chọn Phương thức xét tuyển trước</option>

            </select>

         </div>

         <div class="mb-1">

            <label for="fname" class="form-label">Tổ hợp xét tuyển</label>

            <select class="form-control" name="mth" id="mth">

               <option value="" selected="selected">Chọn ngành xét tuyển trước</option>

            </select>

            <div class="row mt-3">

               <div class="col">

                  <label for="mon1" class="form-label">Điểm môn 1:</label>

                  <input type="text" class="form-control" id="mon1" name="mon1" >

               </div>

               <div class="col">

                  <label for="mon2" class="form-label">Điểm môn 2:</label>

                  <input type="text" class="form-control" id="mon2" name="mon2" >

               </div>

               <div class="col">

                  <label for="mon3" class="form-label">Điểm môn 3:</label>

                  <input type="text" class="form-control" id="mon3" name="mon3" >

               </div>

            </div>

            <div class="mb-1 mt-3">

               <label for="kv" class="form-label">Khu vực ưu tiên: </label>

               <select id="kv" name="kv" class="form-select" required>

                  <option value="Không">Không</option>

                  <option value="KV1">Khu vực 1 (KV1)</option>

                  <option value="KV2">Khu vực 2 (KV2)</option>

                  <option value="KV2-NT">Khu vực 2 nông thôn (KV2-NT)</option>

                  <option value="KV3">Khu vực 3(KV3)</option>

               </select>

            </div>

            <div class="mb-1 mt-3">

               <label for="dtut" class="form-label">Đối tượng ưu tiên: </label>

               <select id="dtut" name="dtut" class="form-select" required>

                  <option value="Không">Không</option>

                  <option value="01">Đối tượng 01</option>

                  <option value="02">Đối tượng 02</option>

                  <option value="03">Đối tượng 03</option>

                  <option value="04">Đối tượng 04</option>

                  <option value="05">Đối tượng 05</option>

                  <option value="06">Đối tượng 06</option>

                  <option value="07">Đối tượng 07</option>

               </select>

            </div>

            <div class="mb-1 mt-3">

               <label for="hl12" class="form-label">Học lực lớp 12</label>

               <select id="hl12" name="hl12" class="form-select" required>

                  <option value="Không">Chọn loại Học lực </option>

                  <option value="Giỏi">Giỏi</option>

                  <option value="Khá">Khá</option>

                  <option value="Trung bình">Trung bình</option>

                  <option value="Yếu">Yếu</option>

                  <option value="Kém">Kém</option>

               </select>

            </div>

            <div class="mb-1 mt-3">

               <label for="hk12" class="form-label">Hạnh kiểm lớp 12</label>

               <select id="hk12" name="hk12" class="form-select" required>

                  <option value="Không">Chọn loại Hạnh kiểm </option>

                  <option value="Tốt">Tốt</option>

                  <option value="Khá">Khá</option>

                  <option value="Trung bình">Trung bình</option>

                  <option value="Yếu">Yếu</option>

               </select>

            </div>

            <div class="mb-1 mt-3">

               <label for="ghichu" class="form-label">Ghi chú (nếu có):</label>

               <textarea class="form-control" id="ghichu" name="ghichu" placeholder="Ghi rõ nội dung..."></textarea>

            </div>

            <div class="mb-1 mt-3">

               <h5 style="color: green">IV.NỘP LỆ PHÍ XÉT TUYỂN:</h5>

               <ul class="list-unstyled">

                  <li>

                     Thí sinh chuyển khoản lệ phí xét tuyển theo bước sau:

                     <ul>

                        <li>Tên tài khoản: Nguyễn Thị Thu Hiền</li>

                        <li>Số tài khoản: 05001012531817</li>

                        <li>Tại: Ngân hàng TMCP Hàng hải Việt Nam- chi nhánh Quảng Ninh</li>

                        <li>Nội dung: Họ tên thí sinh + số CMND/CCCD + Mã ngành đăng ký </li>

                        <li>Lệ phí xét tuyển: 30.000đ/ 1 hồ sơ</li>

                     </ul>

                  </li>

               </ul>

               <label for="formFile" class="form-label">Tải file hình ảnh chuyển khoản thành công:</label>

               <input id="file" class="form-control" type="file" onchange="uploadFile('file', 'result')" required/>

               <div id="result" name="result"></div>

               <input type="hidden" id="hfile" name="hfile">

            </div>

            <div class="mb-1 mt-3">

               <h5 style="color: green">V.TẢI FILE HỒ SƠ XÉT TUYỂN:</h5>

               <ul class="list-unstyled">

                  <li>

                     Hồ sơ xét tuyển bảo gồm:

                     <ul>

                        <li>Học bạ THPT</li>

                        <li>Minh chứng đối tượng ưu tiên, khu vực ưu tiên (nếu có)</li>

                        <li>Minh chứng đối với thí sinh xét kết hợp</li>

                     </ul>

                  </li>

               </ul>

               

             

<ul class="list-unstyled">

<li>

Lưu ý khi tải file:

<ul>

<li>Khi tải file lên, đợi server trả về link google là đã tải thành công</li>

<li>Tải từng file một, dung lượng file không quá 30mb</li>

</ul>

</li>

</ul>

               

               

               

               <label for="formFile1" class="form-label">Tải file thứ nhất</label>

               <input id="file1" class="form-control" type="file" onchange="uploadFile('file1', 'result1')" >

               <div id="result1" name="result1" ></div>

               <input type="hidden" id="hfile1" name="hfile1">

            </div>

            <div class="mb-1">

               <label for="formFile2" class="form-label">Tải file thứ hai</label>

               <input id="file2" class="form-control" type="file" onchange="uploadFile('file2', 'result2')" disabled="disabled" >

               <div id="result2" name="result2" ></div>

               <input type="hidden" id="hfile2" name="hfile2">

            </div>

            <div class="mb-1">

               <label for="formFile3" class="form-label">Tải file thứ ba</label>

               <input id="file3" class="form-control" type="file" onchange="uploadFile('file3', 'result3')" disabled="disabled" >

               <div id="result3" name="result3" ></div>

               <input type="hidden" id="hfile3" name="hfile3">

            </div>

            <div class="mb-1">

               <label for="formFile4" class="form-label">Tải file thứ tư</label>

               <input id="file4" class="form-control" type="file" onchange="uploadFile('file4', 'result4')" disabled="disabled" >

               <div id="result4" name="result4" ></div>

               <input type="hidden" id="hfile4" name="hfile4">

            </div>

            <div class="mb-3">

               <label for="formFile5" class="form-label">Tải file thứ năm</label>

               <input id="file5" class="form-control" type="file" onchange="uploadFile('file5', 'result5')" disabled="disabled" >

               <div id="result5" name="result5" ></div>

               <input type="hidden" id="hfile5" name="hfile5">

            </div>

            <div class="d-grid gap-2 mb-5">

               <button type="submit" id="btnSubmit" class="btn btn-success" value="Submit">LƯU DỮ LIỆU</button>

            </div>

      </form>

      </div>



      <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

      

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

      

      <script src="script.js?v=1.2"></script>

   </body>

</html>