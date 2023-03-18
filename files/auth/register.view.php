<div class="card">
    <div class="card-body register-card-body" id="RegisterSuccess" hidden>  
        <button class="btn btn-success mb-3 form-control">Success!</button> 
                      <button type="button" class="btn btn-outline-info mb-3 form-control" style=" height: 100%; ">
                      System Generated Email. Use it to Verify your Email.
                      </button> 
    </div>            

    <div class="card-body register-card-body" id="Register">    
      <p class="login-box-msg">Register a new membership</p>          
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="fullName" Name="Fullname" value="" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="8">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="confirmPassword" name="password2" placeholder="Retype password" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" id="register" onclick="func_RegisterBtn()" name="register" class="btn btn-primary btn-block">Register</button>

            <button type="submit" id="registerloader" name="register" class="btn btn-primary btn-block" hidden>
            <i class="fa fa-spinner fa-spin"></i> Loading</button>
          </div>
          <!-- /.col -->
        </div>
      <a href="login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  <script>
      var base_url = window.location.origin+'/';
      function _(el)
      {
          return document.getElementById(el);
      }

      function func_RegisterBtn()
      { debugger;
        _("register").setAttribute("hidden","hidden");
        _("registerloader").removeAttribute("hidden","hidden");
        var fullName = _("fullName").value;
        var email = _("email").value;
        var password = _("password").value;
        var confirmPassword = _("confirmPassword").value;
        const cb = document.querySelector('#agreeTerms');
        let FullNameRegx = /^[a-zA-Z ]+$/.test(fullName);
        if(cb.checked)
        {
            if(!FullNameRegx)
            {
              Swal.fire(
                        'Something Wrong!',
                        "Please input your fullname is plain text!",
                        'warning'
                      )
                      
                _("registerloader").setAttribute("hidden","hidden");
                _("register").removeAttribute("hidden","hidden");

            }
            else if(email.toUpperCase().includes("DROP") 
                  || email.toUpperCase().includes(";") 
                  || email.toUpperCase().includes("DELETE")
                  || email.toUpperCase().includes("'"))
            {
              Swal.fire(
                        'Something Wrong!',
                        "Please Input a valid email adress!",
                        'warning'
                      )
                      
                _("registerloader").setAttribute("hidden","hidden");
                _("register").removeAttribute("hidden","hidden");
            }            
            else if(password.toUpperCase().includes("DROP") 
                  || password.toUpperCase().includes(";") 
                  || password.toUpperCase().includes("DELETE")
                  || password.toUpperCase().includes("'")
                  || confirmPassword.toUpperCase().includes("DROP") 
                  || confirmPassword.toUpperCase().includes(";") 
                  || confirmPassword.toUpperCase().includes("DELETE")
                  || confirmPassword.toUpperCase().includes("'"))
            {
              Swal.fire(
                        'Something Wrong!',
                        "Please input a valid password!",
                        'warning'
                      )
                          
                _("registerloader").setAttribute("hidden","hidden");
                _("register").removeAttribute("hidden","hidden");
            }
            else if(password!=confirmPassword)
            {
              Swal.fire(
                        'Something Wrong!',
                        "Password is not match!",
                        'warning'
                      )
                      
                _("registerloader").setAttribute("hidden","hidden");
                _("register").removeAttribute("hidden","hidden");
            }
            else
            {
              try
              {
                $.ajax({
                    type: "GET",
                    url: base_url+"https/API/Auth_Register2.php",
                    data:{
                      fullname: fullName,
                      email: email,
                      password: password,
                      password2: confirmPassword,
                    },
                    success:function(a)
                    {
                      debugger;
                      if(a == "success")
                      {
                        Swal.fire({
                                title: 'Successfully Registered',
                                text: "Please Click Ok to preceed!",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ok'
                              }).then((result) => {
                                if (result.isConfirmed) {
                                  window.location.href = base_url+"file_uploads/successregister";
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
                        
                        _("registerloader").setAttribute("hidden","hidden");
                        _("register").removeAttribute("hidden","hidden");
                      }
                    
                    }
                });
              }
              catch(ctr)
              {
                Swal.fire(
                        'Something Wrong!',
                        ctr,
                        'error'
                      )
                      
                  _("registerloader").setAttribute("hidden","hidden");
                  _("register").removeAttribute("hidden","hidden");
              }            

            }
        }else
        {
          Swal.fire(
                        'Something Wrong!',
                        "You need to Agree the Terms to Proceed.",
                        'warning'
                      )
                      
              _("registerloader").setAttribute("hidden","hidden");
              _("register").removeAttribute("hidden","hidden");
        }  
      }

  </script>