<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="/feedback/images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="/feedback/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/feedback/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/feedback/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="/feedback/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="/feedback/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="/feedback/css/util.css">
    <link rel="stylesheet" type="text/css" href="/feedback/css/main.css">

</head>

<body>
    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                @if($system == 'myjpj')
                    <img src="https://is1-ssl.mzstatic.com/image/thumb/PurpleSource112/v4/78/51/6a/78516a2d-cced-de19-7e9d-9fb658321cea/72cd8945-2231-4a92-a48a-0ff32fb3d17b_Simulator_Screen_Shot_-_iPad_Pro__U002812.9-inch_U0029__U00285th_generation_U0029_-_2022-11-10_at_11.06.51.png/643x0w.jpg" alt="IMG">        
                @else
                    <img src="/feedback/images/img-01.png" alt="IMG">
                @endif
            </div>
            <form class="contact1-form validate-form" action="/komen" method="POST">
                @csrf

                <input type="hidden" name="system" value="{{ $system }}">

                <span class="contact1-form-title">
                    Please leave a feedback
                </span>
                <div class="wrap-input1 validate-input" data-validate="Name is required">
                    <input class="input1" type="text" name="name" placeholder="Name">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="email" placeholder="Email">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1 validate-input" data-validate="Phone is required">
                    <input class="input1" type="text" name="phone" placeholder="Phone">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1 validate-input" data-validate="Message is required">
                    <textarea class="input1" name="message" placeholder="Message"></textarea>
                    <span class="shadow-input1"></span>
                </div>
                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
                        <span>
                            Leave Feedback
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="/feedback/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="/feedback/vendor/bootstrap/js/popper.js"></script>
    <script src="/feedback/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="/feedback/vendor/select2/select2.min.js"></script>

    <script src="/feedback/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>



    <script src="/feedback/js/main.js"></script>

</body>

</html>