<?php

namespace Database\Factories;

use App\Models\Links;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $links = new Links();
    $id    = $links->inRandomOrder()->first();

    return [
      'id_link' => $id->short,
      'ip'      => $this->faker->ipv4(),
      'browser' => $this->faker->userAgent(),
    ];
  }
}
