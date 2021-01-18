@extends('landing_template.master')
@section('content')
<section class="content" style="margin-top:20px;margin-bottom:10px">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-10">
      <div>
        <div>
        <div class="form-group col-md-12 text-center">
                <h3>Pembayaran</h3>
            </div>
            <section class="section section-lg section-top-1" style="margin-top:50px">
                <div class="container offset-negative-1">
                <div class="box-categories cta-box-wrap">
                    <div class="box-categories-content">
                        <div>
                            <label for=""><b>Total</b></label>
                            <h4 style="color:green">Rp {{$transaksi->harga_total}}</h4>
                        </div>
                        <br>
                        <div class="card">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <img src="https://gudeg.net/cni-content/uploads/modules/direktori/logo/atm_bca.jpg" width="100px" height="50px" alt="logo bank">
                                </div>
                                <div>
                                    <h5>Bank BCA</h5>
                                    <p style="margin-top:0px">Nomor rekening - 1728379172893</p>
                                    <p style="margin-top:0px">Atas Nama      - Hola Holiday</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <img src="https://cdn.ayobandung.com/upload/bank_image/medium/polda-maluku-terus-tangani-raibnya-duit-rp200-juta-di-bri.jpg" width="100px" height="50px" alt="logo bank">
                                </div>
                                <div>
                                    <h5>Bank BRI</h5>
                                    <p style="margin-top:0px">Nomor rekening - 87289349987</p>
                                    <p style="margin-top:0px">Atas Nama      - Hola Holiday</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <img src="https://logos-download.com/wp-content/uploads/2016/06/Bank_Mandiri_logo_white_bg.png" width="100px" height="50px" alt="logo bank">
                                </div>
                                <div>
                                    <h5>Bank Mandiri</h5>
                                    <p style="margin-top:0px">Nomor rekening - 972342892342</p>
                                    <p style="margin-top:0px">Atas Nama      - Hola Holiday</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <img src="https://cdn.ayobandung.com/upload/bank_image/medium/polisi-periksa-12-saksi-kasus-pembobolan-bni.jpg" width="100px" height="50px" alt="logo bank">
                                </div>
                                <div>
                                    <h5>Bank BNI</h5>
                                    <p style="margin-top:0px">Nomor rekening - 8792361237</p>
                                    <p style="margin-top:0px">Atas Nama      - Hola Holiday</p>
                                </div>
                            </div>
                        </div>
                        <form action="{{url('landing/pembayaran').'/'.$transaksi->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="foto"><b>Bukti Pembayaran</b></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Tambahkan bukti pembayaran</label>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-md btn-primary">Kirim bukti pembayaran <i class="fa fa-plus"></i></button>
                            </div>
                        </form>
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