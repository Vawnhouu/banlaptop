<div class="pagination justify-content-center" style="list-style-type: none;display: flex;float:right">
<?php
if ($current_page > 3) {
    $first_page = 1;
    ?>
    <li class="page-item"><a class="page-link" href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $first_page ?><?php if(isset($_GET['sapxep']))echo '&sapxep='.$_GET['sapxep']?>">First</a></li>
    <?php
}
if ($current_page > 1) {
    $prev_page = $current_page - 1;
    ?>
    <li class="page-item"><a class="page-link" href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $prev_page ?><?php if(isset($_GET['sapxep']))echo '&sapxep='.$_GET['sapxep']?>">Prev</a></li>
<?php }
?>
<?php for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page) { ?>
        <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
            <li class="page-item"><a class="page-link" href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $num ?><?php if(isset($_GET['sapxep']))echo '&sapxep='.$_GET['sapxep']?>"><?= $num ?></a></li>
        <?php } ?>
    <?php } else { ?>
        <li class="page-item"><strong class="current-page page-link"><?= $num ?></strong></li>
    <?php } ?>
<?php } ?>
<?php
if ($current_page < $totalPages - 1) {
    $next_page = $current_page + 1;
    ?>
    <li class="page-item"><a class="page-link" href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $next_page ?><?php if(isset($_GET['sapxep']))echo '&sapxep='.$_GET['sapxep']?>">Next</a></li>
<?php
}
if ($current_page < $totalPages - 3) {
    $end_page = $totalPages;
    ?>
    <li class="page-item"><a class="page-link" href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $end_page ?><?php if(isset($_GET['sapxep']))echo '&sapxep='.$_GET['sapxep']?>">Last</a></li>
    <?php
}
?>
</div>