@extends('layouts.main')

@section('title', $title)

@section('content')
    <style>
        .calc-hero {
            position: relative;
            background: #e8f5ef;
            color: #2b2b2b;
            padding: 80px 0 110px;
            text-align: center;
        }

        /* blob lembut di belakang card */
        .calc-hero::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -30px;
            width: 520px;
            height: 240px;
            background: rgba(31, 184, 121, 0.07);
            border-radius: 40px;
            filter: blur(26px);
            z-index: 1;
            pointer-events: none;
        }

        .calc-card {
            margin-top: -60px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.10);
            position: relative;
            z-index: 2;
        }

        .fitlife-icon {
            width: 80px;
            height: 80px;
            background: #e8f8ef;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fitlife-icon i {
            font-size: 42px;
            color: #1fb879;
        }

        .subtitle {
            margin-top: 8px;
            margin-bottom: 22px;
            color: #51615a;
            font-weight: 500;
        }

        .hero-divider {
            width: 64px;
            height: 4px;
            background: rgba(31, 184, 121, 0.22);
            border-radius: 4px;
            margin: 0 auto 8px;
        }

        .hero-features {
            margin-top: 18px;
        }

        .hero-features .feature {
            color: #3d5a50;
            font-weight: 500;
        }

        .hero-features .feature i {
            font-size: 18px;
            color: #1fb879;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #2b2b2b;
        }

        .form-control,
        .form-select {
            height: 45px;
            border-radius: 10px;
            border: 1px solid #d9e5dd;
        }

        .btn-fitlife {
            background: #1fb879;
            color: #fff;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            transition: .2s ease;
        }

        .btn-fitlife:hover {
            background: #18a067;
            color: #fff;
        }

        /* ruang ekstra bawah halaman */
        .page-bottom-space {
            padding-bottom: 90px;
        }

        @media (max-width: 576px) {
            .calc-hero {
                padding: 70px 0 90px;
            }

            .calc-hero::after {
                width: 90%;
                height: 200px;
            }

            .calc-card {
                margin-top: -50px;
            }

            .page-bottom-space {
                padding-bottom: 70px;
            }
        }
    </style>

    <section class="calc-hero text-center">
        <div class="container">
            <div class="fitlife-icon mx-auto mb-2">
                <i class="bi bi-activity"></i>
            </div>

            <h2 class="fw-bold mb-1">Kalkulator BMI</h2>

            <p class="mb-2 subtitle">
                Hitung indeks massa tubuh dan dapatkan rekomendasi kategori kesehatan Anda
            </p>

            <div class="hero-divider" aria-hidden="true"></div>

            <!-- fitur mini -->
            <div class="hero-features container mt-3">
                <div class="d-flex justify-content-center gap-4 flex-wrap">
                    <div class="d-flex align-items-center gap-2 feature">
                        <i class="bi bi-lightning-charge"></i>
                        <span>Proses Cepat</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 feature">
                        <i class="bi bi-heart-pulse"></i>
                        <span>Analisis Kesehatan Ringkas</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container page-bottom-space">
        <style>
            /* tambahan styling untuk info card agar serasi dengan calc-card */
            .calc-layout-row {
                gap: 28px;
            }

            .calc-card {
                margin-top: 0;
                /* sudah dihero, agar tidak nabrak */
                background: #fff;
                border-radius: 14px;
                box-shadow: 0 18px 40px rgba(0, 0, 0, 0.08);
                position: relative;
                z-index: 2;
            }

            .info-card {
                background: #fff;
                border-radius: 14px;
                padding: 22px;
                box-shadow: 0 14px 34px rgba(0, 0, 0, 0.06);
                height: 100%;
            }

            .info-card h4 {
                font-weight: 700;
                margin-bottom: 8px;
            }

            .info-card p {
                color: #6b7a73;
                margin-bottom: 14px;
            }

            .bmi-legend {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .bmi-legend li {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 8px;
                font-weight: 600;
                color: #374b47;
                font-size: 14px;
            }

            .bmi-dot {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                display: inline-block;
                flex-shrink: 0;
                box-shadow: 0 1px 0 rgba(0, 0, 0, 0.06);
            }

            .dot-low {
                background: #2bb3d6;
            }

            /* biru */
            .dot-normal {
                background: #1fb879;
            }

            /* hijau FitLife */
            .dot-over {
                background: #f2cf4d;
            }

            /* kuning */
            .dot-obese {
                background: #ff6b6b;
            }

            /* merah */

            /* responsive spacing */
            @media (min-width: 992px) {
                .calc-card {
                    padding: 28px;
                }

                .info-card {
                    padding: 26px;
                }
            }
        </style>

        <div class="row justify-content-center calc-layout-row align-items-start">
            <!-- KALKULATOR -->
            <div class="col-lg-6 col-md-8">
                <div class="card calc-card p-4">
                    <form method="POST" action="/kalkulator">
                        @csrf

                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                            <input type="number" name="tinggi" id="tinggi" class="form-control" required min="1"
                                placeholder="Contoh: 150">
                        </div>

                        <div class="mb-3">
                            <label for="berat" class="form-label">Berat Badan (kg)</label>
                            <input type="number" name="berat" id="berat" class="form-control" required min="1"
                                placeholder="Contoh: 43">
                        </div>

                        <button type="submit" class="btn btn-fitlife w-100">Hitung BMI</button>
                    </form>

                    @if (session('hasil'))
                        <div class="bmi-result-wrapper mt-4">
                            <div class="bmi-result-card">
                                {!! session('hasil') !!}
                            </div>
                        </div>
                    @endif


                </div>

                {{-- kecil-kecil di bawah card --}}
                <div class="d-flex justify-content-center gap-4 mt-3 small text-muted flex-wrap">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-stopwatch"></i>
                        <span>Hasil cepat & praktis</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-clipboard-check"></i>
                        <span>Kategori kesehatan jelas</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-lightbulb"></i>
                        <span>Bantu rencanakan pola hidup</span>
                    </div>
                </div>

                <!-- Info edukasi tambahan -->
                <div class="text-center mt-3 small text-muted" style="max-width: 600px; margin: 0 auto;">
                    Mengukur BMI membantu Anda memahami risiko kesehatan dan membuat keputusan gaya hidup yang lebih bijak.
                </div>
            </div>

            <!-- INFO CARD (di sebelah kanan) -->
            <div class="col-lg-4 col-md-6">
                <div class="info-card">
                    <h4>Tentang BMI</h4>
                    <p class="mb-2">Body Mass Index (BMI) adalah cara menghitung berat badan ideal berdasarkan tinggi dan
                        berat badan Anda. Hasil membantu mengidentifikasi risiko kesehatan terkait berat badan.</p>

                    <div class="mb-3 fw-bold">Kategori BMI:</div>

                    <ul class="bmi-legend">
                        <li><span class="bmi-dot dot-low"></span> &lt; 18.5 : Berat Badan Rendah</li>
                        <li><span class="bmi-dot dot-normal"></span> 18.5 – 24.9 : Normal</li>
                        <li><span class="bmi-dot dot-over"></span> 25 – 29.9 : Berat Badan Berlebih</li>
                        <li><span class="bmi-dot dot-obese"></span> &gt; 30 : Obesitas</li>
                    </ul>

                    <hr>

                    <h6 class="fw-bold">Tips singkat</h6>
                    <ul class="small text-muted" style="padding-left:18px;">
                        <li>Perbanyak sayur, kurangi gula dan makanan olahan.</li>
                        <li>Jaga porsi makan dan rutin berolahraga ringan.</li>
                        <li>Konsultasi ke ahli gizi untuk rekomendasi personal.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
