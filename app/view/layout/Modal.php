<!-- Modal Log out -->
<div class="modal bs-example-modal-sm" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Logout</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
      <div class="modal-footer"><a href="<?= App::base_url('logout') ?>" class="btn btn-primary btn-block">Logout</a></div>
    </div>
  </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataBBModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Catatan Berat Badan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Tanggal</label>
          <input type="date" id="dateInput" class="form-control validate">
        </div>
        <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Max</label>
          <input type="number" id="maxInput" class="form-control validate">
        </div>

        <div class="md-form mb-4">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Min</label>
          <input type="number" id="minInput" class="form-control validate">
        </div>

      </div>
      <div class="modal-footer">
         <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
         <button id="tambahbtn" class="btn btn-sm btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Show Info BB -->
<div class="modal fade" id="showInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Info Berat Badan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
          <h5>Tanggal</h5>
          <p class="infoTanggal"></p>
        </div>
        
        <div class="md-form mb-3">
          <h5>Max</h5>
          <p class="infoMax"></p>
        </div>

        <div class="md-form mb-3">
          <h5>Min</h5>
          <p class="infoMin"></p>
        </div>
      </div>
    </div>
  </div>
</div>

