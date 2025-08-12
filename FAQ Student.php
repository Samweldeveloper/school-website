<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>School FAQs</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f9f9f9;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .faq-section {
      max-width: 900px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .faq-section h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #b30000;
    }

    .faq-item {
      margin-bottom: 20px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 15px;
    }

    .faq-question {
      font-weight: bold;
      font-size: 18px;
      cursor: pointer;
      position: relative;
      padding-right: 25px;
    }

    .faq-question::after {
      content: "+";
      position: absolute;
      right: 0;
      top: 0;
      font-size: 22px;
      color: #b30000;
    }

    .faq-question.active::after {
      content: "-";
    }

    .faq-answer {
      display: none;
      margin-top: 10px;
      color: #555;
      line-height: 1.6;
    }

    .faq-answer.active {
      display: block;
    }
  </style>
</head>
<body>

<div class="faq-section">
  <h1>Frequently Asked Questions (FAQs)</h1>

  <div class="faq-item">
    <div class="faq-question">1. What are the school opening and closing dates?</div>
    <div class="faq-answer">The school opens in January (Term 1), May (Term 2), and August (Term 3). Dates are available in the events calendar.</div>
  </div>

  <div class="faq-item">
    <div class="faq-question">2. How can I pay school fees?</div>
    <div class="faq-answer">You can pay via bank, M-Pesa, or at the finance office. Check the fees structure section for more details.</div>
  </div>

  <div class="faq-item">
    <div class="faq-question">3. What curriculum does the school follow?</div>
    <div class="faq-answer">We follow the CBC and 8-4-4 systems as guided by the Ministry of Education.</div>
  </div>

  <div class="faq-item">
    <div class="faq-question">4. How can parents access student performance?</div>
    <div class="faq-answer">Parents can log in to the portal to view reports, attendance, and teacher feedback.</div>
  </div>

  <div class="faq-item">
    <div class="faq-question">5. Who do I contact for academic support?</div>
    <div class="faq-answer">Contact the class teacher or academic office via the phone/email on the contact page.</div>
  </div>
</div>

<script>
  const faqQuestions = document.querySelectorAll(".faq-question");

  faqQuestions.forEach(question => {
    question.addEventListener("click", () => {
      // Hide all other answers
      document.querySelectorAll(".faq-answer").forEach(answer => {
        answer.classList.remove("active");
      });

      document.querySelectorAll(".faq-question").forEach(q => {
        q.classList.remove("active");
      });

      // Toggle current
      question.classList.add("active");
      question.nextElementSibling.classList.add("active");
    });
  });
</script>

</body>
</html>
