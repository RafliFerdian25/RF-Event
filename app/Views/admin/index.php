<?= $this->extend('templates/template-admin'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Event</h1>
    <p class="mb-4">Daftar keseluruhan event</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Event</h6>
                <a href="/admin/tambahEvent" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Tambah Event">
                    <i class="fas fa-solid fa-calendar-plus"></i>
                </a>
            </div>
        </div>
        <div class="card-body" id="daftar_event">
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Informasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1  ?>
                        <?php foreach ($event as $daftar_event) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $daftar_event['nama_event']; ?></td>
                            <td><?= $daftar_event['tanggal_event']; ?></td>
                            <td><?= $daftar_event['informasi_event']; ?></td>
                            <td>
                                <a href="/admin/editEvent/<?= $daftar_event['id_event']; ?>" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Ubah Data Event">
                                    <i class="fas fa-solid fa-pen-to-square me-1"></i>
                                </a>
                                <a href="/admin/hapusEvent/<?= $daftar_event['id_event']; ?>" class="delete_event"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Event">
                                    <i class="fas fa-solid fa-trash "></i>
                                </a>
                                <a href="/admin/daftarPendaftarEvent/<?= $daftar_event['id_event']; ?>"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Daftar Pendaftar Event">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                            </td>
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