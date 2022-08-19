<div class="container-fluid">
  <h4>
    Detail Pesanan
    <div class="btn btn-sm btn-success">
      No. Invoice: <?= $invoice->id ?> 
    </div>
  </h4>

  <table class="table table-bordered table-hover table-striped">
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Jumlah Pesanan</th>
        <th>Harga Satuan</th>
        <th>Sub-total</th>
      </tr>

      <?php 
        $total = 0;
        $i=0;
        foreach ($pembelian as $p) : 
          $subtotal = $p['jumlah'] * $p['harga'];
          $total += $subtotal;
      ?>
        <tr>
          <td><?= $p['id_produk'] ?></td>
          <td><?= $p['nama'] ?></td>
          <td><?= $p['jumlah'] ?></td>
          <td><?= number_format($p['harga'], 0, ',', '.') ?></td>
          <td><?= number_format($subtotal, 0, ',', '.') ?></td>
        </tr>
      <?php $i++; endforeach; ?>

      <?php 
        $sum = 0;
        if($invoice->pembayaran == 'Dana' || $invoice->pembayaran == 'Gopay' || $invoice->pembayaran == 'OVO'){
          $sum = 2000;
        }
      ?>
      <tr>
        <td colspan="4" align="right">Total Pembelian</td>
        <td align="right">Rp. <?= number_format($total, 0, ',', '.') . " + " . $sum ?></td>
      </tr>
  </table>

  <a class="text-decoration-none" href="<?= base_url('admin'); ?>">
    <button type="button" class="btn btn-outline-success">
      <p class="m-0">Kembali</p>
    </button>
  </a>
</div>


</div>