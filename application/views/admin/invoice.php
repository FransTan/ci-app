<div class="container-fluid">
  <table class="table table-bordered table-hover table-striped">
      <tr>
        <th>Id Invoice</th>
        <th>Penanggungjawab</th>
        <th>Metode pembayaran</th>
        <th>Tanggal pembelian</th>
        <th>Aksi</th>
      </tr>

      <?php foreach ($invoice as $inv) : ?>
          <tr>
              <td><?= $inv['id'] ?></td>
              <td><?= $inv['user'] ?></td>
              <td><?= $inv['pembayaran'] ?></td>
              <td><?= $inv['tgl_bayar'] ?></td>
              <td>
                <a href="<?= base_url('invoice/detailInvoice/'); ?><?= $inv['id']; ?>" class="badge badge-success">Detail</a>
              </td>
          </tr>
      <?php endforeach; ?>
  </table>
  <p><?php echo $links; ?></p>
</div>


</div>