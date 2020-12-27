<?php

namespace OOP;

 
class User {

    private $db;

    public function __construct(Database $db) 
    {   
        $this->db = $db;
        
    }

    public function index()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;

    }

    public function show($id)
    {
        
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        $show = $stmt->fetch();
        return $show;

    }
    public function login($username,$password1)
    {
    
        $sql = "SELECT * FROM users WHERE username = :username ";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute(['username'=> $username]);
        $user = $stmt->fetch();
       
        if (password_verify($password1, $user->password1) )
         {
            $_SESSION['username'] = $user->username;
            $_SESSION["login_time_stamp"] = time(); 
            $_SESSION['success'] = 'Successfully logged in ' .$user->username;
            
            header('location: index.php');

        }
        else{
            $_SESSION['danger'] = 'Invalid username or password';
            header('location: login.php');
            }

    }


    public function register($username,$email,$password1,$password2)
    {
        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username,email,password1,password2,created_at)
        VALUES (:username, :email, :password1, :password2, now())";
        $stmt = $this->db->connect()->prepare($sql);
        $user = $stmt->execute([':username' => $username,
                                ':email' => $email,
                                ':password1' => $hashed_password,
                                ':password2' =>$hashed_password,
                            ]);

        if ($user) {
            return true;
        }else{
        return false;
        }
               
 }
  public function validate($username,$email,$password1,$password2)
  {

 	if (!empty($username) && !empty($email) && !empty($password1) && !empty($password2)) {  
	  $userName = $this->verify_user($username);
	   if(!$userName){
		 if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
			if ($password1 == $password2) {
				$userEmail = $this->verify_email($email);
				if (!$userEmail) {
				   $register =	$this->register($username,$email,$password1,$password2);
				  if ($register) {
                    $_SESSION['success'] = "Succesfull registration now <a href='../login.php'><b>Log in</b></a>"; 
                    header('location: login.php');
                    exit();         
				}else{
					$_SESSION['danger'] = 'Registration Not Successful';
				}
			} else {
					$_SESSION['danger'] = 'Existing email'; 
				} 		
			}else {
				$_SESSION['danger'] = 'Incorect passwords';
			}
		}else {	
			$_SESSION['danger'] =  "This email adress isn't valid!";
		}		
	}else {
		$_SESSION['danger'] = "Exixting user";
	}	
	
}	else {
	$_SESSION['danger'] = "All fields must fill in!!!";
} 
 }

 public function verify_user($username)
    {

        $sql = "SELECT * FROM users WHERE username = :username ";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetchAll();
        
        if ($user ) {
           return true;
       }else{
          return false;
       }

    }

    public function verify_email($email)
    {

        $sql = "SELECT * FROM users WHERE email = :email ";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute(['email' => $email]);
        $email = $stmt->fetchAll();
        
        if ($email) {
           return true;
       }else{
        return false;
       }   

    }
    
    public function password_forgot($email)
    {

        $sql = "SELECT * FROM users WHERE email = :email ";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute(['email' => $email]);
        $email = $stmt->fetch();
        
        if ($email) {
            $token = bin2hex(random_bytes(50));
            $sql = "INSERT INTO password_reset(email, token) VALUES (:email, :token)";
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->execute(['email' => $email->email,'token'=> $token]);

            $to = $email->email;
            $subject = "Reset your password on http://oop.test";
            $msg = ' Hello there,
            Please click on link below 
            "http://oop.test/new_password.php?token='.$token.'&&email='.$to.'"
            to reset password';
            $headers = 'From: info@examplesite.com.';
            if (mail($to, $subject, $msg, $headers))
             {
                $_SESSION['success'] = "We send an email to  $to";
             }
           
            }else{
                $_SESSION['danger'] = "This user does not exist!!!";
            }

    }

    public function password_reset($password1,$password2,$email)
    {
      
         if (empty($password1) && empty($password2)) {
            $_SESSION['danger'] = "All fields must fill in!!!";
         }
         elseif ($password1 != $password2) {
            $_SESSION['danger'] = 'Incorect passwords';
         }else {
        
         $sql = "SELECT email FROM password_reset WHERE email = :email LIMIT 1";
         $stmt = $this->db->connect()->prepare($sql);
         $stmt->execute(['email'=>$email]);

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
         if ($result) {
            $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password1='$hashed_password' WHERE email=:email";
            $stmt = $this->db->connect()->prepare($sql);
            $query = $stmt->execute(['email'=>$email]);
            if ($query) {
                $_SESSION['success'] = "Successfully reset password <a href='../login.php'><b>Log in</b></a>";
            }
          
            else {
                $_SESSION['danger'] = "Failed";
            }
         }

      }

    }

    
    

    
 


}