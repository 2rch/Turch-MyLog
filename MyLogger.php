<?php

namespace vendor\Turch;

class MyLogger extends \Monolog\Logger implements LoggerInterface
{
    public $name;
    public static string $WrongId;

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }
    public function myLog($level, $message, array $context = array())
    {
        if ($this->name === '')
        {
           $handle = fopen(__DIR__ . "/logs/Logs.txt", 'a');
            $date = date('Y-m-d h:i:s');
            $context = implode(',', $context);
            $message = (
            "Date: {$date}\n
                Level: {$level}\n
                Message: {$message}\n
                Context: {$context}\n
                ______________________\n"
            );
            fwrite($handle, $message);
            fclose($handle);
            self::$WrongId = $context;
        }
    }
}
