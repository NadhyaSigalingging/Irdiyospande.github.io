<?php
include('component/com-kamar.php');
include('component/com-transaksi.php');

// Urutkan kamar berdasarkan status
function sortKamar($a, $b) {
    $statusOrder = array('TERPAKAI' => 0, 'KOTOR' => 1, 'TERSEDIA' => 2);
    $statusA = isset($statusOrder[$a['status_kamar']]) ? $statusOrder[$a['status_kamar']] : 3;
    $statusB = isset($statusOrder[$b['status_kamar']]) ? $statusOrder[$b['status_kamar']] : 3;

    if ($statusA == $statusB) {
        return strcmp($a['nama_kamar_tipe'], $b['nama_kamar_tipe']);
    }

    return $statusA - $statusB;
}
usort($kamar, 'sortKamar');

// Ambil semua tipe kamar unik
$tipe_kamar_unik = array();
foreach ($kamar as $k) {
    if (!in_array($k['nama_kamar_tipe'], $tipe_kamar_unik)) {
        $tipe_kamar_unik[] = $k['nama_kamar_tipe'];
    }
}

// Filter berdasarkan tipe kamar
if (isset($_GET['tipe']) && $_GET['tipe'] !== '') {
    $tipe_filter = $_GET['tipe'];
    $filtered_kamar = array();
    foreach ($kamar as $k) {
        if ($k['nama_kamar_tipe'] === $tipe_filter) {
            $filtered_kamar[] = $k;
        }
    }
    $kamar = $filtered_kamar;
}

// Filter berdasarkan rentang tanggal
if (!empty($_GET['tanggal_awal']) && !empty($_GET['tanggal_akhir'])) {
    $tanggal_awal = $_GET['tanggal_awal'];
    $tanggal_akhir = $_GET['tanggal_akhir'];
    $filtered_kamar_rentang = array();

    foreach ($kamar as $k) {
        $id_kamar = $k['id_kamar'];
        $tersedia = true;

        foreach ($tamu_inhouse as $tamu) {
            if ($tamu['id_kamar'] == $id_kamar) {
                $checkin = $tamu['tanggal_checkin'];
                $checkout = $tamu['tanggal_checkout'];

                // Jika ada bentrok tanggal (overlap)
                if (
                    ($checkin <= $tanggal_akhir) && 
                    ($checkout >= $tanggal_awal)
                ) {
                    $tersedia = false;
                    break;
                }
            }
        }

        // Tambahan pengecekan status TERSERDIA
        if ($tersedia && $k['status_kamar'] === 'TERSEDIA') {
            $filtered_kamar_rentang[] = $k;
        }
    

        if ($tersedia) {
            $filtered_kamar_rentang[] = $k;
        }
    }

    $kamar = $filtered_kamar_rentang;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Kamar</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <style>
        html, body, .wrapper, .content-wrapper {
            background-color: #DFDAC8 !important;
        }
        .content {
            background-color: #DFDAC8;
            padding: 5px;
            border-radius: 10px;
        }
        .box {
            background-color: #D6D3C6 !important;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        .alert-warning {
            background-color: #f7e7c3;
            border-color: #f0d9a9;
            color: #8a6d3b;
            border-radius: 10px;
            padding: 20px;
        }
        .alert-warning h4 {
            color: #8a6d3b;
            font-weight: bold;
            text-transform: uppercase;
        }
        .table-striped>tbody>tr:nth-child(odd) {
            background-color: #f3f2ed;
        }
        .table>thead>tr {
            background-color: #c2beb1;
            color: #333;
        }
        .btn-primary {
            background-color: #829983;
            border-color: #6f846d;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #6f846d;
            border-color: #5d705a;
        }
        h1 {
            color: #3b3b3b;
        }
        .badge-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 14px;
        }
        .badge-tersedia { background-color: #28a745; }
        .badge-terpakai { background-color: #dc3545; }
        .badge-kotor { background-color: #fd7e14; }
        .badge-direservasi { background-color:rgb(33, 103, 184); }
        .table-responsive-scroll {
            max-height: 500px;
            overflow-y: auto;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<section class="content-header">
    <h1>Status Kamar</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            <!-- Filter -->
            <form method="GET" action="index.php" class="form-inline mb-3">
                <input type="hidden" name="module" value="status_kamar" />
                
                <label for="filter_tipe" class="mr-2">Tipe:</label>
                <select name="tipe" id="filter_tipe" class="form-control mr-3">
                    <option value="">Semua</option>
                    <?php foreach ($tipe_kamar_unik as $tipe): ?>
                        <option value="<?= htmlspecialchars($tipe); ?>" <?= (isset($_GET['tipe']) && $_GET['tipe'] == $tipe) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($tipe); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label class="mr-2">Dari:</label>
                <input type="date" name="tanggal_awal" class="form-control mr-2"
                    value="<?= isset($_GET['tanggal_awal']) ? htmlspecialchars($_GET['tanggal_awal']) : '' ?>" />

                <label class="mr-2">Sampai:</label>
                <input type="date" name="tanggal_akhir" class="form-control mr-2"
                    value="<?= isset($_GET['tanggal_akhir']) ? htmlspecialchars($_GET['tanggal_akhir']) : '' ?>" />

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <br>

            <?php if (!empty($kamar)) { ?>
                <div class="table-responsive-scroll">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No. Kamar</th>
                                <th>Tipe</th>
                                <th>Status</th>
                                <th>Terpakai Sampai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kamar as $data_kamar): ?>
                                <tr>
                                    <td><?= htmlspecialchars($data_kamar['nomor_kamar']); ?></td>
                                    <td><?= htmlspecialchars($data_kamar['nama_kamar_tipe']); ?></td>
                                    <td>
                                        <?php
                                        $status = $data_kamar['status_kamar'];
                                        if ($status == 'TERSEDIA') {
                                            echo '<span class="badge-status badge-tersedia">TERSEDIA</span>';
                                        } elseif ($status == 'TERPAKAI') {
                                            echo '<span class="badge-status badge-terpakai">TERPAKAI</span>';
                                        } elseif ($status == 'KOTOR') {
                                            echo '<span class="badge-status badge-kotor">KOTOR</span>';
                                        } elseif ($status == 'RESERVASI') {
                                            echo '<span class="badge-status badge-direservasi">DIRESERVASI</span>';
                                        }else {
                                            echo '<span class="badge-status" style="background-color:#6c757d;">UNKNOWN</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $idkamar = $data_kamar['id_kamar'];
                                        $checkout = '-';
                                        foreach ($tamu_inhouse as $tamu) {
                                            if ($tamu['id_kamar'] == $idkamar) {
                                                $checkout = $tamu['tanggal_checkout'];
                                                break;
                                            }
                                        }
                                        echo htmlspecialchars($checkout);
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning">
                    <h4>Tidak Ada Kamar Tersedia</h4>
                    Tidak ditemukan kamar untuk tipe dan rentang tanggal yang dipilih.
                </div>
            <?php } ?>
        </div>
    </div>
</section>
</body>
</html>
