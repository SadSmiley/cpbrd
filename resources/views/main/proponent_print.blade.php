@if(Request::input("type") == "shortlist")
<html>
<head>
    <title></title>
    <style type="text/css">
     .header,
    .footer {
        width: 100%;
        text-align: center;
        position: fixed;
    }
    .header {
        top: 0px;
    }
    .footer {
        bottom: 0px;
    }
    .pagenum:before {
        content: counter(page);
    }
    body
    {
        font-family: "Arial", sans-serif;
    }
    a
    {
        text-decoration: none;
    }
    .proponent
    {
        max-width: 510px;
        margin: 0px auto;
    }
    .proponent-title
    {
        font-size: 18.37px;
        font-weight: 400;
        color: #000000;
        margin-bottom: 25px;
    }
    .view-proponent-title
    {
        font-size: 21.83px;
        color: #000000;
        font-weight: 700;
        text-align: center;
    }
    .proponent-list .holder
    {
        margin: 15px 0;
    }
    .proponent-list-view .holder
    {
        color: #2e5d90;
        margin: 25px 0;
    }
    .name
    {
        font-size: 18.61px;
        color: #000000;
    }
    .name a
    {
        color: #000000;
    }
    .sub
    {
        font-size: 30px;
    }
    .sub a
    {
        color: #2e5d90;
    }
    .view-proponent-list-view .holder
    {
        color: #2e5d90;
        margin: 25px 0;
    }
    .view-proponent-list-view .holder .name
    {
        font-size: 18.61px;
        color: #000000;
        
    }
    .view-proponent-list-view .holder .name a
    {
        color: #000;
    }
    .sub
    {
        color: #000000;
        font-size: 18.61px;
    }
    .sub a
    {
        color: #000000;
    }
    </style>
</head>
<body>
    <script type="text/php">
        if (isset($pdf))
        {
            $x = 520;
            $y = 757;
            $text = "PAGE {PAGE_NUM} of {PAGE_COUNT}";
            $font = $fontMetrics->get_font("Arial", "bold");
            $size = 10;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
    <div class="footer" style="font-size: 18.31px;">
        <div style="text-align: right; font-size: 12px; text-align: center;">Prepared by the <strong>CONGRESSIONAL POLICY AND BUDGET RESEARCH DEPARTMENT</strong></div>
    </div>
    <div class="proponent">
        <div class="view-proponent-title">{{ $proponent->proponent_name }}</div>
        <div class="view-proponent-list-view" style="margin-top: 25px;">
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
</body>
</html>
@else
<html>
<head>
    <title></title>
    <style type="text/css">
     .header,
    .footer {
        width: 100%;
        text-align: center;
        position: fixed;
    }
    .header {
        top: 0px;
    }
    .footer {
        bottom: 0px;
    }
    .pagenum:before {
        content: counter(page);
    }
    body
    {
        font-family: "Arial", sans-serif;
    }
    a
    {
        text-decoration: none;
    }
    .proponent
    {
        max-width: 510px;
        margin: 0px auto;
    }
    .proponent-title
    {
        font-size: 18.37px;
        font-weight: 400;
        color: #000000;
        margin-bottom: 25px;
    }
    .view-proponent-title
    {
        font-size: 21.83px;
        color: #000000;
        font-weight: 700;
        text-align: center;
    }
    .proponent-list .holder
    {
        margin: 15px 0;
    }
    .proponent-list-view .holder
    {
        color: #2e5d90;
        margin: 25px 0;
    }
    .name
    {
        font-size: 18.61px;
        color: #000000;
    }
    .name a
    {
        color: #000000;
    }
    .sub
    {
        font-size: 30px;
    }
    .sub a
    {
        color: #2e5d90;
    }
    .view-proponent-list-view .holder
    {
        color: #2e5d90;
        margin: 25px 0;
    }
    .view-proponent-list-view .holder .name
    {
        font-size: 18.61px;
        color: #000000;
        
    }
    .view-proponent-list-view .holder .name a
    {
        color: #000;
    }
    .sub
    {
        color: #000000;
        font-size: 18.61px;
    }
    .sub a
    {
        color: #000000;
    }
    </style>
</head>
<body>
    <script type="text/php">
        if (isset($pdf))
        {
            $x = 520;
            $y = 757;
            $text = "PAGE {PAGE_NUM} of {PAGE_COUNT}";
            $font = $fontMetrics->get_font("Arial", "bold");
            $size = 10;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
    <div class="footer" style="font-size: 18.31px;">
        <div style="text-align: right; font-size: 12px; text-align: center;">Prepared by the <strong>CONGRESSIONAL POLICY AND BUDGET RESEARCH DEPARTMENT</strong></div>
    </div>
    <div class="proponent">
        <div class="view-proponent-title">{{ $proponent->proponent_name }}</div>
        <div class="view-proponent-list-view" style="margin-top: 25px;">
            
        </div>
    </div>
</body>
</html>
@endif