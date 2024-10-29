@extends('template')
@section('konten')

<div class="container">
    <div class="row">
    <form action="{{ route('user.store') }}" method="post">
        @csrf

            <div class="form-group">
                <label for="">nama lengkap User</label>
                <input type="text" name="namalengkap" id="">
            </div>
            <div class="form-group">
                <label for="">username</label>
                <input type="email" name="username" id="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="">
            </div>
            <div class="form-group">
                <label for="" >Status</label>
                <select type="text" name="status" id="">
                    <option value="admin">admin</option>
                    <option value="transaksi">transaksi</option>
                    
                </select>
            </div>
            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            <button type="reset" class="btn btn-md btn-warning">RESET</button>
        </form>
    </div>
</div>





@endsection