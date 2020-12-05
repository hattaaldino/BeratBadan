<?php if(isset($_SESSION['flash'])): ?>

  <div class="alert alert-<?= $_SESSION['flash']['tipe'] ?> alert-dismissible fade show mt-5" role="alert">
    <strong><?= $_SESSION['flash']['pesan'] ?></strong> <?= $_SESSION['flash']['aksi'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
