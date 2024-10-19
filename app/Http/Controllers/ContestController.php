<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Contest;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $id)
    {
        $this->authorize('create',Contest::class);
        if(Character::find($id)->enemy) return redirect()->route('home');
        $c=Contest::factory()->create();
        $c['history']="";

        $c->place()->associate(Place::all()->random())->save();
    

        $c->characters()->attach($id,[ 'hero_hp' => 20, 'enemy_hp' => 20]);

        $c->characters()->attach(Character::all()->where('enemy',true)->random(),[ 'hero_hp' => 20, 'enemy_hp' => 20]);

        $c->user()->associate(Auth::user())->save();

        return redirect()->route('contest.show',$c);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contest $contest)
    {
        $this->authorize('view',$contest);
        return view('contest.show',['contest'=>$contest]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contest $contest)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contest $contest)
    {
        $this->authorize('update',$contest);
        if(isset($contest->win))return redirect()->route('contest.show',['contest'=>$contest]);

        $enemy=$contest->characters()->where('enemy',true)->first();
        $hero=$contest->characters()->where('enemy',false)->first();
        //hero támad
        $damage=$this->damage(
            $enemy,
            $hero,
            $request['attack_type']
        );
        $newEnemyHP=$contest->characters()->first()->pivot->enemy_hp - $damage;
        $contest->history.=$contest->characters()->where('enemy',false)->first()->name .": ".$request['attack_type']." attack - ". $damage." damage\n";
        if($newEnemyHP<0){
            $contest->win=true;
            $contest->history.="Hero won\n";
            $contest->characters()->updateExistingPivot($enemy, ['enemy_hp' => 0]);
            $contest->characters()->updateExistingPivot($hero, ['enemy_hp' => 0]);
            $contest->save();
            return redirect()->route('contest.show',['contest'=>$contest]);
        }
        //enemy támad
        $attack_types=["melee","ranged","magic"];
        $randomIndex=rand(0,2);
        $attack_type=$attack_types[$randomIndex];
        $damage=$this->damage(
            $hero,
            $enemy,
            $attack_type
        );
        $newHeroHP=$contest->characters()->first()->pivot->hero_hp - $damage;
        $contest->history.=$contest->characters()->where('enemy',true)->first()->name .": ".$attack_type." attack - ". $damage." damage\n\n";
        if($newHeroHP<0){
            $contest->win=false;
            $contest->history.="Hero lost\n";
            $contest->characters()->updateExistingPivot($enemy, ['enemy_hp' => $newEnemyHP,'hero_hp'=>0]);
            $contest->characters()->updateExistingPivot($hero, ['enemy_hp' => $newEnemyHP,'hero_hp'=>0]);
            $contest->save();
            return redirect()->route('contest.show',['contest'=>$contest]);
        }
        $contest->characters()->updateExistingPivot($enemy, ['enemy_hp' => $newEnemyHP,'hero_hp'=>$newHeroHP]);
        $contest->characters()->updateExistingPivot($hero, ['enemy_hp' => $newEnemyHP,'hero_hp'=>$newHeroHP]);
        $contest->save();
        return redirect()->route('contest.show',['contest'=>$contest]);

        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contest $contest)
    {
        //
    }

    private function damage(Character $def,Character $att, string $type){

        if($type==="melee"){
            $damage=(($att->strength * 0.7 + $att->accuracy * 0.1 + $att->magic * 0.1) - $def->defence);
        }else if($type==="ranged"){
            $damage=(($att->strength * 0.1 + $att->accuracy * 0.7 + $att->magic * 0.1) - $def->defence);
        }else{
            $damage=(($att->strength * 0.1 + $att->accuracy * 0.1 + $att->magic * 0.7) - $def->defence);
        }
    
        if($damage<0) $damage=0;
        return $damage;

    }
}
