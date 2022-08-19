<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <?php unset($_SESSION['message']); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKategoriModal">Tambahkan Kategori</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kategori as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $k['jenis']; ?></td>
                            <td><?= $k['kategori']; ?></td>
                            <td>
                                <a href="" class=" badge badge-success" data-toggle="modal" data-target="#updateKategoriModal<?= $k['id']; ?> ">Edit</a>
                                <a href="<?= base_url('produk/deleteKategori/'); ?><?= $k['id']; ?>" class=" badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<div class="modal fade" id="newKategoriModal" tabindex="-1" role="dialog" aria-labelledby="newKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKategoriModalLabel">Tambahkan Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/kategori'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select required name="jenis" id="jenis" class="form-control">
                            <option value="">Pilih Jenis Produk</option>
                            <?php foreach ($jenis as $j) : ?>
                                <option value="<?= $j['jenis']; ?>"><?= $j['jenis']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update -->
<?php foreach ($kategori as $k) : ?>

    <div class="modal fade" id="updateKategoriModal<?= $k['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="updateKategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateKategoriModalLabel">Form Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('produk/updateKategori/'); ?><?= $k['id'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $k['id'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <select required name="jenis" id="jenis" class="form-control">
                                <option value="">Pilih Jenis Produk</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option value="<?= $j['jenis']; ?>"><?= $j['jenis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input required type="text" value=<?= $k['kategori'] ?> class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>