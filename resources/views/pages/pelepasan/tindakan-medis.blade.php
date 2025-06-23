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

        <div class="title">Pernyataan Tindakan Medis</div>

        <div class="section">
            <p><strong>Yang bertanda tangan di bawah ini:</strong></p>
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
                    <td style="padding: 0 10px 10px 0">Nomor Telepon/HP</td>
                    <td>: ......................................</td>

                </tr>
            </table>
        </div>
        <div class="section">
            Menyatakan dengan sesungguhnya telah memberikan persetujuan untuk dilakukan tindakan medis terhadap
            saya sendiri / ayah / ibu / suami / istri / anak / saudara / wali dari:
        </div>

        <div class="patient-data">
            <table>
                <tr>
                    <td style="padding: 0 10px 10px 0">Nama Pasien</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Umur</td>
                    <td style="padding: 0 10px 10px 0">: {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->age }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Jenis Kelamin</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->jenisKelamin->nama }}</td>
                </tr>
                <tr>
                    <td style="padding: 0 10px 10px 0">Alamat</td>
                    <td style="padding: 0 10px 10px 0">: {{ $pasien->alamat_lengkap }}</td>
                </tr>
            </table>
        </div>

        <div class="agreement-section">
            <p>Dengan ini menyatakan MENERIMA / MENOLAK untuk dilakukan Tindakan Medis berupa: </p>
            <ol>
                <li>...........</li>
                <li>...........</li>
            </ol>
            <p>Konsekuensi dari tindakan:</p>
            <p>Dimana tujuan, sifat dan perlunya tindakan medis tersebut diatas, serta resiko yang dapat ditimbulkan
                telah cukup dijelaskan oleh dokter dan telah saya mengerti sepenuhnya.</p>
            <p>Demikian pernyataan persetujuan ini saya buat dengan kesadaran dan tanpa paksaan.</p>
        </div>
        <div class="ttd" style="width:100%">
            <p style="text-align:right; margin-right:50px">Bangkalan,..................................</p>
            <table border="0" style="margin: auto; margin-top:50px; width:100%">
                <tr>
                    <td style="text-align: center">Dokter,</td>
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
                    <td style="text-align: center">({{ $dokter->nama_dokter }})</td>
                    <td style="text-align: center">(............................................)</td>
                    <td style="text-align: center">(............................................)</td>
                </tr>
            </table>
        </div>
    </body>

</html>
