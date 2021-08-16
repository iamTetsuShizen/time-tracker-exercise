<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    private $fakeDescriptions = [
        'Wash the dishes',
        'Walk the dog',
        'Homework',
        'Programming'
    ];

    private $fakeTimeSpent = [ // In seconds
        300,
        45000,
        40,
        840,
        1200,
        3800
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->getRandomElementFromArray($this->fakeDescriptions),
            'time_spent' => $this->getRandomElementFromArray($this->fakeTimeSpent),
        ];
    }

    private function getRandomElementFromArray(array $array)
    {
        return $array[rand(0, count($array))];
    }
}
