<h1 class="text-center">Form Tambah Karyawan</h1>
<div class="container">
    <div class="col-md-6">
        <div class="card-header">
        </div>
        <form action="<?= base_url('Home/tambah'); ?>" method="post">
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="nip" value="<?= set_value('nip'); ?>">
                <div class="form-text text-danger"><?= form_error('nip'); ?></div>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>">
                <div class="form-text text-danger"><?= form_error('nama'); ?></div>
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Gender</label>
                <select class="form-select" name="gender" aria-label="Default select example">
                    <option selected>Pilih Gender</option>
                    <option value="M">MALE</option>
                    <option value="F">FEMALE</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                <div class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></div>
            </div>

            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?= set_value('tanggal_masuk'); ?>">
                <div class="form-text text-danger"><?= form_error('tanggal_masuk'); ?></div>
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <select class="form-select" name="grade" aria-label="Default select example">
                    <option selected>Pilih Grade</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
        </form>
    </div>
</div>