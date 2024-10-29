@extends('template')

@section('judul_halaman', 'Transaksi')

@section('konten')
<button id="tombolTambah" class="btn btn-primary">Input Data Transaksi</button>

<!-- Tabel Transaksi -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Tanggal</th> 
            <th scope="col">Nama Pembeli</th>
            <th scope="col">Merek HP</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
            
            
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transaksis as $transaksi)
        <tr>
            <td>{{ $transaksi->tanggal }}</td>
            <td>{{ $transaksi->namapembeli }}</td>
            <td>{{ $transaksi->merekhp }}</td>
            <td>{{ $transaksi->jumlah }}</td>
            <td>{{ $transaksi->total }}</td>
            
            <td>
                <!-- Button to open Edit modal -->
                <button class="btn btn-warning btn-sm" 
                    data-toggle="modal" 
                    data-target="#editmyModal"
                    data-id="{{ $transaksi->id }}"
                    data-tanggal="{{ $transaksi->tanggal }}"
                    data-namapembeli="{{ $transaksi->namapembeli }}"
                    data-merekhp="{{ $transaksi->merekhp }}"
                    data-jumlah="{{ $transaksi->jumlah }}"
                    data-total="{{ $transaksi->total }}">
                    Edit
                </button>
                <!-- Button to delete transaction -->
                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Data Transaksi Belum Tersedia</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination Links -->
{{ $transaksis->links() }}

<!-- Modal Input Transaksi -->
<div class="modal fade" id="inputmyModal" tabindex="-1" role="dialog" aria-labelledby="inputmyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputmyModalLabel">Input Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputTanggal">Tanggal</label>
                        <input type="date" class="form-control" id="inputTanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="inputNamapembeli">Nama Pembeli</label>
                        <input type="text" class="form-control" id="inputNamapembeli" name="namapembeli" required>
                    </div>
                    <div class="form-group">
                        <label for="inputMerekhp">Merek HP</label>
                        <input type="text" class="form-control" id="inputMerekhp" name="merekhp" required>
                    </div>
                    <div class="form-group">
                        <label for="inputJumlah">Jumlah</label>
                        <input type="number" class="form-control" id="inputJumlah" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="inputTotal">Total</label>
                        <input type="text" class="form-control" id="inputTotal" name="total" required>
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

<!-- Modal Edit Transaksi -->
<div class="modal fade" id="editmyModal" tabindex="-1" role="dialog" aria-labelledby="editmyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmyModalLabel">Edit Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editTanggal">Tanggal</label>
                        <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="editNamapembeli">Nama Pembeli</label>
                        <input type="text" class="form-control" id="editNamapembeli" name="namapembeli" required>
                    </div>
                    <div class="form-group">
                        <label for="editMerekhp">Merek HP</label>
                        <input type="text" class="form-control" id="editMerekhp" name="merekhp" required>
                    </div>
                    <div class="form-group">
                        <label for="editJumlah">Jumlah</label>
                        <input type="number" class="form-control" id="editJumlah" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="editTotal">Total</label>
                        <input type="text" class="form-control" id="editTotal" name="total" required>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   






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

    .header-background-red {
        background-color: #ff0000; /* Warna latar belakang */
        color: #ffffff; /* Warna teks */
    }
</style>


<!-- Color Picker for Header -->
<label for="headerColorPicker" font-famly="Arial-black">Pilih Warna Header:</label>
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

<table class="table table-bordered">
   
</table>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Open and close modals
    document.getElementById('tombolTambah').onclick = function() {
        $('#inputmyModal').modal('show');
    };

    // Modal edit functionality
    $('#editmyModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var tanggal = button.data('tanggal');
        var namapembeli = button.data('namapembeli');
        var merekhp = button.data('merekhp');
        var jumlah = button.data('jumlah');
        var total = button.data('total');

        var modal = $(this);
        modal.find('#editForm').attr('action', '/transaksi/' + id);
        modal.find('#editTanggal').val(tanggal);
        modal.find('#editNamapembeli').val(namapembeli);
        modal.find('#editMerekhp').val(merekhp);
        modal.find('#editJumlah').val(jumlah);
        modal.find('#editTotal').val(total);
    });

    // Apply row color
    document.getElementById('applyColor').onclick = function() {
        var selectedColor = document.getElementById('colorPicker').value;
        document.querySelectorAll('table tbody tr').forEach(row => {
            row.style.backgroundColor = selectedColor;
        });
    };

    // Apply header color
    document.getElementById('applyHeaderColor').onclick = function() {
        var selectedColor = document.getElementById('headerColorPicker').value;
        document.querySelectorAll('table th').forEach(header => {
            header.style.backgroundColor = selectedColor;
            header.style.color = '#ffffff'; // Ensure contrast
        });
    };
});
</script>








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

<script>
    document.getElementById('purchaseForm').onsubmit = function(event) {
        // Mengambil nilai dari setiap field
        var dateField = document.getElementById('date');
        var buyerNameField = document.getElementById('buyerName');
        var brandField = document.getElementById('brand');
        var quantityField = document.getElementById('quantity');
        var totalField = document.getElementById('total');

        var dateValue = dateField.value.trim();
        var buyerNameValue = buyerNameField.value.trim();
        var brandValue = brandField.value.trim();
        var quantityValue = quantityField.value.trim();
        var totalValue = totalField.value.trim();

        // Mengumpulkan pesan kesalahan
        var errorMessage = '';
        if (dateValue === '') {
            errorMessage += 'Tanggal belum diisi!\n';
        }
        if (buyerNameValue === '') {
            errorMessage += 'Nama pembeli belum diisi!\n';
        }
        if (brandValue === '') {
            errorMessage += 'Merek HP belum diisi!\n';
        }
        if (quantityValue === '') {
            errorMessage += 'Jumlah belum diisi!\n';
        }
        if (totalValue === '') {
            errorMessage += 'Total belum diisi!\n';
        }

        // Menampilkan notifikasi jika ada kesalahan
        if (errorMessage !== '') {
            showNotification(errorMessage);
            event.preventDefault(); // Mencegah form untuk dikirim
            return false;
        }

        return true; // Form akan dikirim jika tidak ada kesalahan
    };

    function showNotification(message) {
        var notification = document.createElement('div');
        notification.className = 'notification';
        notification.innerHTML = message;
        document.body.appendChild(notification);

        // Menghapus notifikasi setelah beberapa detik
        setTimeout(function() {
            notification.remove();
        }, 5000);
    }
</script>


@endsection
