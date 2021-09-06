<!DOCTYPE html>
<html>

<head>
    <title>Faktur Penjualan</title>

</head>

<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
    <div style="text-align:justify; margin-top: 20px">
        <img src="<?php echo base_url(); ?>assets/dist/foto/logo.png" style=" width: 78px; height: 80px; float:left; margin:0 8px 4px 0;" />
        <p style="text-align: center; line-height: 20px">

            <span style="font-size: 20px;"><strong>CV. DERWATI PONTIANAK</strong></span><br />
            <span style="font-size: 15px">BUKTI PENJUALAN BARANG</span><br />
            <span style="font-size: 12px">Jln. Dr. Wahidin Gg.Sepakat 8 No. 534 Telp. (271) 891068 Kodepos: 57272</span><br />
            <span style="font-size: 12px">Email : berkahabadi958@gmail.com</span>
            <hr>
        </p>
    </div>
    <center>
        <table style='width:800px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>FAKTUR PENJUALAN</b></span></br>
                Nama Customer : <?= $cetak['nama']; ?> </br>
                Keterangan : <?= $cetak['uraian']; ?>
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:12pt'></span></b></br>
                Tanggal : <?= $cetak['tanggal']; ?> </br>
                No Faktur. : <?= $cetak['nofaktur_pen']; ?></br>
            </td>
        </table>
        <table cellspacing='0' style='width:800px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
            </br>
            <tr align='center'>
                <td width='2%'>No</td>
                <td width='20%'>Judul</td>
                <td width='13%'>Harga</td>
                <td width='4%'>Jumlah</td>
                <td width='13%'>Total Harga</td>
            </tr>
            <?php
            $no = 1;
            foreach ($detail as $ctk) : ?>
                <tr>
                    <td align="center"> <?= $no++; ?></td>
                    <td> <?= $ctk['nama_pro']; ?></td>
                    <td align="right">Rp. <?= number_format($ctk['harga'], 0, ',', '.');?>,-</td>
                    <td align="center"> <?= $ctk['jumlah']; ?></td>
                    <td align="right">Rp. <?= number_format($ctk['subtotal'], 0, ',', '.'); ?>,-</td>

                <?php endforeach; ?>

                <tr>
                    <td colspan='4'>
                        <div style='text-align:right'><b>Total Yang Harus Di Bayar Adalah : </b></div>
                    </td>
                    <td style='text-align:right'><b>Rp. <?= number_format($cetak['total_bayar'], 0, ',', '.'); ?>.-</b></td>
                </tr>
        </table>

        <table style='width:800px; font-size:7pt;' cellspacing='2'>
            <br>
            <br>
            <br>
            <tr>
                <td align='center'>Penerima,</br></br></br></br></br></br><u>(.................)</u></td>
                <td style='border:0px solid black; padding:5px; text-align:left; width:40%'></td>
                <td align='center'>Direktur</br></br></br></br></br></br><u>(.................) </u></td>
            </tr>
        </table>
    </center>
</body>

</html>