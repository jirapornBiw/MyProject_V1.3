<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';
        .jumbotron { padding: 15px;
          font-family: 'Kanit', sans-serif;
          background: linear-gradient(45deg,#F17C58, #E94584, #24AADB , #27DBB1,#FFDC18, #FF3706);
        background-size: 600% 100%;
        animation: gradient 5s linear infinite;
        animation-direction: alternate;
        background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
        
    }
    @keyframes gradient {
        0% {background-position: 0%}
        100% {background-position: 100%}
        
         }
        
      </style>
<title>PromptPay QR-Code Javascript Library</title>
    <script src="../../promptpay_QRcodeweb/promptpay-qr.js"></script>
    <script src="../../promptpay_QRcodeweb/qrcode.min.js"></script>
    <link href="../../promptpay_QRcodeweb/app.css" media="all" rel="stylesheet" />
  </head>
  <body>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
    <div class="container">
      <!-- Content here -->
     
    <div id="qrcode" align="center">

    </div>
  </div>




  <div class="container">

    <script type="text/javascript">
      
      var qr_dom = document.getElementById('qrcode');

      function render_qr(x){
        var acc_id = '1401501237521';
        var amount = x;
        var txt = PromptPayQR.gen_text(acc_id, amount);

        qr_dom.innerHTML = "";
        if(txt){
          new QRCode(qr_dom, txt);
        }
      }
      

      document.getElementById('amount').addEventListener('click', render_qr, true);

    </script>

  </body>
</html>
