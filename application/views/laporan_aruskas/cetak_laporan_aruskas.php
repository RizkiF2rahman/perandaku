<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekapitulasi Dana Keuangan</title>
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
        <?php
        error_reporting(0);
        $sisa_saldo = $grand_total_masuk - $grand_total_keluar;

        $saldoawal = $saldoawal_masuk - $saldoawal_keluar;

        $saldo_akhir = $sisa_saldo + $saldoawal;
        ?>
        <table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='100%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>Tanggal : <?= date('d F Y', strtotime($tgl_awal)); ?> s.d <?= date('d F Y', strtotime($tgl_akhir)); ?></b></span></br>
            </td>
        </table>
<hr>
        <table cellspacing='0' style='width:100%; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
            </br>
            <tr>
                <th align="left" class="text-primary" colspan="2">Saldo Awal</th>
                <th width="10%" align="left" class="text-primary">Rp. <?= number_format($saldoawal, 2, ',', '.'); ?>,-</th>
            </tr>
        </table>
<hr>
        <table cellspacing='0' style='width:100%; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
            </br>
            <tr align='left'>
                <th colspan="2">Pemasukan Dana Keuangan</th>
            </tr>
            <?php foreach ($laporan_pemasukan as $data) { ?>
                <tr>
                    <td width="20%"><?php echo date('d/m/Y', strtotime($data['tanggal'])); ?></td>
                    <td><?php echo $data['nama']; ?> - <?php echo $data['uraian']; ?></td>
                    <td width="25%">Rp. <?php echo number_format($data['total_bayar'], 2, ',', '.'); ?>,-</td>
                </tr>
            <?php } ?>
            <tr>
                <th align="right" class="text-primary" colspan="2"><hr></th>
                <th align="right" class="text-primary" colspan="2">
                    <hr>
                </th>
            </tr>
            <tr>
                <th align="left" class="text-primary" colspan="2">Total Pemasukan</th>
                <th align="left" class="text-primary">Rp. <?= number_format($grand_total_masuk, 2, ',', '.'); ?>,-</th>
            </tr>
        </table>
<hr>
        <table cellspacing='0' style='width:100%; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
            </br>
            <tr align='left'>
                <th colspan="2">Pengeluaran Dana Keuangan</th>
            </tr>
            <?php foreach ($laporan_pengeluaran as $data) { ?>
                <tr>
                    <td width="10%"><?php echo date('d/m/Y', strtotime($data['tanggal'])); ?></td>
                    <td><?php echo $data['uraian']; ?></td>
                    <td width="15%">Rp. <?php echo number_format($data['total_bayar'], 2, ',', '.'); ?>,-</td>
                </tr>
            <?php } ?>
            <th align="right" class="text-primary" colspan="2"><hr></th>
            <th align="right" class="text-primary" colspan="2">
                <hr>
            </th>
            <tr>
                <th align="left" class="text-primary" colspan="2">Total Pengeluaran</th>
                <th align="left" class="text-primary">Rp. <?= number_format($grand_total_keluar, 2, ',', '.'); ?>,-</th>
            </tr>
        </table>



        <table cellspacing='0' style='width:100%; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
            </br>
            <tr>
                <th align="left" class="text-primary" colspan="2">Saldo Akhir</th>
                <th width="20%" align="left" class="text-primary">Rp. <?= number_format($sisa_akhir, 2, ',', '.'); ?>,-</th>
            </tr>
            <tr>
                <th align="left" class="text-primary" colspan="2">Total Laba / Rugi</th>
                <th width="20%" align="left" class="text-primary">Rp. <?= number_format($sisa_saldo, 2, ',', '.'); ?>,-</th>
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
                <td align='center'>Pontianak, <?= date('d F Y'); ?></br>Direktur,<br><br><br><br><br><br><u>(..................)</u></td>
            </tr>
        </table>
    </center>
</body>

</html>