<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([

            [
                'name' => 'Pizza Fresh Vegetables',
                'price' => 68000,
                'description' => 'Pizza Fresh Vegetables is a pizza with various vegetables, a little onion, and covered with chicken and mozzarella cheese and given a little sauce', 
                'image' => '/storage/image/pizza1.jpg'
            ],

            [
                'name' => 'Classic Tomato',
                'price' => 35000,
                'description' => 'Classic Tomato is a pizza full of tomatoes, and covered with mozzarella cheese and given a little sauce', 
                'image' => '/storage/image/pizza2.jpg'
            ],

            [
                'name' => 'Union Cheese Bomb',
                'price' => 95500,
                'description' => 'Union Cheese Bomb is a pizza with full vegetables, and covered with mozzarella cheese and given a few chilies', 
                'image' => '/storage/image/pizza3.jpg'
            ],

            [
                'name' => 'Grilled Sausage',
                'price' => 55500,
                'description' => 'Grilled Sausage is a pizza with a full layer of mozzarella cheese and a few pieces of chili and tomato sauce', 
                'image' => '/storage/image/pizza4.jpg'
            ],

            [
                'name' => 'Special Cheese Tomato',
                'price' => 95500,
                'description' => 'Special Cheese Tomato is a pizza with a full layer of mozzarella cheese and a few slices of tomato', 
                'image' => '/storage/image/pizza5.jpg'
            ],

            [
                'name' => 'Classic Pepperoni',
                'price' => 75000,
                'description' => 'Classic Pepperoni is a pizza with various vegetables, tomatoes, pepperoni full layer of mozzarella cheese', 
                'image' => '/storage/image/pizza6.jpg'
            ],

            [
                'name' => 'Lamb and Onion', 
                'price' => 85000, 
                'description' => 'Lamb and Onion is a pizza with lamb meat, some onion and cheese on top, coated with our special sauce', 
                'image' => '/storage/image/pizza7.jpg'
            ],
            
        ]);
    }
}
