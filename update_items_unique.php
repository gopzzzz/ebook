<?php
$uniqueProducts = [
    ["name" => "Men's Black Track Pants", "image" => "1780050641.png"],
    ["name" => "Men's Solid Black T-Shirt", "image" => "1780050653.png"],
    ["name" => "Vintage Graphic Sleeveless Tee", "image" => "1780050664.png"],
    ["name" => "Men's Graphic Red & Black Tee", "image" => "1780050675.png"],
    ["name" => "Stylish Blue Denim Jacket", "image" => "blue_denim_jacket_1780485251684.png"],
    ["name" => "Classic White Sneakers", "image" => "white_sneakers_1780485264448.png"],
    ["name" => "Casual Plaid Button-Up Shirt", "image" => "casual_shirt_1780485278839.png"],
    ["name" => "Elegant Red Summer Dress", "image" => "summer_dress_1780485292790.png"],
    ["name" => "Men's Leather Biker Jacket", "image" => "biker_jacket_1780485605895.png"],
    ["name" => "Women's Floral Midi Dress", "image" => "floral_dress_1780485623207.png"],
    ["name" => "Unisex Oversized Grey Hoodie", "image" => "oversized_hoodie_1780485637838.png"],
    ["name" => "Men's Formal Oxford Shirt", "image" => "oxford_shirt_1780485651433.png"],
    ["name" => "Women's High-Waisted Jeans", "image" => "high_waisted_jeans_1780485667413.png"],
    ["name" => "Men's Casual Green Polo Shirt", "image" => "polo_shirt_1780485700449.png"],
    ["name" => "Women's Knitted Beige Cardigan", "image" => "cardigan_1780485721992.png"],
];

$items = DB::table('items')->orderBy('id')->get();
$keepIds = [];

foreach ($uniqueProducts as $index => $product) {
    if (isset($items[$index])) {
        $id = $items[$index]->id;
        $keepIds[] = $id;
        DB::table('items')
            ->where('id', $id)
            ->update([
                'name' => $product['name'],
                'image' => $product['image'],
                'slug' => \Illuminate\Support\Str::slug($product['name'] . '-' . $id),
                'description' => 'A stylish ' . strtolower($product['name']) . ' perfect for your everyday look.'
            ]);
    }
}

// Delete the rest to ensure no duplications
if (count($keepIds) > 0) {
    DB::table('items')->whereNotIn('id', $keepIds)->delete();
}
echo "Catalog updated to exactly " . count($keepIds) . " unique products.\n";
