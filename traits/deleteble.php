<?php

trait Deleteble
{
    public function delete(): void
    {
        $text = 'You deleted him 😭';
        printWithBreak($text);
        $text = explode(" ", $text);
        printWithBreak(var_export($text, true));
        $text = implode(";", $text);
        printWithBreak(var_export($text, true));
    }
}