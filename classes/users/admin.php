<?php
require_once realpath(dirname(__FILE__) . "/../../enums/adminLevels.php");
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