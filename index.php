<?php 

// simple html parser
include('simple_html_dom.php');

// create downloads directory - biggest advantage being php will have write privileges
if ( !file_exists('downloads') )
{
  mkdir ('downloads');
}


function get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}

// Retrieve the DOM from a given URL
$html = file_get_html('http://www.nrcc.cornell.edu/');
foreach($html->find('a') as $e)
{
  $href = $e->href;
  if (strpos($href,'precip.png') !== false) 
  {
     $the_date = get_string_between($href, 'img/', 'precip.png'); 

     //echo $the_date . '<br>'; 

	 $npdpt = 'http://www.nrcc.cornell.edu/img/' . $the_date . 'npdpt.png';
	 $ntdpt = 'http://www.nrcc.cornell.edu/img/' . $the_date . 'ntdpt.png';

	 copy ($npdpt, "downloads/nrcc_precip_percent_of_normal.png");
	 copy ($ntdpt, "downloads/nrcc_temperature_departure.png");
  }
}


//  Precipiation - Northeast US - daily Observations - 
copy("http://water.weather.gov/precip/save.php?timetype=RECENT&loctype=NWS&units=engl&timeframe=current&product=observed&loc=regionER&print=1", "downloads/precip5.png");

// CoCoRaHS
copy("http://www.cocorahs.org/Maps/GetMap.aspx?state=usa&type=precip", "downloads/cocorahs.jpg");
  
  

# Enable Error Reporting and Display:
error_reporting(~0);
ini_set('display_errors', 1);

//echo $xmlstring;  
$xml = simplexml_load_file('dash.xml');
?>
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
<img src="images/header3.jpg" alt="" /><img src="images/sunset3.jpg" width="994" alt="" />
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
    <td width="50%" valign="middle" class="title"><h2 align="center">Eastern Region<br />
      1<sup>st</sup> Quarter 2014</h2></td>
  </tr>  
</table>
</div>
<div id="toggle_panels">
  <h3 id="section1">Significant Events and Impacts for Previous Quarter by Locale</h3>
  <div id="panel1" align="center">
  <table width="900" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td valign="middle">
        <div id="image1" align="center">
         <a href="images/section1/Q12014/pic1.png" class="highslide" onclick="return hs.expand(this)">
          <img src="images/section1/Q12014/pic1.png" width="700" onclick="return hs.expand(this)" />
         </a>
       </div>
      </td>
      <td valign="middle"><h3>Highlights for the East</h3><br /><p>Two major winter storms hit the region in February. From the 4th to the 5th, a storm dropped up to 20 inches of snow and 0.75 inches of ice. Costing $90–120 million, the storm may be the most expensive in southeastern Pennsylvania energy provider, PECO's history. From the 11th to the 13th, a storm dropped up to 30 inches of snow and 1.25 inches of ice. The storm closed Washington, DC, area airports, contributed to accidents involving 100 vehicles on the Pennsylvania Turnpike, left thousands without power for over a week in the Carolinas, and caused roof collapses in New Jersey.</p>
        </td>
    </tr>
    </table>
    <p>With a 49°F difference between the daily high and low on January 6, Binghamton, NY, had its largest daily temperature range on record. The site also set a record for number of below-zero days in January and tied the record for any month. In December, Caribou, ME; Concord, NH; and Atlantic City, NJ, set or tied records for greatest number of consecutive days with measurable snowfall.</p><p>From February 20 to 21, severe storms spawned two EF-0 tornadoes in Ohio, an EF-0 in Maryland, and an EF-1 in North Carolina. The storms also caused structural and tree damage in West Virginia and the Mid-Atlantic.</p>
    </div>
    <h3 id="section2">Significant Events and Impacts for Previous Quarter by Sector</h3>
    <div id="panel2" align="center">
    <table width="900" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td valign="top" width="290"><p><em><strong>Transportation</strong></em>The Ohio Department of Transportation (DOT) used a record one million tons of salt from October–mid-March, compared to 630,000 tons during an average winter. Maryland's State Highway Administration estimates it spent $130+ million on snow removal versus its budget of $46 million. Several states even ran low on or out of salt. Many areas dealt with an increased number of potholes this winter. New Jersey DOT filled more than double the number of potholes this January compared to last. Air travel was also adversely affected. Of the major U.S. cities, New York metro area flights were the 3rd most impacted this winter, with 35.1% of passenger flights delayed or cancelled. LaGuardia Airport had the highest cancellation rate of major U.S. airports at 10.9%.<br />
        <br />
            <em><strong>Fisheries</strong></em>The cold weather is being blamed for a large die-off of speckled trout in the Mid-Atlantic. The North Carolina Division of Marine Fisheries closed waters to speckled trout fishing from February 5 to June 15, 2014. In early February, oysters were not able to be harvested in parts of the Chesapeake Bay because boats that harvest the oysters were iced in.</p>
       </td>
       <td>
       <a href="images/section2/Q12014/winter.png" class="highslide" onclick="return hs.expand(this)"><img src="images/section2/Q12014/winter.png" width="290" /></a>
       <br />
       
        <br />
        <em><strong>Agriculture</strong></em>Cold temperatures damaged wine grape buds in upstate New York, northwestern Pennsylvania, and parts of Ohio. For more susceptible varieties, 50–70% of wine grape buds were damaged, with 80–90% of buds damaged in harder hit areas. In Connecticut and Rhode Island, maple season was running about three weeks behind schedule in late February. Cold temperatures prevented sap from running up to and out of taps. In addition, deep snow made it hard to reach some taps.
       </td>
       <td>
       <p>
        <em><strong>Insects</strong></em>There may be fewer numbers of invasive insects this spring due to winter's cold temperatures. A research project at Virginia Tech showed a 95% kill rate of stink bugs in an experiment that simulated their overwintering locations while exposing them to January's chill. In parts of North Carolina, 100% of hemlock woolly adelgids were killed off by winter's cold temperatures, while in Massachusetts around 80% should die. A large die-off of Asian Tiger mosquitoes is expected when the average mean temperature drops below 23°F. Those mosquitoes overwinter in the egg stage, making them vulnerable to the cold. Large temperature fluctuations and subzero lows may have also caused some of the southern pine beetle population, which has been ravaging New Jersey's Pine Barrens, to die off. Unfortunately, the cold may have also killed off beneficial insects.
        <br />
        <br />
        <em><strong>Energy</strong></em>On January 7, several energy providers, including New York’s power grid, set new winter peak demand records. The cold temperatures increased demand for wood pellets, causing a shortage in some areas.
        </p>
        </td>
      <td valign="middle"></td>
    </tr>
  </table>
  </div>

  <h3 id="section3">Regional Climate Overview for Previous Quarter</h3>
  <div id="panel3" align="center">
  
    <table width="900" border="1" cellspacing="5" cellpadding="5">
    <tr style="font:Arial, Helvetica, sans-serif; color:#0066CC; font-size:23px; font-weight:700">
     <td  align="center" colspan="2">Temperature and Precipitation Anomalies</td>
     <td align="center">Seasonal Snowfall</td>
    </tr>
    <tr>
      <td width="290">   
          <div align="center" style="margin-top:17px;">Departure from Normal Temperature (°F)<br />
December 1, 2013–February 28, 2014</div><br />
      <a href="images/section2/Q12014/temp.jpg" class="highslide" onclick="return hs.expand(this)"><img src="images/section2/Q12014/temp.jpg" width="290" /></a>
       <br />
       
        <br />
       With an average temperature of 29.1°F, it was 2.3°F colder than normal during winter in the Eastern Region. December was slightly warmer than normal at 34.0°F, 0.6°F above normal. Nearly 60 high temperature records were set at major cities from December 21 to 22. However, January 2014 was the 18th coldest on record at 24.5°F, 4.7°F below normal. Eight of the region's sixteen states ranked this January among their top 20 coldest. From January 6 to 8, over 40 low temperature records were set at the region's airport climate sites. February's average temperature was 29.1°F, 3.0°F below normal.
       </td>
  
       <td>
       <div align="center">Percent of Normal Precipitation (%)<br />
December 1, 2013–February 28, 2014</div><br />
       <a href="images/section2/Q12014/precip.jpg" class="highslide" onclick="return hs.expand(this)"><img src="images/section2/Q12014/precip.jpg" width="290" /></a>
       <br />
       
        <br />
        The Eastern Region received 110% of normal precipitation during winter. The region wrapped up December at 133% of normal, making it the 14th wettest December on record. Seven states ranked this December among their top 20 wettest. January was drier at 87% of normal, while February was wetter at 108% of normal.<br />
At the start of December, 15 states had areas of abnormally dry or moderate drought conditions. Above-normal precipitation in December and February eased dryness, with only small areas of abnormal dryness in the Northeast by February's end.
       </td>
  
       <td>
       <div align="center">Departure from Normal Snowfall (in.)<br />
December 1, 2013–February 28, 2014</div><br />
      <a href="images/section2/Q12014/snowfall.jpg" class="highslide" onclick="return hs.expand(this)"><img src="images/section2/Q12014/snowfall.jpg" width="290" /></a>
       <br />
       
        <br />
        December snowfall departures generally ranged from -6 inches to +6 inches. Maine and lake-effect areas of New York had departures of over 18 inches. During January, most areas were within 6 inches of normal. Parts of upstate New York and northern New England were 6–18 inches below normal for snowfall, while Cape Cod, Long Island, southern New Jersey, and parts of Ohio had departures of over 12 inches. February was a snowy month for the entire region, with the greatest departures of over 24 inches stretching from West Virginia up through New Hampshire.
        </td>
    </tr>
  </table>
  
  
  </div>

  <h3 id="section4">Regional Climate Outlook for Next Quarter</h3>
  <div id="panel4" align="center">
    <table width="900" border="1" cellspacing="5" cellpadding="5">
    <tr style="font:Arial, Helvetica, sans-serif; color:#0066CC; font-size:23px; font-weight:700">
     <td  align="center">Three-Month<br />
Temperature Outlook</td>
     <td align="center">NOAA's Spring Flood <br />Outlook</td>
     <td align="center">Regional Partners</td>
    </tr>
    <tr>
      <td width="290">   
          <div align="center" >Valid for April–June 2014</div><br />
      <a href="images/section2/Q12014/col1.png" class="highslide" onclick="return hs.expand(this)"><img src="images/section2/Q12014/col1.png" width="290" style="border:hidden"/></a>
       </td>
  
       <td>
       <div align="center">Issued: March 20, 2014</div><br />
       <a href="images/section2/Q12014/col2.png" class="highslide" onclick="return hs.expand(this)"><img src="images/section2/Q12014/col2.png" width="290" style="border:hidden" /></a>
       </td>
  
       <td>
       <a href="images/section2/Q12014/col3.png" class="highslide" onclick="return hs.expand(this)"><img src="images/section2/Q12014/col3.png" width="290" style="border:hidden" /></a>
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
        <h3 id="dashboard1_1">Recent/Current Conditions</h3>
        <div>
          <div align="center">
					<div class="div-table">


<div class="div-table-row">

<div class="div-table-col">
Northeast Regional Synopsis - Temperature <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Recent trends in regional air temperature" />
<br />
<a href="downloads/nrcc_temperature_departure.png" class="highslide" onclick="return hs.expand(this)">
								<img src="downloads/nrcc_temperature_departure.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.nrcc.cornell.edu/" target="_blank">Northeast Regional Climate Center</a></p>
<br />
</div>

<div class="div-table-col">
Northeast Regional Synopsis - Precipitation <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Recent trends in precipitation as percent of Normal" />
<br />
<a href="downloads/nrcc_precip_percent_of_normal.png" class="highslide" onclick="return hs.expand(this)">
								<img src="downloads/nrcc_precip_percent_of_normal.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.nrcc.cornell.edu/" target="_blank">Northeast Regional Climate Center</a></p>
<br />
</div>


<div class="div-table-col">
24-hour Air Temperature (Atlantic Provinces) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Air Temperature in Centigrade." />
<br />
<a href="http://atl.agrometeo.org/images/global/wm_images/en/composite.meteo.index.tair.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://atl.agrometeo.org/images/global/wm_images/en/composite.meteo.index.tair.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://atl.agrometeo.org/index.php" target="_blank">AgWeather Atlantic</a></p>
<br />
</div>

</div>

<div class="div-table-row">

<div class="div-table-col">
24-hour Rainfall (Atlantic Provinces) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Rainfall since last midnight." />
<br />
<a href="http://atl.agrometeo.org/images/global/wm_images/en/composite.meteo.index.rain.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://atl.agrometeo.org/images/global/wm_images/en/composite.meteo.index.rain.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://atl.agrometeo.org/index.php" target="_blank">AgWeather Atlantic</a></p>
<br />
</div>


<div class="div-table-col">
Weekly Extreme Maximum Temperature (US) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="National US map of extreme high temperatures (&deg;F), recorded weekly" />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/regional_monitoring/clrmax.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/regional_monitoring/clrmax.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/regional_monitoring/us_weekly_maxt.shtml" target="_blank">Climate Prediction Center</a></p>
<br />
</div>

<div class="div-table-col">
Weekly Extreme Minimum Temperature (US) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="National US map of extreme low temperatures (&deg;F), recorded weekly." />
<br />
<a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/regional_monitoring/clrmin.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/regional_monitoring/clrmin.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/regional_monitoring/us_weekly_mint.shtml" target="_blank">Climate Prediction Center</a></p>
<br />
</div>

</div>

<div class="div-table-row">

<div class="div-table-col">
Precipitation (Northeast US—daily observations) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Precipitation (Northeast US—daily observations)" />
<br />
<a href="downloads/precip5.png" class="highslide" onclick="return hs.expand(this)"><img src="downloads/precip5.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://water.weather.gov/precip/index.php" target="_blank">Advanced Hydrological Prediction Service</a></p>
<br />
</div>


  <div class="div-table-col">
Precipitation (US—daily observations) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="National and state maps with data from volunteers’ sites depicting one-day observed precipitation" />
<br />
<a href="downloads/cocorahs.jpg" class="highslide" onclick="return hs.expand(this)"><img src="downloads/cocorahs.jpg" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cocorahs.org/" target="_blank">Community Collaborative Rain, Hail &amp; Snow Network</a></p>
  </div>

  <div class="div-table-col">
US Regional Forecast Centers (including River Forecast Centers) <img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="National interactive map depicting where river gauges have recorded flooding in past 24 hours" />
<br />
<a href="http://water.weather.gov/images/groundoverlays/conus_all_all_obs.png" class="highslide" onclick="return hs.expand(this)">
  <img src="http://water.weather.gov/images/groundoverlays/conus_all_all_obs.png" title="Click to enlarge" width="170" />
 </a><br />
<p class="caption">source: <a href="http://water.weather.gov/ahps/index.php" target="_blank">Advanced Hydrological Prediction Service</a></p>
<br />
  </div>
</div>

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
                <!--ul>
                  <li><a href="http://www.cpc.ncep.noaa.gov/" target="_blank">Hawaii Temperature Time Series</a></li>
                  <li><a href="http://www.cpc.ncep.noaa.gov/" target="_blank">Hawaii Precipitation Time Series</a></li>
                  <li><a href="http://www.esrl.noaa.gov/psd/map/images/olr/olr.anom.30day.gif" target="_blank">ERSL 30-Day Average OLR Anomaly</a></li>
                  <li><a href="http://www.bom.gov.au/cosppac/comp/bulletin/" target="_blank">Climate and Oceans Support System in the Pacific (COSPPac)</a></li>
                </ul--->
              </div>
            </div>
          </div>  
        </div>
      
        <h3 id="dashboard1_2">Forecasts/Projections/Time Series:</h3>
        <div>
          <div align="center">
            <div class="div-table">


        <div class="div-table-row">

          <div class="div-table-col">
Northeast US Climate Summary: Average Temperature (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional average temperatures (&deg;F) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dTDataNRCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dTDataNRCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>


          <div class="div-table-col">
Northeast US Climate Summary: Departure from Normal Temperature (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional departure from normal temperature (&deg;F) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dTDeptNRCC.png " class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dTDeptNRCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>

          <div class="div-table-col">
Southeast US Climate Summary: Average Temperature (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional average temperatures (&deg;F) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dTDataSERCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dTDataSERCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>




</div>


        <div class="div-table-row">

          <div class="div-table-col">
Southeast US Climate Summary: Departure from Normal Temperature (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional departure from normal temperature (&deg;F) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dTDeptSERCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dTDeptSERCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>


          <div class="div-table-col">
US Graphical Forecasts<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Interactive map offering a regional snapshot with views of max/min temperatures, probability of precipitation, weather, hazards, dewpoint, relative humidity, wind speed, wind gusts, sky cover, snow amount, ice accumulation and more." />
<br />
<a href="http://preview.weather.gov/graphical/index.php" target="_blank">
								<img src="images/usgraphical.jpg" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://preview.weather.gov/graphical/index.php" target="_blank">National Weather Service: Graphical Forecasts</a></p>
<br />
</div>

          <div class="div-table-col">
US Animated Forecasts<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Weather Prediction Center’s loop of sea-level pressures and fronts (medium range, days 3-7); and 18-, 24-, 30-,36-, 48- and 60-hour forecasts of fronts/pressures." />
<br />
<a href="http://www.hpc.ncep.noaa.gov/basicwx/day0-7loop.html" target="_blank">
								<img src="images/usanimated.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hpc.ncep.noaa.gov/" target="_blank">Weather Predication Center</a></p>
<br />
</div>




</div>

<div class="div-table-row">

   <div class="div-table-col">
US Quantitative Precipitation Forecasts (1- through 7-day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="National map of precipitation forecast (inches per day)" />
<br />
<a href="http://www.hpc.ncep.noaa.gov/qpf/p168i.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hpc.ncep.noaa.gov/qpf/p168i.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hpc.ncep.noaa.gov/qpf/day1-7.shtml" target="_blank">Weather Prediction Center</a></p>
<br />
</div>


          <div class="div-table-col">
Canada Weather Radar—Atlantic Provinces<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Real-time precipitation animation (mm/hr) shown for Atlantic region" />
<br />
<a href="http://weather.gc.ca/radar/index_e.html?id=ERN" target="_blank">
								<img src="images/canada.jpg" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://weather.gc.ca/radar/index_e.html?id=ERN" target="_blank">Government of Canada</a></p>
<br />
</div>

          <div class="div-table-col">
Northeast US Climate Summary: Total Precipitation (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional total precipitation (inches) over the previous 30 days." />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dPDataNRCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dPDataNRCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/maps/current/index.php?action=update_product&product=PData" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>




</div>




<div class="div-table-row">

   <div class="div-table-col">
Northeast US Climate Summary: Departure from Normal Precipitation (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional departure from normal precipitation (inches) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dPDeptNRCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dPDeptNRCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/maps/current/index.php?action=update_product&product=PDept" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>


          <div class="div-table-col">
Northeast US Climate Summary: Percent of Normal Precipitation (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional percent of normal precipitation (inches) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dPNormNRCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dPNormNRCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/maps/current/index.php?action=update_product&product=PNorm" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>

          <div class="div-table-col">
Northeast US Climate Summary: Standardized Precipitation Index (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="This regional SPI helps monitor drought (depicting the severity of precipitation anomalies), offering a probability index based only on precipitation (inches) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dSPIDataNRCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/nrcc/30dSPIDataNRCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/maps/current/index.php?action=update_product&product=SPIData" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>




</div>






<div class="div-table-row">

   <div class="div-table-col">
Southeast US Climate Summary: Total Precipitation (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional total precipitation (inches) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dPDataSERCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dPDataSERCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/maps/current/index.php?action=update_product&product=PData" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>


          <div class="div-table-col">
Southeast US Climate Summary: Departure from Normal Precipitation (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional departure from normal precipitation (inches) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dPDeptSERCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dPDeptSERCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/maps/current/index.php?action=update_product&product=PDept" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>

          <div class="div-table-col">
Southeast US Climate Summary: Percent of Normal Precipitation (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="Regional percent of normal precipitation (inches) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dPNormSERCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dPNormSERCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/maps/current/index.php?action=update_product&product=PNorm" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>




</div>
<div class="div-table-row">

   <div class="div-table-col">
Southeast US Climate Summary: Standardized Precipitation Index (30 day)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="This regional SPI helps monitor drought (depicting the severity of precipitation anomalies), offering a probability index based only on precipitation (inches) over the previous 30 days" />
<br />
<a href="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dSPIDataSERCC.png" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.hprcc.unl.edu/products/maps/acis/sercc/30dSPIDataSERCC.png" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.hprcc.unl.edu/maps/current/index.php?action=update_product&product=SPIData" target="_blank">High Plains Regional Climate Center</a></p>
<br />
</div>


          <div class="div-table-col">
Extreme Precipitation (New York & New England)<img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="An interactive map links to data sets with extreme precipitation estimates (inches) by location ranging from one day to 500 years" />
<br />
<a href="http://precip.eas.cornell.edu/" target="_blank">
								<img src="images/extreme.jpg" width="170" /></a><br />
<p class="caption">source: <a href="http://precip.eas.cornell.edu/ " target="_blank">Northeast Regional Climate Center</a></p>
<br />
</div>





</div>


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
<a href="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/MJO/spatial_olrmap_full.gif" class="highslide" onclick="return hs.expand(this)">
								<img src="http://www.cpc.ncep.noaa.gov/products/precip/CWlink/MJO/spatial_olrmap_full.gif" title="Click to enlarge" width="170" /></a><br />
<p class="caption">source: <a href="http://www.cpc.ncep.noaa.gov/" target="_blank">http://www.cpc.ncep.noaa.gov/</a></p>
<br />
</div><!-- closes last column -->
</div><!-- closes row -->
</div><!-- table -->
        </div><!-- center -->

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
          
              
      </div><!-- panel -->
      
    </div><!-- ends section 6 --> 

    <h3 id="dashboard8">Dashboard - New</h3>
      <div id="dashboard8_panel1">

      <h3 id="dashboard81">US Eastern Region</h3>
       <div id="dashboard81_panel1">

        <h3 id="dashboard811">Temperature &amp; Precipitation</h3>
        <div id="dashboard811_panel1">

         <h3 id="dashboard8111">Current Conditions</h3>
         <div id="dashboard8111_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'eastern';
                $phenomenon = 'temperature';
                $timeframe  = 'current';
			    include 'dash.php'; 
			   ?>
            
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end current conditions -->
          
         <h3 id="dashboard8112">Forecast Conditions</h3>
         <div id="dashboard8112_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'eastern';
                $phenomenon = 'temperature';
                $timeframe  = 'forecast';
			    include 'dash.php'; 
			   ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end forecast conditions -->
          
          
         <h3 id="dashboard8113">Derivates</h3>
         <div id="dashboard8113_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'eastern';
                $phenomenon = 'temperature';
                $timeframe  = 'derivative';
			    include 'dash.php'; 
			   ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end eastern->temperature->derivative thumbnails -->
          
          
          
         </div><!-- end div = temperature and precip -->



        <h3 id="dashboard812">Drought &amp; Stream Flow</h3>
        <div id="dashboard811_panel1">

         <h3 id="dashboard8121">Current Conditions</h3>
         <div id="dashboard8121_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'eastern';
                $phenomenon = 'drought';
                $timeframe  = 'current';
			    include 'dash.php'; 
			   ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end current conditions -->
          
         <h3 id="dashboard8122">Derivative Products</h3>
         <div id="dashboard8122_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'eastern';
                $phenomenon = 'drought';
                $timeframe  = 'derivative';
			    include 'dash.php'; 
			   ?>
            
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end derivative conditions -->
          
          
         </div><!-- end div for eastern -> drought -->

        <h3 id="dashboard813">Winter Weather</h3>
        <div id="dashboard813_panel1">

          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'eastern';
                $phenomenon = 'winter';
				$timeframe  = NULL;
 	            include 'dash.php'; 
	           ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          
          
        </div><!-- end div for eastern -> winter weather -->



        <h3 id="dashboard814">Ocean Conditions</h3>
        <div id="dashboard814_panel1">

          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'eastern';
                $phenomenon = 'ocean';
				$timeframe  = NULL;
 	            include 'dash.php'; 
	           ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          
          
        </div><!-- end div for eastern -> oceans -->





       </div><!-- end div id=eastern -->
       
  
      <h3 id="dashboard82">US National</h3>
        <div id="dashboard82_panel1">
        <h3 id="dashboard821">Temperature &amp; Precipitation</h3>
        <div id="dashboard821_panel1">

         <h3 id="dashboard8211">Current Conditions</h3>
         <div id="dashboard8211_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'national';
                $phenomenon = 'temperature';
                $timeframe  = 'current';
			    include 'dash.php'; 
	       ?>
            
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end current conditions -->
          
         <h3 id="dashboard8212">Forecast Conditions</h3>
         <div id="dashboard8212_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'national';
                $phenomenon = 'temperature';
                $timeframe  = 'forecast';
			    include 'dash.php'; 
			   ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end forecast conditions -->
          
          
         <h3 id="dashboard8213">Derivates</h3>
         <div id="dashboard8213_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'national';
                $phenomenon = 'temperature';
                $timeframe  = 'derivative';
			    include 'dash.php'; 
			   ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end national->temperature->derivative thumbnails -->
          
          
          
         </div><!-- end div = temperature and precip -->



        <h3 id="dashboard822">Drought &amp; Stream Flow</h3>
        <div id="dashboard821_panel1">

         <h3 id="dashboard8221">Current Conditions</h3>
         <div id="dashboard8221_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'national';
                $phenomenon = 'drought';
                $timeframe  = 'current';
		        include 'dash.php'; 
               ?>
         
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end current conditions -->
          
         <h3 id="dashboard8222">Forecasts and Projections</h3>
         <div id="dashboard8222_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'national';
                $phenomenon = 'drought';
                $timeframe  = 'forecast';
		        include 'dash.php'; 
	           ?>
            
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end derivative conditions -->
          
          
         </div><!-- end div for national -> drought -->

        <h3 id="dashboard823">Tropical Cyclones (Hurricanes) and Storms</h3>
        <div id="dashboard823_panel1">

          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'national';
                $phenomenon = 'storms';
		        $timeframe  = NULL;
                include 'dash.php'; 
	           ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          
          
        </div><!-- end div for national -> storms -->



        <h3 id="dashboard824">Ocean Conditions</h3>
        <div id="dashboard824_panel1">

          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'national';
                $phenomenon = 'ocean';
				$timeframe  = NULL;
 	            include 'dash.php'; 
	           ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          
          
        </div><!-- end div for national -> oceans -->





      
      
    
      </div><!-- end div id=national, the entire national section of dashboard -->
      
      
      
      
      <h3 id="dashboard83">Canada—Atlantic Region and National</h3>
      <div id="dashboard83_panel1">

        <h3 id="dashboard831">Temperature &amp; Precipitation</h3>
        <div id="dashboard831_panel1">

         <h3 id="dashboard8311">Current Conditions</h3>
         <div id="dashboard8311_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'canada';
                $phenomenon = 'temperature';
                $timeframe  = 'current';
		        include 'dash.php'; 
	           ?>
            
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end current conditions -->
          
         <h3 id="dashboard8312">Forecast Conditions</h3>
         <div id="dashboard8312_panel1">


          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'canada';
                $phenomenon = 'temperature';
                $timeframe  = 'forecast';
		        include 'dash.php'; 
               ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          </div><!-- end forecast conditions -->
          
          
          
         </div><!-- end div = temperature and precip -->



        <h3 id="dashboard832">Drought &amp; Stream Flow</h3>
        <div id="dashboard831_panel1">



          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'canada';
                $phenomenon = 'drought';
                $timeframe  = NULL;
		        include 'dash.php'; 
               ?>
         
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


         </div><!-- end div for canada -> drought -->


        <h3 id="dashboard833">Winter Weather</h3>
        <div id="dashboard833_panel1">

          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'canada';
                $phenomenon = 'winter';
		        $timeframe  = NULL;
                include 'dash.php'; 
	           ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          
          
        </div><!-- end div for canada -> winter weather -->



        <h3 id="dashboard834">Ocean Conditions</h3>
        <div id="dashboard834_panel1">

          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'canada';
                $phenomenon = 'ocean';
		        $timeframe  = NULL;
 	            include 'dash.php'; 
	          ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          
          
        </div><!-- end div for canada -> oceans -->





      
      
      </div><!-- end div id=canada, the entire canada section of the dashboard -->
      
      
      
      
      <h3 id="dashboard84">Global/Oceanic</h3>
      <div id="dashboard84_panel1">
      
      

        <h3 id="dashboard832">Tropical Cyclones (Hurricanes) and Storms</h3>
        <div id="dashboard831_panel1">



          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'global';
                $phenomenon = 'storms';
                $timeframe  = NULL;
		        include 'dash.php'; 
               ?>
         
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


         </div><!-- end div for global -> drought -->


        <h3 id="dashboard833">Winter Weather</h3>
        <div id="dashboard833_panel1">

          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'global';
                $phenomenon = 'winter';
		        $timeframe  = NULL;
                include 'dash.php'; 
	          ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          
          
        </div><!-- end div for global -> winter weather -->



        <h3 id="dashboard834">Ocean Conditions</h3>
        <div id="dashboard834_panel1">

          <div align="center">
            <div class="div-table">
             <div class="div-table-row">
           
               <?php 
                $region     = 'global';
                $phenomenon = 'ocean';
		        $timeframe  = NULL;
 	            include 'dash.php'; 
	           ?>
           
            </div><!-- end div-table-row -->
           </div><!-- div-table -->
          </div><!-- end center -->


          
          
        </div><!-- end div for global -> oceans -->






      
      
      
      </div><!-- end div id=global/oceanic section of the dashboard -->

  
  
  
       
       
       
     </div><!-- end dashboard 8 panel div -->


  </div> <!-- end of div containing dashboards -->
  
  
  
  
  


<div id="footer">
Contact: Ellen Mecray (<a href="mailto:ellen.l.mecray@noaa.gov">Ellen.L.Mecray@noaa.gov</a>)
</div>

</div><!--ends container-->
</body>
</html>

