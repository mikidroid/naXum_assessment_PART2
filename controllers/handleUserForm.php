<?php
  include __DIR__.'/../utils/uploadService.php';
  include __DIR__.'/../model/user.php';
  
  //External function to get image filename
  $upl = upload_file($_FILES['picture']);
  $img_path=$upl['filename'];
  
  if(isset($img_path)){
    
      //If image is verified and stored succefully
      //Details to be inserted into User Model
      $details = [
        'name'=>$_POST['name'],
        'address'=>$_POST['address'],
        'card_cvc'=>$_POST['card_cvc'],
        'card_no'=>$_POST['card_no'],
        'picture'=>$img_path,
        'card_exp'=>$_POST['card_exp'],
        'birthdate'=>$_POST['birthdate'],
        ];
        
      //User Model to create new user
      $user = new User($details);
      $data = $user->Create($details);
      
      //When done, redirect user to complete page
      //Also return the registered data
      header('location:/complete.php?name='.$data['name']);
  }
  
  //Else show error
  else{echo 'Error with Profile Picture';}
?>