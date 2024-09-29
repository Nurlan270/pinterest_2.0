@extends('layouts.mail')

@pushonce('styles')
    <style>
        /* General resets */
        body, table, td, a {
            text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table, td {
            border-collapse: collapse;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            height: 100% !important;
        }

        /* Container styles */
        .email-container {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
        }

        /* Responsive styles */
        @media screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
            }
            .reset-button {
                width: 100% !important;
            }
        }

        /* Button styles */
        .reset-button {
            display: inline-block;
            background-color: #ef5350;
            color: #ffffff;
            text-align: center;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin: 20px 0;
        }

        /* Footer styles */
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777777;
            padding: 20px 0;
        }
    </style>
@endpushonce

@section('content')
    
    <!-- Email Container -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <table class="email-container" border="0" cellpadding="0" cellspacing="0" width="100%"
                       style="background-color: #ffffff; padding: 20px; border-radius: 8px;">
                    <!-- Header Section -->
                    <tr>
                        <td align="center" style="padding: 10px;">
                            <img src="{{ asset('assets/logo.png') }}" alt="{{ config('app.name') }}" width="150" height="150"
                                 style="display: block;"/>
                        </td>
                    </tr>

                    <!-- Main Content Section -->
                    <tr>
                        <td align="center" style="background-color: #ffebee; padding: 20px; border-radius: 8px 8px 0 0;">
                            <h2 style="font-family: Arial, sans-serif; color: #ef5350; font-size: 24px; margin: 0;">
                                Password Reset</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px; border-left: 2px solid #ffebee; border-right: 2px solid #ffebee">
                            <p style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; line-height: 1.5;">
                                Somebody requested a password reset using your email. If that was you, click the button
                                below to reset it. Otherwise, ignore this message.
                            </p>
                        </td>
                    </tr>

                    <!-- Button Section -->
                    <tr>
                        <td align="center" style="border-left: 2px solid #ffebee; border-right: 2px solid #ffebee">
                            <a href="{{ $url }}" class="reset-button"
                               style="font-family: Arial, sans-serif; font-weight: bold">Reset Password</a>
                        </td>
                    </tr>

                    <!-- Footer Section -->
                    <tr>
                        <td align="center" class="footer" style="background-color: #ffebee; padding: 7px 0 7px 0; border-radius: 0 0 8px 8px;">
                            <p style="font-family: Arial, sans-serif; color: #777777; font-size: 14px;">
                                &copy; {{ now()->year }} All right reserved | {{ config('app.name') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

@endsection
