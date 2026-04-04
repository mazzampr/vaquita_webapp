<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline - {{ config('app.name') }}</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e2e8f0;
            color: #0f172a;
        }
        main {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        section {
            max-width: 420px;
            background: #ffffff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.1);
        }
        h1 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 24px;
        }
        p {
            margin: 0;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<main>
    <section>
        <h1>Anda sedang offline</h1>
        <p>
            Landing page tetap tersedia dari cache. Untuk login, aktifkan koneksi internet lalu coba lagi.
        </p>
    </section>
</main>
</body>
</html>
