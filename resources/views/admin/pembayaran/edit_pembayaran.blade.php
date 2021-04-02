<script type="text/javascript">
    $('.cari').select2({
        placeholder: 'Cari...',
        ajax: {
        url: '{{route('pembayaran.filter')}}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
            results:  $.map(data, function (item) {
                return {
                    text: item.nisn + " - " + item.nama,
                    id: item.nisn
                }
            })
            };
        },
        cache: true
        }
    });


    $("#cari_siswa").change(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: "POST",
            url: '{{route('pembayaran.cari')}}',
            data: { 
                data: $("#cari_siswa").val() 
            },
            dataType: 'json',
            success: function(response) {
            // use console.log for debugging, and access the property of the deserialised object
                console.log(response); 
                $("#nama").text(response[0].nama);
                $("#nisn").text("Nisn : " + response[0].nisn);
                $("#nis").text("Nis : " + response[0].nis);
                $("#kelas").text("Kelas : " + response[0].kelas.kelas + " " + response[0].kelas.vocational.jurusan + " " + response[0].kelas.nama_kelas);
                $("#payment").show();
                
                }
        });
    });
</script>