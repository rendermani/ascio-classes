<?php
require("vendor/autoload.php");
error_reporting(E_ERROR | E_PARSE);
function generate($inputFile, $outputDir,$ns) {
    $generator = new \Wsdl2PhpGenerator\Generator();
    $generator->generate(
        new \Wsdl2PhpGenerator\Config(array(
                'inputFile' 	=> $inputFile,
                'outputDir' 	=> $outputDir,
        		'namespaceName' => $ns
            )
        )
    );
    $filename = getcwd() . "/" . $outputDir."/"."AscioService.php";
    echo "filename: ".$filename."\n";
   
}
echo "aws v3\n";
generate('https://aws.ascio.com/v3/aws.wsdl','src/v3/service','ascio\v3');
echo "aws v2\n";
generate('https://aws.ascio.com/2012/01/01/AscioService.wsdl','src/v2/service','ascio\v2');
echo "ascio dns\n";
generate('https://dnsservice.ascio.com/2010/10/30/DnsService.wsdl','src/dns/service','ascio\dns');


