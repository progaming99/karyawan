<h1 class="text-center">Tabel Karyawan</h1>
<div class="row mt-1">
    <div class="col-md-6">
        <a href="<?= base_url('Home/tambah'); ?>" class="btn btn-success">Tambah Data Karyawan</a>
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-3">
        <form action="<?= base_url('Home'); ?>" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Pencarian" name="keyword" autocomplete="off" autofocus>
                <input class="btn btn-primary" type="submit" name="submit">
            </div>
        </form>
    </div>
</div>

<div class="row mb-1">
    <form method="get" action="<?= base_url('Home'); ?>">
        <div class="col-sm-6 col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal datetimepicker-input" placeholder="Tanggal Awal" data-toggle="datetimepicker" data-target=".tgl_awal" autocomplete="off">
                    <div class="input-group-append">
                        <span class="input-group-text">s/d</span>
                    </div>
                    <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir datetimepicker-input" placeholder="Tanggal Akhir" data-toggle="datetimepicker" data-target=".tgl_akhir" autocomplete="off">
                </div>
            </div>
        </div>
</div>

<button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>

<?php
if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
    echo '<a href="' . base_url('index.php/Home/index') . '" class="btn btn-default">RESET</a>';
?>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">NAMA</th>
            <th scope="col">GENDER</th>
            <th scope="col">TANGGAL LAHIR</th>
            <th scope="col">TANGGAL MASUK</th>
            <th scope="col">GRADE</th>
            <th scope="col">GAJI</th>
            <th scope="col">AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($karyawan)) : ?>
            <tr>
                <td colspan="4">
                    <div class="alert alert-warning text-center" role="alert">
                        Data not found
                </td>
            </tr>
        <?php endif; ?>

        <?php foreach ($karyawan as $kry) : ?>
            <tr>
                <th scope="row"><?= ++$start; ?></th>
                <td><?= $kry->nip; ?></td>
                <td><?= $kry->nama; ?></td>
                <td><?= $kry->gender; ?></td>
                <td><?= changeDateFormat('d-m-Y', $kry->tanggal_lahir); ?></td>
                <td><?= changeDateFormat('d-m-Y', $kry->tanggal_masuk); ?></td>
                <td><?= $kry->grade; ?></td>
                <td><?= $kry->gaji; ?></td>
                <td>
                    <a href="<?= base_url(); ?>home/edit/<?= $kry->id; ?>" class="badge rounded-pill bg-warning">EDIT</a>
                    <a href="<?= base_url(); ?>home/hapus/<?= $kry->id; ?>" class="badge rounded-pill bg-danger delete">DELETE</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php
    if ($this->session->flashdata('flash')) { ?>
        var isi = <?php echo json_encode($this->session->flashdata('flash')) ?>;
        Swal.fire({
            title: "Selamat",
            text: "<?= $this->session->flashdata('flash') ?>",
            icon: "success",
            button: false,
            timer: 5000,
        });
    <?php
        unset($_SESSION['flash']);
    } ?>

    //tombol hapus
    $('.delete').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Hapus data karyawan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })
</script>