<?= $this->extend('templates/template-admin'); ?>

<?= $this->section('content'); ?>

<div class=" m-3 card">
    <div class="card-body">
        <h5 class="card-title">Tambah Event</h5>
        <form action="/admin/simpanTambahEvent" method="POST" class="">
            <div class="position-relative row form-group"><label for="nama_event" class="col-sm-2 col-form-label">Nama
                    Event</label>
                <div class="col-sm-10"><input required name="nama_event" id="nama_event"
                        placeholder="Masukkan nama event" type="text" class="form-control"></div>
            </div>
            <!-- end nama event -->
            <div class="position-relative row form-group"><label for="tanggal_event"
                    class="col-sm-2 col-form-label">Tanggal Event</label>
                <div class="col-sm-10"><input required name="tanggal_event" id="tanggal_event" type="date"
                        class="form-control">
                </div>
            </div>
            <!-- end tanggal informasi -->
            <div class="position-relative row form-group"><label for="informasi_event"
                    class="col-sm-2 col-form-label">Informasi event</label>
                <div class="col-sm-10"><textarea required name="informasi_event" id="informasi_event"
                        class="form-control"></textarea></div>
            </div>
            <!-- end Informasi -->
            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2 text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>