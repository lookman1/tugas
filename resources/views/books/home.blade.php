@extends('layouts.main-layouts')
@section('container')
    @if (session('success'))
        <div class="alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="jumbotron">
        <div class="card">
            <div class="card-header card-title">
                <h4><center>Daftar Buku</center></h4>
            </div>
            <div class="card-body">
               
                <a href=" {{ url('/books/create') }} " class="btn btn-secondary">Tambah Data</a>
                <br><br><br>
                <table class=" table table-secondary table-bordered">
                    <thead class=" table-secondary text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Author</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (isset($books) ? $books : [] as $item)
                            <tr>
                                <th> {{ $loop->iteration }} </th>
                                <td> {{ $item->judul }} </td>
                                <td> {{ $item->author }} </td>
                                <td> {{ $item->penerbit }} </td>
                                <td> {{ $item->sinopsis }} </td>
                                <td class="text-center">
                                    <a href="{{ url('/books/' . $item->id) }}" class="btn btn-secondary badge rounded-pill"
                                        style="width: 80px; height: 25px;">VIEW</a>
                                    <a href="{{ url('/books/' . $item->id . '/edit') }}"
                                        class="btn btn-secondary badge rounded-pill"
                                        style="width: 80px; height: 25px;">EDIT</a>
                                    <form action="{{ url('/books' . '/' . $item->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-secondary badge rounded-pill"
                                            style="width: 80px; height: 25px;" type="submit" onclick="return confirm(&quot;Yakin Dihapus?&quot;)">DELETE</button>
                                    </form>
                                    {{-- <a href="{{ url() }}" class="btn btn-secondary badge rounded-pill"
                                        style="width: 80px; height: 25px;">DELETE</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
