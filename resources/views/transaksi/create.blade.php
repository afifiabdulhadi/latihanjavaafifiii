@extends('template')
@section('judul_halaman','')
@section('konten')
                        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="myModal" class="penghalang">
                            <div class="modal-content">
                                <span id="tutup">&times;</span>
                                <p>Form Input Transaksi</p>
                                <form action="" name="form1">
                                    <div class="form-group">
                                        <label>TANGGAL</label>
                                        <input type="date" name="tanggal" onblur="()" onfocus="window.status='silahkan mengisi brand anda';">
                                    </div>
                                    <div class="form-group">
                                        <label> NAMA PEMBELI</label>
                                        <input type="text" name="namapembeli" onblur="model()" onfocus="window,status='silahkan megisi model hp anada';">
                                    </div>
                                    <div class="form-group">
                                        <label>MEREK HP</label>
                                        <input type="text" name="merekhp"  onblur="ram()" onfocus="window,status='silahkan megisi ram anada';">
                                    </div>
                                    <div class="form-group">
                                        <label>JUMLAH</label>
                                        <input type="number" name="jumlah"  onblur="processor()" onfocus="window,status='silahkan megisi processor anada';">
                                    </div>
                                    <div class="form-group">
                                        <label>TOTAL</label>
                                        <input type="text" name="total"  onblur="pixelkamera()" onfocus="window,status='silahkan megisi pixelkamera anada';">
                                    </div>
                                
                                    
                                
                            
                            </div>    

                            
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</ button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection