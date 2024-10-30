<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `nhanvien` WHERE `id` = " . $_GET['id']);
    $nhanvien = $result->fetch_assoc();
    $tk = mysqli_query($con, "SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap`FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");
}
?>
<style>
    .wrap-field li {
        list-style: none;
    }
</style>
<h1 style="text-align: center;">Sửa nhân viên</h1>
<div class="box-content">
    <form name="nhanvien-formsua" class="form-group" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
        <!-- <div class="clear-both"></div> -->
        <div class="modal-header">
            <h5 class="modal-title">Chỉnh sửa</h5>
        </div>
        <div class="modal-body">
            <div class="wrap-field">
                <label>Tên nhân viên: </label>
                <input class="form-control"type="text" name="name" value="<?= (!empty($nhanvien) ? $nhanvien['ten_nv'] : "") ?>" required/>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>SĐT: </label>
                <input class="form-control"type="tel" name="sdt" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" value="<?= (!empty($nhanvien) ? $nhanvien['phone'] : "") ?>" required/>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Username: </label>
                <select class="form-control"name="tendangnhap">
                    <option value="<?= $nhanvien['ten_dangnhap'] ?>"><?= $nhanvien['ten_dangnhap'] ?></option><?php while ($row = mysqli_fetch_array($tk)) { ?><option value="<?= $row['username'] ?>"><?= $row['username'] ?></option><?php } ?>
                </select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Email: </label>
                <input class="form-control" type="email" name="email" pattern="^[a-z0-9](\.?[a-z0-9]){0,}@g(oogle)?mail\.com$" title="Vui lòng nhập email google VD: abc@gmail.com" value="<?= (!empty($nhanvien) ? $nhanvien['email'] : "") ?>" placeholder="VD: abc@gmail.com" required/>
                <div class="clear-both"></div>
            </div>
        </div>
        <div class="modal-footer">
            <input name="btnnvsua" class="btn btn-primary"type="submit" title="Lưu nhân viên" value="Lưu" />
        </div>
    </form>
</div>