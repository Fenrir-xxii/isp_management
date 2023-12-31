<!DOCTYPE html>
<html lang="en-us" dir="ltr"
	  class='com_content view-article itemid-347 _speedtest myspeed j34'>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>HTML5 Speedtest</title>

<link href="../assets/2ip-ua-speedtest/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/2ip-ua-speedtest/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="../assets/2ip-ua-speedtest/css/speedtest.css" rel="stylesheet">
<link href="../assets/2ip-ua-speedtest/css/font-awesome.min.css" rel="stylesheet">

<meta name="referrer" content="always" />
<!-- META FOR IOS & HANDHELD -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<style type="text/stylesheet">
		@-webkit-viewport   { width: device-width; }
		@-moz-viewport      { width: device-width; }
		@-ms-viewport       { width: device-width; }
		@-o-viewport        { width: device-width; }
		@viewport           { width: device-width; }
	</style>
	<script type="text/javascript">
		//<![CDATA[
		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
			var msViewportStyle = document.createElement("style");
			msViewportStyle.appendChild(
				document.createTextNode("@-ms-viewport{width:auto!important}")
			);
			document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
		}
		//]]>
	</script>
<meta name="HandheldFriendly" content="true"/>
<meta name="apple-mobile-web-app-capable" content="YES"/>
<!-- //META FOR IOS & HANDHELD -->
</head>

<body>

<section id="speedtest" class="speedtest section myspeed" style="overflow: hidden;">
<div class="jumbotron">
	<div class="container t3-mainbody">
		<div class="row">
			<div class="col-md-offset-2 col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div id="t3-content" class="t3-content">												
							<div class="item-page_speedtest clearfix">
								<div class="row">
									<div class="col-sm-7 col-xs-12" id="speedtest-area">
										<div class="border-1 shadow">
											<div class="border-2 wrapp">
												<div class="scale wrapp" id="scale"></div>
												<img src="img/indicator.png" id="speedo-arrow" class="speedo-arrow" style="transform: rotate(-48.5deg); transform-origin: 50% 50% 0px;">
												<div class="content wrapp">
													<div class="ready wrapp" id="ready">
														<button id="speedo-start" class="button" style="display: none;"><span>Тестировать</span></button>
														<i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="acl-indicator"></i>
													</div>
													<div class="realtime" id="tool-data" style="display:none;">
														<div id="tool-status"></div>
														<div id="tool-speed"></div>
														<div id="tool-metrics"></div>
													</div>
													<div class="text text-center">
														<img class="img-responsive img-logo" src="img/comp-logo.png">
													</div>
												</div>
											</div>
										</div>
										<div class="row" style="margin-top:22px;margin-bottom:-20px;">
											<div id="status-bar" class="col-xs-12 status-bar text-center">
												<div class="status" id="progress-bar"></div>             
											</div>
										</div>
									</div>
									<div class="col-sm-5 col-xs-12">
										<div class="row">
											<div class="col-xs-12">
												<div class="result-area">
													<div class="results" id="speedo-down">
														<div class="row">
															<div class="col-xs-4 header">
																<div class="row">
																	<div class="col-xs-3 faposs"><i class="fa fa-arrow-circle-down down-icon"></i></div>
																	<div class="col-xs-9">
																		<div>Download</div>
																		<div>Мбит/c</div>
																	</div>
																</div>
															</div>
															<div class="col-xs-8 text-right">
																<div class="row">
																	<div class="col-xs-7 data download"><span data-attr="avg">--</span></div>
																	<div class="col-xs-5 additionalres download">
																		<div style="white-space:nowrap"><span class="additionalres_name max">Max: </span><span class="additionalres_data" data-attr="max">--</span></div>
																		<div style="white-space:nowrap"><span class="additionalres_name min">Min: </span><span class="additionalres_data" data-attr="min">--</span></div>
																	</div>
																</div>
															</div>
															<div class="col-xs-12" id="chart-download" style="height:111px;"></div>
														</div>
													</div>
													<div class="results" id="speedo-up">
														<div class="row">
															<div class="col-xs-4 header">
																<div class="row">
																	<div class="col-xs-3 faposs"><i class="fa fa-arrow-circle-up up-icon"></i></div>
																	<div class="col-xs-9">
																		<div>Upload</div>
																		<div>Мбит/c</div>
																	</div>
																</div>
															</div>
															<div class="col-xs-8 text-right">
																<div class="row">
																	<div class="col-xs-7 data upload"><span data-attr="avg">--</span></div>
																	<div class="col-xs-5 additionalres upload">
																		<div style="white-space:nowrap"><span class="additionalres_name max">Max: </span><span class="additionalres_data" data-attr="max">--</span></div>
																		<div style="white-space:nowrap"><span class="additionalres_name min">Min: </span><span class="additionalres_data" data-attr="min">--</span></div>
																	</div>
																</div>
															</div>
															<div class="col-xs-12" id="chart-upload" style="height:111px;"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-12" id="info-area">
												<div class="element row">
													<div class="col-xs-1"><i class="fa fa-arrows-h fa-fw"></i></div>
													<div class="col-xs-5" style="border-right: 1px solid #cfd8dc;" id="speedo-ping"><span class="data">--</span> ms</div>
													<div class="col-xs-1"><i class="fa fa-globe fa-fw"></i></div>
													<div class="col-xs-4 ip-address"></div>
												</div>
												<div class="element row">
													<div class="col-xs-1"><i class="fa fa-desktop fa-fw"></i></div>
													<div class="col-xs-10 operation-system"></div>
												</div>
												<div class="element row">
													<div class="col-xs-1"><i class="fa fa-chrome fa-fw"></i></div>
													<div class="col-xs-10 browser-name"></div>
												</div>
												<div class="element row">
													<div class="col-xs-1"><i class="fa fa-map-o fa-fw"></i></div>
													<div class="col-xs-10 geo-location"></div>
												</div>
												<div class="element row">
													<div class="col-xs-1"><i class="fa fa-star fa-fw"></i></div>
													<div class="col-xs-10 provider-name"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
</section>

<script>
	var _SERVERS = {
		uaix:''
	},
	_DOWN_SERVER='',
	_BACKEND_SERVER='',
	_API_KEY = '',
	_API_LANG = 'en',
	_API_VER = 1,
	_CALLBACK = {
		'geoapi': function(info){
			//$.ajax({
            //    url: 'geo.php?' + decodeURIComponent($.param(info)),
            //});
		},
		'providerapi': function(info){
			//$.ajax({
            //    url: 'provider.php?' + decodeURIComponent($.param(info)),
            //});
		},
		'browser': function(info){
			//$.ajax({
            //    url: 'browser.php?' + decodeURIComponent($.param(info)),
            //});
		},
		'testresult': function(info){
			//$.ajax({
                //url: 'speed.php?' + decodeURIComponent($.param(info)),
            //});
		}
	},
	_PING = '',
	_SPEEDTEST_MBIT = 'Мбит/c',
	_SPEEDTEST_MS = 'мс',
	_SPEEDTEST_READY = 'Ready',
	_SPEEDTEST_DONE = 'Тест закончен';
</script>

<script data-main="../assets/2ip-ua-speedtest/js/main" src="../assets/2ip-ua-speedtest/js/require.js"></script>
</body>

</html>