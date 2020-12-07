//edit pasien
$(function () {
    $('.tombolDaftar').on('click', function () {
        $('#formModalLabel').html('Daftar disini!');
        $('.modal-footer button[type=submit]').html('Daftar');
    });

    $('.tampilModalEdit').on('click', function () {
        $('#formModalLabel').html('Edit Data Pasien');
        $('.modal-footer button[type=submit]').html('Edit');
        $('.modal-body form').attr('action', 'http://localhost/klinik/pasien/edit')

        const id_pasien = $(this).data('id_pasien');

        $.ajax({
            url: 'http://localhost/klinik/pasien/getedit',
            data: { id: id_pasien },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama_pasien').val(data.nama_pasien);
                $('#tgl_lahir').val(data.tgl_lahir);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#no_hp').val(data.no_hp);
                $('#alamat').val(data.alamat);
                $('#id_pasien').val(data.id_pasien);
            }
        });
    });
});

// edit dokter
$(function () {
    $('.tombolDokter').on('click', function () {
        $('#formModalLabelDokter').html('Tambah Data Dokter');
        $('.modal-footer button[type=submit]').html('Tambah');
    });

    $('.tampilModalEditDokter').on('click', function () {
        $('#formModalLabelDokter').html('Edit Data Dokter');
        $('.modal-footer button[type=submit]').html('Edit');
        $('.modal-body form').attr('action', 'http://localhost/klinik/dokter/edit')

        const id_dokter = $(this).data('id_dokter');

        $.ajax({
            url: 'http://localhost/klinik/dokter/getedit',
            data: { id: id_dokter },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama_dokter').val(data.nama_dokter);
                $('#nip').val(data.nip);
                $('#jk').val(data.jk);
                $('#tarif_konsul').val(data.tarif_konsul);
                $('#id_dokter').val(data.id_dokter);
            }
        });
    });
});

// edit obat
$(function () {
    $('.tombolObat').on('click', function () {
        $('#formModalLabelObat').html('Tambah Data Obat');
        $('.modal-footer button[type=submit]').html('Tambah');
    });

    $('.tampilModalEditObat').on('click', function () {
        $('#formModalLabelObat').html('Edit Data Obat');
        $('.modal-footer button[type=submit]').html('Edit');
        $('.modal-body form').attr('action', 'http://localhost/klinik/obat/edit')

        const id_obat = $(this).data('id_obat');

        $.ajax({
            url: 'http://localhost/klinik/obat/getedit',
            data: { id: id_obat },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#no_obat').val(data.no_obat);
                $('#nama_obat').val(data.nama_obat);
                $('#harga_obat').val(data.harga_obat);
                $('#id_obat').val(data.id_obat);
            }
        });
    });
});

//edit user
$(function () {
    $('.tampilModalEditUser').on('click', function () {
        $('.modal-body form').attr('action', 'http://localhost/klinik/user/edit')

        const id_user = $(this).data('id_user');

        $.ajax({
            url: 'http://localhost/klinik/user/getedit',
            data: { id: id_user },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#username').val(data.username);
                $('#email').val(data.email);
                $('#password').val(data.password);
            }
        });
    });
});


