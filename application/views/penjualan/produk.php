<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="navbar">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="<?= base_url('penjualan/detailCart/'); ?>" class="mr-2 text-decoration-none">
                    <button type="button" class="btn btn-circle btn-outline-info">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </a>
                <?php $shopcart = $this->cart->total_items(). ' items' ?>
                <?= $shopcart ?>
            </li>
        </ul>
    </div>

    <div class="list-group" id="list-tab" role="tablist">
        <?php foreach ($produk as $p) : ?>
            <div class="list-item list-group-item list-group-item-action" role="tab" aria-controls="{$p['kategori']}">
                <div class="row">
                    <div class="col-md-3">
                        <img style="margin:0px 20px; height:150px; width:150px; object-fit: cover;" src="<?= base_url('assets/img/produk/') . $p['image']; ?>" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-3">
                        <p><?= $p['produk']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <p>Rp. <?= number_format($p['harga'], 0, ',', '.') ?></p>
                    </div>
                    <div class="col-md-3">
                        <?= anchor('penjualan/insertToCart/' . $p['id'], '<div class="btn btn-sm btn-info">Tambah</div>'); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="<?= base_url('penjualan/showKategori/') . $p['jenis'];; ?>" class="btn-circle btn-primary active text-decoration-none" role="button" data-bs-toggle="button" aria-pressed="true" style="margin: 25px 5px; width: 3rem; height: 3rem;">
        <i class="fas fa-arrow-circle-left fa-2x"></i>
    </a>
</div>



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>