<div class="container-xxl flex-grow-1 container-p-y">
    <a href="<?= base_url('penjualan/transaksi') ?>" class="btn btn-primary mb-3">Penjualan</a>

    <div class="card ">
        <h5 class="card-header">Daftar penjualan</h5>
        <div class="table-responsive text-nowrap m-3">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode penjualan</th>
                        <th>Nama pelanggan</th>
                        <th>Tanggal penjualan</th>
                        <th>Barang</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no = 1;
                    foreach ($penjualan as $dj) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $dj['kode_penjualan'] ?></td>
                            <td><?= $dj['nama_pelanggan'] ?></td>
                            <td><?= $dj['tanggal'] ?></td>
                            <td><button type="submit" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detailbarang<?= $dj['kode_penjualan'] ?>">Detail</button>
                                <div class="modal fade" id="detailbarang<?= $dj['kode_penjualan'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-borderless mt-4 mb-3">
                                                    <thead>
                                                        <tr>
                                                            <th>Barang</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga satuan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($this->Kasir_model->detail_penjualan($dj['kode_penjualan']) as $dtj) { ?>
                                                            <tr>
                                                                <td><?= $dtj['kode_barang'] ?></td>
                                                                <td><?= $dtj['jumlah'] ?></td>
                                                                <td>Rp <?= number_format( $dtj['harga_jual'], 0, ',', '.') ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <span class="mx-2"></span>Total Harga = Rp <?= number_format($pj['total'], 0, ',', '.') ?></span>
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
