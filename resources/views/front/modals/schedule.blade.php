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
        
      
    </div>
    
    <div class="modal-footer">
        <div class="form-group">
            <input type="submit" class="form-control btn-info" value="Simpan">
        </div>
    </div>
            
</form>