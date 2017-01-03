<?php
class GalleryController extends BaseController{

    public function index(){
        $folders = $this->get_folders();
        return View::make('gallery.index',['folders' => $folders])->with('nav', Page::navbar());
    }

    private function get_folders(){
        $path = "./img/gallery";
        $directories = scandir($path);
        $directories = array_diff($directories, array('..', '.'));
        return $directories;
    }
}