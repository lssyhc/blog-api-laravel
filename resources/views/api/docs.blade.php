<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dokumentasi Blog API</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet" />

        <style>
            :root {
                --bg-color: #f8f9fa;
                --container-bg: #ffffff;
                --text-color: #343a40;
                --heading-color: #2c3e50;
                --border-color: #eaecef;
                --accent-color: #16a085;
                --code-bg: #e9ecef;
                /* Mengubah warna pre agar cocok dengan tema Prism */
                --pre-bg: #272822;
                --pre-text: #f8f8f2;
                --table-header-bg: #f6f8fa;
                --table-stripe-bg: #f6f8fa;
                --info-bg: #eef7ff;
                --info-border: #3b82f6;
                --info-heading: #1e40af;
            }

            @media (prefers-color-scheme: dark) {
                :root {
                    --bg-color: #121212;
                    --container-bg: #1e1e1e;
                    --text-color: #e0e0e0;
                    --heading-color: #ffffff;
                    --border-color: #333333;
                    --accent-color: #1abc9c;
                    --code-bg: #333333;
                    --pre-bg: #272822;
                    --pre-text: #f8f8f2;
                    --table-header-bg: #2c3036;
                    --table-stripe-bg: #25282c;
                    --info-bg: #1e293b;
                    --info-border: #60a5fa;
                    --info-heading: #93c5fd;
                }
            }

            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                line-height: 1.7;
                color: var(--text-color);
                background-color: var(--bg-color);
                margin: 0;
                padding: 20px;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .container {
                max-width: 900px;
                margin: 0 auto;
                background-color: var(--container-bg);
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                border: 1px solid var(--border-color);
                transition: background-color 0.3s ease, border-color 0.3s ease;
            }

            h1,
            h2,
            h3,
            h4 {
                color: var(--heading-color);
                border-bottom: 2px solid var(--border-color);
                padding-bottom: 10px;
                margin-top: 40px;
                margin-bottom: 20px;
                transition: color 0.3s ease, border-color 0.3s ease;
            }

            h1 {
                font-size: 2.2em;
            }

            h2 {
                font-size: 1.8em;
            }

            h3 {
                font-size: 1.4em;
                border-bottom-width: 1px;
            }

            h4 {
                font-size: 1.1em;
                border-bottom: none;
                margin-top: 0;
                padding-bottom: 5px;
            }

            p,
            ul {
                margin-bottom: 20px;
            }

            ul {
                padding-left: 20px;
            }

            strong {
                color: var(--accent-color);
                font-weight: 600;
            }

            hr {
                margin-top: 40px;
                border: none;
                border-top: 1px solid var(--border-color);
            }

            .table-wrapper {
                overflow-x: auto;
                border: 1px solid var(--border-color);
                border-radius: 6px;
                margin: 20px 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                min-width: 600px;
            }

            th,
            td {
                border: 1px solid var(--border-color);
                padding: 12px 15px;
                text-align: left;
                transition: border-color 0.3s ease;
            }

            th {
                background-color: var(--table-header-bg);
                font-weight: 600;
                transition: background-color 0.3s ease;
            }

            tbody tr:nth-child(even) {
                background-color: var(--table-stripe-bg);
                transition: background-color 0.3s ease;
            }

            code {
                font-family: "SFMono-Regular", Consolas, "Liberation Mono", Menlo, Courier, monospace;
                font-size: 0.9em;
                background-color: var(--code-bg);
                color: var(--text-color);
                padding: 3px 6px;
                border-radius: 4px;
                transition: background-color 0.3s ease;
            }

            pre {
                background-color: var(--pre-bg);
                color: var(--pre-text);
                padding: 20px;
                border-radius: 8px;
                overflow-x: auto;
                white-space: pre-wrap;
                word-wrap: break-word;
                border: 1px solid var(--border-color);
                transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
                text-shadow: none;
            }

            pre code {
                background-color: transparent;
                padding: 0;
                color: inherit;
                font-size: 1em;
            }

            .info-box {
                background-color: var(--info-bg);
                border-left: 5px solid var(--info-border);
                margin: 25px 0;
                padding: 15px 20px;
                border-radius: 4px;
                transition: background-color 0.3s ease, border-color 0.3s ease;
            }

            .info-box h4 {
                color: var(--info-heading);
                margin-top: 0;
                transition: color 0.3s ease;
            }

            @media (max-width: 768px) {
                body {
                    padding: 10px;
                }

                .container {
                    padding: 20px;
                    width: 100%;
                }

                h1 {
                    font-size: 1.8em;
                }

                h2 {
                    font-size: 1.5em;
                }

                h3 {
                    font-size: 1.2em;
                }
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
            <pre><code class="language-json">{
    "code": 200,
    "status": "success",
    "message": "Pesan deskriptif tentang suksesnya operasi.",
    "data": { ... },
    "error": null
}</code></pre>

            <h3>❌ Respons Gagal/Error</h3>
            <pre><code class="language-json">{
    "code": 422,
    "status": "error",
    "data": null,
    "error": {
        "message": "Pesan utama tentang kenapa error terjadi.",
        "nama_field": [
            "Detail error spesifik untuk field ini."
        ]
    }
}</code></pre>

            <hr>

            <h2>🔐 Autentikasi & Manajemen Pengguna</h2>

            <h3>1. Registrasi Pengguna Baru</h3>
            <p>Membuat akun pengguna baru dalam sistem.</p>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /register</code></li>
                <li><strong>Metode:</strong> <code>POST</code></li>
                <li><strong>Payload:</strong> <code>application/json</code></li>
            </ul>
            <div class="table-wrapper">
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
                            <td><code>required, confirmed, min:8</code>, (harus mengandung huruf besar, huruf kecil,
                                angka, dan simbol)</td>
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
            </div>

            <h4>Contoh Payload:</h4>
            <pre><code class="language-json">{
    "fullname": "John Doe",
    "username": "johndoe",
    "email": "john.doe@example.com",
    "password": "Password123!",
    "password_confirmation": "Password123!"
}</code></pre>

            <h4>Respons Sukses (Kode: 201 Created):</h4>
            <pre><code class="language-json">{
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
            <div class="table-wrapper">
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
            </div>

            <h4>Contoh Payload:</h4>
            <pre><code class="language-json">{
    "email": "namauser@example.com",
    "password": "PasswordUser!"
}</code></pre>

            <div class="info-box">
                <h4>⭐ Login Sebagai Admin (Untuk Development)</h4>
                <p>Proyek ini menyediakan beberapa akun <strong>admin</strong> dari data awal (seeder).</p>

                <p><strong>Kredensial Login:</strong></p>
                <ul>
                    <li><strong>Email:</strong> <code>muziro@example.com</code> (Muamar Zidan)</li>
                    <li><strong>Email:</strong> <code>lssyhc@example.com</code> (Cahyo Susilo)</li>
                    <li><strong>Password</strong> untuk semua akun di atas adalah: <code>password</code></li>
                </ul>
            </div>

            <h4>Respons Sukses (Kode: 200 OK):</h4>
            <p>Respons sukses akan berisi data pengguna beserta token akses baru, mirip dengan respons saat registrasi.
            </p>

            <h4>Respons Gagal (Kode: 401 Unauthorized):</h4>
            <p>Jika email atau password salah.</p>
            <pre><code class="language-json">{
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

            <h4>Respons Sukses (Kode: 200 OK):</h4>
            <pre><code class="language-json">{
    "code": 201,
    "status": "success",
    "message": "Successfully retrieve user details.",
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
        "token": null,
        "token_type": "Bearer Token"
    },
    "error": null
}</code></pre>

            <hr>

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

            <h4>Respons Sukses (Kode: 201 Created):</h4>
            <pre><code class="language-json">{
    "code": 201,
    "status": "success",
    "message": "Successfully logged in using Google.",
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

            <hr>

            <h2>📧 Verifikasi Email</h2>
            <h3>Kirim Email Verifikasi</h3>
            <p>Jika pengguna yang telah login perlu meminta link verifikasi.</p>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /email/verification-notification</code></li>
                <li><strong>Headers:</strong> <code>Authorization: Bearer &lt;token&gt;</code></li>
                <li><strong>Catatan:</strong> Dibatasi hanya 1 kali per menit.</li>
            </ul>
            <h4>Respons Sukses (Kode: 200 OK):</h4>
            <pre><code class="language-json">{
    "code": 200,
    "status": "success",
    "message": "Verification link sent!",
    "data": null,
    "error": null
}</code></pre>

            <hr>

            <h2>🔄 Lupa & Reset Kata Sandi</h2>
            <h3>1. Kirim Link Reset Kata Sandi</h3>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /forgot-password</code></li>
            </ul>
            <div class="table-wrapper">
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
            </div>

            <h3>2. Proses Reset Kata Sandi</h3>
            <ul>
                <li><strong>Endpoint:</strong> <code>POST /reset-password</code></li>
            </ul>
            <div class="table-wrapper">
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
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    </body>

</html>
