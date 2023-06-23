const flashdata = $('.flash-data').data('flashdata');
const flashdataerror = $('.flash-data').data('flashdata_error');

if (flashdata) {
    Swal.fire({
        icon: 'success',
        title: flashdata,
        showConfirmButton: true,
    })
} else if (flashdataerror) {
    Swal.fire({
        icon: 'error',
        title: flashdataerror,
        showConfirmButton: true,
    })
}