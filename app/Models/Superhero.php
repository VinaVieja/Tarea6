<?php

namespace App\Models;

use CodeIgniter\Model;

class Superhero extends Model 
{
    protected $table = 'superhero';
    protected $allowedFields = ['id', 'superhero_name', 'full_name', 'race_id', 'alignment_id', 'publisher_id'];

    public function getFilteredSuperheroes($filters = [])
    {
        $builder = $this->builder();
        $builder->select('superhero.*, race.race, alignment.alignment, publisher.publisher_name');
        $builder->join('race', 'race.id = superhero.race_id', 'left');
        $builder->join('alignment', 'alignment.id = superhero.alignment_id', 'left');
        $builder->join('publisher', 'publisher.id = superhero.publisher_id', 'left');

        if (!empty($filters['publisher_id'])) {
            $builder->where('superhero.publisher_id', $filters['publisher_id']);
        }
        if (!empty($filters['race_id'])) {
            $builder->where('superhero.race_id', $filters['race_id']);
        }
        if (!empty($filters['alignment_id'])) {
            $builder->where('superhero.alignment_id', $filters['alignment_id']);
        }

        $builder->orderBy('superhero.superhero_name', 'ASC');

        return $builder->get()->getResultArray();
    }

    public function getSuperHeroByPublisher($publisher_id) 
    {
        return $this->select('superhero.id, superhero.superhero_name, superhero.full_name, race.race, alignment.alignment')
                    ->join('race', 'race.id = superhero.race_id', 'left')
                    ->join('alignment', 'alignment.id = superhero.alignment_id', 'left')
                    ->orderBy('superhero.superhero_name', 'ASC')
                    ->where('superhero.publisher_id', $publisher_id)
                    ->findAll();
    }
}
