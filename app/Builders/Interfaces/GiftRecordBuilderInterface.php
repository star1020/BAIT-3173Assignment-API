<?php

namespace App\Builders;

interface GiftRecordBuilderInterface
{
    public function get();

    public function readById($id);

    public function create($data);

    public function save();

    public function delete($id);

    public function update($id, $data);
}
