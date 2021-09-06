<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemasukan</title>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
    <div style="text-align:justify; margin-top: 20px">
        <img src="<?php echo base_url(); ?>assets/dist/foto/logo.png" style="width: 78px; height: 80px; float:left; margin:0 8px 4px 0;" />
        <p style="text-align: center; line-height: 17px">
            <span style="font-size: 28px; color: red;"><strong>CV. DERWATI PONTIANAK</strong></span><br />
            <span style="font-size: 17px; color: navy;"><strong>SUPPLIER TOKO BUKU</strong></span><br />
            <span style="font-size: 17px; color: navy;"><strong>DAN ALAT PERAGA</strong></span><br />
            <span style="font-size: 9px"><strong>JL. PERDANA, RUKO BALI AGUNG 3, NO. 11</strong></span> <br>
            <span style="font-size: 9px"><strong>(0561) 583062, PONTIANAK 78124, KALIMANTAN BARAT</strong></span>
            <hr>
        </p>
    </div>

    <center>

        <table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='100%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>Periode <?= date('d/m/Y', strtotime($tgl_awal)); ?> s.d <?= date('d/m/Y', strtotime($tgl_akhir)); ?></b></span></br>
            </td>
        </table>
        <table cellspacing='0' style='width:100%; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='1'>
            </br>
            <tr align='center'>
                <th>No</th>
                <th>Tanggal</th>
                <th>No Faktur</th>
                <th>Nama Customer</th>
                <th>Judul</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            <?php
            $no = 1;
            foreach ($lap_pemasukan as $lp) :
            ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $lp['tanggal']; ?></td>
                    <td><?= $lp['nofaktur_pen']; ?></td>
                    <td><?= $lp['nama']; ?></td>
                    <td><?= $lp['nama_pro']; ?></td>
                    <td align="right">Rp. <?= number_format($lp['harga'], 0, ',', '.'); ?>,-</td>
                    <td align="center"><?= $lp['jumlah']; ?></td>
                    <td align="right">Rp. <?= number_format($lp['subtotal'], 0, ',', '.'); ?>,-</td>
                <?php endforeach; ?>

                <tr>
                    <td colspan='7'>
                        <div style='text-align:right; font-size:14pt'><b>Total Pemasukan</b></div>
                    </td>
                    <td style='text-align:right; font-size:14pt'><b>Rp. <?= number_format($total_bayar, 0, ',', '.'); ?>,-</b></td>
                </tr>
        </table>

        <table style='width:100%; font-size:7pt;' cellspacing='2'>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <tr>
                <td style='border:0px solid black; padding:5px; text-align:left; width:80%'></td>
                <td align='center'>Pontianak, <?= date('d F Y'); ?></br>Direktur,</br></br></br></br></br></br><u>..................</u></td>
            </tr>
        </table>
    </center>
</body>

</html>