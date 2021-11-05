<?php

require_once 'models/chores.php';

class choresController
{
    public function index()
    {
        $chores = new Chores();
        $showChores = $chores->getall();
        require_once 'views/chores/showall.php';
    }

    public function add()
    {
        require_once 'views/chores/add.php';
    }

    public function save()
    {
        if(isset($_POST))
        {
            $title = isset($_POST['title']) && $_POST['title'] ? $_POST['title'] : false;
            $content = isset($_POST['content']) && $_POST['content'] ? $_POST['content'] : false;

            if($title & $content)
            {
                $user_id = $_SESSION['user']->id;

                $chores = new Chores();
                $chores->setid(null);
                $chores->setidUsers($user_id);
                $chores->settitle($title);
                $chores->setcontent($content);

                $save = $chores->save();

                if($save)
                {
                    $_SESSION['save'] = true;  
                }else {
                    $_SESSION['save'] = false;
                }
            }else {
                $_SESSION['save'] = false;
            }
            
        header("Location: ".base_url."/chores/index");
        }
    }

    public function edit()
    {
        if(isset($_SESSION['user']))
        {
            $id = filter_var($_GET['id'], FILTER_VALIDATE_INT) ? $_GET['id'] : false;
            if($id)
            {
                $chores = new Chores();
                $result = $chores->edit($id);
                require_once 'views/chores/edit.php';
            }else {
                redirectIndex();
            }
        }else {
            redirectIndex();
        }
    }

    public function editsave()
    {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT) ? $_GET['id'] : false;

        if(isset($_POST) && $id)
        {
            $title = isset($_POST['title']) ? $_POST['title'] : false;
            $content = isset($_POST['content']) ? $_POST['content'] : false;

            if($title && $content)
            {
                $chores = new Chores();
                $chores->settitle($title);
                $chores->setcontent($content);
                $edit = $chores->savedit($id);

                if($edit)
                {
                    $_SESSION['alert'] = "Changes saved successfully";
                }
            }else {
                $_SESSION['alert'] = "An error has occurred, verify that all data is written correctly.";
            }
        }else {
            $_SESSION['alert'] = "An error has occurred, verify that all data is written correctly.";
        }
        header("Location: ".base_url."/chores/index");
    }

    public function main()
    {
        if(isset($_SESSION['user']))
        {
            if(!isset($_SESSION['user']))
            {
                redirectIndex();
                die();
            }
        }
        require_once 'views/chores/main.php';
    }

    public function close()
    {
        $result = false;
        if(isset($_SESSION['user']))
        {
            unset($_SESSION['user']);
            $result = true;
        }

        header("location: ".base_url. "/users/register");
        die();
        return $result;
    }

    public function delete()
    {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT) ? $_GET['id'] : false;
        if($id)
        {
            $chores = new Chores();
            $chores->delete($id);
        }

        header("Location: ".base_url."/chores/index");
    }

    public function search()
    {
        require_once 'views/chores/search.php';
    }

    public function savesearch()
    {
        if(isset($_POST['id_title']))
        {
            $id = filter_var($_POST['id_title'], FILTER_VALIDATE_INT) ? $_POST['id_title'] : false;

            $title = is_string($_POST['id_title']) ? $_POST['id_title'] : false;

            $id_title = $_POST['id_title'];

           $chores = new Chores();
           $resultado = $chores->search($id, $title);

           require_once 'views/chores/results.php';
        }
    }
}


?>