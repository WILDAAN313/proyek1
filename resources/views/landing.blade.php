<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife.id - Hidup Sehat Lebih Mudah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-green-50 font-sans text-gray-800">


    <nav class="flex justify-between items-center px-8 py-4 bg-white shadow-sm">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('img/logo.png') }}" alt="FitLife Logo" class="h-8 w-8">
            <h1 class="text-2xl font-bold text-green-600">FitLife.id</h1>
        </div>
        <div class="space-x-3">
            <a href="/auth?tab=login"
                class="px-4 py-2 border border-green-600 text-green-600 rounded-lg hover:bg-green-600 hover:text-white transition">Login</a>
            <a href="/auth?tab=register"
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Daftar</a>
        </div>
    </nav>


    <section class="relative bg-green-600 text-white text-center py-24 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center opacity-20"
            style="background-image: url('{{ asset('img/healthy-bg.jpg') }}')"></div>
        <div class="relative z-10 max-w-3xl mx-auto">
            <h1 class="text-4xl font-extrabold mb-4">Selamat Datang di <span class="text-yellow-200">Fitlife.id</span>
            </h1>
            <p class="text-lg mb-8">Platform manajemen diet dan pola makan digital untuk hidup yang lebih sehat dan
                bahagia</p>
            <div class="space-x-4">
                <a href="/auth?tab=register"
                    class="bg-white text-green-700 px-6 py-3 rounded-lg font-semibold hover:bg-green-100 transition">Mulai
                    Sekarang</a>
                <a href="#fitur"
                    class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-700 transition">Pelajari
                    Lebih Lanjut →</a>
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section id="fitur" class="py-16 text-center bg-white">
        <h2 class="text-3xl font-bold mb-2 text-green-700">Fitur Unggulan FitLife.id</h2>
        <p class="text-gray-500 mb-10">Dapatkan semua yang anda butuhkan untuk mencapai tujuan kesehatan anda</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
            <!-- Kalkulator BMI -->
            <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
                <div class="text-green-600 text-5xl mb-3">📱</div>
                <h3 class="text-xl font-bold mb-2">Kalkulator BMI</h3>
                <p class="text-gray-500 mb-4">Hitung indeks massa tubuh anda dan dapatkan rekomendasi berat badan ideal
                </p>
                <a href="/auth?tab=login"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Lihat
                    Detail →</a>
            </div>

            <!-- Menu Sehat -->
            <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
                <div class="text-green-600 text-5xl mb-3">🥗</div>
                <h3 class="text-xl font-bold mb-2">Menu Sehat</h3>
                <p class="text-gray-500 mb-4">Temukan berbagai pilihan menu makanan sehat untuk diet anda</p>
                <a href="/auth?tab=login"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Lihat
                    Detail →</a>
            </div>

            <!-- Artikel -->
            <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
                <div class="text-green-600 text-5xl mb-3">📖</div>
                <h3 class="text-xl font-bold mb-2">Artikel</h3>
                <p class="text-gray-500 mb-4">Baca artikel dan tips seputar diet serta pola hidup sehat</p>
                <a href="/auth?tab=login"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Lihat
                    Detail →</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-green-600 text-white text-center py-16">
        <h2 class="text-3xl font-extrabold mb-3">Siap Memulai Perjalanan Sehat Anda?</h2>
        <p class="text-lg text-green-100 mb-8">Bergabunglah dengan ribuan pengguna yang telah merasakan manfaat hidup
            lebih sehat</p>
        <a href="/auth?tab=login"
            class="bg-white text-green-700 px-6 py-3 rounded-lg font-semibold hover:bg-green-100 transition">Hitung BMI
            Sekarang →</a>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 text-gray-500 text-sm bg-white border-t">
        © 2025 FitLife.id — Hidup Sehat Dimulai dari Sekarang
    </footer>

</body>

</html>