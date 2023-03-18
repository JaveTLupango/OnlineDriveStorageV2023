<div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Sign in your account</p>
      <form action="" method="post">       
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="yes" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" name="login" id="loginBtn" onclick="func_loginBtn()" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="register" class="text-center">I dont have account.</a><br/>
      <a href="forgotpassword" class="text-center">Forgot Password</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  <script>
    var base_url = window.location.origin+'/';
      function _(el)
      {
          return document.getElementById(el);
      }

      function func_loginBtn()
      {
        var email = _("email").value;
        var password = _("password").value;
        const cb = document.querySelector('#agreeTerms');
        
        if(cb.checked)
        {
            $.ajax({
                  type: "POST",
                  url: "../https/API/Auth_Api.php",
                  data:{
                    email: email,
                    password: password
                  },
                  success:function(a)
                  {
                    if(a == "success")
                    {
                      Swal.fire({
                              title: 'Successfully Login',
                              text: "Please Click Ok to preceed!",
                              icon: 'success',
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Ok'
                            }).then((result) => {
                              if (result.isConfirmed) {
                                window.location.href = "../file_uploads/uploadfiles";
                              }
                            })
                    }
                    else
                    { 
                      Swal.fire(
                        'Something Wrong!',
                        a,
                        'error'
                      )
                    }
                  
                  },
                  error:function(a)
                  {
                    Swal.fire(
                        'Something Wrong!',
                        a,
                        'warning'
                      )
                  }
            });
        }
        else
        {
          Swal.fire(
                        'Something Wrong!',
                        "You need to Agree the Terms to Proceed.",
                        'warning'
                      )
        }        
      }
     
  </script>