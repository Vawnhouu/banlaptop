<style>
    .wrap-field li{
        list-style: none;
    }
</style>
<h1 style="text-align: center;">Thêm thể loại</h1>
<form name="theloai-formadd"class="form-group" method="POST" action="./xulythem.php" enctype="multipart/form-data">
    <!-- <div class="clear-both"></div> -->
    <div class="modal-header">
     <h5 class="modal-title">Thêm mới</h5>
</div>
<div class="modal-body">
    <div class="box-content">
        <label>Tên thể loại: </label>
        <input class="form-control"type="text" name="name" value="" required/>
    </div>
    <div class="modal-footer">
        <input name="btntladd"class="btn btn-primary" type="submit" title="Lưu thể loại" value="Lưu" />
        <div class="clear-both"></div>
    </div>
    </div>
</form>