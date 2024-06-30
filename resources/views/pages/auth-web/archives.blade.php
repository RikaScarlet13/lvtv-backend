<?php

use Google\Client;
use Google\Service\YouTube;
use Google\Service\Exception;

# Configs
$apiKey = 'AIzaSyAOHgj5Wyoj9fOUNkJypPrVIvF9QexABfo';

# Initialize YouTube API client
$client = new Client();
$client->setDeveloperKey($apiKey);
$service = new YouTube($client);

# https://developers.google.com/youtube/v3/docs/playlistItems/list
$response = $service->playlistItems->listPlaylistItems(
    'snippet',
    [
        'playlistId' => 'PLsLXjgGsP-JKZOhQnhXsDAnu1nPTkAU8b',
        'pageToken' => $_GET['pageToken'] ?? null,
        'maxResults' => 10,
    ]
);

#dump($response);

# Extract data we need from the response
$prevPageToken = $response->prevPageToken ?? null;
$nextPageToken = $response->nextPageToken ?? null;
$totalResults = $response->pageInfo->totalResults;
$videos = $response->items;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    body, h1, h2, h3, h4, h5, h6, p, a, div, span, input, button {
    font-family: 'Poppins', sans-serif;
}
    .program{
        width: 10px;
        height: 10px;
    }
    .custom-card {
        width: 18rem; /* Adjust the width as needed */
        height: 12rem; /* Adjust the height as needed */
    }
    .custom-card img {
        object-fit: cover;
        height: 100%;
    }

    
</style>
<body>

@include('components.auth-webpage.auth-navbar')
    <!-- Add your other components and content here -->
    <div class="container-fluid">
  <div>
   
    </div>
    <div class="col-xs-12">
      <div class="container my-5">
        <div class="text-center">
          <h2 class="text-4xl fw-bold mt-5">LVTV Archives</h2>
          <div class="border-top border-3 border-warning my-4"></div>

        </div>
        <div class="d-flex justify-content-center mb-4">
          <input
            type="text"
            placeholder="Search..."
            class="form-control w-50 p-3 mr-2"
          />
          <button class="btn btn-warning text-white">Search</button>
        </div>
        <div class="container py-5">
            <div class="container">
                @foreach ($videos as $index => $video)
                    @if ($index % 2 == 0)
                        <!-- Start a new row for every even index (0, 2, 4, ...) -->
                        <div class="row">
                    @endif
            
                    <div class="col-md-6 mb-4">
                        <?php
                        $youtubeurl = 'https://www.youtube.com/watch?v='.$video['snippet']['resourceId']['videoId'];
                        ?>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col card shadow-sm p-4 bg-white rounded mx-auto w-75 align-items-center">
                                <img 
                                style='width:300px'
                                src='<?php echo $video['snippet']['thumbnails']['high']['url'] ?>' 
                                alt='Thumbnail for the video <?php echo $video['snippet']['title'] ?>'><br>
                
                                <strong>Title: <?php echo $video['snippet']['title'] ?> </strong> 
                                <br>
                                <strong>URL: <a href='<?php echo $youtubeurl ?>'>Watch Video</a></strong>
                            </div>
                        </div>
                    </div>
            
                    @if ($index % 2 != 0 || $index == count($videos) - 1)
                        <!-- Close the row for every odd index or the last item -->
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
</div>
      </div>
    </div>
  </div>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlUzQNwHl5WElE6KEe3BwSr0gWf/cOUxaJrfRY0hK6CZ11qZl1tFZCpcp4F" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QksZHU+SIL+j4U4mI/DK2GmZVLVV0Wq1Kr3/Z3eo0EYrmhS4F4yeYb43wxzSy0Jh" crossorigin="anonymous"></script>

<footer>
    @include('components.auth-webpage.auth-footer')
</footer>

</body>


</html>
