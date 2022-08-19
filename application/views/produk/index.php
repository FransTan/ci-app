<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <?php unset($_SESSION['message']); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProdukModal">Add New Product</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $pd) : ?>
                        <tr>
                            <th scope="row"><?= ++$start; ?></th>
                            <td>
                                <div>
                                    <img src="<?= base_url('assets/img/produk/') . $pd['image']; ?>" class="img-fluid rounded-start" style="width: 80px; margin: 0px -20px 0px 0px ; height : 75px;">
                                </div>
                            </td>
                            <td><?= $pd['jenis']; ?></td>
                            <td><?= $pd['kategori']; ?></td>
                            <td><?= $pd['produk']; ?></td>
                            <td><?= $pd['harga']; ?></td>
                            <td>
                                <a href="<?= base_url('Produk/edit/'); ?><?= $pd['id']; ?>" class=" badge badge-success" data-toggle="modal" data-target="#updateProdukModal<?= $pd['id']; ?> ">Edit</a>
                                <a href="<?= base_url('Produk/delete/'); ?><?= $pd['id']; ?>" class=" badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><?php echo $links; ?></p>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->

<div class="modal fade" id="newProdukModal" tabindex="-1" role="dialog" aria-labelledby="newProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProdukModalLabel">Add New Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Produk'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <div class="custom-file">
                        <input required type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Masukkan File Gambar</label>
                    </div>
                </div>
                <div class="form-group">
                    <select required name="jenis" id="jenis" class="form-control">
                        <option value="">Pilih Jenis Produk</option>
                        <?php foreach ($jenis as $j) : ?>
                            <option value="<?= $j['jenis']; ?>"><?= $j['jenis']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select required name="kategori" id="kategori" class="form-control">
                        <option value="">Pilih Kategori Produk</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['kategori']; ?>"><?= $k['kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="produk" name="produk" placeholder="Tambahkan Nama Produk">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Tambahkan Harga Produk" min="0">
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

<?php foreach ($produk as $pd) : ?>
    <div class="modal fade" id="updateProdukModal<?= $pd['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newProdukModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?=
                form_open_multipart("Produk/edit/{$pd['id']}");
                ?>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $pd['id'] ?>">
                    <div class="form-group">
                        <div class="custom-file">
                            <input required type="file" class="custom-file-input" id="image" name="image" required>
                            <label class="custom-file-label" for="image">Masukkan File Gambar</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <select required name="jenis" id="jenis" class="form-control">
                            <option value="">Pilih Jenis Produk</option>
                            <?php foreach ($jenis as $j) : ?>
                                <option value="<?= $j['jenis']; ?>"><?= $j['jenis']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select required name="kategori" id="kategori" class="form-control">
                            <option value="">Pilih Kategori Produk</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['kategori']; ?>"><?= $k['kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="produk" name="produk" value="<?= $pd['produk'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $pd['harga'] ?>" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>