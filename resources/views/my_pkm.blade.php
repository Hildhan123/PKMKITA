<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PKM</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="col justify-content-center">
        <h1> Buat PKM </h1>
        
            <form action="{{ route('proses.my_pkm_proses') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div><input type="text" id="nama_proposal" name="nama_proposal" placeholder="Ketik nama proposal"></div>
                <div>
                    Kategori PKM
                    <select id="kategori_pkm" name="kategori_pkm">
                        <option value="PKM-RE">PKM-RE</option>
                        <option value="PKM-RSH">PKM-RSH</option>
                        <option value="PKM-K">PKM-K</option>
                        <option value="PKM-PM">PKM-PM</option>
                        <option value="PKM-PI">PKM-PI</option>
                        <option value="PKM-KC">PKM-KC</option>
                        <option value="PKM-KI">PKM-KI</option>
                        <option value="PKM-VGK">PKM-VGK</option>
                        <option value="PKM-GFT">PKM-GFT</option>
                        <option value="PKM-AI">PKM-AI</option> 
                    </select>
                </div>
                <div><input type="text" id="deskripsi" name="deskripsi" placeholder="deskripsi"></div>
                <div><input type="text" id="prodi_dibutuhkan" name="prodi_dibutuhkan" placeholder="prodi yg dibutuhkan"></div>
                <br>
                <button type="submit" class="btn btn-primary mb-2">submit</button>
            </form>
    </div>
</body>
</html>