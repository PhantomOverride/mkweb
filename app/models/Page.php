<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Page extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';
        
        protected $fillable = ['urlname','name','title','content','parentname','order','linkto'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
        
        public function setParentnameAttribute($value){
            $this->attributes['parentname'] = (empty($value)) ? null : $value;
        }
        public function setLinktoAttribute($value){
            $this->attributes['linkto'] = (empty($value)) ? null : $value;
        }
  
        
        /*
         * navbar returns a 3-depth array:
         * $navbar[$mainpage][0-n] returns pages.
         * 
         */
        
        public function urlNames(){
            if($this->parenturl == null){
                return $this->urlname;
            }
            else{
                return $this->parenturlname.'/'.$this->urlname;
            }
        }
        
        static public function navbar(){
            $pages = Page::orderby('order','asc')->whereparentname(null)->get();
            $main = array();
            
            foreach($pages as $page){
                $link = ($page->linkto == null) ? '/page/'.$page->urlname : $page->linkto;
                $current = array(
                    'name' => $page->name,
                    'urlname' => $page->urlname,
                    'link' => $link
                );
            $main[$current['urlname']]=array();
            $main[$current['urlname']][]=$current;
            }
            
            $pages = Page::orderby('order','asc')->wherenotnull('parentname')->get();
            
            foreach($pages as $page){
                $link = ($page->linkto == null) ? '/page/'.$page->parentname.'/'.$page->urlname : $page->linkto;
                $current = array(
                    'name' => $page->name,
                    'urlname' => $page->urlname,
                    'parentname' => $page->parentname,
                    'link' => $link
                );
            $main[$current['parentname']][]=$current;
            }
            return $main;
        }

}
