import fs from 'fs';

// Function to read routes from api.php
function getRoutes() {
    const routesFile = fs.readFileSync('./routes/api.php', 'utf8');
    const routeRegex = /Route::apiResource\('([^']*)'/g;
    let match;
    const routes = [];
    while ((match = routeRegex.exec(routesFile)) !== null) {
        routes.push(match[1]);
    }
    return routes;
}

// Function to generate README content
function generateReadmeContent(routes) {
    let content = `# Sistem Manajemen HRD\n\n`;
    content += `Aplikasi berbasis web untuk mengelola data karyawan, absensi, cuti, dan penggajian dalam suatu perusahaan. Dibangun menggunakan framework Laravel di sisi backend dan Vue.js di sisi frontend.\n\n`;
    content += `## Persyaratan Sistem\n\n`;
    content += `*   **Server:**\n    *   PHP >= 8.1\n    *   Composer\n    *   Database (MySQL, PostgreSQL, dll. yang didukung oleh Laravel)\n`;
    content += `*   **Klien (Browser):**\n    *   Browser web modern seperti Chrome, Firefox, Safari, atau Edge.\n    *   Node.js dan NPM (untuk pengembangan frontend)\n\n`;
    content += `## Fungsi dan Fitur Utama\n\n`;
    content += `1.  **Manajemen Karyawan:**\n`;
    content += `    *   Menambah, mengubah, dan menghapus data karyawan.\n`;
    content += `    *   Melihat daftar semua karyawan beserta detailnya (nama, email, posisi, gaji, dll.).\n`;
    content += `    *   Pencarian dan filter data karyawan.\n`;
    if (routes.includes('employee-movements')) {
        content += `    *   Mencatat riwayat pergerakan karyawan (mutasi, promosi, resign, perpanjangan kontrak).\n`;
    }
    content += `2.  **Manajemen Absensi:**\n`;
    content += `    *   Mencatat absensi harian karyawan (check-in dan check-out).\n`;
    content += `    *   Melihat riwayat absensi per karyawan.\n`;
    content += `    *   Mengelola status absensi (hadir, sakit, izin, dll.).\n`;
    content += `3.  **Manajemen Cuti:**\n`;
    content += `    *   Karyawan dapat mengajukan cuti.\n`;
    content += `    *   Admin HRD dapat menyetujui atau menolak pengajuan cuti.\n`;
    content += `    *   Melihat riwayat cuti karyawan.\n`;
    content += `4.  **Manajemen Penggajian (Payroll):**\n`;
    content += `    *   Menghasilkan slip gaji untuk setiap karyawan.\n`;
    content += `    *   Menghitung gaji kotor, potongan, dan gaji bersih.\n`;
    content += `    *   Melihat riwayat penggajian.\n\n`;
    content += `## Role Akses dan Hak Akses\n\n`;
    content += `Aplikasi ini dirancang untuk memiliki beberapa peran pengguna dengan hak akses yang berbeda:\n\n`;
    content += `1.  **Admin/HRD:**\n`;
    content += `    *   Memiliki akses penuh ke semua fitur aplikasi.\n`;
    content += `    *   Dapat mengelola data semua karyawan.\n`;
    content += `    *   Dapat mengelola data absensi, cuti, dan penggajian.\n`;
    content += `    *   Dapat menyetujui atau menolak pengajuan cuti.\n`;
    content += `2.  **Karyawan (Employee):**\n`;
    content += `    *   Dapat melihat dan mengubah data profilnya sendiri.\n`;
    content += `    *   Dapat melihat riwayat absensi dan penggajiannya sendiri.\n`;
    content += `    *   Dapat mengajukan cuti.\n`;
    content += `    *   (Fitur ini perlu diimplementasikan lebih lanjut dengan sistem login per pengguna).\n\n`;
    content += `## Tahapan Instalasi Secara Detail\n\n`;
    content += `1.  **Clone Repository:**\n    \`\`\`bash\n    git clone <URL_repositori>\n    \`\`\`\n`;
    content += `2.  **Masuk ke Direktori Proyek:**\n    \`\`\`bash\n    cd <nama_direktori_proyek>\n    \`\`\`\n`;
    content += `3.  **Instal Dependensi PHP:**\n    \`\`\`bash\n    composer install\n    \`\`\`\n`;
    content += `4.  **Instal Dependensi JavaScript:**\n    \`\`\`bash\n    npm install\n    \`\`\`\n`;
    content += `5.  **Konfigurasi Lingkungan:**\n    *   Salin file \`.env.example\` menjadi \`.env\`.\n      \`\`\`bash\n      cp .env.example .env\n      \`\`\`\n`;
    content += `    *   Buka file \`.env\` dan konfigurasikan koneksi database Anda (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).\n`;
    content += `6.  **Generate Kunci Aplikasi:**\n    \`\`\`bash\n    php artisan key:generate\n    \`\`\`\n`;
    content += `7.  **Jalankan Migrasi Database:**\n    \`\`\`bash\n    php artisan migrate\n    \`\`\`\n`;
    content += `8.  **Compile Aset Frontend:**\n    *   Untuk pengembangan:\n      \`\`\`bash\n      npm run dev\n      \`\`\`\n`;
    content += `    *   Untuk produksi:\n      \`\`\`bash\n      npm run build\n      \`\`\`\n`;
    content += `9.  **Jalankan Server Pengembangan:**\n    \`\`\`bash\n    php artisan serve\n    \`\`\`\n`;
    content += `10. **Akses Aplikasi:**\n    *   Buka browser Anda dan kunjungi \`http://127.0.0.1:8000/hrd\` untuk melihat aplikasi.\n\n`;
    content += `## Pengembangan Lebih Lanjut yang Mungkin Dilakukan\n\n`;
    content += `*   Implementasi sistem otentikasi dan otorisasi untuk peran Admin dan Karyawan.\n`;
    content += `*   Membangun antarmuka pengguna (UI) yang lebih lengkap dan interaktif untuk setiap fitur menggunakan komponen Vue yang telah dibuat.\n`;
    content += `*   Menambahkan fungsionalitas CRUD (Create, Read, Update, Delete) yang lengkap pada setiap komponen Vue dengan menghubungkannya ke API yang sudah ada.\n`;
    content += `*   Menambahkan fitur notifikasi (misalnya, notifikasi email untuk pengajuan cuti).\n`;
    content += `*   Membuat dasbor analitik untuk HRD.\n`;
    content += `*   Menambahkan unit test dan feature test untuk memastikan kualitas kode.\n`;

    return content;
}

// Main function
function updateReadme() {
    const routes = getRoutes();
    const readmeContent = generateReadmeContent(routes);
    fs.writeFileSync('README.md', readmeContent);
    console.log('README.md updated successfully.');
}

updateReadme();
