@extends('template')
@section('judul_halaman','')
@section('konten')
<style>
    </style>
 <body style="background: pink">
<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('spesifikasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="myModal" class="penghalang">
                            <div class="modal-content">
                                <span id="tutup">&times;</span>
                                <p>Form Input spesifikasi</p>
                                <form action="" name="form1">
                                  
                                        <div class="form-group">
                                            <label>BRAND</label>
                                            <input type="text" name="brand" onblur="masukanbrand()" onfocus="window.status='silahkan mengisi brand anda';">
                                        </div>
                                        <div class="form-group">
                                            <label> MODEL</label>
                                            <input type="text" name="model" onblur="model()" onfocus="window,status='silahkan megisi model hp anada';">
                                        </div>
                                        <div class="form-group">
                                            <label>RAM</label>
                                            <input type="text" name="ram"  onblur="ram()" onfocus="window,status='silahkan megisi ram anada';">
                                        </div>
                                        <div class="form-group">
                                            <label>PROCESSOR</label>
                                            <input type="text" name="processor"  onblur="processor()" onfocus="window,status='silahkan megisi processor anada';">
                                        </div>
                                        <div class="form-group">
                                            <label>PIXEL KAMERA</label>
                                            <input type="text" name="pixelkamera"  onblur="pixelkamera()" onfocus="window,status='silahkan megisi pixelkamera anada';">
                                        </div>

                                       
                                    
                                
                                </form>
                            </div>    
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>

                                
                    </div>
                    <script src="{{ asset('js/scriptku.js') }}"></script>
                </div>
            </div>
        </div>
</div>


@endsection