<?php

namespace App\Repositories;

use App\Repositories\Interfaces\MembershipRepositoryInterface;
use App\Models\Membership;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MembershipRepository implements MembershipRepositoryInterface
{
    public function allMembership(){
        return Membership::where('deleted', 0)
                        ->get();
    }

    public function storeMembership($data){

    }

    public function findMembership($id){

    }

    public function updateMembership($data, $id){

    }

    public function destroyMembership($id){

    }
    
}
