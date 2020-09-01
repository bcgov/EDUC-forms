<template>
  <div class="container">
    <!-- If you want to hide survey, comment the lines below -->
    <div class="card align-middle">
      <survey :survey="survey"></survey>
    </div>
  </div>
</template>

<script>
import * as SurveyVue from "survey-vue";
//import "bootstrap/dist/css/bootstrap.css";
var Survey = SurveyVue.Survey;
Survey.cssType = "bootstrap";

import * as widgets from "surveyjs-widgets";

//import { init as customWidget } from "../components/customwidget";

widgets.icheck(SurveyVue);
widgets.select2(SurveyVue);
widgets.inputmask(SurveyVue);
widgets.jquerybarrating(SurveyVue);
widgets.jqueryuidatepicker(SurveyVue);
widgets.nouislider(SurveyVue);
widgets.select2tagbox(SurveyVue);
widgets.sortablejs(SurveyVue);
widgets.ckeditor(SurveyVue);
widgets.autocomplete(SurveyVue);
widgets.bootstrapslider(SurveyVue);
//customWidget(SurveyVue);

SurveyVue.Serializer.addProperty("question", "tag:number");


export default {
  components: {
    Survey,
  },

  data() {
    var json = {
      title: "Ministry of Education CommunityLINK Annual Report 2020/21",
      pages: [
        {
          name: "page1",
          elements: [
            {
              type: "html",
              name: "contact_information",
              html: "<h2>Contact Information</h2>",
            },
            {
              type: "dropdown",
              name: "schooldistrict",
              title: "School District ",
              choices: [
                {
                  value: "School District 5 Southeast Kootenay",
                  text: "School District 5 Southeast Kootenay",
                },
                {
                  value: "School District 6 Rocky Mountain",
                  text: "School District 6 Rocky Mountain",
                },
                {
                  value: "School District 8 Kootenay Lake",
                  text: "School District 8 Kootenay Lake",
                },
              ],
            },
            {
              type: "text",
              name: "firstname",
              title: "Firstname",
            },
            {
              type: "text",
              name: "lastname",
              title: "Lastname",
            },
            {
              type: "text",
              name: "Phone",
              title: "Phone",
              inputType: "tel",
            },
          ],
        },
        {
          name: "page2",
          elements: [
            {
              type: "html",
              name: "community_link_funding",
              html: "<h2>CommunityLINK Funding</h2>",
            },
            {
              type: "text",
              name: "20xx_communitylink_funding",
              title: "Ministry of Education 20xx/xx CommunityLINK Funding",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "carry-over-funding-from-previous-years",
              title: "Carry-over Funding from Previous Years",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "funding_leveraged_from_other_sources",
              title: "Funding Leveraged from Other Sources",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "expression",
              name: "total_2xxx_communitylink_funding",
              title: "Total 20xx/xx CommunityLINK Funding",
              expression:
                "{20xx_communitylink_funding}+{carry-over-funding-from-previous-years}+{funding_leveraged_from_other_sources}",
              displayStyle: "currency",
              currency: "CAD",
            },
          ],
        },
        {
          name: "page3",
          elements: [
            {
              type: "html",
              name: "communitylink_expenditures",
              html: "<h2>CommunityLINK Expenditures</h2>",
            },
            {
              type: "html",
              name: "academic_upport",
              html: "<h3>Academic Support</h3>",
            },
            {
              type: "text",
              name: "academic_support_teacher",
              title: "Teacher",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "academic_support_educational_assistant",
              title: "Educational Assistant",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "academic_support_other",
              title: "Other",
            },
            {
              type: "text",
              name: "academic_support_other_value",
              visibleIf: "{academic_support_other} notempty",
              title: "Other",
              titleLocation: "hidden",
              placeHolder: "$0.00",
            },
            {
              type: "expression",
              name: "academic_support_total",
              title: "Academic Support Total",
              expression:
                "{academic_support_teacher}+{academic_support_educational_assistant}+{academic_support_other_value}",
              displayStyle: "currency",
            },
          ],
        },
        {
          name: "page4",
          elements: [
            {
              type: "html",
              name: "Social, Emotional, Behavioural Support",
              html: "<h3>Social, Emotional, Behavioural Support</h3>",
            },
            {
              type: "text",
              name: "social_emotional_behavioural_support_teacher",
              title: "Teacher",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "social_emotional_behavioural_support_youth_worker",
              title: "Youth Worker",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name:
                "social_emotional_behavioural_support_indigenous_support_worker",
              title: "Indigenous Support Worker",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name:
                "social_emotional_behavioural_support_educational_assistant",
              title: "Educational Assistant",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "social_emotional_behavioural_support_social_worker",
              title: "Social Worker",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "social_emotional_behavioural_support_mental_health_worker",
              title: "Mental Health Worker",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "social_emotional_behavioural_support_other",
              title: "Other",
            },
            {
              type: "text",
              name: "social_emotional_behavioural_support_other_value",
              visibleIf:
                "{social_emotional_behavioural_support_other} notempty",
              title: "Other",
              titleLocation: "hidden",
              placeHolder: "$0.00",
            },
            {
              type: "expression",
              name: "social_emotional_behavioural_support_total",
              title: "Social, Emotional, Behavioural Support Total",
              expression:
                "{social_emotional_behavioural_support_teacher}+{social_emotional_behavioural_support_youth_worker}+{social_emotional_behavioural_support_indigenous_support_worker}+{social_emotional_behavioural_support_educational_assistant}+{social_emotional_behavioural_support_social_worker}+{social_emotional_behavioural_support_mental_health_worker}+{social_emotional_behavioural_support_other_value}",
              displayStyle: "currency",
            },
          ],
        },
        {
          name: "page5",
          elements: [
            {
              type: "html",
              name: "food_nutrition",
              html: "<h3>Food & Nutrition</h3>",
            },
            {
              type: "text",
              name: "food_nutrition_breakfast",
              title: "Breakfast",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "food_nutrition_lunch",
              title: "Lunch ",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "food_nutrition_snack",
              title: "Snack",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "food_nutrition_school_vacation",
              title: "School Vacation",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "expression",
              name: "food_nutrition_total",
              title: "Food & Nutrition Total",
              expression:
                "{food_nutrition_breakfast}+{food_nutrition_lunch}+{food_nutrition_snack}+{food_nutrition_school_vacation}",
              displayStyle: "currency",
            },
          ],
        },
        {
          name: "page6",
          elements: [
            {
              type: "html",
              name: "Summary",
              html: "<h2>Summary</h2>",
            },
            {
              type: "expression",
              name: "total_expenditures",
              title: "Total Expenditures",
              expression:
                "{academic_support_total}+{social_emotional_behavioural_support_total}+{food_nutrition_total}\n",
            },
            {
              type: "expression",
              name: "unspent_funding_current_year",
              title: "Unspent Funding (current year)",
              expression:
                "{total_2xxx_communitylink_funding}-{total_expenditures}",
              displayStyle: "currency",
            },
            {
              type: "comment",
              name: "justification_of_unspent_funding",
              title: "Justification of Unspent Funding",
            },
            {
              type: "comment",
              name: "plans_for_utilizing_unspent_funding",
              title: "Plans for Utilizing Unspent Funding ",
            },
          ],
        },
        {
          name: "page7",
          elements: [
            {
              type: "html",
              name: "question2",
              html: "<h2>CommunityLINK Supports and Services Provided</h2>",
            },
            {
              type: "text",
              name:
                "number_of_vulnerable_students_identified_in_your_school_district",
              title:
                "Number of vulnerable students identified in your school district",
              inputType: "number",
            },
            {
              type: "text",
              name: "number_of_students_supported_through_CommunityLINK",
              title: "Number of students supported through CommunityLINK",
              inputType: "number",
            },
            {
              type: "text",
              name:
                "percentage_of_student_population_supported_through_CommunityLINK",
              title:
                "Percentage of student population supported through CommunityLINK ",
              inputType: "number",
              placeHolder: "%",
            },
            {
              type: "html",
              name: "question3",
              html: "<h3>Academic</h3>",
            },
            {
              type: "text",
              name: "number_of_students_supported_in_this_category",
              title: "Number of students supported in this category",
              inputType: "number",
            },
            {
              type: "checkbox",
              name: "types_of_supports_and_services_provided",
              title: "Types of Supports and Services Provided",
              choices: [
                {
                  value: "Early Intervention ",
                  text: "Early Intervention ",
                },
                {
                  value: "Homework, Tutoring, and Reading ",
                  text: "Homework, Tutoring, and Reading ",
                },
                {
                  value: "Family Literacy ",
                  text: "Family Literacy ",
                },
                {
                  value: "Other (specify)",
                  text: "Other (specify)",
                },
              ],
            },
            {
              type: "comment",
              name: "types_of_supports_and_services_provided_other",
              visibleIf:
                "{types_of_supports_and_services_provided} = ['Other (specify)']",
              titleLocation: "hidden",
            },
          ],
        },
        {
          name: "page8",
          elements: [
            {
              type: "html",
              name: "social_emotional_behavioural",
              html: "<h2>Social, Emotional & Behavioural </h2>",
            },
            {
              type: "text",
              name:
                "number_of_students_supported_in_social_emotional_behavioural",
              title: "Number of students supported in this category",
              inputType: "number",
            },
            {
              type: "checkbox",
              name: "social_emotional_behavioural_supports_services",
              title: "Types of Supports and Services Provided",
              choices: [
                {
                  value: "Community Agency Referral",
                  text: "Community Agency Referral",
                },
                {
                  value: "After School Arts and Recreation",
                  text: "After School Arts and Recreation",
                },
                {
                  value: "Peer Mentorship Support",
                  text: "Peer/ Mentorship Support",
                },
                {
                  value: "Other",
                  text: "Other",
                },
              ],
            },
            {
              type: "comment",
              name: "social_emotional_behavioural_supports_services_other",
              visibleIf:
                "{social_emotional_behavioural_supports_services} = ['Other']",
              titleLocation: "hidden",
            },
          ],
        },
        {
          name: "page9",
          elements: [
            {
              type: "html",
              name: "food_and_nutrition",
              html: "<h2>Food and Nutrition</h2>",
            },
            {
              type: "text",
              name: "food_and_nutrition_breakfast",
              title: "Breakfast",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "food_and_nutrition_lunch",
              title: "Lunch",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "food_and_nutrition_snacks",
              title: "Snacks",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "food_and_nutrition_school_vacation",
              title: "School Vacation",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "food_and_nutrition_other",
              title: "Other",
              inputType: "number",
              placeHolder: "$0.00",
            },
            {
              type: "text",
              name: "food_and_nutrition_total",
              title: "Food and Nutrition Total",
              inputType: "number",
              placeHolder: "$0.00",
            },
          ],
        },
        {
          name: "page10",
          elements: [
            {
              type: "comment",
              name: "further_comments",
              title:
                "Comments (write-in box ) The Ministry of Education would like to capture your successes for the reporting period (i.e. Priorities, Concerns, Innovations, Partnerships)  ",
              rows: 18,
            },
          ],
        },
      ],
      showProgressBar: "bottom",
    };

    var model = new SurveyVue.Model(json);
    model.onComplete.add(function (sender) {
      console.log(JSON.stringify(sender.data));
      var xhr = new XMLHttpRequest();
      xhr.open(
        "POST",
        "http://test.bced.gov.bc.ca/educ_forms_service/form.php"
      );
      xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");
      xhr.send("Ministry of Education CommunityLINK Annual Report 2020/21:\n" + JSON.stringify(sender.data));
    });
    return {
      survey: model,
    };
  },
};
</script>


