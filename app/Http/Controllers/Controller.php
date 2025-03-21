<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserMeta;

use App\Models\Content_meta;
use App\Models\Term;
use App\Models\Term_meta;

use App\Models\SiteMeta;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(){
        // $site_meta = [];
        // if (Schema::hasTable('site_meta')) {
        //     $site_all_meta = SiteMeta::get();
        //     $site_meta = new SiteMeta();
        //     foreach ($site_all_meta as $site_metas) {
        //         $site_meta[$site_metas->meta_key] = $site_metas->meta_value;
        //     }
        // }
        // View::share('site_meta', $site_meta);
    }

    // public function checkDBExists(){
    //     $db = DB::connection();
    //     $db = DB::connection()->getDatabaseName();
    //     return $db;
    // }

    // public function redirectOnNoDBExists($tables=['site_meta'], $db=1, $user_role=3){
    //     $redirect = 'notfound';
    //     $is_redirect = 0;
        
    //     // if($db){
    //     //     try {
    //     //         DB::connection()->getPDO();
    //     //     } catch (\Exception $e) {
    //     //         $is_redirect = 1;
    //     //     }
    //     // }

    //     switch( $user_role ){
    //         // case 1: $redirect = 'admin.login'; break;
    //         // case 2: $redirect = 'notfound'; break;
    //         // case 3: $redirect = 'notfound'; break;
    //         default: $redirect = 'notfound'; break;
    //     }
        
    //     if(count($tables) > 0){
    //         foreach($tables as $table){
    //             if (!Schema::hasTable($table)) {
    //                 $is_redirect = 1;
    //             }
    //             else{
    //                 $is_redirect = 0;
    //             }
    //         }
    //     }
    //     if($is_redirect && !Route::is($redirect)){
    //         redirect()->route($redirect)->send();
    //     }
    // }

    // Generate
    public function generateSlug($name){
        return str_replace(' ', '-', strtolower($name));
    }
    public function generateUserName($limit=10){
        $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $unique_code = 'AQ';
        $unique_code .= substr(str_shuffle($str), 0, $limit);
        return $unique_code;
    }

    public function generateUserPassword($user_type, $auto=1, $limit=10){
        $unique_code = '';
        if($auto){
            $unique_code = 'TMS';
            // $unique_code .= substr(strtoupper($user_type), 0, 3) .'-';
            // $unique_code .= $user_id;
        }
        else{
            $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $unique_code .= substr(str_shuffle($str), 0, $limit);
        }

        return $unique_code;
    }


    public function getModel($name){
        return app('App\Models\\' . $name);
    }

    public function newModel($name){
        return app('App\Models\\' . $name); //i don't know but it works
    }

    public function newContent(){
        return app('App\Models\Content');
    }

    public function newContentMeta(){
        return app('App\Models\Content_meta');
    }

    public function newTerm(){
        return app('App\Models\Term');
    }

    public function newTermMeta(){
        return app('App\Models\Term_meta');
    }




    public function content($type, $limit='all', $id=0, $withmeta=1){
        switch ($limit) {
            case 'first':
                $contents = app('App\Models\Content')::where(['id' => $id, 'content_type' => $type])->get();
                break;
            
            default:
                $contents = app('App\Models\Content')::where(['content_type' => $type])->get();
                break;
        }

        if($withmeta){
            foreach ($contents as $key => $content) {
                $content_metas = Content_meta::where(['content_id' => $content->id, 'content_type' => $type])->get();
                foreach ($content_metas as $content_meta) {
                    $contents[$key][$content_meta->meta_key] = $content_meta->meta_value;
                }
            }
        }

        return ($limit == 'first') ? (count($contents) > 0) ? $contents[0] : false : $contents;
    }

    public function content_meta($type, $limit='all', $id=0, $meta_key='', $action='', $meta_value=''){
        switch ($limit) {
            case 'first':
                if($action == 'delete'){
                    $contents = Content_meta::where(['content_type' => $type, 'content_id' => $id, 'meta_key' => $meta_key])->delete();
                }
                else if($action == 'update'){
                    $contents = Content_meta::where(['content_type' => $type, 'content_id' => $id, 'meta_key' => $meta_key])->update(['meta_value' => $meta_value]);
                }
                else{
                    $contents = Content_meta::where(['content_type' => $type, 'content_id' => $id, 'meta_key' => $meta_key])->get();
                }
                break;
                
            default:
                if($action == 'delete'){
                    $contents = Content_meta::where(['content_type' => $type, 'content_id' => $id])->delete();
                }
                else{
                    $contents = Content_meta::where(['content_type' => $type, 'content_id' => $id])->get();
                }
                break;
        }

        if($action != 'delete' && $action != 'update'){
            return ($limit == 'first') ? (count($contents) > 0) ? $contents[0] : false : $contents;
        }
    }


    public function user($type, $limit='all', $id=0){
        $role = 0;
        switch ($type) {
            case 'admin':
                $role = 1;
                break;
            
            case 'customer':
                $role = 3;
                break;
                        
            default:
                $role = 2;
                break;
        }

        switch ($limit) {
            case 'first':
                if($type){
                    $users = User::where(['id' => $id, 'role' => $role])->get();
                }
                else{
                    $users = User::where(['id' => $id])->get();
                }
                break;
            
            default:
                if($type){
                    $users = User::where(['role' => $role])->get();
                }
                else{
                    $users = User::get();
                }
                break;
        }

        return ($limit == 'first') ? (count($users) > 0) ? $users[0] : false : $users;
    }

    public function site_meta($meta_key='', $limit='all'){
        switch ($limit) {
            case 'first':
                $site_meta = SiteMeta::where(['meta_key' => $meta_key])->get();
                break;
            
            default:
                $site_meta = SiteMeta::get();
                break;
        }

        return ($limit == 'first') ? (count($site_meta) > 0) ? $site_meta[0] : false : $site_meta;
    }


    // Term
    public function term($type, $limit='all', $id=0, $withmeta=1){
        switch ($limit) {
            case 'first':
                $terms = app('App\Models\Term')::where(['id' => $id, 'term_type' => $type])->get();
                break;
            
            default:
                $terms = app('App\Models\Term')::where(['term_type' => $type])->get();
                break;
        }

        if($withmeta){
            foreach ($terms as $key => $term) {
                //$term_metas = Term_meta::where(['term_id' => $term->id])->get();
                $term_metas = Term_meta::where(['term_id' => $term->id, 'term_type' => $type])->get();
                foreach ($term_metas as $term_meta) {
                    $terms[$key][$term_meta->meta_key] = $term_meta->meta_value;
                }
            }
        }

        return ($limit == 'first') ? (count($terms) > 0) ? $terms[0] : false : $terms;
    }

    public function term_meta($type, $limit='all', $id=0, $meta_key='', $action='', $meta_value=''){
        switch ($limit) {
            case 'first':
                if($action == 'delete'){
                    $terms = Term_meta::where(['term_type' => $type, 'term_id' => $id, 'meta_key' => $meta_key])->delete();
                }
                else if($action == 'update'){
                    $terms = Term_meta::where(['term_type' => $type, 'term_id' => $id, 'meta_key' => $meta_key])->update(['meta_value' => $meta_value]);
                }
                else{
                    $terms = Term_meta::where(['term_type' => $type, 'term_id' => $id, 'meta_key' => $meta_key])->get();
                }
                break;

            // case 'whole':
            //     if($action == 'delete'){
            //         //$terms = Term_meta::where(['term_type' => $type, 'term_id' => $id, 'meta_key' => $meta_key])->delete();
            //     }
            //     else if($action == 'update'){
            //         //$terms = Term_meta::where(['term_type' => $type, 'term_id' => $id, 'meta_key' => $meta_key])->update(['meta_value' => $meta_value]);
            //     }
            //     else{
            //         $terms = Term_meta::where(['term_type' => $type])->get();
            //     }
            //     break;
                
            default:
                if($action == 'delete'){
                    $terms = Term_meta::where(['term_type' => $type, 'term_id' => $id])->delete();
                }
                else{
                    $terms = Term_meta::where(['term_type' => $type, 'term_id' => $id])->get();
                }
                break;
        }
    }

    public function checkUploadedFileProperties($extension, $fileSize){
        $msg1 = '';
        $valid_extension = array("png", "jpeg", "jpg");
        $maxFileSize = 2097152;

        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize <= $maxFileSize) {
            }
            else {
                //throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error}
                $msg1 = 'not found';
            }
        }
        else {
            //throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
            $msg1 = 'invalid ext';
        }
        echo $msg1;
    }

}
