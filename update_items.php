<?php
$clothingNames = [
    "Men's Black Track Pants",
    "Men's Solid Black T-Shirt",
    "Vintage Graphic Sleeveless Tee",
    "Men's Graphic Red & Black Tee",
    "Stylish Blue Denim Jacket",
    "Classic White Sneakers",
    "Casual Plaid Button-Up Shirt",
    "Elegant Red Summer Dress",
    "Men's Navy Blue Chinos",
    "Women's Floral Midi Dress",
    "Unisex Oversized Hoodie",
    "Men's Formal Oxford Shirt",
    "Women's High-Waisted Jeans",
    "Men's Casual Polo Shirt",
    "Women's Knitted Cardigan",
    "Men's Running Shorts",
    "Women's Yoga Leggings",
    "Men's Puffer Jacket",
    "Women's Trench Coat",
    "Unisex Basic White Tee",
    "Men's Leather Biker Jacket",
    "Women's Pleated Skirt",
    "Men's Linen Blend Shirt",
    "Women's Silk Blouse",
    "Men's Slim Fit Chinos",
    "Women's Denim Shorts",
    "Men's Graphic Hoodie",
    "Women's Cashmere Sweater",
    "Men's Board Shorts",
    "Women's Maxi Skirt",
    "Men's V-Neck Sweater",
    "Women's Tank Top",
    "Men's Tailored Suit",
    "Women's Evening Gown",
    "Unisex Beanie Hat",
    "Men's Cargo Pants",
    "Women's Crop Top",
    "Men's Wool Blend Coat",
    "Women's Ruffled Dress",
    "Men's Chukka Boots"
];

$images = [
    "1780050641.png", // Black track pants
    "1780050653.png", // Black tee
    "1780050664.png", // Vintage sleeveless
    "1780050675.png", // Red/black tee
    "blue_denim_jacket_1780485251684.png",
    "white_sneakers_1780485264448.png",
    "casual_shirt_1780485278839.png",
    "summer_dress_1780485292790.png"
];

$items = DB::table('items')->orderBy('id')->get();
$index = 0;

foreach ($items as $item) {
    $newName = $clothingNames[$index % count($clothingNames)];
    $newImage = $images[$index % count($images)];
    $newSlug = \Illuminate\Support\Str::slug($newName . '-' . $item->id);

    DB::table('items')
        ->where('id', $item->id)
        ->update([
            'name' => $newName,
            'image' => $newImage,
            'slug' => $newSlug,
            'description' => 'A stylish ' . strtolower($newName) . ' perfect for your everyday look. Made from high-quality materials to ensure comfort and durability.'
        ]);
        
    $index++;
}
echo "Updated " . count($items) . " items.\n";
