 <form action="{{ url('transactions/set') }}" method="post">
    @csrf
    <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">
        <div id='modalTitle'>Atur Status</div>
        </h4>
    </div>
        <!-- Modal Body -->
    <div class="modal-body">
        
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="form-group">
            <select name="status" class="form-control">
                <option  <?php if($option=='0') { echo 'selected="selected"'; } ?> value="0">Belum Disetujui</option>
                <option  <?php if($option=='1') { echo 'selected="selected"'; } ?> value="1">Ditolak</option>
                <option  <?php if($option=='2') { echo 'selected="selected"'; } ?> value="2">Disetujui</option>
                <option  <?php if($option=='3') { echo 'selected="selected"'; } ?> value="3">Dipinjamkan</option>
                <option  <?php if($option=='4') { echo 'selected="selected"'; } ?> value="4">Dikembalikan</option>
            </select>
        </div>
    </div>
    
    <div class="modal-footer">
        <div class="form-group">
            <input type="submit" class="form-control btn-info" value="Simpan">
        </div>
    </div>
            
</form>