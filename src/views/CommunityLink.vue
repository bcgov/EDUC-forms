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
   "name": "page1",
   "elements": [
    {
     "type": "dropdown",
     "name": "question8",
     "choices": [
      "item1",
      "item2",
      "item3"
     ]
    },
    {
     "type": "comment",
     "name": "question7"
    },
    {
     "type": "imagepicker",
     "name": "question6",
     "choices": [
      {
       "value": "lion",
       "imageLink": "https://surveyjs.io/Content/Images/examples/image-picker/lion.jpg"
      },
      {
       "value": "giraffe",
       "imageLink": "https://surveyjs.io/Content/Images/examples/image-picker/giraffe.jpg"
      },
      {
       "value": "panda",
       "imageLink": "https://surveyjs.io/Content/Images/examples/image-picker/panda.jpg"
      },
      {
       "value": "camel",
       "imageLink": "https://surveyjs.io/Content/Images/examples/image-picker/camel.jpg"
      }
     ]
    },
    {
     "type": "text",
     "name": "question2",
     "title": "Email",
     "placeHolder": "shaun@shaun"
    },
    {
     "type": "text",
     "name": "question1",
     "title": "Name",
     "placeHolder": "Shaun"
    },
    {
     "type": "text",
     "name": "question3",
     "title": "Question 1",
     "placeHolder": "Q1"
    },
    {
     "type": "text",
     "name": "question4",
     "title": "Question 2",
     "placeHolder": "Q2"
    },
    {
     "type": "file",
     "name": "question5",
     "title": "Add your Files",
     "maxSize": 0
    }
   ]
  }
 ],
      showProgressBar: "bottom",
    };

    var model = new SurveyVue.Model(json);
    model.onComplete.add(function (sender) {
      let senderData = sender.data;
      
      senderData.form_name = "Ministry of Education CommunityLINK Annual Report 2020/21";
      senderData.email = "program area"
      console.log(senderData);
      console.log(JSON.stringify(senderData));
      var xhr = new XMLHttpRequest();
      xhr.open(
        "POST",
        "http://test.bced.gov.bc.ca/educ_forms_service/form.php"
      );
      xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");
      xhr.send( JSON.stringify(senderData));
    });
    return {
      survey: model,
    };
  },
};
</script>


