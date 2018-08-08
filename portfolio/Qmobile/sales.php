<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Q Dashboard: Sales Reports</title>
	<link rel="stylesheet" type="text/css" href="css/themes/qDashboard.css">
	<link rel="stylesheet" type="text/css" href="css/themes/jquery.mobile.icons.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.4.5.css" />
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/fontello.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<div data-role="page" id="salesPage">
		<div data-role="header" data-theme="b">
			<a data-icon="bars" data-iconpos="notext" href="menu.php" data-ajax="false">Home</a>
			<h1 id="logo"><img src="css/themes/images/QDashboard.png" alt="Q Dashboard"></h1>
		</div>
		<?php if (login_check($mysqli) == true) : ?> 
		<div align="center" data-role="content">
	        <div class="jrPage">
	        	<div id="title">
	        		<img src="css/themes/images/QDashboard.png" id="logoTwo">
	        		<h3>Sales Report</h3>
	        		<h5 class="today"><?php echo date("m.d.Y"); ?></h5>
	        	</div>
	        	<div id="subtitle">
	        		<h4>Executive Summary - Pharmacy Analysis</h4>
	        		<p>For the sales shipped <?php echo date("m/d/Y"); ?></p>
	        	</div>

	        <div data-role="collapsible" id="chartTitle">
	        	<h1>Insurance Fills</h1>
	        	<div>
		        	<table>
						<thead>
						<tr>
							<th>Pharmacy Name</th>
							<th># Fills</th>
							<th># Pmts.</th>
							<th># Pat.</th>
							<th># Doc.</th>
							<th>Adjudicated</th>
							<th>Collected</th>
							<th>Avg. Turnaround</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>QmedRx</td>
							<td>1,034</td>
							<td>1,038</td>
							<td>1,197</td>
							<td>603</td>
							<td>3,029,081.81</td>
							<td>164,381.64</td>
							<td>2.50</td>
						</tr>
						<tr>
							<td>NEHI</td>
							<td>207</td>
							<td>207</td>
							<td>162</td>
							<td>88</td>
							<td>1,426,150.72</td>
							<td>467,566.59</td>
							<td>2.15</td>
						</tr>
						<tr>
							<td>LifeQ</td>
							<td>590</td>
							<td>596</td>
							<td>601</td>
							<td>331</td>
							<td>4,217,881.94</td>
							<td>0.00</td>
							<td>2.02</td>
						</tr>
						<tr>
							<td>LifeWatch</td>
							<td>92</td>
							<td>92</td>
							<td>111</td>
							<td>44</td>
							<td>632,381.71</td>
							<td>0.00</td>
							<td>2.04</td>
						</tr>
						<tr>
							<td>CC</td>
							<td>34</td>
							<td>34</td>
							<td>0</td>
							<td>6</td>
							<td>243,066.48</td>
							<td>0.00</td>
							<td>N/A</td>
						</tr>
						<tr>
							<td>SpecPharm</td>
							<td>21</td>
							<td>21</td>
							<td>11</td>
							<td>5</td>
							<td>139,043.71</td>
							<td>0.00</td>
							<td>2.10</td>
						</tr>
						<tr>
							<td>QMedRx Custom</td>
							<td>6</td>
							<td>6</td>
							<td>34</td>
							<td>59</td>
							<td>24,090.43</td>
							<td>0.00</td>
							<td>20.33</td>
						</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>Totals</th>
								<td class="total">1,984</td>
								<td class="total">1,994</td>
								<td class="total">2,116</td>
								<td class="total">1,136</td>
								<td class="total">$9,711,696.80</td>
								<td class="total">$631,948.23</td>
								<td class="total">*5.19</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div>
					<p><em>*NOTE: Overall Avg. Turnaround does not include CC Pharmacy</em></p>
				</div>
			</div>

			<div data-role="collapsible" id="chartTitle">
	        	<h1>Cash Fills</h1>
	        	<div>
		        	<table>
						<thead>
						<tr>
							<th>Pharmacy Name</th>
							<th># Fills</th>
							<th># Pat.</th>
							<th># Doc.</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td class="cash">QmedRx</td>
							<td class="cash">431</td>
							<td class="cash">410</td>
							<td class="cash">308</td>
						</tr>
						<tr>
							<td class="cash">LifeQ</td>
							<td class="cash">14</td>
							<td class="cash">14</td>
							<td class="cash">14</td>
						</tr>
						<tr>
							<td class="cash">LifeWatch</td>
							<td class="cash">3</td>
							<td class="cash">3</td>
							<td class="cash">3</td>
						</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>Totals</th>
								<td class="total2">448</td>
								<td class="total2">427</td>
								<td class="total2">325</td>
							</tr>
						</tfoot>
					</table>
					</div>
				</div>
			<div data-role="collapsible" id="chartTitle">
	        	<h1>Infusion Fills</h1>
	        	<div>
	        		<table>
	        			<thead>
	        				<tr>
		        				<th>Pharmacy Name</th>
								<th># Fills</th>
								<th># Inv.</th>
								<th># Pat.</th>
								<th># Doc.</th>
								<th>Adjudicated</th>
								<th>Collected</th>
								<th>Avg. Turnaround</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<tr>
	        					<td class="infusion">HCS</td>
	        					<td class="infusion">107</td>
	        					<td class="infusion">107</td>
	        					<td class="infusion">24</td>
	        					<td class="infusion">18</td>
	        					<td class="infusion">36,610.43</td>
	        					<td class="infusion">27,709.49</td>
	        					<td class="infusion">0.27</td>
	        				</tr>
	        				<tr>
	        					<td class="infusion">NEHI</td>
	        					<td class="infusion">119</td>
	        					<td class="infusion">142</td>
	        					<td class="infusion">39</td>
	        					<td class="infusion">28</td>
	        					<td class="infusion">112,466.56</td>
	        					<td class="infusion">9,354.89</td>
	        					<td class="infusion">2.61</td>
	        				</tr>
	        				<tr>
	        					<td class="infusion">NEHIHCS</td>
	        					<td class="infusion">265</td>
	        					<td class="infusion">268</td>
	        					<td class="infusion">59</td>
	        					<td class="infusion">24</td>
	        					<td class="infusion">259,586.05</td>
	        					<td class="infusion">35,754.24</td>
	        					<td class="infusion">0.17</td>
	        				</tr>
	        			</tbody>
	        			<tfoot>
	        				<tr>
								<th>Totals</th>
								<td class="total3">491</td>
								<td class="total3">517</td>
								<td class="total3">122</td>
								<td class="total3">70</td>
								<td class="total3">$408,663.04</td>
								<td class="total3">$72,818.62</td>
								<td class="total3">1.02</td>
							</tr>
	        			</tfoot>
	        		</table>
	        	</div>
	        </div>
	        <div data-role="collapsible" id="chartTitle">
	        	<h1>Totals: Insurance, Cash, Infusion</h1>
	        	<div>
		        	<table>
						<thead>
						<tr>
							<th>Fill Type</th>
							<th># Fills</th>
							<th># Pmts.</th>
							<th># Pat.</th>
							<th># Doc.</th>
							<th>Adjudicated</th>
							<th>Collected</th>
							<th>Avg. Turnaround</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td class="all">Insurance</td>
							<td class="all">2368</td>
							<td class="all">2375</td>
							<td class="all">2116</td>
							<td class="all">1136</td>
							<td class="all">9756635</td>
							<td class="all">442911</td>
							<td class="all">3.03</td>
						</tr>
						<tr>
							<td class="all">Cash</td>
							<td class="all">448</td>
							<td class="all">N/A</td>
							<td class="all">427</td>
							<td class="all">325</td>
							<td class="all">N/A</td>
							<td class="all">N/A</td>
							<td class="all">N/A</td>
						</tr>
						<tr>
							<td class="all">Infusion</td>
							<td class="all">491</td>
							<td class="all">N/A</td>
							<td class="all">122</td>
							<td class="all">70</td>
							<td class="all">408663</td>
							<td class="all">72818</td>
							<td class="all">1.02</td>
						</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>Grand Total</th>
								<td class="total4">3,307</td>
								<td class="total4">2,375</td>
								<td class="total4">2,665</td>
								<td class="total4">1,531</td>
								<td class="total4">$10,165,298.00</td>
								<td class="total4">$515,729.00</td>
								<td class="total4">2.02</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div> 		
		</div> <!-- Content -->
	        
	</div> <!-- Page End -->

		<!-- FOOTER -->
		<div data-role="footer" data-position="fixed" class="nav-glyphish-example" data-theme="b">
			<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
				<ul>
					<li><a href="sales.php" class="icon-chart-bar" data-icon="custom" data-ajax="false" class="ui-btn-active ui-state-persist">Sales Report</a></li>
					<li><a href="calendar.php" class="icon-calendar" data-icon="custom" data-ajax="false">Calendar</a></li>
					<li><a href="imessages.php" class="icon-chat" data-icon="custom" data-ajax="false">Message</a></li>
					<li><a href="includes/logout.php" class="icon-logout" data-icon="custom" data-ajax="false">Log Out</a></li>
				</ul>
			</div>
		</div>
		<?php else : ?>
            <p style="text-align : center;">
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>

	</div>
	<script type="text/javascript" src="js/retina.min.js"></script>
	
</body>
</html>