<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- custom css link -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather');

        @import url('https://fonts.googleapis.com/css2?family=Poppins');

        body {
            margin: 0;
            padding: 0;
            
        }

        span {
            margin-top: -1rem;
            font-family:  serif;
            color: #28282a;
            font-size: 3.5em;
            font-weight: 1000;
            letter-spacing: normal;

        }

        .counter-wrapper {
            font-size: 62.5%;
            scroll-behavior: smooth;
            box-sizing: border-box;
            
            background: url(assests/image/childern.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-column-gap: 1.5rem;
            padding-top: 5rem;
            padding-bottom: 7rem;
            padding-left: 5rem;
            padding-right: 5rem;
            margin-top: 2rem;
            position: relative;
        }

        .counter-wrapper::before {
            position: absolute;
            content: '';
            content: 0;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .counter {
            text-align: center;
            color: #ddd;
            z-index: 2;
            position: relative;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .counter::before {
            position: absolute;
            content: '';
            bottom: -2rem;
            left: 50%;
            width: 20%;
            height: .2rem;
            background: #4DB7FE;
            border-radius: .5rem;
            -webkit-border-radius: .5rem;
            -moz-border-radius: .5rem;
            -ms-border-radius: .5rem;
            -o-border-radius: .5rem;
            transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
        }

        .counter .count {
            font-size: 5rem;
            margin-bottom: 1rem;
        }

        .counter p {
            font-size: 1.4rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        @media (max-width: 991px) {
            html {
                font-size: 55%;
            }
        }

        @media (max-width: 768px) {
            .counter-wrapper {
                grid-template-columns: repeat(2, 1fr);
                grid-row-gap: 8rem;
            }
        }

        @media (max-width: 450px) {
            html {
                font-size: 50%;
            }

            .counter-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="full">
        <center>
            <span>OUR IMAPACT </span>
        </center>
        <div class="counter-wrapper" background="assests/image/childern.jpg">
            <div class="counter">
                <h1 class="count" data-target="1254">0</h1>
                <p>DONATION</p>
            </div>
            <div class="counter">
                <h1 class="count" data-target="12168">0</h1>
                <p>VILLAGES</p>
            </div>
            <div class="counter">
                <h1 class="count" data-target="2172">0</h1>
                <p>PROJECTS</p>
            </div>
            <div class="counter">
                <h1 class="count" data-target="732">0</h1>
                <p>STATES</p>
            </div>
        </div>
    </div>

    <script>const counts = document.querySelectorAll('.count')
        const speed = 97

        counts.forEach((counter) => {
            function upDate() {
                const target = Number(counter.getAttribute('data-target'))
                const count = Number(counter.innerText)
                const inc = target / speed
                if (count < target) {
                    counter.innerText = Math.floor(inc + count)
                    setTimeout(upDate, 15)
                } else {
                    counter.innerText = target
                }
            }
            upDate()
        })
    </script>
</body>

</html>