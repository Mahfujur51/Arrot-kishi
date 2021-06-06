{{-- Hello {{ $email_data['name'] }}
<p>This is arrot.com</p>
<a href="http://localhost/Arrot-Krishi-Ponno/public/verify?code={{ $email_data['verification_code'] }}">Click Here</a> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        .logo{
            margin: 30px 0;
        }
        .logo img{
            height: 60px;
            width: 100px;
            display: block;
            margin: 0 auto;
        }
         .welcome-img img{
             min-height: 300px;
             display: block;
             margin: 0 auto;
         }
         .content h3{
             text-align: center;
             padding: 20px;
             font-weight: 700; 
         }
         .custorm-p{
             padding: 0 200px 0 0;
         }
         .link{
             text-align: center;
             font-size: 24px;
             font-weight: 500;
         }
         .main-footer{
             /* text-align: center; */
             padding-top: 50px;
         }
         .link a{
            text-decoration: none;
         }
         .mail a{
            text-decoration: none;
         }

         .button{
            display: inline-block;
            background-color: #F40000 !important;
            color: #FFF;
            padding: .75rem 1rem;
            border-radius: .5rem;
            transition: .3s;
            }

        .button:hover{
        background-color: #CF1C28 !important;
        color: #FFF !important;
        }

        .section-heading{
            font-family:"Raleway-bold";
            text-align:center;
            Position:relative;
            margin-bottom:4rem;
        }

        .section-heading:after{
            content:'';
            display:block;
            width: 100%;
            height:30px;
            background-image:url(hr.svg);
            background-repeat: no-repeat;
            background-position: center;
            position:absolute;
            bottom:-40px;
        }

         
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo section-heading">
                    <a href="https://www.selevenit.com/" target="_blank"><img src="logo.png"  alt="logo"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="welcome-img">
                   <a href=""> <img src="email.png" alt="welcome-img"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                <h3 class="section-heading">Welcome to Arrot</h3>
                <p>Dear <strong>{{ $email_data['name'] }}</strong>. , You have successfully registered.
                   </p>

                    <p class="custorm-p">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam, fugit. Accusamus magni, dignissimos dolore voluptatibus perferendis possimus reiciendis quaerat est facere animi illum odio, similique nam numquam officia! Non, distinctio.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="link">
                    <a href="http://localhost/Arrot/public/verify?code={{ $email_data['verification_code'] }}" class="button">Let's Start</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <footer class="main-footer">
                    <strong>Copyright &copy; 2021 <a href="https://www.selevenit.com/">SelevenIT</a>.</strong> All rights reserved.<br>
                    <strong>Our mailing address is :</strong>
                    <span class="mail"><a href="mailto:support@selevenit.com">support@selevenit.com</a></span>
                  </footer>
            </div>
        </div>
    </div>    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>