@extends('layouts.app') {{-- Menggunakan layout utama yang sama, atau buat layout admin terpisah jika perlu --}}

@section('title', 'Admin Dashboard')

@push('styles')
<style>
    .dashboard-card {
        transition: transform .2s ease-out, box-shadow .2s ease-out;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
    .dashboard-card .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 150px; /* Pastikan card punya tinggi minimal */
    }
    .dashboard-card .icon {
        font-size: 3rem; /* Ukuran ikon besar */
        margin-bottom: 0.5rem;
        color: #0d6efd; /* Warna ikon biru */
    }
</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="display-5 fw-bold" id="welcomeAdminMessage">Selamat Datang di Dashboard Admin!</h1>
                    <p class="col-md-8 fs-5">Kelola semua aspek Dapur Gaib dari sini. Anda dapat mengatur data makanan, berbagai jenis kategori, dan melihat statistik (fitur mendatang).</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Card untuk Kelola Kategori Utama --}}
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card h-100">
                <a href="{{ route('admin.categories.index') }}" class="text-decoration-none text-dark">
                    <div class="card-body text-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                                <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                            </svg>
                        </div>
                        <h5 class="card-title">Kelola Kategori Utama</h5>
                        <p class="card-text small text-muted">Tambah, edit, atau hapus kategori seperti Sarapan, Minuman, dll.</p>
                    </div>
                </a>
            </div>
        </div>

        {{-- Card untuk Kelola Makanan --}}
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card h-100">
                {{-- Ganti # dengan route('admin.foods.index') setelah dibuat --}}
                <a href="#" class="text-decoration-none text-dark disabled-link"> {{-- Tambah class disabled-link jika belum ada --}}
                    <div class="card-body text-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                                <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path d="M13.997 5.17a5 5 0 0 0-8.101-4.09A5 5 0 0 0 1.27 6.176a5 5 0 0 0 4.276 8.021 5 5 0 0 0 8.101-4.09A5 5 0 0 0 13.997 5.17zm-4.605-1.4A3.001 3.001 0 0 1 8 2.024a3.001 3.001 0 0 1 3.406 2.734.03.03 0 0 0 .04.028.038.038 0 0 0 .046.003.053.053 0 0 0 .02-.003.053.053 0 0 0 .012-.01A3.001 3.001 0 0 1 8 5.063a3.001 3.001 0 0 1-2.982-2.733.049.049 0 0 0-.004-.03.05.05 0 0 0-.012-.01A2.99 2.99 0 0 1 5 4.718a3.001 3.001 0 0 1 4.392-2.948z"/>
                            </svg>
                        </div>
                        <h5 class="card-title">Kelola Makanan & Minuman</h5>
                        <p class="card-text small text-muted">Atur daftar makanan dan minuman beserta semua detail dan relasinya.</p>
                    </div>
                </a>
            </div>
        </div>

        {{-- Card untuk Kelola Moods --}}
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card h-100">
                {{-- Ganti # dengan route('admin.moods.index') setelah dibuat --}}
                <a href="#" class="text-decoration-none text-dark disabled-link">
                    <div class="card-body text-center">
                        <div class="icon">
                             <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5c0 .501-.164.396-.428.233-.27-.167-.582-.283-.932-.283B4.013 6.45 3.5 7.013V7.5h1.003a.5.5 0 0 1 0 1H3.5V9c0 .01.003.028.003.043C3.542 9.873 4.33 10.5 5.64 10.5c.966 0 1.71-.373 2.09-.901.015-.02.022-.04.022-.064V9a.5.5 0 0 0-1 0v.01a1.5 1.5 0 0 1-.076.444C6.405 9.806 6.009 10 5.64 10c-.71 0-1.14-.329-1.14-.843V7.5H5.5a.5.5 0 0 0 0-1H4.457C4.164 6.501 4.5 6.5 5.042 6.5h.002C6.15 6.5 7 7.001 7 6.5zm5 0c0 .501-.164.396-.428.233-.27-.167-.582-.283-.932-.283B9.013 6.45 8.5 7.013V7.5h1.003a.5.5 0 0 1 0 1H8.5V9c0 .01.003.028.003.043C8.542 9.873 9.33 10.5 10.64 10.5c.966 0 1.71-.373 2.09-.901.015-.02.022-.04.022-.064V9a.5.5 0 0 0-1 0v.01a1.5 1.5 0 0 1-.076.444C11.405 9.806 11.009 10 10.64 10c-.71 0-1.14-.329-1.14-.843V7.5H10.5a.5.5 0 0 0 0-1H9.457C9.164 6.501 9.5 6.5 10.042 6.5h.002C11.15 6.5 12 7.001 12 6.5z"/>
                            </svg>
                        </div>
                        <h5 class="card-title">Kelola Moods</h5>
                        <p class="card-text small text-muted">Atur daftar suasana hati untuk rekomendasi.</p>
                    </div>
                </a>
            </div>
        </div>
        {{-- Tambahkan card serupa untuk Occasions, WeatherConditions, DietaryRestrictions, CuisineTypes --}}
        {{-- Contoh untuk Occasions --}}
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card h-100">
                <a href="#" class="text-decoration-none text-dark disabled-link">
                    <div class="card-body text-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </div>
                        <h5 class="card-title">Kelola Acara (Occasions)</h5>
                        <p class="card-text small text-muted">Atur jenis-jenis acara atau kesempatan.</p>
                    </div>
                </a>
            </div>
        </div>
        {{-- Anda bisa melanjutkan dengan membuat card untuk WeatherConditions, DietaryRestrictions, dan CuisineTypes --}}
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const token = localStorage.getItem('api_token'); // Ini adalah token API, bukan session login web
        const apiUrl = '{{ url("/api") }}'; // URL API publik Anda
        const welcomeAdminMessage = document.getElementById('welcomeAdminMessage');

        // Script ini akan mencoba mengambil nama user dari API publik jika ada token API tersimpan,
        // tetapi untuk panel admin yang menggunakan session auth Laravel,
        // nama user seharusnya sudah tersedia melalui Auth::user() di backend Blade.
        // Kita bisa menyederhanakan ini atau membiarkannya sebagai contoh.

        // Untuk menyapa user admin yang login melalui session web Laravel:
        @if(auth()->check()) // Cek apakah user sudah login via session web Laravel
            if (welcomeAdminMessage) {
                welcomeAdminMessage.textContent = `Selamat Datang di Dashboard Admin, {{ auth()->user()->name }}!`;
            }
        @endif

        // Kode di bawah ini lebih relevan jika dashboard ini juga mengandalkan token API
        // untuk mengambil info user, yang mungkin tidak diperlukan jika sudah ada session auth web.
        /*
        if (token && welcomeAdminMessage) { // Hanya jika ada token DAN elemen welcome message
            fetch(`${apiUrl}/auth/me`, { // Menggunakan API publik untuk /me
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
            })
            .then(response => {
                if (response.ok) return response.json();
                return null; // atau throw error
            })
            .then(data => {
                if (data && data.name) {
                    welcomeAdminMessage.textContent = `Selamat Datang di Dashboard Admin, ${data.name}!`;
                }
            })
            .catch(error => console.error('Error fetching user for dashboard via API:', error));
        }
        */
    });
</script>
@endpush