<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Presensi</title>
    <link rel="stylesheet" href="{{ url('assets_admin/css/bootstrap_bs5.min.css') }}">

    <style>
        body {
            /* background: linear-gradient(135deg, #ff9a9e, #fad0c4); */
            background-image: url("{{ asset('assets_admin/img/bg1.jpg') }}");
            background-size: cover; /* Menyesuaikan dengan layar */
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            background-attachment: local;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #6c63ff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #5548c8;
        }
        .logo {
            max-width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
        @include('sweetalert::alert')

            <div class="col-md-6">
                <div class="card p-4">
                    <div class="text-center">
                        <!-- Logo -->
                        <img src="{{ url('assets_admin/img/logo_gpib.jpeg') }}" alt="Logo" class="logo">
                        <h3 class="fw-bold">Form Presensi</h3>
                        <h6>Pembinaan Pengurus & Pelayan PA PT</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('presensi.store') }}">
                            @method('post')
                            @csrf
                            <div class="mb-3">
                                <label for="longitude" class="form-label">No WA</label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="number" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" placeholder="Pastikan nomor WA benar" required>
                                </div>
                                @error('phone_number')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                                <input type="hidden" id="latitude" name="latitude" class="form-control" required>
                                <input type="hidden" id="longitude" name="longitude" class="form-control" required>
                            <button type="submit" class="btn btn-primary w-100">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Geolocation Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById("latitude").value = position.coords.latitude;
                    document.getElementById("longitude").value = position.coords.longitude;
                }, function(error) {
                    alert("Gagal mendapatkan lokasi: " + error.message);
                });
            } else {
                alert("Geolocation tidak didukung oleh browser Anda.");
            }
        });

        /* if (window.location.protocol !== "https:") {
            alert("Akses lokasi hanya diperbolehkan pada koneksi HTTPS.");
        } */

    </script>
    <script src="{{ url('assets_admin/js/bootstrap_bs5.bundle.min.js"></script>
</body>
</html>
