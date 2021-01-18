@extends('landing_template.master')
@section('content')
<section class="content" style="margin-top:20px;margin-bottom:20px">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-10">
      <div>
        <div>
        <div class="form-group col-md-12 text-center">
                <h3>Pemesanan</h3>
            </div>
            <section class="section section-lg section-top-1" style="margin-top:100px">
                <div class="container offset-negative-1">
                <div class="box-categories cta-box-wrap">
                    <div class="box-categories-content">
                    <div class="row">
                          <div class="col-md-3 wow fadeInDown col-9" data-wow-delay=".2s" style="margin-top:20px">
                              <ul class="list-marked-2 box-categories-list">
                              <li><a href=""><img src="{{url($destinasi->foto)}}" class="img-cover" alt="" width="268" height="320"/></a>
                                  
                              </li>
                              </ul>
                                <br>
                          </div>
                          <div class="row col-md-9">
                              <div>
                                <h4>{{$destinasi->nama}}</h4>
                                <h5 style="color:green">Rp {{$destinasi->harga}}</h5>
                                <p class="product-big-text">{{$destinasi->deskripsi}}</p><br>
                              </div>
                          </div>
                    </div>
                    </div>
                    <div>
                        <form action="{{url('landing/pemesanan'.'/'.$destinasi->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" value="{{Auth::user()->nama}}" placeholder="Nama pemesan" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{Auth::user()->email}}" placeholder="Email pemesan" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor_handphone">Nomor Handphone</label>
                                <input type="number" value="{{Auth::user()->nomor_handphone}}" placeholder="Nomor Handphone" class="form-control" name="nomor_handphone" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" placeholder="Tanggal Wisata" class="form-control" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="">Total Biaya</label>
                                <input type="text" value="Rp {{$destinasi->harga}}" class="form-control" required readonly>
                            </div>
                            <input type="hidden" value="destinasi" name="type">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn md">Pesan </button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </section>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>
    </div>
    <!-- /.col -->
    <div class="col-md-1"></div>
  </div>
  <!-- /.row -->
</section>
@endsection
@section('script')
<script>
  
  
</script>
@endsection