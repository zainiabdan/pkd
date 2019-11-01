function formhash(form, password) {
    // Buat masukan elemen baru, ini akan menjadi bidang untuk kata kunci dalam ''hash'' bagi kita. 
    var p = document.createElement("input");
 
    // Tambahkan elemen baru tersebut ke dalam formulir kita. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Pastikan kata kunci dalam teks tidak dikirimkan.
    password.value = "";
 
    // Lalu, daftarkan formulirnya. 
    form.submit();
}
 
function regformhash(form, user_id, uid, email, lvl, password, conf) {
     // Memeriksa kelengkapan setiap bidang
    if (uid.value == ''         || 
          email.value == ''     || 
          password.value == ''  || 
          conf.value == '') {
 
        alert('Anda harus menyediakan semua detail yang diperlukan. Silakan coba lagi');
        return false;
    }
 
    // Memeriksa nama pengguna
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Nama pengguna harus mengandung hanya huruf, angka, dan garis bawah. Silakan coba lagi"); 
        form.username.focus();
        return false; 
    }
 
    // Memeriksa panjang minimal kata kunci (6 karakter)
    // Hasil pemeriksaan disalin di bawah, tetapi ditampilkan untuk menunjukkan
    // panduan yang lebih spesifik bagi pengguna
    if (password.value.length < 6) {
        alert('Kata kunci harus setidaknya sepanjang 6 karakter. Silakan coba lagi');
        form.password.focus();
        return false;
    }
 
    // Setidaknya satu angka, satu huruf kecil dan satu huruf besar
    // Setidaknya enam karakter
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Kata kunci harus mengandung setidaknya satu angka, satu huruf kecil dan satu huruf besar. Silakan coba lagi');
        return false;
    }
 
    // Memastikan kata kunci dan konfirmasinya sama
    if (password.value != conf.value) {
        alert('Kata kunci dan konfirmasi Anda tidak cocok. Silakan coba lagi');
        form.password.focus();
        return false;
    }
 
    // Buat masukan elemen baru, ini akan menjadi bidang untuk kata kunci dengan ''hash'' kita. 
    var p = document.createElement("input");
 
    // Tambahkan elemen baru ini ke formulir kita. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Pastikan kata kunci dalam teks tidak dikirimkan.
    password.value = "";
    conf.value = "";
 
    // Lalu, daftarkan formulirnya.
    form.submit();
    return true;
}