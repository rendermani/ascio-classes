<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$tradeMark =  new ascio\TradeMark();
$tradeMark->setName("John Doe");
$tradeMark->setCountry("DK");
$tradeMark->setDate("DateTest");
$tradeMark->setNumber("NumberTest");
$tradeMark->setType("owner");
$tradeMark->setContact("ContactTest");
$tradeMark->setContactLanguage("ContactLanguageTest");
$tradeMark->setDocumentationLanguage("DocumentationLanguageTest");
$tradeMark->setSecondContact("SecondContactTest");
$tradeMark->setThirdContact("ThirdContactTest");
$tradeMark->setRegDate("RegDateTest");