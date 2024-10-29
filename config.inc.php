<?php
$cfg['blowfish_secret'] = 'YOUR_RANDOM_SECRET';

$i = 0;

// Thiết lập máy chủ đầu tiên
$i++;
$cfg['Servers'][$i]['auth_type'] = 'cookie';  // Sử dụng loại xác thực "config"
$cfg['Servers'][$i]['host'] = 'db';  // Host phải là "db"
$cfg['Servers'][$i]['user'] = 'root';  // Tên người dùng là root
$cfg['Servers'][$i]['password'] = '';  // Để trống mật khẩu
$cfg['Servers'][$i]['port'] = '3306';
$cfg['Servers'][$i]['AllowNoPassword'] = true;  // Cho phép đăng nhập mà không cần mật khẩu


