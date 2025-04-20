<?php
if ($_SESSION['role_id'] == 1) {
    echo '
						<li class="lh-sb-title condense">Apps</li>
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="fa-regular fa-address-card"></i><span class="condense">Nhân Viên
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./team-profile.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thông tin </a></li>
								<li><a href="./team-add.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thêm nhân viên</a></li>
								<li><a href="./team-list.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Danh sách nhân viên</a></li>
										
							</ul>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Customer</li>
						<li class="lh-sb-item">
								<a href="./list-customer.php" class="lh-page-link">
									<i class="fa-solid fa-user-group"></i><span class="condense"><span
											class="hover-title">Khách hàng</span> </span>
								</a>
							</li>
						<li class="lh-sb-item">
							<a href="./customer-details.php" class="lh-page-link">
								<i class="fa-solid fa-user-pen"></i><span class="condense">
									<span class="hover-title">Khách hàng Chi tiết
									</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./rooms.php" class="lh-page-link">
								<i class="fa-solid fa-gift"></i><span class="condense"><span
										class="hover-title">Khuyến mãi </span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./bookings.php" class="lh-page-link">
								<i class="fa-solid fa-file"></i><span class="condense"><span
										class="hover-title">Đặt chỗ</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./invoice.php" class="lh-page-link">
								<i class="fa-regular fa-money-bill-1"></i><span class="condense"><span
										class="hover-title">Hoá đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Foods</li>
						<li class="lh-sb-item">
							<a href="./menu.php" class="lh-page-link">
								<i class="fa-solid fa-utensils"></i><span class="condense"><span
										class="hover-title">Thực đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./menu-add.php" class="lh-page-link">
								<i class="fa-solid fa-utensils"></i><span class="condense"><span
										class="hover-title">Thêm thực đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./orders.php" class="lh-page-link">
								<i class="fa-regular fa-bookmark"></i><span class="condense"><span
										class="hover-title">Đặt chỗ</span> </span>
							</a>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Login</li>
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="ri-pages-line"></i><span class="condense">Kho
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./material.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Nguyên liệu</a></li>
								<li><a href="./material-add.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thêm Nguyên liệu</a></li>
								<li><a href="./material-update.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Cập nhật nguyên liệu</a></li>
								
							</ul>
						</li>';
} else if ($_SESSION['role_id'] == 2) {
    echo '<li class="lh-sb-item-separator"></li>
							<li class="lh-sb-title condense">Customer</li>
							<li class="lh-sb-item">
								<a href="./list-customer.php" class="lh-page-link">
									<i class="fa-solid fa-user-group"></i><span class="condense"><span
											class="hover-title">Khách hàng</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
							<a href="./customer-details.php" class="lh-page-link">
								<i class="fa-solid fa-user-pen"></i><span class="condense">
									<span class="hover-title">Khách hàng Chi tiết
									</span> </span>
							</a>
						</li>
							<li class="lh-sb-item">
								<a href="./rooms.php" class="lh-page-link">
									<i class="fa-solid fa-gift"></i><span class="condense"><span
											class="hover-title">Khuyến mãi </span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./bookings.php" class="lh-page-link">
									<i class="fa-solid fa-file"></i><span class="condense"><span
											class="hover-title">Đặt chỗ</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./invoice.php" class="lh-page-link">
									<i class="fa-regular fa-money-bill-1"></i><span class="condense"><span
											class="hover-title">Hoá đơn</span> </span>
								</a>
							</li>
							<li class="lh-sb-item-separator"></li>
							<li class="lh-sb-title condense">Foods</li>
							<li class="lh-sb-item">
								<a href="./menu.php" class="lh-page-link">
									<i class="fa-solid fa-utensils"></i><span class="condense"><span
											class="hover-title">Thực đơn</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./menu-add.php" class="lh-page-link">
									<i class="fa-solid fa-utensils"></i><span class="condense"><span
											class="hover-title">Thêm thực đơn</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./orders.php" class="lh-page-link">
									<i class="fa-regular fa-bookmark"></i><span class="condense"><span
											class="hover-title">Đặt chỗ</span> </span>
								</a>
							</li>
							<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="ri-pages-line"></i><span class="condense">Kho
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./material.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Nguyên liệu</a></li>
								<li><a href="./material-add.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thêm Nguyên liệu</a></li>
								<li><a href="./material-update.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Cập nhật nguyên liệu</a></li>
								
							</ul>
						</li>';
}
