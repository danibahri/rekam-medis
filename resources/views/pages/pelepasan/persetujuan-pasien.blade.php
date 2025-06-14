<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Surat Persetujuan Umum Pasien</title>
        <style>
            body {
                font-family: 'Times New Roman', serif;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                line-height: 1.4;
                color: #333;
                background-color: #fff;
            }

            .header {
                text-align: center;
                margin-bottom: 30px;
                padding-bottom: 15px;
            }

            .practice-info {
                font-size: 14px;
                margin-bottom: 5px;
            }

            .title {
                text-align: center;
                font-size: 18px;
                font-weight: bold;
                text-decoration: underline;
                margin: 20px 0;
            }

            .section-title {
                font-weight: bold;
                font-size: 16px;
                margin-bottom: 10px;
                text-decoration: underline;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .form-group label {
                display: inline-block;
                width: 200px;
                font-weight: normal;
            }

            .form-group input[type="text"] {
                border: none;
                border-bottom: 1px solid #333;
                padding: 2px 5px;
                font-family: inherit;
                font-size: inherit;
                width: 300px;
            }

            .patient-data {
                padding-top: 10px;
                margin-top: 10px;
                padding-bottom: 20px;
            }

            .agreement-section {
                margin-top: 20px;
            }

            .agreement-title {
                text-decoration: underline;
                font-weight: bold;
                margin-bottom: 15px;
            }

            ol,
            ul {
                padding-left: 25px;
            }

            li {
                margin-bottom: 8px;
                text-align: justify;
            }

            .signature-section {
                margin-top: 40px;
                padding-top: 20px;
            }

            .signature-row {
                display: flex;
                justify-content: space-between;
                margin-top: 30px;
            }

            .signature-box {
                text-align: center;
                width: 200px;
            }

            .signature-line {
                border-bottom: 1px solid #333;
                height: 60px;
                margin-bottom: 5px;
            }

            .date-input {
                border: none;
                border-bottom: 1px solid #333;
                padding: 2px;
                font-family: inherit;
            }

            @media print {
                body {
                    margin: 0;
                    padding: 15px;
                }

                input[type="text"],
                .date-input {
                    border-bottom: 1px solid #000 !important;
                    -webkit-print-color-adjust: exact;
                }
            }
        </style>
    </head>

    <body>
        <div class="header">
            <div class="practice-info">Praktik Mandiri</div>
            <div class="practice-info">{{ $dokter->nama_dokter }}</div>
            <div class="practice-info">SIP. {{ $dokter->sip }}</div>
            <div class="practice-info">Perumahan Nilam Bangkalan Indah Blok D No 1.</div>
        </div>

        <div class="title">Surat Persetujuan Umum Pasien</div>

        <div class="section">
            <p><strong>Yang membuat pernyataan,</strong></p>
            <table>
                <tr>
                    <td style="padding: 0 10px 10px 0">Nama</td>
                    <td>: ......................................</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Tempat, Tanggal Lahir</td>
                    <td>: ...............,.......................</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Alamat</td>
                    <td>: ......................................</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Nomor Telepon</td>
                    <td>: ......................................</td>

                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Hubungan dengan Pasien</td>
                    <td>: ......................................</td>

                </tr>
            </table>
        </div>

        <div class="patient-data">
            <p style="border-bottom: 2px solid #333"><strong>Data Pasien</strong></p>
            <table>
                <tr>
                    <td style="padding: 0 10px 10px 0">Nama</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Alamat</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->alamat_lengkap }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Nomor Telepon</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->telepon_seluler }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Jenis Kelamin</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->jenisKelamin->nama }}</td>
                </tr>
            </table>
        </div>

        <div class="agreement-section">
            <div class="agreement-title">Menyatakan Setuju, Mengerti, dan Memahami</div>

            <p><strong>HAK DAN KEWAJIBAN SEBAGAI PASIEN.</strong> Dengan menandatangani dokumen ini saya mengaku bahwa
                pada proses pendaftaran untuk mendapatkan pengobatan di Praktik Mandiri ini telah mendapat informasi
                tentang hak dan kewajiban saya sebagai pasien</p>

            <div class="section">
                <div class="section-title">A. PERSETUJUAN PEMBAYARAN</div>
                <p>Saya menyetujui untuk melakukan pembayaran biaya perawatan secara langsung di loket pendaftaran atau
                    kasir menggunakan uang tunai.</p>
            </div>

            <div class="section">
                <div class="section-title">B. TATA TERTIB PRAKTIK MANDIRI</div>
                <ol>
                    <li>Harap menghormati tenaga kesehatan dan sesama pasien.</li>
                    <li>Dilarang mengambil foto atau merekam tanpa izin.</li>
                    <li>Pasien atau keluarga yang bersikap tidak sopan atau mengganggu ketertiban akan diminta
                        meninggalkan area praktik.</li>
                </ol>
            </div>

            <div class="section">
                <div class="section-title">C. KERAHASIAAN INFORMASI</div>
                <p>Saya memberi kuasa kepada setiap dan seluruh orang yang akan merawat saya untuk memeriksa dan atau
                    memberitahukan informasi kesehatan saya kepada pemberi kesehatan lain yang turut merawat saya selama
                    di praktik mandiri dr. Indah Yuliarini, Sp. THT-KL dan kepada pihak ketiga.</p>
            </div>

            <div class="section">
                <div class="section-title">D. HAK PASIEN</div>
                <ol>
                    <li>Memperoleh informasi mengenai tata tertib dan peraturan yang berlaku di Praktik Mandiri dr.
                        Indah Yuliarini, Sp. THT-KL.</li>
                    <li>Mendapatkan pelayanan yang manusiawi, adil, dan jujur.</li>
                    <li>Memperoleh pelayanan medis yang bermutu sesuai dengan standar profesi kedokteran/ kedokteran
                        gigi dan tanpa diskriminasi.</li>
                    <li>Atas "privacy" dan kerahasiaan penyakit yang diderita termasuk data medisnya.</li>
                    <li>Mendapat informasi yang meliputi penyakit yang diderita, tindakan medis yang akan dilakukan,
                        kemungkinan penyulit sebagai akibat tindakan tersebut dan tindakan untuk mengatasinya,
                        alternatif terapi lainnya, prognosa dan perkiraan biaya pengobatan.</li>
                    <li>Menyetujui/ memberikan ijin atas tindakan yang akan dilakukan dokter sehubungan dengan penyakit
                        yang diderita.</li>
                    <li>Menolak tindakan yang hendak dilakukan terhadap dirinya dan mengakhiri pengobatan atas tanggung
                        jawab sendiri sesudah mendapat informasi yang jelas tentang penyakitnya.</li>
                    <li>Atas keamanan dan keselamatan dirinya selama pemeriksaan.</li>
                    <li>Mengajukan usulan, saran, perbaikan atas perlakuan Praktik Mandiri dr. Indah Yuliarini, Sp.
                        THT-KL, terhadap anda.</li>
                    <li>Pasien boleh menuntut Praktik Mandiri dr. Indah Yuliarini, Sp. THT-KL apabila dirugikan oleh
                        Praktik Mandiri.</li>
                    <li>Pasien boleh mengeluh pada Praktik Mandiri apabila tidak memperoleh pelayanan yang diharapkan.
                    </li>
                </ol>
            </div>

            <div class="section">
                <div class="section-title">E. KEWAJIBAN PASIEN</div>
                <ol>
                    <li>Pasien dan keluarganya berkewajiban untuk mentaati segala peraturan dan tata tertib Praktik
                        Mandiri dr. Indah Yuliarini, Sp. THT-KL.</li>
                    <li>Pasien berkewajiban untuk memenuhi segala program dokter dan pengobatannya.</li>
                    <li>Pasien berkewajiban memberikan informasi dengan jujur dan selengkapnya tentang keluhan yang
                        dirasakan kepada dokter.</li>
                    <li>Pasien dan penanggungnya berkewajiban untuk melunasi semua imbalan jasa dokter atas pelayanan
                        yang diberikan.</li>
                    <li>Pasien atau penanggungnya berkewajiban untuk memenuhi berbagai hal yang telah disepakati /
                        perjanjian yang telah dibuatnya.</li>
                </ol>
            </div>
        </div>
        <div class="ttd" style="width:100%">
            <p style="text-align:right; margin-right:50px">Bangkalan,..................................</p>
            <table border="0" style="margin: auto; margin-top:50px; width:100%">
                <tr>
                    <td style="text-align: center">yang penanggung jawab,</td>
                    <td style="text-align: center">Nama petugas,</td>
                    <td style="text-align: center">Yang membuat pernyataan,</td>
                </tr>
                <tr>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                </tr>
                <tr>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                </tr>
                <tr>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                </tr>
                <tr>
                    <td style="text-align: center">(............................................)</td>
                    <td style="text-align: center">(............................................)</td>
                    <td style="text-align: center">(............................................)</td>
                </tr>
            </table>
        </div>
    </body>

</html>
