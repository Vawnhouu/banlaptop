<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if (isset($_POST['timebd']) && isset($_POST['timekt'])) {
        if (($_POST['timebd'] == '') && ($_POST['timekt'] == ''))
            $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` )");
        if (($_POST['timebd'] == '') && (!empty($_POST['timekt'])))
            $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` <= DATE_ADD('" . $_POST['timekt'] . "',INTERVAL '1' DAY)");
        if (($_POST['timekt'] == '') && (!empty($_POST['timebd'])))
            $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` >= '" . $_POST['timebd'] . "'");
        if (!empty($_POST['timebd']) && (!empty($_POST['timekt'])))
            $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` <= DATE_ADD('" . $_POST['timekt'] . "',INTERVAL '1' DAY) AND `hoadon`.`ngay_tao` >= '" . $_POST['timebd'] . "'");
    } else $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` )");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if (isset($_POST['timebd']) && isset($_POST['timekt'])) {
        if (($_POST['timebd'] == '') && ($_POST['timekt'] == ''))
            $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id`,`da_nhan_tien`,`nhanvien_nhantien` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if (($_POST['timebd'] == '') && (!empty($_POST['timekt'])))
            $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id`,`da_nhan_tien`,`nhanvien_nhantien` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` <= DATE_ADD('" . $_POST['timekt'] . "',INTERVAL '1' DAY) ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if (($_POST['timekt'] == '') && (!empty($_POST['timebd'])))
            $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id`,`da_nhan_tien`,`nhanvien_nhantien` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` >= '" . $_POST['timebd'] . "' ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if (!empty($_POST['timebd']) && (!empty($_POST['timekt'])))
            $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id`,`da_nhan_tien`,`nhanvien_nhantien` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` <= DATE_ADD('" . $_POST['timekt'] . "',INTERVAL '1' DAY) AND `hoadon`.`ngay_tao` >= '" . $_POST['timebd'] . "' ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    } else $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id`,`da_nhan_tien`,`nhanvien_nhantien` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    mysqli_close($con);
?>
    <div class="main-content" style="width: fit-content">
        <h1 style="text-align: center;">Hóa đơn</h1>
        <form action="./admin.php?muc=1&tmuc=Hóa%20đơn" method="POST" class="form-group">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="form-label" for="datefrom">Ngày bắt đầu</label>
                        <input type="date" class="form-control" name="timebd">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="form-label" for="dateto">Ngày kết thúc</label>
                        <input type="date" class="form-control" name="timekt">
                    </div>
                </div>

            </div>
            <!-- <input type="date" name="timebd" >
            <input type="date" name="timekt" > -->
            <input type="submit" value="Lọc" class="btn btn-info" style="text-decoration: none; color:white;">
            <a href="./admin.php?tmuc=Hóa%20đơn" class="btn btn-info" style="text-decoration: none; color:white;">Mặc định</a>
            <div class="product-items">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover" style="text-align: center;vertical-align: middle;">
                        <thead style="vertical-align: middle;">
                            <tr>
                                <th>Id</th>
                                <th>Mã khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Ngày tạo</th>
                                <th>Nhân viên xác nhận đơn</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Nhân viên nhận tiền</th>
                                <th>Trạng thái nhận tiền</th>
                                <th>Xem chi tiết</th>
                                <th>Xác nhận</th>
                                <th>Đã nhận tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($hoadon)) {
                            ?>
                                <tr>
                                    <td><?= $row['idhoadon'] ?></td>
                                    <td><?= $row['id_khachhang'] ?></td>
                                    <td><?= $row['tong_tien'] ?></td>
                                    <td><?= $row['ngay_tao'] ?></td>
                                    <td><?= $row['ten_nv'] ?></td>
                                    <td><?php if ($row['trang_thai'] == "1") echo "Đã xác nhận";
                                        else echo "Chưa xác nhận"; ?></td>
                                    <td><?= $row['nhanvien_nhantien'] ?></td>
                                    <td><?php if ($row['da_nhan_tien'] == "1") echo "Đã trả tiền";
                                        else echo "Chưa trả tiền"; ?></td>
                                    <td><a href="./admin.php?act=cthoadon&id=<?= $row['idhoadon'] ?>">Xem chi tiết</a></td>
                                    <td>
                                        <?php
                                            if($row['trang_thai'] == "1")echo '<i class="fas fa-check"></i></td>';
                                            else echo '<a href="./xulythem.php?act=xnhd&id='.$row['idhoadon'].'&cuser='. $row['ten_nv'] .'&iduser='. $_SESSION['idnhanvien'].'"'.' style="text-decoration: none;"><i class="fas fa-check"></i></a></td>';
                                        ?>
                                        
                                    <td>
                                    <?php
                                            if($row['da_nhan_tien'] == "1")echo '<i class="fas fa-check"></i></td>';
                                            else echo '<a href="./xulythem.php?act=xnhd_dnt&id='.$row['idhoadon'].'&cuser='. $row['nhanvien_nhantien'] .'&iduser='. $_SESSION['tennhanvien'].'&ttgiaohang='. $row['trang_thai'].'"'.' style="text-decoration: none;"><i class="fas fa-check"></i></a></td>';
                                        ?>
                                       
                                    <td><?php if ($row['trang_thai'] == "0") { ?><a href="./admin.php?act=xoahd&id=<?= $row['idhoadon'] ?>" style="text-decoration: none;" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a><?php } ?> </td>
                                    <div class="clear-both"></div>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <?php
        include './pagination.php';
        ?>
        <div class="clear-both"></div>
    </div>
<?php
}
?>