<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="scripts.css">
</head>
<body>
    <?php 
        $conn = mysqli_connect('localhost','root','root','login_system','3307');
        if(!$conn){
            echo("connection error ".mysqli_connect_error());
        }    
        if(!empty($_POST)) { 
            $username="username";
        
            $sql = "SELECT * FROM user where user.username = '$_POST[$username]'";
        
            $result = mysqli_query($conn,$sql);
            $user = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
            if(count($user)==0){
                echo("<script>alert('Username not found')</script>");
            }  
            else if($user[0]['password']!=$_POST['password']){
                echo("<script>alert('Password invalid')</script>");
            }
            else{
                header("Location: http://localhost/Form/home.html");
            }
        }   
    ?>
    <div class="container justify-items-center align-items-center">
        <div class="row">
            <div id="behind" class="col-12 col-md-8 offset-md-2">
                <div  class="card">
                    <div class="row">
                        <div class="col-6 offset-6">
                          <div class="card text-center border-0" id="right">
                            <div class="card-body">
                              <h5 class="card-title" id="text-toggle">Don't have an account?</h5>
                              <a href="#" class="btn btn-primary" id="button-toggle">Sign-up</a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-md-3 col-7 col-md-3 card-img-overlay">
                <div id="sign-up" class="bg-warning py-3 card">
                  <div class="card-body ">
                    <h5 class="card-title text-center">Sign-up</h5>
                    <form>

                    </form>
                  </div>
                </div>
            </div>
        </div>  
            <div class="offset-md-3 col-7 col-md-3 card-img-overlay">
                <div id="front" class="pt-3 pb-2 card">
                  <div class="card-body ">
                    <h5 class="card-title text-center">Login</h5>
                    <form action="index.php" class="needs-validation" novalidate method="POST"> 
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="username" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please choose a password.
                        </div>
                    </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">Remember me</label>
                      </div>
                      <div class="d-flex flex-column align-items-center" id="login">
                          <button type="submit" class="px-5 btn btn-primary">Log in</button>
                      </div>
                      </form>
                  </div>
                </div>
            </div>
            
    </div>
    <script>
      let text1 = "Don't have an account?";
      let text2 = "Already have an account?";
      $("#button-toggle").on('click', function() {
          if($("#text-toggle").text() === text1) {
              $("#text-toggle").text(text2);
              $("#button-toggle").text("Log-in");
              $($("#front").parent()).fadeOut();
              $($("#sign-up").parent()).fadeIn();
          }
          else if($("#text-toggle").text() === text2) {
              $("#text-toggle").text(text1);
              $("#button-toggle").text("Sign-up");
              $($("#front").parent()).fadeIn();
              $($("#sign-up").parent()).fadeOut();
          }
      });

      $($("#sign-up").parent()).fadeOut(1);
      (function() {
          'use strict';
          window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              
              var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                          event.preventDefault();
                          event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                  }, false);
              });       
          }, false);
      })();

    </script>

</body>
</html>