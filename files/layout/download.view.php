<?php
// $FI_C = new FileInfoController();
// $ret = $FI_C->getFileInfo($conn, strtoupper($linkID));
// //echo $ret;
// //$d_json = json_decode($ret);
// foreach($ret as $row)
//     $id = $row['id'];
//     $base64Stringph = $url.''.$row['fileLoc'];
//     $fileName = $row['filename'];
//     $filesize= $row['filesize'];
//     $tdt= $row['tdt'];
//     $downloadNo = $row['downloads'];
//     $ext = $row['file_ext'];
//     $fileType = $row['filetype'];
//     $status = $row['status'];
//     $filedescription = $row['filedescription'];
//echo "_______". $d_json[0];

if(strpos($fileType, "image") !== false)
{
    $viewIMG = '<img src="'.$base64Stringph.'" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
}
elseif(strpos($fileType, "video") !== false)
{
  $viewIMG = '<img src="https://static.thenounproject.com/png/1813969-200.png" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
}
else if(strpos($fileType, "audio") !== false)
{
  $viewIMG = '<img src="https://iconarchive.com/download/i95107/trayse101/basic-filetypes-2/mp3.ico" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
}
elseif(strpos($fileType, "application") !== false && strpos($fileName, ".exe") !== false)
{
  $viewIMG = '<img src="https://icon-library.com/images/windows-exe-icon/windows-exe-icon-1.jpg" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
}
elseif(strpos($fileType, "application")!== false && (!strpos($fileName, ".exe")!== false))
{
  if(strpos($fileName, ".docx")!== false || strpos($fileName, ".docm")!== false || strpos($fileName, ".dot")!== false)  {
    $viewIMG = '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/.docx_icon.svg/1200px-.docx_icon.svg.png" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
  }
  else if(strpos($fileName, ".pdf")!== false)
  {
    $viewIMG = '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/PDF_icon.svg/896px-PDF_icon.svg.png" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
  }
  else if(strpos($fileName, ".xlsx")!== false || strpos($fileName, ".xlsm")!== false || strpos($fileName, ".xlsb")!== false || strpos($fileName, ".xltx")!== false)
  {
    $viewIMG = '<img src="https://icones.pro/wp-content/uploads/2021/04/icone-excel-vert.png" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
  }
  else if(strpos($fileName, ".apk")!== false)
  {
    $viewIMG = '<img src="https://icones.pro/wp-content/uploads/2021/04/icone-robot-android-bleu.png" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
  }
  else
  {  
    $viewIMG = '<img src="https://icon-library.com/images/application-icon/application-icon-20.jpg" alt="'.$fileName.'" class="img-rounded img-responsive" height="300px;">';
  }
}
else
{
  $viewIMG = '<img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/Symbol_Resin_Code_7_OTHER.svg" alt="'.$fileName.'" class="img-rounded img-responsive" height="200px;">';  
}

?>
<style>
  img {
    pointer-events: none;
  }

  </style>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Download File</h3>
              </div>
              
              <div class="card-deck">
                <div class="card">                  
                  <div class="card-body">
                              <div class="thumbnail thumbnail-downloadimage">
                                <?php echo $viewIMG; ?>
                                  <div class="caption">
                                          <h2 class="dfname" style="text-overflow:'...png ';max-width:658px;"><?php echo  $fileName ?> <br>
                                          <small><?php echo $FI_C->FileSizeValidator($filesize). " ";?></small></h2>
                                              <!-- <a href="" class="btn btn-danger btn-xs pull-right btn-report-file">
                                                <i class="fa fa-warning"></i> 
                                                <span>Report File</span>
                                              </a> -->
                                              <p class="text-left small">Uploaded on: <strong><?php echo $tdt ?></strong><br>
                                                              Downloads: <strong><?php echo $downloadNo; ?></strong>
                                              </p>                                
                                      </div> 
                                      <div id="btn_link" >
                                        
                                      </div>
                                      <div id="btn_link1" class="invisible">
                                          <a href="<?php echo $base64Stringph; ?>" style="width:300px;" download="<?php echo $fileName; ?>" 
                                            onclick="UpdateDownload(<?php echo $id;?>)" class="btn btn-lg btn-block btn-success">
                                              <i class="fa fa-download fa-fw"></i> 
                                              <span class="dwnin">Ready to Download</span> 
                                              <i class="fa fa-download fa-fw"></i>
                                            </a>    
                                      </div>
                                      <p>File Description: <?php echo $filedescription; ?></p>
                                        <!-- -->
                              </div>
                  </div>
                </div>
                <div class="card">                  
                  <div class="card-body">
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
                  </div>
                </div>
              </div>
            
            </div> 
          </div>          
        </div>
      </div>
</section> 

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Advertisement</h3>
              </div>
              <div class="card-body">
                   <div class=" col-12">
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
                   </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section> 

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function(){
    var cnt = 0;
  function _(el)
    {
        return document.getElementById(el);
    }

  var timeleft = 21;
  var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  if(timeleft == 0)
  {
    _("btn_link").innerHTML = '';
    _("btn_link1").removeAttribute('class');
  }
  else
  {
    _("btn_link").innerHTML = '<button class="btn btn-lg btn-download btn-block btn-danger" id="downloadButton" style="width:300px;">' +
                             '       ' +
                             '       <span class="dwnin" id="dwnin"> Please Wait... '+ (timeleft-1) +' second(s)</span>  ' +
                             '      <i class="fa fa-clock fa-fw"></i> ' +
                             '    </button>';
  }
 
  //_("dwnin").innerHTML = timeleft;
  timeleft -= 1;
}, 1000);    

    // _("btn_link1").display = "block";

  function DownloadFiles(id)
  {
    alert(id);
  }


});

function UpdateDownload(id)
{
  debugger;
  $.ajax({
                      type: "POST",
                      url: "../../files/layout/api/downloadFileAPI.php",
                      data: {
                          id:id
                      },
                      success:function(a)
                      {   
                        document.getElementById("btn_link1").hidden = true;
                        document.getElementById("btn_link").hidden = true;
                      },
                      error:function(b)
                      {

                      }
                      });
}
</script>