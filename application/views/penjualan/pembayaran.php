<div class="container-fluid">
  <div class="card">
    <h5 class="card-header"><b>Total Pembayaran</b></h5>
    <div class="card-body">
      <h6 class="card-title">Pilih Metode Pembayaran</h6>
      <form action="<?= base_url('invoice/insertDataPembelian'); ?>" method="post">
        <div style="width: 60%;" class="btn-group-toggle d-flex flex-column" name="metode" data-toggle="buttons">
          <label style="align-items: center; cursor: pointer;" class="btn btn-outline-info my-2 d-flex justify-content-between">
            <img class="my-1 img-thumbnail image__payment" src="<?php echo base_url('assets/img/icon/GoPay.png'); ?>" />
            <input type="radio" value="Gopay" name="metode" id="gopay" autocomplete="off" checked> Gopay
            <p class="m-0">Rp. <?= number_format($this->cart->total() + 2000, 0, ',', '.') ?></p>
          </label>
          <label style="align-items: center; cursor: pointer;" class="btn btn-outline-info my-2 d-flex justify-content-between">
            <img class="my-1 img-thumbnail image__payment" src="<?php echo base_url('assets/img/icon/OVO.png'); ?>" />
            <input value="OVO" type="radio" name="metode" id="ovo" autocomplete="off"> OVO
            <p class="m-0">Rp. <?= number_format($this->cart->total() + 2000, 0, ',', '.') ?></p>
          </label>
          <label style="align-items: center; cursor: pointer;" class="btn btn-outline-info my-2 d-flex justify-content-between">
            <img class="my-1 img-thumbnail image__payment" src="<?php echo base_url('assets/img/icon/Logo_dana.png'); ?>" />
            <input type="radio" value="Dana" name="metode" id="dana" autocomplete="off"> Dana
            <p class="m-0">Rp. <?= number_format($this->cart->total() + 2000, 0, ',', '.') ?></p>
          </label>
          <label style="align-items: center; cursor: pointer;" class="btn btn-outline-info my-2 d-flex justify-content-between">
            <img class="my-1 img-thumbnail image__payment" src="<?php echo base_url('assets/img/icon/debit.png'); ?>" />
            <input value="Debit" type="radio" name="metode" id="dana" autocomplete="off"> Debit
            <p class="m-0">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></p>
          </label>
          <label style="align-items: center; cursor: pointer;" class="btn btn-outline-info my-2 d-flex justify-content-between">
            <img class="my-1 img-thumbnail image__payment" src="<?php echo base_url('assets/img/icon/cash.png'); ?>" />
            <input value="Cash" type="radio" name="metode" id="dana" autocomplete="off"> Cash
            <p class="m-0">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></p>
          </label>
        </div>
        <button style="width: 20%; float: right; margin-right: 40%;" type="submit" class="btn btn-success mt-4" >Bayar</button>
      </form>
    </div>
  </div>
</div>