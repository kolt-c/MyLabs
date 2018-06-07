<?php

/**
 * Class CSV
 */
class CSV
{
    /**
     * @var string
     */
    private $file;

    /**
     * @param string $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @param array $data
     */
    public function saveToFile(array $data)
    {
        fputcsv($this->getFileResource(), array_keys(current($data)));
        foreach ($data as $row) {
            fputcsv($this->getFileResource(), $row);
        }

        $this->killFileResource();
    }

    /**
     * @return array
     */
    public function readFromFile()
    {
        $keys = [];
        $data = [];

        $index = 0;
        while ($row = fgetcsv($this->getFileResource('r'))) {
            if ($index === 0) {
                $keys = $row;
            } else {
                $item = [];
                foreach ($row as $key => $value) {
                    $item[$keys[$key]] = $value;
                }
                $data[] = $item;
            }
            $index++;
        }

        return $data;
    }

    /**
     * @var null|resource
     */
    private $resource = null;

    /**
     * @param string $mode
     * @return null|resource
     */
    private function getFileResource($mode = 'w')
    {
        if ($this->resource === null) {
            $this->resource = fopen($this->file, $mode);
        }

        return $this->resource;
    }

    /**
     * @return bool
     */
    private function killFileResource()
    {
        return is_resource($this->resource) ? fclose($this->resource) : true;
    }
}