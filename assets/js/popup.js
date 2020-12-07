const flashData = $('.flash-data').data('flashdata');

// bisa pake true / tidak
if( flashData ){
    Swal.fire({
        title: 'Data Berhasil ' + flashData,
        text: '',
        icon: 'success'
    });
}

// icon-hapus
$('.icon-hapus').on('click', function(e){
    // matikan href
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "data akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
        if (result.isConfirmed) {
  
            document.location.href = href;
 
        }
      })
});