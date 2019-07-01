<?php

namespace Game;

class FileLogger implements Logger
{
    public function info($message)
    {
        file_put_contents(
            __DIR__ . '/../storage/log.txt',
            $message . "\n",
            FILE_APPEND
        );
    }
}
