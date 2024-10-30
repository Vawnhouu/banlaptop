<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `theloai` WHERE `id` = " . $_GET['id']);
    $theloai = $result->fetch_assoc();
}
?>
<style>
    .wrap-field li {
        list-style: none;
    }
</style>
<h1 style="text-align: center;">Sửa thể loại</h1>
<form name="theloai-formsua" class="form-group" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <!-- <div class="clear-both"></div> -->
    <div id="content-box">
        <div class="modal-header">
            <h5 class="modal-title">Chỉnh sửa</h5>
        </div>
        <div class="modal-body">
            <label>Tên thể loại: </label>
            <input class="form-control" type="text" name="name" required value="<?= (!empty($theloai) ? $theloai['ten_tl'] : "") ?>" />
        </div>
        <div class="modal-footer">
            <input name="btntlsua" class="btn btn-primary" type="submit" title="Lưu thể loại" value="Lưu" />
            <div class="clear-both"></div>
        </div>
    </div>
</form>