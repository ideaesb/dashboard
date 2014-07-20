
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Gulf Of Maine Dashboard</title>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="stylesheet" type="text/css" href="css/tor.css" />
<link rel="stylesheet" type="text/css" href="css/start/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="css/start/jquery.ui.theme.css" />
<script type="text/javascript" src="highslide/highslide.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript">
  $(function() {
	  $(".question_mark").tooltip();
		
	  $("#toggle_panels").addClass("ui-accordion ui-widget ui-helper-reset")
		  .find("h3")
				.addClass("accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all")
				.hover(function() { $(this).toggleClass("ui-state-hover"); })
				.prepend('<span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>')
				.click(function() {
				  if(this.id != "section7") {
						$(this)
							.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
							.find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
							.next().toggleClass("ui-accordion-content-active").slideToggle();
						return false;
					} else {
					  window.open("pdf/")
					  return false;
					}
				})
				.next()
					.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
					.hide();			
					
	  $("#section1").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();

	  $("#section5").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();

	  $("#dashboard1").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();			

	  $("#dashboard1_1").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();		
								
		$('#image1').click(function(){
        $("#dialog1").dialog({ width: 600, height: 400 });
    });  													
  });	 
		
	hs.registerOverlay({
        html: '<div class="closebutton" onclick="return hs.close(this)" title="Close"></div>',
        position: 'top right',
        fade: 2 // fading the semi-transparent overlay looks bad in IE
  });

	 hs.graphicsDir = 'highslide/graphics/';
	 hs.showCredits = 0;
	 hs.align = 'center';
	 hs.dimmingOpacity = .75;
</script>
<style type="text/css">
<!--
.style4 {color: #FF0000}
-->
</style>
</head>
<body>
<div id="container"> 
<img src="images/header2.jpg" alt="" /><img src="images/sunset2.JPG" width="994" alt="" />
<nav>
<ul>
  <li class="firstslash">&nbsp;</li>
  <li class="fslash"><a href="/" title="Home">Home</a></li>
  <li class="fslash"><a href="http://www.neclimateus.org" title="Piko" target="_blank">'Nexus'</a></li>
  <!-- li class="noslash"><a href="#" title="Catalogs">Catalogs</a><ul>
      <li class="islash"><a href="http://www.pacificcis.org/scenarios/" target="_blank">Scenarios</a></li>
      <li class="islash"><a href="http://www.pacificcis.org/outlooks/" target="_blank">Outlooks</a></li>
      <li class="islash"><a href="http://www.pacificcis.org/climatologies/" target="_blank">Climatologies</a></li>
    </ul>
  </li>
  <li class="lastslash">&nbsp;</li -->
</ul>
</nav>
<div id="content"> 
<div id="note">
<p class="note-text">This web page provides a digital version of the quarterly <i>Gulf of Maine Region Climate Impacts and Outlook</i>, which offers a snapshot of recent weather events and anomalies; discusses regional weather impacts on the region’s ecosystems and economy; and provides a forecast for the coming three months. A regional &quot;climate dashboard&quot; links to a wide variety of sites offering real-time data tracking temperature, precipitation, drought, storms, sea surface variables and more.</p>
</div>
<div align="center">
<a name="current_outlook"></a>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="50%" valign="middle" class="title"><h1 align="center">Climate Impacts and Outlook</h1></td>
    <td width="50%" valign="middle" class="title"><h2 align="center">Northwest Atlantic Region<br />
      1<sup>st</sup> Quarter 2014</h2></td>
  </tr>  
</table>
</div>
<div id="toggle_panels">
  <h3 id="section1">Significant Events and Impacts for Previous Quarter by Locale</h3>
  <div id="panel1" align="center">
  <table width="900" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td valign="middle"><div id="image1" align="center"><img src="images/section1/Q12014/pic1.gif" width="700" height="400" /></div>
        </td>
      <td valign="middle"><p>Persistently higher than average mean sea-level continues to be observed across Federated States of Micronesia (FSM) and American Samoa. No significant impacts were noted.<br />
        Above normal rainfall prevailed over much of Palau and American Samoa.</p>
        </td>
    </tr>
    </table>
    </div>
    <h3 id="section2">Significant Events and Impacts for Previous Quarter by Sector</h3>
    <div id="panel2" align="center">
    <table width="900" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td valign="top"><p><em><strong>Water Resources �</strong></em> Due to the resurgence in abnormally dry conditions across the northern RMI, strong water conservation measures are urged, especially Wotje and Utirik, where rainfall has been less than half of normal.<br />
        <br />
            <em><strong>Facilities and Infrastructure �</strong></em> Extreme seasonal beach erosion occurred near Rocky Point, a coastal area of the north shore, Oahu, Hawaii in December 2013, threatening and undermining several beachfront homes. This event was triggered by large, long-period W to WNW swell event Dec. 20-22 that had much more westerly component than normal winter events causing severe erosion of the beach and dune fronting 6 to 7 homes. Erosion was compounded by a series of overlapping, large, long-period WNW to NW events Dec. 24-30 that added large wave run up and subsequent failure of shoreline armoring features along this stretch.<br />
        <br />
        <em><strong>Fishing �</strong></em> Waters off the northeast coast of Hawaii were overcome by a large algal bloom in December. In addition, a cold-core eddy appeared southwest of the Big Island of Hawaii, upwelling nutrient-rich food sources.<br />
        <br />
        <em><strong>Natural Resources �</strong></em> A coral reef bleaching watch is in effect for areas along and south of 5�N latitude between 140 and 165�E longitude. This includes the southern atolls of the FSM, however no significant bleaching is expected. Some warming and potential for bleaching may occur around American Samoa by April.</p>
        </td>
      <td valign="middle"><img src="images/section2/Q12014/pic1.jpg" width="440" height="469" /></td>
    </tr>
  </table>
  </div>

  <h3 id="section3">Regional Climate Overview for Previous Quarter</h3>
  <div id="panel3" align="center">
    <table width="900" border="0" cellspacing="8" cellpadding="8">
      <tr>
        <td>
        <table>
          <tr>
          <td><div align="center"><img src="images/section3/Q12014/pic1.gif" width="210" height="210" /></div></td>
          <td><div align="center"><img src="images/section3/Q12014/pic2.gif" width="360" height="120" /><br />
          <br />          
          </div></td>
          <td><div align="center"><img src="images/section3/Q12014/pic3.gif" width="267" height="175" /><br />
          <br />
          </div></td>
          </tr>
          <tr>
            <td><p align="center"><em>Depth chart showing the progression of cool waters along the Equator. Source: <a href="http://www.bom.gov.au/" target="_blank">http://www.bom.gov.au/</a></em></p></td>
            <td><p align="center"><em>30-day TRMM satellite estimated precipitation anomalies <span class="style4">January 2014</span> Source: <a href="http://trmm.gsfc.nasa.gov/" target="_blank">http://trmm.gsfc.nasa.gov/</a></em> &#13;</p></td>
            <td><p align="center"><em>U.S. Drought Monitor Drought Conditions in Northeast as of <br />
                  <span class="style4">May 15, 2014</span>. Source: <a href="http://droughtmonitor.unl.edu" target="_blank">http://droughtmonitor.unl.edu</a></em></p></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><p><strong>ENSO-neutral conditions continued in the Equatorial Pacific Region.</strong> Weather conditions were more in-line with La Ni�a in the quarter (e.g., the position of the monsoon trough and elevated sea level). As of February 7th the Ni�o 3.4 region anomaly was -0.3�C, which corresponds to ENSO neutral conditions.<br />
          <br />
          The monthly mean sea level in the 4th quarter continued to show higher anomalies in most of the USAPI stations; all stations were 4-6 inches higher than normal. <em>Sea-surface temperatures</em> were generally above-normal except for the waters around and just south of the Equator where cooler waters prevailed.<br />
          <br />
          Data from the <em>ocean color</em> satellite showed a large algae bloom off of Fiji and south of American Samoa during December, 2013.<br />
          <br />
          In Hawaii,<em> rainfall</em> was near normal in many areas of the state, though dryness lingered on the Big Island. In Guam and the CNMI, rainfall was above normal as quarterly values were 147% of normal. In the RMI, rainfall was near to slightly below-normal (Majuro was 87% normal), while in the FSM, quarterly rainfall, in terms of percent of normal, was near-normal across most sites: Chuuk (82%), Kosrae (94%), and Yap (143%). Further west, Pohnpei was below normal (84%), while in Palau and Koror rainfall was slightly above normal. In American Samoa, rainfall was 105% of normal for the quarter.<br />
          <br />
          <em>Drought</em> conditions continued over parts of the Hawaiian Archipelago and abnormal dryness expanded across portions of the FSM and RMI. As of the end of January, 57% of the state of Hawaii was abnormally dry or in drought, with some improvement on Oahu due to heavier rains in December. Meanwhile, abnormal dryness lifted out of Kapingamarangi, while the northern atolls of the RMI saw drier conditions develop. Meanwhile, severe drought conditions developed in Kwajalein.<br />
          <br />
          <em>Tropical Cyclone</em> activity for November-January in the western North Pacific basin was near-normal. In mid-January 2014, a weak tropical cyclone was affecting the southern region of the Republic of the Philippines with heavy rains. In the Southern Hemisphere, Cyclone Ian weakened after moving out of the South Pacific tropics where severely impacted the Kingdom of Tonga.</p>
          </td>
      </tr>
    </table>
  </div>

  <h3 id="section4">Regional Climate Outlook for Next Quarter</h3>
  <div id="panel4" align="center">
    <table width="900" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td><div align="center"><img src="images/section4/Q12014/pic1.gif" width="579" height="344" /><br />
          <p><em>ENSO Forecast, January � November 2014. Source: <a href="http://iri.columbia.edu/our-expertise/climate/forecasts/enso/" target="_blank">http://iri.columbia.edu/our-expertise/climate/forecasts/enso/</a></em></p>
        </div>
        </td>
      </tr>
      <tr>
        <td><p><strong>ENSO Neutral conditions are expected to continue through the Northern Hemisphere spring 2014. There is an increasing potential for El Ni�o to develop after June 2014.</strong><br />
          <br />
          The SST anomaly outlook for the 1st quarter indicates near-normal temperatures throughout the region. <strong>Coral bleaching thermal stresses are projected to be high</strong> across the equatorial Pacific, especially from FSM to American Samoa.<br />
          <br />
          The forecast values for sea level in the 1st quarter indicate that most of the stations in the north Pacific region are likely be 3-4 inches higher than normal. Only Honolulu and Hilo will remain closer to normal. A continuation of ENSO-neutral conditions may cause the sea levels to fall slightly during the quarter, though still elevated.<br />
          <br />
          Rainfall in parts of FSM are expected to be near- to-above normal next quarter. Specifically, rainfall is anticipated to be above normal for Yap, near normal for Chuuk, Pohnpei, and Kosrae. Palau is projected to be wetter than normal, while the CNMI are expected to receive near normal rainfall. For the RMI, Kwajalein is expected to receive near normal rainfall while Majuro is expected to receive slightly below normal rainfall. Rainfall for American Samoa and Hawaii is projected to be near normal. Rains in Hawaii in early February suggest improvement to the drought picture over Hawaii.<br />
          <br />
          A normal seasonal quite period in tropical cyclone activity is expected for the western North Pacific. In the southwest Pacific, a slightly increased frequency of tropical cyclones are expected along the east coast of Australia and again near Fiji, Tonga, and the Cook Islands.</p>
          </td>
      </tr>
    </table>
  </div> 
  <div id="note">
  <p class="note-text">Information in the dashboard  is grouped first by climate variable and/or impact and then by time frame.  Click on any tab in the dashboard, it will expand to show an associated selection of panes. (Click again and it will collapse).  Click on any figure in a pane to view a full-sized version, and click again to reduce it. Click on the &quot;?&quot; button to view the figure caption.  Note that figures are automatically updated as often as the original providers post them on their respective websites (the update frequency is included in the caption).  This means, the figures in the print version of the outllook may not be fully consistent with those found here. Click on the source URL to go to the site where the figure originated and find additional data and information.</p>
</div>
  <h3 id="section5">Dashboard</h3>
  <div id="panel5">
    <div id="toggle_panels">
      <h3 id="dashboard1">Temperature &amp; Precipitation</h3>
      <div id="dashboard1_panel1">
        <div id="toggle_panels">
        <h3 id="dashboard1_1">Recent/Current:</h3>
        <div>
          <div align="center">
					<div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
TRMM Precipitation Anomalies <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Rainfall anomaly made by comparing rainfall data compiled during the twelve-year period from 2001-2012 to &quot;near real-time&quot;. This product is updated daily." />
<br />
<a href="http://trmm.gsfc.nasa.gov/trmm_rain/Events/new_big_anomaly.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://trmm.gsfc.nasa.gov/trmm_rain/Events/new_big_anomaly.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://trmm.gsfc.nasa.gov/trmm_rain/Events/thirty_day.html" target="_blank">http://trmm.gsfc.nasa.gov/trmm_rain/Events/thirty_day.html</a></p>
<br />
</div>
<div class="div-table-col">
Latest Week of Global Rainfall <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Rainfall added up over the course of the last week. This product is updated daily." />
<br />
<a href="http://trmm.gsfc.nasa.gov/trmm_rain/Events/big_global_accumlation.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://trmm.gsfc.nasa.gov/trmm_rain/Events/big_global_accumlation.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://pmm.nasa.gov/TRMM/realtime-3hr-7day-rainfall" target="_blank">http://pmm.nasa.gov/TRMM/realtime-3hr-7day-rainfall</a></p>
<br />
</div>
<div class="div-table-col">
NASA TRMM Monthly Precipitation Levels <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Total monthly precipitation as measured by the NASA TRMM satellite. This product is updated monthly." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/NASA_TRMM_Monthly_Precipitation_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/NASA_TRMM_Monthly_Precipitation_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://disc2.nascom.nasa.gov/opendap/ncml/TRMM_L3/TRMM_3A11" target="_blank">http://disc2.nascom.nasa.gov/opendap/ncml/TRMM_L3/TRMM_3A11</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
Current Total Precipitable water   <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Satellite-derived total precipitable water from the western Pacific.  Warm colors are very moist, cooler colors denote drier regions. This product is updated daily." />
<br />
<a href="http://tropic.ssec.wisc.edu/real-time/mimic-tpw/wpac/anim/latest72hrs.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://tropic.ssec.wisc.edu/real-time/mimic-tpw/wpac/anim/latest72hrs.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://tropic.ssec.wisc.edu/real-time/mimic-tpw/wpac/main.html" target="_blank">http://tropic.ssec.wisc.edu/real-time/mimic-tpw/wpac/main.html</a></p>
<br />
</div>
<div class="div-table-col">
NCEP Reanalysis Model - Surface Temperature <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Latest monthly surface air temperature derived from the NCEP Reanalysis climatology model." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_data_air_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_data_air_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/air.mon.mean.nc" target="_blank">ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/air.mon.mean.nc</a></p>
<br />
</div>
<div class="div-table-col">
NCEP Reanalysis Model - Precipitable Water <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Latest monthly surface precipitable water derived from the NCEP Reanalysis climatology model." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_data_pr_wtr_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_data_pr_wtr_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/pr_wtr.mon.mean.nc" target="_blank">ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/pr_wtr.mon.mean.nc</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
&nbsp;</div>
<div class="div-table-col">
NCEP Reanalysis Model - Surface Temperature Anomaly <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Latest monthly surface air temperature anomaly derived from the NCEP Reanalysis dataset." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_anomaly_data_air_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_anomaly_data_air_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/air.mon.mean.nc" target="_blank">ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/air.mon.mean.nc</a></p>
<br />
</div>
<div class="div-table-col">
NCEP Reanalysis Model - Precipitable Water Anomaly <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Latest monthly surface precipitable water anomaly derived from the NCEP Reanalysis dataset." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_anomaly_data_pr_wtr_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_anomaly_data_pr_wtr_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/pr_wtr.mon.mean.nc" target="_blank">ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/pr_wtr.mon.mean.nc</a></p>
<br />
</div>
</div>
</div>
          </div>
          <div class="div-table">
            <div class="div-table-row">
              <div class="div-link-col">
                <ul>
                  <li><a href="http://www.cpc.ncep.noaa.gov/" target="_blank">Hawaii Temperature Time Series</a></li>
                  <li><a href="http://www.cpc.ncep.noaa.gov/" target="_blank">Hawaii Precipitation Time Series</a></li>
                  <li><a href="http://www.esrl.noaa.gov/psd/map/images/olr/olr.anom.30day.gif" target="_blank">ERSL 30-Day Average OLR Anomaly</a></li>
                  <li><a href="http://www.bom.gov.au/cosppac/comp/bulletin/" target="_blank">Climate and Oceans Support System in the Pacific (COSPPac)</a></li>
                </ul>
              </div>
            </div>
          </div>  
        </div>
      
        <h3 id="dashboard1_2">Forecast/Projections:</h3>
        <div>
          <div align="center">
            <div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
IRI Multi-model Probability forecast for temperature <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Global 3-month temperature forecast.  Reds are warmer than average; blue colder. This product is updated monthly." />
<br />
<a href="http://iri.columbia.edu/climate/forecast/net_asmt/2013/jul2013/images/ASO13_World_pcp.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://iri.columbia.edu/climate/forecast/net_asmt/2013/jul2013/images/ASO13_World_pcp.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://portal.iri.columbia.edu" target="_blank">http://portal.iri.columbia.edu</a></p>
<br />
</div>
<div class="div-table-col">
IRI multi-model probability forecast for precipitation <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Global 3-month precipitation forecast.  Blue colors indicate wetter than average conditions expected; browns drier. This product is updated monthly." />
<br />
<a href="http://iri.columbia.edu/climate/forecast/net_asmt/2013/jul2013/images/ASO13_World_pcp.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://iri.columbia.edu/climate/forecast/net_asmt/2013/jul2013/images/ASO13_World_pcp.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://portal.iri.columbia.edu" target="_blank">http://portal.iri.columbia.edu</a></p>
<br />
</div>
<div class="div-table-col">
CFS 3-month precipitation outlook <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Global standardized precipitation 3-month outlook from the CFSv2 model. Blue and greens indicate areas favoring wetter than normal conditions  &#59; areas shaded in brown favor drier than normal. Expressed in units of standard deviation (sigma). This product is updated weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/imagesInd3/glbPrecSeaNormMaskInd1.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/imagesInd3/glbPrecSeaNormMaskInd1.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/" target="_blank">http://www.cpc.ncep.noaa.gov/</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
NMME Forecast of Prate Anom <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="The National Multi-Model Ensemble forecast of precipitation rate  anomalies for the next three months.  This product  summarizes the output of about 6 different climate prediction models. Shading shows areas where there is model consensus.  The NMME is an  experimental multi-model seasonal forecasting system consisting of coupled  models from US modeling centers. On average, the NMME approach yields  superior forecasts compared to any single model. This product is updated monthly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/NMME/current/images/NMME_ensemble_prate_season1.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/NMME/current/images/NMME_ensemble_prate_season1.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/NMME/" target="_blank">http://www.cpc.ncep.noaa.gov/products/NMME/</a></p>
<br />
</div>
<div class="div-table-col">
CFSv2 seasonal Prec anomalies <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="The Coupled Forecast System three-month outlook for precipitation anomalies with units of mm/day. This product shades areas that have higher than 30&#37; confidence in the projection. The CFS model uses an ensemble suite of 40 members, is a fully-coupled model representing the interaction between the Earth's atmosphere, oceans, land, and sea-ice. This product is updated weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/imagesInd3/glbPrecSeaMaskInd1.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/imagesInd3/glbPrecSeaMaskInd1.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/" target="_blank">http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/</a></p>
<br />
</div>
  <div class="div-table-col">&nbsp;</div>
</div>
</div>
          </div>
          <div class="div-table">
            <div class="div-table-row">
              <div class="div-link-col">
                <ul>
                  <li><a href="http://www.prh.noaa.gov/peac/rainfall.php" target="_blank">PEAC Seasonal Rainfall Outlook</a></li>
                  <li><a href="http://www.niwa.co.nz/climate/icu/island-climate-update-158-november-2013/tropical-rainfall-and-sst-outlook-november-2013-to-january-2014" target="_blank">Tropical rainfall and SST outlook</a></li>
                  <li><a href="http://www.niwa.co.nz/climate/icu/island-climate-update-158-november-2013/south-pacific-convergence-zone-forecast-november-2013-to-january-2014" target="_blank">South Pacific Convergence Zone forecast</a></li>
                  <li><a href="http://www.bom.gov.au/cosppac/comp/ocof/" target="_blank">Pacific Islands online Climate Outlook Forum</a></li>
                  <li><a href="http://www.bom.gov.au/cosppac/comp/bulletin/" target="_blank">Climate and Oceans Support System in the Pacific (COSPPac)</a></li>
                </ul>
              </div>
            </div>
          </div> 
        </div>
      </div>
  
      </div>
      
      <h3 id="dashboard2">Drought &amp; Stream Flow</h3>  
      <div id="dashboard2_panel1">
        <div align="center">
          <div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
NCEP Reanalysis Model - Relative Humidity (Surface) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Surface relative humidity derived from the NCEP Reanalysis climatology model. This product is updated monthly." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_data_rhum_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_data_rhum_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/rhum.mon.mean.nc" target="_blank">ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/rhum.mon.mean.nc</a></p>
<br />
</div>
<div class="div-table-col">
US Drought Monitor for Northeast <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Current drought monitor for Hawaii.  White areas indicate no drought.  Drought increases in intensity as colors go from yellow to burnt red. This product is updated weekly." />
<br />
<a href="http://droughtmonitor.unl.edu/data/pngs/current/current_northeast_trd.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://droughtmonitor.unl.edu/data/pngs/current/current_northeast_trd.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://droughtmonitor.unl.edu/MapsAndData/MapsandDataServices/MapService.aspx" target="_blank">http://droughtmonitor.unl.edu/MapsAndData/MapsandDataServices/MapService.aspx</a></p>
<br />
</div>
<div class="div-table-col">
USGS Monthly Streamflow <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Percentile classes of the current streamflow rates in Hawaii.  Blue indicates above normal flow rates; reds below. This product is updated monthly." />
<br />
<a href="http://waterwatch.usgs.gov/images/real/hi/realb.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://waterwatch.usgs.gov/images/real/hi/realb.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://hi.water.usgs.gov/" target="_blank">http://hi.water.usgs.gov/</a></p>
<br />
</div>
</div>
</div>
        </div>      
      </div>
      
      <h3 id="dashboard3">Tropical Cyclones &amp; Storms</h3>
      <div id="dashboard3_panel1">
        <div id="toggle_panels">
        <h3 id="dashboard3_1">Recent/Current:</h3>
        <div>
        <div align="center">
          <div class="div-sp-tablewrapper">
<div class="div-sp-table">
<div class="div-sp-table-row">
<div class="div-sp-table-rowspanned">
CPC Storminess: ETC storm track monitoring  <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Storm tracks are identified in these figures, along with wave heights (meters). Storms tracks follow the minimum sea level pressure associated with storm system. This product is updated bi-weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/stormtracks/stloop.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/stormtracks/stloop.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/precip/" target="_blank">http://www.cpc.ncep.noaa.gov/products/precip/</a></p>
<br />
</div>
<div class="div-sp-table-cell">
Current total precipitable water and winds  <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Remotely-sensed wind speed at approximately 5,000&#39; above ground level (wind barbs).  Colors represent the total atmospheric precipitable water (in mm). This product is updated daily." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/dmsp_tpw.tropics_WPAC.jpg" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/dmsp_tpw.tropics_WPAC.jpg" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.nrlmry.navy.mil/" target="_blank">http://www.nrlmry.navy.mil/</a></p>
<br />
</div>
<div class="div-sp-table-cell">
South Pacific current tracks  <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Current season tropical cyclone tracks for the Southwest Pacific. Colored lines indicate intensity of the storm at that time in the track. This product is updated daily." />
<br />
<a href="http://weather.unisys.com/hurricane/s_pacific/2014/track.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://weather.unisys.com/hurricane/s_pacific/2014/track.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://weather.unisys.com/" target="_blank">http://weather.unisys.com/</a></p>
<br />
</div>
</div>
<div class="div-sp-table-row">
<div class="div-sp-table-empty">
&nbsp;</div>
<div class="div-sp-table-cell">
NCEP Reanalysis Model - Sea Level Pressure (Surface) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Surface sea-level pressure derived from the NCEP Reanalysis climatology model.  The model has incorporated in-situ data where available. This product is updated monthly." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_data_slp_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/NCEP_data_slp_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/slp.mon.mean.nc" target="_blank">ftp://ftp.cdc.noaa.gov/Datasets/ncep.reanalysis.derived/surface/slp.mon.mean.nc</a></p>
<br />
</div>
<div class="div-sp-table-cell">
West Pac TC tracks  <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Current season tropical cyclone tracks for the western North Pacific.  Colored lines indicate intensity of the storm at that time in the track. This product is updated daily." />
<br />
<a href="http://weather.unisys.com/hurricane/w_pacific/2014/track.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://weather.unisys.com/hurricane/w_pacific/2014/track.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://weather.unisys.com/" target="_blank">http://weather.unisys.com/</a></p>
<br />
</div>
</div>
<div class="div-sp-table-row">
<div class="div-sp-table-empty">
&nbsp;</div>
<div class="div-sp-table-cell">
&nbsp;</div>
<div class="div-sp-table-cell">
East Pac tracks <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Current season tropical cyclone tracks for the eastern North Pacific.  Colored lines indicate the intensity of the storm at that time in the track. This product is updated daily." />
<br />
<a href="http://weather.unisys.com/hurricane/e_pacific/2014/track.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://weather.unisys.com/hurricane/e_pacific/2014/track.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://weather.unisys.com/" target="_blank">http://weather.unisys.com/</a></p>
<br />
</div>
</div>
</div>
</div>
        </div>
        </div>
        
        <h3 id="dashboard3_2">Forecast/Projections:</h3>
        <div>
        <div align="center">
          <div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
Global Tropical Hazards/Benefits Outlook <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Global tropics region hazards outlook. Hazards analyzed include tropical cyclone formation, above (below) average rainfall, and above (below) average temperature.  Issued weekly. This product is updated weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/ghazards/images/gth_full.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/ghazards/images/gth_full.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/ghazards/" target="_blank">http://www.cpc.ncep.noaa.gov/products/precip/CWlink/ghazards/</a></p>
<br />
</div>
  <div class="div-table-col">&nbsp;</div>
  <div class="div-table-col">&nbsp;</div>
</div>
</div>
        </div>
        </div>
      </div>
      
      </div>
      
      <h3 id="dashboard4">Sea-Surface Temperatures, Ocean Conditions, &amp; Impacts</h3>
      <div id="dashboard4_panel1">
        <div id="toggle_panels">
        <h3 id="dashboard4_1">Recent/Current:</h3>
        <div>
        <div align="center">
          <div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
CPC .gif loop of SST anomalies <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Weekly averages of SST anomalies (degrees C) for the past twelve weeks. Analysis is based on the SST Optimum Interpolation (OISST) analysis. This product is updated bi-weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/enso_update/sstaanim.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/enso_update/sstaanim.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov" target="_blank">http://www.cpc.ncep.noaa.gov</a></p>
<br />
</div>
<div class="div-table-col">
TAO/TRITON SST & Winds past 21 days <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="21-day mean SST  anomalies for the tropical belt located between 10N and 10S.  Top panel is the mean SST, and bottom panel are the anomalies.  Wind vectors shown. This product is updated weekly." />
<br />
<a href="http://www.pmel.noaa.gov/tao/jsdisplay/plots/gif/igoss_seas.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pmel.noaa.gov/tao/jsdisplay/plots/gif/igoss_seas.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.pmel.noaa.gov/tao/jsdisplay/" target="_blank">http://www.pmel.noaa.gov/tao/jsdisplay/</a></p>
<br />
</div>
<div class="div-table-col">
Weekly SST Anomaly <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Weekly sea surface temperature (SST) anomaly maps from NOAA's Optimum Interpolation SST (OISST) analysis. Anomolies are shown in degrees C.  This product is updated weekly." />
<br />
<a href="http://www.emc.ncep.noaa.gov/research/cmb/sst_analysis/images/wkanomv2.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.emc.ncep.noaa.gov/research/cmb/sst_analysis/images/wkanomv2.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.ncdc.noaa.gov/" target="_blank">http://www.ncdc.noaa.gov/</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
Coral Reef Watch Products - Bleaching Alert Areas <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="The NOAA Coral Reef Watch (CRW) satellite twice-weekly 50 km coral bleaching alert area product presented here outlines the areas where bleaching thermal stress currently reaches various bleaching stress levels, based on our satellite sea surface temperature monitoring. This product is updated daily.

" />
<br />
<a href="http://www.ospo.noaa.gov/data/cb/baa/baapcurrent.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.ospo.noaa.gov/data/cb/baa/baapcurrent.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://coralreefwatch.noaa.gov/satellite/baa.php" target="_blank">http://coralreefwatch.noaa.gov/satellite/baa.php</a></p>
<br />
</div>
<div class="div-table-col">
Coral Reef Watch Products - Coral bleaching hotspots <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="The HotSpot product shows areas where corals are currently under thermal stress. The scale goes from 0 to 5 degrees C. Areas above the bleaching threshold are in orange to red colors. Spatial resolution is one-half degree. This product is updated daily.
" />
<br />
<a href="http://www.ospo.noaa.gov/data/cb/hotspots/hotspotpcurrent.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.ospo.noaa.gov/data/cb/hotspots/hotspotpcurrent.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://coralreefwatch.noaa.gov/satellite/hotspot.php" target="_blank">http://coralreefwatch.noaa.gov/satellite/hotspot.php</a></p>
<br />
</div>
<div class="div-table-col">
Coral Reef Watch Products - Degree Heating Weeks <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="DHWs show how much heat stress has accumulated in an area over the past 12 weeks (3 months). In other words, we add up the HotSpot values whenever the temperature exceeds the bleaching threshold. It is a running sum: as we advance one half-week in time (a timestep), a half-week timestep &quot;falls off&quot; the back end of the 12-week window. This product is updated daily." />
<br />
<a href="http://www.ospo.noaa.gov/data/cb/dhw/dhwps_2m.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.ospo.noaa.gov/data/cb/dhw/dhwps_2m.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://coralreefwatch.noaa.gov/satellite/dhw.php" target="_blank">http://coralreefwatch.noaa.gov/satellite/dhw.php</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
OceanWatch - Central Pacific: Aqua MODIS Ocean Color <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Satellite-based surface clorophyll-a (ocean color) data.  Ocean color data provides an indication of the bioproductivity levels that are manifested in the surface layer of the ocean.  The colors are not indicative of severity, but rather tells a story about the current state of the ocean. This product is updated monthly." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/OW_sat_data_chla_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/OW_sat_data_chla_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://oceanwatch.pifsc.noaa.gov" target="_blank">http://oceanwatch.pifsc.noaa.gov</a></p>
<br />
</div>
<div class="div-table-col">
OceanWatch - Central Pacific: Aquarius Sea-Surface Salinity <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Satellite-based sea-surface salinity.  The colors show the distribution of overall salinity on the ocean's surface.  This product is used as a reference for the regional distribution of salinity, which is directly correlated with rainfall. This product is updated monthly." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/OW_sat_data_sss_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/OW_sat_data_sss_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://oceanwatch.pifsc.noaa.gov" target="_blank">http://oceanwatch.pifsc.noaa.gov</a></p>
<br />
</div>
<div class="div-table-col">
OceanWatch - Central Pacific: GOES-POES Sea-Surface Temperature <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Satellite-based sea-surface temperature.  GOES-POES is a new satellite product that merges all the data available from geostationary and polar orbiting satellites in order to generate a uniform SST product with global coverage and that is cloud-free. This product offers a complete view of the Earth's oceans each day. The SST is derived from the analysis of the spectral reflectance from multiple IR wavelengths that result from the ocean's skim layer (surface), from which a complex SST algorithm is derived. This product is updated monthly." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/OW_sat_data_sst_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/OW_sat_data_sst_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://oceanwatch.pifsc.noaa.gov" target="_blank">http://oceanwatch.pifsc.noaa.gov</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
Equatorial Temperature Anomaly <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="This product shows the anomaly in sub-surface temperatures a depths to 450m across the Equatorial Pacific. This product is updated every 5 days." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/ocean/anim/wkxzteq_anm.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/ocean/anim/wkxzteq_anm.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/" target="_blank">http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/</a></p>
<br />
</div>
  <div class="div-table-col">&nbsp;</div>
  <div class="div-table-col">&nbsp;</div>
</div>
</div>
        </div>
        </div>
        
        <h3 id="dashboard4_2">Forecast/Projections:</h3>
        <div>
        <div align="center">
          <div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
ROMS Ocean Model Compare Forecasts <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="This figure shows an animation of model forecast SST from the PacIOOS Regional Modeling System (ROMS).  The model is run daily and produces three-hourly forecasts of ocean variables.  More information and plots of other variables can be found at the PacIOOS modeling pages." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/hiig_temp-5m.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/hiig_temp-5m.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://pacioos.org/focus/modeling/ROMS_compare_variable.php" target="_blank">http://pacioos.org/focus/modeling/ROMS_compare_variable.php</a></p>
<br />
</div>
<div class="div-table-col">
Global SST 3-month outlook <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Global sea surface temperature anomalies (Degrees C) predicted by the NOAA CFSv2 model. Values shown are the predicted 3-mo mean for the period shown. This product is updated weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/imagesInd3/glbSSTSeaInd1.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/imagesInd3/glbSSTSeaInd1.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/" target="_blank">http://www.cpc.ncep.noaa.gov/</a></p>
<br />
</div>
<div class="div-table-col">
Bleach Thermal Stress outlook (prob and stat) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Bleaching outlook based on thermal stress and active area hotspots.  Outlook is for 4-months. This product is updated monthly.
" />
<br />
<a href="http://coralreefwatch.noaa.gov/satellite/bleachingoutlook_cfs/current_images_v1/cur_img_ss_outlook_cfs_rank03_45ns.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://coralreefwatch.noaa.gov/satellite/bleachingoutlook_cfs/current_images_v1/cur_img_ss_outlook_cfs_rank03_45ns.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://coralreefwatch.noaa.gov/satellite/bleachingoutlook/" target="_blank">http://coralreefwatch.noaa.gov/satellite/bleachingoutlook/</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
Probabilistic Bleaching Thermal Stress Warning <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="CRW display of the percentages of the 28 ensemble members reaching each of the four coral bleaching thermal stress levels (Bleaching Watch & Higher, Bleaching Warning & Higher, Alert Level 1 & Higher, and Alert Level 2). The corresponding weekly outlooks that the Seasonal Outlook is derived from are also provided to give potential thermal stress conditions on a weekly time scale. This product is updated weekly." />
<br />
<a href="http://coralreefwatch.noaa.gov/satellite/bleachingoutlook_cfs/current_images_v1/cur_img_ss_warning_outlookprob_cfs_pacific.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://coralreefwatch.noaa.gov/satellite/bleachingoutlook_cfs/current_images_v1/cur_img_ss_warning_outlookprob_cfs_pacific.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://coralreefwatch.noaa.gov/satellite/bleachingoutlook_cfs/outlook_cfs.php" target="_blank">http://coralreefwatch.noaa.gov/satellite/bleachingoutlook_cfs/outlook_cfs.php</a></p>
<br />
</div>
<div class="div-table-col">
CFSR SSH and CFSv2 equatorial temperature <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Climate Forecast System modeled projection of the equatorial temperature for the next 9-month period in units of Kelvin. Forecasts are from initial conditions of the last 30 days, with 4 runs from each day.  Forecast ensembles consist of 40 members from an initial period of 10 days.  This product is updated weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/CFSv2/imagesInd3/TEQMon.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/CFSv2/imagesInd3/TEQMon.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/CFSv2/CFSv2seasonal.shtml" target="_blank">http://www.cpc.ncep.noaa.gov/products/CFSv2/CFSv2seasonal.shtml</a></p>
<br />
</div>
  <div class="div-table-col">&nbsp;</div>
</div>
</div>
        </div>
        </div>
      </div>
      
      </div>
      
      <h3 id="dashboard5">Sea Level &amp; Waves</h3>
      <div id="dashboard5_panel1">
        <div id="toggle_panels">
        <h3 id="dashboard5_1">Recent/Current:</h3>
        <div>
        <div align="center">
          <div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
Pacific Region Sea-Surface Height Anomaly <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="These maps show a daily sample of the along-track near-real-time (NRT) sea surface height anomaly (SSHA) measurements from the Jason-1 and Jason-2 satellite altimeter missions. The seasonal cycle and trend have not been removed. Each map is generated from a 10-day window of SSHA measurements. The NRT SSHA measurements from these missions are typically available within 5 to 7 hours of real time. These measurements can be used for meteorological applications (i.e. weather), marine operations (i.e. fishing, boating, offshore operations), and other applications where knowledge of current ocean conditions are relevant. This product is updated every 10 days." />
<br />
<a href="http://sealevel.jpl.nasa.gov/images/latestdata/ssh/2014/SSHA_20140219_001500.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://sealevel.jpl.nasa.gov/images/latestdata/ssh/2014/SSHA_20140219_001500.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://sealevel.jpl.nasa.gov/Science/datasources/ssha/" target="_blank">http://sealevel.jpl.nasa.gov/Science/datasources/ssha/</a></p>
<br />
</div>
<div class="div-table-col">
OceanWatch - Central Pacific: SSH-based Emirical Orthogonal Function analysis <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Satellite-based sea-surface height EOF time series analysis showing the variability observed in the the Pacific Basin. This product is updated weekly." />
<br />
<a href="http://oceanwatch.pifsc.noaa.gov/imagery/ssh_aviso_basin_final.jpg" class="highslide" onclick="return hs.expand(this)">
								<img src="http://oceanwatch.pifsc.noaa.gov/imagery/ssh_aviso_basin_final.jpg" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://oceanwatch.pifsc.noaa.gov" target="_blank">http://oceanwatch.pifsc.noaa.gov</a></p>
<br />
</div>
<div class="div-table-col">
Current Hawaii Waves and Winds <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Data displayed from the National Digital Forecast Database (NDFD) from NOAA?s National Weather Service.  It is able to graphically display weather information on a point-by-point basis. there is more than this out there, also consider links to buoys (see PacIOOS). This product is updated hourly." />
<br />
<a href="http://graphical.weather.gov/images/hawaii/WindSpd4_hawaii.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://graphical.weather.gov/images/hawaii/WindSpd4_hawaii.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://weather.gov" target="_blank">http://weather.gov</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
OceanWatch - Central Pacific: Merged Sea-Surface Height Anomaly & Niiler Climatology <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Satellite-based sea-surface height anomalies.  The merged mission SSH data represents a combination of multi-altimeter sea-surface anomaly (SSA) measurements from the French Aviso group combined with the Niiler Climatology. The Niiler climatology is an absolute sea level distribution map calculated using in-situ data from 1992 - 2002. Attached is a pdf with more information on it. This type of data is used for detecting and monitoring the movement and distribution of oceanographic eddies & their ensuing geostrophic currents through the world's oceans. The only caveat is that this data should not be used near large land masses, since it can have an impact on the sensor's footprint and data reading. This product is updated monthly." />
<br />
<a href="http://www.pacificcis.org/dashboard/images/section5/images/OW_sat_data_ssh_pacbasin_latest.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.pacificcis.org/dashboard/images/section5/images/OW_sat_data_ssh_pacbasin_latest.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://oceanwatch.pifsc.noaa.gov" target="_blank">http://oceanwatch.pifsc.noaa.gov</a></p>
<br />
</div>
  <div class="div-table-col">&nbsp;</div>
  <div class="div-table-col">&nbsp;</div>
</div>
</div>
        </div>
        </div>
        
        <h3 id="dashboard5_2">Forecast/Projections:</h3>
        <div>
        <div align="center">
          <div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
Pacific Region Sea-Surface Heights <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Sea Surface Height, in centimeters, for the period of three weeks prior to the current date, and one week forecast beyond the current date.  Darker colors are higher wave heights; bluer colors lower. This product is updated daily." />
<br />
<a href="http://www7320.nrlssc.navy.mil/GLBhycom1-12/navo/equpacssh_nowcast_anim30d.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www7320.nrlssc.navy.mil/GLBhycom1-12/navo/equpacssh_nowcast_anim30d.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www7320.nrlssc.navy.mil/GLBhycom1-12/" target="_blank">http://www7320.nrlssc.navy.mil/GLBhycom1-12/</a></p>
<br />
</div>
<div class="div-table-col">
Projected Sea-Level Anomalies <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Forecast sea-level seasonal anomaly based on the Markov model with specified initiation date. This product is updated quarterly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/people/yxue/MKmodel_sl_clim71-00_godas/fig2.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/people/yxue/MKmodel_sl_clim71-00_godas/fig2.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/people/yxue/SL_forecast_clim71-00_godas.html" target="_blank">http://www.cpc.ncep.noaa.gov/products/people/yxue/SL_forecast_clim71-00_godas.html</a></p>
<br />
</div>
<div class="div-table-col">
WaveWatch III wave height and direction <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Forecast wave height (in meters) and vector (speed and direction) of the waves out to 96 hours.  Red colors indicate regions of high waves; blue colors smaller waves.  Red arrow indicate direction of wave movement. This product is updated daily." />
<br />
<a href="http://polar.ncep.noaa.gov/waves/WEB_P/multi_1.latest_run/plots/pacific.hs.f096h.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://polar.ncep.noaa.gov/waves/WEB_P/multi_1.latest_run/plots/pacific.hs.f096h.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://polar.ncep.noaa.gov/waves/index2.shtml" target="_blank">http://polar.ncep.noaa.gov/waves/index2.shtml</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
CFSR SSH and CFSv2 seasonal SSH <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Climate Forecast System modeled projection of the height the sea for the next 8 month period in units of meters.  Blue areas denote lower sea-heights; red higher.  Forecasts are from initial conditions of the last 30 days, with 4 runs from each day. Forecast ensembles consist of 40 members from initial a period of 10 days. This product is updated weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/CFSv2/imagesInd3/xySSHMon.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/CFSv2/imagesInd3/xySSHMon.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/CFSv2/CFSv2seasonal.shtml" target="_blank">http://www.cpc.ncep.noaa.gov/products/CFSv2/CFSv2seasonal.shtml</a></p>
<br />
</div>
  <div class="div-table-col">&nbsp;</div>
  <div class="div-table-col">&nbsp;</div>
</div>
</div>
        </div>
        <div class="div-table">
            <div class="div-table-row">
              <div class="div-link-col">
                <ul>
                  <li><a href="http://www7320.nrlssc.navy.mil/GLBhycom1-12/equpac.html" target="_blank">Pacific Region Sea-Surface Heights</a></li>
                  <li><a href="http://www.prh.noaa.gov/peac/sea-level.php" target="_blank">PEAC Seasonal Sea Level Outlook</a></li>
                  <li><a href="http://www.bom.gov.au/cosppac/comp/bulletin/" target="_blank">Climate and Oceans Support System in the Pacific (COSPPac)</a></li>
                </ul>
              </div>
            </div>
          </div>  
        </div>
      </div>
      
      </div>
      
      <h3 id="dashboard6">ENSO &amp; Other Climate Indices</h3>
      <div id="dashboard6_panel1">
        <div align="center">
          <div class="div-table">
<div class="div-table-row">
<div class="div-table-col">
IRI ENSO prediction plume <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="This product is updated twice a month." />
<br />
<a href="http://iri.columbia.edu/wp-content/uploads/2014/03/figure3.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://iri.columbia.edu/wp-content/uploads/2014/03/figure3.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://iri.columbia.edu/" target="_blank">http://iri.columbia.edu/</a></p>
<br />
</div>
<div class="div-table-col">
IRI ENSO probability bar graphs <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="The probabilities of La Nina (blue), Neutral (Green) or El Nino conditions based on a consensus of CPC/IRI forecasters for upcoming 3-month periods are shown by the bar chart. The lines show the frequency of warm, neutral or cold ENSO conditions from 1981-2010. This product is updated twice a month." />
<br />
<a href="http://iri.columbia.edu/wp-content/uploads/2014/04/figure1.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://iri.columbia.edu/wp-content/uploads/2014/04/figure1.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://iri.columbia.edu" target="_blank">http://iri.columbia.edu</a></p>
<br />
</div>
<div class="div-table-col">
CFS ENSO Forecast <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="CFSv2 prediction of monthly and seasonal mean SST anomalies (degrees C) for the Nino 3.4 region (5N to 5S and 170W to 120W). The observation is shown by the solid black line. Thin lines display forecasts from individual CFSv2 ensemble members, and the dashed line shows the ensemble mean.  Seasonal averages of +0.5 degrees C or higher favor El Nino Conditions, while seasonal averages of -0.5 C or lower favor La Nina. This product is updated weekly. " />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/imagesInd3/nino34Sea.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/people/wwang/cfsv2fcst/imagesInd3/nino34Sea.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.ncpc.ncep.noaa.gov" target="_blank">http://www.ncpc.ncep.noaa.gov</a></p>
<br />
</div>
</div>
<div class="div-table-row">
<div class="div-table-col">
Nino 3.4 Historical sea surface temperature index <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Time series of SST anomalies (degrees C) in 4 ENSO-sensitive regions of the Pacific for the last 20 years. Nino 1+2 is near the South American Coast (0 to 10S, 90W to 80 W), Nino 3 is in the eastern Pacific (5N to 5S, 150W to 90W), Nino 3.4 is in the east-central Pacific (5N to 5S, 170W to 120W), and Nino 4 is in the central Pacific (5N to 5S, 160E to 150W). This product is updated monthly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/CDB/Tropics/figt5.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/CDB/Tropics/figt5.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/data/indices/" target="_blank">http://www.cpc.ncep.noaa.gov/data/indices/</a></p>
<br />
</div>
<div class="div-table-col">
IRI current multi-variate ENSO index (MEI) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="This product is updated monthly." />
<br />
<a href="http://www.esrl.noaa.gov/psd/enso/mei/ts.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.esrl.noaa.gov/psd/enso/mei/ts.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.esrl.noaa.gov/psd/enso/mei/" target="_blank">http://www.esrl.noaa.gov/psd/enso/mei/</a></p>
<br />
</div>
<div class="div-table-col">
CPC MJO Forecast <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Forecast of anomalous outgoing long-wave radiation (OLR) for the next 15 days from the Ensemble mean GFS forecasts. Blue (yelow/red) shades show negative (positive) OLR anomalies and are associated with enhanced (suppressed) convection. This product is updated weekly." />
<br />
a href="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/MJO/spatial_olrmap_full.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/MJO/spatial_olrmap_full.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/" target="_blank">http://www.cpc.ncep.noaa.gov/</a></p>
<br />
</div>
</div>
</div>
        </div>
        <div class="div-table">
            <div class="div-table-row">
              <div class="div-link-col">
                <ul>
                  <li><a href="http://www.niwa.co.nz/climate/icu/island-climate-update-158-november-2013/el-ni%C3%B1osouthern-oscillation-enso" target="_blank">NIWA El Ni&ntilde;o/Southern Oscillation (ENSO)</a></li>
                  <li><a href="http://www.bom.gov.au/cosppac/comp/bulletin/" target="_blank">Climate and Oceans Support System in the Pacific (COSPPac)</a></li>
                </ul>
              </div>
            </div>
          </div>      
      </div>
      
    </div> 
  </div>

  <h3 id="section6">Regional Partners</h3>
  <div id="panel6" align="center">
    <table width="900" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td>Pacific Climate Information System: <br />
          <a href="http://www.pacificcis.org/" target="_blank">http://www.pacificcis.org/</a></td>
        <td><img src="images/section6/pacis.png" width="220" height="73" /></td>
      </tr>
      <tr>
        <td>Pacific ENSO Applications Climate Center:<br />
          <a href="http://www.prh.noaa.gov/peac/" target="_blank">http://www.prh.noaa.gov/peac/</a></td>
        <td><img src="images/section6/noaa_peac.png" width="590" height="92" /></td>
      </tr>
      <tr>
        <td>NOAA NWS Weather Forecast Office Honolulu :<br /> 
          <a href="http://www.prh.noaa.gov/pr/hnl/" target="_blank">http://www.prh.noaa.gov/pr/hnl/ </a></td>
        <td><img src="images/section6/noaa_nws_honolulu.png" width="570" height="91" /></td>
      </tr>
      <tr>
        <td>NOAA NWS Weather Forecast Office Guam:<br />
          <a href="http://www.prh.noaa.gov/pr/guam/" target="_blank">http://www.prh.noaa.gov/pr/guam/ </a></td>
        <td><img src="images/section6/noaa_nws_guam.png" width="568" height="93" /></td>
      </tr>
      <tr>
        <td>NOAA NESDIS National Climatic Data Center:<br />
          <a href="http://www.ncdc.noaa.gov/sotc/" target="_blank">http://www.ncdc.noaa.gov/sotc/ </a></td>
        <td><img src="images/section6/noaa_ncdc.png" width="575" height="71" /></td>
      </tr>
      <tr>
        td>NOAA NMFS Pacific Island Fisheries Science Center:<br />
          <a href="http://www.pifsc.noaa.gov/" target="_blank">http://www.pifsc.noaa.gov/</a></td>
        <td><img src="images/section6/noaa_pifsc.png" width="577" height="61" /></td>
      </tr>
      <tr>
        <td>NOAA OceanWatch - Central Pacific:<br />
          <a href="http://oceanwatch.pifsc.noaa.gov/" target="_blank">http://oceanwatch.pifsc.noaa.gov/</a></td>
        <td><img src="images/section6/noaa_ow_pifsc.png" width="575" height="68" /></td>
      </tr>
      <tr>
        <td>NOAA Coral Reef Watch:<br />
          <a href="http://coralreefwatch.noaa.gov/" target="_blank">http://coralreefwatch.noaa.gov/</a></td>
        <td><img src="images/section6/noaa_crw.png" width="230" height="50" /></td>
      </tr>
      <tr>
        <td>USGS Pacific  Islands Water Science Center:<br />
          <a href="http://hi.water.usgs.gov/" target="_blank">http://hi.water.usgs.gov/ </a></td>
        <td><img src="images/section6/usgs_hi_water.png" width="591" height="96" /></td>
      </tr>
      <tr>
        <td>University of Hawaii - Joint Institute of Marine and Atmospheric Research:<br />
          <a href="http://www.soest.hawaii.edu/jimar/" target="_blank">http://www.soest.hawaii.edu/jimar/ </a></td>
        <td><img src="images/section6/uh_jimar.png" width="583" height="75" /></td>
      </tr>
      <tr>
        <td>University of Guam - Water and Environmental Research Institute:<br />
          <a href="http://www.weriguam.org/" target="_blank">http://www.weriguam.org/ </a></td>
        <td><img src="images/section6/weri.png" width="286" height="94" /></td>
      </tr>
    </table>
  </div>

  <h3 id="section7">Previous Climate Impacts and Outlook</h3>  
  <div>
  </div>     
</div>
</div>
<div id="footer">
Contact: John Marra (<a href="mailto:john.marra@noaa.gov">john.marra@noaa.gov</a>)
</div>
</div><!--ends container-->
</body>
</html>
