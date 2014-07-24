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

	  $("#sectionE").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		  .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
		  .next().toggleClass("ui-accordion-content-active").slideToggle();

	  $("#sectionG").toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
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
<div align="center">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="50%" valign="middle" class="title"><h1 align="center">Climate Impacts and Outlook</h1></td>
    <td width="50%" valign="middle" class="title"><h2 align="center">Eastern Region<br />
      1<sup>st</sup> Quarter 2014</h2></td>
  </tr>  
</table>
</div>
<div id="note">
<p class="note-text">This web page provides a digital version of the quarterly <i>Gulf of Maine Region Climate Impacts and Outlook</i>, which offers a snapshot of recent weather events and anomalies; discusses regional weather impacts on the region’s ecosystems and economy; and provides a forecast for the coming three months. A regional &quot;climate dashboard&quot; links to a wide variety of sites offering real-time data tracking temperature, precipitation, drought, storms, sea surface variables and more.</p>
</div>
<div id="toggle_panels">
 <h3 id="sectionE">Eastern Region</h3>
 <div id="panelE">
  <?php include 'eastern.php' ?>
 </div><!-- closes div id="panelE" -->
  
  
 <h3 id="sectionG">Gulf of Maine Region</h3>
 <div id="panelG">
  <?php include 'eastern.php' ?>
 </div><!-- closes div id="panelG -->
  
<div align="center">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="100%" valign="middle" class="title" style="background-color:#6eac2c"><h1 align="center">Dashboard</h1></td>
  </tr>  
</table>
</div>
  
  
  <div id="note">
  <p class="note-text">Information in the dashboard  is grouped first by climate variable and/or impact and then by time frame.  Click on any tab in the dashboard, it will expand to show an associated selection of panes. (Click again and it will collapse).  Click on any figure in a pane to view a full-sized version, and click again to reduce it. Click on the &quot;?&quot; button to view the figure caption.  Note that figures are automatically updated as often as the original providers post them on their respective websites (the update frequency is included in the caption).  This means, the figures in the print version of the outllook may not be fully consistent with those found here. Click on the source URL to go to the site where the figure originated and find additional data and information.</p>
 </div>



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

