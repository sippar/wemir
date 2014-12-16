<?php namespace Wemir\Handlers;

use Input;
use File;

class DataHandler
{
    /**
     * @param  $data
     * @param  $filePath
     * @return mixed
     */
    public function handle($data,$filePath = null)
    {
        if(array_key_exists('slug',$data))
        {
            $data['slug'] = !empty($data['slug']) ? $this->handleSlug($data['slug']): $this->handleSlug($data['name']);
        }
        if($filePath) {
            $inputFileName = key(Input::instance()->files->all());

            if(count(Input::file($inputFileName))) {
                $data[$inputFileName] = $this->imageHandler(Input::file($inputFileName), $filePath );
            }else {
                unset($data[$inputFileName]);
            }
        }
        if(array_key_exists('password', $data) && getCurrentRoute('dashboard.users.update') && empty($data['password']))
        {
            unset($data['password']);
        }
        // dd($data);

        return $data;
    }

    protected function imageHandler($image,$filePath)
    {
        if(! count($image) ) return null;

        $fileExtension  = $image->getClientOriginalExtension();

        do{
            $fileName = str_random(30).".".$fileExtension;
        } while(File::exists(public_path($filePath.$fileName)));

        $image->move(public_path($filePath), $fileName);

        return $filePath.'/'.$fileName;
    }

    /**
     * @param $slug
     * @return string
     */
    protected function handleSlug($slug)
    {
        $tr = [
            "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g","Д"=>"d","Е"=>"e","Ё"=>"e","Ж"=>"j","З"=>"z","И"=>"i","Й"=>"y",
            "К"=>"k","Л"=>"l","М"=>"m","Н"=>"n","О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t","У"=>"u","Ф"=>"f",
            "Х"=>"h","Ц"=>"ts","Ч"=>"ch","Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"i","Ь"=>"j","Э"=>"e","Ю"=>"yu",
            "Я"=>"ya","а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j","з"=>"z","и"=>"i",
            "й"=>"y","к"=>"k","л"=>"l","м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t","у"=>"u",
            "ф"=>"f","х"=>"h","ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y","ы"=>"i","ь"=>"j","э"=>"e",
            "ю"=>"yu","я"=>"ya"," "=>"-","  "=>"-","_"=>"-",
        ];
        $slug = strtolower(strtr($slug,$tr));
        $slug = preg_replace('/[^a-z0-9-]/','',$slug);
        $slug = preg_replace('/-{2,}/','-',$slug);
        return $slug;
    }

} 