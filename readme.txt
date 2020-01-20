1. merubah isi file config/Database.php (define("DB_PASSWORD", "root")) dan sesuaikan isi password database
2. jalankan sesuai tahapan di dalam file migration.sql di database
3. copy folder flip ke direktory web server
4. buka browser dan jalankan http://localhost/flip
5. a. menu utama
      form isian kodebank,nomor rekening,nominal,keterangan
      pilih submit dan setelah selesai ke halaman daftar disbursment
   b. daftar disbursment
      berisi daftar transaksi disbursment
   c. detail isi disbursment
      klik id disbursment pada daftar disbursment untuk melihat detailnya dan mengupdate status responsenya
