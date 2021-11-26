<?php
session_status();
require_once '../database/dbhelper.php';
require_once '../utils/utility.php';

$action = getPOST('action');

switch ($action) {
	case 'banUser':
		banUser();
		break;

	case 'unbanUser':
		unbanUser();
		break;

	case 'addUser':
		addUser();
		break;

	case 'resetPasswordUser':
		resetPasswordUser();
		break;

	case 'loginAdmin':
		loginAdmin();
		break;

	case 'editUser':
		editUser();
		break;

	case 'addFeedBack':
		addFeedBack();
		break;

	case 'editUserMain':
		editUserMain();
		break;

	case 'loginUser':
		loginUser();
		break;

	case 'signinUser':
		signinUser();
		break;

	case 'resetPass':
		resetPass();
		break;

	case 'confirmResetPass':
		confirmResetPass();
		break;
}
//confirmResetPass
function confirmResetPass()
{
	$password = getPOST('password');
	$email = getPOST('email');
	if ($email != '' && $password != '') {
		$sql = "SELECT * FROM `user` WHERE email = '$email'";
		$checkEmail = executeResult($sql, true);
		if ($checkEmail != null) {
			$password = getPwdSecurity($password);
			$updated_at = date('Y-m-d H:i:s');
			$sql = "UPDATE `user` SET `password` = '$password', `updated_at` = '$updated_at' WHERE `email` = '$email'";
			execute($sql);
			//delete resetpass cũ
			$sql = "DELETE FROM reset_pass WHERE email = '$email'";
			execute($sql);
			echo "success";
		} else {
			echo "Lỗi";
		}
	} else {
		echo "Vui lòng nhập đầy đủ thông tin !";
	}
}

//reset pass
function resetPass()
{
	$email = getPOST('email');
	if ($email != '') {
		$sql = "SELECT * FROM `user` WHERE email = '$email'";
		$checkEmail = executeResult($sql, true);
		if ($checkEmail != null) {
			$token = getPwdSecurity($email);
			$created_at = date('Y-m-d H:i:s');
			$sql = "INSERT INTO reset_pass(email,token,created_at) VALUES('$email','$token','$created_at')";
			execute($sql);

			$subject = "Liên đặt lại mật khẩu TRUONGBO";
			$message = "Nhấn vào link này để đặt lại mật khẩu của bạn
           http://localhost:81/shop/confirm-reset.php?email=$email&token=$token 
           Nhấn vào đây để tiến hành đặt lại mật khẩu";
			$header = "no reply TRUONGBO";
			mail($email, $subject, $message, $header);

			echo "success";
		} else {
			echo "Không tồn tại email này trong hệ thống !";
		}
	} else {
		echo "Vui lòng nhập email !";
	}
}


//signinUser
function signinUser()
{
	$username = getPOST('username');
	$password = getPOST('password');
	$fullname = getPOST('fullname');
	$email = getPOST('email');

	$fullname = fixAllInput($fullname);
	$email = fixAllInput($email);
	$password = getPwdSecurity($password);
	$username = fixAllInput($username);

	if (!empty($username) && !empty($password) && !empty($fullname) && !empty($email)) {
		if (preg_match("/^[a-zA-Z0-9]+$/", $username) == 1) {
			$sql = "SELECT * FROM user WHERE username = '$username' AND email = '$email'";
			$checkUser = executeResult($sql, true);
			if ($checkUser != null) {
				echo "Tài khoản đã tồn tại trong hệ thống !";
				die;
			} else {
				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$created_at = date('Y-m-d H:i:s');

				$sql = "INSERT INTO `user`(`role_id`,`username`,`password`,`email`,`fullname`,`deleted`,`thumbnail`,`created_at`) VALUES ('2','$username','$password','$email','$fullname','0','images/avatar/240770891_111779131239363_8455883811852187416_n.png','$created_at')";
				execute($sql);
				echo "success";
			}
		} else {
			echo "Tài khoản phải viết liền không dấu !";
		}
	} else {
		echo "Vui lòng nhập đầy đủ thông tin !";
	}
}

//loginUser
function loginUser()
{
	$username = getPOST('username');
	$password = getPOST('password');
	$username = fixAllInput($username);
	$username = preg_replace("/[^a-zA-Z0-9]+/", "", $username);
	$password = getPwdSecurity($password);

	if (!empty($username) && !empty($password)) {
		$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$checkUser = executeResult($sql, true);
		if ($checkUser == null) {
			echo "Tài khoản hoặc mật khẩu không chính xác !";
			die;
		} else {
			if ($checkUser['deleted'] == 1) {
				echo "Tài khoản  bị cấm khỏi hệ thống !";
				die;
			} else {
				//token
				$token = getPwdSecurity($checkUser['username'] . time());

				//lưu xuống cookie
				setcookie('token', $token, time() + 1 * 24 * 60 * 60, '/');

				//lưu session xuống
				$_SESSION['user'] = $checkUser;

				//lưu token vào database
				$user_id = $checkUser['id'];
				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$created_at = date('Y-m-d H:i:s');

				$sql = "INSERT INTO token(user_id,token,created_at) VALUES ('$user_id','$token','$created_at')";
				execute($sql);

				echo "success";
			}
		}
	} else {
		echo "Vui lòng nhập đầy đủ tài khoản và mật khẩu !";
	}
}

//editUserMain
function editUserMain()
{
	//get id từ form
	$id = getPOST('id');
	//fix all sql injection :))
	$id = preg_replace("/[^0-9]/", "", $id);

	//check user
	$sql = "SELECT * FROM user WHERE id = '$id'";
	$checkUser = executeResult($sql, true);
	if ($checkUser != null) {
		//get du lieu
		$thumbnail = uploadImage('thumbnail', "../");
		$fullname = getPOST('fullname');
		$email = getPOST('email');
		$phonenumber = getPOST('phonenumber');
		$address = getPOST('address');
		$birthday = getPOST('birthday');
		$story = getPOST('story');

		if ($fullname != '' && $email != '') {
			//check isset email
			$email = fixAllInput($email);
			$sql = "SELECT * FROM user WHERE email = '$email' AND id NOT LIKE '$id'";
			$checkEmail = executeResult($sql, true);
			if ($checkEmail == '') {

				$fullname = fixAllInput($fullname);
				$phonenumber = fixAllInput($phonenumber);
				$address = fixAllInput($address);
				$story = fixAllInput($story);

				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$updated_at = date('Y-m-d H:i:s');

				if ($thumbnail != '') {
					//insert data
					$sql = "UPDATE `user` SET fullname = '$fullname',email = '$email',phonenumber = '$phonenumber',address = '$address',birthday = '$birthday',story = '$story',updated_at = '$updated_at',thumbnail = '$thumbnail' WHERE id = '$id'";
				} else {
					//insert data no avatar
					$sql = "UPDATE `user` SET fullname = '$fullname',email = '$email',phonenumber = '$phonenumber',address = '$address',birthday = '$birthday',story = '$story',updated_at = '$updated_at' WHERE id = '$id'";
				}
				execute($sql);
				echo 'success';
			} else {
				echo "Email đã tồn tại !";
			}
		} else {
			echo "Vui lòng nhập đầy đủ thông tin !";
		}
	} else {
		echo "Không có thông tin về người dùng này !";
	}
}

//addFeedBack
function addFeedBack()
{
	$userid = getPOST('userid');
	//fix all sql injection :))
	$userid = preg_replace("/[^0-9]/", "", $userid);


	$fullname = getPOST('fullname');
	$email = getPOST('email');
	$subject = getPOST('subject');
	$message = getPOST('message');

	if ($fullname != '' && $email != '' && $subject != '' && $message != '') {
		$fullname = fixAllInput($fullname);
		$email = fixAllInput($email);
		$subject = fixAllInput($subject);
		$message = fixAllInput($message);

		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$created_at = date('Y-m-d H:i:s');
		if ($userid > 0) {
			$sql = "INSERT INTO `feedback` (`user_id`, `fullname`, `email`, `subject`, `message`, `status`, `created_at`) 
		VALUES ('$userid','$fullname','$email','$subject','$message','0','$created_at')";
		} else {
			$sql = "INSERT INTO `feedback` (`fullname`, `email`, `subject`, `message`, `status`, `created_at`) 
		VALUES ('$fullname','$email','$subject','$message','0','$created_at')";
		}

		execute($sql);
		echo "success";
	} else {
		echo "Vui lòng nhập đầy đủ thông tin !";
	}
}

//edit User
function editUser()
{
	//get id từ form
	$id = getPOST('id');
	//fix all sql injection :))
	$id = preg_replace("/[^0-9]/", "", $id);

	//check user
	$sql = "SELECT * FROM user WHERE id = '$id'";
	$checkUser = executeResult($sql, true);
	if ($checkUser != null) {
		//get du lieu
		$thumbnail = uploadImage('thumbnail', "../");
		$username = getPOST('username');
		$fullname = getPOST('fullname');
		$email = getPOST('email');
		$phonenumber = getPOST('phonenumber');
		$address = getPOST('address');
		$birthday = getPOST('birthday');
		$story = getPOST('story');
		$deleted = getPOST('deleted');
		$role = getPOST('role');

		if ($username != '' && $fullname != '' && $email != '' && $deleted != '' && $role != '') {
			//fix xss,sql injection
			if (preg_match("/^[a-zA-Z0-9]*$/", $username)) {
				//check isset email
				$email = fixAllInput($email);
				$sql = "SELECT * FROM user WHERE email = '$email' AND id NOT LIKE '$id'";
				$checkEmail = executeResult($sql, true);
				if ($checkEmail == '') {
					$username = fixAllInput($username);
					$sql = "SELECT * FROM user WHERE username = '$username' AND id NOT LIKE '$id'";
					$checkUser = executeResult($sql, true);
					if ($checkUser == '') {
						$fullname = fixAllInput($fullname);
						$phonenumber = fixAllInput($phonenumber);
						$address = fixAllInput($address);
						$story = fixAllInput($story);

						date_default_timezone_set("Asia/Ho_Chi_Minh");
						$updated_at = date('Y-m-d H:i:s');

						if ($thumbnail != '') {
							//insert data
							$sql = "UPDATE user SET role_id = '$role',username = '$username',fullname = '$fullname',email = '$email',phonenumber = '$phonenumber',address = '$address',birthday = '$birthday',story = '$story',deleted = '$deleted',updated_at = '$updated_at',thumbnail = '$thumbnail' WHERE id = '$id'";
						} else {
							//insert data no avatar
							$sql = "UPDATE user SET role_id = '$role',username = '$username',fullname = '$fullname',email = '$email',phonenumber = '$phonenumber',address = '$address',birthday = '$birthday',story = '$story',deleted = '$deleted',updated_at = '$updated_at' WHERE id = '$id'";
						}

						execute($sql);
						echo 'success';
					} else {
						echo "Username đã tồn tại";
					}
				} else {
					echo "Email đã tồn tại !";
				}
			} else {
				echo "Username viết liền không dấu !";
			}
		} else {
			echo "Vui lòng nhập đầy đủ thông tin !";
		}
	} else {
		echo "Không có thông tin về người dùng này !";
	}
}



//login admin
function loginAdmin()
{
	$username = getPOST('username');
	$password = getPOST('password');
	$username = fixAllInput($username);
	$password = getPwdSecurity($password);

	if (!empty($username) && !empty($password)) {
		$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role_id = 1";
		$checkUser = executeResult($sql, true);
		if ($checkUser == null) {
			echo "Tài khoản hoặc mật khẩu không chính xác !";
		} else {

			//token
			$token = getPwdSecurity($checkUser['username'] . time());

			//lưu xuống cookie
			setcookie('token', $token, time() + 1 * 24 * 60 * 60, '/');

			//lưu session xuống
			$_SESSION['user'] = $checkUser;

			//lưu token vào database
			$user_id = $checkUser['id'];
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$created_at = date('Y-m-d H:i:s');

			$sql = "INSERT INTO token(user_id,token,created_at) VALUES ('$user_id','$token','$created_at')";
			execute($sql);

			echo "success";
		}
	} else {
		echo "Vui lòng nhập đầy đủ tài khoản và mật khẩu !";
	}
}

//reset pass user
function resetPasswordUser()
{
	$username = getPOST('username');
	if (preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$username = fixAllInput($username);
		$sql = "SELECT * FROM user WHERE username = '$username'";
		$checkUser = executeResult($sql);
		if ($checkUser != null) {
			$password = '123456'; //pass mặc định
			$password = getPwdSecurity($password);

			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$updated_at = date('Y-m-d H:i:s');
			$sql = "UPDATE user SET password = '$password',updated_at = '$updated_at' WHERE username = '$username'";
			execute($sql);
			echo "success";
		} else {
			echo "Username không tồn tại !";
		}
	} else {
		echo "Username viết liền không dấu !";
	}
}

//add User
function addUser()
{
	//get du lieu
	$username = getPOST('username');
	$fullname = getPOST('fullname');
	$email = getPOST('email');
	$deleted = getPOST('deleted');
	$role = getPOST('role');
	$password = getPOST('password');


	if ($username != '' && $fullname != '' && $email != '' && $deleted != '' && $role != '') {
		//check username định dạng
		if (preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			//check username
			$username = fixAllInput($username);
			$sql = "SELECT * FROM user WHERE username = '$username'";
			$checkUser = executeResult($sql);
			if ($checkUser == null) {
				//check email
				$email = fixAllInput($email);
				$sql = "SELECT * FROM user WHERE email = '$email'";
				$checkEmail = executeResult($sql);
				if ($checkEmail == null) {
					$fullname = fixAllInput($fullname);
					if ($password == '') {
						$password = '123456';
					}
					$password = getPwdSecurity($password);

					date_default_timezone_set("Asia/Ho_Chi_Minh");
					$created_at = $updated_at = date('Y-m-d H:i:s');

					$sql = "INSERT INTO user(username,fullname,email,password,role_id,deleted,thumbnail) VALUES('$username','$fullname','$email','$password','$role','$deleted','https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg')";
					execute($sql);
					echo "success";
				} else {
					echo "Email đã tồn tại trong hệ thống !";
				}
			} else {
				echo "Username đã tồn tại trong hệ thống !";
			}
		} else {
			echo "Username viết liền không dấu !";
		}
	} else {
		echo "Vui lòng nhập đầy đủ thông tin !!!";
	}
}


//ban User
function banUser()
{
	//get id từ form
	$id = getPOST('id');
	//fix all sql injection :))
	$id = fixAllInput($id);
	$id = str_replace('\'', '', $id);
	$id = str_replace('\"', '', $id);
	$id = str_replace('\\', '', $id);
	$id = str_replace('\\\\', '', $id);
	$id = str_replace(' ', '', $id);
	$id = str_replace('-', '', $id);

	//check User
	$sql = "SELECT * FROM user WHERE id = '$id' AND id NOT LIKE 1";
	$checkUser = executeResult($sql, true);
	if ($checkUser == null) {
		$res = [
			"status" => 0,
			"msg" => "Lỗi"
		];
		echo json_encode($res);
		die;
	}

	$sql = "UPDATE user SET deleted = 1 WHERE id = '$id'";
	execute($sql);
	$res = [
		"status" => 1,
		"msg" => $checkUser['username']
	];
	echo json_encode($res);
	die;
}

//unban user
function unbanUser()
{
	//get id từ form
	$id = getPOST('id');
	//fix all sql injection :))
	$id = fixAllInput($id);
	$id = str_replace('\'', '', $id);
	$id = str_replace('\"', '', $id);
	$id = str_replace('\\', '', $id);
	$id = str_replace('\\\\', '', $id);
	$id = str_replace(' ', '', $id);

	//check User
	$sql = "SELECT * FROM user WHERE id = '$id' AND deleted = 1";
	$checkUser = executeResult($sql, true);
	if ($checkUser == null) {
		$res = [
			"status" => 0,
			"msg" => "Lỗi"
		];
		echo json_encode($res);
		die;
	}

	$sql = "UPDATE user SET deleted = 0 WHERE id = '$id'";
	execute($sql);
	$res = [
		"status" => 1,
		"msg" => $checkUser['username']
	];
	echo json_encode($res);
	die;
}
