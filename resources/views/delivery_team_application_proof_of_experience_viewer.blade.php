<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Team Application Proof Of Experience Viewer</title>
    <style>
        .Document-viewer-container{
            text-align: center;
            align-items: center;
            justify-content: center;
        }
        #main-heading{
            color: #454545;
            border: 1px solid #454545;
            padding: 5px 0;
            border-radius: 8px;
            font-size: 40px;
            width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="Document-viewer-container">
        <h2 id="main-heading" style = "margin-top: 40px;">Applicant Proof Of Experience Document</h2>
        <embed src="{{ asset('storage/' . $application_to_see_document->proof_of_experience) }}" style = "border: 2px solid #454545; margin-top: 40px; margin-bottom: 20px;" width="70%" height="600px" type='application/pdf'>
    </div>
</body>
</html>