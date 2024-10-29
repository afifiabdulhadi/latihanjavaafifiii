@extends('template')
@section('konten')

<div class="container">
    <h4>Edit User</h4>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->
        <div class="form-group">
            <label for="namalengkap">Nama Lengkap</label>
            <input type="text" name="namalengkap" id="" Value="{{($user->name)}}">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username"  id="" Value="{{($user->email)}}" >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="{{$user->status}}">{{ $user->status}}</option>
                <option value="admin">Admin</option>
                <option value="transaksi">Transaksi</option>
            </select>
        </div>
        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
        <a href="{{ route('user.index') }}" class="btn btn-md btn-secondary">CANCEL</a>
    </form>
</div>

@endsection
