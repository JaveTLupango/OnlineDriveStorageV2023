<?php

/**
 * Sending email Controller
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'email/PHPMailer/vendor/autoload.php';

class  Email_Controller
{
    function sendEmailForgotPassword($userEmail, $BodyContent, $tousername, $subject)
    {
        try
        {
            require 'config.php';
            $mail = new PHPMailer(true);
            //Server settings
            //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.hostinger.ph';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $system_Email;                 // SMTP username
            $mail->Password = $system_emailpass;                     // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ));
            //Recipients
            $mail->setFrom($system_Email, 'Support Team');
            $mail->addAddress($userEmail, $tousername);
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $BodyContent;
            $mail->send(); 
            return 'send';
        }
		catch (Exception $e)
		{			
			return $e->getMessage();
		}
    }


    ///
    ///email_Content_Func
    ///
    function email_Content_Func($systemname, $tousername, $codegenerated, $content1, $content2, $content3)
    {
        return '
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" width="860">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" bgcolor="#673DE6" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" bgcolor="#673DE6" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border-top:11px solid #673de6;border-collapse:initial">
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                        <tbody>
                                                            <tr>
                                                                <td height="21" class="m_-5350758594985752526spacingHeight-30" style="line-height:30px;min-height:30px"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" style="padding:0px 120px" class="m_-5350758594985752526mlContentOuter">
                                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="left">
                                                                                   <h1>'. $systemname .'</h1>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                        <tbody>
                                                            <tr>
                                                                <td height="20" class="m_-5350758594985752526spacingHeight-20" style="line-height:20px;min-height:20px"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" class="m_-5350758594985752526mlContentOuter">
                                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="620" style="border-top:1px solid #dadce0;border-collapse:initial" class="m_-5350758594985752526mlContentTable">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="20" style="line-height:10px;min-height:10px">
                                                                                    <img src="https://ci5.googleusercontent.com/proxy/BFWENKPKa5rpWxb3WQg_EEMZRszPGOVy6hOHfJdaNDMvFPJ8ffo214JW3x7hc2jEE5bJdbbYuXhLlT7UZhRiLw=s0-d-e1-ft#https://cdn.hostinger.com/mailer/spacerv2.gif" width="1" height="1" border="0" alt="" style="display:block"
                                                                                        class="CToWUd">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                        <tbody>
                                                            <tr>
                                                                <td height="10" style="line-height:10px;min-height:10px"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" style="padding:0px 120px" class="m_-5350758594985752526mlContentOuter">
                                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td id="m_-5350758594985752526bodyText-10" style="font-family:Helvetica,sans-serif;font-size:14px;line-height:24px;color:#727586">
                                                                        <p style="margin-top:0px;margin-bottom:0px;line-height:32px;font-weight:400px;font-size:16px"><span class="im">Hello '. $tousername .',<br><br>
                                                                        '. $content1.'<br>
                                                                        <br></span><b><h1 style="font-size: 100px;">'.$codegenerated.'</h1></b><span class="im"><br>
                                                                        <br>'.$content2.'<br>
                                                                        <br>'.$content3.'</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                        <tbody>
                                                            <tr>
                                                                <td height="17" class="m_-5350758594985752526spacingHeight-20" style="line-height:20px;min-height:20px"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table><span class="im">
                          <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                            <tbody><tr>
                              <td>
                                <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                  <tbody><tr>
                                    <td>
                                      <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                        <tbody><tr>
                                          <td height="20" class="m_-5350758594985752526spacingHeight-20" style="line-height:20px;min-height:20px"></td>
                                        </tr>
                                      </tbody></table>
                                      <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                        <tbody><tr>
                                          <td align="center" class="m_-5350758594985752526mlContentOuter">
                                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="620" style="border-top:1px solid #dadce0;border-collapse:initial" class="m_-5350758594985752526mlContentTable">
                                              <tbody><tr>
                                                <td height="10" style="line-height:10px;min-height:10px">
                                                  <img src="https://ci5.googleusercontent.com/proxy/BFWENKPKa5rpWxb3WQg_EEMZRszPGOVy6hOHfJdaNDMvFPJ8ffo214JW3x7hc2jEE5bJdbbYuXhLlT7UZhRiLw=s0-d-e1-ft#https://cdn.hostinger.com/mailer/spacerv2.gif" width="1" height="1" border="0" alt="" style="display:block" class="CToWUd">
                                                </td>
                                              </tr>
                                            </tbody></table>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                  </tr>
                                </tbody></table>
                              </td>
                            </tr>
                          </tbody></table>
                        <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                            <tbody><tr>
                                <td>
                                    <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                        <tbody><tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody><tr>
                                                        <td height="10" style="line-height:10px;min-height:10px"></td>
                                                    </tr>
                                                </tbody></table>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody><tr>
                                                        <td align="center" style="padding:0px 120px" class="m_-5350758594985752526mlContentOuter">
                                                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                                                <tbody><tr>
                                                                    <td id="m_-5350758594985752526bodyText-16" style="font-family:Helvetica,sans-serif;font-size:14px;line-height:13px;color:#6f6f6f">
                                                                        <p style="margin-top:0px;margin-bottom:0px;line-height:24px"><span style="color:rgb(114,117,134)">
                                                                        <a href="https://www.facebook.com/javelupango/" style="word-break:break-word;font-family:Helvetica,sans-serif;color:#727586;font-weight:400px;text-decoration:underline" target="_blank" data-saferedirecturl="">Facebook</a>&nbsp;·&nbsp;
                                                                        <a href="https://www.instagram.com/iamjave12/?fbclid=IwAR3ed5UuAHJXJljHWreZL_JwuCU2vtzJ_f8xB95baMSltRj3Yv1RuM1PfSA" style="word-break:break-word;font-family:Helvetica,sans-serif;color:#727586;font-weight:400px;text-decoration:underline" target="_blank" data-saferedirecturl="">Instagram</a>&nbsp;·&nbsp;
                                                                        <a href="https://javelupango.com/?fbclid=IwAR2I5K6yQ3sxT7LND-5sNLVZRt1hvE8KTP6KbmzBGTsjoaT5KeYa7PuB18s" style="word-break:break-word;font-family:Helvetica,sans-serif;color:#727586;font-weight:400px;text-decoration:underline" target="_blank" data-saferedirecturl="">Website</a></span>·&nbsp;
                                                                        <a href="https://codelife.javelupango.com/?fbclid=IwAR0b04SDmxaLEZBPEIW85FQVLn1rY9iZ0J2RcR2iipAQbd1WxzxjMVGtv5A" style="word-break:break-word;font-family:Helvetica,sans-serif;color:#727586;font-weight:400px;text-decoration:underline" target="_blank" data-saferedirecturl="">CodeLife</a></span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                <tbody>
                    <tr>
                        <td height="15" class="m_-5350758594985752526spacingHeight-20" style="line-height:15px;min-height:15px"></td>
                    </tr>
                </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
    
        
        <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
            <tbody>
                <tr>
                    <td>
                        <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                            <tbody>
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="padding:0px 120px" class="m_-5350758594985752526mlContentOuter">
                                                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td id="m_-5350758594985752526bodyText-18" style="font-family:Helvetica,sans-serif;font-size:14px;line-height:24px;color:#727586">
                                                                        <p style="margin-top:0px;margin-bottom:0px;line-height:24px"><span style="font-size:14px"><span style="font-size:14px">
                                                                        <span style="font-size:14px">
                                                                        <span style="color:#727586">© 2020 Jave.</span><br><br>
                                                                        <span style="color:#727586"> <b> NOTE: Do not Reply, This email is System Generated. Thank you and Godbless.. :) </b></span>
                                                                    </span>
                                                                            </span>
                                                                            </span>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                            <tbody>
                                                <tr>
                                                    <td height="35" class="m_-5350758594985752526spacingHeight-20" style="line-height:20px;min-height:20px"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        </span>
        </td>
        </tr>
        </tbody>
        </table>';
    }

    function email_ContentVerify_Func($systemname, $tousername, $codegenerated, $content1, $content2) 
    {
        return '
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" width="860">
    <tbody>
        <tr>
            <td>
                <table align="center" border="0" bgcolor="#673DE6" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                    <tbody>
                        <tr>
                            <td>
                                <table align="center" bgcolor="#673DE6" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border-top:11px solid #673de6;border-collapse:initial">
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                    <tbody>
                        <tr>
                            <td>
                                <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody>
                                                        <tr>
                                                            <td height="21" class="m_-5350758594985752526spacingHeight-30" style="line-height:30px;min-height:30px"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="padding:0px 120px" class="m_-5350758594985752526mlContentOuter">
                                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="left">
                                                                                <h1>'. $systemname .'</h1>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody>
                                                        <tr>
                                                            <td height="20" class="m_-5350758594985752526spacingHeight-20" style="line-height:20px;min-height:20px"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                    <tbody>
                        <tr>
                            <td>
                                <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" class="m_-5350758594985752526mlContentOuter">
                                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="620" style="border-top:1px solid #dadce0;border-collapse:initial" class="m_-5350758594985752526mlContentTable">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td height="20" style="line-height:10px;min-height:10px">
                                                                                <img src="https://ci5.googleusercontent.com/proxy/BFWENKPKa5rpWxb3WQg_EEMZRszPGOVy6hOHfJdaNDMvFPJ8ffo214JW3x7hc2jEE5bJdbbYuXhLlT7UZhRiLw=s0-d-e1-ft#https://cdn.hostinger.com/mailer/spacerv2.gif" width="1" height="1" border="0" alt="" style="display:block"
                                                                                    class="CToWUd">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                    <tbody>
                        <tr>
                            <td>
                                <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody>
                                                        <tr>
                                                            <td height="10" style="line-height:10px;min-height:10px"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="padding:0px 120px" class="m_-5350758594985752526mlContentOuter">
                                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td id="m_-5350758594985752526bodyText-10" style="font-family:Helvetica,sans-serif;font-size:14px;line-height:24px;color:#727586">
                                                                                <p style="margin-top:0px;margin-bottom:0px;line-height:32px;font-weight:400px;font-size:16px"><span class="im">Hello '. $tousername .',<br><br>
                                                                                Thank you for joining PHFiles.com community, to be a legitamate PHFiler please verify your account. 
                                                                                    <br>
                                                                    <br></span><b><a href="'.$codegenerated.'">Click here to verify!</a></b><span class="im"></span><br>
                                                                                    <br>'.$content1.'<br>
                                                                                    <br>'.$content2.'</span>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                    <tbody>
                                                        <tr>
                                                            <td height="17" class="m_-5350758594985752526spacingHeight-20" style="line-height:20px;min-height:20px"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table><span class="im">
                      <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                        <tbody><tr>
                          <td>
                            <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                              <tbody><tr>
                                <td>
                                  <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                    <tbody><tr>
                                      <td height="20" class="m_-5350758594985752526spacingHeight-20" style="line-height:20px;min-height:20px"></td>
                                    </tr>
                                  </tbody></table>
                                  <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                    <tbody><tr>
                                      <td align="center" class="m_-5350758594985752526mlContentOuter">
                                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="620" style="border-top:1px solid #dadce0;border-collapse:initial" class="m_-5350758594985752526mlContentTable">
                                          <tbody><tr>
                                            <td height="10" style="line-height:10px;min-height:10px">
                                              <img src="https://ci5.googleusercontent.com/proxy/BFWENKPKa5rpWxb3WQg_EEMZRszPGOVy6hOHfJdaNDMvFPJ8ffo214JW3x7hc2jEE5bJdbbYuXhLlT7UZhRiLw=s0-d-e1-ft#https://cdn.hostinger.com/mailer/spacerv2.gif" width="1" height="1" border="0" alt="" style="display:block" class="CToWUd">
                                            </td>
                                          </tr>
                                        </tbody></table>
                                      </td>
                                    </tr>
                                  </tbody></table>
                                </td>
                              </tr>
                            </tbody></table>
                          </td>
                        </tr>
                      </tbody></table>
                    <table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
                        <tbody><tr>
                            <td>
                                <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                                    <tbody><tr>
                                        <td>
                                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                <tbody><tr>
                                                    <td height="10" style="line-height:10px;min-height:10px"></td>
                                                </tr>
                                            </tbody></table>
                                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                                <tbody><tr>
                                                    <td align="center" style="padding:0px 120px" class="m_-5350758594985752526mlContentOuter">
                                                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                                            <tbody><tr>
                                                                <td id="m_-5350758594985752526bodyText-16" style="font-family:Helvetica,sans-serif;font-size:14px;line-height:13px;color:#6f6f6f">
                                                                    <p style="margin-top:0px;margin-bottom:0px;line-height:24px"><span style="color:rgb(114,117,134)">
                                                                    <a href="https://www.facebook.com/javelupango/" style="word-break:break-word;font-family:Helvetica,sans-serif;color:#727586;font-weight:400px;text-decoration:underline" target="_blank" data-saferedirecturl="">Facebook</a>&nbsp;·&nbsp;
                                                                    <a href="https://www.instagram.com/iamjaavee/?fbclid=IwAR3ed5UuAHJXJljHWreZL_JwuCU2vtzJ_f8xB95baMSltRj3Yv1RuM1PfSA" style="word-break:break-word;font-family:Helvetica,sans-serif;color:#727586;font-weight:400px;text-decoration:underline" target="_blank" data-saferedirecturl="">Instagram</a>&nbsp;·&nbsp;
                                                                    <a href="https://javelupango.com/?fbclid=IwAR2I5K6yQ3sxT7LND-5sNLVZRt1hvE8KTP6KbmzBGTsjoaT5KeYa7PuB18s" style="word-break:break-word;font-family:Helvetica,sans-serif;color:#727586;font-weight:400px;text-decoration:underline" target="_blank" data-saferedirecturl="">Website</a></span>·&nbsp;
                <a href="https://codelife.javelupango.com/?fbclid=IwAR0b04SDmxaLEZBPEIW85FQVLn1rY9iZ0J2RcR2iipAQbd1WxzxjMVGtv5A" style="word-break:break-word;font-family:Helvetica,sans-serif;color:#727586;font-weight:400px;text-decoration:underline" target="_blank" data-saferedirecturl="">CodeLife</a></span>
                </p>
            </td>
        </tr>
    </tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
    <tbody>
        <tr>
            <td height="15" class="m_-5350758594985752526spacingHeight-20" style="line-height:15px;min-height:15px"></td>
        </tr>
    </tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>


<table align="center" border="0" bgcolor="#ffffff" class="m_-5350758594985752526mlContentTable" cellpadding="0" cellspacing="0" width="860">
    <tbody>
        <tr>
            <td>
                <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_-5350758594985752526mlContentTable" style="width:860px;min-width:860px" width="860">
                    <tbody>
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="padding:0px 120px" class="m_-5350758594985752526mlContentOuter">
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td id="m_-5350758594985752526bodyText-18" style="font-family:Helvetica,sans-serif;font-size:14px;line-height:24px;color:#727586">
                                                                <p style="margin-top:0px;margin-bottom:0px;line-height:24px"><span style="font-size:14px"><span style="font-size:14px">
                                                                    <span style="font-size:14px">
                                                                    <span style="color:#727586">© 2020 Jave.</span><br><br>
                                                                    <span style="color:#727586"> <b> NOTE: Do not Reply, This email is System Generated. Thank you and Godbless.. :) </b></span>
                                                                    </span>
                                                                    </span>
                                                                    </span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="860" style="width:860px;min-width:860px" class="m_-5350758594985752526mlContentTable">
                                    <tbody>
                                        <tr>
                                            <td height="35" class="m_-5350758594985752526spacingHeight-20" style="line-height:20px;min-height:20px"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
</span>
</td>
</tr>
</tbody>
</table>
        ';
    }

}