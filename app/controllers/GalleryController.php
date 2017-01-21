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
    public function create(){
        $data = Input::only(['name']);
        if(is_dir('img/gallery/' . $data['name'])){
            return Redirect::back()->withInput()->withErrors("Foulder with name allready exists");
        }
        $success = mkdir('img/gallery/' . $data['name'], 0777);
        if($success){
            return Redirect::to('gallery/' . $data['name']);
        }
        else{
            return Redirect::back()->withInput()->withErrors("Couldn't create folder");
        }
    }
    public function upload($directory){
        return View::make('gallery.upload',['directory' => $directory])->with('nav', Page::navbar());
    }
    public function images($directory){
        $sucess = false;
        $failed = 0;
        $text = "";

        if(Input::hasFile('files')){
            $files = Input::file('files');
            $rules = [
                'file' => 'required|image'
            ];
            $destination = 'img/gallery/' . $directory;
            foreach($files as $f){
                $validator = Validator::make(['file'=>$f], $rules);
                if($validator->passes()){
                    $filename = $f->getClientOriginalName();
                    if(!file_exists(public_path($destination . '/' . $filename))){
                        if(!$f->move($destination, $filename)){
                            $failed++;
                            $text = $f->getClientOriginalName() . '<br />';
                        }
                        else{
                            $sucess = true;
                        }
                    }
                    else{
                        $failed++;
                        $text = $f->getClientOriginalName() . ' The image does already exists in this gallery<br />';
                    }
                }
                else{
                    $failed++;
                    $text = $f->getClientOriginalName() . '<br />';
                }
            }
        }

        if($sucess && ($failed > 0) ){
            return Redirect::to('gallery/' . $directory)->with('message',$text);
        }
        else if($sucess){
            return Redirect::to('gallery/' . $directory);
        }
        else{
            return Redirect::back()->withInput()->withErrors("Couldn't upload images<br/>" . $text);
        }
    }

    private function get_folders(){
        $directories = scandir(self::PATH);
        $directories = array_diff($directories, array('..', '.'));
        return $directories;
    }
    private function get_files($subdirectory){
        $files = scandir(self::PATH . '/' . $subdirectory);
        $files = array_diff($files, array('..', '.', 'thumbnail.jpg', 'twitter.jpg', 'og.jpg'));
        return $files;
    }
}