<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="css/fly.css" />
<!-- <script type="text/javascript" src="http://libs.useso.com/js/jquery/1.7.2/jquery.min.js"></script> -->
<script type="text/javascript" src="js/fly.js">
</script>

</head>
<style type="text/css">
        #floatPanel .ctrolPanel {
            width: 36px;
            height: 166px;
            background: #fff url(panel_bg.gif) no-repeat left top;
            border: solid 1px #ddd;
            position: fixed;
            right: 25px;
            top: 300px;
            overflow: hidden;
            z-index: 10000;
            _position: absolute; /* for IE6 */
            _top: expression(documentElement.scrollTop + 300);
        }

        #floatPanel .ctrolPanel a {
            width: 34px;
            font-size: 12px;
            color: #ff6600;
            letter-spacing: 1px;
            text-align: center;
            overflow: hidden;
        }

        #floatPanel .ctrolPanel .arrow {
            height: 29px;
            line-height: 28px;
            display: block;
            margin: 1px auto;
        }

        #floatPanel .ctrolPanel .arrow span {
            display: none;
        }

        #floatPanel .ctrolPanel .arrow:hover {
            background: #f4f4f4;
        }

        #floatPanel .ctrolPanel .arrow:hover span {
            display: block;
        }

        #floatPanel .ctrolPanel .contact {
            height: 60px;
            display: block;
            margin: 2px auto;
        }

        #floatPanel .ctrolPanel .contact span {
            line-height: 90px;
        }

        #floatPanel .ctrolPanel .qrcode {
            height: 40px;
            display: block;
            margin: 2px auto;
        }

        #floatPanel .ctrolPanel .qrcode span {
            display: none;
        }

        .popPanel {
            width: 205px;
            height: 214px;
            position: fixed;
            right: 90px;
            top: 300px;
            z-index: 10000;
            overflow: hidden;
            display: none;
            _position: absolute; /* for IE6 */
            _top: expression(documentElement.scrollTop + 300);
        }

        .popPanel-inner {
            width: 205px;
            height: 220px;
            position: relative;
            overflow: hidden;
        }

        .arrowPanel {
            width: 10px;
            height: 210px;
            position: absolute;
            right: 1px;
            top: 102px;
        }

        .arrowPanel .arrow01 {
            width: 0;
            height: 0;
            font-size: 0;
            line-height: 0;
            border-top: 10px solid transparent;
            _border-top: 10px solid black;
            _filter: chroma(color=black);
            border-right: 10px solid transparent;
            _border-right: 10px solid black;
            _filter: chroma(color=black);
            border-bottom: 10px solid transparent;
            _border-bottom: 10px solid black;
            _filter: chroma(color=black);
            border-left: 10px solid #ddd;
            position: absolute;
            bottom: 0;
            position: absolute;
            left: 2px;
            top: 0;
        }

        .arrowPanel .arrow02 {
            width: 0;
            height: 0;
            font-size: 0;
            line-height: 0;
            border-top: 10px solid transparent;
            _border-top: 10px solid black;
            _filter: chroma(color=black);
            border-right: 10px solid transparent;
            _border-right: 10px solid black;
            _filter: chroma(color=black);
            border-bottom: 10px solid transparent;
            _border-bottom: 10px solid black;
            _filter: chroma(color=black);
            border-left: 10px solid #fff;
            position: absolute;
            bottom: 0;
            position: absolute;
            left: 0;
            top: 0;
        }

        .qrcodePanel {
            width: 194px;
            height: 212px;
            background: #fff;
            text-align: center;
            border: solid 1px #ddd;
            position: absolute;
            left: 0;
            top: 0;
            overflow: hidden;
        }

        .qrcodePanel img {
            width: 174px;
            height: 174px;
            border: none;
            padding: 5px 5px 0px 5px;
        }

        .qrcodePanel p {
            font-size: 12px;
            color: #666;
            line-height: 20px;
            letter-spacing: 1px;
        }
    </style>
<body>

<div id="floatPanel">
	<div class="ctrolPanel" style="right:20px;">
		<a class="arrow" href="index.php"><span>顶部</span></a>
		<a class="contact" href="http://user.qzone.qq.com/275006777/334"><span>反馈</span></a>
		<a class="qrcode" href="#"><span>二维码</span></a>
		<a class="arrow" href="#"><span>底部</span></a>
	</div>
	
	<div class="popPanel" style="right:66px;">
		<div class="popPanel-inner">
			<div class="qrcodePanel"><img src="fixedright/datang.jpg" alt="扫一扫" /><p>向我提问</p></div>
			<div class="arrowPanel">
				<div class="arrow01"></div>
				<div class="arrow02"></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
