<?php 
    
    if(isset($_GET['id']))
    {
        try {

            include_once('https/Controller/AuthController.php');
            include_once('https/config/conn.php');

            $C_Auth = new AuthController();
            $c_con = new ClassConnection();
            $conn = $c_con->f_connection();

            $hash = $_GET['id'];
            $sp_string = explode("%$2y$10$%", $hash);
            $userpass = $sp_string[0];
            $uid = $sp_string[1];

            if($C_Auth->auth_updateVerify($conn, $uid, $userpass))
            {
                if($C_Auth->auth_updateVerifiedUser($conn, $uid))
                {
                    ?>
                    
                    <center>
                            <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div> <br>

                    <h1>Successfully Verified!</h1>
                         <p>
                            Thank you for proceeding the step for becoming one of the PHfiler team community.<br>
                            proceed to <a href="file_uploads/login">Login </a>
                        </p>

                        <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                    </center>                
                 <?php
                }
                else
                {
                    ?>
                    <center> 
                        <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div> <br>
                             <h1> Error during Validation!</h1>
                         <p>
                            Please contact support team and provide this screenshot and your using email. <br>
                            Thank you..                         </p>
                    </center>       
                    <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>         
                 <?php
                }
                
            }
            else
            {
                ?>
                <center>
                <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div> <br>
                             <h1> Invalid URL 400!</h1>
                     <p>Invalid keys or Unknown Request! <br> Please return to main homepage</p>
                </center>    
                <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>            
             <?php
            }

        }
        catch(Exception $e)
        {
            ?>
            <center>
            <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div> <br>
                             <h1> Error Catch occurs! 404 </h1>
                 <p>Invalid keys or Unknown Request! <br> Please return to main homepage</p>
            </center>
            <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
         <?php
        }

    }
    else
    {
        ?>
           <center> <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div> <br>
                             <h1> Error occurs! 404 </h1>
                <p>Invalid keys or Unknown Request! <br> Please return to main homepage</p>
           </center>
           <div class="thumbnail thumbnail-downloadimage">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5125544300826919"
                                    crossorigin="anonymous"></script>
                                <!-- OnlineDrive Ads -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-5125544300826919"
                                    data-ad-slot="3916800339"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
        <?php
    }
?>