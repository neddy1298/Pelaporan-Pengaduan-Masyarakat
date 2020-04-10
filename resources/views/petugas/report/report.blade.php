<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Report Pengaduan</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{-- <img src="logo.jpg" width="25%"> --}}

                            </td>

                            <td>
                                Invoice #: 001<br>
                                Created: {{ now()->format('d F, Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                KamCode, Inc.<br>
                                43359 Cicurug<br>
                                Desa Benda
                            </td>

                            <td>
                                Napz Corp.<br>
                                {{ Auth::user()->nama_petugas }}<br>
                                {{ Auth::user()->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            @foreach ($datas as $data)
            <tr class="heading">
                <td>
                    Pengaduan
                </td>
                <td>{{ $data->id_pengaduan }}</td>
            </tr>

            <tr class="information">
                <td>
                    Nama Pelapor : {{ $data->nama }}
                </td>
                <td>
                    Tanggal : {{ $data->tgl_pengaduan->format('d F, Y') }}
                </td>
            </tr>
            <tr class="information">
                <td>
                    @if ($data->status == '0')
                    Status : Belum di Konfirmasi
                    @elseif ($data->status == 'proses')
                    Status : Proses Penanggapan
                    @elseif ($data->status == 'selesai')
                    Status : Selesai di Tanggapi
                    @endif
                </td>
                <td>
                    Tanggapan :
                    {{ $tanggapan->where('id_pengaduan', $data->id_tanggapan)->count() }} Tanggapan
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    {{ $data->judul }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="margin-bottom:30px;">{{ $data->isi_laporan }}</p>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
