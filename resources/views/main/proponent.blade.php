@extends("main.layout")
@section("content")
<div class="proponent">
    <div class="proponent-title">SELECT ONE PROPONENT</div>
    <div class="proponent-list">
        @foreach($_proponent as $proponent)
        <div class="holder">
            <button class="btn" onClick="location.href='/proponent/view/{{ $proponent->proponent_id }}'">{{ $proponent->proponent_name }}</button>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/proponent.css" type="text/css" />
@endsection