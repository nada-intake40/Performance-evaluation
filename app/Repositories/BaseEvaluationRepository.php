<?php

namespace App\Repositories;

interface BaseEvaluationRepository{
    public function create(array $attributes);
    public function getByUserAndCycle($user_id, $cycle_id); 	
    // public function update($id, array $attributes);
} 
?>