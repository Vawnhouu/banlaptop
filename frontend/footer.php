		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Liên Hệ</h3>
								<p>“Thất bại chỉ là một nơi để nghỉ ngơi. Đó là cơ hội để bạn bắt đầu lại theo cách thông minh hơn” 
									- Henry Ford</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>173 An Dương Vương</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>0907767045</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>vanhau3652@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Danh Mục Sản Phẩm</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
								<?php
										$sql='select id, ten_tl from theloai';
										$list=executeResult($sql);
										foreach($list as $item){
											echo '<li><a href="index.php?act=category&id='.$item['id'].'">'.$item['ten_tl'].'</a></li>';
										}
										?>
			
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Thông Tin</h3>
								<ul class="footer-links">
									<li><a href="#">Giới Thiệu</a></li>
									<li><a href="#">Tuyển Dụng</a></li>
									<li><a href="#">Điều Khoản Sử Dụng</a></li>
									<li><a href="#">Chính Sách Đổi Trả</a></li>
									<li><a href="#">Bán Hàng Doanh Nghiệp</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Hỗ Trợ</h3>
								<ul class="footer-links">
									<li><a href="#">Tài Khoản Của Tôi</a></li>
									<li><a href="#">Giỏ Hàng</a></li>
									<li><a href="#">Yêu Thích</a></li>
									<li><a href="#">Bảo Mật</a></li>
									<li><a href="#">Trợ Giúp</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			
		</footer>
		<!-- /FOOTER -->