<?php

// Mulai sesi (jika belum dimulai)
session_start();

// Lakukan log out atau tindakan lainnya yang diperlukan

// Redirect ke halaman login
header("Location: login.php");
exit(); // Pastikan untuk keluar setelah melakukan redirect
?>