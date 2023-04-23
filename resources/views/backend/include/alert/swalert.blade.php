{{-- <script type="text/javascript">
    $('.show_confirm').click(function(event) {
        swal.fire({
            title: "Apakah Anda Yakin?",
            icon: 'question',
            iconColor: 'red',
            text: "Menghapus kategori ini akan menghapus data pada kategori tersebut.",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
            confirmButtonColor: '#d33',
            cancelButtonColor: 'green',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed){
                swal.fire("Done!", results.message, "success");
                // refresh page after 2 seconds
                setTimeout(function(){
                    location.reload();
                },2000);
                form.submit();
            }
        })
    });
</script> --}}
<script type="text/javascript">
    $('.show_confirm_category').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         Swal.fire({
            title: "Apakah Anda Yakin?",
            icon: 'question',
            iconColor: 'red',
            text: "Menghapus kategori ini akan menghapus SELURUH data pada kategori tersebut.",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
            confirmButtonColor: '#d33',
            cancelButtonColor: 'green',
            reverseButtons: true
         })
         .then((willDelete) => {
           if (willDelete.isConfirmed) {
                swal.fire(
                    'DIHAPUS!',
                    'Data Berhasil dihapus.',
                    'success'
                )
                // refresh page after 2 seconds
                setTimeout(function(){
                    location.reload();
                },2000);
                form.submit();
           }
         });
     });
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         Swal.fire({
            title: "Apakah Anda Yakin?",
            icon: 'question',
            iconColor: 'red',
            text: "Data yang sudah dihapus tidak dapat dikembalikan",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
            confirmButtonColor: '#d33',
            cancelButtonColor: 'green',
            reverseButtons: true
         })
         .then((willDelete) => {
           if (willDelete.isConfirmed) {
                swal.fire(
                    'DIHAPUS!',
                    'Data Berhasil dihapus.',
                    'success'
                )
                // refresh page after 2 seconds
                setTimeout(function(){
                    location.reload();
                },2000);
                form.submit();
           }
         });
     });
</script>

