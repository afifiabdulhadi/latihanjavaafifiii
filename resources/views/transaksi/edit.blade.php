@extends('template')

@section('konten')
<div class="container">
    <h1>Daftar Transaksi</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pembeli</th>
                <th>Merek HP</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->tanggal }}</td>
                <td>{{ $transaksi->namapembeli }}</td>
                <td>{{ $transaksi->merekhp }}</td>
                <td>{{ $transaksi->jumlah }}</td>
                <td>{{ $transaksi->total }}</td>
                <td>
                    <button class="btn btn-primary edit-btn" data-id="{{ $transaksi->id }}" data-tanggal="{{ $transaksi->tanggal }}" data-namapembeli="{{ $transaksi->namapembeli }}" data-merekhp="{{ $transaksi->merekhp }}" data-jumlah="{{ $transaksi->jumlah }}" data-total="{{ $transaksi->total }}">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for Edit -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="namapembeli">Nama Pembeli</label>
                        <input type="text" class="form-control" id="namapembeli" name="namapembeli">
                    </div>
                    <div class="form-group">
                        <label for="merekhp">Merek HP</label>
                        <input type="text" class="form-control" id="merekhp" name="merekhp">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" id="total" name="total">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('.edit-btn').on('click', function() {
        // Get data from button attributes
        var id = $(this).data('id');
        var tanggal = $(this).data('tanggal');
        var namapembeli = $(this).data('namapembeli');
        var merekhp = $(this).data('merekhp');
        var jumlah = $(this).data('jumlah');
        var total = $(this).data('total');
        
        // Set form action to the update route
        $('#editForm').attr('action', '/transaksi/' + id);
        
        // Populate modal form fields
        $('#tanggal').val(tanggal);
        $('#namapembeli').val(namapembeli);
        $('#merekhp').val(merekhp);
        $('#jumlah').val(jumlah);
        $('#total').val(total);
        
        // Show the modal
        $('#editModal').modal('show');
    });
});
</script>
@endsection
