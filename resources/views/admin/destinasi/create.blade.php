@extends('admin_template.master')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
        <div class="form-group col-md-12">
                <h4>Create Destinasi</h4>
            </div>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{url('/destinasi/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Nama Destinasi</label>
                        <input type="text" name="nama" placeholder="Nama destinasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi"  rows="10" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" placeholder="harga destinasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Gambar</label>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="customFile">
                        <label class="custom-file-label" for="customFile">Tambahkan gambar</label>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-md btn-success">Tambahkan <i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </form>
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
<script type="text/javascript">
    $('.custom-file-input').on('change', function() { 
        let fileName = $(this).val().split('\\').pop(); 
        $(this).next('.custom-file-label').addClass("selected").html(fileName); 
    });
</script>
@endsection