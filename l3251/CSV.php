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
     * @var null|resource
     */
    private $resource = null;

    /**
     * @return null|resource
     */
    private function getFileResource()
    {
        if ($this->resource === null) {
            $this->resource = fopen($this->file, 'w');
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