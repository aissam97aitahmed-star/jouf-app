<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $subject ?? 'رسالة من موقعنا' }}</title>

    <!-- Progressive enhancement : only clients that read <style> will use it -->
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap');


        /* latin-ext */
        @font-face {
            font-family: 'IBM Plex Sans Arabic';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/ibmplexsansarabic/v7/NotoKufiArabic-Regular.woff2) format('woff2');
            unicode-range: U+0600-06FF, U+200C-200E, U+2010-2011, U+204F, U+2E41, U+FB50-FDFF, U+FE80-FEFC;
        }

        * {
            font-family: "IBM Plex Sans Arabic", sans-serif !important;
            font-optical-sizing: auto !important;
        }

        /* add other weights if you need them */
    </style>

    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:AllowPNG/>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#f7f7f7;">
    <div role="article" aria-roledescription="email" lang="ar" dir="rtl"
        style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#f7f7f7;font-family:'IBM Plex Sans Arabic','Segoe UI','Tahoma','Arial','sans-serif';direction:rtl;text-align:right;">

        <table role="presentation" style="width:100%;border:0;border-spacing:0;">
            <tr>
                <td align="center" style="padding:30px 0;">
                    <!--[if mso]><table role="presentation" align="center" style="width:600px;"><tr><td style="padding:0;"><![endif]-->
                    <table role="presentation"
                        style="width:94%;max-width:600px;border:0;border-spacing:0;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,.1);font-family:'IBM Plex Sans Arabic','Segoe UI','Tahoma','Arial','sans-serif';direction:rtl;text-align:right;">

                        <!-- HEADER -->
                        <tr>
                            <td style="padding:20px;background-color:#e8f2ff;text-align:center;">
                                <img src="{{ config('app.url') }}/assets/images/main-logo.png" alt="Logo"
                                    style="max-height:80px;border:0;display:inline-block;vertical-align:middle;">
                            </td>
                        </tr>

                        <!-- CONTENT -->
                        <tr>
                            <td
                                style="padding:30px;color:#333333;font-size:16px;line-height:26px;font-family:'IBM Plex Sans Arabic','Segoe UI','Tahoma','Arial','sans-serif';">
                                @yield('content')
                            </td>
                        </tr>

                        <!-- FOOTER -->
                        <tr>
                            <td
                                style="padding:20px;background-color:#e8f2ff;font-size:14px;color:#777777;text-align:center;font-family:'IBM Plex Sans Arabic','Segoe UI','Tahoma','Arial','sans-serif';">
                                &copy; {{ date('Y') }} جميع الحقوق محفوظة.
                            </td>
                        </tr>

                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
