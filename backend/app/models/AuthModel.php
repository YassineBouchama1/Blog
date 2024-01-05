<?php



require 'BaseModel.php';

// use app\models\Model;

class AuthModel extends BaseModel
{

    private $username;
    private $email;
    private $password;
    private $role;






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






    // create user  by passing username email password and role
    public function register()
    {

        $sqlState = static::database()->prepare("INSERT INTO `users`(`username`, `email`, `password`, `role`) VALUES ('?','?','?','?')");
        return $sqlState->execute([$this->username, $this->email, $this->password, $this->role]);
    }


    // login  user by passing email and pass
    public function login()
    {
        $sqlState = static::database()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $sqlState->execute([$this->username, $this->password]);

        $user = $sqlState->fetch(PDO::FETCH_ASSOC);


        // Check if a user  exists
        if ($user) {
            // Auth successful
            return $user;
        } else {
            // Autj failed
            return false;
        }
    }
}
