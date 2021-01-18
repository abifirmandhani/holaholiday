@extends('landing_template.master')
@section('content')
<section class="content" style="margin-top:20px;margin-bottom:20px">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-10">
      <div>
        <div>
        <div class="form-group col-md-12 text-center">
                <h3>Paket Destinasi</h3>
                <h5>Temukan destinasi wisata pilihan anda</h5>
            </div>
            <section class="section section-lg section-top-1" style="margin-top:100px">
                <div class="container offset-negative-1">
                <div class="box-categories cta-box-wrap">
                    <div class="box-categories-content">
                    <div class="row">
                          <div class="col-md-3 wow fadeInDown col-9" data-wow-delay=".2s" style="margin-top:20px">
                              <ul class="list-marked-2 box-categories-list">
                              <li><a href=""><img src="{{url($paket->foto)}}" class="img-cover" alt="" width="268" height="320"/></a>
                                  
                              </li>
                              </ul>
                                <br>
                              <a href="{{url('landing/pemesananPaket').'/'.$paket->id}}" class="btn btn-md btn-primary" style="width:100%">Booking <i class="fas fa-shopping-cart"></i></a>
                          </div>
                          <div class="row col-md-9">
                              <div>
                                <h4>{{$paket->nama}}</h4>
                                <h5 style="color:green">Rp {{$paket->harga}}</h5>
                                <p class="product-big-text">{{$paket->deskripsi}}</p><br>
                                <p class="product-big-text"><b>Tujuan Destinasi</b></p>
                                <ul>
                                    @foreach($paket->destinasi as $key=>$des)
                                        <li>{{($key+1).'. '.$des->nama}}</li>
                                    @endforeach
                                </ul>
                              </div>
                          </div>
                    </div>
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