<?php

use App\Http\Controllers\Api\V1\CustomerController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\ProfileController; // Pastikan ini di-import
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TokoController;
use App\Http\Controllers\Api\V1\ProdukController;
use App\Http\Controllers\Api\V1\SizeController;
use App\Http\Controllers\Api\V1\DiskonController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customerDetails');

Route::get('/', function () {

    return view('welcome');
});

// Add dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('admin/dashboard', 'Index')->name('admindashboard');
    });

    Route::get('/admin/all-ukuran', [SizeController::class, 'index'])->name('allukuran');
    Route::get('/admin/add-ukuran', [SizeController::class, 'create'])->name('addukuran');
    Route::post('/admin/store-ukuran', [SizeController::class, 'store'])->name('storeukuran');
    Route::get('/admin/edit-ukuran/{id}', [SizeController::class, 'edit'])->name('editukuran');
    Route::put('/admin/update-ukuran/{id}', [SizeController::class, 'update'])->name('updateukuran');
    Route::delete('/admin/delete-ukuran/{id}', [SizeController::class, 'destroy'])->name('deleteukuran');

    Route::get('/admin/all-diskon', [DiskonController::class, 'index'])->name('alldiskon');
    Route::get('/admin/add-diskon', [DiskonController::class, 'create'])->name('adddiskon');
    Route::post('/admin/store-diskon', [DiskonController::class, 'store'])->name('storediskon');
    Route::get('/admin/edit-diskon/{id}', [DiskonController::class, 'edit'])->name('editdiskon');
    Route::put('/admin/update-diskon/{id}', [DiskonController::class, 'update'])->name('updatediskon');
    Route::delete('/admin/delete-diskon/{id}', [DiskonController::class, 'destroy'])->name('deletediskon');

    Route::post('/admin/store-produk', [ProdukController::class, 'storeProduk'])->name('storeproduk');

    // ========== SIAKAD ROUTES ==========
    // Dosen
    Route::get('/admin/all-dosen', [App\Http\Controllers\Api\V1\DosenController::class, 'Index'])->name('alldosen');
    Route::get('/admin/add-dosen', [App\Http\Controllers\Api\V1\DosenController::class, 'AddDosen'])->name('adddosen');
    Route::post('/admin/store-dosen', [App\Http\Controllers\Api\V1\DosenController::class, 'StoreDosen'])->name('storedosen');
    Route::get('/admin/edit-dosen/{NIP}', [App\Http\Controllers\Api\V1\DosenController::class, 'EditDosen'])->name('editdosen');
    Route::post('/admin/update-dosen', [App\Http\Controllers\Api\V1\DosenController::class, 'UpdateDosen'])->name('updatedosen');
    Route::get('/admin/delete-dosen/{NIP}', [App\Http\Controllers\Api\V1\DosenController::class, 'DeleteDosen'])->name('deletedosen');

    // Golongan
    Route::get('/admin/all-golongan', [App\Http\Controllers\Api\V1\GolonganController::class, 'Index'])->name('allgolongan');
    Route::get('/admin/add-golongan', [App\Http\Controllers\Api\V1\GolonganController::class, 'AddGolongan'])->name('addgolongan');
    Route::post('/admin/store-golongan', [App\Http\Controllers\Api\V1\GolonganController::class, 'StoreGolongan'])->name('storegolongan');
    Route::get('/admin/edit-golongan/{id_Gol}', [App\Http\Controllers\Api\V1\GolonganController::class, 'EditGolongan'])->name('editgolongan');
    Route::post('/admin/update-golongan', [App\Http\Controllers\Api\V1\GolonganController::class, 'UpdateGolongan'])->name('updategolongan');
    Route::get('/admin/delete-golongan/{id_Gol}', [App\Http\Controllers\Api\V1\GolonganController::class, 'DeleteGolongan'])->name('deletegolongan');

    // Ruang
    Route::get('/admin/all-ruang', [App\Http\Controllers\Api\V1\RuangController::class, 'Index'])->name('allruang');
    Route::get('/admin/add-ruang', [App\Http\Controllers\Api\V1\RuangController::class, 'AddRuang'])->name('addruang');
    Route::post('/admin/store-ruang', [App\Http\Controllers\Api\V1\RuangController::class, 'StoreRuang'])->name('storeruang');
    Route::get('/admin/edit-ruang/{id_ruang}', [App\Http\Controllers\Api\V1\RuangController::class, 'EditRuang'])->name('editruang');
    Route::post('/admin/update-ruang', [App\Http\Controllers\Api\V1\RuangController::class, 'UpdateRuang'])->name('updateruang');
    Route::get('/admin/delete-ruang/{id_ruang}', [App\Http\Controllers\Api\V1\RuangController::class, 'DeleteRuang'])->name('deleteruang');

    // Matakuliah
    Route::get('/admin/all-matakuliah', [App\Http\Controllers\Api\V1\MatakuliahController::class, 'Index'])->name('allmatakuliah');
    Route::get('/admin/add-matakuliah', [App\Http\Controllers\Api\V1\MatakuliahController::class, 'AddMatakuliah'])->name('addmatakuliah');
    Route::post('/admin/store-matakuliah', [App\Http\Controllers\Api\V1\MatakuliahController::class, 'StoreMatakuliah'])->name('storematakuliah');
    Route::get('/admin/edit-matakuliah/{Kode_mk}', [App\Http\Controllers\Api\V1\MatakuliahController::class, 'EditMatakuliah'])->name('editmatakuliah');
    Route::post('/admin/update-matakuliah', [App\Http\Controllers\Api\V1\MatakuliahController::class, 'UpdateMatakuliah'])->name('updatematakuliah');
    Route::get('/admin/delete-matakuliah/{Kode_mk}', [App\Http\Controllers\Api\V1\MatakuliahController::class, 'DeleteMatakuliah'])->name('deletematakuliah');

    // Mahasiswa
    Route::get('/admin/all-mahasiswa', [App\Http\Controllers\Api\V1\MahasiswaAkademikController::class, 'Index'])->name('allmahasiswa');
    Route::get('/admin/add-mahasiswa', [App\Http\Controllers\Api\V1\MahasiswaAkademikController::class, 'AddMahasiswa'])->name('addmahasiswa');
    Route::post('/admin/store-mahasiswa', [App\Http\Controllers\Api\V1\MahasiswaAkademikController::class, 'StoreMahasiswa'])->name('storemahasiswa');
    Route::get('/admin/edit-mahasiswa/{NIM}', [App\Http\Controllers\Api\V1\MahasiswaAkademikController::class, 'EditMahasiswa'])->name('editmahasiswa');
    Route::post('/admin/update-mahasiswa', [App\Http\Controllers\Api\V1\MahasiswaAkademikController::class, 'UpdateMahasiswa'])->name('updatemahasiswa');
    Route::get('/admin/delete-mahasiswa/{NIM}', [App\Http\Controllers\Api\V1\MahasiswaAkademikController::class, 'DeleteMahasiswa'])->name('deletemahasiswa');

    // Pengampu
    Route::get('/admin/all-pengampu', [App\Http\Controllers\Api\V1\PengampuController::class, 'Index'])->name('allpengampu');
    Route::get('/admin/add-pengampu', [App\Http\Controllers\Api\V1\PengampuController::class, 'AddPengampu'])->name('addpengampu');
    Route::post('/admin/store-pengampu', [App\Http\Controllers\Api\V1\PengampuController::class, 'StorePengampu'])->name('storepengampu');
    Route::get('/admin/delete-pengampu/{Kode_mk}/{NIP}', [App\Http\Controllers\Api\V1\PengampuController::class, 'DeletePengampu'])->name('deletepengampu');

    // Jadwal Akademik
    Route::get('/admin/all-jadwal', [App\Http\Controllers\Api\V1\JadwalAkademikController::class, 'Index'])->name('alljadwal');
    Route::get('/admin/add-jadwal', [App\Http\Controllers\Api\V1\JadwalAkademikController::class, 'AddJadwal'])->name('addjadwal');
    Route::post('/admin/store-jadwal', [App\Http\Controllers\Api\V1\JadwalAkademikController::class, 'StoreJadwal'])->name('storejadwal');
    Route::get('/admin/edit-jadwal/{id_jadwal}', [App\Http\Controllers\Api\V1\JadwalAkademikController::class, 'EditJadwal'])->name('editjadwal');
    Route::post('/admin/update-jadwal', [App\Http\Controllers\Api\V1\JadwalAkademikController::class, 'UpdateJadwal'])->name('updatejadwal');
    Route::get('/admin/delete-jadwal/{id_jadwal}', [App\Http\Controllers\Api\V1\JadwalAkademikController::class, 'DeleteJadwal'])->name('deletejadwal');

    // KRS
    Route::get('/admin/all-krs', [App\Http\Controllers\Api\V1\KrsController::class, 'Index'])->name('allkrs');
    Route::get('/admin/add-krs', [App\Http\Controllers\Api\V1\KrsController::class, 'AddKrs'])->name('addkrs');
    Route::post('/admin/store-krs', [App\Http\Controllers\Api\V1\KrsController::class, 'StoreKrs'])->name('storekrs');
    Route::get('/admin/delete-krs/{NIM}/{Kode_mk}', [App\Http\Controllers\Api\V1\KrsController::class, 'DeleteKrs'])->name('deletekrs');

    // Presensi Akademik
    Route::get('/admin/all-presensi', [App\Http\Controllers\Api\V1\PresensiAkademikController::class, 'Index'])->name('allpresensi');
    Route::get('/admin/add-presensi', [App\Http\Controllers\Api\V1\PresensiAkademikController::class, 'AddPresensi'])->name('addpresensi');
    Route::post('/admin/store-presensi', [App\Http\Controllers\Api\V1\PresensiAkademikController::class, 'StorePresensi'])->name('storepresensi');
    Route::get('/admin/edit-presensi/{id_presensi}', [App\Http\Controllers\Api\V1\PresensiAkademikController::class, 'EditPresensi'])->name('editpresensi');
    Route::post('/admin/update-presensi', [App\Http\Controllers\Api\V1\PresensiAkademikController::class, 'UpdatePresensi'])->name('updatepresensi');
    Route::get('/admin/delete-presensi/{id_presensi}', [App\Http\Controllers\Api\V1\PresensiAkademikController::class, 'DeletePresensi'])->name('deletepresensi');
});

// ========== USER PORTAL ROUTES ==========
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [App\Http\Controllers\Api\V1\MahasiswaPortalController::class, 'Dashboard'])->name('user.dashboard');
    Route::get('/user/krs', [App\Http\Controllers\Api\V1\MahasiswaPortalController::class, 'Krs'])->name('user.krs');
    Route::get('/user/presensi', [App\Http\Controllers\Api\V1\MahasiswaPortalController::class, 'Presensi'])->name('user.presensi');
});



Route::controller(TokoController::class)->group(function () {
    Route::get('/tokodashboard', function () {
        return view('toko.dashboardToko');
    })->name('tokodashboard');
    Route::get('/tokodashboard', [TokoController::class, 'tokodashboard'])->name('tokodashboard');


    Route::get('/shop', function () {
        return view('toko.dashboardToko');
    })->name('shop');
    Route::get('/keranjang', function () {
        return view('toko.dashboardToko');
    })->name('keranjang');
    Route::get('/faq', function () {
        return view('toko.dashboardToko');
    })->name('faq');
    Route::get('/lacak', function () {
        return view('toko.dashboardToko');
    })->name('lacak');
    Route::get('/kontak', function () {
        return redirect('/#contact-us');
    })->name('kontak');
});




Route::get('/userprofile', [DashboardController::class, 'Index']);
Route::middleware('auth')->group(function () {
    Route::get('resources/admin/logout', [DashboardController::class, 'AdminLogout'])->name('adminlogout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // TAMBAHKAN BARIS INI UNTUK RUTE UPDATE PASSWORD
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

});



// require __DIR__.'/auth.php'; // Ini harusnya tidak komentar jika Anda menggunakan auth bawaan Laravel
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');

// Add registration routes
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Auth::routes();
