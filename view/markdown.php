<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "./link.php"; ?>
</head>
<body>
<div class="container max-w-4xl mx-auto shadow-lg bg-white p-6 rounded-lg">
        <h1 class="text-2xl font-bold text-center mb-4">Éditeur Markdown</h1>
        
        <form action="post" name="Document" class="space-y-4">
            <div>
                <textarea 
                    name="Document" 
                    id="editor" 
                    class="w-full rounded-md border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                ></textarea>
            </div>
            <button 
                type="submit" 
                class="btn btn-primary w-full py-2 text-lg">
                Enregistrer
            </button>
        </form>
    </div>
    <script src="./script.js"></script>
</body>

</html>