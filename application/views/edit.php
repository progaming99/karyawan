<h1 class="text-center">Form Tambah Karyawan</h1>
<div class="container">
    <div class="col-md-6">
        <div class="card-header">
        </div>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $karyawan->id; ?>">
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="nip" value="<?= $karyawan->nip; ?>">
                <div class="form-text text-danger"><?= form_error('nip'); ?></div>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= $karyawan->nama; ?>">
                <div class="form-text text-danger"><?= form_error('nama'); ?></div>
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Gender</label>
                <select class="form-select" name="gender" aria-label="Default select example">
                    <?php foreach ($gender as $gen) : ?>
                        <?php if ($gen == $karyawan->gender) : ?>
                            <option value="<?= $gen; ?>" selected><?= $gen; ?></option>
                        <?php else : ?>
                            <option value="<?= $gen ?>"><?= $gen; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?= $karyawan->tanggal_lahir ?>">
                <div class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></div>
            </div>

            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?= $karyawan->tanggal_masuk ?>">
                <div class="form-text text-danger"><?= form_error('tanggal_masuk'); ?></div>
            </div>

            <div class="mb-3">
                <label for="gaji" class="form-label">Grade</label>
                <select class="form-select" name="grade" aria-label="Default select example">
                    <?php foreach ($grade as $grd) : ?>
                        <?php if ($grd == $karyawan->grade) : ?>
                            <option value="<?= $grd; ?>" selected><?= $grd; ?></option>
                        <?php else : ?>
                            <option value="<?= $grd ?>"><?= $grd; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="edit">Edit Data</button>
        </form>
    </div>
</div>