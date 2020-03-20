<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Arrivals + Departures Update</title>
    <style>
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }
      .btn-primary a:hover {
        background-color: #000 !important;
        color: #F1F900 !important;
      }
    }
    </style>
  </head>
  
  
  <!--not in email-->
  <table style="margin: 0 auto; max-width: 580px; width: 580px;">
     <form>
        <tr> 
            <td>
              <button type='button' onclick="replaceText('confirm')">Confirmation Email</button>
            </td>
            <td>
              <button type='button' onclick="replaceText('moderate')">Moderation Email</button>
            </td>
            <td>
              <button type='button' onclick="replaceText('display')">Display Email</button>
            </td>
            <td>
              <button type='button' onclick="replaceText('reject')">Rejection Email</button>
            </td>
        </tr>
      </form>
  </table>
  <script>
    function replaceText(e) {
      var c = document.getElementById('texts').children;
      var i;
      for (i = 0; i < c.length; i++) {
          c[i].style.display = 'none';
      }
      document.getElementById(e).style.display = 'block';
    }
    </script>
   <!--not in email-->
   
   
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
     <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px; border-spacing: 0px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <!--icon -->
                    <tr>
                        <td style="font-family: sans-serif; font-size: 24px; vertical-align: top;font-weight: bold; padding: 0px 20px;">
                            <p style="border-bottom: 1px solid black;margin: 0;padding: 24px 0;">
                                <img src="http://134.209.184.8/assets/images/Arrivals+Departures_logo-1_email.png" alt="ARRIVALS +DEPARTURES">
                                
                            </p>
                        </td>
                    </tr>
                    <!--text area-->
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding: 80px 20px;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: lighter; margin: 0; Margin-bottom: 15px;">
                       
                            
                        <!--not in email-->
                           <div id='texts'>
                            <span id='confirm' style="display:none;">
                                <?php echo($page->confirmtext()->kt()); ?></span>
                            <span id='moderate' style="display:none;">
                                <?php echo($page->moderationtext()->kt()); ?></span>
                            <span id='display' style="display:none;">
                                <?php echo($page->displaytext()->kt()); ?></span>
                            <span id='reject' style="display:none;"
                                <?php echo($page->rejecttext()->kt()); ?></span>
                           </div>
                        <!--not in email-->
                        
                        
                        </p>
                      </td>
                    </tr>
                    <!--yellow bottom table w/link-->
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; padding: 30px 0 50px; background-color: #f1f900;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 0.875rem; font-weight: lighter; vertical-align: top; background-color: #F1F900; border-radius: 18px; padding: 0 30px 30px"> 
                                          <p>An interactive public installation about birth, death and the journey in between by YARA + DAVINA</p>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 0.875rem; vertical-align: top; background-color: #F1F900; border-radius: 18px; padding-left: 30px"> 
                                          <a href="http://www.arrivalsanddepartures.net" target="_blank" style="display: inline-block; color: #000; background-color: #F1F900; border: solid 1px #000; border-radius: 18px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 0.875rem; margin: 0; padding: 0.4rem 2rem 0.3rem; text-transform: capitalize; border-color: #000;">Go to the online arrivals and departures boards</a>
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
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">Unsubscribe</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    Powered by <a href="http://htmlemail.io" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">HTMLemail</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
