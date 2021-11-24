<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Contatti</h1>
                <form action="" method="post">
                    @csrf
                    @method('POST')
    
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Messaggio</label>
                        <input type="message" name="message" id="message" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Invia" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    
</body>
</html>