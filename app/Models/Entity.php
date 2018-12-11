<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Entity extends Model
{

    private const PAGE_SIZE = 10;

    protected $table = 'entities';

    protected $fillable = ['name', 'phone', 'email', 'street', 'number', 'complement', 'city_id'];

    public $timestamps = true;

    public function city(){
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function reports(){
        return $this->hasMany(Report::class, 'entity_id', 'id');
    }

    public function contacts(){
        return $this->hasMany(Contact::class, 'entity_id', 'id');
    }


    public function toArraySorted($resultList)
    {
       $array = array();
       foreach ($resultList as $report){
           array_push($array, $report);
       }

       return $array;
    }

    /**
     * Retorna os relatos com filtro
     * (Le gambiarra del Roger)
     * @param $status id do status, null para todos
     * @param $category id da categoria, null para todas
     * @return reports
     */
    public function reportsFiltered($status = null, $category = null){
        $reports = null;
        if ($status == null && $category == null){
            $reports = Report::where('entity_id', $this->id)
                ->orderBy('id','DESC')
                ->paginate(self::PAGE_SIZE);
        }else if($category == null){
            $reports = Report::where('entity_id',$this->id)
                ->where('status',$status)
                ->orderBy('id','DESC')
                ->paginate(self::PAGE_SIZE);
        }else if($status == null){
            $reports = Report::where('entity_id',$this->id)
                ->where('category_id',$category)
                ->orderBy('id','DESC')
                ->paginate(self::PAGE_SIZE);
        }else{
            $reports = Report::where('entity_id',$this->id)
                ->where('category_id',$category)
                ->where('status',$status)
                ->orderBy('id','DESC')
                ->paginate(self::PAGE_SIZE);
        }
        return $reports;
    }

    public function contactsPaginated(){
        return Contact::where('entity_id', $this->id)
            ->orderBy('id', 'DESC')
            ->paginate(self::PAGE_SIZE);
    }

}
