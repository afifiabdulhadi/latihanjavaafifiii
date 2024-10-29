@extends('template')
@section('konten')

<div class="container">
    <h4>Daftar User</h4>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">    
  <!-- Tombol untuk membuka modal create user -->
  <button type="button" class="btn btn-md btn-success mb-3" data-toggle="modal" data-target="#createUserModal">
            Tambah User
        </button>
        <table class="table table-bordered">
            <tr>
                <td>No</td>
                <td>Nama Lengkap</td>
                <td>Username</td>
                <td>Status</td>
                <td>action</td>
            </tr>
            @php
            $no=1;
            @endphp

            @forelse($datauser as $user)
            <tr>
                <td>{{ $user->id}}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->status}}</td>
                <td>
                        <!-- Tombol untuk membuka modal edit user -->
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUserModal-{{ $user->id }}">
                            Edit
                        </button>
                        <!-- Action button for delete could go here -->

                    <!-- Delete Button -->
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                </td>
            </tr>
            @empty
            Data User Belum Ada
            @endforelse
        </table>
        

    </div>

</div>

<!-- Modal Create User -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namalengkap">Nama Lengkap User</label>
                        <input type="text" name="namalengkap" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="email" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="admin">admin</option>
                            <option value="transaksi">transaksi</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit User -->
@foreach($datauser as $user)
<div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" name="namalengkap" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="admin" {{ $user->status == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="transaksi" {{ $user->status == 'transaksi' ? 'selected' : '' }}>Transaksi</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


<style>
    /* CSS untuk efek 3D pada tabel */
.table-container {
    perspective: 1500px;
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    transform-style: preserve-3d;
    transition: transform 0.5s ease;
}

.table thead {
    background-color: #007bff;
    color: white;
}

.table thead th {
    padding: 15px;
    text-align: left;
    font-family: 'Arial', sans-serif; /* Atur font untuk header tabel */
}

.table tbody tr {
    transition: transform 0.3s;
}

.table tbody tr:hover {
    transform: rotateX(5deg) rotateY(-5deg);
}

.table tbody td {
    padding: 15px;
    border: 1px solid #ddd;
    background: rgba(255, 255, 255, 0.9);
    font-family: 'Arial', sans-serif; /* Atur font untuk sel tabel */
}

/* Styling untuk warna header tabel */
.header-background-blue {
    background-color: #007bff; /* Warna latar belakang */
    color: #ffffff; /* Warna teks */
    font-family: 'Arial', sans-serif; /* Atur font untuk header tabel */
}

.header-background-red {
    background-color: #ff0000; /* Warna latar belakang */
    color: #ffffff; /* Warna teks */
    font-family: 'Arial', sans-serif; /* Atur font untuk header tabel */
}

/* Font untuk seluruh halaman */
body {
    font-family: 'Arial', sans-serif; /* Atur font untuk seluruh halaman */
}

/* Font untuk modal */
.modal-content {
    font-family: 'Arial', sans-serif; /* Atur font untuk konten modal */
}

</style>


<!-- Color Picker -->
<label for="colorPicker">Pilih Warna:</label>
<input type="color" id="colorPicker" name="colorPicker" value="#ffffff">

<!-- Button to Apply Color -->
<button id="applyColor" class="btn btn-secondary mb-3">Terapkan Warna</button>

<script>
    document.getElementById('applyColor').onclick = function() {
        var selectedColor = document.getElementById('colorPicker').value;
        var rows = document.querySelectorAll('table tbody tr');
        
        rows.forEach(function(row) {
            row.style.backgroundColor = selectedColor;
        });
    };
</script>

<style>
    .header-background-blue {
        background-color: #007bff; /* Warna latar belakang */
        color: #ffffff; /* Warna teks */
    }

    
</style>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




@endsection