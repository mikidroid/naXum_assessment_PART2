<?php
  require '../database/connection.php';
  
  class User{
    
   public $name; 
   public $birthdate;
   public $address;
   public $picture;
   public $card_no;  
   public $card_cvc;  
   public $card_exp;  
   public $conn;
   
    public function __construct($user){
      
      //Setting parameters
      $this->name = $user['name'];
      $this->birthdate = $user['birthdate'];
      $this->address = $user['address'];
      $this->picture = $user['picture'];
      $this->card_no = $user['card_no'];
      $this->card_cvc = $user['card_cvc'];
      $this->card_exp = $user['card_exp'];
    }
    
    
    public function Create(){
      //Getting global connection instance for this method
      global $conn;
      //Function to create table if doesnt exists before proceeding
      $this->CreateTable();
      
      $sql= $conn->prepare("
        INSERT INTO users(name,birthdate,address,card_no,picture,card_cvc,card_exp) 
        VALUES(?,?,?,AES_ENCRYPT(?, ?),?,?,?)
      ");
      
      //Creating random secret string for AES_ENCRYPT
      $secret = str_shuffle('jsjjqrtakh1420asf2(&#&__+&(_$346&jj'); 
      //You could use this too -> substr(md5(mt_rand()), 0, 32);
      
      //Binding parameters with 'prepare method' to avoid sql attacks'
      $sql->bind_param("ssssssss",
         $this->name,
         $this->birthdate,
         $this->address,
         $this->card_no,  
         $secret,
         $this->picture,
         $this->card_cvc, 
         $this->card_exp  
      );
      
      //execute prepared sql statement
      $sql->execute();
      
      //Get an id of the inserted row
      $insertId = $conn->insert_id;
      $result = mysqli_query($conn,"SELECT * FROM users WHERE id = $insertId");
      $userData = mysqli_fetch_assoc($result);
 
      //close connections (statement and main connection)
      mysqli_close($conn);
      
      //Rrturn fetched data to requested function
      return $userData;
    }
    

    public function CreateTable(){
      
      global $conn;
      // Preparing my query, to check if table exists
      $sql = $conn->prepare("
         CREATE TABLE IF NOT EXISTS users 
         (
              id INTEGER PRIMARY KEY AUTO_INCREMENT,
              name VARCHAR(30),
              birthdate DATE,
              card_no VARCHAR(255),
              card_cvc VARCHAR(4),
              card_exp DATE,
              address VARCHAR(255),
              picture VARCHAR(255)
         )");
       
      //executing query
      $sql->execute();
      
    }
  }
?>