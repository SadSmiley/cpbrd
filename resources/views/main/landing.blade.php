@extends("main.layout")
@section("content")
<div class="landing">
    <div class="row clearfix">
        <div class="col-md-6 logo-landing">
            <div class="clearfix"><img src="/assets/main/img/logo.png"></div>
            <div class="clearfix sub-holder"><div class="sub">BILLS TRACKING SYSTEM</div></div>
        </div>
        <div class="col-md-6 input-landing">
            <div class="search-bar">
                <table>
                    <tbody>
                        <tr>
                            <td><input class="form-control" type="text" name=""/></td>
                            <td class="button"><button class="btn">SEARCH</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="button-holder">
                <div class="holder">
                    <button class="btn" onClick="location.href='/report/0'">INPUT/UPDATE DATA</button>
                </div>
                <div class="holder">
                    <button class="btn" onClick="location.href='/measure'">VIEW BY MEASURES</button>
                </div>
                <div class="holder">
                    <button class="btn" onClick="location.href='/agenda'">VIEW BY LEGISTATIVE AGENDA</button>
                </div>
                <div class="holder">
                    <button class="btn" onClick="location.href='/proponent'">VIEW BY PROPONENTS</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/landing.css" type="text/css" />
@endsection