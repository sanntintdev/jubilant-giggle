<?php
// Product list with duplicates
$products = [
    ["name" => "Laptop", "price" => 1200],
    ["name" => "Mouse", "price" => 20],
    ["name" => "Laptop", "price" => 1200],
    ["name" => "Keyboard", "price" => 45],
];

// Remove duplicates and sort by price
$products = array_map(
    "unserialize",
    array_unique(array_map("serialize", $products)),
);
usort($products, function ($a, $b) {
    return $a["price"] <=> $b["price"];
});

// Seasonal sale: discount Electronics
$items = [
    ["name" => "Laptop", "category" => "Electronics", "price" => 1200],
    ["name" => "T-shirt", "category" => "Clothing", "price" => 15],
    ["name" => "Headphones", "category" => "Electronics", "price" => 80],
];

foreach ($items as &$item) {
    if ($item["category"] === "Electronics") {
        $item["price"] *= 0.9; // 10% discount
    }
}

// Merge supplier inventories
$supplierA = ["Bag", "Shoes", "Watch"];
$supplierB = ["Shoes", "Camera", "Bag"];
$merged = array_unique(array_merge($supplierA, $supplierB));

// Outputs
echo "Sorted Product List:\n";
foreach ($products as $p) {
    echo $p["name"] . " - $" . $p["price"] . "\n";
}

echo "\nUpdated Inventory (Electronics Discount Applied):\n";
foreach ($items as $i) {
    echo $i["name"] . " - $" . $i["price"] . "\n";
}

echo "\nMerged Supplier Inventory:\n";
foreach ($merged as $m) {
    echo $m . "\n";
}
