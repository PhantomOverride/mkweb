<?php
class GalleryController extends BaseController{
    const PATH = "./img/gallery";

    public function index(){
        $folders = $this->get_folders();
        return View::make('gallery.index',['folders' => $folders])->with('nav', Page::navbar());
    }

    private function get_folders(){
        $directories = scandir(self::PATH);
        $directories = array_diff($directories, array('..', '.'));
        return $directories;
    }
}