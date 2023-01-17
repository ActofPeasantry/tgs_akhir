    {{-- <form role="form" method="POST" name="tanggal" enctype="multipart/form-data" action="add/add_debit.php"> --}}
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Tambah Debet</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tanggal Diterima</label>
                                    <input class="form-control datepicker" type="text" name="tgl" value="2023-01-12" placeholder="mm/dd/yyyy" required="">
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Deskripsi</label>
                                    <input type="text" name="deskripsi" placeholder="Deskripsi atau nama siswa/siswi" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Kategori Debet</label>
                                    <select class="form-control select2 input-sm" name="kategori" id="combobox" required="">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">SPP</option>
                                        <option value="2">KOTAK AMAL</option>
                                        <option value="5">WAKAF</option>
                                        <option value="6">DONASI</option>
                                        <option value="10">Pembangunan</option>
                                        <option value="11">Sisa Kas</option>
                                        <option value="12">Donatur Bulanan</option>
                                        <option value="16">Anak Yatim</option>
                                        <option value="17">Muallaf &amp; Fakir Miskin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Keterangan</label>
                                    <input type="text" name="keterangan" placeholder="Keterangan tambahan" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Jumlah</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp. </span>
                                        <input type="text" name="jumlah" onkeypress="return angkadanhuruf(event,'1234567890',this)" placeholder="Jumlah dalam rupiah Contoh : 100000" class="form-control" required="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light" name="submit1">Simpan</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    {{-- </form> --}}
