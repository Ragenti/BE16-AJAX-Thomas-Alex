<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>My Favorite Songs</title>
</head>
<body>
    <div id="content" class="container">
        
        <table class='table table-dark mb-4 mt-4'>
            <thead>
                <tr>
                    <th scope='col'>Title</th>
                    <th scope='col'>Artist</th>
                    <th scope='col'>Country</th>
                    <th scope='col'>Genre</th>
                    <th scope='col'>Year</th>
                </tr>
            </thead>
            <tbody id="my_songs"></tbody>
        </table>
        <form class="text-center">
            <input id="loadBtn" type="submit" value="Load Songs" name='Submit' class="btn btn-primary">
        </form>
    </div>

    <script>
        let load_btn = document.getElementById('loadBtn');
        console.log(load_btn);
        load_btn.addEventListener("click", loadSongs);
        console.log(load_btn);
        function loadSongs(e)
        {
            e.preventDefault();
            const ajax_req = new XMLHttpRequest();
            console.log(ajax_req.responseXML);
            ajax_req.open("GET", "songs.xml");
            ajax_req.onload = function()
            {
                if(ajax_req.status == 200)
                {
                    console.log(ajax_req.responseXML);
                    convertXMLtoHTML(ajax_req.responseXML);
                }
            };
            ajax_req.send();
        }
        
        
        function convertXMLtoHTML(xml)
        {
            let songs = document.getElementsByTagName("song");
            let content = document.getElementById("my_songs");

            for (i = 0; i < songs.length; i++)
            {
                content.innerHtml += `
                <tr>
                    <th scope='row'>${i+1}</th>
                    <td>${songs[i].getElementsByTagName('title')[0].childNodes[0].nodeValue}</td>
                    <td>${songs[i].getElementsByTagName('artist')[0].childNodes[0].nodeValue}</td>
                    <td>${songs[i].getElementsByTagName('country')[0].childNodes[0].nodeValue}</td>
                    <td>${songs[i].getElementsByTagName('genre')[0].childNodes[0].nodeValue}</td>
                    <td>${songs[i].getElementsByTagName('year')[0].childNodes[0].nodeValue}</td>
                </tr>`
            }
        }
    </script>
    

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>