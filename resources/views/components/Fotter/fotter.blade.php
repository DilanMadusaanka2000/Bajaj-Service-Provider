<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'poppins', 'sans-serif';
            box-sizing: border-box;
        }

        footer{
            width: 100%;
            /* position: absolute; */
            bottom: 0;
            background: linear-gradient(to right, #00093c, #2d0b00);
            color: #fff;
            padding: 100px 0 30px;
            border-top-left-radius: 125px;
            font-size: 13px;
            line-height: 20px;
            position: relative;
        }
        .row{
            width: 85%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: space-between;
        }
        .col{
            flex-basis: 25%;
            padding: 10px;
        }
        .logo{
            width: 80px;
            margin-bottom: 30px;
        }
        .col h3{
            width: fit-content;
            margin-bottom: 40px;
            position: relative;
        }

        .email{
            width: fit-content;
            border-bottom: 1px solid #ccc;
            margin: 20px 0;

        }

        ul li{
            list-style: none;
            margin-bottom: 12px;

        }

        ul li a {
            text-decoration: none;
            color: #ccc;
        }
        form{

            padding-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ccc;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>

    <footer>
        <div class="row">
            <div class="col">
               <img src="" alt="" class="logo">
               <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo, cupiditate molestias </p>
            </div>
            <div class="col">
              <h3>Contact Information</h3>
              <p class="email">support@servicecenter.com</p>
              <p>+94 77 123 4567</p>
              <p>123 Main Street, Colombo, Sri Lanka</p>
            </div>
            <div class="col">
                <h3>Social Media Links</h3>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>

            <div class="col">
                <h3>Send Email</h3>
                <form >

                    <input type="email" placeholder="Send Email">
                    <button type="submit"></button>
                </form>

            </div>

        </div>
    </footer>

</body>
</html>
