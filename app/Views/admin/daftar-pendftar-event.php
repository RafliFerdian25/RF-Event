<?= $this->extend('templates/template-admin'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Pendaftar Event <?= ucfirst($event['nama_event']); ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pendaftar</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if (session()->getFlashdata('pesan-event')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan-event'); ?>
                </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('pesan-gagal-event')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('pesan-gagal-event'); ?>
                </div>
                <?php endif; ?>
                <table class="table table-bordered daftar_event" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1  ?>
                        <?php foreach ($pendaftar as $event_pendaftar) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $event_pendaftar['nama_pendaftar']; ?></td>
                            <td><?= $event_pendaftar['email_pendaftar']; ?></td>
                            <td><?= $event_pendaftar['tanggal_lahir_pendaftar']; ?></td>
                            <td><?= $event_pendaftar['alamat_pendaftar']; ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>