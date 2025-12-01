<?php
// Clean product description
$description = "HIGH_QUALITY_LEATHER_WALLET";
$description = strtolower($description);
$description = str_replace("_", " ", $description);

// Analyze description
$desc2 = "This is a high-quality leather wallet with RFID protection.";
$charCount = strlen($desc2);
$wordCount = str_word_count($desc2);
$keyword =
    strpos($desc2, "leather") !== false ? "Keyword found" : "Keyword not found";

// Customer review
$review = "Great product! Fast delivery and excellent service.";
$preview = substr($review, 0, 20) . "...";
$position = strpos($review, "excellent");
$fullReview = $review . " Thank you for your feedback!";

// Outputs
echo "Formatted Description: $description\n";
echo "Description Analysis: Characters=$charCount, Words=$wordCount, $keyword\n";
echo "Review Preview: $preview\n";
echo "Position of 'excellent': " .
    ($position !== false ? $position : "Not found") .
    "\n";
echo "Full Review: $fullReview\n";
