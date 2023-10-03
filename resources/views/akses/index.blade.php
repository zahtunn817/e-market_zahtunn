@extends('templates.layout')

@push('style')
@endpush

@section('content')
    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>Level</td>
                <td>Role</td>
                <td>Akses</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($akses as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->hak_akses }}</td>
                    <td>{{ $a->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@push('script')
@endpush
