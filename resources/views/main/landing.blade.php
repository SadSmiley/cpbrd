@extends("main.layout")
@section("content")
<!--<div class="landing">-->
<!--    <div class="row clearfix">-->
<!--        <div class="col-md-6 logo-landing">-->
<!--            <div class="clearfix"><img src="/assets/main/img/logo.png"></div>-->
<!--            <div class="clearfix sub-holder"><div class="sub">BILLS TRACKING SYSTEM</div></div>-->
<!--        </div>-->
<!--        <div class="col-md-6 input-landing">-->
<!--            <div class="search-bar">-->
<!--                <table>-->
<!--                    <tbody>-->
<!--                        <tr>-->
<!--                            <td><input class="form-control" type="text" name=""/></td>-->
<!--                            <td class="button"><button class="btn">SEARCH</button></td>-->
<!--                        </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--            <div class="button-holder">-->
<!--                <div class="holder">-->
<!--                    <button class="btn" onClick="location.href='/report/0'">INPUT/UPDATE DATA</button>-->
<!--                </div>-->
<!--                <div class="holder">-->
<!--                    <button class="btn" onClick="location.href='/measure'">VIEW BY MEASURES</button>-->
<!--                </div>-->
<!--                <div class="holder">-->
<!--                    <button class="btn" onClick="location.href='/agenda'">VIEW BY LEGISTATIVE AGENDA</button>-->
<!--                </div>-->
<!--                <div class="holder">-->
<!--                    <button class="btn" onClick="location.href='/proponent'">VIEW BY PROPONENTS</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="landing">
    <div class="row clearfix">
        <div class="col-md-7">
            <div class="top-label-title">MONITORING SYSTEM</div>
            <div class="label-title">MODIFY YOUR SEARCH</div>
            <div class="label-sub">*You are not required to fill up all, it only speeds up the query.</div>
            <form method="get" action="/search">
                <div class="form-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Keywords (Possible words/phrase in the title)">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="bill_number" placeholder="Bill Number">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="author_bill" placeholder="Author(s) of the Bill">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="committee_bill" placeholder="Committee handling the Bill (Choose one)">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="nature_measure" placeholder="Nature of the Measure (Choose one)">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="monitoring_group" placeholder="Monitoring Group (Choose one)">
                </div>
                <div class="button-holder">
                    <button class="btn">SEARCH</button>
                </div>
            </form>
        </div>
        <div class="col-md-5">
            <div class="logo">
                <img src="/assets/main/img/logo.png">
            </div>
            <div class="nav-holder clearfix">
                <div class="holder">
                    <a href="/report/0">HOME</a>
                </div>
                <div class="holder">
                    <a href="/proponent">VIEW SHORTLIST</a>
                </div>
                <div class="holder">
                    <a href="/measure">VIEW ALL MEASURES</a>
                </div>
                <div class="holder">
                    <a href="/agenda">VIEW BY SECTORS</a>
                </div>
            </div>
            <div class="button-holder text-center">
                <button class="btn">LOGIN</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/landing.css" type="text/css" />
@endsection