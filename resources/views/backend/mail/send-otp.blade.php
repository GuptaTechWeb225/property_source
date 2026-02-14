<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .template-heading {
            text-align: center;
            margin-bottom: 20px;
        }

        .template-heading img {
            height: 50px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
            text-align: center;
        }

        .otp-code {
            font-size: 29px;
            font-weight: bold;
            font-family: monospace;
            color: #e74c3c;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            margin-bottom: 17px;
            width: 100%;
            text-align: center;
        }

        .template-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eaeaea;
        }

        .template-footer p {
            font-size: 14px;
            color: #777;
        }

        .template-footer img {
            height: 40px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="template-heading">
        <img src="{{ @globalAsset(setting('favicon')) }}" alt="Logo">
    </div>

    <h1>Your OTP Code</h1>

    <p>Your One-Time Password (OTP) is:</p>
    <div class="otp-code">{{ $otp }}</div>
    <p>This code will expire in 10 minutes.</p>

    <div class="template-footer">
        <div class="template-footer-image">
            <img src="{{ @globalAsset(setting('light_logo')) }}" alt="Logo">
        </div>
        <p>{{ Setting('footer_text') }}</p>
    </div>
</div>
</body>
</html>
