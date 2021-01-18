@extends('admin_template.master')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
        <div class="form-group col-md-12 text-center">
                <h4>Daftar Paket</h4>
            </div>
            <hr>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group col-md-12">
                <a href="{{url('paket/create')}}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Paket
                </a>
            </div>
          <table id="datatable"style="width:100%" class="table table-striped table-bordered">
            <thead>
              <tr class="headings">
                <th class="text-center"><b>Id</b></th>
                <th class="text-center"><b>Nama Destinasi</b></th>
                <th class="text-center"><b>Deskripsi</b></th>
                <th class="text-center"><b>Harga</b></th>
                <th class="text-center"><b>Gambar</b></th>
                <th class="text-center"><b>Action</b></th>
              </tr>
            </thead>
            <tbody class="text-center">
                @foreach($paket as $key=>$data)
                  <tr>
                    <td>{{$key}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->deskripsi}}</td>
                    <td>Rp {{$data->harga}}</td>
                    <td><img src="{{$data->foto}}" height="100px" width="100px" alt="ini foto destinasi"></td>
                    <td>
                      <a href="{{url('paket/edit').'/'.$data->id}}" class="btn btn-sm btn-warning">Edit <i class="fas fa-pencil-alt"></i></a>
                      <button onclick="deletePaket({{$data->id}})" class="btn btn-sm btn-danger">Delete <i class="fas fa-trash"></i></button>
                    </td>
                  </tr>
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
    $('#datatable').dataTable({
      "ordering": false
    });
  });
  function deletePaket(id){
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
        window.location = 'paket/delete/'+id;
      }
    });
  }
</script>
@endsection