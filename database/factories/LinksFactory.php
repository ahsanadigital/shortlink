<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LinksFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $str = new Str();
    return [
      'short'   => $str->random(8),
      'url'     => $this->faker->url(),
      'author'  => 'anonymous',
      'ip'      => $this->faker->ipv4(),
    ];
  }
}
