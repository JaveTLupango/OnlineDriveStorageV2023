
<style>
    .btn {
        margin-right: 1px;
        margin-top: 2px;
    }
    .hidden
    {
        display: none;
    }
</style>
<?php
if(!isset($_SESSION['userid']))
{
    $remainingFreeStorage = 1050625000;
}
?>
<input id="remainingGB" value="<?php echo $remainingFreeStorage; ?>" style="display:none;">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Uploaded File</h3>
              </div>
              <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="form">
                                    <div class="file-upload-wrapper" data-text="Select your file!">                    
                                        <div class="row">
                                            <div class="col-md-9">
                                                <!-- <input name="fileupload" id="fileupload" type="file" class="btn btn-file" value="" onchange="func_select();"> -->
                                                
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="inputGroupFile01"  value="" onchange="func_select();">
                                                    <label class="custom-file-label" for="inputGroupFile01" id="inputGroupFile01_label">Choose file</label>
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <button class="btn btn-info" id="btn_uploadfile" onclick="uploadFile()" disabled > Upload now</button>
                                            </div>   
                                        </div>  
                                    </div>
                                </div>                
                            </div><br>
                            <div class="container hidden" id="fileInfo">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">File Name: </div>  
                                        <div class="col-lg-12">
                                            <input id="filename" class="form-control" disabled>
                                        </div>  
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-12"> File type:</div>  
                                            <div class="col-lg-12">
                                                <input id="filetype" class="form-control" disabled>
                                            </div> 
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-12"> File size:</div>  
                                        <div class="col-lg-12">
                                            <input id="filesize" class="form-control" disabled>
                                        </div> 
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-12"> File status:</div>  
                                        <div class="col-lg-12">
                                            <input id="filestatus" class="form-control" disabled>
                                        </div> 
                                    </div><br>
                                            
                                    <div class="col-lg-12">
                                        <div class="col-lg-12"> File Description:</div>  
                                        <div class="col-lg-12">
                                            <textarea id="filedescription" class="form-control" onchange="func_FDMaxLenght();" maxlength="150"></textarea>
                                            <span id="lenth_max" style="float: right;">150</span><span style="float: right;">max : </span>
                                            <span id="warningDesc" style="float: left; color:red"></span>
                                        </div> 
                                    </div>             
                                </div>
                            </div>
                            <div class="container" id="progressbarLive" >                
                                
                            </div>                
                            <div class="container" id="progressHtml">  
                                <p id="loaded_n_total"></p>         
                                <p id="status"></p>
                            </div>
                            <br>
                            <div class="container hidden" id="share_link">
                                <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">Shared Link: </div>  
                                        <div class="col-lg-12">
                                        <input id="fileSharedLink" class="form-control" disabled value="">
                                        <button type="button" onclick="CopyLink()" class="btn btn-success">Copy Link</button>
                                        <a href="uploadfiles" class="btn btn-info" >Upload other files</a>
                                        </div>  
                                    </div>                        
                                </div>
                            </div>                
                        </div> 
                    </div>
                    <div class="card">
                        <div class="card-body">
                           <?php
                                $fileAdsName = $url."ads/horizontal.txt";
                                $file = fopen($fileAdsName, "r");
                                while(!feof($file)) {
                                  $line = fgets($file);
                                  echo $line . "<br>";
                                }
                                fclose($file);
                           ?>
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
                  <div class="row">
                        <div class=" col-6">
                        <?php
                                $fileAdsName = $url."ads/horizontal.txt";
                                $file = fopen($fileAdsName, "r");
                                while(!feof($file)) {
                                  $line = fgets($file);
                                  echo $line . "<br>";
                                }
                                fclose($file);
                           ?>
                        </div>
                        <div class=" col-6">
                                <?php
                                $fileAdsName = $url."ads/horizontal.txt";
                                $file = fopen($fileAdsName, "r");
                                while(!feof($file)) {
                                  $line = fgets($file);
                                  echo $line . "<br>";
                                }
                                fclose($file);
                           ?>
                        </div>
                            
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
</section> 


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo $url ?>config.js"></script>
<script >
var base_url = window.location.origin+'/'+folder_id+'file_downloads/link/';
var fileDesc = null;
function _(el)
{
    return document.getElementById(el);
}
function sampleFunc()
{
    var id = "FL20217201626757144";//res[1];
    fileDesc = "fileDescfileDescfileDesc"
         $.ajax({
                    type:"POST",   
                    url: "../files/layout/api/api.php",  
                    data: {
                        id : id,
                        filedescription : fileDesc
                    },
                    success:function(res) 
                    {
                         alert(res); 
                         _("fileSharedLink").value =base_url+res[1].toLowerCase()+'.html';                         
                    },
                    error: function(res)
                    {
                         alert(res);    
                    }
                });
}

function func_FDMaxLenght()
{
    debugger;
    var text_maxL = 150;
    var val_textL = _("filedescription").value;//_("lenth_max").val();
    var textA = text_maxL - val_textL.length;
    _("lenth_max").innerHTML = textA;

    let res = /^[a-zA-Z ]+$/.test(val_textL);
     if(res)
     {
        _("btn_uploadfile").removeAttribute("disabled");    
        _("warningDesc").innerHTML = "";//warningDesc    
     }
    else
     {             
        _("btn_uploadfile").setAttribute("disabled", "disabled");
        _("warningDesc").innerHTML = "Please input plain text only.";//warningDesc
     }
}

function uploadFile()
{
//   $.ajax({  type:"POST",
//       url : "../files/layout/sample.php",
//         success:function(a)
//         {
//             alert(a);
//         }
//     });

     fileDesc = _("filedescription").value;

    _("btn_uploadfile").setAttribute('disabled','disabled');
    _("inputGroupFile01").setAttribute('disabled','disabled');
    _("fileInfo").classList.add("hidden");
    _("progressHtml").classList.remove("hidden"); //    

            var file = _("inputGroupFile01").files[0];
			//alert(file.name);.
			var formdata = new FormData();
			formdata.append("inputGroupFile01", file);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler, false);
			ajax.addEventListener("load", completeHandler, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", "../files/layout/file_upload_parser.php");
			ajax.send(formdata);

    //var link = "https://stackoverflow.com/questions/584751/inserting-html-into-a-div";   
    //_("fileSharedLink").value = link;
}
function progressHandler(event)
{
    // body...
    _("loaded_n_total").innerHTML = "Uploaded "+ event.loaded + " bytes of " + event.total + " total bytes.";
    var percent = (event.loaded / event.total) * 100;
    //_("progressbar").value = Math.round(percent);
    var html_ = '<div class="progress" style=" height: 30px;   border-radius: 5px;">' +
                '<div class="progress-bar progress-bar-striped active" role="progressbar" id="progressbar" aria-valuenow="'+Math.round(percent)+'" aria-valuemin="0" aria-valuemax="100" style="width:'+Math.round(percent)+'%">' +
                Math.round(percent) +'%</div></div> '
    _("progressbarLive").innerHTML = html_;    
    _("progressbar").setAttribute('aria-valuenow',Math.round(percent));   
    _("status").innerHTML = Math.round(percent)+ "% upload.... Please Wait.."
}

function completeHandler(event)
{			
    debugger;
   // alert(event.target.responseText);    
   var ret = event.target.responseText;
   var res = ret.split("success-");
    _("status").innerHTML = res[0]; //event.target.responseText;
    _("share_link").classList.remove("hidden"); 
    if(res.length > 1)
    {
         var id = res[1];
         $.ajax({
                    type:"POST",   
                    url: "../files/layout/api/api.php",  
                    data: {
                        id : id,
                        filedescription : fileDesc
                    },
                    success:function(res1) 
                    {
                         _("fileSharedLink").value =base_url+res[1].toLowerCase()+'.html';                         
                    },
                    error: function(res1)
                    {
                         alert(res1);    
                    }
                });

        //_("fileSharedLink").value =base_url+res[1].toLowerCase()+'.html';
    }
    ///_("status").innerHTML = event.target.responseText;
    //_("progressbar").value = 0;
}

function errorHandler(event)
{			
    //_("status").innerHTML = "Upload Failed";
}

function abortHandler(event)
{			
   // _("status").innerHTML = "Upload aborted";
}
        
function func_select()
{
    
    debugger;
    var file = _("inputGroupFile01").files[0];
    var fileName = file.name;
    var a = fileName.split('.');
    var fileext = a[a.length - 1];
    var filesize = file.size;
    var filetype = file.type;
    var a_freeS = _("remainingGB").value;
    
    var _size = filesize_validator(filesize);
    var stat = filesize < (1050625000 * 2) && filesize < a_freeS ? "OK" : "Failed";
    _("filename").value = fileName;
    _("inputGroupFile01_label").innerHTML = fileName;
    _("filetype").value = filetype;
    _("filesize").value = _size;
    //_("fileextension").value = fileext;
    _("filestatus").value = stat;
    _("fileInfo").classList.remove("hidden");
    _("share_link").classList.add("hidden");
    _("progressHtml").classList.add("hidden");

    if (stat == "OK")
    {        
      _("btn_uploadfile").removeAttribute("disabled");
    }
    else
    {
        _("btn_uploadfile").setAttribute("disabled", "disabled");
    }

    //btn_uploadfile
    //1KB = 1025bit
    //1mb = 1000kb 
    //1gb = 1025mb

   
    //alert(sss);
}

function filesize_validator(size)
{
    debugger;
    var ret = "";
    if (size < 1025000)
    {
        ret = (size / 1025) + " KB";
    }
    else if(size < 1050625000)
    {
        ret = (size / 1025000) + " MB";
    }
    else{
        ret = (size / 1050625000) + " GB";
    }
    return ret;
}

function CopyLink()
      {        
       var copyText = document.getElementById("fileSharedLink");
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
      }

</script>