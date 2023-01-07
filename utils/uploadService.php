<?php

  function upload_file($file){
    if (isset($file)) {
      
        //Get file attr
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        
        //Set allowed files
        $allowed = ['jpg', 'jpeg', 'png'];
    
        //Check if extension is present in allowed list
        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 2097152) {
                  
                    //Create unique filename
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                    $file_destination = __DIR__.'/../files/uploads/' . $file_name_new;
                   
                    //Move uploaded file and return filename for database save
                    //Return error if not completed
                    if (move_uploaded_file($file_tmp, $file_destination)) 
                    {
                         $msg = "File uploaded successfully!";
                        return ['msg'=>$msg,'filename'=>$file_name_new];
                    } 
                    else
                    {
                        $msg = "Error uploading file!";
                        return ['msg'=>$msg,'filename'=>null];
                    }
                } 
                else 
                {
                    $msg = "File size too large!";
                    return ['msg'=>$msg,'filename'=>null];
                }
            } 
            else 
            {
                $msg = "Error uploading file!";
            }   return ['msg'=>$msg,'filename'=>null];
        } 
        else 
        {
            $msg = "Invalid file type!";
            return ['msg'=>$msg,'filename'=>null];
        }
     }
  }
?>
