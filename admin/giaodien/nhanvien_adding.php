<?php
$tk = mysqli_query($con, "SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap`FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");
?>
<style>
    .wrap-field li {
        list-style: none;
    }
</style>
<h1 style="text-align: center;">Thêm nhân viên</h1>
<form name="nhanvien-formadd" class="form-group" method="POST" action="./xulythem.php" enctype="multipart/form-data">
    <!-- <div class="clear-both"></div> -->
    <div class="box-content">
        <div class="modal-header">
            <h5 class="modal-title">Thêm mới</h5>
        </div>
        <div class="modal-body">
            <div class="wrap-field">
                <label>Tên nhân viên: </label>
                <input class="form-control"type="text" name="name" value="" required/>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Tên đăng nhập: </label>
                <select class="form-control"name="tendangnhap"><?php while ($row = mysqli_fetch_array($tk)) { ?><option value="<?= $row['username'] ?>"><?= $row['username'] ?></option><?php } ?></select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>SĐT: </label>
                <input class="form-control"type="tel" name="sdt" value="" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" required/>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Email: </label>
                <input class="form-control"type="email" name="email" value="" pattern="^[a-z0-9](\.?[a-z0-9]){0,}@g(oogle)?mail\.com$" title="Vui lòng nhập email google VD: abc@gmail.com" placeholder="VD: abc@gmail.com" required/>
                <div class="clear-both"></div>
            </div>
        </div>
        <div class="modal-footer">
            <input name="btnnvadd" class="btn btn-primary"type="submit" title="Lưu nhân viên" value="Lưu" />
        </div>
    </div>
</form>
<div class="clear-both"></div>