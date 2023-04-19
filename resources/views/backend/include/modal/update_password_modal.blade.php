<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  method="GET" action="{{ route('password_update') }}">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Password</h4>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
                </div>

                <div class="modal-body">
                    @csrf

                    <div class="mb-3">
                        <label for="oldPasswordInput" class="form-label">Password Lama</label>
                        <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                            placeholder="Password Lama">
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newPasswordInput" class="form-label">Password Baru</label>
                        <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                            placeholder="Password Baru">
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password Baru</label>
                        <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                            placeholder="Konfirmasi Password Baru">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.modal -->
