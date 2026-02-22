<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;

    public function definition()
    {
        return [
            // max:8 なので realText(8) や 8文字以内の名前を指定
            'first_name'  => $this->faker->lastName, // 名字
            'last_name'   => $this->faker->firstName, // 名前
            'gender'      => $this->faker->randomElement([1, 2, 3]), // 例: 1=男, 2=女, 3=その他
            'email'       => $this->faker->unique()->safeEmail,

            // digits_between:1,15 なので数字のみの文字列を生成
            'tel'         => $this->faker->numerify('###########'), // 11桁の数字など

            'address'     => $this->faker->address,
            'building'    => $this->faker->secondaryAddress, // 建物名（nullableなのでそのままでOK）

            // category_id は既存のカテゴリからランダムに取得（例）
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? 1,

            // max:120 の文字列
            'detail'      => $this->faker->realText(120),
        ];
    }
}
