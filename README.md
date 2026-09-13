# Sistem Informasi Pendaftaran Santri Baru Pondok Pesantren Darussalam Dukuwaluh Purwokerto Berbasis Web

**Proses Kerja Sistem**

a. Proses Pendaftaran
-calon santri melakukan pendaftaran melalui menu daftar
-calon santri mengisi formulir pendaftaran
-Data yang diinputkan akan masuk kedalam tabel akun, pendaftaran, detail_pendaftaran
-User akan diinformasikan untuk melakukan login dengan email dan password untuk menyelesaikan pendaftaran
-User harus menyelesaikan formulir data orang tua dan mengupload kartu keluarga, Foto 3x4 untuk menyelesaikan pendaftaran
-data upload akan masuk ke dalam tabel pendaftar
-Setelah upload berhasil, maka syarat pendaftaran lengkap
-tunggu konfirmasi dari admin
-admin mengkonfirmasi pendaftaran user
-jika status pendaftar user akan berubah menjadi 1 di table pendaftaran maka user dinyatakan diterima
-jika status pendaftar user akan berubah menjadi 2 di table pendaftaran maka user dinyatakan ditolak
-Proses pendaftaran selesai, lanjut ke proses pembayaran.

b. Proses pembayaran Pendaftaran (Cicilan Pembayaran pendaftara + SPP Bulan ke 1)
-User melakukan melakukan pembayaran di menu pembayaran
-User harus melakukan konfirmasi pembayaran di menu konfirmasi pembayaran dengan menyertakan bukti jika telah melakukan pembayaran
(Status pembayaran berubah menjadi 1 (user dinyatakan ADA BUKTI PEMBAYARAN))
-Admin akan melakukan konfirmasi atas konfirmasi pembayaran oleh user
-Status Pembayaran akan diubah jadi 2 (user dinyatakan LUNAS)
-Status Pembayaran akan diubah jadi 3 (user dinyatakan BELUM LUNAS)


*USER
email 		: 	Habib@test
password 	:	1234
*ADMIN
email 		: 	Admin@Test
password 	:	1234
