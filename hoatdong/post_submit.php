<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

//insert into database
if(!empty($_POST)) {
 $name = $_POST['name'];
 $email = $_POST['postcontent'];
 $time = date('Y-m-d H:i:s');
 $avatar = $_POST['avatar'];
 $image = "images/". $_FILES['userfile']['name']."";
 $username2 = $_POST['username'];
 if (!empty($_FILES['userfile']['name'])){
    $has_image = 'block';
 } else {
    $has_image = 'none';
 }
} else {
    $name = "Dương Tùng Anh";
    $email= "Xin chào thế giới";
    $time = date('Y-m-d H:i:s');
     $avatar = "/images/dta.jpg";
     $image = "";
     $has_image = "none";
      $username2 = 'anonymous';
}
 require $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
  $errors=array();
      $allowed_e=array('png','jpg','jpeg');
      $file_name=$_FILES['userfile']['name'];
      $file_e=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
      $file_s= $_FILES['userfile']['size'];
      $file_tmp=$_FILES['userfile']['tmp_name'];
      
    
      if($file_s>5097152){
        $errors[]='Chỉ có thể upload ảnh <5MB';
      }
      if(empty($errors)){
        move_uploaded_file($file_tmp,'images/'.$file_name);
       $sql = "INSERT INTO tintuc_posts (author, content, timeofpost, has_comment, avatar, has_image, image, username)
VALUES ('$name', '$email', '$time', 'no', '$avatar', '$has_image', ' $image', '$username2')";

if (mysqli_query($conn, $sql)) {
 echo "New record created successfully   ";
} else {
 echo "Error: " . $sql . "" . mysqli_error($conn);
}
$con->close();  
        
        echo "Đổi ảnh đại diện thành công";
      }else{
        foreach($errors as $error){
          echo $error,'<br/>';
        }
      }


     

 echo "Name : ".$name."   ";
 echo "Username : ".$username2."   ";
 echo "Content : ".$email."   ";
 echo "Avatar : ".$avatar."   ";
  echo "Has comment : No   ";
  echo "Has image : ".$has_image."   ";
  echo "Image : ".$image."   ";
echo date('m-d-Y H:i:s');
?>