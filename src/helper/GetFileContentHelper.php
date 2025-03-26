<?php

namespace Jaydoesphp\PSGCphp\helper;

/**
 * Get file content helper
 */
class GetFileContentHelper
{
    /**
     * Get file content
     * 
     * @param string $path
     * @return array
     */
    public static function content(string $filename): array
    {
        $path = realpath(__DIR__ . '/../resources/json/' . $filename);

        if (!file_exists($path)) {
            return [];
        }

        return json_decode(file_get_contents($path), true);
    }

}
