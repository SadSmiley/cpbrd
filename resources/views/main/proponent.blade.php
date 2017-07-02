@extends("main.layout")
@section("content")
<div class="text-center">
	<div class="proponent" style="display: inline-block; vertical-align: top; width: 510px; margin-right: 15px;">
	    <div class="proponent-title">CHOOSE ONE FILTER</div>
	    <div class="proponent-list">
	        @foreach($_proponent as $proponent)
	        <div class="holder">
	            <button class="btn" onClick="location.href='/proponent/view/{{ $proponent->id }}'">{{ $proponent->proponent_name }}</button>
	        </div>
	        @endforeach
	    </div>
	</div>
	<div class="proponent" style="display: inline-block; vertical-align: top; max-width: 200px;">
		<div class="proponent-title">DOWNLOAD OPTIONS</div>
		@foreach($_proponent as $proponent)
		<div class="holder" style="margin: 20px 0;">
			<div style="padding: 5px 0; font-size: 16px;"><a style="color: #000;" href="/print_proponent/{{ $proponent->id }}?type=shortlist">SHORTLIST</a> <span>|</span> <a style="color: #000;" href="/print_proponent/{{ $proponent->id }}?type=detailed">DETAILED</a></div>
		</div>	
		@endforeach
	</div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/proponent.css" type="text/css" />
@endsection