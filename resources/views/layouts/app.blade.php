<!DOCTYPE html>
<html lang="ja" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>neotyasoBlog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
    <header class="bg-gray-800 text-white">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/blogs" class="text-2xl font-semibold">neotyasoBlog</a>
            <nav class="flex items-center gap-4">
                <a href="/blogs" class="hover:underline">ブログ一覧</a>
                <a href="/blogs/create" class="inline-flex items-center rounded-md bg-white/10 px-3 py-1.5 text-sm hover:bg-white/20">
                    新規作成
                </a>
            </nav>
        </div>
    </header>

    <main class="flex-1">
        <div class="max-w-5xl mx-auto px-4 py-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-green-800">
                    {{ session('status') }}
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <footer class="bg-gray-800 text-white">
        <div class="max-w-5xl mx-auto px-4 py-4 text-center text-sm">
            © 2025 neotyasoBlog
        </div>
    </footer>
</body>
</html>
