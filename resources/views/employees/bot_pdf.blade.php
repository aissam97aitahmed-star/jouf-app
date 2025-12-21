<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>محادثات البوت</title>
    <style>
        @font-face {
            font-family: 'Amiri';
            font-style: normal;
            font-weight: normal;
            src: url('{{ public_path('fonts/Amiri-Regular.ttf') }}') format('truetype');
        }

        body {
            font-family: 'Amiri', serif;
            direction: rtl;
            text-align: right;
            font-size: 14px;
        }

        .message { margin-bottom: 10px; display: block; }
        .user { color: #fff; background: #166534; padding: 5px 10px; border-radius: 5px; }
        .bot { color: #000; background: #f1f1f1; padding: 5px 10px; border-radius: 5px; }
        h2 { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>محادثات البوت</h2>

    @foreach($conversations as $conv)
        <div class="message user">
            <strong>أنت:</strong> {{ $conv->question }}<br>
            <small>{{ $conv->created_at->format('Y-m-d H:i') }}</small>
        </div>

        @if($conv->answer)
            <div class="message bot">
                <strong>{{ $settings->bot_name }}:</strong> {{ $conv->answer }}<br>
                <small>{{ $conv->created_at->format('Y-m-d H:i') }}</small>
            </div>
        @endif
    @endforeach
</body>
</html>
