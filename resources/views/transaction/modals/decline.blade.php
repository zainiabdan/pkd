<form id="trsTolak" action="{{ url('transactions/set') }}" method="post">
    <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">
            <div id='modalTitle'>
                Yakin Untuk Menolak Transaksi
            </div>
        </h4>
    </div>
        <!-- Modal Body -->
    <div class="modal-body">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden"  name="status" value="1">
        <input type="submit" class="btn btn-danger form-control" value="Ya">
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-dark form-control" data-dismiss="modal">
                Batal
        </button>
    </div>

</form>