<?php
// Helper for testing: include header to ensure CSRF token is created, then print it.
include_once __DIR__ . '/../vista/layouts/header.php';
session_start();
echo $_SESSION['csrf_token'] ?? '';
