<div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.lpj.return_funds') }}">
            <div class="modal-content" style="width: 600px">
                <div class="modal-header">
                    <h5 class="modal-title" id="returnModalLabel">Pengembalian Dana</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}">
                   <div class="form-group">
                        <label for="realize_budget_receipt_id">Pilih Penerimaan Dana</label>
                        <select name="realize_budget_receipt_id" class="form-control" required>
                            <option value="">== Pilih Salah Satu ==</option>
                            @foreach ($realize_br as $receipt)
                            <option value="{{ $receipt->id }}">{{ $receipt->name }}</option>
                            @endforeach
                        </select>
                    </div>                    

                    <div class="form-group">
                        <label for="selisih">Selisih Dana</label>
                        <input type="number" min="0" max="{{ $selisih_akhir }}" class="form-control" name="selisih"
                            value="{{ $selisih_akhir}}" readonly>
                    </div> 

                    <div class="form-group">
                        <label for="total">Jumlah Dana Dikembalikan</label>
                        <input type="number" min="0" max="{{ $selisih_akhir - $total_pengembalian}}" class="form-control" name="total"
                            value="{{ $selisih_akhir - $total_pengembalian}}" required>
                    </div>                    

                    <div class="form-group mt-3">
                        <label for="return_date">Tanggal Pengembalian</label>
                        <input type="date" name="return_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="notes">Catatan (Opsional)</label>
                        <textarea name="notes" class="form-control" rows="3"
                            placeholder="Contoh: Dana sisa tidak terpakai untuk dokumentasi."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i> Simpan Pengembalian
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>