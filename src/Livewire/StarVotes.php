<?php

namespace Laraveldesign\Votes\Livewire;

use Illuminate\Support\Facades\Auth;
use Laraveldesign\Votes\Models\Vote;
use Livewire\Component;

class StarVotes extends Component
{

    public $model;
    public $votes;
    public $average = 0;

    public $percent1 = "0%";
    public $percent2 = "0%";
    public $percent3 = "0%";
    public $percent4 = "0%";
    public $percent5 = "0%";

    /*
     * Livewire mount function
     */
    public function mount($model)
    {
        $this->model = $model;
        $this->calculate();
    }

    /*
     * Function used to calculate votes, and which stars to show.
     */
    public function calculate()
    {
        $total = 0;
        $this->votes = Vote::where([
            'model_id' => $this->model->id,
            'model_class' => get_class($this->model)
        ])->count();
        $votes = Vote::where([
            'model_id' => $this->model->id,
            'model_class' => get_class($this->model)
        ])->get();
        foreach ($votes as $vote) {
            $total += $vote->value;
        }
        if ($this->votes > 0) {
            $average = $total / $this->votes;
        } else {
            $average = 0;
        }
        if ($average > 0) {
            $this->average = round($average * 2) / 2;
        } else {
            $this->average = 0;
        }

        $params = [
            ['model_id', '=', $this->model->id],
            ['model_class', '=', get_class($this->model)]
        ];
        if ($this->votes > 0) {
            $this->percent1 = floor(Vote::where(array_merge($params, [['value', '=', 1]]))->count() / $this->votes * 100) . "%";
            $this->percent2 = floor(Vote::where(array_merge($params, [['value', '=', 2]]))->count() / $this->votes * 100) . "%";
            $this->percent3 = floor(Vote::where(array_merge($params, [['value', '=', 3]]))->count() / $this->votes * 100) . "%";
            $this->percent4 = floor(Vote::where(array_merge($params, [['value', '=', 4]]))->count() / $this->votes * 100) . "%";
            $this->percent5 = floor(Vote::where(array_merge($params, [['value', '=', 5]]))->count() / $this->votes * 100) . "%";
        } else {
            $this->percent1 = $this->percent2 = $this->percent3 = $this->percent4 = $this->percent5 = 0;
        }
        $this->render();

    }

    /*
     * Function used to create a vote
     */
    public function vote($value)
    {
        if (Auth::check()) {
            // check if user has already voted
            $test = Vote::where([
                ['user_id', '=', auth()->user()->id],
                ['model_id', '=', $this->model->id],
                ['model_class', '=', get_class($this->model)]
            ])->count();
            if ($test == 0) {
                Vote::create([
                    'user_id' => auth()->user()->id,
                    'model_id' => $this->model->id,
                    'model_class' => get_class($this->model),
                    'value' => $value
                ]);
                $this->calculate();
            }

        }
    }


    /*
     * Livewire render function
     */
    public function render()
    {
        return view('votes::livewire.star-votes');
    }
}
