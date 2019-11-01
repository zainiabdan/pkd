 <form action="{{ url('transactions/set') }}" method="post">
    @csrf
    <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">
        <div id='modalTitle'>Pilih Sopir</div>
        </h4>
    </div>
        <!-- Modal Body -->
    <div class="modal-body">

        {{-- <input type="hidden" name="id" value="{{ $id }}">  --}}
							<div class="">
                                <table  id="table-drivers" class="responsive display nowrap dataTable no-footer dtr-inline" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            {{-- <th>No</th> --}}
                                            <th>Nama</th>
                                            {{-- <th>Email</th> --}}
                                            <th>Instansi</th>
                                            <th>Foto</th>
                                            {{-- <th>KTP</th> --}}
                                            <th width="200">OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($drivers as $h)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                                                    
                                            <td>{{ $h->name }}</td>
                                            {{-- <td>{{ $h->email }}</td> --}}
                                            <td>{{ $h->nama_instansi }}</td>
                                            <td>
                                                <a href="{{ Storage::url($h->foto_profil) }}" data-toggle="lightbox" data-title=" " data-footer="">
                                                    <img  width="50px"  src="{{ Storage::url($h->foto_profil) }}" class="img-fluid">
                                                </a>
                                            </td>
                                            {{-- <td>
                                                <a href="{{ Storage::url($h->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
                                                    <img  width="100px"  src="{{ Storage::url($h->foto_ktp) }}" class="img-fluid">
                                                </a>
                                            </td> --}}
                                            <td>
                                            <a class="btn btn-info" href="/transactions/set-driver/{{ $id }}/{{ $h->id_driver }}">Pilih</a>
                                                {{-- <button class="btn btn-danger deleteDriver" id="driver_{{ $h->id_driver }}"">HAPUS</button> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                                     </table>
                            </div>
                            
                            <script>
                                $(document).ready( function () {
                                    $("#table-drivers").dataTable({
                                    "responsive" : true,
                                    "columnDefs" : [
                                        {responsivePriority : 0, targets : 0},
                                        {responsivePriority : 1, targets : 1},
                                        {responsivePriority : 2, targets : 2},
                                        {responsivePriority : 3, targets : 3},
                                        // {responsivePriority : 4, targets : 4},
                                        // {responsivePriority : 5, targets : 5}
                                    ]
                                    });
                                });
                            </script>
    </div>

        
    <div class="modal-footer">
        {{-- <div class="form-group">
            <input type="submit" class="form-control btn-info" value="Simpan">
        </div> --}}
    </div>
            
</form>