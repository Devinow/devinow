<?php

namespace Core\Classes;


class Upload{
    public function send($name, array|string $extensions){
        $dir=__DIR__ . '/../../public/';
        $upload = new \Devinow\FileUpload\FileUpload();
        $upload->withTargetDirectory($dir.'uploads');
        $upload->from($name);
        $upload->withAllowedExtensions($extensions);

        try {
            $uploadedFile = $upload->save();

            $r=str_replace($uploadedFile->getPath(), $dir, '');
        } catch (\Devinow\FileUpload\Throwable\InputNotFoundException $e) {
            $r=false;
        } catch (\Devinow\FileUpload\Throwable\InvalidFilenameException $e) {
            $r=false;
        } catch (\Devinow\FileUpload\Throwable\InvalidExtensionException $e) {
            $$r=false;
        } catch (\Devinow\FileUpload\Throwable\FileTooLargeException $e) {
            $r=false;
        } catch (\Devinow\FileUpload\Throwable\UploadCancelledException $e) {
            $r=false;
        }

        return $r;
    }

    public function exist($name){
        $dir=__DIR__ . '/../../public/uploads/';
        return file_exists($dir.$name);
    }
}

?>