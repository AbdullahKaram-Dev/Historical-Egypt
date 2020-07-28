<?php

use Illuminate\Database\Seeder;

class Homepage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Homepage::create([

            'title' => 'Egypt Civilization',
            'content' => 'Egypt came first then history came, this important and expressive sentence that is said in the history and civilization of ancient Egypt, which is considered one of the first civilizations in the history of humanity, it is as old as man, and it has great importance where the discovery of agriculture and stability and the principles of building the state and then came after the principles of human civilization moved Through generations to us, what do you know about the civilization of ancient Egypt? On this site you will find sufficient and sufficient information about the stages of the history of ancient and modern Egypt and the dazzling Egyptian civilization throughout the ages. There is no great exaggeration here when we say that Egypt is the first and oldest government on the face of the earth, it started in the sixth millennium BC, specifically in the year 5500 BC according to the effects that archaeologists talked about, as Egyptians, especially in deserts and mountains, began to settle on the banks of the Nile And doing agriculture after life depended on hunting and catching for hundreds, but it can be said at least a thousand years before this date, This ancient historical march began in the extreme development when the Egyptian man began to settle on the banks of the Nile and do agriculture and then start building villages, then spreading villages and moving to the stage of building cities that were often made up of a group of neighboring villages, then begin to appear Territories which consist of a group of cities. soLet s see that.',

        ]);
    }
}
