<?php

namespace App\Builders\Interfaces;
interface FreeGiftBuilderInterface
{
    public function get();
    
    public function readById($id);
    
    public function create($data);
    
    public function save();
    
    public function delete($id);
    
    public function decrease($id);
    
    public function increase($id);
    
    public function update($id, $data);
}
