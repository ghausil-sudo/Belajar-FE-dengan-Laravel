<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $student ? 'Edit Siswa' : 'Tambah Siswa' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            line-height: 1.6;
        }

        .container {
            width: min(100% - 32px, 680px);
            margin: 0 auto;
            padding: 40px 0;
        }

        .form-card {
            padding: 28px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        }

        h1 {
            margin: 0 0 8px;
            font-size: 1.8rem;
        }

        .subtitle {
            margin: 0 0 24px;
            color: #64748b;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            display: block;
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #ffffff;
            color: #1e293b;
            font: inherit;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: 2px solid #bfdbfe;
            border-color: #2563eb;
        }

        .error-box {
            margin-bottom: 20px;
            padding: 12px 16px;
            border: 1px solid #fecaca;
            border-radius: 8px;
            background: #fef2f2;
            color: #b91c1c;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
        }

        .button {
            display: inline-block;
            padding: 10px 16px;
            border: 0;
            border-radius: 8px;
            font: inherit;
            text-decoration: none;
            cursor: pointer;
        }

        .button-primary {
            background: #2563eb;
            color: #ffffff;
        }

        .button-primary:hover {
            background: #1d4ed8;
        }

        .button-secondary {
            background: #e2e8f0;
            color: #fcfdff;
        }

        .button-secondary:hover {
            background: #cbd5e1;
        }

        @media (max-width: 600px) {
            .container {
                padding: 24px 0;
            }

            .form-card {
                padding: 20px;
            }

            .actions {
                align-items: stretch;
                flex-direction: column;
            }

            .button {
                text-align: center;
            }
        }
    </style>

</head>

<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">
    <main class="mx-auto max-w-2xl px-4 py-10">
        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-lg">
            <div class="mb-6 border-b border-slate-200 pb-5">
                <span
                    class="mb-3 inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1 text-sm font-semibold text-blue-700">
                    <span class="h-2 w-2 rounded-full bg-blue-600"></span>
                    Data Siswa
                </span>

                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    {{ $student ? 'Edit Siswa' : 'Tambah Siswa' }}
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    {{ $student ? 'Perbarui informasi siswa melalui form berikut.' : 'Lengkapi informasi untuk menambahkan siswa baru.' }}
                </p>
            </div>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ $student ? route('students.update', $student->id) : route('students.store') }}"
                method="POST">
                @csrf

                @if ($student)
                    @method('PUT')
                @endif

                <p>
                    <label for="nis">NIS</label><br>
                    <input id="nis" name="nis" value="{{ old('nis', $student->nis ?? '') }}" required>
                </p>

                <p>
                    <label for="name">Nama</label><br>
                    <input id="name" name="name" value="{{ old('name', $student->name ?? '') }}" required>
                </p>

                <p>
                    <label for="class_name">Kelas</label><br>
                    <input id="class_name" name="class_name" value="{{ old('class_name', $student->class_name ?? '') }}"
                        required>
                </p>

                <p>
                    <label for="gender">Jenis kelamin</label><br>
                    <select id="gender" name="gender" required>
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki" @selected(old('gender', $student->gender ?? '') === 'Laki-laki')>Laki-laki</option>
                        <option value="Perempuan" @selected(old('gender', $student->gender ?? '') === 'Perempuan')>Perempuan</option>
                    </select>
                </p>

                <p>
                    <label for="birth_date">Tanggal lahir</label><br>
                    <input type="date" id="birth_date" name="birth_date"
                        value="{{ old('birth_date', $student && $student->birth_date ? $student->birth_date->format('Y-m-d') : '') }}">
                </p>

                <p>
                    <label for="address">Alamat</label><br>
                    <textarea id="address" name="address">{{ old('address', $student->address ?? '') }}</textarea>
                </p>

                <button type="submit">{{ $student ? 'Simpan Perubahan' : 'Simpan Siswa' }}</button>
                <a href="{{ route('students.index') }}">Kembali</a>
            </form>
        </section>
    </main>
</body>

</html>
