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
					
	  //$("#section1").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
	  //	  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
	  //	  .next().toggleClass("ui-accordion-content-active").slideToggle();

	  $("#section5").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();

	  $("#dashboard8").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();			

	  $("#dashboard81").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();		

	  $("#dashboard811").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();		

	  $("#dashboard8111").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
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



    <h3 id="dashboard8">Dashboard</h3>
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


 
  
  
 <h3 id="section6">Regional Partners</h3>
  <div id="panel6" align="center">
    <table width="950" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td>NOAA/Regional Climate Services/Eastern Region<br />
          <a href="http://rcsdhome.org/eastern" target="_blank">http://rcsdhome.org/eastern</a></td>
        <td><img src="images/head_title.png"  /></td>
      </tr>
      <tr>
        <td>NOAA/Northeast Regional Climate Center<br />
          <a href="http://www.nrcc.cornell.edu/" target="_blank">http://www.nrcc.cornell.edu/</a></td>
        <td><img src="images/banner_map.png"/><img src="images/banner_title.png"/></td>
      </tr>
     <tr>
        <td>Environment Canada<br />
          <a href="https://weather.gc.ca/canada_e.html" target="_blank">http://weather.gc.ca/</a></td>
        <td><img src="images/environment_canada.jpg" /></td>
      </tr>
     <tr>
        <td>Northeast Regional Ocean Council<br />
          <a href="http://northeastoceancouncil.org/" target="_blank">http://northeastoceancouncil.org/</a></td>
        <td><img src="images/nroc-logo-90px.png"  /></td>
      </tr>
    </table>
  </div>

  </div> <!-- end of div containing dashboards --> 
  


<div id="footer">
Contact: Ellen Mecray (<a href="mailto:ellen.l.mecray@noaa.gov">Ellen.L.Mecray@noaa.gov</a>)
</div>

</div><!--ends container-->
</body>
</html>

