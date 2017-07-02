@extends("main.layout")
@section("content")
<div class="landing">
    <div class="row clearfix">
        <div class="col-md-6 logo-landing">
            <div class="clearfix"><img src="/assets/main/img/logo.png"></div>
            <div class="clearfix sub-holder"><div class="sub">BILLS TRACKING SYSTEM</div></div>
        </div>
        <div class="col-md-6 input-landing">
            <form method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="search-bar">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 100%; padding-bottom: 15px;"><input placeholder="Email" style="width: 100%;" class="form-control" type="text" name=""/></td>
                            </tr>
                            <tr>
                                <td style="width: 100%; padding-bottom: 15px;"><input placeholder="Password" style="width: 100%;" class="form-control" type="text" name=""/></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="button"><button class="btn" type="submit">LOGIN</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="/assets/main/css/landing.css" type="text/css" />
@endsection