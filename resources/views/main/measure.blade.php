@extends("main.layout")
@section("content")
<div class="proponent">
    <div class="view-proponent-title">MEASURES</div>
    <div class="proponent-list-view">
        <ol class="holder">
            @foreach($_agenda as $key => $agenda)
                @foreach($agenda as $measures)
                <li class="name"><a href="/report/{{ $measures->report_id }}">{{ $measures->report_measures }}</a></li>
                @endforeach
            @endforeach
        </ol>
    </div>
    <div class="list-nav">
        <button class="btn" type="button" onClick="location.href='/'">GO BACK TO LIST</button>
    </div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/proponent.css" type="text/css" />
@endsection