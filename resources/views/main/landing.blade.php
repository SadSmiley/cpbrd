@extends("main.layout")
@section("content")
<div class="landing">
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
            <button class="btn">VIEW BY MEASURES</button>
        </div>
        <div class="holder">
            <button class="btn">VIEW BY LEGISTATIVE AGENDA</button>
        </div>
        <div class="holder">
            <button class="btn" onClick="location.href='/proponent'">VIEW BY PROPONENTS</button>
        </div>
    </div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/landing.css" type="text/css" />
@endsection