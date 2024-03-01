$(window).bind("pageshow", function() {
    var form = $('form'); 
    // let the browser natively reset defaults
    form[0].reset();
});

function loadQuanHuyen() {
    var tinhThanhPho = document.getElementById('tinhThanhPho').value;
    if (tinhThanhPho !== '') {
        // Make an Ajax request to get Quận Huyện data based on selected Tỉnh Thành Phố
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('quanHuyen').innerHTML = this.responseText;
                document.getElementById('phuongXa').innerHTML = '<option value="">Chọn Phường Xã</option>';
            }
        };
        xhttp.open("GET", "ajax.php?action=loadQuanHuyen&tinhThanhPho=" + tinhThanhPho, true);
        xhttp.send();
    } else {
        document.getElementById('quanHuyen').innerHTML = '<option value="">Chọn Quận Huyện</option>';
        document.getElementById('phuongXa').innerHTML = '<option value="">Chọn Phường Xã</option>';
    }
}

function loadPhuongXa() {
    var quanHuyen = document.getElementById('quanHuyen').value;
    if (quanHuyen !== '') {
        // Make an Ajax request to get Phường Xã data based on selected Quận Huyện
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('phuongXa').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "ajax.php?action=loadPhuongXa&quanHuyen=" + quanHuyen, true);
        xhttp.send();
    } else {
        document.getElementById('phuongXa').innerHTML = '<option value="">Chọn Phường Xã</option>';
    }
}

function loadQuanHuyenTHPT() {
    var tinhThanhPho = document.getElementById('tinhthpt').value;
    if (tinhThanhPho !== '') {
        // Make an Ajax request to get Quận Huyện data based on selected Tỉnh Thành Phố
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('huyenthpt').innerHTML = this.responseText;
                document.getElementById('truongthpt').innerHTML = '<option value="">Chọn Phường Xã</option>';
            }
        };
        xhttp.open("GET", "ajax.php?action=loadQuanHuyenTHPT&tinhthpt=" + tinhThanhPho, true);
        xhttp.send();
    } else {
        document.getElementById('huyenthpt').innerHTML = '<option value="">Chọn Quận Huyện</option>';
        document.getElementById('truongthpt').innerHTML = '<option value="">Chọn Trường THPT</option>';
    }
}

function loadTruongTHPT() {
    var quanHuyen = document.getElementById('huyenthpt').value;
    if (quanHuyen !== '') {
        // Make an Ajax request to get Phường Xã data based on selected Quận Huyện
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('truongthpt').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "ajax.php?action=loadTruongTHPT&huyenthpt=" + quanHuyen, true);
        xhttp.send();
    } else {
        document.getElementById('truongthpt').innerHTML = '<option value="">Chọn Trường THPT</option>';
    }
}

function loadPhuongThuc() {
    var he = document.getElementById('he').value;
    if (he !== '') {
        // Make an Ajax request
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('pt').innerHTML = this.responseText;
                document.getElementById('nganh').innerHTML = '<option value="">Chọn Ngành</option>';
                document.getElementById('mth').innerHTML = '<option value="">Chọn Tổ hợp</option>';
            }
        };
        xhttp.open("GET", "ajax.php?action=loadPhuongThuc&he=" + he, true);
        xhttp.send();
    } else {
        document.getElementById('pt').innerHTML = '<option value="">Chọn Phương Thức</option>';
        document.getElementById('nganh').innerHTML = '<option value="">Chọn Ngành</option>';
        document.getElementById('mth').innerHTML = '<option value="">Chọn Tổ hợp</option>';
    }
}

function loadNganh() {
    var he = document.getElementById('he').value;
    var pt = document.getElementById('pt').value;
    if (pt !== '') {
        // Make an Ajax request
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('nganh').innerHTML = this.responseText;
                document.getElementById('mth').innerHTML = '<option value="">Chọn Tổ hợp</option>';
            }
        };
        xhttp.open("GET", "ajax.php?action=loadNganh&he=" + he + "&pt=" + pt, true);
        xhttp.send();
    } else {
        document.getElementById('nganh').innerHTML = '<option value="">Chọn Ngành</option>';
        document.getElementById('mth').innerHTML = '<option value="">Chọn Tổ hợp</option>';
    }
}

function loadToHop() {
    var pt = document.getElementById('pt').value;
    var nganh = document.getElementById('nganh').value;
    if (nganh !== '') {
        // Make an Ajax request
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('mth').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "ajax.php?action=loadToHop&he=" + he + "&pt=" + pt + "&nganh=" + nganh, true);
        xhttp.send();
    } else {
        document.getElementById('mth').innerHTML = '<option value="">Chọn Tổ hợp</option>';
    }
}

function uploadFile(controlID, resultID) {
    
    document.getElementById("btnSubmit").disabled = true;

    var fileInput = document.getElementById(controlID);
    var file = fileInput.files[0];

    var formData = new FormData();
    formData.append('file', file);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php', true);

    
    var resultDiv = document.getElementById(resultID);
    resultDiv.innerHTML = "Đang tải lên ...";

    xhr.onload = function () {
        if (xhr.status === 200) {
            var resultDiv = document.getElementById(resultID);
            resultDiv.innerHTML = "<a href='"+xhr.responseText+"' target='_blank'>" + xhr.responseText + "</a>";
            var resultHidden = document.getElementById('h' + controlID);
            resultHidden.value = xhr.responseText;

            switch(controlID) {
                case "file1":
                    document.getElementById("file2").disabled = false;
                    break;
                case "file2":
                    document.getElementById("file3").disabled = false;
                    break;
                case "file3":
                    document.getElementById("file4").disabled = false;
                    break;
                case "file4":
                    document.getElementById("file5").disabled = false;
                    break;
            }

            setInterval(function () {document.getElementById("btnSubmit").disabled = false;}, 1000);
        }
    };

    xhr.send(formData);
}