@extends('template')
@section('konten')


<div class="container">

<div class="row">
    <table>
        @forelse($datafoto as $foto)
        <tr>
            <td>
        <img src="{{ ('/gambar/'.$foto->namefile) }}" class="rounded" style="width: 100px">
        </td>
        <td>
            {{$foto->ket}}
        </td>
        </tr>
        

        @empty
        @endforelse
    </table>
</div>
</div>

@endsection
