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
                            <th>No</th>
                            <th>Kode barang</th>
                            <th>Nama barang</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no = 1;
                        foreach ($barang as $brb) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $brb['kode_barang'] ?></td>
                                <td><?= $brb['nama_barang'] ?></td>
                                <td><?= $brb['stok'] ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="<?= base_url('pembelian/detail_pembelian/') . $this->Kasir_model->no_pembelian() . '/' . $brb['kode_barang'] ?>">add barang</a>
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
                <h5>Pembelian Barang</h5>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Harga beli</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail_pembelian as $dpmb) { ?>
                            <form action="<?= base_url('pembelian/ubah_detail_pembelian') ?>" method="post">
                                <tr>
                                    <input type="hidden" name="id_detail_pembelian" value="<?= $dpmb['id_detail_pembelian'] ?>">
                                    <td><?= $dpmb['nama_barang'] ?></td>
                                    <td><input style="width: 70px;" name="jumlah" class="form-control" type="number" value="<?= $dpmb['jumlah'] ?>" /></td>
                                    <td><input style="width: 150px;" name="harga_beli" class="form-control" type="text" value="<?= $dpmb['harga_beli'] ?>" /></td>
                                    <td>
                                        <a href="<?= base_url('pembelian/hapus_detail_pembelian/') . $dpmb['id_detail_pembelian'] ?>" class="btn btn-danger btn-sm"><i class='bx bx-trash-alt'></i></a>
                                        <button class="btn btn-warning btn-sm mt-1" type="submit"><i class='bx bx-pencil'></i></button>
                                    </td>
                                </tr>
                            </form>
                            <?php
                            $totalHarga += $dpmb['harga_beli'];
                            ?>
                        <?php } ?>
                    </tbody>
                </table>
                <hr>
                <span>Total Harga = Rp <?= number_format($totalHarga, 0, ',', '.') ?></span>
                <form action="<?= base_url('pembelian/transaksi_pembelian') ?>" method="post">
                    <input name="kode_pembelian" type="hidden" value="<?= $this->Kasir_model->no_pembelian() ?>">
                    <input name="id_supplier" type="hidden" value="<?= $supplier->id_supplier ?>">
                    <input name="total" type="hidden" value="<?= $totalHarga ?>">

                    <div class="mb-3 mt-3" style="width: 250px;">
                        <select name="metode_pembayaran" class="form-select" aria-label="Default select example">
                            <option selected>Metode Pembayaran</option>
                            <option value="tunai">Tunai</option>
                            <option value="non Tunai">Non Tunai</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</div>