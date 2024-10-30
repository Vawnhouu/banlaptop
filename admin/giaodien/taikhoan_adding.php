<style>
    .wrap-field li {
        list-style: none;
    }
</style>
<h1 style="text-align: center;">Thêm tài khoản</h1>
<form name="taikhoan-formadd" class="form-group" method="POST" action="./xulythem.php" enctype="multipart/form-data">

    <!-- <div class="clear-both"></div> -->
    <div class="box-content">
        <div class="modal-header">
            <h5 class="modal-title">Thêm mới</h5>
        </div>
        <div class="modal-body">
            <div class="wrap-field">
                <label>Tài khoản: </label>
                <input class="form-control" type="text" name="tendangnhap" value="" required/>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Mật khẩu: </label>
                <input class="form-control"type="text" name="matkhau" value="" minlength="6" required/>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Họ và tên: </label>
                <input class="form-control"type="text" name="name" value=""required />
                <div class="clear-both"></div>
            </div>
        </div>
        <div class="modal-footer">
        <input name="btntkadd" class="btn btn-primary"type="submit" title="Lưu tài khoản" value="Lưu" />
        </div>
    </div>
</form>