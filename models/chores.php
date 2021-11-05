<?php

class Chores
{
    private $id;
    private $id_users;
    private $title;
    private $content;
    private $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "crud");
    }

    /*GETTER*/
    public function getid()
    {
        return $this->id;
    }

    public function getidUsers()
    {
        return $this->id_users;
    }

    public function gettitle()
    {
        return $this->title;
    }

    public function getcontent()
    {
        return $this->content;
    }

    /*Setter*/

    public function setid($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }

    public function setidUsers($id_users)
    {
        $this->id_users = $this->db->real_escape_string($id_users);
    }

    public function settitle($title)
    {
        $this->title = $this->db->real_escape_string($title);
    }

    public function setcontent($content)
    {
        $this->content = $this->db->real_escape_string($content);
    }

    public function getall()
    {
        $user_id = $_SESSION['user']->id;

        $allchores = $this->db->query("SELECT * FROM chores WHERE id_users = $user_id");
        return $allchores;
    }

    public function save()
    {
        $sql = "INSERT INTO chores VALUES(null,$this->id_users,'$this->title','$this->content',CURDATE())";
        $result = $this->db->query($sql);
        return $result;
    }

    public function edit($id)
    {
        $user_id = $_SESSION['user']->id;

        $sql = "SELECT * FROM chores WHERE id_users = $user_id AND id = $id";

        $result = $this->db->query($sql);

        return $result;
    }
    
    public function savedit($id_query)
    {
        $id_user = $_SESSION['user']->id;
        $result = false;

        $sql = "UPDATE chores SET title='$this->title', content='$this->content' WHERE id=$id_query AND id_users=$id_user";
        $query = $this->db->query($sql);
        if($query)
        {
            $result = $query;
        }
        return $result;
    }

    public function delete($id)
    {
        $id_user = $_SESSION['user']->id;
        $result = false;
        
        $sql = "DELETE FROM chores WHERE id=$id AND id_users=$id_user";
        $query = $this->db->query($sql);

        if($query)
        {
            $result = $query;
        }

        return $query;
    }

    public function search($id, $title)
    {
        $result = null;
        $id_user = $_SESSION['user']->id;

        $search_id = "SELECT * FROM chores WHERE id=$id AND id_users=$id_user LIMIT 1";
        $query_id = $this->db->query($search_id);

        $search_title = "SELECT * FROM chores WHERE title='$title' AND id_users=$id_user LIMIT 1";
        $query_title = $this->db->query($search_title);

        if($query_id)
        {
            $result = $query_id;

        }elseif($query_title)
        {
            $result = $query_title;
        }

        return $result;

    }
}

?>