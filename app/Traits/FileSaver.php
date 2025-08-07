<?php


namespace App\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileSaver
{
    public function upload_file($file, $model, $field_name, $base_path)
    {
        // <!-- upload file -->
        if ($file) {
            // <!-- delete file if exist -->
            if (file_exists($model->$field_name)) {
                unlink($model->$field_name);
            }

            // <!-- create unique file name -->
            $new_file_name   = time() . '.' . $file->getClientOriginalExtension();

            // <!-- create upload directory -->
            $directory   = './assets/' . $base_path . '/' . date('Y') . '/';

            // <!-- create store file to directory -->
            $file->move($directory, $new_file_name);

            // <!-- update file name to database -->
            $model->update([$field_name => $directory . $new_file_name]);
        }
    }


    

    public function upload_file_to_google_drive($file, $model, $field_name, $base_path)
    {
        if ($file) {
            $photo = $file;

            $photos_path = $this->uploadPhotos($photo, $model);

            $this->storePhotosData($model, $photos_path);
        }
    }


    public function uploadFileToGoogleDrive($file, $model, $field_name)
    {

        if (isset($file)) {

            try {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $fileData = File::get($file);

                $new_file = Storage::cloud()->put($filename, $fileData);


                // Get root directory contents...
                $contents = collect(Storage::cloud()->listContents('/', false));

                  // <!-- delete file if exist -->
                if (file_exists($model->$field_name)) {
                    Storage::cloud()->delete($model->$field_name);
                }

                // Find the folder you are looking for...
                $file_path = $contents
                    ->where('name', '=', $filename)
                    ->first()['path']; // There could be duplicate directory names!

                // <!-- update file name to database -->
                $model->update([$field_name => $file_path]);
            } catch (\Exception $ex) {
                // dd($ex->getMessage());
            }

        }

    }



    private function uploadGoogleDriveFileWithPath($request, $field_name, $base_name)
    {
        if ($request->hasFile($field_name)){

            $file = $request->file($field_name);

            if (isset($file)){
                $fileName = $base_name.'-'.uniqid().'.'.$file->getClientOriginalExtension();

                $path = $file->store("", 'google');

                $fileName = $path;
                $dir = '/';
                $recursive = false;
                $contents = collect(Storage::cloud()->listContents($dir, $recursive));
                $file = $contents
                    ->where('type', '=', 'file')
                    ->where('filename', '=', pathinfo($fileName, PATHINFO_FILENAME))
                    ->where('extension', '=', pathinfo($fileName, PATHINFO_EXTENSION))
                    ->first();

                $service = Storage::cloud()->getAdapter()->getService();
                $permission = new \Google_Service_Drive_Permission();
                $permission->setRole('reader');
                $permission->setType('anyone');
                $permission->setAllowFileDiscovery(false);
                $permissions = $service->permissions->create($file['basename'], $permission);

                $data = [
                    'file_path' => Storage::cloud()->url($file['path']),
                    'file_name' => $fileName
                ];

                return $data;
            }
        }
    }

    public function deleteGoogleDriveFileByName($filename = null)
    {
        try {
            if ($filename) {
                $dir = '/';
                $recursive = false; // Get subdirectories also?
                $contents = collect(Storage::cloud()->listContents($dir, $recursive));

                $file = $contents
                    ->where('type', '=', 'file')
                    ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
                    ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
                    ->first(); // there can be duplicate file names!

                Storage::cloud()->delete($file['path']);
            }

        } catch (\Exception $ex) {}
    }


    public function deleteGoogleDriveFileByPath($filepath = null)
    {
        try {
            if ($filepath) {
                Storage::cloud()->delete($filepath);
            }
        } catch (\Exception $ex) {}
    }

    public function backupSavedToGoogleDrive($filename, $directory)
    {
        if (file_exists($directory)) {

            try {
                Storage::cloud()->put(public_path('app/backups/dump.sql'), $filename);
                    dd('upload success');
            } catch (\Exception $ex) {
                dd($ex->getMessage());
            }

        }
        dd($filename);
    }
}
