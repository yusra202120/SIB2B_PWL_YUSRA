<form action="{{ url('/level/ajax') }}" method="POST" id="form-tambah-level">
    @csrf
    <div id="modal-level" class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Kode Level -->
                <div class="form-group">
                    <label>Kode Level</label>
                    <input type="text" name="level_kode" id="level_kode" class="form-control" required>
                    <small id="error-level_kode" class="error-text form-text text-danger"></small>
                </div>

                <!-- Nama Level -->
                <div class="form-group">
                    <label>Nama Level</label>
                    <input type="text" name="level_nama" id="level_nama" class="form-control" required>
                    <small id="error-level_nama" class="error-text form-text text-danger"></small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $("#form-tambah-level").validate({
            rules: {
                level_kode: { required: true, minlength: 2 },
                level_nama: { required: true, minlength: 3 }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.status) {
                            $('#myModalLevel').modal('hide'); // pastikan ID modal-nya cocok
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataLevel.ajax.reload(); // reload datatable
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function (prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
