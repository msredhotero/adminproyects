<?php

// includes ------------------------------------------------------------------------------------ INI

//Include the main TCPDF library (search for installation path).
require_once( dirname(__FILE__).'/comp/tcpdf/examples/tcpdf_include.php');

// includes ------------------------------------------------------------------------------------ FIN

// variables ----------------------------------------------------------------------------------- INI

$aImagData  = array(
  "file" => "",
  "x" => "",
  "y" => "",
  "w" => 0,
  "h" => 0,
  "type" => "",
  "link" => "",
  "align" => "",
  "resize" => false,
  "dpi" => 300,
  "palign" => "",
  "ismask" => false,
  "imgmask" => false,
  "border" => 0,
  "fitbox" => false,
  "hidden" => false,
  "fitonpage" => false,
  "alt" => false,
  "altimgs" => array(),
);                                                                                                  // template de los parametros que se pasan al metodo tcpdf:Image

// variables ----------------------------------------------------------------------------------- FIN

// implementacion ------------------------------------------------------------------------------INI

ob_clean();                                                                                         // cleaning the buffer before Output()

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 009');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 009', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale( PDF_IMAGE_SCALE_RATIO );

// set some language-dependent strings (optional)
if ( @file_exists(dirname(__FILE__).'/lang/eng.php') ) 
{
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();

// set JPEG quality
$pdf->setJPEGQuality(75);

// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 
$fUnit = $pdf->getImageScale();                                                                     // valor para convertir los pixles a user unit
$aImag = array(
  "iXpos" => 10,                                                                                    // user unit X donde comienza la imagen
  "iYpos" => 10,                                                                                    // user unit Y donde comienza la imagen luego del borde superior
);
// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN 

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 

// construir la ruta del archivo de imagen que sera el template.
$sImagruta = "001-v3.jpg";

$aPara = $aImagData;                                                                                // se copia el template de los paramentros del metodo Image
$aPara['file'] = $sImagruta;                                                                        // asignar la ruta del archivo
$aPara['x'] = '';                                                                                   // asignar la ruta del archivo
$aPara['y'] = '';                                                                                   // asignar la ruta del archivo
//$aPara['align'] = "T";
//$aPara['palign'] = "C";
//$aPara['fitonpage'] = true;

$pdf->Image( 
  $aPara['file'],   $aPara['x'],          $aPara['y'],        $aPara['w'],        $aPara['h'], 
  $aPara['type'],   $aPara['link'],       $aPara['align'],    $aPara['resize'],   $aPara['dpi'], 
  $aPara['palign'], $aPara['ismask'],     $aPara['imgmask'],  $aPara['border'],   $aPara['fitbox'], 
  $aPara['hidden'], $aPara['fitonpage'],  $aPara['alt'],      $aPara['altimgs']
);                                                                                                  // setear imagen como fondo de pagina

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN

// contenido del pdf - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -INI 

// Variables utilizadas en el layout del contenido
$fUnit = 0.169;                                                                                     // el valor de convercion de pixel a mm, no sirve. Se fue probando hasta el actual

$aCamp = array(
  "fXpos" => 100, 
  "fYpos" => 150, 
  "fAnch" => 200,
  "fAlto" => 100,
  "sTemp" => "<div>[valo]</div>",
);

// relacionar los valores de dimension y posicion con los labels de los campos que se mostraran
// para ubicar en el template
// foreach( $aYpdfcamp as $iCampPosi => $aCampInst )
for( $iCamp = 0; $iCamp <= 2; $iCamp++  )
{
	$fUnit2 = $fUnit + $iCamp;
  // convertir los valores que correspondan con la unidad de medida del pdf.
//  $aCamp['fXpos'] = $aImag['iXpos'] + ( $aCamp['fXpos'] * $fUnit );
  $aCamp['fXpos'] = 26.9;
  
//  $aCamp['fYpos'] = $aImag['iYpos'] + ( $aCamp['fYpos'] * $fUnit );
  $aCamp['fYpos'] = 35.35 + ($iCamp*8);
  
  
  // asignar el valor del campo
  $sHtml = str_replace( "[valo]", "Campo Nombre ".$iCamp, $aCamp['sTemp'] );
  
  $pdf->writeHTMLCell( $aCamp['fAnch'], $aCamp['fAlto'], $aCamp['fXpos'], $aCamp['fYpos'], $sHtml, 
    'L', 0, 0, true, 'L', true);
}



// ****************add a page para la segunda pagina   ************************************//
$pdf->AddPage();


// set JPEG quality
$pdf->setJPEGQuality(75);

// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 
$fUnit = $pdf->getImageScale();                                                                     // valor para convertir los pixles a user unit
$aImag = array(
  "iXpos" => 10,                                                                                    // user unit X donde comienza la imagen
  "iYpos" => 10,                                                                                    // user unit Y donde comienza la imagen luego del borde superior
);
// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN 

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 

// construir la ruta del archivo de imagen que sera el template.
$sImagruta = "002-v3.jpg";

$aPara = $aImagData;                                                                                // se copia el template de los paramentros del metodo Image
$aPara['file'] = $sImagruta;                                                                        // asignar la ruta del archivo
$aPara['x'] = '';                                                                                   // asignar la ruta del archivo
$aPara['y'] = '';                                                                                   // asignar la ruta del archivo
//$aPara['align'] = "T";
//$aPara['palign'] = "C";
//$aPara['fitonpage'] = true;

$pdf->Image( 
  $aPara['file'],   $aPara['x'],          $aPara['y'],        $aPara['w'],        $aPara['h'], 
  $aPara['type'],   $aPara['link'],       $aPara['align'],    $aPara['resize'],   $aPara['dpi'], 
  $aPara['palign'], $aPara['ismask'],     $aPara['imgmask'],  $aPara['border'],   $aPara['fitbox'], 
  $aPara['hidden'], $aPara['fitonpage'],  $aPara['alt'],      $aPara['altimgs']
);                                                                                                  // setear imagen como fondo de pagina

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN

// contenido del pdf - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -INI 

// Variables utilizadas en el layout del contenido
$fUnit = 0.169;                                                                                     // el valor de convercion de pixel a mm, no sirve. Se fue probando hasta el actual

$aCamp = array(
  "fXpos" => 100, 
  "fYpos" => 150, 
  "fAnch" => 200,
  "fAlto" => 100,
  "sTemp" => "<div>[valo]</div>",
);

// relacionar los valores de dimension y posicion con los labels de los campos que se mostraran
// para ubicar en el template
// foreach( $aYpdfcamp as $iCampPosi => $aCampInst )
for( $iCamp = 0; $iCamp <= 2; $iCamp++  )
{
	$fUnit2 = $fUnit + $iCamp;
  // convertir los valores que correspondan con la unidad de medida del pdf.
//  $aCamp['fXpos'] = $aImag['iXpos'] + ( $aCamp['fXpos'] * $fUnit );
  $aCamp['fXpos'] = 26.9;
  
//  $aCamp['fYpos'] = $aImag['iYpos'] + ( $aCamp['fYpos'] * $fUnit );
  $aCamp['fYpos'] = 35.35 + ($iCamp*8);
  
  
  // asignar el valor del campo
  $sHtml = str_replace( "[valo]", "Campo Nombre ".$iCamp, $aCamp['sTemp'] );
  
  $pdf->writeHTMLCell( $aCamp['fAnch'], $aCamp['fAlto'], $aCamp['fXpos'], $aCamp['fYpos'], $sHtml, 
    'L', 0, 0, true, 'L', true);
}
//************************** fin de la segunda pagina *****************************////





// ****************add a page para la tercer pagina   ************************************//
$pdf->AddPage();


// set JPEG quality
$pdf->setJPEGQuality(75);

// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 
$fUnit = $pdf->getImageScale();                                                                     // valor para convertir los pixles a user unit
$aImag = array(
  "iXpos" => 10,                                                                                    // user unit X donde comienza la imagen
  "iYpos" => 10,                                                                                    // user unit Y donde comienza la imagen luego del borde superior
);
// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN 

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 

// construir la ruta del archivo de imagen que sera el template.
$sImagruta = "003-v3.jpg";

$aPara = $aImagData;                                                                                // se copia el template de los paramentros del metodo Image
$aPara['file'] = $sImagruta;                                                                        // asignar la ruta del archivo
$aPara['x'] = '';                                                                                   // asignar la ruta del archivo
$aPara['y'] = '';                                                                                   // asignar la ruta del archivo
//$aPara['align'] = "T";
//$aPara['palign'] = "C";
//$aPara['fitonpage'] = true;

$pdf->Image( 
  $aPara['file'],   $aPara['x'],          $aPara['y'],        $aPara['w'],        $aPara['h'], 
  $aPara['type'],   $aPara['link'],       $aPara['align'],    $aPara['resize'],   $aPara['dpi'], 
  $aPara['palign'], $aPara['ismask'],     $aPara['imgmask'],  $aPara['border'],   $aPara['fitbox'], 
  $aPara['hidden'], $aPara['fitonpage'],  $aPara['alt'],      $aPara['altimgs']
);                                                                                                  // setear imagen como fondo de pagina

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN

// contenido del pdf - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -INI 

// Variables utilizadas en el layout del contenido
$fUnit = 0.169;                                                                                     // el valor de convercion de pixel a mm, no sirve. Se fue probando hasta el actual

$aCamp = array(
  "fXpos" => 100, 
  "fYpos" => 150, 
  "fAnch" => 200,
  "fAlto" => 100,
  "sTemp" => "<div>[valo]</div>",
);

// relacionar los valores de dimension y posicion con los labels de los campos que se mostraran
// para ubicar en el template
// foreach( $aYpdfcamp as $iCampPosi => $aCampInst )
for( $iCamp = 0; $iCamp <= 2; $iCamp++  )
{
	$fUnit2 = $fUnit + $iCamp;
  // convertir los valores que correspondan con la unidad de medida del pdf.
//  $aCamp['fXpos'] = $aImag['iXpos'] + ( $aCamp['fXpos'] * $fUnit );
  $aCamp['fXpos'] = 26.9;
  
//  $aCamp['fYpos'] = $aImag['iYpos'] + ( $aCamp['fYpos'] * $fUnit );
  $aCamp['fYpos'] = 35.35 + ($iCamp*8);
  
  
  // asignar el valor del campo
  $sHtml = str_replace( "[valo]", "Campo Nombre ".$iCamp, $aCamp['sTemp'] );
  
  $pdf->writeHTMLCell( $aCamp['fAnch'], $aCamp['fAlto'], $aCamp['fXpos'], $aCamp['fYpos'], $sHtml, 
    'L', 0, 0, true, 'L', true);
}
//************************** fin de la tercer pagina *****************************////



// ****************add a page para la cuarta pagina   ************************************//
$pdf->AddPage();


// set JPEG quality
$pdf->setJPEGQuality(75);

// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 
$fUnit = $pdf->getImageScale();                                                                     // valor para convertir los pixles a user unit
$aImag = array(
  "iXpos" => 10,                                                                                    // user unit X donde comienza la imagen
  "iYpos" => 10,                                                                                    // user unit Y donde comienza la imagen luego del borde superior
);
// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN 

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 

// construir la ruta del archivo de imagen que sera el template.
$sImagruta = "004-v3.jpg";

$aPara = $aImagData;                                                                                // se copia el template de los paramentros del metodo Image
$aPara['file'] = $sImagruta;                                                                        // asignar la ruta del archivo
$aPara['x'] = '';                                                                                   // asignar la ruta del archivo
$aPara['y'] = '';                                                                                   // asignar la ruta del archivo
//$aPara['align'] = "T";
//$aPara['palign'] = "C";
//$aPara['fitonpage'] = true;

$pdf->Image( 
  $aPara['file'],   $aPara['x'],          $aPara['y'],        $aPara['w'],        $aPara['h'], 
  $aPara['type'],   $aPara['link'],       $aPara['align'],    $aPara['resize'],   $aPara['dpi'], 
  $aPara['palign'], $aPara['ismask'],     $aPara['imgmask'],  $aPara['border'],   $aPara['fitbox'], 
  $aPara['hidden'], $aPara['fitonpage'],  $aPara['alt'],      $aPara['altimgs']
);                                                                                                  // setear imagen como fondo de pagina

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN

// contenido del pdf - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -INI 

// Variables utilizadas en el layout del contenido
$fUnit = 0.169;                                                                                     // el valor de convercion de pixel a mm, no sirve. Se fue probando hasta el actual

$aCamp = array(
  "fXpos" => 100, 
  "fYpos" => 150, 
  "fAnch" => 200,
  "fAlto" => 100,
  "sTemp" => "<div>[valo]</div>",
);

// relacionar los valores de dimension y posicion con los labels de los campos que se mostraran
// para ubicar en el template
// foreach( $aYpdfcamp as $iCampPosi => $aCampInst )
for( $iCamp = 0; $iCamp <= 2; $iCamp++  )
{
	$fUnit2 = $fUnit + $iCamp;
  // convertir los valores que correspondan con la unidad de medida del pdf.
//  $aCamp['fXpos'] = $aImag['iXpos'] + ( $aCamp['fXpos'] * $fUnit );
  $aCamp['fXpos'] = 26.9;
  
//  $aCamp['fYpos'] = $aImag['iYpos'] + ( $aCamp['fYpos'] * $fUnit );
  $aCamp['fYpos'] = 35.35 + ($iCamp*8);
  
  
  // asignar el valor del campo
  $sHtml = str_replace( "[valo]", "Campo Nombre ".$iCamp, $aCamp['sTemp'] );
  
  $pdf->writeHTMLCell( $aCamp['fAnch'], $aCamp['fAlto'], $aCamp['fXpos'], $aCamp['fYpos'], $sHtml, 
    'L', 0, 0, true, 'L', true);
}
//************************** fin de la cuarta pagina *****************************////





// ****************add a page para la quinta pagina   ************************************//
$pdf->AddPage();


// set JPEG quality
$pdf->setJPEGQuality(75);

// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 
$fUnit = $pdf->getImageScale();                                                                     // valor para convertir los pixles a user unit
$aImag = array(
  "iXpos" => 10,                                                                                    // user unit X donde comienza la imagen
  "iYpos" => 10,                                                                                    // user unit Y donde comienza la imagen luego del borde superior
);
// Valores de configuracion del pdf  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN 

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - INI 

// construir la ruta del archivo de imagen que sera el template.
$sImagruta = "005-v3.jpg";

$aPara = $aImagData;                                                                                // se copia el template de los paramentros del metodo Image
$aPara['file'] = $sImagruta;                                                                        // asignar la ruta del archivo
$aPara['x'] = '';                                                                                   // asignar la ruta del archivo
$aPara['y'] = '';                                                                                   // asignar la ruta del archivo
//$aPara['align'] = "T";
//$aPara['palign'] = "C";
//$aPara['fitonpage'] = true;

$pdf->Image( 
  $aPara['file'],   $aPara['x'],          $aPara['y'],        $aPara['w'],        $aPara['h'], 
  $aPara['type'],   $aPara['link'],       $aPara['align'],    $aPara['resize'],   $aPara['dpi'], 
  $aPara['palign'], $aPara['ismask'],     $aPara['imgmask'],  $aPara['border'],   $aPara['fitbox'], 
  $aPara['hidden'], $aPara['fitonpage'],  $aPara['alt'],      $aPara['altimgs']
);                                                                                                  // setear imagen como fondo de pagina

// configurar imagen - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - FIN

// contenido del pdf - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -INI 

// Variables utilizadas en el layout del contenido
$fUnit = 0.169;                                                                                     // el valor de convercion de pixel a mm, no sirve. Se fue probando hasta el actual

$aCamp = array(
  "fXpos" => 100, 
  "fYpos" => 150, 
  "fAnch" => 200,
  "fAlto" => 100,
  "sTemp" => "<div>[valo]</div>",
);

// relacionar los valores de dimension y posicion con los labels de los campos que se mostraran
// para ubicar en el template
// foreach( $aYpdfcamp as $iCampPosi => $aCampInst )
for( $iCamp = 0; $iCamp <= 2; $iCamp++  )
{
	$fUnit2 = $fUnit + $iCamp;
  // convertir los valores que correspondan con la unidad de medida del pdf.
//  $aCamp['fXpos'] = $aImag['iXpos'] + ( $aCamp['fXpos'] * $fUnit );
  $aCamp['fXpos'] = 26.9;
  
//  $aCamp['fYpos'] = $aImag['iYpos'] + ( $aCamp['fYpos'] * $fUnit );
  $aCamp['fYpos'] = 35.35 + ($iCamp*8);
  
  
  // asignar el valor del campo
  $sHtml = str_replace( "[valo]", "Campo Nombre ".$iCamp, $aCamp['sTemp'] );
  
  $pdf->writeHTMLCell( $aCamp['fAnch'], $aCamp['fAlto'], $aCamp['fXpos'], $aCamp['fYpos'], $sHtml, 
    'L', 0, 0, true, 'L', true);
}
//************************** fin de la quinta pagina *****************************////




// contenido del pdf - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -FIN */ 

//Close and output PDF document
$pdf->Output('example_009.pdf', 'I');                                                               // send the file inline to the browser (default)
$pdf->Output('example_009.pdf', 'D');                                                               // send to the browser and force a file download with the name given by name.
//$pdf->Output('../d.pdf', 'F');                                                                      // save to a local server file with the name given by name. Se modifico tcpdf_static.php para poder utilizarlo en localhost

// implementacion -----------------------------------------------------------------------------FIN*/

/*/ debug ---------------------------------------------------------------------------------------INI
// debug --------------------------------------------------------------------------------------FIN*/

//include( "pdf.html.php" );