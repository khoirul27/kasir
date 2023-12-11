<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCenter">Pembelian</button>
<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Pilih supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="table-responsive text-nowrap mx-3 mt-3">
                        <table class="table p-3" id="">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Cv</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                                foreach ($supplier as $spb) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $spb['nama'] ?></td>
                                        <td><?= $spb['cv'] ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url('pembelian/transaksi/') . $spb['id_supplier'] ?>">Pembelian</a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header">Daftar pembelian</h5>
    <div class="table-responsive text-nowrap m-3">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode pembelian</th>
                    <th>Nama supplier</th>
                    <th>Tanggal pembelian</th>
                    <th>Metode pembayaran</th>
                    <th>Barang</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php $no = 1;
                foreach ($pembelian as $db) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $db['kode_pembelian'] ?></td>
                        <td><?= $db['nama'] ?></td>
                        <td><?= $db['tanggal'] ?></td>
                        <td><?= $db['metode_pembayaran'] ?></td>
                        <td><button type="submit" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detailbarang<?= $db['kode_pembelian'] ?>">Detail</button>
                            <div class="modal fade" id="detailbarang<?= $db['kode_pembelian'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Detail barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-borderless mt-4 mb-3">
                                                <thead>
                                                    <tr>
                                                        <th>Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga beli</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($this->Kasir_model->detail_pembelian($db['kode_pembelian']) as $dtb) { ?>
                                                        <tr>
                                                            <td><?= $dtb['nama_barang'] ?></td>
                                                            <td><?= $dtb['jumlah'] ?></td>
                                                            <td>Rp <?= number_format( $dtb['harga_beli'], 0, ',', '.') ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <span class="mx-2"></span>Total Harga = Rp <?= number_format($db['total'], 0, ',', '.') ?></span>
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