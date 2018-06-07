<?php

/**
 * Class FileUpload
 */
class FileUpload
{
    /**
     * @param string $field
     * @param string $destinationDirectory
     * @return array
     */
    public function uploadFromField($field, $destinationDirectory)
    {
        $uploadedFiles = [];

        $this->prepareFilesToSave($field);
        foreach($this->filesToSave as $file) {
            $isUploaded = move_uploaded_file($file['tmp_name'], $destinationDirectory . $file['name']);
            if ($isUploaded) {
                $uploadedFiles[] = $file['name'];
            }
        }

        return $uploadedFiles;
    }

    /**
     * @var array
     */
    private $filesToSave = [];

    /**
     * @param string $field
     */
    private function prepareFilesToSave($field)
    {
        $filesCount = count($_FILES[$field]['name']);
        $fileKeys = array_keys($_FILES[$field]);

        for ($i = 0; $i < $filesCount; $i++) {
            foreach ($fileKeys as $key) {
                $this->filesToSave[$i][$key] = $_FILES[$field][$key][$i];
            }
        }
    }
}