		<!-- MAIN HEADER -->

						<?php 
						include('./connect_db.php');
						include('./function.php');
						?>
						

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
		<div class="col-10">
  	<a class="navbar-brand" href="#">SWAG</a>
    
	</div>
    <div class="collapse navbar-collapse col-2" id="navbarNavAltMarkup">
      <div class="navbar-nav">
		<a class="nav-link disabled"><?php echo $_SESSION['nguoidung'];?></a>
        <a class=" btn btn-info" aria-current="page" href="./index.php?logout=yes">Đăng xuất</a>
      </div>
    </div>
  </div>
</nav>
