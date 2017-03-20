@extends("main.layout")
@section("content")
<div class="report">
    <form method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row clearfix">
            <div class="col-md-6">
                <div class="form-group">
                    <label>LEGISTATIVE AGENDA</label>
                    <input value="{{ isset($report) ? $report->report_legistative_agenda : '' }}" class="form-control" type="text" name="report_legistative_agenda" {{ isset($report) ? 'readonly' : '' }}/>
                </div>
                <div class="form-group">
                    <label>MEASURES</label>
                    <input value="{{ isset($report) ? $report->report_measures : '' }}" class="form-control" type="text" name="report_measures" {{ isset($report) ? 'readonly' : '' }}/>
                </div>
                <div class="form-group">
                    <label>RELATED HOUSE BILL(S) and AUTHOR(S)</label>
                    <textarea class="form-control notes" name="report_author_related_house_bill" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_author_related_house_bill : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>SALIENT FEATURES</label>
                    <textarea class="form-control notes" name="report_salient_related_house_bill" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_salient_related_house_bill : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>OBJECTIVE / SIGNIFICANCE</label>
                    <textarea class="form-control notes" name="report_significance_related_house_bill" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_significance_related_house_bill : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>STATUS</label>
                    <textarea class="form-control status" name="report_status_related_house_bill" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_status_related_house_bill : '' }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="{{ isset($report) ? 'opacity: 0;' : '' }}">
                    <div class="proponent-label">SELECT UNDER WHICH PROPONENTS THEY BELONG TO</div>
                    <div class="proponent-holder">
                        @foreach($_proponent as $proponent)
                        <div class="holder">
                            <div class="p-label">{{ $proponent->proponent_name }}</div>
                            <div class="p-checkbox">
                                <input type="checkbox" value="{{ $proponent->proponent_id }}" name="proponent[]" id="proponent_{{ $proponent->proponent_id }}" class="css-checkbox" /><label for="proponent_{{ $proponent->proponent_id }}" class="css-label radGroup1"></label>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label>RELATED SENATE BILL(S) and AUTHOR(S)</label>
                    <textarea class="form-control notes" name="report_author_related_senate_bill" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_author_related_senate_bill : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>SALIENT FEATURES</label>
                    <textarea class="form-control notes" name="report_salient_related_senate_bill" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_salient_related_senate_bill : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>OBJECTIVE / SIGNIFICANCE</label>
                    <textarea class="form-control notes" name="report_significance_related_senate_bill" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_significance_related_senate_bill : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>STATUS</label>
                    <textarea class="form-control status" name="report_status_related_senate_bill" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_status_related_senate_bill : '' }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>NOTES</label>
                    <textarea class="form-control notes" name="report_notes" {{ isset($report) ? 'readonly' : '' }}>{{ isset($report) ? $report->report_notes : '' }}</textarea>
                </div>
                @if(!isset($report))
                <div class="save">
                    <button type="submit" class="btn">SAVE</button>
                </div>
                @endif
            </div>
            @if(isset($report))
            <div class="col-md-12 report-view">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="proponent-container">
                            <div class="row clearfix">
                                @foreach($_proponent as $proponent)
                                <div class="col-md-6">
                                    <div class="holder">
                                        <div class="p-checkbox">
                                            <input disabled {{ $proponent->checked == true ? "checked" : "" }} type="checkbox" value="{{ $proponent->proponent_id }}" name="proponent[]" id="proponent_{{ $proponent->proponent_id }}" class="css-checkbox" /><label for="proponent_{{ $proponent->proponent_id }}" class="css-label radGroup1">{{ $proponent->proponent_name }}</label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="button-holder"><button type="button" class="btn">PRINT</button></div>
                        <div class="button-holder"><button type="button" class="btn">NEXT</button></div>
                        <div class="button-holder"><button type="button" class="btn" onClick="location.href='{{ URL::previous() }}'">BACK</button></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </form>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/report.css" type="text/css" />
@endsection