<?php
require_once "./classes/shapes/circle.php";
require_once "./classes/users/user.php";
require_once "./classes/users/admin.php";
require_once "./classes/owner.php";

function printWithBreak(string $string): void
{
	echo $string . '<br />';
}

$num1 = 10;
$imposterNum = '20';

printWithBreak($num1 + $imposterNum);

printWithBreak($num1 . $imposterNum);

$var = 'hello';
$$var = 'world';
printWithBreak($hello);

printWithBreak(var_export(strlen($var) >= strlen($hello), true));


$smallCircle = new Circle(80);

printWithBreak(number_format($smallCircle->calcSizes(), 2, '.', ' '));

$typicalUser = new User("Danylo", 18);
$typicalUser->showInfo();
$typicalUser->something();
$typicalUser->delete();

Admin::setCompany("PHP");

$typicalAdmin = new Admin(AdminLevels::MainAdmin, "Danylo", 18);
$typicalAdmin->showInfo();
$typicalAdmin->something();

$realOwner = Owner::getInstance();
$fakeOwner = Owner::getInstance();

printWithBreak(var_export($realOwner, true));
printWithBreak(var_export($fakeOwner, true));

?>

<a href="/login.php">Go to login</a>