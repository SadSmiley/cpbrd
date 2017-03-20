@extends("main.layout")
@section("content")
<div class="proponent">
    <div class="proponent-title">{{ $proponent->proponent_name }}</div>
    <div class="proponent-list-view">
        @foreach($_agenda as $key => $agenda)
        <div class="holder">
            <div class="name">{{ $key }}</div>
            <ul class="sub">
                @foreach($agenda as $measures)
                <li><a href="/report/{{ $measures->report_id }}">{{ $measures->report_measures }}</a></li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/proponent.css" type="text/css" />
@endsection