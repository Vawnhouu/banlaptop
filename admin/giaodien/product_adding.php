<!-- if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['idtl']) && !empty($_POST['idtl']) && isset($_POST['idncc']) && !empty($_POST['idncc'])) {
$sql = "INSERT INTO `sanpham` (`id`, `ten_sp`, `hinh_anh`, `don_gia`, `noi_dung`, `ngay_tao`, `ngay_sua`,`so_luong`,`id_the_loai`,`id_nha_cc`) VALUES (NULL, '" . $_POST['name'] . "','" . $image . "', " . str_replace('.', '', $_POST['price']) . ", '" . $_POST['content'] . "', " . time() . ", " . time() . ",0,'" . $_POST['idtl'] . "','" . $_POST['idncc'] . "');";
                    -->
<?php 
    $theloai=mysqli_query($con,"SELECT * FROM `theloai`");
    $nhacungcap=mysqli_query($con,"SELECT * FROM `nhacungcap`");
?>
<style>
    .wrap-field li{
        list-style: none;
    }
</style>
<h1 style="text-align: center;">Thêm sản phẩm</h1>
<div class="box-contentt">
<form class="form-group" name="product-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
    
    <!-- <div class="clear-both"></div> -->
    <div class="modal-header">
     <h5 class="modal-title">Thêm mới</h5>
    </div>
    <div class="modal-body">
    <div class="wrap-field">
        <label>Tên sản phẩm: </label>
        <input class="form-control" type="text" name="name" value="" required />
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Giá sản phẩm: </label>
        <input class="form-control" type="number" name="price" min="3000000" max="50000000"value="" required/>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Ảnh đại diện: </label>
        <div class="wrap-field">
            <input class="form-control" type="file" name="image" required/>
        </div>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Thư viện ảnh: </label>
        <div class="wrap-field"> 
            
            <input class="form-control" multiple="" type="file" name="gallery[]" required/>
        </div>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>ID thể loại: </label>
        <select class="form-control" name="idtl"><?php while($row=mysqli_fetch_array($theloai)){?><option value="<?= $row['id']?>"><?= $row['id']?> - <?=$row['ten_tl']?></option><?php } ?></select>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>ID nhà cung cấp: </label>
        <select class="form-control" name="idncc"><?php while($row=mysqli_fetch_array($nhacungcap)){?><option value="<?= $row['id']?>"><?= $row['id']?> - <?=$row['ten_ncc']?></option><?php } ?></select>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Nội dung: </label>
        <textarea class="form-control" name="content" id="product-content" required></textarea>
        <div class="clear-both"></div>
    </div>
    </div>
    <div class="modal-footer">
    <input name="btnadd" class="btn btn-primary" type="submit" title="Lưu sản phẩm" value="Lưu" />
    </div>
</form>
<div class="clear-both"></div>

</div>
