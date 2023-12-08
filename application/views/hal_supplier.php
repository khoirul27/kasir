<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
    <div class="card" style="width: 80%;">
        <h5 class="card-header">Tabel Supplier</h5>
        <button class="btn btn-primary mx-3" style="width: 170px;" type="button" data-bs-toggle="modal" data-bs-target="#tambahsupplier">tambah supplier</button>
        <div class="table-responsive text-nowrap m-3">
            <table class="table" id="example">
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
                    foreach ($supplier as $sp) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $sp['nama'] ?></td>
                            <td><?= $sp['cv'] ?></td>
                            <td>
                                <a href="<?= base_url('supplier/hapus/') . $sp['id_supplier'] ?>" class="btn btn-danger btn-sm">hapus</a>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubahsupplier<?= $sp['id_supplier'] ?>">edit</button>
                                <!-- Modal ubah -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="modal fade" id="ubahsupplier<?= $sp['id_supplier'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Ubah supplier</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('supplier/edit') ?>" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_supplier" value="<?= $sp['id_supplier'] ?>">
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="emailWithTitle" class="form-label">Nama</label>
                                                                <input name="nama" value="<?= $sp['nama'] ?>" type="text" id="emailWithTitle" class="form-control" placeholder="nama supplier" />
                                                            </div>
                                                            <div class="col mb-0">
                                                                <label for="dobWithTitle" class="form-label">Cv</label>
                                                                <input name="cv" value="<?= $sp['cv'] ?>" type="text" id="dobWithTitle" class="form-control" placeholder="Cv" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>

            <!-- Modal tambah -->
            <div class="col-lg-4 col-md-6">
                <div class="modal fade" id="tambahsupplier" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Tambah supplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('supplier/simpan') ?>" method="post">
                                <div class="modal-body">
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="emailWithTitle" class="form-label">Nama</label>
                                            <input name="nama" type="text" id="emailWithTitle" class="form-control" placeholder="nama supplier" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="dobWithTitle" class="form-label">Cv</label>
                                            <input name="cv" type="text" id="dobWithTitle" class="form-control" placeholder="Cv" />
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