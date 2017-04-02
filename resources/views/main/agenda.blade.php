@extends("main.layout")
@section("content")
<div class="proponent">
    <div class="view-proponent-title">LEGISTATIVE AGENDA</div>
    <div class="proponent-list-view">
        <ol class="holder">
            @foreach($_agenda as $key => $agenda)
            <li class="name"><a href="/agenda/view/{{ $key }}">{{ $key }}</a></li>
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