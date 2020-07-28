<?php

namespace App\Listeners;

use App\Events\PharaonicViewers;
use App\Models\Pharaonic;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncreaseCounterPharaonic
{

    public $Ids = [];


    public function __construct()
    {

    }

    public function handle(PharaonicViewers $rows)
    {
        $this->UpdateViewers($rows->rows);
    }


    function UpdateViewers($rows)
    {

        if (auth()->check()) {
        $PostUserId = Pharaonic::where('id', $rows->id)->select('user_id')->first();


        $ExtractData = json_decode($PostUserId->user_id);


        if (!$ExtractData) {

            $ExtractData = [];
        }
        foreach ($ExtractData as $OldId) {

            array_push($this->Ids, $OldId);
        }
        if (in_array(auth()->user()->id, $this->Ids)) {

            return false;

        } else {

            array_push($this->Ids, auth()->user()->id);

            $DataCollectionIds = json_encode($this->Ids);

            $rows->viewers = $rows->viewers + 1;

            $rows->user_id = $DataCollectionIds;

            $rows->save();
        }

    }
    }
}
