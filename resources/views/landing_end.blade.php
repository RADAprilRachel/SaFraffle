<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.45, minimum-scale=0.45">

        <title>SaFraffle</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            @media screen and (min-width: 500px) {
              img {
                width: auto;
              }
	      .center {
                width: auto;
              }
	      img.footer {
                width: 100px;
              }
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Dosis', sans-serif;
                font-weight: 200;
                margin: 0;
            } 
            img {
              width:800px;
	      margin: auto;
            }
            img.footer {
              width:400px;
	      margin: auto;
              display: block;
            }
	    .center {
              display: block;
              width: 800px;
	      margin: auto;
              align-items: center;
              justify-content: center;
            }
	    p {
              padding: 0em 15px 0em;
	    }
	    p.list {
              margin: 0px auto 1px;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
		font-family: 'Berkshire Swash', cursive;
            }
            .subtitle {
              font-family: 'Josefin Slab', serif;
            } 
        </style>
    </head>
    <body>
        <div class="center">
	<img src="{{ asset('/storage/img/Safai_TopBanner.png') }}">
        <div class="center">

            <div class="content">
                <div class="title ">
		  Safraffle Raffle
                </div>
                <p>Thank you for checking out the Safraffle Raffle page! Currently we do not have a raffle running. Please follow us on <a href="https://dev.safraffle.com/">Facebook</a> and <a href="https://www.instagram.com/safaicoffeeshop">Instagram</a> to learn when our next raffle will be held and who will benefit.</p>


                <p>If you have any questions please email our <a href="mailto:rachel.events.safaicoffee@gmail.com">events coordinator</a></p>

            </div>
        </div>
        </div>
    </body>
</html>
