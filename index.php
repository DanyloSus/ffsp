<?php
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

interface Shape
{
	function calcSizes();
}

class Circle implements Shape
{

	function __construct(private float $radius = 0)
	{
	}

	function calcSizes(): float
	{
		return pi() * pow($this->radius, 2);
	}
}

$smallCircle = new Circle(80);

printWithBreak(number_format($smallCircle->calcSizes(), 2, '.', ' '));

trait Deleteble
{
	public function delete(): void
	{
		$text = 'You deleted him 😭';
		printWithBreak($text);
		$text = explode(" ", $text);
		printWithBreak(var_export($text, true));
	}
}

class User
{
	use Deleteble;

	function __construct(protected string $name = "", protected int $age = 0)
	{
	}

	function showInfo(): void
	{
		printWithBreak($this->name . " " . $this->age);
	}

	function __call($method, $args)
	{
		printWithBreak("Excuse me, '{$method}' doesn't exist ;(");
	}
}

$typicalUser = new User("Danylo", 18);
$typicalUser->showInfo();
$typicalUser->something();
$typicalUser->delete();

enum AdminLevels
{
	case MainAdmin;
	case HelperOfTheMainAdmin;
	case HelperOfSomeHelperOfTheMainAdmin;
	case HelperOfSomeHelperOfSomeHelperOfTheMainAdmin;
}

class Admin extends User
{
	private static string $adminsCompany;

	function __construct(private AdminLevels $adminLevel = AdminLevels::HelperOfSomeHelperOfSomeHelperOfTheMainAdmin, string $name, int $age)
	{
		parent::__construct($name, $age);
	}

	public static function getCompany(): string
	{
		return self::$adminsCompany;
	}

	public static function setCompany(string $newCompany): void
	{
		self::$adminsCompany = $newCompany;
	}

	public function getLevel(): string
	{
		return match ($this->adminLevel) {
			AdminLevels::HelperOfSomeHelperOfSomeHelperOfTheMainAdmin => "Helper Of Some Helper Of Some Helper Of The Main Admin",
			AdminLevels::HelperOfSomeHelperOfTheMainAdmin => "Helper Of Some Helper Of The Main Admin",
			AdminLevels::HelperOfTheMainAdmin => "Helper Of The Main Admin",
			AdminLevels::MainAdmin => "Main Admin",
		};
	}

	function showInfo(): void
	{
		printWithBreak($this->name . " " . $this->age . " - " . $this->getLevel() . " of the " . $this->getCompany());
	}
}

Admin::setCompany("PHP");

$typicalAdmin = new Admin(AdminLevels::MainAdmin, "Danylo", 18);
$typicalAdmin->showInfo();
$typicalAdmin->something();

class Owner
{
	private static $wasCreated = false;

	private function __construct()
	{
	}

	private function __clone()
	{
	}

	public static function getInstance(): Owner|null
	{
		if (!self::$wasCreated) {
			self::$wasCreated = true;
			return new Owner();
		}
		return null;
	}
}


$realOwner = Owner::getInstance();
$fakeOwner = Owner::getInstance();

printWithBreak(var_export($realOwner, true));
printWithBreak(var_export($fakeOwner, true));

?>

<a href="/login.php">Go to login</a>