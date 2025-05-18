// ابتدا jQuery را import کنید
import $ from 'jquery';
window.$ = window.jQuery = $;

// سپس بقیه کتابخانه‌ها
import 'bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

// راه‌اندازی Alpine
window.Alpine = Alpine;
Alpine.start();

// اگر فایل bootstrap.js دارید
import './bootstrap';