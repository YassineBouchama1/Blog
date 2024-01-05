<?php



require 'Model.php';

use app\models\Model;

class UserModel extends Model
{

    private $id;
    private $username;
    private $email;
    private $password;
    private $role;





    // Setter for id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Setter for id
    public function setRole($role)
    {
        $this->role = $role;
    }

    // Setter for username
    public function setUsername($username)
    {
        $this->username = $username;
    }



    // Setter for email
    public function setEmail($email)
    {
        $this->email = $email;
    }



    // Setter for password
    public function setPassword($password)
    {
        $this->password = $password;
    }



    // return all users order by desc
    public static function latest()
    {
        return static::database()->query('SELECT * FROM users order by id DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }


    // get user id by  id
    public static function find($userID)
    {
        return static::database()->query("SELECT * FROM users WHERE user_id =  $userID")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // create user  by passing username email password and role
    public function create()
    {

        $sqlState = static::database()->prepare("INSERT INTO `users`(`username`, `email`, `password`, `role`) VALUES ('?','?','?','?')");
        return $sqlState->execute([$this->username, $this->email, $this->password]);
    }


    //update user
    public function update()
    {

        $sql = "UPDATE users SET ";
        $params = [];


        // if  equal null thats mean won't update that column

        if ($this->username !== null) {
            $sql .= "username=?, ";
            $params[] = $this->username;
        }

        if ($this->password !== null) {
            $sql .= "role=?, ";
            $params[] = $this->role;
        }

        
        // Remove the trailing comma and space from  string
        $sql = rtrim($sql, ", ");

        $sql .= " WHERE id=?";
        $params[] = $this->id;

        $sqlState = static::database()->prepare($sql);

        return $sqlState->execute($params);
    }
}
