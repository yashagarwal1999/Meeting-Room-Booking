<?php
$proc=new XsltProcessor;
$proc->importStylesheet(DOMDocument::load("TnCstyle.xsl")); //load XSL script
echo $proc->transformToXML(DOMDocument::load("TnC.xml")); //load XML file and echo
?>
