<?php
// Koneksi ke database
include 'config/connection.php';

// Mendapatkan pertanyaan dari tabel pertanyaan
$query_pertanyaan = "SELECT * FROM pertanyaan WHERE status_pertanyaan = 'jawaban'";
$result_pertanyaan = mysqli_query($koneksi, $query_pertanyaan);

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah nilai-nilai yang dibutuhkan telah ada
    if (isset($_POST["id_mahasiswa"]) && isset($_POST["id_dosen"]) && isset($_POST["id_matakul"]) && isset($_POST["id_semester"]) && isset($_POST["tahun"])) {
        $id_mahasiswa = $_POST["id_mahasiswa"];
        $id_dosen = $_POST["id_dosen"];
        $id_matakul = $_POST["id_matakul"];
        $id_semester = $_POST["id_semester"];
        $tahun = $_POST["tahun"];

        // Menyimpan penilaian ke dalam tabel penilaian
        foreach ($_POST["jawaban"] as $id_jawaban => $nilai_jawaban) {
            $query_jumlah_jawaban = "SELECT SUM(nilai_jawaban) AS total_nilai FROM jawaban WHERE id_jawaban = '$id_jawaban'";
            $result_jumlah_jawaban = mysqli_query($koneksi, $query_jumlah_jawaban);
            $row_jumlah_jawaban = mysqli_fetch_assoc($result_jumlah_jawaban);
           // $nilai = $row_jumlah_jawaban["total_nilai"] * $nilai_jawaban;
            $nilai = $row_jumlah_jawaban["total_nilai"] ;

            $query_simpan = "INSERT INTO penilaian (id_jawaban, id_mahasiswa, id_dosen, id_matakul, nilai, id_semester, tahun) VALUES ('$id_jawaban', '$id_mahasiswa', '$id_dosen', '$id_matakul', '$nilai', '$id_semester', '$tahun')";
            mysqli_query($koneksi, $query_simpan);
        }

        // Redirect ke halaman sukses atau halaman lain yang diinginkan
        header("Location: quis_post.php");
        exit();
    } else {
        echo "Form tidak lengkap!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quisioner</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <!-- Input mahasiswa, dosen, matakul, semester, tahun -->
        <input type="text" name="id_mahasiswa" placeholder="ID Mahasiswa"><br>
        <input type="text" name="id_dosen" placeholder="ID Dosen"><br>
        <input type="text" name="id_matakul" placeholder="ID Mata Kuliah"><br>
        <input type="text" name="id_semester" placeholder="ID Semester"><br>
        <input type="text" name="tahun" placeholder="Tahun"><br>

        <!-- Pertanyaan dan pilihan jawaban -->
        <?php while ($row_pertanyaan = mysqli_fetch_assoc($result_pertanyaan)) { ?>
            <p><?php echo $row_pertanyaan["nama_pertanyaan"]; ?></p>
            <?php
            $id_pertanyaan = $row_pertanyaan["id_pertanyaan"];
            $query_jawaban = "SELECT * FROM jawaban WHERE id_pertanyaan = '$id_pertanyaan'";
            $result_jawaban = mysqli_query($koneksi, $query_jawaban);

            while ($row_jawaban = mysqli_fetch_assoc($result_jawaban)) {
                $id_jawaban = $row_jawaban["id_jawaban"];
                $nama_jawaban = $row_jawaban["nama_jawaban"];
                ?>
                <input type="radio" name="jawaban[<?php echo $id_jawaban; ?>]" value="<?php echo $row_jawaban["nilai_jawaban"]; ?>"><?php echo $nama_jawaban; ?><br>
            <?php } ?>
        <?php } ?>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
