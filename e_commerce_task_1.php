<?php
// Task 1.1: Calculate total with 10% tax
function calculateTotal($price, $qty)
{
    $subtotal = $price * $qty;
    $tax = $subtotal * 0.1;
    return $subtotal + $tax;
}

// Task 1.2: Format product name
function formatProductName($name)
{
    $name = trim($name);
    $name = strtolower($name);
    $name = ucwords($name);
    return substr($name, 0, 50);
}

// Task 1.3: Calculate discount
function calculateDiscount($price, $discountPercent)
{
    $discountAmount = $price * ($discountPercent / 100);
    return $price - $discountAmount;
}

// Sample outputs
echo "calculateTotal(100, 2) => " . calculateTotal(100, 2) . "\n";
echo "formatProductName('  premium Laptop   ') => " .
    formatProductName("  premium Laptop   ") .
    "\n";
echo "calculateDiscount(200, 10) => " . calculateDiscount(200, 10) . "\n";
