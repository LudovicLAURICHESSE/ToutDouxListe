<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:14
 */

namespace DAL;


use model\Connexion;

class ToDoListGateway
{
    private $con;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($name, $username)
    {
        $query='INSERT INTO ToDoList VALUES(:list_name, :username)';
        if(!isset($username)){
            $this->con->executeQuery($query, array(
                ':list_name'=>array($name, \PDO::PARAM_STR),
                ':username'=>array($username, \PDO::PARAM_NULL)
        ));
        }else{
            $this->con->executeQuery($query, array(
                ':list_name'=>array($name, \PDO::PARAM_STR),
                ':username'=>array($username, \PDO::PARAM_STR)
        ));
        }
    }

    public function getAllPublicLists()
    {
        $query = 'SELECT * FROM ToDoList WHERE username=NULL ';
        $this->con->executeQuery($query);
    }
}