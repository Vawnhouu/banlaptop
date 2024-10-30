
<style>
    .wrap-field li{
        list-style: none;
    }
</style>

<?php
if (!empty($_GET['id'])) {
    // $result = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `sanpham`.`id`=".$_GET['id']."");
    $result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noi_dung`, `id_the_loai`, `id_nha_cc`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`,`theloai`.`id`,`theloai`.`ten_tl`,`nhacungcap`.`id`,`nhacungcap`.`ten_ncc` FROM `sanpham`,`theloai`,`nhacungcap` WHERE `sanpham`.`id`=".$_GET['id']." AND `sanpham`.`id_the_loai`=`theloai`.`id` AND `sanpham`.`id_nha_cc`=`nhacungcap`.`id`");
    $product = $result->fetch_assoc();
    $gallery = mysqli_query($con, "SELECT * FROM `hinhanhsp` WHERE `id_sp` = " . $_GET['id']);
    if (!empty($gallery) && !empty($gallery->num_rows)) {
        while ($row = mysqli_fetch_array($gallery)) {
            $product['gallery'][] = array(
                'id' => $row['id'],
                'path' => $row['hinh_anh']
            );
        }
    }
}

    $theloai=mysqli_query($con,"SELECT * FROM `theloai`");
    $nhacungcap=mysqli_query($con,"SELECT * FROM `nhacungcap`");
?>
<h1 style="text-align: center;">Sửa sản phẩm</h1>
    <div class="box-content">
            <form name="product-formsua" method="post" action="./xulythem.php?act=sua&id=<?= $_GET['id'] ?>" class="form-group" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa</h5>
                </div>
                <div class="modal-body">
                    <div>
                        <label>Tên sản phẩm</label>
                        <input class="form-control" type="text" name="name" required value="<?= (!empty($product) ? $product['ten_sp'] : "") ?>" />
                    </div>
                    <div>
                        <label>Giá sản phẩm</label>
                        <input class="form-control" type="number" name="price"min="3000000" max="50000000" required value="<?= (!empty($product) ? $product['don_gia'] : "") ?>" />
                    </div>
                    
                    <div>
                        <label>Nhà cung cấp</label>
                        <select name="idncc"  class="form-control" style="height:40px">
                        <option value="<?=$product['id_nha_cc']?>">ID hiện tại: <?=$product['id_nha_cc']?> - <?=$product['ten_ncc']?></option>
                            <?php while($row=mysqli_fetch_array($nhacungcap)){?><option value="<?=$row['id']?>"><?= $row['id']?> - <?=$row['ten_ncc']?></option><?php } ?>
                        </select>
                    </div>
                    <div>
                        <label>Loại</label>
                        <select name="idtl" class="form-control" style="height:40px">
                            <option value="<?=$product['id_the_loai']?>">ID hiện tại: <?=$product['id_the_loai']?> - <?=$product['ten_tl']?></option>
                            <?php while($row=mysqli_fetch_array($theloai)){?>
                                <option value="<?= $row['id']?>"><?= $row['id']?> - <?=$row['ten_tl']?>
                            </option><?php } ?>
                        </select>
                    </div>
                    <div>
                        <label>Nội dung</label>
                        <textarea class="form-control"name="content" id="product-content" required> <?= (!empty($product) ?$product['noi_dung']:"")?></textarea>
                    </div>
                    <div class="form-control">
                        <label>Ảnh đại diện: </label>
                        <div class="wrap-field">
                            <?php if (!empty($product['hinh_anh'])) { ?>
                                <img style="width: 250px;height: 200px;" src="../img/<?= $product['hinh_anh'] ?>" /><br />
                                <input type="hidden" name="image" value="<?= $product['hinh_anh'] ?>" />
                            <?php } ?>
                            <input type="file" name="image" />
                        </div>
                        <div class="clear-both"></div>
                    </div>                

                    <div class="form-control">
                        <label>Thư viện ảnh: </label>
                        <div class="wrap-field">
                            <?php if (!empty($product['gallery'])) { ?>
                                <ul class="row">
                                    <?php foreach ($product['gallery'] as $image) {
                                            if($image['path']!='') {?>
                                        <li class="col-lg-3">
                                            <img style="width: 250px;height: 200px;" src="../img/<?= $image['path'] ?>" />
                                            <a href="./admin.php?act=gallery_delete&id=<?= $image['id'] ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </li>
                                    <?php } }?>
                                </ul>
                            <?php } ?>
                            <?php if (isset($_GET['task']) && !empty($product['gallery'])) { ?>
                                <?php foreach ($product['gallery'] as $image) { ?>
                                    <input type="hidden" name="gallery_image[]" value="<?= $image['path'] ?>" />
                                <?php } ?>
                            <?php } ?>
                            <input multiple="" type="file" name="gallery[]" />
                        </div>
                        <div class="clear-both"></div>
                    </div>       
                </div>
                <div>
                    <label>Trạng thái</label>
                    <input type="checkbox" name="trangthai" value="<?= $product['trangthai']?>"<?php if($product['trangthai']=='0') echo "checked" ?> />
                </div>
                <div class="modal-footer">
                    <button name="btnsua" type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>