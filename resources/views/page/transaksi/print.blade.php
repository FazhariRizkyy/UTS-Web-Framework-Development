<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - BisaEksplor</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-family: 'Tahoma', sans-serif;
        }

        .page {
            width: 297mm;
            min-height: 210mm;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #D3D3D3;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #204b8c;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #204b8c;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 0;
            }

            body {
                margin: 0;
            }

            .page {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>

<body>

    <div class="page" id="result">
        <div class="header">
            <h1>BisaEksplor</h1>
            <p>LAPORAN TRANSAKSI</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>ID TRANSAKSI</th>
                    <th>ID PELANGGAN</th>
                    <th>TANGGAL BAYAR</th>
                    <th>BIAYA TAMBAHAN</th>
                    <th>DISKON</th>
                    <th>PAJAK</th>
                    <th>TOTAL BAYAR</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $d)
                    <tr>
                        {{-- <td>{{ $no++ }}</td>
                        <td>{{ $d->kode_invoice }}</td>
                        <td>{{ $d->Member->nama }}</td>
                        <td>{{ $d->tgl_bayar }}</td>
                        <td>{{ $d->biaya_tambahan }}</td>
                        <td>{{ $d->diskon }}</td>
                        <td>{{ $d->pajak }}</td>
                        <td>{{ $d->total_bayar }}</td>
                        <td>{{ $d->status }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Divisi Finance BisaEksplor!</p>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>