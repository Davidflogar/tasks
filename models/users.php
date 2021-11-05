<?php

class Users
{
    private $id;
    private $first_name;
    private $last_name;
    private $password;
    private $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "crud");
    }

    /*Getter*/
    public function getid()
    {
        return $this->id;
    }

    public function getfirst_name()
    {
        return $this->first_name;
    }

    public function getlast_name()
    {
        return $this->last_name;
    }

    public function getpassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    /*SETTER*/
    public function setid($id)
    {
        $this->id = $id;
    }

    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    public function setpassword($password)
    {
        $this->password = $password;
    }


    public function save()
    {
        $result = "false";
        $sql = "INSERT INTO users VALUES(null, '{$this->first_name}', '{$this->last_name}', '{$this->getpassword()}')";
        $query = $this->db->query($sql);
        $result = $this->db->errno;
        if($query)
        {
            $result = "true";
        }elseif($result == 1062)
        {
            $result = 1062;
        }

        return $result;
    }

    public function login()
    {
        $result = false;
        $first_name = $this->first_name;
        $password = $this->password;

		$sql = "SELECT * FROM users WHERE first_name = '$first_name'";
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$user = $login->fetch_object();
			
			$verify = password_verify($password, $user->password);
			
			if($verify){
				$result = $user;
			}
		}

        return $result;
    }

}


?>