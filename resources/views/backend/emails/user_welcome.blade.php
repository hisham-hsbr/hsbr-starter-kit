<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        /* Reset */
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        table {
            border-spacing: 0;
            width: 100%;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
            height: auto;
            max-width: 100%;
        }

        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            .content {
                padding: 20px !important;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0; background-color: #f8f9fa;">
    <table align="center" cellpadding="0" cellspacing="0" width="100%"
        style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden;">
        <tr>
            <td style="background-color: #007bff; padding: 20px; text-align: center; color: #ffffff;">
                <h1 style="margin: 0; font-size: 24px; font-family: Arial, sans-serif;">Welcome to Our Platform</h1>
            </td>
        </tr>
        <tr>
            <td class="content" style="padding: 40px; font-family: Arial, sans-serif; font-size: 16px; color: #333333;">
                <p>Hi <strong>{{ $userName }}</strong>,</p>
                <p>Your account has been created successfully. Below are your account details:</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>One Time Password:</strong> {{ $otp }}</p>
                <p>Please click the button below to set up your account:</p>
                <p style="text-align: center;">
                    <a href="{{ $loginUrl }}"
                        style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #ffffff; background-color: #007bff; border-radius: 4px; text-decoration: none;">Set
                        Up Your Account</a>
                </p>
                <p>Thank you,<br>The Team</p>
            </td>
        </tr>
        <tr>
            <td
                style="background-color: #f1f1f1; text-align: center; padding: 10px; font-family: Arial, sans-serif; font-size: 14px; color: #777777;">
                <p style="margin: 0;">&copy; 2024 Our Platform. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>

</html>
