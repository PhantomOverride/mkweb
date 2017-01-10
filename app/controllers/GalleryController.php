<?php
class GalleryController extends BaseController{
    const PATH = "./img/gallery";

    public function index(){
        $directory = $this->get_folders();
        return View::make('gallery.index',['folders' => $directory])->with('nav', Page::navbar());
    }
    public function show($directory){
        $files = $this->get_files($directory);
        return View::make('gallery.show',['directory' => $directory,'files' => $files])->with('nav', Page::navbar());
    }
    public function edit(){
        return View::make('gallery.edit')->with('nav', Page::navbar());
    }

    private function get_folders(){
        $directories = scandir(self::PATH);
        $directories = array_diff($directories, array('..', '.'));
        return $directories;
    }
    private function get_files($subdirectory){
        $files = scandir(self::PATH . '/' . $subdirectory);
        $files = array_diff($files, array('..', '.', 'thumbnail.jpg'));
        return $files;
    }
}