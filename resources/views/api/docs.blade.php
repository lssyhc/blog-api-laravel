<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dokumentasi Blog API</title>
        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                background-color: #f8f9fa;
                margin: 0;
                padding: 20px;
            }

            .container {
                max-width: 900px;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }

            h1,
            h2,
            h3 {
                color: #2c3e50;
                border-bottom: 2px solid #eaecef;
                padding-bottom: 10px;
                margin-top: 40px;
            }

            h1 {
                font-size: 2.2em;
            }

            h2 {
                font-size: 1.8em;
            }

            h3 {
                font-size: 1.4em;
                border-bottom: 1px solid #eaecef;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            th,
            td {
                border: 1px solid #dfe2e5;
                padding: 12px 15px;
                text-align: left;
            }

            th {
                background-color: #f6f8fa;
                font-weight: 600;
            }

            tr:nth-child(even) {
                background-color: #f6f8fa;
            }

            code {
                font-family: "SFMono-Regular", Consolas, "Liberation Mono", Menlo, Courier, monospace;
                font-size: 0.9em;
                background-color: #f1f1f1;
                padding: 3px 6px;
                border-radius: 4px;
            }

            pre {
                background-color: #2d2d2d;
                color: #f1f1f1;
                padding: 20px;
                border-radius: 6px;
                overflow-x: auto;
                white-space: pre-wrap;
                word-wrap: break-word;
            }

            pre code {
                background-color: transparent;
                padding: 0;
                color: inherit;
            }

            strong {
                color: #16a085;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Dokumentasi Blog API</h1>

            <h2>URL Dasar</h2>
            <p>Semua URL endpoint API diawali dengan:</p>
            <pre><code>https://lssyhc-dev.my.id/api</code></pre>

            <h2>Struktur Respons Umum</h2>
            <p>API ini menggunakan struktur respons JSON yang konsisten untuk kemudahan integrasi di sisi frontend.</p>

            <h3>✅ Respons Sukses</h3>
            <pre><code>{
    "code": 200,
    "status": "success",
    "message": "Pesan deskriptif tentang suksesnya operasi.",
    "data": { ... },
    "error": null
  }</code></pre>

            <h3>❌ Respons Gagal/Error</h3>
            <pre><code>{
    "code": 422,
    "status": "error",
    "data": null,
    "error": {
        "message": "Pesan utama tentang kenapa error terjadi.",
        "errors": {
            "nama_field": [
                "Detail error spesifik untuk field ini."
            ]
        }
    }
}</code></pre>

            <hr style="margin-top: 40px; border: 1px solid #eaecef;">

            <h2>🔐 Autentikasi & Manajemen Pengguna</h2>

            <h3>1. Registrasi Pengguna Baru</h3>
            <p>Membuat akun pengguna baru dalam sistem.</p>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /register</code></li>
                <li><strong>Metode:</strong> <code>POST</code></li>
                <li><strong>Payload:</strong> <code>application/json</code></li>
            </ul>
            <table>
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Tipe</th>
                        <th>Aturan Validasi</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>fullname</code></td>
                        <td>string</td>
                        <td><code>required, string, max:255</code></td>
                        <td>Nama lengkap pengguna.</td>
                    </tr>
                    <tr>
                        <td><code>username</code></td>
                        <td>string</td>
                        <td><code>required, string, max:255, unique:users</code></td>
                        <td>Username unik untuk login.</td>
                    </tr>
                    <tr>
                        <td><code>email</code></td>
                        <td>string</td>
                        <td><code>required, email, max:255, unique:users</code></td>
                        <td>Alamat email unik pengguna.</td>
                    </tr>
                    <tr>
                        <td><code>password</code></td>
                        <td>string</td>
                        <td><code>required, confirmed, min:8</code>, (harus mengandung huruf besar, huruf kecil, angka,
                            dan simbol)</td>
                        <td>Kata sandi yang kuat.</td>
                    </tr>
                    <tr>
                        <td><code>password_confirmation</code></td>
                        <td>string</td>
                        <td><code>required</code></td>
                        <td>Konfirmasi kata sandi, harus sama dengan <code>password</code>.</td>
                    </tr>
                </tbody>
            </table>

            <h4>Contoh Payload:</h4>
            <pre><code>{
    "fullname": "John Doe",
    "username": "johndoe",
    "email": "john.doe@example.com",
    "password": "Password123!",
    "password_confirmation": "Password123!"
}</code></pre>

            <h4>Respons Sukses (Kode: 201 Created):</h4>
            <pre><code>{
    "code": 201,
    "status": "success",
    "message": "User successfully registered.",
    "data": {
        "user": {
            "user_id": 1,
            "fullname": "John Doe",
            "username": "johndoe",
            "email": "john.doe@example.com",
            "role": "user",
            "created_at": "2025-07-28 13:00:00",
            "updated_at": "2025-07-28 13:00:00"
        },
        "token": "1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
        "token_type": "Bearer Token"
    },
    "error": null
}</code></pre>

            <h3>2. Login Pengguna</h3>
            <p>Mengautentikasi pengguna dan mengembalikan token akses.</p>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /login</code></li>
                <li><strong>Metode:</strong> <code>POST</code></li>
                <li><strong>Payload:</strong> <code>application/json</code></li>
            </ul>
            <table>
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Tipe</th>
                        <th>Aturan Validasi</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>email</code></td>
                        <td>string</td>
                        <td><code>required, email</code></td>
                        <td>Alamat email terdaftar.</td>
                    </tr>
                    <tr>
                        <td><code>password</code></td>
                        <td>string</td>
                        <td><code>required</code></td>
                        <td>Kata sandi akun.</td>
                    </tr>
                </tbody>
            </table>

            <h4>Contoh Payload:</h4>
            <pre><code>{
    "email": "john.doe@example.com",
    "password": "Password123!"
}</code></pre>

            <h4>Respons Sukses (Kode: 200 OK):</h4>
            <p>Respons sukses akan berisi data pengguna beserta token akses baru, mirip dengan respons saat registrasi.
            </p>

            <h4>Respons Gagal (Kode: 401 Unauthorized):</h4>
            <p>Jika email atau password salah.</p>
            <pre><code>{
    "code": 401,
    "status": "error",
    "data": null,
    "error": "The provided credentials are incorrect."
}</code></pre>

            <h3>3. Logout Pengguna</h3>
            <p>Mencabut (revoke) token akses yang sedang digunakan.</p>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /logout</code></li>
                <li><strong>Headers:</strong> <code>Authorization: Bearer &lt;token&gt;</code></li>
            </ul>

            <h3>4. Detail Pengguna Terautentikasi</h3>
            <p>Mendapatkan detail pengguna yang sedang login.</p>
            <ul>
                <li><strong>Endpoint:</strong> <code>GET /user</code></li>
                <li><strong>Headers:</strong> <code>Authorization: Bearer &lt;token&gt;</code></li>
            </ul>

            <hr style="margin-top: 40px; border: 1px solid #eaecef;">

            <h2>🔑 Autentikasi Google (OAuth2)</h2>
            <h3>1. Redirect ke Halaman Login Google</h3>
            <ul>
                <li><strong>Endpoint:</strong> <code>GET /auth/google/redirect</code></li>
                <li><strong>Aksi:</strong> Server akan mengarahkan (HTTP 302 Redirect) browser ke halaman persetujuan
                    akun Google.</li>
            </ul>

            <h3>2. Callback dari Google</h3>
            <ul>
                <li><strong>Endpoint:</strong> <code>GET /auth/google/callback</code></li>
                <li><strong>Aksi:</strong> Google akan mengarahkan kembali ke URL ini. Server memproses data dan
                    mengembalikan JSON berisi data pengguna dan token.</li>
            </ul>

            <hr style="margin-top: 40px; border: 1px solid #eaecef;">

            <h2>📧 Verifikasi Email</h2>
            <h3>Kirim Email Verifikasi</h3>
            <p>Jika pengguna yang telah login perlu meminta link verifikasi.</p>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /email/verification-notification</code></li>
                <li><strong>Headers:</strong> <code>Authorization: Bearer &lt;token&gt;</code></li>
                <li><strong>Catatan:</strong> Dibatasi hanya 1 kali per menit.</li>
            </ul>
            <h4>Respons Sukses (Kode: 200 OK):</h4>
            <pre><code>{
    "code": 200,
    "status": "success",
    "message": "Verification link sent!",
    "data": null,
    "error": null
}</code></pre>

            <hr style="margin-top: 40px; border: 1px solid #eaecef;">

            <h2>🔄 Lupa & Reset Kata Sandi</h2>
            <h3>1. Kirim Link Reset Kata Sandi</h3>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /forgot-password</code></li>
            </ul>
            <table>
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>email</code></td>
                        <td>string</td>
                        <td>Email akun yang akan direset.</td>
                    </tr>
                </tbody>
            </table>

            <h3>2. Proses Reset Kata Sandi</h3>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /reset-password</code></li>
            </ul>
            <table>
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>token</code></td>
                        <td>string</td>
                        <td>Token yang didapat dari URL di email.</td>
                    </tr>
                    <tr>
                        <td><code>email</code></td>
                        <td>string</td>
                        <td>Alamat email pengguna.</td>
                    </tr>
                    <tr>
                        <td><code>password</code></td>
                        <td>string</td>
                        <td>Kata sandi baru.</td>
                    </tr>
                    <tr>
                        <td><code>password_confirmation</code></td>
                        <td>string</td>
                        <td>Konfirmasi kata sandi baru.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>

</html>
