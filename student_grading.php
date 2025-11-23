<?php

const TOTAL_EXAM_MARKS = 300;
const PASS_THRESHOLD = 50;

$grade_profiles = [
    [
        "name" => "Aye Myat",
        "exam_scores" => [96, 80, 64],
        "subject_marks" => [80, 95, 70, 85, 90],
    ],
    [
        "name" => "Ko Ko",
        "exam_scores" => [40, 30, 50],
        "subject_marks" => [45, 30, 40, 60, 75],
    ],
    [
        "name" => "Hnin Hnin",
        "exam_scores" => [90, 90, 90],
        "subject_marks" => [90, 85, 95, 88, 92],
    ],
    [
        "name" => "Zaw Min",
        "exam_scores" => [50, 40, 45],
        "subject_marks" => [30, 40, 49, 45, 70],
    ],
    [
        "name" => "Myat Thiri",
        "exam_scores" => [70, 60, 65],
        "subject_marks" => [50, 45, 60, 70, 80],
    ],
];

echo "--- School Grading System Results ---\n\n";

for ($i = 0; $i < count($grade_profiles); $i++) {
    $student_record = $grade_profiles[$i];
    $exam_scores = $student_record["exam_scores"];
    $subject_marks = $student_record["subject_marks"];
    $student_name = $student_record["name"];

    echo "====================================\n";
    echo "Student: " . $student_name . "\n";
    echo "Exam Scores: " . implode(", ", $exam_scores) . "\n";
    echo "Subject Marks: " . implode(", ", $subject_marks) . "\n";
    echo "------------------------------------\n";

    $total_score = array_sum($exam_scores);

    $average_score = $total_score / count($exam_scores);
    echo "1. Average Exam Score: " . number_format($average_score, 2) . "\n";

    $percentage_score = ($total_score / TOTAL_EXAM_MARKS) * 100;
    echo "2. Percentage Score: " . number_format($percentage_score, 2) . "%\n";

    echo "3. Final Result: ";
    if ($average_score >= PASS_THRESHOLD) {
        echo "Pass\n";
    } else {
        echo "Fail\n";
    }
    $is_a_grade = $average_score > 90;
    $has_high_score = false;

    foreach ($exam_scores as $score) {
        if ($score > 95) {
            $has_high_score = true;
            break;
        }
    }

    echo "4. Honor Roll Status: ";
    if ($is_a_grade && $has_high_score) {
        echo "Qualifies for the Honor Roll!\n";
    } else {
        echo "Does not qualify for the Honor Roll.\n";
    }

    $fail_count = 0;
    foreach ($subject_marks as $mark) {
        if ($mark < PASS_THRESHOLD) {
            $fail_count++;
        }
    }

    echo "5. Subjects Failed (Below 50): " . $fail_count . "\n";

    echo "6. Academic Probation Check: ";
    if ($fail_count > 2) {
        echo "WARNING: Student is placed on academic probation.\n";
    } else {
        echo "Student is in good standing.\n";
    }

    echo "====================================\n\n";
}
