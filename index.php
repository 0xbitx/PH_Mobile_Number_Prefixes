 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sim Name Search</title>
    <style>
        @font-face {
            font-family: 'DIN_Regular';
            src: url('D-DINExp-Bold.otf') format('woff2'),
                 url('D-DIN.otf') format('woff');
            font-weight: 700;
            font-style: normal;
        }
        body {
            background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        .container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            font: 700 24px/24px 'DIN_Regular', Arial, Verdana, sans-serif;
            margin-bottom: 20px;
            color: black;
        }

        .form-group {
            font: 700 15px/24px 'DIN_Regular', Arial, Verdana, sans-serif;
            margin-bottom: 20px;
        }

        input[type="text"] {
            font: 700 15px/24px 'DIN_Regular', Arial, Verdana, sans-serif;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            font: 700 5px/15px 'DIN_Regular', Arial, Verdana, sans-serif;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            background-color: #000000;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }

        .result {
            font: 700 15px/24px 'DIN_Regular', Arial, Verdana, sans-serif;
            margin-top: 20px;
            font-size: 18px;
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sim Name Search</h1>
        <form method="post">
            <div class="form-group">
                <input type="text" name="phone_number" placeholder="Enter phone number (09xx)" required>
            </div>
            <button type="submit">Check ISP</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $prefixes = [
                '0817' => 'Globe Telecom / TM',
                '0905' => 'Globe Telecom / TM',
                '0906' => 'Globe Telecom / TM',
                '0915' => 'Globe Telecom / TM',
                '0916' => 'Globe Telecom / TM',
                '0917' => 'Globe Telecom / TM',
                '0926' => 'Globe Telecom / TM',
                '0927' => 'Globe Telecom / TM',
                '0935' => 'Globe Telecom / TM',
                '0936' => 'Globe Telecom / TM',
                '0937' => 'ABS-CBN Mobile',
                '0945' => 'Globe Telecom / TM',
                '0955' => 'Globe Telecom / TM',
                '0956' => 'Globe Telecom / TM',
                '0965' => 'Globe Telecom / TM',
                '0966' => 'Globe Telecom / TM',
                '0967' => 'Globe Telecom / TM',
                '0975' => 'Globe Telecom / TM',
                '0976' => 'Globe Telecom / Gomo / TM',
                '0977' => 'Globe Telecom / TM',
                '0995' => 'Globe Telecom / TM',
                '0996' => 'Cherry Prepaid',
                '0997' => 'Globe Telecom / TM',
                '09175' => 'Globe Postpaid',
                '09176' => 'Globe Postpaid',
                '09178' => 'Globe Postpaid',
                '09253' => 'Globe Postpaid',
                '09255' => 'Globe Postpaid',
                '09256' => 'Globe Postpaid',
                '09257' => 'Globe Postpaid',
                '09258' => 'Globe Postpaid',
                '0813' => 'Smart / TNT',
                '0907' => 'Smart / TNT',
                '0908' => 'Smart / TNT',
                '0909' => 'Smart / TNT',
                '0910' => 'Smart / TNT',
                '0811' => 'Smart / TNT',
                '0912' => 'Smart / TNT',
                '0913' => 'Smart / TNT',
                '0914' => 'Smart / TNT',
                '0918' => 'Smart / TNT',
                '0919' => 'Smart / TNT',
                '0920' => 'Smart / TNT',
                '0921' => 'Smart / TNT',
                '0928' => 'Smart / TNT',
                '0929' => 'Smart / TNT',
                '0930' => 'Smart / TNT',
                '0938' => 'Smart / TNT',
                '0939' => 'Smart / TNT',
                '0940' => 'Smart / TNT',
                '0946' => 'Smart / TNT',
                '0947' => 'Smart / TNT',
                '0948' => 'Smart / TNT',
                '0949' => 'Smart / TNT',
                '0950' => 'Smart / TNT',
                '0951' => 'Smart / TNT',
                '0961' => 'Smart / TNT',
                '0963' => 'Smart / TNT',
                '0968' => 'Smart / TNT',
                '0969' => 'Smart / TNT',
                '0970' => 'Smart / TNT',
                '0981' => 'Smart / TNT',
                '0989' => 'Smart / TNT',
                '0992' => 'Smart / TNT',
                '0998' => 'Smart / TNT',
                '0999' => 'Smart / TNT',
                '0895' => 'Dito',
                '0896' => 'Dito',
                '0897' => 'Dito',
                '0898' => 'Dito',
                '0991' => 'Dito',
                '0992' => 'Dito',
                '0993' => 'Dito',
                '0994' => 'Dito',
                '0922' => 'Sun Cellular',
                '0923' => 'Sun Cellular',
                '0924' => 'Sun Cellular',
                '0925' => 'Sun Cellular',
                '0931' => 'Sun Cellular',
                '0932' => 'Sun Cellular',
                '0933' => 'Sun Cellular',
                '0934' => 'Sun Cellular',
                '0941' => 'Sun Cellular',
                '0942' => 'Sun Cellular',
                '0943' => 'Sun Cellular',
                '0944' => 'Sun Cellular'
            ];

            $phone_number = preg_replace('/\D/', '', $_POST['phone_number']);
            $found = false;

            foreach ($prefixes as $prefix => $isp) {
                if (strpos($phone_number, $prefix) === 0) {
                    echo "<div class='result'>Sim name for number <strong>$phone_number</strong> is: <strong>$isp</strong></div>";
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                echo "<div class='result'>Sim name not found for number <strong>$phone_number</strong>.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
