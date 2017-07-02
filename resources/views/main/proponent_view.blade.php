@extends("main.layout")
@section("content")
<div class="proponent">
    <div class="view-proponent-title">{{ $proponent->proponent_name }}</div>
    <div class="view-proponent-list-view">
        <?php $ctr = 0; ?>
        @foreach($_agenda as $key => $agenda)
        <?php $ctr++;  ?>
        <div class="holder">
            <div class="name"><a href="/agenda/view/{{ $key }}">{{ $ctr }}. {{ $key }}</a></div>
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