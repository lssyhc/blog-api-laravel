<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $subject }}</title>
        <style>
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }

            img {
                -ms-interpolation-mode: bicubic;
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }

            table {
                border-collapse: collapse !important;
            }

            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
                background-color: #f4f4f4;
            }

            .container {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin: 40px auto;
                padding: 30px;
                max-width: 600px;
                border: 1px solid #e0e0e0;
            }

            .header {
                text-align: center;
                padding-bottom: 20px;
                border-bottom: 1px solid #eeeeee;
            }

            .header img {
                max-width: 150px;
            }

            .content {
                padding: 20px 0;
                color: #333333;
                font-size: 16px;
                line-height: 1.6;
            }

            .button-container {
                text-align: center;
                padding: 20px 0;
            }

            .button {
                background-color: #007bff;
                color: #ffffff !important;
                padding: 15px 30px;
                text-decoration: none;
                border-radius: 5px;
                font-weight: bold;
                display: inline-block;
            }

            .footer {
                text-align: center;
                font-size: 12px;
                color: #888888;
                padding-top: 20px;
                border-top: 1px solid #eeeeee;
            }
        </style>
    </head>

    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
        <div class="container">
            <div class="header">
                <img src="{{ asset('images/custom-logo.jpg') }}" alt="{{ config('app.name') }} Logo">
            </div>
            <div class="content">
                <h2 style="color: #222222;">Hello, {{ $userName ?? '' }}</h2>
                <p>{{ $bodyMessage }}</p>
                <div class="button-container">
                    <a href="{{ $actionUrl }}" class="button">{{ $actionText }}</a>
                </div>
                <p>{{ $closingMessage }}</p>
                <br>
                <p>Thank you,<br>The {{ config('app.name') }} Team</p>
            </div>
            <div class="footer">
                <p>If you're having trouble clicking the button, copy and paste the URL below into your web browser:</p>
                <p style="word-break: break-all;">{{ $actionUrl }}</p>
                <hr style="border: 0; border-top: 1px solid #eeeeee; margin: 20px 0;">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </body>

</html>
