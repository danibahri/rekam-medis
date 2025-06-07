<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/favicon.png') }}">
        <meta name="application-name" content="Rekam-Medis">
        <meta name="apple-mobile-web-app-title" content="Rekam-Medis">
        <title>Surat Sakit Pasien</title>
        <style>
            .header {
                text-align: center;
                margin-top: 40px;
                margin-bottom: 20px;
            }

            .nama-dokter {
                font-size: 32px;
                font-weight: bold;
                margin-top: 20px;
            }

            .label {
                font-weight: bold;
                text-decoration: underline;
            }

            .content {
                margin-top: 20px;
            }

            .title {
                font-size: 24px;
                font-weight: bold;
                margin-top: 20px;
                text-align: center;
                text-decoration: underline;
                text-transform: uppercase;
            }

            tr td {
                padding: 10px 30px 10px 0;
            }
        </style>
    </head>

    <body>

        <div class="header">
            <h1 class="nama-dokter">{{ $dokter->nama_dokter }}</h1>
            <p><span>Dokter Umum</span><br><span>SIP. {{ $dokter->sip }}</span></p>
        </div>

        <div class="address">
            <p><span class="label">Praktek / Rumah</span><br><span>Perum Bangkalan Indah </span><br><span>Perum
                    Bangkalan Indah</span><br><span>Blok D No. 1</span>
                <br><span>Bangkalan</span>
            </p>
        </div>

        <div class="content">
            <h1 class="title">Surat Keterangan Sakit</h1>
            <p style="margin: 30px 0 30px 0">Yang bertanda tangan di bawah ini menerangkan bahwa :</p>
            <table border="0">
                <tr>
                    <td>Nama</td>
                    <td>: {{ $pasien->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    {{-- umur pasien diambil dari tanggal lahir --}}
                    <td>: {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->age }} Tahun</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $pasien->jenisKelamin->nama }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $pasien->Pekerjaan->nama }}</td>
                </tr>
            </table>
            <p style="margin: 30px 0 30px 0">Berhubungan dengan sakit yang diderita perlu beristirahat selama
                ........................ Hari,
                <br><br>Mulai
                tanggal ........................ s/d ........................ 20 ..............
            </p>
        </div>

        <div class="ttd">
            <p>Kepada yang berkepentingan harap maklum</p>
            <table style="float: right; margin-top: 50px; margin-right: 50px;">
                <tr>
                    <td style="text-align: center">yang memeriksa</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center">({{ $dokter->nama_dokter }})</td>
                </tr>
            </table>
        </div>
    </body>

</html>
