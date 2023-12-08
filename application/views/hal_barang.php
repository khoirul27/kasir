<div class="container-xxl flex-grow-1 container-p-y">
    <div id='myAlert'>
        <?= $this->session->flashdata('alert', true) ?>
    </div>
    <div class="card">
        <h5 class="card-header">Tabel Barang</h5>
        <button class="btn btn-primary mx-3" style="width: 170px;" type="button" data-bs-toggle="modal" data-bs-target="#tambahbarang">tambah Barang</button>
        <div class="table-responsive text-nowrap m-3">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode barang</th>
                        <th>Nama barang</th>
                        <th>Stok</th>
                        <th>Expired</th>
                        <th>Harga jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no = 1;
                    foreach ($barang as $br) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $br['kode_barang'] ?></td>
                            <td><?= $br['nama_barang'] ?></td>
                            <td><?= $br['stok'] ?></td>
                            <td><?= $br['expired'] ?></td>
                            <td>Rp <?= number_format( $br['harga_jual'], 0, ',', '.') ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="<?= base_url('barang/hapus/') . $br['id_barang'] ?>">hapus</a>
                                <a href=""><button class="btn btn-warning btn-sm">edit</button></a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="col-lg-4 col-md-6">
                <div class="modal fade" id="tambahbarang" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Tambah Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('barang/simpan') ?>" method="post">
                                <div class="modal-body">
                                    <div class="row g-2">
                                        <div class="col-6 mb-0">
                                            <label for="emailWithTitle" class="form-label">Kode barang</label>
                                            <input name="kode_barang" type="text" id="emailWithTitle" class="form-control" placeholder="nama supplier" />
                                        </div>
                                        <div class="col-6 mb-0">
                                            <label for="dobWithTitle" class="form-label">Nama barang</label>
                                            <input name="nama_barang" type="text" id="dobWithTitle" class="form-control" placeholder="nama barang" />
                                        </div>
                                        <div class="col-6 mb-0">
                                            <label for="dobWithTitle" class="form-label">Stok</label>
                                            <input name="stok" type="number" id="dobWithTitle" class="form-control" placeholder="Stok" />
                                        </div>
                                        <div class="col-6 mb-0">
                                            <label for="dobWithTitle" class="form-label">Expired</label>
                                            <input name="expired" type="date" id="dobWithTitle" class="form-control" placeholder="" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="dobWithTitle" class="form-label">Harga barang</label>
                                            <input name="harga_jual" type="text" id="dobWithTitle" class="form-control" placeholder="harga" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>