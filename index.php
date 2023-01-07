<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Naxum Assessment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
</head>

<body>

   <div class="layer">

    <!-- Main-->
    <div id="app" class="container">
      
        <div class="header text-dark text-center">
          User Info
        </div>
        <!-- Form -->
        <form action="controllers/handleUserForm.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
          </div>          
          <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate">
          </div>
          <div class="form-group">
            <label for="profile-picture">Profile Picture</label>
            <input type="file" class="form-control-file" id="profile-picture" name="picture">
          </div>
          <br/>
          <hr>
          
          <div class="form-group">
            <label for="credit-card">Credit Card</label>
            <input type="text" class="form-control" id="credit-card" name="card_no" placeholder="xxxx-xxxx-xxxx-xxxx">
          </div>
          <div class="rw">
              <div class="form-group">
                <label for="cvc">CVC</label>
                <input type="number" name="card_cvc" class="form-control cardCvc" id="card_cvc" placeholder="---">
              </div>
              <div class="form-group">
                <label for="card_exp">Card Expire Date</label>
                <input type="date" placeholder="02-08-22" class="form-control cardExp" id="card_exp" name="card_exp">
              </div>          
          </div>

          <br/>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      <!--End form -->
    </div>
    <!--End Main-->
   
   </div>
    
   <!--Scripts -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <!--End script-->
   
   <!--Style -->
   <style>
     *{
       font-size: 18;
     }
     .form-group{
       padding:10px 0px;
     }
     label{
       padding:5px 0px;
     }
     
     .rw{
       display:flex;
       justify-content: space-between;
     }
     .cardCvc{
       width: 100px;
     }
     .cardExp{
       width: 150px;
     }
     
     @media (max-width:576px){
           .header{
             margin:0px 0px 10px 0px;
             padding:0px 0px 10px 0px;
             font-weight: 900;
             font-size: 30px;
             border-radius: 10px;
           }
           button{
             width: 100%;
             padding: 10px 0px!important;
             border-radius: 20px!important;
             transition: 0.5s;
             background-image: linear-gradient(to right,pink,blue)!important;
           }
           button.focus{
             background-color: red!important;
             color: green!important;
           }
           .layer{
             height: 100vh;
             padding:20px 0px 50px 0px;
           }
           .container{
             border-radius: 15px;
             padding:20px 15px 50px 15px;
           }
     }
     
     @media (min-width:576px){
         .header{
           margin:0px 0px 20px 0px;
           padding:0px 0px 20px 0px;
           font-weight: 900;
           background-clip: linear-gradient(to right,pink,blue)!important;
           font-size: 30px;
           border-radius: 10px;
         }
         button{
           width: 100%;
           padding: 10px 0px!important;
           border-radius: 20px!important;
           background: none;
           outline: none!important;
           transition: 0.5;
           background-image: linear-gradient(to right,pink,blue)!important;
       
         }
         button:focus{
           background: red!important;
           transition: 0.5;
         }
         .layer{
           background-image: linear-gradient(to right,#34327c,purple)!important;
           height: 100vh;
           padding:40px 20px;
         }
         .container{
           background-color: white;
           border-radius: 15px;
           padding: 80px 70px;
         }
     }
   </style>
  <!--End Style -->
  
</body>

</html>

