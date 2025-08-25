<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Viewer</title>
    <style>
        .Document-viewer-container{
            text-align: center;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="Document-viewer-container">
        <embed src="{{ asset('storage/' . $SellerBankAccountProof->proof_of_bank_account_ownership_file_path) }}#toolbar=0" width="70%" height="600px" type='application/pdf'>
    </div>
</body>
</html>