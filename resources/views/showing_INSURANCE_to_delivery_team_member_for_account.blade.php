<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Team Member INSURANCE Document Viewer</title>
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
        <h2 id="main-heading" style = "margin-top: 40px;">Current INSURANCE Document</h2>
        <embed src="{{ asset('storage/' . $delivery_team_member_to_show_document->vehicle_insurance) }}" style = "border: 2px solid #454545; margin-top: 40px; margin-bottom: 20px;" width="70%" height="600px" type='application/pdf'>
    </div>
</body>
</html>