@extends("main.layout")
@section("content")
<div class="report">
    <form method="post" enctype="multipart/form-data">
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
            <div class="col-md-12">
                <h2 class="title text-center">ENTER DATA</h2>
                <div class="form-group">
                    <label>Title of the measure</label>
                    <input value="" class="form-control" type="text" name="title_measure">
                </div>
                <div class="form-group">
                    <label>Background</label>
                    <textarea name="background" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Charts/Tables/Graphs</label>
                    <input name="charts" type="file" name="">
                </div>
                <div class="form-group">
                    <label>Stakeholder</label>
                    <div class="opinion-holder">
                        <div class="holder">
                            <input style="margin-bottom: 15px;" value="" placeholder="Name" class="form-control" type="text" name="opinion[title][]">
                            <textarea name="opinion[content][]" placeholder="Opinion" class="form-control tinymce"></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" onClick="stakeholder_event();" class="sebu btn btn-primary" style="margin-top: 15px; display: inline-block;">ADD STAKEHOLDER AND OPINION</button>
                    </div>
                </div>
                <div class="form-group">
                    <label>Desired Features</label>
                    <textarea name="brief_description" class="form-control" placeholder="Brief Description" style="margin-bottom: 25px;"></textarea>
                    <div class="features-holder">
                        <div class="holder">
                            <input style="margin-bottom: 15px;" name="features[name][]" value="" placeholder="Feature Name" class="form-control" type="text">
                            <textarea name="features[suggestion][]" placeholder="Suggestions" class="form-control tinymce"></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" onClick="features_event();" class="sebu btn btn-primary" style="margin-top: 15px; display: inline-block;">ADD FEATURES AND SUGGESTION</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Related Bills</label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="related-bill-container">
                                        <div class="holder">
                                            <input type="text" name="bill[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <button class="btn btn-primary" type="button" onClick="relatedbills_event();">ADD MORE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footnote">Type House Bills in the format HB'NUMBER' (ex. HB0001)*</div>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <textarea name="status" class="form-control"></textarea>
                </div>
                <div class="monitoring-container clearfix">
                    <h2>For Monitoring Group</h2>
                    <div class="form-group">
                        <label for="">Nature of Measure</label>
                        <select multiple class="chosen-select" name="nature_measure" data-placeholder="Add Sector (ex. Industry and Services, Competition, Fiscal, Infra)">
                            @foreach($_naturemeasure as $naturemeasure)
                            <option value="{{ $naturemeasure->id }}">{{ $naturemeasure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Committee Handling the Bill</label>
                        <select multiple class="chosen-select" name="committee_bill" data-placeholder="Add Name (ex. Ways and Means, Health, Legal, Finance)">
                            @foreach($_naturemeasure as $naturemeasure)
                            <option value="{{ $naturemeasure->id }}">{{ $naturemeasure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group proponent">
                        <label for="">Monitoring Group</label>
                        <div class="proponent-holder">
                            @foreach($_monitoring as $monitoring)
                            <div class="holder">
                                <div class="p-checkbox">
                                    <input type="checkbox" value="" name="monitoring[]" id="monitoring_{{ $monitoring->id }}" class="css-checkbox" />
                                    <label for="monitoring_{{ $monitoring->id }}" class="css-label radGroup1"></label>
                                </div>
                                <div class="p-label">{{ $monitoring->proponent_alias }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group proponent">
                        <label for="">Proponents of the Agenda</label>
                        <div class="proponent-holder">
                            @foreach($_proponent as $proponent)
                            <div class="holder">
                                <div class="p-checkbox">
                                    <input type="checkbox" value="" name="proponent[]" id="proponents_{{ $proponent->id }}" class="css-checkbox" />
                                    <label for="proponents_{{ $proponent->id }}" class="css-label radGroup1"></label>
                                </div>
                                <div class="p-label">{{ $proponent->proponent_alias }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary sebu" type="submit">SAVE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/report.css" type="text/css" />
<style type="text/css">
.mce-widget.mce-notification.mce-notification-warning.mce-has-close.mce-in
{
    display: none;
}
</style>
<link rel="stylesheet" href="/assets/main/css/chosen.css" type="text/css" />
@endsection
@section("script")
<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
<script src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>
<script>
$(document).ready(function()
{
    mceinit(); 
    event_multiple_select();
});
function event_multiple_select()
{
    $('.chosen-select').chosen();
}
function mceinit(selector = '.tinymce')
{
    console.log(selector);
    tinymce.init({ 
        selector: selector,
        branding: false,
        menubar: false,
        toolbar: "bold italic underline | bullist",
        plugins: "lists advlist"
    });
}
function stakeholder_event()
{
    tinymce.remove();
    $('.opinion-holder .holder').last().clone().appendTo('.opinion-holder');
    generate_id_opinion();
    mceinit();
}
function generate_id_opinion()
{
    $('.opinion-holder .holder textarea').each(function(e)
    {
        var generated = makeid();
        $(this).attr("id", generated);
        mceinit(selector = '#'+generated);
    });
}
function features_event()
{
    tinymce.remove();
    $('.features-holder .holder').last().clone().appendTo('.features-holder');
    generate_id_features();
    mceinit();
}
function generate_id_features()
{
    $('.features-holder .holder textarea').each(function(e)
    {
        var generated = makeid();
        $(this).attr("id", generated);
        mceinit(selector = '#'+generated);
    });
}
function relatedbills_event()
{
    $('.related-bill-container .holder').last().clone().appendTo('.related-bill-container');
}
function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
</script>
@endsection