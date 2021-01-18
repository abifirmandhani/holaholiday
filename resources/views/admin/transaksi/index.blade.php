@extends('admin_template.master')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
        <div class="form-group col-md-12 text-center">
                <h4>Daftar Transaksi</h4>
            </div>
            <hr>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
          <table id="datatable"style="width:100%" class="table table-striped table-bordered">
            <thead>
              <tr class="headings">
                <th class="text-center"><b>Id</b></th>
                <th class="text-center"><b>Pesanan</b></th>
                <th class="text-center"><b>Tanggal</b></th>
                <th class="text-center"><b>Total</b></th>
                <th class="text-center"><b>Status</b></th>
                <th class="text-center"><b>Action</b></th>
              </tr>
            </thead>
            <tbody class="text-center">
                @foreach($transaksi as $key=>$data)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>
                      @if($data->paket)
                        {{$data->paket->nama}}
                      @else
                        {{$data->destinasi->nama}}
                      @endif
                    </td>
                    <td>{{$data->tanggal}}</td>
                    <td>Rp {{$data->harga_total}}</td>
                    <td>Rp {{$data->status}}</td>
                    <td>
                      <button data-toggle="modal" data-target="#Modal{{$data->id}}" class="btn btn-sm btn-primary">Detail <i class="far fa-eye"></i></button>
                      <button onclick="deleteTransaksi({{$data->id}})" class="btn btn-sm btn-danger">Delete <i class="fas fa-trash"></i></button>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="Modal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="pesanan">Nama Pesanan</label>
                            <input type="text" class="form-control" name="pesanan" value="@if($data->paket){{$data->paket->nama}}@else{{$data->destinasi->nama}}@endif" readonly>
                          </div>
                          <div class="form-group">
                            <label for="tanggal">Tanggal Berangkat</label>
                            <input type="text" class="form-control" name="tanggal" value="{{$data->tanggal}}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" name="total" value="Rp {{$data->harga_total}}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="nama">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama" value="{{$data->pemesan->nama}}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="kontak">Kontak Pemesan</label>
                            <input type="text" class="form-control" name="kontak" value="{{$data->pemesan->nomor_handphone}}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="Email">Email Pemesan</label>
                            <input type="text" class="form-control" name="Email" value="{{$data->pemesan->email}}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name="status" value="{{$data->status}}" readonly>
                          </div>
                          @if($data->foto_pembayaran != null)
                            <div class="form-group">
                              <label for="foto">Bukti Pembayaran</label><br>
                              <img src="{{$data->foto_pembayaran}}" alt="foto pembayaran" width="100%">
                            </div>
                          @endif
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- Default box -->
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "ordering": false
    });
  });
  function deleteTransaksi(id){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = 'transaksi/delete/'+id;
      }
    });
  }
  
</script>
@endsection