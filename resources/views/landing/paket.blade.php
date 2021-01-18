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
                <h5>Temukan paket wisata pilihan anda</h5>
            </div>
            <section class="section section-lg section-top-1" style="margin-top:50px">
                <div class="container offset-negative-1">
                <div class="box-categories cta-box-wrap">
                    <div class="box-categories-content">
                    <div class="row">
                        @foreach($paket as $data)
                          <div class="col-md-3 wow fadeInDown col-9" data-wow-delay=".2s" style="margin-top:20px">
                              <ul class="list-marked-2 box-categories-list">
                              <li><a href="{{url('landing/paket').'/'.$data->id}}"><img src="{{url($data->foto)}}" class="img-cover" alt="" width="268" height="320"/></a>
                                  <h5 class="box-categories-title">{{$data->nama}}</h5>
                              </li>
                              </ul>
                          </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                </div>
            </section>
            
            {{ $paket->links() }}
        
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