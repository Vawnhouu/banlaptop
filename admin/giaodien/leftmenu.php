    <!-- <a href="admin.php?vitri=left&giatri=1"><div>Hóa đơn</div> </a> 
    <a href="admin.php?vitri=left&giatri=2"><div>Thống kê</div></a> 
    <a href="admin.php?vitri=left&giatri=5"><div>Khách hàng</div></a>
    <a href="admin.php?vitri=left&giatri=3"><div>Sản phẩm</div></a>
    <a href="admin.php?vitri=left&giatri=4"><div>Thể loại</div></a>
    <a href="admin.php?vitri=left&giatri=5"><div>Phiếu nhập</div></a>
    <a href="admin.php?vitri=left&giatri=5"><div>Nhân viên</div></a>
    <a href="admin.php?vitri=left&giatri=5"><div>Tài khoản</div></a> -->
    <div class="list-group" style="list-style-type: none;">
  <?php
            $sql="select id,ten_danhmuc from danhmuc,quyendahmuc where `id_danhmuc`=`id` AND `id_quyen`=" . $_SESSION['quyen'] . "";
            $list=executeResult($sql);
            foreach($list as $item){
                echo '<li><a class="list-group-item list-group-item-action" href="admin.php?muc='.$item['id'].'&tmuc='.$item['ten_danhmuc'].'">'.$item['ten_danhmuc'].'</a></li>';
            }
        ?>
</div>
<script>
        
        const element = document.querySelectorAll('.list-group-item');
            for (var i = 0; i < element.length; i++) {  
                if(element[i].href == location.href){
                    element[i].classList.add("active");
                }           
            }
    </script>
    <!-- <ul class="input-select2" >
        
        
    </ul> -->
