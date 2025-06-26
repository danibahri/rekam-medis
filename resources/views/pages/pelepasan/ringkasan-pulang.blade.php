<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ringkasan Pulang Pasien</title>
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

        @php
            $kunjungan = App\Models\Kunjungan::where('id_pasien', $pasien->id_pasien)
                ->orderBy('tanggal_kunjungan', 'desc')
                ->first();
        @endphp
        <div class="title">Ringkasan Pulang Pasien</div>
        <div class="section">
            <table>
                <tr>
                    <td style="padding: 0 10px 10px 0">Nama</td>
                    <td>: {{ $pasien->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Tempat, Tanggal Lahir</td>
                    <td>: {{ $pasien->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Alamat</td>
                    <td>: {{ $pasien->alamat_lengkap }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Jenis Kelamin</td>
                    <td>: {{ $pasien->jenisKelamin->nama }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Tanggal Perawatan</td>
                    <td>: {{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Dokter yang menangani</td>
                    <td>: {{ $dokter->nama_dokter }}</td>
                </tr>
            </table>
        </div>

        <div class="patient-data">
            <table>
                <tr>
                    <td style="padding: 0 10px 10px 0">a. Anamnesa :
                        <p>{{ $kunjungan->assessment->anamnesa }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">b. Riwayat Penyakit Terdahulu :
                        <p>{{ $kunjungan->assessment->riwayat_penyakit }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">c. Diagnosa akhir :
                        <p>- ICD 10 : {{ $kunjungan->assessment->kode_icd10 }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">d. Pengobatan dan Tindakan :
                        <p>- ICD 9 : {{ $kunjungan->tindakan->kode_icd9 }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">e. Obat-obatan yang masih diminum, dosis, warna, dan efek samping
                        :
                        <p style="padding: 30px 0px 30px 0"></p>
                    </td>

                </tr>
            </table>
        </div>

        <div class="ttd" style="width:100%">
            <p style="text-align:right; margin-right:120px">Bangkalan,..................................</p>
            <table border="0" style="margin: auto; margin-top:50px; width:100%">
                <tr>
                    <td style="text-align: center">Nama/Penanggung Jawab,</td>
                    <td style="text-align: center">Dokter,</td>
                </tr>
                <tr>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                </tr>
                <tr>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                </tr>
                <tr>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                </tr>
                <tr>
                    <td style="text-align: center">(............................................)</td>
                    <td style="text-align: center">({{ $dokter->nama_dokter }})</td>
                </tr>
            </table>
        </div>
    </body>

</html>
