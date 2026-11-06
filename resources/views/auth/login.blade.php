<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-slate-100 px-4 text-slate-800">
    <main class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg">
        <h1 class="text-2xl font-bold text-slate-900">Login</h1>
        <p class="mt-2 text-sm text-slate-500">Masuk untuk mengelola data siswa.</p>

        @if ($errors->any())
            <div class="mt-5 rounded-lg bg-red-50 p-4 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <div>
                <label for="email" class="mb-1 block text-sm font-medium">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                >
            </div>

            <div>
                <label for="password" class="mb-1 block text-sm font-medium">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                >
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700"
            >
                Masuk
            </button>
        </form>
    </main>
</body>
</html>