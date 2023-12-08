<?php
$totalHarga = 0;
?>
<div class="container-xxl flex-grow-1 container-p-y row">
    <div id='myAlert'>
        <?= $this->session->flashdata('alert', true) ?>
    </div>
    <div class=" col-6">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Daftar Barang</h5>
            <div class="table-responsive text-nowrap m-3">
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>Kode barang</th>
                            <th>Nama barang</th>
                            <th>Harga satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no = 1;
                        foreach ($barang as $brj) { ?>
                                <tr>
                                    <td><?= $brj['kode_barang'] ?></td>
                                    <td><?= $brj['nama_barang'] ?></td>
                                    <td>Rp <?= number_format( $brj['harga_jual'], 0, ',', '.') ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('penjualan/detail_penjualan/').$this->Kasir_model->no_penjualan() . '/' .$brj['kode_barang'] ?>">add barang</a>
                                    </td>
                                </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-6">
        <div class="card mb-4">
            <div class="card-body">
                <h5>Penjualan Barang</h5>
                <table class="table table-borderless mt-4">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Harga satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail_penjualan as $dpnb) { ?>
                            <form action="<?= base_url('penjualan/ubah_detail_penjualan') ?>" method="post">
                                <tr>
                                    <input type="hidden" name="id_detail_penjualan" value="<?= $dpnb['id_detail_penjualan'] ?>">
                                    <td><?= $dpnb['nama_barang'] ?></td>
                                    <td><input style="width: 70px;" name="jumlah" class="form-control" type="number" value="<?= $dpnb['jumlah'] ?>" /></td>
                                    <td><input style="width: 150px;" name="harga_beli" class="form-control" type="text" value="<?= number_format( $dpnb['harga_jual'], 0, ',', '.') ?>" disabled /></td>
                                    <td>
                                        <a href="<?= base_url('penjualan/hapus_detail_penjualan/') . $dpnb['id_detail_penjualan'] ?>" class="btn btn-danger btn-sm"><i class='bx bx-trash-alt'></i></a>
                                        <button class="btn btn-warning btn-sm mt-1" type="submit"><i class='bx bx-pencil'></i></button>
                                    </td>
                                </tr>
                            </form>
                            <?php
                            $totalHarga += $dpnb['jumlah'] * $dpnb['harga_jual'];
                            ?>
                        <?php } ?>
                    </tbody>
                </table>
                <hr>
                <span>Total Harga = Rp <?= number_format($totalHarga, 0, ',', '.') ?></span>
                <form action="<?= base_url('penjualan/transaksi_penjualan') ?>" method="post">
                    <input name="kode_penjualan" type="hidden" value="<?= $this->Kasir_model->no_penjualan() ?>">
                    <input name="total" type="hidden" value="<?= $totalHarga ?>">
                    <input required name="nama_pelanggan" type="text" class="form-control mb-3 mt-4" placeholder="Nama pelanggan" style="width: 300px;">
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</div>

