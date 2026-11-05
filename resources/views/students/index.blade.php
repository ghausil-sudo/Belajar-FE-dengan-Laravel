<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f1f5f9;
            color: #1e293b;
        }

        .container {
            max-width: min(1200px, calc(100% - 32px));
            margin: 0 auto;
            padding: 40px 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        h1 {
            font-size: 1.6rem;
        }

        .subtitle {
            margin: 8px 0 0;
            color: #64748b;
        }

        .alert-success {
            background: #f0fdf4;
            color: #166534;
            padding: 14px 16px;
            border: 1px solid #86efac;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .table-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
            overflow-x: hidden;
        }

        .table-scroll {
            overflow-x: auto;
        }

        .students-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .students-table th,
        .students-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .students-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .students-table tbody tr:hover {
            background: #f8fafc;
        }

        .actions {
            white-space: nowrap;
        }

        .inline-form {
            display: inline;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            font-size: 0.9rem;
            text-decoration: none;
            border-radius: 8px;
            font: inherit;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .btn-primary {
            background: #3b82f6;
            color: #ffffff;
        }

        .btn-delete {
            background: #ef4444;
            color: #ffffff;
        }

        .btn-small {
            padding: 7px 10px;
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 24px 0;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            h1 {
                font-size: 1.6rem;
            }

            .students-table {
                min-width: 850px;
            }

        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-y: auto;
            background: rgba(15, 23, 42, 0.6);
        }

        .modal {
            width: min(100%, 640px);
            max-height: calc(100vh - 40px);
            overflow-y: auto;
            padding: 26px;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.25);
        }

        .modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            margin: 0;
        }

        .modal-close {
            color: #475569;
            font-size: 1.5rem;
            line-height: 1;
            text-decoration: none;
        }

        .form-field {
            margin-bottom: 16px;
        }

        .form-field label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .form-field input,
        .form-field select,
        .form-field textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font: inherit;
        }

        .form-field textarea {
            min-height: 90px;
            resize: vertical;
        }

        .form-error {
            margin: 4px 0 0;
            color: #b91c1c;
            font-size: 0.9rem;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #1e293b;
        }

        body.modal-open {
            overflow: hidden;
        }

        @media (max-width: 600px) {
            .modal {
                padding: 20px;
            }

            .modal-actions {
                flex-direction: column-reverse;
            }

            .modal-actions .btn {
                text-align: center;
            }
        }
    </style>

</head>

<body>
    <main class="container">
        <header class="page-header">
            <div>
                <h1>Data Siswa</h1>
                <p class="subtitle">Kelola informasi siswa di sekolah.</p>
            </div>

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a class="btn btn-primary" href="{{ route('students.create') }}">
                + Tambah Siswa
            </a>
        </header>

        <div class="table-card">
            <div class="table-scroll">
                <table class="students-table">
                    <thead>
                        <tr>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td>{{ $student->nis }}</td>
                                <td>{{ $student->nama ?? $student->name }}</td>
                                <td>{{ $student->kelas ?? $student->class_name }}</td>
                                <td>{{ $student->jenis_kelamin ?? $student->gender }}</td>
                                <td>{{ $student->tanggal_lahir ?? $student->birth_date }}</td>
                                <td>{{ $student->alamat ?? $student->address }}</td>
                                <td class="actions">
                                    <a href="{{ route('students.edit', $student->id) }}"
                                        class="btn btn-primary btn-small">Edit</a>

                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                        class="inline-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')"
                                            class="btn btn-delete btn-small">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center;">Tidak ada data siswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($modalOpen || $errors->any())
            <div class="modal-backdrop">
                <section class="modal" role="dialog" aria-modal="true" aria-labelledby="student-modal-title">
                    <div class="modal-header">
                        <div>
                            <h2 id="student-modal-title">{{ $student ? 'Edit Siswa' : 'Tambah Siswa' }}</h2>
                            <p class="subtitle">Isi informasi siswa pada formulir berikut.</p>
                        </div>
                        <a class="modal-close" href="{{ route('students.index') }}" aria-label="Tutup">&times;</a>
                    </div>

                    @if ($errors->any())
                        <div class="alert-success" style="background: #fef2f2; color: #b91c1c; border-color: #fecaca;">
                            <strong>Periksa kembali data yang diisi:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        action="{{ $student ? route('students.update', $student->id) : route('students.store') }}"
                        method="POST"
                    >
                        @csrf

                        @if ($student)
                            @method('PUT')
                        @endif

                        <div class="form-field">
                            <label for="nis">NIS</label>
                            <input id="nis" name="nis" value="{{ old('nis', $student->nis ?? '') }}" maxlength="30" required>
                            @error('nis')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="name">Nama siswa</label>
                            <input id="name" name="name" value="{{ old('name', $student->name ?? '') }}" required>
                            @error('name')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="class_name">Kelas</label>
                            <input id="class_name" name="class_name" value="{{ old('class_name', $student->class_name ?? '') }}" required>
                            @error('class_name')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="gender">Jenis kelamin</label>
                            <select id="gender" name="gender" required>
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki" @selected(old('gender', $student->gender ?? '') === 'Laki-laki')>Laki-laki</option>
                                <option value="Perempuan" @selected(old('gender', $student->gender ?? '') === 'Perempuan')>Perempuan</option>
                            </select>
                            @error('gender')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="birth_date">Tanggal lahir</label>
                            <input
                                type="date"
                                id="birth_date"
                                name="birth_date"
                                value="{{ old('birth_date', $student && $student->birth_date ? $student->birth_date->format('Y-m-d') : '') }}"
                            >
                            @error('birth_date')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="address">Alamat</label>
                            <textarea id="address" name="address">{{ old('address', $student->address ?? '') }}</textarea>
                            @error('address')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="modal-actions">
                            <a class="btn btn-secondary" href="{{ route('students.index') }}">Batal</a>
                            <button class="btn btn-primary" type="submit">
                                {{ $student ? 'Simpan Perubahan' : 'Simpan Siswa' }}
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        @endif
    </main>

    @if ($modalOpen || $errors->any())
        <script>
            document.body.classList.add('modal-open');
        </script>
    @endif
</body>

</html>
