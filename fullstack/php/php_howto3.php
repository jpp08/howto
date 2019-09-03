<?php

/*

http://sandbox.onlinephpfunctions.com/
http://www.writephponline.com/
https://www.runphponline.com/
https://paiza.io/projects/-8nCBxIJrewWvIYOsYippw
https://repl.it/languages/php
http://www.compileonline.com/execute_php_online.php
http://phptester.net/

 */

################################################################
#
#    declare(strict_types=1);
#
################################################################

/*
http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.strict
http://php.net/manual/en/functions.returning-values.php#functions.returning-values.type-declaration
http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration
 */

################################################################
#
#  check interval
#
################################################################

if (intval(date("H")) >= 7 && intval(date("H")) <= 19) {
    // do not
}

$intDateTimeFrom = strtotime(date("Y-m-d", time()) . " " . "07:00:00");
$intDateTimeTo = strtotime(date("Y-m-d", time()) . " " . "19:00:00");
if (time() >= $intDateTimeFrom && time() <= $intDateTimeTo) {
    // do not
}

################################################################
#
# file_put_contents
#
################################################################
/*
http://php.net/manual/de/context.php
http://php.net/manual/de/function.stream-context-create.php
http://php.net/manual/de/function.file-put-contents.php
 */

file_put_contents($file, $person, FILE_APPEND | LOCK_EX);

################################################################
#
#    array 2 object
#    https://stackoverflow.com/questions/1869091/how-to-convert-an-array-to-object-in-php
#
################################################################

# simplest case
$object = (object) $array;

# loop case
$object = new stdClass();
foreach ($array as $key => $value) {
    $object->$key = $value;
}

#json style
$object = json_decode(json_encode($array), false);

################################################################
#
#     datatypes in PHPdoc @param
#
################################################################
/*
The datatype should be a valid PHP type (int, string, bool, etc), a class name for the type of object, or simply "mixed".
Further, you can list multiple datatypes for a single parameter by delimiting them with the pipe (e.g. "@param int|string $p1").
 */
/*
https://manual.phpdoc.org/HTMLSmartyConverter/HandS/phpDocumentor/tutorial_tags.param.pkg.html
https://stackoverflow.com/questions/11663125/two-or-more-datatypes-in-phpdoc-param
http://docs.phpdoc.org/references/phpdoc/tags/param.html
http://docs.phpdoc.org/guides/types.html

https://www.pythonforbeginners.com/system/python-sys-argv
http://php.net/manual/en/reserved.variables.argv.php
http://php.net/manual/en/function.getopt.php
http://php.net/manual/en/reserved.variables.argc.php

http://php.net/manual/de/language.oop5.abstract.php
http://php.net/manual/de/language.oop5.static.php
http://php.net/manual/de/reserved.classes.php
http://php.net/manual/de/language.types.object.php#language.types.object.casting

 */

#----------------------------------
# Error Control Operators sign (@). The @-operator works only on expressions.
#----------------------------------
/*
http://php.net/manual/en/language.operators.errorcontrol.php
http://php.net/manual/de/function.rename.php
 */

#----------------------------------
# @tags
#----------------------------------
// https://docs.phpdoc.org/references/phpdoc/tags/var.html

#----------------------------------
# Checks if the given key or index exists in the array
# http://php.net/manual/de/function.array-key-exists.php
#----------------------------------

$search_array = array('erstes' => 1, 'zweites' => 4);
if (array_key_exists('erstes', $search_array)) {
    echo "Das Element 'erstes' ist in dem Array vorhanden";
}

############################################################
#
# PHP RMTREE
#
############################################################

/*
python rmtree
https://docs.python.org/2/library/shutil.html

perl rmtree
https://perldoc.perl.org/File/Path.html

php rmtree
https://gist.github.com/SteelPangolin/1407308
https://hotexamples.com/examples/-/PublicFileManager/rmtree/php-publicfilemanager-rmtree-method-examples.html
https://hotexamples.com/de/examples/-/-/rmtree/php-rmtree-function-examples.html
 */

function rmtree($path)
{
    if (is_dir($path)) {
        foreach (scandir($path) as $name) {
            if (in_array($name, array('.', '..'))) {
                continue;
            }
            $subpath = $path . DIRECTORY_SEPARATOR . $name;
            rmtree($subpath);
        }
        rmdir($path);
    } else {
        unlink($path);
    }
}
/*
function rmtree($dir)
{
if (false === file_exists($dir)) {
return false;
}
$iterator = new DirectoryIterator($dir);
foreach ($iterator as $entry) {
$basename = $entry->getBasename();
if ($entry->isDot() || '.' === $basename[0]) {
continue;
}
if ($entry->isDir()) {
rmtree($entry->getPathname());
} else {
unlink($entry->getPathname());
}
}
rmdir($dir);
return true;
}*/

############################################################
#
# php debug trace
#
############################################################
/*
https://www.php.net/manual/de/function.debug-backtrace.php
https://www.php.net/manual/de/function.debug-print-backtrace.php
https://www.php.net/manual/en/function.debug-backtrace.php
 */
var_dump(debug_backtrace());
debug_print_backtrace();
$e = new Exception();
print_r($e->getTraceAsString());

############################################################
#
# get user info
#
############################################################

$benutzerinfo = posix_getpwnam("tom");
print_r($benutzerinfo);

/*
Array
(
[name]    => tom
[passwd]  => x
[uid]     => 10000
[gid]     => 42
[gecos]   => "tom,,,"
[dir]     => "/home/tom"
[shell]   => "/bin/bash"
)*/

############################################################
#
# AVG Value
#
############################################################

$a = array_filter($a);
$average = array_sum($a) / count($a);
echo $average;

if (count($a)) {
    $a = array_filter($a);
    echo $average = array_sum($a) / count($a);
}

############################################################
#
#   How to output in CLI during execution of PHP Unit tests?
#
#   https://stackoverflow.com/questions/7493102/how-to-output-in-cli-during-execution-of-php-unit-tests
#   https://hotexamples.com/examples/codeception.util/Debug/setOutput/php-debug-setoutput-method-examples.html
#   https://hotexamples.com/examples/codeception.util/Debug/-/php-debug-class-examples.html
#   https://phpunit.de/manual/6.5/en/appendixes.assertions.html
#
############################################################

fwrite(STDOUT, __METHOD__ . "\n");
fwrite(STDERR, "LOG: Message 2!\n");
file_put_contents('php://stderr', "LOG: Message 3!\n", FILE_APPEND);

# codeception with debug active
use \Codeception\Util\Debug as UnitDebug;
UnitDebug::debug("~~~test~~");

###################################################################################
# Asynchronous soap calls
###################################################################################
/*
https://tideways.com/profiler/blog/using-http-client-timeouts-in-php
https://medium.com/@mouneyrac/php-soap-does-asynchronous-calls-sometimes-d09fd991f7a3
 */
$options = array(“features” => SOAP_WAIT_ONE_WAY_CALLS);
$soapclient = new SoapClient($wsdl, $options);

ini_set('default_socket_timeout', 1);
$client = new SOAPClient($wsdl, array('connection_timeout' => 1));

// quick and dirty
sleep(15);

/*
#################################################################################
Basic Usage PHP imagick
#################################################################################
*/
/*https://www.php.net/manual/de/imagick.examples-1.php*/

header('Content-type: image/jpeg');
$image = new Imagick('image.jpg');
// If 0 is provided as a width or height parameter,
// aspect ratio is maintained
$image->thumbnailImage(100, 0);
echo $image;

#################################################################################
# write console output for codeception
#################################################################################

fwrite(STDERR, "Msg here.\n");
exit(1); //

#################################################################################
# limit output avoiding to write footer into download file
#################################################################################

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file)); // most important
    ob_clean();
    flush();
    readfile($file);
    exit;
}

#################################################################################
#   Suppress output terminal
#################################################################################

# https://serverfault.com/questions/41964/how-to-hide-the-output-of-a-shell-application-in-linux
# https://stackoverflow.com/questions/6708145/how-to-hide-system-output
# https://www.php.net/manual/de/function.system.php

/*
program > /dev/null # standard output - you'll still see any errors
program &> /dev/null # redirect all output, including errors.
program 2>&1  # This sends 2 (stderr) into 1 (stdout), and sends stdout to file.log*/

##Display output in php
echo "Hello, ";
system("ls -l");
echo "world!\n";

##Suppress output in php
echo "Hello, ";
exec("ls -l");
echo "world!\n";

# or
# <?php  ob_start();  echo '<pre>';  $last_line = system('ls');  ob_clean();  echo 'nothing returned!';


#################################################################################
#
#	Do You Clone the DateTime Objects?
#	http://axiac.ro/blog/dont-forget-to-clone-the-datetime-objects/
#	https://stackoverflow.com/questions/2579458/how-do-i-deep-copy-a-datetime-object
#	https://www.php.net/manual/en/class.datetime.php
#
#	Later edit (August 2017)
#	Since PHP 5.5 it’s better to use DateTimeImmutable objects whenever it’s possible. They cannot be modified after they are
#	created (they behave like true
#	Value Objects). The methods declared in DateTimeInterface that modify the DateTime objects automatically create and return
#	clones for DateTimeImmutable #objects.
#
#################################################################################

$date1 = new DateTime();
$date2 = new DateTime();
$date2 = clone $date1;
$date2->add(new DateInterval('P3Y'));

$date1 = new DateTime();
$date2 = clone $date1;
$date2->add(new DateInterval('P3Y'));

$date1 = new DateTimeImmutable();
$date2 = $date1->add(new DateInterval('P3Y'));

$date1 = new DateTime();
$date2 = (clone $date1)->modify('+3 years');

$date = \DateTimeImmutable::createFromMutable($mutableDate)


#################################################################################
#
#   PHP: Return all the keys of an array
#   https://www.php.net/manual/de/function.array-keys.php
#
#################################################################################

print_r(array_keys($myArr));

#################################################################################
#
# loops
#
#################################################################################

while(list($key, $value) = each($array1)){
    print $key . " - " . $value."<br>";
	unset($array1[$key]);
	continue;
}
foreach($array1 as $key => $value){
    print $key . " - " . $value."<br>";
	unset($array1[$key]);
	continue;
}

#################################################################################
// PHP | Check if two arrays contain same elements
// http://phptester.net/
// https://www.php.net/manual/de/function.array-diff.php
// https://www.php.net/manual/de/language.operators.array.php
// https://www.geeksforgeeks.org/php-check-if-two-arrays-contain-same-elements/
// https://eddmann.com/posts/handling-array-equality-in-php/
// http://thinkofdev.com/equal-identical-and-array-comparison-in-php/
// https://stackoverflow.com/questions/8283464/php-check-if-arrays-are-identical/8283475
// https://stackoverflow.com/questions/5678959/php-check-if-two-arrays-are-equal
#################################################################################

$arM = array(
	1 => array(
		'1' => 12,
		'3' => 14,
		'6' => 11
	),
	2 => array(
		'1' => 12,
		'3' => 14,
		'6' => 11
	),
	3 => array(
		'3' => 14,
		'1' => 12,
		'6' => 11
	),
	4 => array(
		'1' => 11,
		'3' => 14,
		'6' => 11
	)
);

$arN = $arM;
$bNotSame = 0;
foreach($arM as $keyMM=>$arrMM){
	foreach($arN as $keyNN=>$arrNN){
		if($arrMM != $arrNN){
			echo "<br>".$keyNN." not identical ".$keyMM;
		}
		$result = array_diff($arrMM,$arrNN);
		if(count($result)){
			$bNotSame = 1;
		}
	}
}
echo "<br>". $bNotSame;


#################################################################################
#
#   How to put string in array, split by new line in PHP ?
#   https://www.geeksforgeeks.org/how-to-put-string-in-array-split-by-new-line-in-php/
#
#################################################################################

$arr = explode("\n", $str);
$arr= preg_split ('/\n/', $str);


#################################################################################
#
#   NPL PHP
#
#################################################################################
/*
https://www.php.net/manual/en/function.strtok.php
https://www.php.net/strtok
http://phptester.net/
https://www.php.net/manual/en/function.split.php
https://www.php.net/manual/en/function.explode.php
https://www.php.net/manual/en/tokenizer.examples.php
https://github.com/soloproyectos-php/text-tokenizer
http://php-nlp-tools.com/
https://github.com/angeloskath/php-nlp-tools
https://github.com/agentile/PHP-Stanford-NLP
*/

$string = "This is\tan example\nstring";
/* Use tab and newline as tokenizing characters as well  */
$tok = strtok($string, " \n\t");

while ($tok !== false) {
    echo "Word=$tok<br />";
    $tok = strtok(" \n\t");
}

#################################################################################
#
#   How do I make a secure connection to a CXF service using php
#   Apache CXF Client mit Basic Authentication
#   Accessing WS-Security protected (UsernameToken) WebService using PHP5 Soap
#   Using their example and the PHP code they posted on the website: soap-wsse.php and xmlseclibs.php, I have been able to test my CXF-powered webservice.
#   http://sastriawan.blogspot.com/2010/01/accessing-ws-security-protected.html
#   https://github.com/hglattergotz/ExactTarget-PHP-SOAP-API/blob/master/soap-wsse.php
#
#################################################################################

require('soap-wsse.php');

class mySoap extends SoapClient {
   function __doRequest($request, $location, $saction, $version) {
    $doc = new DOMDocument('1.0');
    $doc->loadXML($request);
    $objWSSE = new WSSESoap($doc);
    $objWSSE->addUserToken("admin", "admin", false);
    return parent::__doRequest($objWSSE->saveXML(), $location, $saction, $version);
   }
}

$wsdl = 'http://localhost:9090/WS?wsdl';
$sClient = new mySoap($wsdl, array('trace'=>1));
$wrapper->word = new SoapVar("Echo testing", XSD_STRING);
$result = $sClient->echo($wrapper);
print_r($result->return);
