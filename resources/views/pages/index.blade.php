{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" >
        <div class="col-lg-12 col-xxl-12">
            <div align="center">
                <img alt="Banner" src="{{ asset('storage/logoatux.png') }}" class="img-fluid"/>
            </div>
        </div>

    </div>



@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
