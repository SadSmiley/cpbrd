@extends("main.layout")
@section("content")
<div class="proponent">
    <div class="view-proponent-title">LEGISTATIVE AGENDA</div>
    <div class="proponent-title" style="margin-top: 30px; margin-bottom: 0;">MEASURES</div>
    <div class="proponent-list-view" style="margin-bottom: 0;">
        <ul class="holder" style="margin-top: 0;">
            @foreach($_agenda as $key => $agenda)
                @foreach($agenda as $measures)
                <li class="name"><a href="/report/{{ $measures->report_id }}">{{ $measures->report_measures }}</a></li>
                @endforeach
            @endforeach
        </ul>
    </div>
    <div class="list-nav">
        <button class="btn" type="button" onClick="location.href='{{ URL::previous() }}'">GO BACK TO LIST</button>
    </div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/proponent.css" type="text/css" />
@endsection