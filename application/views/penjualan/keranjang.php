<div class="container-fluid">
  <table class="table table-bordered table-striped table-hover">
    <tr align="center">
      <th>NO</th>
      <th>Nama Produk</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Sub-Total</th>
    </tr>

    <?php 
      $no = 1;

      foreach ($this->cart->contents() as $item) :?>

      <tr>
        <td align="center"><?= $no++ ?></td>
        <td><?= $item['name'] ?></td>
        <td><?= $item['qty'] ?></td>
        <td align="right">Rp. <?= number_format($item['price'], 0, ',', '.') ?></td>
        <td align="right">Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
      </tr>

    <?php endforeach; ?>

      <tr>
        <td colspan="4"></td>
        <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
      </tr>
  </table>

  <div> 
    <button type="button" class="btn btn-circle btn-outline-danger" data-toggle="modal" data-target="#my-modal">
      <i class="fas fa-trash-alt"></i>
    </button>
    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 ">
                            <p class="font-weight-bold mb-2"> Yakin ingin menghapus semua item di keranjang ?</p>
                        </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                            <div class="row justify-content-end no-gutters">
                                <div class="col-auto mr-4"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Batal</button></div>
                                <div class="col-auto">
                                  <a href="<?= base_url('penjualan/deleteCart/'); ?>">
                                    <button type="button" class="btn btn-danger px-4">Hapus</button>
                                  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="d-flex justify-content-end mt-5">
    <div class="mr-4">
      <a class="text-decoration-none" href="<?= base_url('penjualan/'); ?>">
        <button type="button" class="btn btn-outline-info d-flex justify-content-between align-items-center">
          <p class="m-0">Kembali</p>
        </button>
      </a>
    </div>
    <div>
      <a class="text-decoration-none" href="<?= base_url('penjualan/pembayaranProduk'); ?>">
        <button type="button" class="btn btn-success d-flex justify-content-between align-items-center">
          <p class="m-0 mr-4">Checkout</p>
          <i class="fas fa-money-bill-wave"></i>
        </button>
      </a>
    </div>
  </div>
</div>

</div>