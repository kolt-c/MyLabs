<?php

/**
 * Class File
 */
class File
{
    /**
     * @var string
     */
    private $file;

    /**
     * File constructor.
     * @param string $file
     * @param bool $create
     * @throws Exception
     */
    public function __construct($file, $create = false)
    {
        if (!file_exists($file) && (false === $create || false === fopen($file, "w"))) {
            throw new Exception('File not exists and can not be created');
        }

        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return basename($this->file);
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->prettifySize(filesize($this->file));
    }

    /**
     * @return bool
     */
    public function getIsReadable()
    {
        return is_readable($this->file);
    }

    /**
     * @return bool
     */
    public function getIsWritable()
    {
        return is_writable($this->file);
    }

    /**
     * @param string $format
     * @return bool|string
     */
    public function getCreatedDate($format = 'Y-m-d H:i:s')
    {
        return date($format, filectime($this->file));
    }

    /**
     * @param string $format
     * @return bool|string
     */
    public function getLastEditedDate($format = 'Y-m-d H:i:s')
    {
        return date($format, filemtime($this->file));
    }

    /**
     * @return string
     */
    public function read()
    {
        return file_get_contents($this->file);
    }

    /**
     * @param string $string
     */
    public function write($string)
    {
        file_put_contents($this->file, $string, FILE_APPEND);
    }

    /**
     * @param int $bytes
     * @return string
     */
    private function prettifySize($bytes)
    {
        switch ($bytes) {
            case $bytes >= 1073741824:
                $size = number_format($bytes / 1073741824) . ' GB';
                break;
            case $bytes >= 1048576:
                $size = number_format($bytes / 1048576, 2) . ' MB';
                break;
            case $bytes >= 1024:
                $size = number_format($bytes / 1024, 2) . ' kB';
                break;
            case $bytes > 1:
                $size = $bytes . ' bytes';
                break;
            case $bytes == 1:
                $size = '1 byte';
                break;
            default:
                $size = '0 bytes';
        }

        return $size;

    }
}
