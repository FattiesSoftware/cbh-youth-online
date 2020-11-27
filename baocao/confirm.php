<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// Include GitHub API config file
require_once $_SERVER['DOCUMENT_ROOT'] . '/require/githubConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/require/github.user.class.php';
$user = new User();

if(isset($accessToken)){
	   // Get the user profile info from Github
    $gitUser = $gitClient->apiRequest($accessToken);

    if(!empty($gitUser)){
        // User profile data
        $gitUserData = array();
        $gitUserData['oauth_provider'] = 'github';
        $gitUserData['oauth_uid'] = !empty($gitUser->id)?$gitUser->id:'';
        $gitUserData['name'] = !empty($gitUser->name)?$gitUser->name:'';
        $gitUserData['username'] = !empty($gitUser->login)?$gitUser->login:'';
        $gitUserData['email'] = !empty($gitUser->email)?$gitUser->email:'';
        $gitUserData['location'] = !empty($gitUser->location)?$gitUser->location:'';
        $gitUserData['picture'] = !empty($gitUser->avatar_url)?$gitUser->avatar_url:'';
        $gitUserData['link'] = !empty($gitUser->html_url)?$gitUser->html_url:'';
        
        // Insert or update user data to the database
        $userData = $user->checkUser($gitUserData);
        
        // Put user data into the session
        $_SESSION['userData'] = $userData;
$OUT1 = 'none';

    }else{
		    $OUT1 = 'block';
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
    
	$none = 'none';
$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
	}elseif(isset($_GET['code'])){
    // Verify the state matches the stored state
    if(!$_GET['state'] || $_SESSION['state'] != $_GET['state']) {
        header("Location: ".$_SERVER['PHP_SELF']);
    }
    
    // Exchange the auth code for a token
    $accessToken = $gitClient->getAccessToken($_GET['state'], $_GET['code']);
  
    $_SESSION['access_token'] = $accessToken;
  
    header('Location: ./');
}else{
// Generate a random hash and store in the session for security
    $_SESSION['state'] = hash('sha256', microtime(TRUE) . rand() . $_SERVER['REMOTE_ADDR']);
    
    // Remove access token from the session
    unset($_SESSION['access_token']);
  
    // Get the URL to authorize
    $loginURL = $gitClient->getAuthorizeURL($_SESSION['state']);
    
    // Render Github login button
    $output2 = '<a type="button" href="'.htmlspecialchars($loginURL).'" class="col-1" style="color: rgb(51, 51, 51);"><i class="fab fa-2x fa-github"></i></a>';
$PROP = 'none';
	$OUT = 'none';
}
if (isset($_GET['lop'])){
	$lop = $_GET['lop'];
} else {
	$lop = 'Không có thông tin';
}
	if (isset($_GET['vang'])){
	$vang = $_GET['vang'];
} else {
	$vang = '0';
}
	if (isset($_GET['vesinh'])){
	$vesinh = $_GET['vesinh'];
} else {
	$vesinh = 'Không có thông tin';
}
	if (isset($_GET['dongphuc'])){
	$dongphuc = $_GET['dongphuc'];
} else {
	$dongphuc = 'Không có thông tin';
}
	if (isset($_GET['loivipham'])){
	$loivipham = $_GET['loivipham'];
} else {
	$loivipham = '';
}
if (isset($_GET['mistake_id'])){
	$loivipham11 = $_GET['mistake_id'];
} else {
	$loivipham11 = '';
}
	$loi2 = 'block';
	$loi3 = 'block';
	$loi4 = 'block';
	$loi5 = 'block';
	$tenloi1= '0';
	$tenloi2= '0';
	$tenloi3= '0';
	$tenloi4= '0';
	$tenloi5= '0';

	if ($vang == ''){
		$vang = '0';
	}
	

	if ($loivipham == ''){
		$loivipham1 = '0';
		$point1 = '0';
	}
	if ($loivipham11 == ''){
		$loivipham111 = '0';
		$point11 = '0';
	}
	// thuật toán tính tổng điểm trừ đối với lỗi vi phạm 1
	if ($loivipham == '1'){
		$point1 = '01';
		$tenloi1= 'Đi muộn';
	}
	if ($loivipham == '2'){
		$point1 = '10';
		$tenloi1= 'Đi muộn (bỏ chạy)';
	}
	if ($loivipham == '3'){
		$point1 = '15';
		$tenloi1= 'Đi muộn sau 7 giờ';
	}
	if ($loivipham == '4'){
		$point1 = '10';
		$tenloi1= 'Đi muộn trèo tường';
	}
	if ($loivipham == '5'){
		$point1 = '02';
		$tenloi1= 'Vắng mặt không lí do giờ truy bài';
	}
	if ($loivipham == '6'){
		$point1 = '10';
		$tenloi1= 'Ra ngoài giờ truy bài (bỏ chạy)';
	}
	if ($loivipham == '7'){
		$point1 = '01';
		$tenloi1= 'Không đúng trang phục: áo phù hiệu giày';
	}
	if ($loivipham == '8'){
		$point1 = '05';
		$tenloi1= 'Tập trung muộn';
	}
	if ($loivipham == '9'){
		$point1 = '01';
		$tenloi1= 'Nghỉ không phép làm việc riêng trong giờ tập trung';
	}
	if ($loivipham == '10'){
		$point1 = '10';
		$tenloi1= 'Tập trung muộn sau 10 phút xếp hàng chưa ngay ngắn';
	}
	if ($loivipham == '11'){
		$point1 = '05';
		$tenloi1= 'Mất trật tự trong buổi tập trung';
	}
	if ($loivipham == '12'){
		$point1 = '01';
		$tenloi1= 'Không cất ghế sau giờ tập trung';
	}
	if ($loivipham == '13'){
		$point1 = '02';
		$tenloi1= 'Nói bậy';
	}
	if ($loivipham == '14'){
		$point1 = '02';
		$tenloi1= 'Ăn quà không đúng nơi quy định';
	}
	if ($loivipham == '15'){
		$point1 = '05';
		$tenloi1= 'Hút thuốc lá trong trường';
	}
	if ($loivipham == '16'){
		$point1 = '05';
		$tenloi1= 'Không dừng xe ở cổng trường';
	}
	if ($loivipham == '17'){
		$point1 = '10';
		$tenloi1= 'Không dừng xe ở cổng trường khi đã nhắc nhở';
	}
	if ($loivipham == '18'){
		$point1 = '10';
		$tenloi1= 'Không đội mũ bảo hiểm';
	}
	if ($loivipham == '19'){
		$point1 = '50';
		$tenloi1= 'Vô lễ với cán bộ giáo viên';
	}
	if ($loivipham == '20'){
		$point1 = '02';
		$tenloi1= 'Xả đổ rác không đúng nơi quy định';
	}
	if ($loivipham == '21'){
		$point1 = '01';
		$tenloi1= 'Trực nhật muộn đổ rác muộn';
	}

	if ($loivipham == '22'){
		$point1 = '05';
		$tenloi1= 'Không lấy sổ đầu bài sáng thứ 2';
	}
	if ($loivipham == '23'){
		$point1 = '02';
		$tenloi1= 'Trực nhật bẩn không trực khu vực';
	}
	if ($loivipham == '24'){
		$point1 = '02';
		$tenloi1= 'Để xe không đúng nơi quy định';
	}
	if ($loivipham == '25'){
		$point1 = '05';
		$tenloi1= 'Khu vực để xe lộn xộn không ngăn nắp';
	}
	if ($loivipham == '26'){
		$point1 = '02';
		$tenloi1= 'Không đóng cửa tắt điện sau giờ học';
	}
	if ($loivipham == '27'){
		$point1 = '02';
		$tenloi1= 'Sử dụng nhà vệ sinh không đúng cách';
	}
	if ($loivipham == '28'){
		$point1 = '05';
		$tenloi1= 'Làm vỡ cửa kính';
	}
	if ($loivipham == '29'){
		$point1 = '02';
		$tenloi1= 'Đá bóng không đúng nơi quy định';
	}
	if ($loivipham == '30'){
		$point1 = '05';
		$tenloi1= 'Sử dụng không đúng khu vực vệ sinh cho phép';
	}
	if ($loivipham == '31'){
		$point1 = '50';
		$tenloi1= 'Đánh nhau';
	}
	if ($loivipham == '32'){
		$point1 = '80';
		$tenloi1= 'Đánh nhau không khai báo thành khẩn';
	}
		if ($loivipham == '33'){
		$point1 = '20';
		$tenloi1= 'Vi phạm ATGT (có báo cáo về trường)';
	}

	if ($loivipham == '34'){
		$point1 = '10';
		$tenloi1= 'Vi phạm quy chế thi';
	}
	if ($loivipham == '35'){
		$point1 = '10';
		$tenloi1= 'Giờ tự quản ồn học sinh ra ngoài ảnh hưởng đến lớp khác';
	}
	if ($loivipham == '36'){
		$point1 = '03';
		$tenloi1= 'Cán bộ lớp BCH chi đoàn đến họp muộn';
	}
	if ($loivipham == '37'){
		$point1 = '05';
		$tenloi1= 'Cán bộ lớp BCH chi đoàn vắng mặt không lí do';
	}
	if ($loivipham == '38'){
		$point1 = '10';
		$tenloi1= 'Cán bộ lớp BCH chi đoàn không hoàn thành nhiệm vụ';
	}
	if ($loivipham == '39'){
		$point1 = '01';
		$tenloi1= 'Xung kích không thực hiện nhiệm vụ';
	}
	if ($loivipham == '40'){
		$point1 = '02';
		$tenloi1= 'Đội văn nghệ không thực hiện nhiệm vụ';
	}
	if ($loivipham == '41'){
		$point1 = '10';
		$tenloi1= 'Lớp trực tuần bỏ buổi trực';
	}
	if ($loivipham == '42'){
		$point1 = '05';
		$tenloi1= 'Lớp trực tuần xuống trực cổng muộn';
	}
	if ($loivipham == '43'){
		$point1 = '10';
		$tenloi1= 'Lớp trực tuần chuẩn bị không tốt cho buổi tập trung';
	}
	if ($loivipham == '44'){
		$point1 = '05';
		$tenloi1= 'Đánh nhau không khai báo thành khẩn';
	}


// thuật toán tính tổng điểm trừ đối với lỗi vi phạm 1
	if ($loivipham11 == '1'){
		$point1 = '01';
		$tenloi1= 'Đi muộn';
	}
	if ($loivipham11 == '2'){
		$point1 = '10';
		$tenloi1= 'Đi muộn (bỏ chạy)';
	}
	if ($loivipham11 == '3'){
		$point1 = '15';
		$tenloi1= 'Đi muộn sau 7 giờ';
	}
	if ($loivipham11 == '4'){
		$point1 = '10';
		$tenloi1= 'Đi muộn trèo tường';
	}
	if ($loivipham11 == '5'){
		$point1 = '02';
		$tenloi1= 'Vắng mặt không lí do giờ truy bài';
	}
	if ($loivipham11 == '6'){
		$point1 = '10';
		$tenloi1= 'Ra ngoài giờ truy bài (bỏ chạy)';
	}
	if ($loivipham11 == '7'){
		$point1 = '01';
		$tenloi1= 'Không đúng trang phục: áo phù hiệu giày';
	}
	if ($loivipham11 == '8'){
		$point1 = '05';
		$tenloi1= 'Tập trung muộn';
	}
	if ($loivipham11 == '9'){
		$point1 = '01';
		$tenloi1= 'Nghỉ không phép làm việc riêng trong giờ tập trung';
	}
	if ($loivipham11 == '10'){
		$point1 = '10';
		$tenloi1= 'Tập trung muộn sau 10 phút xếp hàng chưa ngay ngắn';
	}
	if ($loivipham11 == '11'){
		$point1 = '05';
		$tenloi1= 'Mất trật tự trong buổi tập trung';
	}
	if ($loivipham11 == '12'){
		$point1 = '01';
		$tenloi1= 'Không cất ghế sau giờ tập trung';
	}
	if ($loivipham11 == '13'){
		$point1 = '02';
		$tenloi1= 'Nói bậy';
	}
	if ($loivipham11 == '14'){
		$point1 = '02';
		$tenloi1= 'Ăn quà không đúng nơi quy định';
	}
	if ($loivipham11 == '15'){
		$point1 = '05';
		$tenloi1= 'Hút thuốc lá trong trường';
	}
	if ($loivipham11 == '16'){
		$point1 = '05';
		$tenloi1= 'Không dừng xe ở cổng trường';
	}
	if ($loivipham11 == '17'){
		$point1 = '10';
		$tenloi1= 'Không dừng xe ở cổng trường khi đã nhắc nhở';
	}
	if ($loivipham11 == '18'){
		$point1 = '10';
		$tenloi1= 'Không đội mũ bảo hiểm';
	}
	if ($loivipham11 == '19'){
		$point1 = '50';
		$tenloi1= 'Vô lễ với cán bộ giáo viên';
	}
	if ($loivipham11 == '20'){
		$point1 = '02';
		$tenloi1= 'Xả đổ rác không đúng nơi quy định';
	}
	if ($loivipham11 == '21'){
		$point1 = '01';
		$tenloi1= 'Trực nhật muộn đổ rác muộn';
	}

	if ($loivipham11 == '22'){
		$point1 = '05';
		$tenloi1= 'Không lấy sổ đầu bài sáng thứ 2';
	}
	if ($loivipham11 == '23'){
		$point1 = '02';
		$tenloi1= 'Trực nhật bẩn không trực khu vực';
	}
	if ($loivipham11 == '24'){
		$point1 = '02';
		$tenloi1= 'Để xe không đúng nơi quy định';
	}
	if ($loivipham11 == '25'){
		$point1 = '05';
		$tenloi1= 'Khu vực để xe lộn xộn không ngăn nắp';
	}
	if ($loivipham11 == '26'){
		$point1 = '02';
		$tenloi1= 'Không đóng cửa tắt điện sau giờ học';
	}
	if ($loivipham11 == '27'){
		$point1 = '02';
		$tenloi1= 'Sử dụng nhà vệ sinh không đúng cách';
	}
	if ($loivipham11 == '28'){
		$point1 = '05';
		$tenloi1= 'Làm vỡ cửa kính';
	}
	if ($loivipham11 == '29'){
		$point1 = '02';
		$tenloi1= 'Đá bóng không đúng nơi quy định';
	}
	if ($loivipham11 == '30'){
		$point1 = '05';
		$tenloi1= 'Sử dụng không đúng khu vực vệ sinh cho phép';
	}
	if ($loivipham11 == '31'){
		$point1 = '50';
		$tenloi1= 'Đánh nhau';
	}
	if ($loivipham11 == '32'){
		$point1 = '80';
		$tenloi1= 'Đánh nhau không khai báo thành khẩn';
	}
		if ($loivipham11 == '33'){
		$point1 = '20';
		$tenloi1= 'Vi phạm ATGT (có báo cáo về trường)';
	}

	if ($loivipham11 == '34'){
		$point1 = '10';
		$tenloi1= 'Vi phạm quy chế thi';
	}
	if ($loivipham11 == '35'){
		$point1 = '10';
		$tenloi1= 'Giờ tự quản ồn học sinh ra ngoài ảnh hưởng đến lớp khác';
	}
	if ($loivipham11 == '36'){
		$point1 = '03';
		$tenloi1= 'Cán bộ lớp BCH chi đoàn đến họp muộn';
	}
	if ($loivipham11 == '37'){
		$point1 = '05';
		$tenloi1= 'Cán bộ lớp BCH chi đoàn vắng mặt không lí do';
	}
	if ($loivipham11 == '38'){
		$point1 = '10';
		$tenloi1= 'Cán bộ lớp BCH chi đoàn không hoàn thành nhiệm vụ';
	}
	if ($loivipham11 == '39'){
		$point1 = '01';
		$tenloi1= 'Xung kích không thực hiện nhiệm vụ';
	}
	if ($loivipham11 == '40'){
		$point1 = '02';
		$tenloi1= 'Đội văn nghệ không thực hiện nhiệm vụ';
	}
	if ($loivipham11 == '41'){
		$point1 = '10';
		$tenloi1= 'Lớp trực tuần bỏ buổi trực';
	}
	if ($loivipham11 == '42'){
		$point1 = '05';
		$tenloi1= 'Lớp trực tuần xuống trực cổng muộn';
	}
	if ($loivipham11 == '43'){
		$point1 = '10';
		$tenloi1= 'Lớp trực tuần chuẩn bị không tốt cho buổi tập trung';
	}
	if ($loivipham11 == '44'){
		$point1 = '05';
		$tenloi1= 'Đánh nhau không khai báo thành khẩn';
	}



	$tongdiem = $point1;
	if ($tongdiem == 1){
		$tongdiem = '01';
	}
		if ($tongdiem == 2){
		$tongdiem = '02';
	}
		if ($tongdiem == 3){
		$tongdiem = '03';
	}
		if ($tongdiem == 5){
		$tongdiem = '05';
	}
	$ddiem = $point1;
	if ($ddiem == 1){
		$ddiem = '01';
	}
		if ($ddiem == 2){
		$ddiem = '02';
	}
		if ($ddiem == 3){
		$ddiem = '03';
	}
		if ($ddiem == 5){
		$ddiem = '05';
	}
	function rebuild_date( $format, $time = 0 )
{
    if ( ! $time ) $time = time();

	$lang = array();
	$lang['sun'] = 'CN';
	$lang['mon'] = 'T2';
	$lang['tue'] = 'T3';
	$lang['wed'] = 'T4';
	$lang['thu'] = 'T5';
	$lang['fri'] = 'T6';
	$lang['sat'] = 'T7';
	$lang['sunday'] = 'Chủ nhật';
	$lang['monday'] = 'Thứ hai';
	$lang['tuesday'] = 'Thứ ba';
	$lang['wednesday'] = 'Thứ tư';
	$lang['thursday'] = 'Thứ năm';
	$lang['friday'] = 'Thứ sáu';
	$lang['saturday'] = 'Thứ bảy';
	$lang['january'] = 'Tháng Một';
	$lang['february'] = 'Tháng Hai';
	$lang['march'] = 'Tháng Ba';
	$lang['april'] = 'Tháng Tư';
	$lang['may'] = 'Tháng Năm';
	$lang['june'] = 'Tháng Sáu';
	$lang['july'] = 'Tháng Bảy';
	$lang['august'] = 'Tháng Tám';
	$lang['september'] = 'Tháng Chín';
	$lang['october'] = 'Tháng Mười';
	$lang['november'] = 'Tháng M. một';
	$lang['december'] = 'Tháng M. hai';
	$lang['jan'] = 'T01';
	$lang['feb'] = 'T02';
	$lang['mar'] = 'T03';
	$lang['apr'] = 'T04';
	$lang['may2'] = 'T05';
	$lang['jun'] = 'T06';
	$lang['jul'] = 'T07';
	$lang['aug'] = 'T08';
	$lang['sep'] = 'T09';
	$lang['oct'] = 'T10';
	$lang['nov'] = 'T11';
	$lang['dec'] = 'T12';

    $format = str_replace( "r", "D, d M Y H:i:s O", $format );
    $format = str_replace( array( "D", "M" ), array( "[D]", "[M]" ), $format );
    $return = date( $format, $time );

    $replaces = array(
        '/\[Sun\](\W|$)/' => $lang['sun'] . "$1",
        '/\[Mon\](\W|$)/' => $lang['mon'] . "$1",
        '/\[Tue\](\W|$)/' => $lang['tue'] . "$1",
        '/\[Wed\](\W|$)/' => $lang['wed'] . "$1",
        '/\[Thu\](\W|$)/' => $lang['thu'] . "$1",
        '/\[Fri\](\W|$)/' => $lang['fri'] . "$1",
        '/\[Sat\](\W|$)/' => $lang['sat'] . "$1",
        '/\[Jan\](\W|$)/' => $lang['jan'] . "$1",
        '/\[Feb\](\W|$)/' => $lang['feb'] . "$1",
        '/\[Mar\](\W|$)/' => $lang['mar'] . "$1",
        '/\[Apr\](\W|$)/' => $lang['apr'] . "$1",
        '/\[May\](\W|$)/' => $lang['may2'] . "$1",
        '/\[Jun\](\W|$)/' => $lang['jun'] . "$1",
        '/\[Jul\](\W|$)/' => $lang['jul'] . "$1",
        '/\[Aug\](\W|$)/' => $lang['aug'] . "$1",
        '/\[Sep\](\W|$)/' => $lang['sep'] . "$1",
        '/\[Oct\](\W|$)/' => $lang['oct'] . "$1",
        '/\[Nov\](\W|$)/' => $lang['nov'] . "$1",
        '/\[Dec\](\W|$)/' => $lang['dec'] . "$1",
        '/Sunday(\W|$)/' => $lang['sunday'] . "$1",
        '/Monday(\W|$)/' => $lang['monday'] . "$1",
        '/Tuesday(\W|$)/' => $lang['tuesday'] . "$1",
        '/Wednesday(\W|$)/' => $lang['wednesday'] . "$1",
        '/Thursday(\W|$)/' => $lang['thursday'] . "$1",
        '/Friday(\W|$)/' => $lang['friday'] . "$1",
        '/Saturday(\W|$)/' => $lang['saturday'] . "$1",
        '/January(\W|$)/' => $lang['january'] . "$1",
        '/February(\W|$)/' => $lang['february'] . "$1",
        '/March(\W|$)/' => $lang['march'] . "$1",
        '/April(\W|$)/' => $lang['april'] . "$1",
        '/May(\W|$)/' => $lang['may'] . "$1",
        '/June(\W|$)/' => $lang['june'] . "$1",
        '/July(\W|$)/' => $lang['july'] . "$1",
        '/August(\W|$)/' => $lang['august'] . "$1",
        '/September(\W|$)/' => $lang['september'] . "$1",
        '/October(\W|$)/' => $lang['october'] . "$1",
        '/November(\W|$)/' => $lang['november'] . "$1",
        '/December(\W|$)/' => $lang['december'] . "$1" );

    return preg_replace( array_keys( $replaces ), array_values( $replaces ), $return );
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
	if (!isset($_SESSION['loggedin'])) {
		if(isset($accessToken)){
			$error2 = $userData['oauth_uid'];
			$usern = $userData['username'];
			$none = 'none';
			$PROP = 'block';
			$IN = 'none';
			$OUT = 'block';
			if ($error2 == 17230355) {// nếu id = 1
	// chuyển đến xung kích
	
		}else {
		die ('Bạn không có quyền truy cập vào đây!'); // chuyển đến trang login
		}
		} else {
		die ('Bạn không có quyền truy cập vào đây!'); // chuyển đến trang login
		}
	} else {
	$usern = $_SESSION['username'];
	$none = 'none';
	$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
	}

$baocao = 'active';
require $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
?>
<html>
<head>
	<title>Xác nhận gửi báo cáo</title>

</head>
<body  style="    background-color: #f3f4f7;">
<style>
@media only screen and (max-width: 790px) {
.content {
	width: auto;
	margin: 0 auto;
    padding-left: 25px;
    padding-right: 25px;

}
}
</style>
	<style>
	.navtop {
	background-color: #2f3947;
	height: 60px;
	width: 100%;
	border: 0;
}
.navtop div {
	display: flex;
	margin: 0 auto;
	width: 1000px;
	height: 100%;
}
.navtop div h1, .navtop div a {
	display: inline-flex;
	align-items: center;
}
.navtop div h1 {
	flex: 1;
	font-size: 24px;
	padding: 0;
	margin: 0;
	color: #eaebed;
	font-weight: normal;
}
.navtop div a {
	padding: 0 20px;
	text-decoration: none;
	color: #c1c4c8;
	font-weight: bold;
}
.navtop div a i {
	padding: 2px 8px 0 0;
}
.navtop div a:hover {
	color: #eaebed;
}
body.loggedin {
	background-color: #f3f4f7;
}
.content {
	width: 1000px;
	margin: 0 auto;
}
.content h2 {
	margin: 0;
	padding: 25px 0;
	font-size: 22px;
	border-bottom: 1px solid #e0e0e3;
	color: #4a536e;
}
.content > p, .content > div {
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
	margin: 25px 0;
	padding: 25px;
	background-color: #fff;
}
.content > p table td, .content > div table td {
	padding: 5px;
}
.content > p table td:first-child, .content > div table td:first-child {
	font-weight: bold;
	color: #4a536e;
	padding-right: 15px;
}
.content > div p {
	padding: 5px;
	margin: 0 0 10px 0;
}
@media only screen and (max-width: 790px) {
.content {
	width: auto;
	margin: 0 auto;
    padding-left: 25px;
    padding-right: 25px;

}
}
input[type=submit] {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
	display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
	</style>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/style.php';
?>
<script>
function myFunction2() {
var str = document.getElementById("demo").innerHTML; 
str = str.replace(",", "+");
document.getElementById("demo").innerHTML = str;
}
myFunction2()


</script>
<?php
error_reporting(0);
$hocsinh = $_GET['student_id'];
$datee = rebuild_date('Y-m-d H:i:s');
$datee2 = rebuild_date('Y-m-d');
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
if ($_GET['form_type'] == 'class') {
// Username doesnt exists, insert new account
if ($stmt = $con->prepare('INSERT INTO baocao (class, xungkich, date2, date1, diem, absent, vesinh, dongphuc, tenloi, maloi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('ssssssssss', $lop, $usern, $datee2, $datee, $tongdiem, $vang, $vesinh, $dongphuc, $tenloi1, $loivipham);
	$stmt->execute();
	echo $stmt -> error;
	$message = 'Gửi báo cáo thành công!';
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	$message = 'Đã có lỗi xảy ra! Báo cáo của bạn chưa được gửi đi';
}
$con->close();	
} elseif ($_GET['form_type'] == 'student') {
$classname = '12 Nga';
// Username doesnt exists, insert new account
if ($stmt = $con->prepare('INSERT INTO baocao_hocsinh (class, student_id, xungkich, date, diem, tenloi, maloi) VALUES (?, ?, ?, ?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('sssssss', $classname, $hocsinh, $usern, $datee, $ddiem, $tenloi1, $loivipham11);
	$stmt->execute();
	echo $stmt -> error;
	$message = 'Gửi báo cáo thành công!';
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	$message = 'Đã có lỗi xảy ra! Báo cáo của bạn chưa được gửi đi';
}
$con->close();	


}
$dis = 'none';
$dis2 = 'none';
if ($_GET['form_type'] == 'class'){
	$dis = 'block';
	$dis2 = 'none';
} elseif ($_GET['form_type'] == 'student'){
	$dis = 'none';
	$dis2 = 'block';
}

?>
<div class="content" style="display: <?=$dis?>">
	<h2><?=$message?></h2>
	<br>
	<h3>Nội dung báo cáo:</h3>
	<p>
	<b>Thời gian báo cáo:</b> <?=rebuild_date('H:i l, d/m/Y' )?><br>
	<b>Xung kích báo cáo:</b> <?=$usern?><br>
	<b>Lớp:</b> <?=$lop?><br>
	<b>Vắng:</b> <?=$vang?><br>
	<b>Vệ sinh:</b> <?=$vesinh?><br>
	<b>Đồng phục:</b> <?=$dongphuc?><br>
	<b>Lỗi vi phạm: <?=$tenloi1?></b><br>
	<b id="demo">Điểm trừ: <?=$tongdiem?></b><br>

	</p>

	<button style="float:left" type="button" class="btn btn-danger" onclick="location.href='/baocao'"><i class="fas fa-redo-alt"></i> Quay lại</button>
	</div>
	<?php
$sql = "SELECT hocsinh.name FROM `hocsinh` INNER JOIN lop ON lop.class_id = hocsinh.class_id WHERE student_id='$hocsinh'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $tenhocsinh = $row[name];
  }
}
	?>
	<div class="content" style="display: <?=$dis2?>">
		<h2><?=$message?></h2>
	<br>
	<h3>Nội dung báo cáo:</h3>
	<p>
	<b>Thời gian báo cáo:</b> <?=rebuild_date('H:i l, d/m/Y' )?><br>
	<b>Xung kích báo cáo:</b> <?=$usern?><br>
	<b>Mã học sinh:</b> <?=$hocsinh?><br>
	<b>Tên học sinh:</b> <?=$tenhocsinh?><br>
	<b>Lỗi vi phạm: <?=$tenloi1?></b><br>
	<b id="demo">Điểm trừ: <?=$ddiem?></b><br>

	</p>

	<button style="float:left" type="button" class="btn btn-danger" onclick="location.href='/baocao/hocsinh.php'"><i class="fas fa-redo-alt"></i> Quay lại</button>
	</div>


</body>
</html>