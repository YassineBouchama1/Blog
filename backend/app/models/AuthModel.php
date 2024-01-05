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


        // hashing password
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);


        $sql = "INSERT INTO `users`(`username`, `email`, `password`, `role`) VALUES (?, ?, ?, ?)";
        $sqlState = static::database()->prepare($sql);

        // Bind parameters
        $sqlState->bindParam(1, $this->username);
        $sqlState->bindParam(2, $this->email);
        $sqlState->bindParam(3, $hashedPassword);
        $sqlState->bindParam(4, $this->role);

        return $sqlState->execute();
    }


    // login  user by passing email and pass
    public function login()
    {
        $sqlState = static::database()->prepare("SELECT * FROM users WHERE email = ?");
        $sqlState->execute([$this->email]);

        $user = $sqlState->fetch(PDO::FETCH_ASSOC);

        // Check if a suser exists
        if ($user && password_verify($this->password, $user['password'])) {

            return $user;
        } else {

            return false;
        }
    }
}
