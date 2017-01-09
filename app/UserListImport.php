<?php
namespace App;

class UserListImport extends \Maatwebsite\Excel\Files\ExcelFile {

    public function getFile()
    {
      // Import a user provided file
      $file = Input::file('report');
      $filename = $this->doSomethingLikeUpload($file);

      // Return it's location
      return $filename;
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }

}

?>
