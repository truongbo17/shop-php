<?php
function getPwdSecurity($pwd)
{
	return md5(md5($pwd) . MD5_PRIVATE_KEY);
}

function getUserToken()
{
	if (isset($_SESSION['user'])) {
		return $_SESSION['user'];
	}

	$token = getCOOKIE('token');
	if (empty($token)) {
		return null;
	}

	$sql = "SELECT user.* FROM user,token where user.id = token.user_id and token.token = '$token'";
	$result = executeResult($sql);

	if ($result != null && count($result) > 0) {
		$_SESSION['user'] = $result[0];

		return $result[0]; //tra ve du lieu user
	}

	return null;
}

function getGET($key)
{
	$value = '';
	if (isset($_GET[$key])) {
		$value = $_GET[$key];
	}
	$value = fixSqlInjection($value);
	return trim($value);
}

function getPOST($key)
{
	$value = '';
	if (isset($_POST[$key])) {
		$value = $_POST[$key];
	}
	$value = fixSqlInjection($value);
	return trim($value);
}

function getCOOKIE($key)
{
	$value = '';
	if (isset($_COOKIE[$key])) {
		$value = $_COOKIE[$key];
	}
	$value = fixSqlInjection($value);
	return trim($value);
}

function fixSqlInjection($str)
{
	$str = str_replace("\\", "\\\\", $str);
	$str = str_replace("'", "\'", $str);
	$str = str_replace("\'", "\\\'", $str);
	return $str;
}


function fixUrl($thumbnail, $rootPath = "../../")
{
	if (stripos($thumbnail, 'http://') !== false || stripos($thumbnail, 'https://') !== false) {
	} else {
		$thumbnail = $rootPath . $thumbnail;
	}

	return $thumbnail;
}

function fixAllInput($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


function to_slug($str)
{
	$str = trim(mb_strtolower($str));
	$str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
	$str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
	$str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
	$str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
	$str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
	$str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
	$str = preg_replace('/(đ)/', 'd', $str);
	$str = preg_replace('/[^a-z0-9-\s]/', '', $str);
	$str = preg_replace('/([\s]+)/', '-', $str);
	return $str;
}


function uploadImage($key, $rootPath = "../../")
{
	if (!isset($_FILES[$key]) || !isset($_FILES[$key]['name']) || $_FILES[$key]['name'] == '') {
		return '';
		die();
	}

	$target_dir = "images/avatar/";
	$target_file = $target_dir . basename($_FILES[$key]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES[$key]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// // Check file size
	// 	if ($_FILES[$key]["size"] > 500000) {
	// 		echo "Sorry, your file is too large.";
	// 		$uploadOk = 0;
	// 	}

	// Allow certain file formats
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif"
	) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		// var_dump($_FILES[$key]["tmp_name"]);die;
		if (move_uploaded_file($_FILES[$key]["tmp_name"], $rootPath . $target_file)) {
			return $target_file;
			echo "The file " . htmlspecialchars(basename($_FILES[$key]["name"])) . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}

// Function to get the client IP address
function get_client_ip()
{
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP')) {
		$ipaddress = getenv('HTTP_CLIENT_IP');
	} else if (getenv('HTTP_X_FORWARDED_FOR')) {
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	} else if (getenv('HTTP_X_FORWARDED')) {
		$ipaddress = getenv('HTTP_X_FORWARDED');
	} else if (getenv('HTTP_FORWARDED_FOR')) {
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	} else if (getenv('HTTP_FORWARDED')) {
		$ipaddress = getenv('HTTP_FORWARDED');
	} else if (getenv('REMOTE_ADDR')) {
		$ipaddress = getenv('REMOTE_ADDR');
	} else {

		$ipaddress = 'UNKNOWN';
	}

	return $ipaddress;
}


function data_tree($data, $parent_id = 0, $level = 0)
{
	$result = [];
	foreach ($data as $item) {
		if ($item['parent_id'] == $parent_id) {
			$item['level'] = $level; //tạo ra key level để lưu lại giá trị hiển thị
			$result[] = $item;
			$child = data_tree($data, $item['id'], $level + 1); //tìm danh mục con của $data,parent_id đc truyền vào
			$result = array_merge($result, $child); //sáp nhập các mảng dựa trên key trùng nhau(khóa ngoại)
		}
	}
	return $result;
}
// Function to get the client IP address
function getip() {
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP')) {
		$ipaddress = getenv('HTTP_CLIENT_IP');
	} else if (getenv('HTTP_X_FORWARDED_FOR')) {
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	} else if (getenv('HTTP_X_FORWARDED')) {
		$ipaddress = getenv('HTTP_X_FORWARDED');
	} else if (getenv('HTTP_FORWARDED_FOR')) {
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	} else if (getenv('HTTP_FORWARDED')) {
		$ipaddress = getenv('HTTP_FORWARDED');
	} else if (getenv('REMOTE_ADDR')) {
		$ipaddress = getenv('REMOTE_ADDR');
	} else {

		$ipaddress = 'UNKNOWN';
	}

	return $ipaddress;
}
