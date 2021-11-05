<?php
require_once 'models/users.php';

class usersController
{
    public function register()
    {
        require_once 'views/users/register.php';
    }

    public function login()
    {
        require_once 'views/users/login.php';
    }

    public function save()
    {
        if(isset($_POST))
        {
            $first_name = isset($_POST['first_name']) && preg_match("/['a-z A-Z']/ ", $_POST['first_name']) ? $_POST['first_name'] : false;
            $last_name = isset($_POST['last_name']) && preg_match("/['a-z A-Z']/ ", $_POST['last_name'])  ? $_POST['last_name'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($first_name && $last_name && $password)
            {
                $users = new Users();
                $users->setFirst_name($first_name);
                $users->setLast_name($last_name);
                $users->setpassword($password);

                $save = $users->save();

                $error = $save;

                if($save == "true")
                {
                    $_SESSION['register'] = "true";

                }elseif($error == 1062)
                {
                    $_SESSION['error'] = true; 
                }
                else
                {
                    $_SESSION['register'] = "false";
                }
            }else
            {
                $_SESSION['register'] = "false";
            }
        }
        header("Location: ".base_url."/users/register");
    }

    public function sesion()
    {
        if(isset($_POST))
        {
            $first_name = isset($_POST['first_name']) && preg_match('/[a-z A-Z ]/ ', $_POST['first_name']) ? $_POST['first_name'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            $users = new Users();
            $users->setFirst_name($first_name);
            $users->setpassword($password);

            $account = $users->login();
			
			if($account && is_object($account)){
				$_SESSION['user'] = $account;
                redirectIndex();
                die();
			}else{
				$_SESSION['error_login'] = 'Login failed';
			}
		
		}
		header("Location: ".base_url."/users/login");
    }
}


?>