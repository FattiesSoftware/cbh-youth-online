<!-- Project name: CBH Youth Online (Đoàn trường THPT Chuyên Biên Hoà Online)
     Project link: https://youth.fattiesoftware.com/
     Created by Fatties Software 2020
     Team members:
     - Duong Tung Anh (CEO/Founder - C4K60 Bien Hoa Gifted High School) | https://fb.me/tunnaduong
     - Hoang Phat (Co-Founder/Lead Developer - A1K60 Bien Hoa Gifted High School) | https://fb.me/hoangphathandsome
     All rights reserved 
-->
<!--Thanh điều hướng của trang-->
<nav class='navbar navbar-expand-sm bg-dark navbar-dark' style="zoom: 0.8;">
  <!--Logo của trang-->
	<a href='/' class="navbar-brand">
	<img src="/images/logo4.png" class="logo2" style="width: 203px;height: 40px;margin-top: 5px;margin-right: 5px;margin-left: 5px;" alt="">
</a>
<!--Nút ẩn hiện menu dành cho thiết bị di động-->
<button class='navbar-toggler' data-target='#myNavbar' data-toggle='collapse' type='button'>
<span class='navbar-toggler-icon'></span>
</button>
<div class='collapse navbar-collapse' id='myNavbar'>
<ul class='navbar-nav'>
  <!--Các biến $abc nhằm giúp cho trang chỉ định hiển thị được phần tô đậm của nút-->
<li class="nav-item <?=$home?>"><a class="nav-link" href='/'><i class="fas fa-home"></i> Trang chủ</a></li>
<li class="nav-item <?=$diendan?>"><a class="nav-link" href='/forum'><i class="fas fa-comments"></i> Diễn đàn</a></li>
<li class="nav-item <?=$loa?>"><a class="nav-link" href='/loaphatthanh'><i class="fas fa-volume-up"></i> Loa lớn</a></li>
<li class="nav-item dropdown <?=$tracuu?>"><a class="nav-link" href="/tracuu" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100px"><i class="fas fa-search"></i> Tra cứu</a>
		  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" style="
    padding-left: 15px;
" href="/tracuu/loivipham"><i class="fas fa-times"></i> Các lỗi vi phạm</a>
          <a class="dropdown-item" style="
    padding-left: 15px;
"  href="/tracuu/thoikhoabieu"><i class="fas fa-table"></i> Thời khoá biểu</a>
          <a class="dropdown-item" style="
    padding-left: 15px;
" href="/tracuu/hocsinh"><i class="fas fa-user-graduate"></i> Học sinh</a>
<a class="dropdown-item" style="
    padding-left: 15px;
" href="/tracuu/nguoidung"><i class="fas fa-user"></i> Người dùng</a>
<a class="dropdown-item" style="
    padding-left: 15px;
" href="/tracuu/nenep"><i class="fas fa-user"></i> Nề nếp học sinh (Dành cho giáo viên)</a>
        </div></li>
        
<li class="nav-item <?=$xephang?>"><a class="nav-link" href='/xephang'><i class="fas fa-trophy"></i> Xếp hạng</a></li>
<li class="nav-item <?=$sukien?>"><a class="nav-link" href='/hoatdong'><i class="far fa-newspaper"></i> Tin tức</a></li>
<li class="nav-item dropdown <?=$baocao?>"><a class="nav-link" href='/baocao' data-toggle="dropdown" id="baocao" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-signature"></i> Báo cáo</a>
<div class="dropdown-menu" aria-labelledby="baocao">
      <a class="dropdown-item" style="
    padding-left: 15px;
" href="/baocao"><i class="fas fa-users"></i> Báo cáo vi phạm tập thể lớp</a>
          <a class="dropdown-item" style="
    padding-left: 15px;
"  href="/baocao/hocsinh.php"><i class="fas fa-user-graduate"></i> Báo cáo vi phạm học sinh</a>
          </div>

</li>

<li class="nav-item <?=$svhd?>"><a class="nav-link" href='/svhd'><i class="fas fa-book-reader"></i> CLB Sách</a></li>
<li class="nav-item <?=$inan?>"><a class="nav-link" href='/inan'><i class="fas fa-file-alt"></i> In tài liệu</a></li>
<li class="nav-item <?=$lienket?>"><a class="nav-link" href='/lienket'><i class="fas fa-link"></i> Liên kết</a></li>
<li class="nav-item <?=$lienhe?>"><a class="nav-link" href='/lienhe'><i class="far fa-address-book"></i> Liên hệ</a></li>
</ul> 
<ul class='nav navbar-nav navbar-right flex-row justify-content-between ml-auto'>
<li class="nav-item <?=$trangcanhan?>" id="profile" style="display:<?=$PROP?>">
<a class="nav-link" href="/profile.php"><i class="fas fa-user-circle"></i> Trang cá nhân</a></li>
<li class="nav-item" style="display:<?=$IN?>"><a class="nav-link" href='/login'><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
<li class="nav-item" style="display:<?=$OUT?>"><a class="nav-link" href='/logout.php'><i class="fas fa-sign-in-alt"></i> Đăng xuất</a></li>
</ul>
</div>
</div>
</nav>
