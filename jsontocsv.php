<?php
$columns = "";
$data = ""; 

 function flatten_columns($items,$parent, &$columns) {
    foreach($items as $key => $value) {
        if(is_array($value)){
            //print $item . "\n\t||CHILDREN||\n" ;
            $columns .= $parent . flatten_columns($value, $key, $columns) ;
        }else{
            if($parent != ""){
                //not the parent
                $columns .= $parent. "-" . $key . ",";
            }else{
                //is the parent
                $columns .= $key . ",";
            }
        }
    }
}
function flatten_data($items,$parent, &$data) {
    foreach($items as $key => $value) {
        if(is_array($value)){
            $data .= flatten_data($value, $key, $data) ;
        }else{
            $data .= $value . ",";
        }
    }
}
$json = '{
    "schooldistrict": "School District 5 Southeast Kootenay",
    "firstname": "shaun",
    "lastname": "lum",
    "Phone": "250",
    "20xx_communitylink_funding": 1,
    "carry-over-funding-from-previous-years": 2,
    "funding_leveraged_from_other_sources": 3,
    "total_20xx_communitylink_funding": 4,
    "academic_support_teacher": 5,
    "academic_support_educational_assistant": 6,
    "academic_support_other": "7",
    "academic_support_other_value": "8",
    "academic_support_total": 9,
    "social_emotional_behavioural_support_teacher": 10,
    "social_emotional_behavioural_support_youth_worker": 11,
    "social_emotional_behavioural_support_indigenous_support_worker": 12,
    "social_emotional_behavioural_support_educational_assistant": 13,
    "social_emotional_behavioural_support_social_worker": 14,
    "social_emotional_behavioural_support_mental_health_worker": 15,
    "social_emotional_behavioural_support_other": "16",
    "social_emotional_behavioural_support_other_value": "17",
    "social_emotional_behavioural_support_total": "18",
    "question1": 19,
    "food_nutrition_lunch": 20,
    "food_nutrition_snack": 21,
    "food_nutrition_school_vacation": 22,
    "food_nutrition_total": "23",
    "total_expenditures": 24,
    "unspent_funding": 25,
    "justification_of_unspent_funding": "26",
    "plans_for_utilizing_unspent_funding": "27",
    "number_of_vulnerable_students_identified_in_your_school_district": 28,
    "number_of_students_supported_through_CommunityLINK": 29,
    "percentage_of_student_population_supported_through_CommunityLINK": 30,
    "number_of_students_supported_in_this_category": 31,
    "types_of_supports_and_services_provided": ["Early Intervention "],
    "number_of_students_supported_in_social_emotional_behavioural": 32,
    "social_emotional_behavioural_supports_services": ["Community Agency Referral"],
    "food_and_nutrition_breakfast": 34,
    "food_and_nutrition_lunch": 35,
    "food_and_nutrition_snacks": 36,
    "food_and_nutrition_school_vacation": 37,
    "food_and_nutrition_other": 38,
    "food_and_nutrition_total": 39,
    "further_comments": "40"
}';



$submission1 = '{
    "schooldistrict": "School District 5 Southeast Kootenay",
    "firstname": "shaun",
    "lastname": "lum",
    "Phone": "250",
    "20xx_communitylink_funding": 1,
    "carry-over-funding-from-previous-years": 2,
    "funding_leveraged_from_other_sources": 3,
    "total_20xx_communitylink_funding": 4,
    "academic_support_teacher": 5,
    "academic_support_educational_assistant": 6,
    "academic_support_other": "7",
    "academic_support_other_value": "8",
    "academic_support_total": 9,
    "social_emotional_behavioural_support_teacher": 10,
    "social_emotional_behavioural_support_youth_worker": 11,
    "social_emotional_behavioural_support_indigenous_support_worker": 12,
    "social_emotional_behavioural_support_educational_assistant": 13,
    "social_emotional_behavioural_support_social_worker": 14,
    "social_emotional_behavioural_support_mental_health_worker": 15,
    "social_emotional_behavioural_support_other": "16",
    "social_emotional_behavioural_support_other_value": "17",
    "social_emotional_behavioural_support_total": "18",
    "question1": 19,
    "food_nutrition_lunch": 20,
    "food_nutrition_snack": 21,
    "food_nutrition_school_vacation": 22,
    "food_nutrition_total": "23",
    "total_expenditures": 24,
    "unspent_funding": 25,
    "justification_of_unspent_funding": "26",
    "plans_for_utilizing_unspent_funding": "27",
    "number_of_vulnerable_students_identified_in_your_school_district": 28,
    "number_of_students_supported_through_CommunityLINK": 29,
    "percentage_of_student_population_supported_through_CommunityLINK": 30,
    "number_of_students_supported_in_this_category": 31,
    "types_of_supports_and_services_provided": ["Early Intervention "],
    "number_of_students_supported_in_social_emotional_behavioural": 32,
    "social_emotional_behavioural_supports_services": ["Community Agency Referral"],
    "food_and_nutrition_breakfast": 34,
    "food_and_nutrition_lunch": 35,
    "food_and_nutrition_snacks": 36,
    "food_and_nutrition_school_vacation": 37,
    "food_and_nutrition_other": 38,
    "food_and_nutrition_total": 39,
    "further_comments": "40"
}';
$submission2 = '{
    "schooldistrict": "School District 5 Southeast Kootenay",
    "firstname": "shaun",
    "lastname": "lum",
    "Phone": "250",
    "20xx_communitylink_funding": 1,
    "carry-over-funding-from-previous-years": 2,
    "funding_leveraged_from_other_sources": 3,
    "total_20xx_communitylink_funding": 4,
    "academic_support_teacher": 5,
    "academic_support_educational_assistant": 6,
    "academic_support_other": "7",
    "academic_support_other_value": "8",
    "academic_support_total": 9,
    "social_emotional_behavioural_support_teacher": 10,
    "social_emotional_behavioural_support_youth_worker": 11,
    "social_emotional_behavioural_support_indigenous_support_worker": 12,
    "social_emotional_behavioural_support_educational_assistant": 13,
    "social_emotional_behavioural_support_social_worker": 14,
    "social_emotional_behavioural_support_mental_health_worker": 15,
    "social_emotional_behavioural_support_other": "16",
    "social_emotional_behavioural_support_other_value": "17",
    "social_emotional_behavioural_support_total": "18",
    "question1": 19,
    "food_nutrition_lunch": 20,
    "food_nutrition_snack": 21,
    "food_nutrition_school_vacation": 22,
    "food_nutrition_total": "23",
    "total_expenditures": 24,
    "unspent_funding": 25,
    "justification_of_unspent_funding": "26",
    "plans_for_utilizing_unspent_funding": "27",
    "number_of_vulnerable_students_identified_in_your_school_district": 28,
    "number_of_students_supported_through_CommunityLINK": 29,
    "percentage_of_student_population_supported_through_CommunityLINK": 30,
    "number_of_students_supported_in_this_category": 31,
    "types_of_supports_and_services_provided": ["Early Intervention "],
    "number_of_students_supported_in_social_emotional_behavioural": 32,
    "social_emotional_behavioural_supports_services": ["Community Agency Referral"],
    "food_and_nutrition_breakfast": 34,
    "food_and_nutrition_lunch": 35,
    "food_and_nutrition_snacks": 36,
    "food_and_nutrition_school_vacation": 37,
    "food_and_nutrition_other": 38,
    "food_and_nutrition_total": 39,
    "further_comments": "40"
}';


//populate with columns and data
flatten_columns(json_decode($json,true),"", $columns);
flatten_data(json_decode($json,true),"", $data);
$data .= "\n";
flatten_data(json_decode($submission1,true),"", $data);
$data .= "\n";
flatten_data(json_decode($submission2,true),"", $data);

Print "Columns\n";
print substr($columns, 0, -1);
Print "\ndata\n";
print substr($data, 0, -1);


$myfile = fopen("submission.csv", "w") or die("Unable to open file!");
$txt = $columns ."\n". $data;
fwrite($myfile, $txt);
fclose($myfile);


?>
