<?php

//
//  sample.php
//  Legal entities' details from VAT Number using the GSIS Web Service for legal entities
//
//	Copyright 2011 Yannis Lianeris
//	
//	Licensed under the Apache License, Version 2.0 (the "License"); 
//	you may not use this file except in compliance with the License. 
//	You may obtain a copy of the License at
//	
//	http://www.apache.org/licenses/LICENSE-2.0
//	
//	Unless required by applicable law or agreed to in writing, software 
//	distributed under the License is distributed on an "AS IS" BASIS, 
//	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. 
//	See the License for the specific language governing permissions and 
//	limitations under the License.
//

if ($_GET['afm']){
	
	// set trace = 1 for debugging
	$client = new SoapClient("https://www1.gsis.gr/wsgsis/RgWsBasStoixN/RgWsBasStoixNSoapHttpPort?wsdl", array('trace' => 0));
	// we set the location manually, since the one in the WSDL is wrong
	$client->__setLocation('https://www1.gsis.gr/wsgsis/RgWsBasStoixN/RgWsBasStoixNSoapHttpPort');
	
	$pAfm = $_GET['afm'];
	
	$pBasStoixNRec_out = array('actLongDescr' => '',
								'postalZipCode' => '', 
								'facActivity' => 0,
								'registDate' => '2011-01-01',
								'stopDate' => '2011-01-01',
								'doyDescr' => '',
								'parDescription' => '',
								'deactivationFlag' => 1,
								'postalAddressNo' => '',
								'postalAddress' => '',
								'doy' => '',
								'firmPhone' => '',
								'onomasia' => '',
								'firmFax' => '',
								'afm' => '',
								'commerTitle' => '');
	
	$pCallSeqId_out = 0;
	
	$pErrorRec_out = array('errorDescr' => '', 'errorCode' => '');
	
	try {
		$result = $client->rgWsBasStoixN($pAfm, $pBasStoixNRec_out, $pCallSeqId_out, $pErrorRec_out);
		
		$labels = array('actLongDescr' => 'Περιγραφή Κύριας Δραστηριότητας',
						'postalZipCode' => 'Ταχ. κωδικός Αλληλογραφίας',
						'facActivity' => 'Κύρια Δραστηριότητα',
						'registDate' => 'Ημ/νία Έναρξης',
						'stopDate' => 'Ημ/νία Διακοπής',
						'doyDescr' => 'Περιγραφή ΔΟΥ',
						'parDescription' => 'Περιοχή Αλληλογραφίας',
						'deactivationFlag' => 'Ένδειξη Απενεργ. ΑΦΜ',
						'postalAddressNo' => 'Αριθμός Αλληλογραφίας',
						'postalAddress' => 'Οδός Αλληλογραφίας',
						'doy' => 'Κωδικός ΔΟΥ',
						'firmPhone' => 'Τηλέφωνο Επιχείρησης',
						'onomasia' => 'Επωνυμία',
						'firmFax' => 'Fax Επιχείρησης',
						'afm' => 'ΑΦΜ',
						'commerTitle' => 'Τίτλος');
		
		if (!$result['pErrorRec_out']->errorCode)
		{
			foreach($result['pBasStoixNRec_out'] as $k=>$v)
				echo $labels[$k].': '.$v.'<br />';
				
		} else {
			echo 'ERROR '.$result['pErrorRec_out']->errorCode.': '.$result['pErrorRec_out']->errorDescr;
		}
		
	} catch(SoapFault $fault) {
		// <xmp> tag displays xml output in html
		echo 'Request: <br /><xmp>', $client->__getLastRequest(), '</xmp><br /><br /> Error Message: <br />', $fault->getMessage();
	}
	
} else {
?>

<p>sample call: <a href="sample.php?afm=094422282">sample.php?afm=094422282</a></p>

<?php
}
?>