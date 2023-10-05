@extends('templates.layout')
@push('style')
@endpush

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>Selamat datang di halaman {{ $page }}!</h1>
@endsection

@push('script')
    <script></script>
@endpush
