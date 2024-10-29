@extends('template')

@section('judul_halaman', 'Data Spesifikasi')

@section('konten')

<!-- Button to Open Input Modal -->
<button id="openInputmyModal" class="btn btn-primary mb-3">Input Data Spesifikasi</button>

<!-- Button to Generate PDF -->
<a href="{{ route('spesifikasi.pdf') }}" class="btn btn-secondary mb-3">Cetak PDF</a>

<!-- Input Modal -->
<div id="inputmyModal" class="modal-overlay " style="display: none;">
    <div class="modal-content">
        <span id="closeInputmyModal" class="close-btn">&times;</span>
        <h2>Form Input Spesifikasi</h2>
        <form name="form1" id="inputForm" action="{{ route('spesifikasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">BRAND</label>
                <input type="text" id="inputBrand" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" onblur="ta()" onfocus="window.status='silahkan mengisi nama anda';">
                @error('brand')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">MODEL</label>
                <input type="text" id="inputModel" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" placeholder="Masukkan model">
                @error('model')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">RAM</label>
                <input type="text" id="inputRam" class="form-control @error('ram') is-invalid @enderror" name="ram" value="{{ old('ram') }}" placeholder="Masukkan RAM">
                @error('ram')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">PROCESSOR</label>
                <input type="text" id="inputProcessor" class="form-control @error('processor') is-invalid @enderror" name="processor" value="{{ old('processor') }}" placeholder="Masukkan processor">
                @error('processor')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">PX KAMERA</label>
                <input type="text" id="inputPixelkamera" class="form-control @error('pixelkamera') is-invalid @enderror" name="pixelkamera" value="{{ old('pixelkamera') }}" placeholder="Masukkan pixelkamera">
                @error('pixelkamera')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <select name="transaksi_id" class="form-control" required>
                @foreach($transaksis as $transaksi)
                    <option value="{{ $transaksi->id }}">{{ $transaksi->total }} {{ $transaksi->type }}</option>
                @endforeach
            </select>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <button type="submit" class="btn btn-primary" onclick="return validateInputForm()">Simpan</button>
            <button type="button" class="btn btn-secondary" id="closeInputModalBtn">Batal</button>
        </form>
    </div>
</div>

<!-- Table to Display Data -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">BRAND</th>
            <th scope="col">MODEL</th>
            <th scope="col">RAM</th>
            <th scope="col">PROCESSOR</th>
            <th scope="col">PX KAMERA</th>
            <th scope="col">HARGA/TOTAL</th>
            <th scope="col">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($spesifikasis as $spesifikasi)
        <tr>
            <td>{{ $spesifikasi->id }}</td>
            <td>{{ $spesifikasi->brand }}</td>
            <td>{{ $spesifikasi->model }}</td>
            <td>{{ $spesifikasi->ram }}</td>
            <td>{{ $spesifikasi->processor }}</td>
            <td>{{ $spesifikasi->pixelkamera }}</td>
            <td>{{ $spesifikasi->transaksi ? $spesifikasi->transaksi->total : 'No Transaction' }}</td>
            <td>m
                <!-- Button to Open Edit Modal -->
                <button type="button" class="btn btn-primary btn-sm" data-id="{{ $spesifikasi->id }}" data-brand="{{ $spesifikasi->brand }}" data-model="{{ $spesifikasi->model }}" data-ram="{{ $spesifikasi->ram }}" data-processor="{{ $spesifikasi->processor }}" data-pixelkamera="{{ $spesifikasi->pixelkamera }}" onclick="openEditModal(this)">Edit</button>
                <!-- Form for Deleting -->
                <form action="{{ route('spesifikasi.destroy', $spesifikasi->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Data tidak tersedia.</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $spesifikasis->links() }}

<!-- Edit Modal -->
<div id="editmyModal" class="modal-overlay" style="display: none;">
    <div class="modal-content">
        <span id="closeEditmyModal" class="close-btn">&times;</span>
        <h2>Form Edit Spesifikasi</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId" name="id">
            <div class="form-group">
                <label class="font-weight-bold">BRAND</label>
                <input type="text" id="editBrand" class="form-control @error('brand') is-invalid @enderror" name="brand">
                @error('brand')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">MODEL</label>
                <input type="text" id="editModel" class="form-control @error('model') is-invalid @enderror" name="model">
                @error('model')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">RAM</label>
                <input type="text" id="editRam" class="form-control @error('ram') is-invalid @enderror" name="ram">
                @error('ram')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">PROCESSOR</label>
                <input type="text" id="editProcessor" class="form-control @error('processor') is-invalid @enderror" name="processor">
                @error('processor')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">PX KAMERA</label>
                <input type="text" id="editPixelkamera" class="form-control @error('pixelkamera') is-invalid @enderror" name="pixelkamera">
                @error('pixelkamera')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <select name="transaksi_id" class="form-control" required>
                @foreach($transaksis as $transaksi)
                    <option value="{{ $transaksi->id }}">{{ $transaksi->total }} {{ $transaksi->type }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" id="closeEditModalBtn">Batal</button>
        </form>       
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // Fungsi untuk membuka modal input
    document.getElementById('openInputmyModal').onclick = function() {
        document.getElementById('inputmyModal').style.display = 'flex';
    };

    // Menutup modal input dengan tombol close
    document.getElementById('closeInputmyModal').onclick = function() {
        document.getElementById('inputmyModal').style.display = 'none';
    };

    // Menutup modal input dengan tombol batal
    document.getElementById('closeInputModalBtn').onclick = function() {
        document.getElementById('inputmyModal').style.display = 'none';
    };

    // Menutup modal jika klik di luar modal
    window.onclick = function(event) {
        if (event.target.classList.contains('modal-overlay')) {
            event.target.style.display = 'none';
        }
    };

    // Fungsi untuk membuka modal edit
    function openEditModal(button) {
        const id = button.getAttribute('data-id');
        const brand = button.getAttribute('data-brand');
        const model = button.getAttribute('data-model');
        const ram = button.getAttribute('data-ram');
        const processor = button.getAttribute('data-processor');
        const pixelkamera = button.getAttribute('data-pixelkamera');

        // Set action URL untuk form
        const editForm = document.getElementById('editForm');
        editForm.action = `/spesifikasi/${id}`;

        // Isi nilai form dengan data spesifikasi
        document.getElementById('editId').value = id;
        document.getElementById('editBrand').value = brand;
        document.getElementById('editModel').value = model;
        document.getElementById('editRam').value = ram;
        document.getElementById('editProcessor').value = processor;
        document.getElementById('editPixelkamera').value = pixelkamera;

        // Tampilkan modal
        document.getElementById('editmyModal').style.display = 'flex';
    }

    // Menutup modal edit dengan tombol close
    document.getElementById('closeEditmyModal').onclick = function() {
        document.getElementById('editmyModal').style.display = 'none';
    };

    // Menutup modal edit dengan tombol batal
    document.getElementById('closeEditModalBtn').onclick = function() {
        document.getElementById('editmyModal').style.display = 'none';
    };

    // Menutup modal jika klik di luar modal
    window.onclick = function(event) {
        if (event.target.classList.contains('modal-overlay')) {
            event.target.style.display = 'none';
        }
    };

    // Fungsi untuk mencetak tabel data
    document.getElementById('printData').onclick = function() {
        var printWindow = window.open('', '', 'height=600,width=800');
        var content = document.querySelector('table').outerHTML;
        printWindow.document.write('<html><head><title>Print Data</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    };
</script>

<style>
    /* CSS untuk modal overlay */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center; /* Vertikal Center */
        justify-content: center; /* Horizontal Center */
        z-index: 1000;
    }

    /* CSS untuk konten modal */
    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 5px;
        width: 90%;
        max-width: 500px;
        position: relative;
    }

    /* CSS untuk tombol close */
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    /* CSS untuk table header color */
    .table thead th {
        background-color: #007bff;
        color: white;
    }
</style>

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

<!-- Color Picker for Header -->
<label for="headerColorPicker">Pilih Warna Header:</label>
<input type="color" id="headerColorPicker" name="headerColorPicker" value="#007bff">

<!-- Button to Apply Color to Header -->
<button id="applyHeaderColor" class="btn btn-secondary mb-3">Terapkan Warna Header</button>

<script>
    document.getElementById('applyHeaderColor').onclick = function() {
        var selectedColor = document.getElementById('headerColorPicker').value;
        var headers = document.querySelectorAll('table th');

        headers.forEach(function(header) {
            header.style.backgroundColor = selectedColor;
            header.style.color = '#ffffff'; // Set color of text to white for contrast
        });
    };
</script>




@endsection
